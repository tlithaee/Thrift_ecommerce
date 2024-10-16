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
        Category::create([
            'specialty_name' => 'Appetizers Expert',
            'category_name' => 'Appetizers',
            'color' => 'yellow',
            'category_image' => 'https://img.freepik.com/free-photo/closeup-bruschettas-plate-white-table-lights_181624-32830.jpg',
            'slug' => 'appetizers',
            'description' => 'Explore a world of delightful appetizers crafted to awaken your taste buds and set the perfect tone for your meal.'
        ]);

        Category::create([
            'specialty_name' => 'Soup Specialist',
            'category_name' => 'Soup',
            'color' => 'orange',
            'category_image' => 'https://img.freepik.com/free-photo/borsch-soup-rye-bread_144627-28808.jpg',
            'slug' => 'soup',
            'description' => 'Indulge in our warm, hearty soups that blend traditional recipes with fresh ingredients for a soothing and satisfying start.'
        ]);

        Category::create([
            'specialty_name' => 'Entree Chef',
            'category_name' => 'Entree',
            'color' => 'red',
            'category_image' => 'https://img.freepik.com/free-photo/plate-juicy-lamb-dinner-food_1203-5796.jpg',
            'slug' => 'entree',
            'description' => 'Our entrees are a flavorful celebration of rich culinary traditions, offering a wide variety of dishes that cater to every palate.'
        ]);

        Category::create([
            'specialty_name' => 'Dessert Specialist',
            'category_name' => 'Dessert',
            'color' => 'pink',
            'category_image' => 'https://img.freepik.com/free-photo/still-life-with-appetizing-bakery-food_23-2149299437.jpg',
            'slug' => 'dessert',
            'description' => 'Finish your meal with our irresistible desserts, from creamy delights to rich, sweet indulgences that satisfy any sweet tooth.'
        ]);

        Category::create([
            'specialty_name' => 'Seafood Dishes',
            'category_name' => 'Seafood',
            'color' => 'blue',
            'category_image' => 'https://img.freepik.com/free-photo/spicy-mixed-seafood-salad-with-thai-food-ingredients_1150-26432.jpg',
            'slug' => 'seafood',
            'description' => 'Savor the fresh flavors of the sea with our expertly prepared seafood dishes that showcase the best of ocean delicacies.'
        ]);

        Category::create([
            'specialty_name' => 'Meat Specialist',
            'category_name' => 'Meat',
            'color' => 'brown',
            'category_image' => 'https://img.freepik.com/free-photo/fried-steak-pieces-wooden-board-garlic_140725-4719.jpg',
            'slug' => 'meat',
            'description' => 'Our expertly grilled and seasoned meats are a tribute to the finest cuts, delivering a perfect balance of tenderness and flavor.'
        ]);

        Category::create([
            'specialty_name' => 'Pasta & Risotto Expert',
            'category_name' => 'Pasta & Risotto',
            'color' => 'purple',
            'category_image' => 'https://img.freepik.com/free-photo/penne-pasta-tomato-sauce-with-chicken-tomatoes-wooden-table_2829-19744.jpg',
            'slug' => 'pasta-risotto',
            'description' => 'Delight in our rich and creamy pasta and risotto dishes, offering a comforting blend of textures and flavors from classic recipes.'
        ]);

        Category::create([
            'specialty_name' => 'Salad Creations',
            'category_name' => 'Salad',
            'color' => 'green',
            'category_image' => 'https://img.freepik.com/free-photo/flat-lay-salad-with-chicken-sesame-seeds_23-2148700369.jpg',
            'slug' => 'salad',
            'description' => 'Enjoy our fresh and vibrant salads, expertly crafted with crisp ingredients and creative dressings for a refreshing bite.'
        ]);
    }
}
