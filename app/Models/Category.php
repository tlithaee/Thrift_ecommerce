<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['specialty_name', 'category_name', 'color'];

    // Many-to-many relationship with chefs
    public function chefs()
    {
        return $this->belongsToMany(Chef::class, 'chef_category');
    }
}
