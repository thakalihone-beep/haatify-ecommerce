<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Vendor extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'slug',
        'shop_name',
        'email',
        'phone',
        'username',
        'password',
        'pan_no',
        'address',
        'logo',
        'banner',
        'status',
        'approved_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'approved_at' => 'datetime',
        ];
    }
}
