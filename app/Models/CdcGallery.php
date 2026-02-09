<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model untuk galeri foto CDC
 * Mengelola dokumentasi foto kegiatan CDC
 */
class CdcGallery extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cdc_galleries';

    protected $fillable = [
        'event_id',
        'news_id',
        'title',
        'description',
        'image_path',
        'thumbnail_path',
        'display_order',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    /**
     * Relasi ke event CDC
     */
    public function event()
    {
        return $this->belongsTo(CdcEvent::class, 'event_id');
    }

    /**
     * Relasi ke news CDC
     */
    public function news()
    {
        return $this->belongsTo(CdcNews::class, 'news_id');
    }

    /**
     * Scope untuk foto featured
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope untuk ordering berdasarkan display_order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order', 'asc');
    }
}
