<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerSupportTicket extends Model
{
    protected $fillable = [
        'user_id',
        'order_id',
        'name',
        'email',
        'category',
        'subject',
        'message',
        'status',
        'admin_reply',
    ];
}
