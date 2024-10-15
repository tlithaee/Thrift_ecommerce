<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_name',
        'category',
        'chef_name',
        'price',
        'food_image',
        'slug',
        'description',
        'ingredients',
    ];
}
