<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeiEvent extends Model
{
    use HasFactory;

    protected $table = 'bei_events';

    protected $fillable = [
        'title', 'description', 'starts_at', 'location'
    ];

    protected $casts = [
        'starts_at' => 'datetime',
    ];

    public function registrations()
    {
        return $this->hasMany(BeiRegistration::class, 'event_id');
    }
}
