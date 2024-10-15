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
            'category_image' => 'https://img.freepik.com/free-photo/closeup-bruschettas-plate-white-table-lights_181624-32830.jpg?t=st=1728999511~exp=1729003111~hmac=8273ce779cca81c20488782ac16302b68739374b1244c6afbc8c4469e7b81506&w=900',
            'slug' => 'appetizers-expert', 
        ]);

        Category::create([
            'specialty_name' => 'Soup Specialist',
            'category_name' => 'Soup',
            'color' => 'orange',
            'category_image' => 'https://img.freepik.com/free-photo/borsch-soup-rye-bread_144627-28808.jpg?t=st=1728999546~exp=1729003146~hmac=fac938b217b49c2cf5442ae81d276825567d660115ca260d050556a443c28afe&w=360',
            'slug' => 'soup-specialist', 
        ]);

        Category::create([
            'specialty_name' => 'Entree Chef',
            'category_name' => 'Entree',
            'color' => 'red',
            'category_image' => 'https://img.freepik.com/free-photo/plate-juicy-lamb-dinner-food_1203-5796.jpg?t=st=1728999563~exp=1729003163~hmac=cd9238fcd59c01906c25d0426c3bd6defa6f848eb655e6b2453fbbc3a2cb054f&w=900',
            'slug' => 'entree-chef', 
        ]);

        Category::create([
            'specialty_name' => 'Dessert Specialist',
            'category_name' => 'Dessert',
            'color' => 'pink',
            'category_image' => 'https://img.freepik.com/free-photo/still-life-with-appetizing-bakery-food_23-2149299437.jpg?t=st=1728999580~exp=1729003180~hmac=8432462b4fcc41f759fd161fa0bffc5ba8123d8abd171ffc86992622c54a5e60&w=900',
            'slug' => 'dessert-specialist', 
        ]);

        Category::create([
            'specialty_name' => 'Seafood Dishes',
            'category_name' => 'Seafood',
            'color' => 'blue',
            'category_image' => 'https://img.freepik.com/free-photo/spicy-mixed-seafood-salad-with-thai-food-ingredients_1150-26432.jpg?t=st=1728999600~exp=1729003200~hmac=9baf406aeaffcf237b531b4fb3c36dc5489dd2191695ac9a1ec58dd5358d0cae&w=900',
            'slug' => 'seafood-dishes', 
        ]);

        Category::create([
            'specialty_name' => 'Meat Specialist',
            'category_name' => 'Meat',
            'color' => 'brown',
            'category_image' => 'https://img.freepik.com/free-photo/fried-steak-pieces-wooden-board-garlic_140725-4719.jpg?t=st=1728999616~exp=1729003216~hmac=c4a3581f484d4bc0a67b412812cd10fd68340902a17d11050c11a8855b121e11&w=900',
            'slug' => 'meat-specialist', 
        ]);

        Category::create([
            'specialty_name' => 'Pasta & Risotto Expert',
            'category_name' => 'Pasta & Risotto',
            'color' => 'purple',
            'category_image' => 'https://img.freepik.com/free-photo/penne-pasta-tomato-sauce-with-chicken-tomatoes-wooden-table_2829-19744.jpg?t=st=1728999632~exp=1729003232~hmac=cb67bb081890253eebeafd330f59cd7a26e29bf63c718a9b8c747a7021033f24&w=900',
            'slug' => 'pasta-risotto-expert', 
        ]);

        Category::create([
            'specialty_name' => 'Salad Creations',
            'category_name' => 'Salad',
            'color' => 'green',
            'category_image' => 'https://img.freepik.com/free-photo/flat-lay-salad-with-chicken-sesame-seeds_23-2148700369.jpg?t=st=1728999645~exp=1729003245~hmac=54f03c2f93882a3ae13f711a1c295d928afd2f0811fffbd41a2753266f0d3bd3&w=900',
            'slug' => 'salad-creations', 
        ]);
    }
}
