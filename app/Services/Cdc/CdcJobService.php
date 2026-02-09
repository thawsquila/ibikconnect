<?php

namespace App\Services\Cdc;

use App\Models\CdcJobListing;
use App\Services\BaseService;
use App\Services\FileUploadService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

/**
 * CDC Job Listing Service
 * 
 * Handles business logic for job listings including
 * CRUD operations, search, filtering, and file uploads
 */
class CdcJobService extends BaseService
{
    public function __construct(
        private FileUploadService $fileUploadService
    ) {}

    /**
     * Get paginated job listings
     * 
     * @param array $filters
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginated(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        $query = CdcJobListing::query();

        // Apply filters
        if (!empty($filters['type'])) {
            $query->type($filters['type']);
        }

        if (!empty($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('title', 'ilike', "%{$filters['search']}%")
                  ->orWhere('company_name', 'ilike', "%{$filters['search']}%")
                  ->orWhere('location', 'ilike', "%{$filters['search']}%");
            });
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', $filters['is_active']);
        }

        // Only show active and not expired for public
        if (!isset($filters['admin'])) {
            $query->active()->notExpired();
        }

        return $query->latest()->paginate($perPage);
    }

    /**
     * Get all active job listings
     * 
     * @return Collection
     */
    public function getActive(): Collection
    {
        return CdcJobListing::active()
            ->notExpired()
            ->latest()
            ->get();
    }

    /**
     * Create a new job listing
     * 
     * @param array $data
     * @return CdcJobListing
     */
    public function create(array $data): CdcJobListing
    {
        return $this->executeInTransaction(function () use ($data) {
            // Handle logo upload
            if (isset($data['company_logo']) && $data['company_logo'] instanceof \Illuminate\Http\UploadedFile) {
                $data['company_logo'] = $this->fileUploadService->uploadImage(
                    $data['company_logo'],
                    config('filesystems.upload_paths.cdc.jobs')
                );
            }

            $job = CdcJobListing::create($data);

            $this->logInfo('Job listing created', ['id' => $job->id, 'title' => $job->title]);

            return $job;
        });
    }

    /**
     * Update a job listing
     * 
     * @param CdcJobListing $job
     * @param array $data
     * @return CdcJobListing
     */
    public function update(CdcJobListing $job, array $data): CdcJobListing
    {
        return $this->executeInTransaction(function () use ($job, $data) {
            // Handle logo upload
            if (isset($data['company_logo']) && $data['company_logo'] instanceof \Illuminate\Http\UploadedFile) {
                // Delete old logo
                if ($job->company_logo) {
                    $this->fileUploadService->delete($job->company_logo);
                }

                $data['company_logo'] = $this->fileUploadService->uploadImage(
                    $data['company_logo'],
                    config('filesystems.upload_paths.cdc.jobs')
                );
            }

            $job->update($data);

            $this->logInfo('Job listing updated', ['id' => $job->id, 'title' => $job->title]);

            return $job->fresh();
        });
    }

    /**
     * Delete a job listing
     * 
     * @param CdcJobListing $job
     * @return bool
     */
    public function delete(CdcJobListing $job): bool
    {
        return $this->executeInTransaction(function () use ($job) {
            // Delete logo
            if ($job->company_logo) {
                $this->fileUploadService->delete($job->company_logo);
            }

            $deleted = $job->delete();

            $this->logInfo('Job listing deleted', ['id' => $job->id, 'title' => $job->title]);

            return $deleted;
        });
    }

    /**
     * Increment views count
     * 
     * @param CdcJobListing $job
     * @return void
     */
    public function incrementViews(CdcJobListing $job): void
    {
        $job->incrementViews();
    }

    /**
     * Toggle active status
     * 
     * @param CdcJobListing $job
     * @return CdcJobListing
     */
    public function toggleActive(CdcJobListing $job): CdcJobListing
    {
        $job->update(['is_active' => !$job->is_active]);
        
        $this->logInfo('Job listing status toggled', [
            'id' => $job->id,
            'is_active' => $job->is_active
        ]);

        return $job->fresh();
    }
}
