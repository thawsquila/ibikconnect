<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

/**
 * Model untuk event Gallery BEI
 * Mengelola event pasar modal, seminar, workshop, dll
 */
class BeiEvent extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bei_events';

    protected $fillable = [
        'title',
        'description',
        'starts_at',
        'location',
        'max_participants',
        'registered_count',
        'banner_image',
        'is_published',
        'is_registration_open',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'is_published' => 'boolean',
        'is_registration_open' => 'boolean',
    ];

    /**
     * Relasi ke registrasi event
     */
    public function registrations()
    {
        return $this->hasMany(BeiRegistration::class, 'event_id');
    }

    /**
     * Scope untuk event yang published
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope untuk event yang masih buka pendaftaran
     */
    public function scopeOpenRegistration($query)
    {
        return $query->where('is_registration_open', true);
    }

    /**
     * Check apakah event masih ada slot
     */
    public function hasAvailableSlots(): bool
    {
        if (!$this->max_participants) {
            return true;
        }
        return $this->registered_count < $this->max_participants;
    }

    /**
     * Increment jumlah peserta terdaftar
     */
    public function incrementRegisteredCount(): void
    {
        $this->increment('registered_count');
    }

    public function getBannerImageUrlAttribute(): ?string
    {
        if (!$this->banner_image) {
            return null;
        }

        $path = ltrim($this->banner_image, '/\\');
        $path = str_replace('\\', '/', $path);
        if (str_starts_with($path, 'public/')) {
            $path = substr($path, strlen('public/'));
        }
        if (str_starts_with($path, 'storage/')) {
            $path = substr($path, strlen('storage/'));
        }

        $publicAbsolutePath = public_path($path);
        if (file_exists($publicAbsolutePath)) {
            return asset($path);
        }

        return Storage::disk('public')->url($path);
    }
}
