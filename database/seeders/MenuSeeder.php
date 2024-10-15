<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Chef;
use App\Models\Category;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $menus = [
            [
                'food_name' => 'Bruschetta',
                'price' => 25000,
                'food_image' => 'https://img.freepik.com/free-photo/tapas-appetizers_144627-20863.jpg',
                'category_id' => 1, // Appetizers
                'description' => 'Bruschetta is a classic Italian appetizer that features toasted bread topped with a mixture of diced tomatoes, garlic, basil, and olive oil.',
                'ingredients' => ['Baguette', 'Tomatoes', 'Garlic', 'Basil', 'Olive oil', 'Salt', 'Pepper'],
            ],
            [
                'food_name' => 'Garlic Bread',
                'price' => 30000,
                'food_image' => 'https://img.freepik.com/free-photo/delicious-orange-bun-table_23-2148858399.jpg',
                'category_id' => 1, // Appetizers
                'description' => 'Garlic bread is a delightful side that enhances the dining experience with its buttery, garlicky goodness.',
                'ingredients' => ['Baguette', 'Butter', 'Garlic', 'Parsley', 'Salt'],
            ],
            [
                'food_name' => 'Tomato Basil Soup',
                'price' => 22000,
                'food_image' => 'https://img.freepik.com/free-photo/borsch-soup-rye-bread_144627-28800.jpg',
                'category_id' => 2, // Soup
                'description' => 'Tomato Basil Soup is a comforting dish made with ripe tomatoes, fresh basil, and a touch of cream.',
                'ingredients' => ['Tomatoes', 'Basil', 'Onion', 'Garlic', 'Vegetable broth', 'Cream', 'Salt', 'Pepper'],
            ],
            [
                'food_name' => 'Mushroom Soup',
                'price' => 25000,
                'food_image' => 'https://img.freepik.com/free-photo/view-delicious-food-table_23-2149629080.jpg',
                'category_id' => 2,
                'description' => 'Mushroom Soup is a rich and creamy delight that showcases the earthy flavors of mushrooms.',
                'ingredients' => ['Mushrooms', 'Onions', 'Garlic', 'Vegetable broth', 'Cream', 'Thyme', 'Salt', 'Pepper'],
            ],
            [
                'food_name' => 'Grilled Chicken',
                'price' => 50000,
                'food_image' => 'https://img.freepik.com/free-photo/serving-platter-with-grilled-chicken-pieces-topped-with-sauce_140725-8666.jpg',
                'category_id' => 6,
                'description' => 'Grilled Chicken is a flavorful dish marinated in spices and grilled to perfection.',
                'ingredients' => ['Chicken breast', 'Olive oil', 'Garlic', 'Paprika', 'Salt', 'Pepper'],
            ],
            [
                'food_name' => 'Vegetable Stir Fry',
                'price' => 45000,
                'food_image' => 'https://img.freepik.com/free-photo/stir-fry-chicken-sweet-peppers-green-beans_2829-20110.jpg',
                'category_id' => 3,
                'description' => 'Vegetable Stir Fry is packed with fresh vegetables stir-fried to maintain their crunchiness.',
                'ingredients' => ['Broccoli', 'Bell peppers', 'Carrots', 'Soy sauce', 'Garlic', 'Ginger'],
            ],
            [
                'food_name' => 'Grilled Salmon',
                'price' => 60000,
                'food_image' => 'https://img.freepik.com/free-photo/slice-grilled-salmon_144627-6184.jpg',
                'category_id' => 5,
                'description' => 'Grilled Salmon is seasoned to perfection and grilled until tender.',
                'ingredients' => ['Salmon fillet', 'Lemon', 'Butter', 'Dill', 'Salt', 'Pepper'],
            ],
            [
                'food_name' => 'Shrimp Scampi',
                'price' => 55000,
                'food_image' => 'https://img.freepik.com/free-photo/tasty-appetizing-fried-shrimps-pan-dark-stone-background-top-view_1220-6633.jpg',
                'category_id' => 5,
                'description' => 'Shrimp Scampi features succulent shrimp sautéed in garlic and butter.',
                'ingredients' => ['Shrimp', 'Garlic', 'Butter', 'White wine', 'Parsley', 'Lemon juice', 'Pasta'],
            ],
            [
                'food_name' => 'Chocolate Lava Cake',
                'price' => 35000,
                'food_image' => 'https://img.freepik.com/free-photo/chocolate-lava-dessert_1203-6857.jpg',
                'category_id' => 4,
                'description' => 'Chocolate Lava Cake is a decadent dessert with a molten center.',
                'ingredients' => ['Dark chocolate', 'Butter', 'Sugar', 'Eggs', 'Flour', 'Vanilla extract'],
            ],
            [
                'food_name' => 'Cheesecake',
                'price' => 40000,
                'food_image' => 'https://img.freepik.com/free-photo/strawberry-cheesecake-side-view_140725-11353.jpg',
                'category_id' => 4,
                'description' => 'Cheesecake is a creamy dessert with a rich filling on a graham cracker crust.',
                'ingredients' => ['Cream cheese', 'Sugar', 'Graham cracker crust', 'Eggs', 'Vanilla extract', 'Strawberries'],
            ],
        ];
        
        foreach ($menus as $menu) {
            $chef = Chef::whereHas('categories', function ($query) use ($menu) {
                $query->where('categories.id', $menu['category_id']); 
            })->inRandomOrder()->first();
        
            Menu::create([
                'food_name' => $menu['food_name'],
                'price' => $menu['price'],
                'food_image' => $menu['food_image'],
                'chef_id' => $chef ? $chef->id : null, 
                'category_id' => $menu['category_id'],
                'description' => $menu['description'],
                'ingredients' => json_encode($menu['ingredients']), 
                'slug' => Str::slug($menu['food_name']),
            ]);
        }
    
        Menu::factory()->count(100)->create();
    }
}
