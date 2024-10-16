<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Chef extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bio',
        'photo',
        'slug' 
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

    // Automatically generate a slug when creating a Chef
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($chef) {
            if (empty($chef->slug)) {
                $chef->slug = Str::slug($chef->name);
            }
        });
    }
}
