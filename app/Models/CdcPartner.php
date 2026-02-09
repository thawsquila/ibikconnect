<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model untuk mitra/partner CDC
 * Mengelola informasi perusahaan partner dan afiliasi
 */
class CdcPartner extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cdc_partners';

    protected $fillable = [
        'name',
        'logo_path',
        'website_url',
        'description',
        'type',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Partner type constants
     */
    const TYPE_CORPORATE = 'corporate';
    const TYPE_EDUCATION = 'education';
    const TYPE_GOVERNMENT = 'government';
    const TYPE_NGO = 'ngo';
    const TYPE_OTHER = 'other';

    /**
     * Scope untuk partner yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope untuk partner berdasarkan tipe
     */
    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Scope untuk ordering berdasarkan display_order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order', 'asc');
    }
}
