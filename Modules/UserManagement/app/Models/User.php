<?php

namespace Modules\UserManagement\Models;

use App\Traits\HasSearch;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use  Notifiable, HasRoles, HasSearch;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     *
     */
    protected $guard_name = 'api';

    protected $fillable = [
        'user_name',
        'email',
        'password',
        'activated_at'
    ];

    // Optional properties
    protected $search = ['user_name', 'email'];
    protected $appends = ['roleNames'];
    public static $snakeAttributes = false;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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
        ];
    }

    // For single role
    public function getRoleNamesAttribute()
    {
        return $this->roles()->pluck('name') ;
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
