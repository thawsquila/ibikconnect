<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

/**
 * Model untuk lowongan kerja dan magang CDC
 * Mengelola job postings yang ditampilkan di halaman CDC
 */
class CdcJobListing extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cdc_job_listings';

    protected $fillable = [
        'title',
        'company_name',
        'company_logo',
        'location',
        'type',
        'salary_range',
        'description',
        'requirements',
        'benefits',
        'deadline',
        'application_url',
        'is_active',
        'views_count',
    ];

    protected $casts = [
        'deadline' => 'date',
        'is_active' => 'boolean',
    ];

    /**
     * Job type constants
     */
    const TYPE_FULL_TIME = 'full-time';
    const TYPE_PART_TIME = 'part-time';
    const TYPE_INTERNSHIP = 'internship';
    const TYPE_FREELANCE = 'freelance';
    const TYPE_CONTRACT = 'contract';

    /**
     * Scope untuk job yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope untuk job yang belum expired
     */
    public function scopeNotExpired($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('deadline')
              ->orWhere('deadline', '>=', now());
        });
    }

    /**
     * Scope untuk job berdasarkan tipe
     */
    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Increment views count
     */
    public function incrementViews(): void
    {
        $this->increment('views_count');
    }

    public function getCompanyLogoUrlAttribute(): ?string
    {
        if (!$this->company_logo) {
            return null;
        }

        $path = ltrim($this->company_logo, '/\\');
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

    /**
     * Check apakah job masih berlaku
     */
    public function isValid(): bool
    {
        if (!$this->is_active) {
            return false;
        }
        
        if ($this->deadline && $this->deadline->isPast()) {
            return false;
        }
        
        return true;
    }
}
