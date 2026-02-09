<?php

namespace App\Services\Bei;

use App\Models\BeiEvent;
use App\Models\BeiRegistration;
use App\Services\BaseService;
use App\Services\FileUploadService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

/**
 * BEI Event Service
 * 
 * Handles business logic for BEI (Gallery Bursa Efek Indonesia) events
 * including event management and registration handling
 */
class BeiEventService extends BaseService
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
        return BeiEvent::published()
            ->openRegistration()
            ->where('starts_at', '>=', now())
            ->orderBy('starts_at', 'asc')
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
        $query = BeiEvent::query();

        if (isset($filters['is_published'])) {
            $query->where('is_published', $filters['is_published']);
        }

        if (isset($filters['is_registration_open'])) {
            $query->where('is_registration_open', $filters['is_registration_open']);
        }

        if (!empty($filters['search'])) {
            $query->where('title', 'ilike', "%{$filters['search']}%");
        }

        return $query->latest('starts_at')->paginate($perPage);
    }

    /**
     * Create a new event
     * 
     * @param array $data
     * @return BeiEvent
     */
    public function create(array $data): BeiEvent
    {
        return $this->executeInTransaction(function () use ($data) {
            // Handle banner upload
            if (isset($data['banner_image']) && $data['banner_image'] instanceof \Illuminate\Http\UploadedFile) {
                $data['banner_image'] = $this->fileUploadService->uploadImage(
                    $data['banner_image'],
                    config('filesystems.upload_paths.bei.events')
                );
            }

            $event = BeiEvent::create($data);

            $this->logInfo('BEI Event created', ['id' => $event->id, 'title' => $event->title]);

            return $event;
        });
    }

    /**
     * Update an event
     * 
     * @param BeiEvent $event
     * @param array $data
     * @return BeiEvent
     */
    public function update(BeiEvent $event, array $data): BeiEvent
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
                    config('filesystems.upload_paths.bei.events')
                );
            }

            $event->update($data);

            $this->logInfo('BEI Event updated', ['id' => $event->id, 'title' => $event->title]);

            return $event->fresh();
        });
    }

    /**
     * Delete an event
     * 
     * @param BeiEvent $event
     * @return bool
     */
    public function delete(BeiEvent $event): bool
    {
        return $this->executeInTransaction(function () use ($event) {
            // Delete banner
            if ($event->banner_image) {
                $this->fileUploadService->delete($event->banner_image);
            }

            $deleted = $event->delete();

            $this->logInfo('BEI Event deleted', ['id' => $event->id, 'title' => $event->title]);

            return $deleted;
        });
    }

    /**
     * Register a participant to an event
     * 
     * @param BeiEvent $event
     * @param array $data
     * @return BeiRegistration
     * @throws \Exception
     */
    public function register(BeiEvent $event, array $data): BeiRegistration
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
            $existing = BeiRegistration::where('event_id', $event->id)
                ->where('email', $data['email'])
                ->first();

            if ($existing) {
                throw new \Exception('Anda sudah terdaftar untuk event ini.');
            }

            // Create registration
            $registration = BeiRegistration::create(array_merge($data, [
                'event_id' => $event->id,
                'event_title' => $event->title,
            ]));

            // Increment registered count
            $event->incrementRegisteredCount();

            $this->logInfo('BEI Event registration created', [
                'event_id' => $event->id,
                'registration_id' => $registration->id,
                'email' => $registration->email,
            ]);

            return $registration;
        });
    }
}
