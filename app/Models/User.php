<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Role constants
     */
    const ROLE_SUPER_ADMIN = 'super_admin';
    const ROLE_CDC_ADMIN = 'cdc_admin';
    const ROLE_BEI_ADMIN = 'bei_admin';
    const ROLE_USER = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Relasi ke berita CDC yang ditulis user
     */
    public function cdcNews()
    {
        return $this->hasMany(CdcNews::class, 'author_id');
    }

    /**
     * Check apakah user adalah super admin
     */
    public function isSuperAdmin(): bool
    {
        return $this->role === self::ROLE_SUPER_ADMIN;
    }

    /**
     * Check apakah user adalah CDC admin
     */
    public function isCdcAdmin(): bool
    {
        return $this->role === self::ROLE_CDC_ADMIN || $this->isSuperAdmin();
    }

    /**
     * Check apakah user adalah BEI admin
     */
    public function isBeiAdmin(): bool
    {
        return $this->role === self::ROLE_BEI_ADMIN || $this->isSuperAdmin();
    }

    /**
     * Scope untuk user yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope untuk admin (semua role admin)
     */
    public function scopeAdmins($query)
    {
        return $query->whereIn('role', [
            self::ROLE_SUPER_ADMIN,
            self::ROLE_CDC_ADMIN,
            self::ROLE_BEI_ADMIN,
        ]);
    }
}
