<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create the categories with specialty_name, category_name, and color
        Category::create([
            'specialty_name' => 'Appetizers Expert',
            'category_name' => 'Appetizers',
            'color' => 'yellow'
        ]);

        Category::create([
            'specialty_name' => 'Soup Specialist',
            'category_name' => 'Soup',
            'color' => 'orange'
        ]);

        Category::create([
            'specialty_name' => 'Entree Chef',
            'category_name' => 'Entree',
            'color' => 'red'
        ]);

        Category::create([
            'specialty_name' => 'Dessert Specialist',
            'category_name' => 'Dessert',
            'color' => 'pink'
        ]);

        Category::create([
            'specialty_name' => 'Seafood Dishes',
            'category_name' => 'Seafood',
            'color' => 'blue'
        ]);

        Category::create([
            'specialty_name' => 'Meat Specialist (Steak, BBQ, etc.)',
            'category_name' => 'Meat',
            'color' => 'brown'
        ]);

        Category::create([
            'specialty_name' => 'Pasta & Risotto Expert',
            'category_name' => 'Pasta & Risotto',
            'color' => 'purple'
        ]);

        Category::create([
            'specialty_name' => 'Salad Creations',
            'category_name' => 'Salad',
            'color' => 'green'
        ]);
    }
}
