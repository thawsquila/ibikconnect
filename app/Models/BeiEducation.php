<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model untuk konten edukasi pasar modal BEI
 * Mengelola materi pembelajaran investasi dan pasar modal
 */
class BeiEducation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bei_educations';

    protected $fillable = [
        'title',
        'content',
    ];

    /**
     * Scope untuk ordering berdasarkan created_at terbaru
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
