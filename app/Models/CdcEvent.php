<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model untuk event CDC (Career Development Center)
 * Mengelola agenda kegiatan seperti seminar, workshop, job fair, dll
 */
class CdcEvent extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cdc_events';

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'location',
        'event_type',
        'max_participants',
        'registered_count',
        'banner_image',
        'requirements',
        'is_published',
        'is_registration_open',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_published' => 'boolean',
        'is_registration_open' => 'boolean',
    ];

    /**
     * Relasi ke registrasi event
     */
    public function registrations()
    {
        return $this->hasMany(CdcEventRegistration::class, 'event_id');
    }

    /**
     * Relasi ke galeri foto
     */
    public function galleries()
    {
        return $this->hasMany(CdcGallery::class, 'event_id');
    }

    /**
     * Scope untuk event yang published
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope untuk event yang aktif (alias published)
     */
    public function scopeActive($query)
    {
        return $this->scopePublished($query);
    }

    /**
     * Scope untuk event yang masih buka pendaftaran
     */
    public function scopeOpenRegistration($query)
    {
        return $query->where('is_registration_open', true);
    }

    /**
     * Scope untuk event mendatang
     */
    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>=', now());
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

    /**
     * Get sisa slot yang tersedia
     */
    public function getAvailableSlotsAttribute(): ?int
    {
        if (!$this->max_participants) {
            return null;
        }
        return max(0, $this->max_participants - $this->registered_count);
    }
}
