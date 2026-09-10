<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ModelUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
        'no_hp',
        'alamat',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}