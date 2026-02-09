<?php

namespace App\Services\Cdc;

use App\Models\CdcNews;
use App\Services\BaseService;
use App\Services\FileUploadService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

/**
 * CDC News Service
 * 
 * Handles business logic for news/articles including
 * CRUD operations, publishing, and slug generation
 */
class CdcNewsService extends BaseService
{
    public function __construct(
        private FileUploadService $fileUploadService
    ) {}

    /**
     * Get published news with pagination
     * 
     * @param array $filters
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPublished(array $filters = [], int $perPage = 12): LengthAwarePaginator
    {
        $query = CdcNews::published()->latest();

        if (!empty($filters['category'])) {
            $query->category($filters['category']);
        }

        if (!empty($filters['search'])) {
            $query->where('title', 'ilike', "%{$filters['search']}%");
        }

        return $query->paginate($perPage);
    }

    /**
     * Get latest published news
     * 
     * @param int $limit
     * @return Collection
     */
    public function getLatest(int $limit = 6): Collection
    {
        return CdcNews::published()
            ->latest()
            ->limit($limit)
            ->get();
    }

    /**
     * Get news by slug
     * 
     * @param string $slug
     * @return CdcNews
     */
    public function getBySlug(string $slug): CdcNews
    {
        $news = CdcNews::where('slug', $slug)->firstOrFail();
        
        // Increment views
        $news->incrementViews();
        
        return $news;
    }

    /**
     * Get paginated news for admin
     * 
     * @param array $filters
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginated(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        $query = CdcNews::query();

        if (isset($filters['is_published'])) {
            $query->where('is_published', $filters['is_published']);
        }

        if (!empty($filters['category'])) {
            $query->category($filters['category']);
        }

        if (!empty($filters['search'])) {
            $query->where('title', 'ilike', "%{$filters['search']}%");
        }

        return $query->latest()->paginate($perPage);
    }

    /**
     * Create a new news article
     * 
     * @param array $data
     * @return CdcNews
     */
    public function create(array $data): CdcNews
    {
        return $this->executeInTransaction(function () use ($data) {
            // Generate slug if not provided
            if (empty($data['slug'])) {
                $data['slug'] = $this->generateUniqueSlug($data['title']);
            }

            // Handle featured image upload
            if (isset($data['featured_image']) && $data['featured_image'] instanceof \Illuminate\Http\UploadedFile) {
                $data['featured_image'] = $this->fileUploadService->uploadImage(
                    $data['featured_image'],
                    config('filesystems.upload_paths.cdc.news')
                );
            }

            $news = CdcNews::create($data);

            $this->logInfo('News created', ['id' => $news->id, 'title' => $news->title]);

            return $news;
        });
    }

    /**
     * Update a news article
     * 
     * @param CdcNews $news
     * @param array $data
     * @return CdcNews
     */
    public function update(CdcNews $news, array $data): CdcNews
    {
        return $this->executeInTransaction(function () use ($news, $data) {
            // Update slug if title changed
            if (isset($data['title']) && $data['title'] !== $news->title) {
                $data['slug'] = $this->generateUniqueSlug($data['title'], $news->id);
            }

            // Handle featured image upload
            if (isset($data['featured_image']) && $data['featured_image'] instanceof \Illuminate\Http\UploadedFile) {
                // Delete old image
                if ($news->featured_image) {
                    $this->fileUploadService->delete($news->featured_image);
                }

                $data['featured_image'] = $this->fileUploadService->uploadImage(
                    $data['featured_image'],
                    config('filesystems.upload_paths.cdc.news')
                );
            }

            $news->update($data);

            $this->logInfo('News updated', ['id' => $news->id, 'title' => $news->title]);

            return $news->fresh();
        });
    }

    /**
     * Delete a news article
     * 
     * @param CdcNews $news
     * @return bool
     */
    public function delete(CdcNews $news): bool
    {
        return $this->executeInTransaction(function () use ($news) {
            // Delete featured image
            if ($news->featured_image) {
                $this->fileUploadService->delete($news->featured_image);
            }

            $deleted = $news->delete();

            $this->logInfo('News deleted', ['id' => $news->id, 'title' => $news->title]);

            return $deleted;
        });
    }

    /**
     * Publish a news article
     * 
     * @param CdcNews $news
     * @return CdcNews
     */
    public function publish(CdcNews $news): CdcNews
    {
        $news->publish();
        
        $this->logInfo('News published', ['id' => $news->id, 'title' => $news->title]);
        
        return $news->fresh();
    }

    /**
     * Generate unique slug
     * 
     * @param string $title
     * @param int|null $excludeId
     * @return string
     */
    private function generateUniqueSlug(string $title, ?int $excludeId = null): string
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        while ($this->slugExists($slug, $excludeId)) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    /**
     * Check if slug exists
     * 
     * @param string $slug
     * @param int|null $excludeId
     * @return bool
     */
    private function slugExists(string $slug, ?int $excludeId = null): bool
    {
        $query = CdcNews::where('slug', $slug);

        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        return $query->exists();
    }
}
