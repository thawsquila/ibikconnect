<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeiRegistration extends Model
{
    use HasFactory;

    protected $table = 'bei_registrations';

    protected $fillable = [
        'event_id', 'name', 'email', 'event_title'
    ];

    public function event()
    {
        return $this->belongsTo(BeiEvent::class, 'event_id');
    }
}
