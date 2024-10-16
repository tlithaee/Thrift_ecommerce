<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $fillable = [
        'user_id',
        'address_line',
        'city',
        'state',
        'zip_code',
        'phone_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

