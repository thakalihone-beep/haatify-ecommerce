<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'shop_name',
        'email',
        'phone',
        'password',
        'pan_no',
        'address',
        'logo',
        'banner',
        'status',
    ];

    protected $hidden = [
        'password',
    ];
}
