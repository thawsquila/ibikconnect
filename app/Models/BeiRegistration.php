<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model untuk registrasi event BEI
 * Menyimpan data mahasiswa yang mendaftar event pasar modal
 */
class BeiRegistration extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bei_registrations';

    protected $fillable = [
        'event_id',
        'name',
        'nim',
        'email',
        'event_title',
    ];

    /**
     * Relasi ke event BEI
     */
    public function event()
    {
        return $this->belongsTo(BeiEvent::class, 'event_id');
    }

    /**
     * Scope untuk registrasi berdasarkan event
     */
    public function scopeForEvent($query, $eventId)
    {
        return $query->where('event_id', $eventId);
    }
}
