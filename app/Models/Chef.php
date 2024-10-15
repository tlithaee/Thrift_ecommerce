<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bio',
        'photo'
    ];

    // Each Chef can prepare multiple Menus
    public function menus()
    {
        return $this->hasMany(Menu::class); 
    }

    // Many-to-many relationship with categories
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'chef_category');
    }
}
