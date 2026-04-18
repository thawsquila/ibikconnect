<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

/**
 * Model untuk galeri foto Gallery BEI
 * Mengelola dokumentasi foto kegiatan pasar modal
 */
class BeiGallery extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bei_galleries';

    protected $fillable = [
        'title',
        'image_path',
    ];

    /**
     * Scope untuk ordering berdasarkan created_at terbaru
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image_path) {
            return null;
        }

        $publicAbsolutePath = public_path($this->image_path);
        if (file_exists($publicAbsolutePath)) {
            return asset($this->image_path);
        }

        return Storage::disk('public')->url($this->image_path);
    }
}
