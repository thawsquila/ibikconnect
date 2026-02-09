<?php

namespace App\Services\Cdc;

use App\Models\CdcEvent;
use App\Models\CdcEventRegistration;
use App\Services\BaseService;
use App\Services\FileUploadService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

/**
 * CDC Event Service
 * 
 * Handles business logic for CDC events including
 * event management, registration handling, and capacity checking
 */
class CdcEventService extends BaseService
{
    public function __construct(
        private FileUploadService $fileUploadService
    ) {}

    /**
     * Get upcoming published events
     * 
     * @param int $limit
     * @return Collection
     */
    public function getUpcoming(int $limit = 10): Collection
    {
        return CdcEvent::published()
            ->upcoming()
            ->orderBy('start_date', 'asc')
            ->limit($limit)
            ->get();
    }

    /**
     * Get paginated events for admin
     * 
     * @param array $filters
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginated(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        $query = CdcEvent::query();

        if (isset($filters['is_published'])) {
            $query->where('is_published', $filters['is_published']);
        }

        if (isset($filters['is_registration_open'])) {
            $query->where('is_registration_open', $filters['is_registration_open']);
        }

        if (!empty($filters['search'])) {
            $query->where('title', 'ilike', "%{$filters['search']}%");
        }

        return $query->latest('start_date')->paginate($perPage);
    }

    /**
     * Create a new event
     * 
     * @param array $data
     * @return CdcEvent
     */
    public function create(array $data): CdcEvent
    {
        return $this->executeInTransaction(function () use ($data) {
            // Handle banner upload
            if (isset($data['banner_image']) && $data['banner_image'] instanceof \Illuminate\Http\UploadedFile) {
                $data['banner_image'] = $this->fileUploadService->uploadImage(
                    $data['banner_image'],
                    config('filesystems.upload_paths.cdc.events')
                );
            }

            $event = CdcEvent::create($data);

            $this->logInfo('CDC Event created', ['id' => $event->id, 'title' => $event->title]);

            return $event;
        });
    }

    /**
     * Update an event
     * 
     * @param CdcEvent $event
     * @param array $data
     * @return CdcEvent
     */
    public function update(CdcEvent $event, array $data): CdcEvent
    {
        return $this->executeInTransaction(function () use ($event, $data) {
            // Handle banner upload
            if (isset($data['banner_image']) && $data['banner_image'] instanceof \Illuminate\Http\UploadedFile) {
                // Delete old banner
                if ($event->banner_image) {
                    $this->fileUploadService->delete($event->banner_image);
                }

                $data['banner_image'] = $this->fileUploadService->uploadImage(
                    $data['banner_image'],
                    config('filesystems.upload_paths.cdc.events')
                );
            }

            $event->update($data);

            $this->logInfo('CDC Event updated', ['id' => $event->id, 'title' => $event->title]);

            return $event->fresh();
        });
    }

    /**
     * Delete an event
     * 
     * @param CdcEvent $event
     * @return bool
     */
    public function delete(CdcEvent $event): bool
    {
        return $this->executeInTransaction(function () use ($event) {
            // Delete banner
            if ($event->banner_image) {
                $this->fileUploadService->delete($event->banner_image);
            }

            $deleted = $event->delete();

            $this->logInfo('CDC Event deleted', ['id' => $event->id, 'title' => $event->title]);

            return $deleted;
        });
    }

    /**
     * Register a participant to an event
     * 
     * @param CdcEvent $event
     * @param array $data
     * @return CdcEventRegistration
     * @throws \Exception
     */
    public function register(CdcEvent $event, array $data): CdcEventRegistration
    {
        return $this->executeInTransaction(function () use ($event, $data) {
            // Check if event is open for registration
            if (!$event->is_registration_open) {
                throw new \Exception('Pendaftaran untuk event ini sudah ditutup.');
            }

            // Check if event has available slots
            if (!$event->hasAvailableSlots()) {
                throw new \Exception('Maaf, kuota peserta sudah penuh.');
            }

            // Check if user already registered
            $existing = CdcEventRegistration::where('event_id', $event->id)
                ->where('email', $data['email'])
                ->first();

            if ($existing) {
                throw new \Exception('Anda sudah terdaftar untuk event ini.');
            }

            // Create registration
            $registration = CdcEventRegistration::create(array_merge($data, [
                'event_id' => $event->id,
                'status' => CdcEventRegistration::STATUS_PENDING,
            ]));

            // Increment registered count
            $event->incrementRegisteredCount();

            $this->logInfo('Event registration created', [
                'event_id' => $event->id,
                'registration_id' => $registration->id,
                'email' => $registration->email,
            ]);

            return $registration;
        });
    }

    /**
     * Approve a registration
     * 
     * @param CdcEventRegistration $registration
     * @return CdcEventRegistration
     */
    public function approveRegistration(CdcEventRegistration $registration): CdcEventRegistration
    {
        $registration->approve();
        
        $this->logInfo('Registration approved', ['id' => $registration->id]);
        
        return $registration->fresh();
    }

    /**
     * Reject a registration
     * 
     * @param CdcEventRegistration $registration
     * @return CdcEventRegistration
     */
    public function rejectRegistration(CdcEventRegistration $registration): CdcEventRegistration
    {
        $registration->reject();
        
        $this->logInfo('Registration rejected', ['id' => $registration->id]);
        
        return $registration->fresh();
    }
}
