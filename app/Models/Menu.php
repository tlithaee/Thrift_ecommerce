<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_name',
        'category_id',
        'chef_id',
        'price',
        'food_image',
        'slug',
        'description',
        'ingredients',
    ];

    protected $guarded = [
        'id',
    ];

    // Each Menu belongs to one Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Each Menu is prepared by one Chef
    public function chef()
    {
        return $this->belongsTo(Chef::class); 
    }
}
