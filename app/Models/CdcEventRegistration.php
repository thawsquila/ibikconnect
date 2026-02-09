<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model untuk registrasi event CDC
 * Menyimpan data mahasiswa yang mendaftar ke event CDC
 */
class CdcEventRegistration extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cdc_event_registrations';

    protected $fillable = [
        'event_id',
        'name',
        'email',
        'phone',
        'nim',
        'message',
        'status',
        'registered_at',
        'approved_at',
    ];

    protected $casts = [
        'registered_at' => 'datetime',
        'approved_at' => 'datetime',
    ];

    /**
     * Status constants
     */
    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';
    const STATUS_ATTENDED = 'attended';

    /**
     * Relasi ke event CDC
     */
    public function event()
    {
        return $this->belongsTo(CdcEvent::class, 'event_id');
    }

    /**
     * Scope untuk status tertentu
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope untuk pending registrations
     */
    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    /**
     * Scope untuk approved registrations
     */
    public function scopeApproved($query)
    {
        return $query->where('status', self::STATUS_APPROVED);
    }

    /**
     * Approve registrasi
     */
    public function approve(): void
    {
        $this->update([
            'status' => self::STATUS_APPROVED,
            'approved_at' => now(),
        ]);
    }

    /**
     * Reject registrasi
     */
    public function reject(): void
    {
        $this->update([
            'status' => self::STATUS_REJECTED,
        ]);
    }
}
