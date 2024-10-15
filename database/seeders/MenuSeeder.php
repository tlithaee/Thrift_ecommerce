<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $menuItems = [
            'Appetizers' => [
                [
                    'food_name' => 'Bruschetta',
                    'price' => 25000,
                    'food_image' => 'https://img.freepik.com/free-photo/tapas-appetizers_144627-20863.jpg?t=st=1728983692~exp=1728987292~hmac=1e2956bcd7268eee95a64dced3de4a300bdc99bf73cefb812d745478381893a0&w=740',
                    'chef_name' => 'Chef Giovanni',
                    'description' => 'Bruschetta is a classic Italian appetizer that features toasted bread topped with a mixture of diced tomatoes, garlic, basil, and olive oil. Each bite bursts with freshness and flavor, making it the perfect starter for any meal.',
                    'ingredients' => ['Baguette', 'Tomatoes', 'Garlic', 'Basil', 'Olive oil', 'Salt', 'Pepper'],
                ],
                [
                    'food_name' => 'Garlic Bread',
                    'price' => 30000,
                    'food_image' => 'https://img.freepik.com/free-photo/delicious-orange-bun-table_23-2148858399.jpg?t=st=1728983747~exp=1728987347~hmac=f1de16cc29dbc510ee15503fe6f53f8f098c6c14ad0c1c6a411cc199e60327e0&w=740',
                    'chef_name' => 'Chef Sophia',
                    'description' => 'Garlic bread is a delightful side that enhances the dining experience with its buttery, garlicky goodness. It is made by spreading a mixture of butter, garlic, and parsley on crusty bread, then toasting it to perfection.',
                    'ingredients' => ['Baguette', 'Butter', 'Garlic', 'Parsley', 'Salt'],
                ],
            ],
            'Soup' => [
                [
                    'food_name' => 'Tomato Basil Soup',
                    'price' => 22000,
                    'food_image' => 'https://img.freepik.com/free-photo/borsch-soup-rye-bread_144627-28800.jpg?t=st=1728983769~exp=1728987369~hmac=f40b00a073a141d9a97824b226fe3f0d35a084db4cb49c952671575f83987409&w=740',
                    'chef_name' => 'Chef Marco',
                    'description' => 'Tomato Basil Soup is a comforting dish that captures the essence of summer in every spoonful. Made with ripe tomatoes, fresh basil, and a touch of cream, it is perfect for pairing with crusty bread or grilled cheese.',
                    'ingredients' => ['Tomatoes', 'Basil', 'Onion', 'Garlic', 'Vegetable broth', 'Cream', 'Salt', 'Pepper'],
                ],
                [
                    'food_name' => 'Mushroom Soup',
                    'price' => 25000,
                    'food_image' => 'https://img.freepik.com/free-photo/view-delicious-food-table_23-2149629080.jpg?t=st=1728983812~exp=1728987412~hmac=3d06a392fb0f5b553aa540c95ac196230f346c71cc298c9bc59fcfb61322b7f4&w=740',
                    'chef_name' => 'Chef Anna',
                    'description' => 'Mushroom Soup is a rich and creamy delight that showcases the earthy flavors of mushrooms. It is crafted with a blend of sautéed mushrooms, onions, and herbs, creating a warm and hearty dish that is perfect for chilly days.',
                    'ingredients' => ['Mushrooms', 'Onions', 'Garlic', 'Vegetable broth', 'Cream', 'Thyme', 'Salt', 'Pepper'],
                ],
            ],
            'Entree' => [
                [
                    'food_name' => 'Grilled Chicken',
                    'price' => 50000,
                    'food_image' => 'https://img.freepik.com/free-photo/serving-platter-with-grilled-chicken-pieces-topped-with-sauce_140725-8666.jpg?t=st=1728983853~exp=1728987453~hmac=41b1369adeb93a3ccbaffe28ee2996d6a9c41800092cbb497ba549e6efed78f0&w=740',
                    'chef_name' => 'Chef David',
                    'description' => 'Grilled Chicken is a flavorful and juicy dish marinated in a blend of spices and herbs, then perfectly grilled to achieve a charred exterior. Served with a side of seasonal vegetables, it is a healthy and satisfying meal.',
                    'ingredients' => ['Chicken breast', 'Olive oil', 'Garlic', 'Paprika', 'Salt', 'Pepper'],
                ],
                [
                    'food_name' => 'Vegetable Stir Fry',
                    'price' => 45000,
                    'food_image' => 'https://img.freepik.com/free-photo/stir-fry-chicken-sweet-peppers-green-beans_2829-20110.jpg?t=st=1728983877~exp=1728987477~hmac=821a53ea19086d49f75a0137aef51a3621242435cd9ee9a32d86c485fa596247&w=740',
                    'chef_name' => 'Chef Emily',
                    'description' => 'Vegetable Stir Fry is a vibrant dish packed with an array of fresh vegetables stir-fried to maintain their crunchiness. Tossed in a savory sauce, this dish is both colorful and nutritious, perfect for vegetarian diners.',
                    'ingredients' => ['Broccoli', 'Bell peppers', 'Carrots', 'Soy sauce', 'Garlic', 'Ginger'],
                ],
            ],
            'Seafood' => [
                [
                    'food_name' => 'Grilled Salmon',
                    'price' => 60000,
                    'food_image' => 'https://img.freepik.com/free-photo/slice-grilled-salmon_144627-6184.jpg?t=st=1728983961~exp=1728987561~hmac=207ddfaa2a590aa732bf1d159aa58fe979726c48a249695fcc9f78d6726c0733&w=740',
                    'chef_name' => 'Chef Emma',
                    'description' => 'Grilled Salmon is a deliciously flaky and rich fish, seasoned to perfection and grilled until tender. Accompanied by a light lemon butter sauce, it brings out the natural flavors of the salmon, making it a delightful seafood choice.',
                    'ingredients' => ['Salmon fillet', 'Lemon', 'Butter', 'Dill', 'Salt', 'Pepper'],
                ],
                [
                    'food_name' => 'Shrimp Scampi',
                    'price' => 55000,
                    'food_image' => 'https://img.freepik.com/free-photo/tasty-appetizing-fried-shrimps-pan-dark-stone-background-top-view_1220-6633.jpg?t=st=1728983990~exp=1728987590~hmac=3d812efac3a15f84f3127f80125459527af665a54bfd1c75c8117e8bdc847b60&w=996',
                    'chef_name' => 'Chef Noah',
                    'description' => 'Shrimp Scampi is a classic seafood dish featuring succulent shrimp sautéed in garlic, butter, and a splash of white wine. Served over pasta or with crusty bread, it delivers a rich and aromatic flavor profile that is simply irresistible.',
                    'ingredients' => ['Shrimp', 'Garlic', 'Butter', 'White wine', 'Parsley', 'Lemon juice', 'Pasta'],
                ],
            ],
            'Dessert' => [
                [
                    'food_name' => 'Chocolate Lava Cake',
                    'price' => 35000,
                    'food_image' => 'https://img.freepik.com/free-photo/chocolate-lava-dessert_1203-6857.jpg?t=st=1728983919~exp=1728987519~hmac=8d4cea7867f9a4346aacf26e98642ca44d5ea168589b5f8424516893a9d15ddd&w=360',
                    'chef_name' => 'Chef Olivia',
                    'description' => 'Chocolate Lava Cake is a decadent dessert featuring a rich chocolate exterior that encases a gooey, molten center. Perfectly paired with vanilla ice cream, this indulgent treat will satisfy any chocolate lover’s cravings.',
                    'ingredients' => ['Dark chocolate', 'Butter', 'Sugar', 'Eggs', 'Flour', 'Vanilla extract'],
                ],
                [
                    'food_name' => 'Cheesecake',
                    'price' => 40000,
                    'food_image' => 'https://img.freepik.com/free-photo/strawberry-cheesecake-side-view_140725-11353.jpg?t=st=1728983937~exp=1728987537~hmac=eb62023889d0762c258a52a84598edcbcf3da1a91f5820a75479c4c41d5bfb9&w=740',
                    'chef_name' => 'Chef Ava',
                    'description' => 'Cheesecake is a creamy and smooth dessert with a rich filling made from cream cheese and sugar, set on a buttery graham cracker crust. Topped with fresh strawberries or a berry compote, it is a timeless favorite that delights every palate.',
                    'ingredients' => ['Cream cheese', 'Sugar', 'Graham cracker crust', 'Eggs', 'Vanilla extract', 'Strawberries'],
                ],
            ],
        ];
    
        foreach ($menuItems as $category => $foods) {
            foreach ($foods as $food) {
                Menu::create([
                    'food_name' => $food['food_name'],
                    'price' => $food['price'],
                    'food_image' => $food['food_image'],
                    'chef_name' => $food['chef_name'],
                    'description' => $food['description'],
                    'slug' => Str::slug($food['food_name']),
                    'ingredients' => json_encode($food['ingredients']),
                    'category' => $category,
                ]);
            }
        }
    }
}    