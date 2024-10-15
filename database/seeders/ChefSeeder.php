<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chef;
use App\Models\Category;

class ChefSeeder extends Seeder
{
    public function run()
    {
        // Fetch all categories
        $categories = Category::all();

        // Create chefs and assign them to a random category
        $bonnie = Chef::create([
            'name' => 'Bonnie Green',
            'bio' => 'Hailing from a small town in Tuscany, Bonnie brings authentic Italian flavors to every dish she creates.',
            'photo' => 'images/chef-1.png',
        ]);
        $bonnie->categories()->attach($categories->random(2));

        $john = Chef::create([
            'name' => 'John Doe',
            'bio' => 'John\'s culinary journey began in Paris, where he honed his skills in classical French techniques at prestigious Michelin-starred restaurants.',
            'photo' => 'images/chef-2.png',
        ]);
        $john->categories()->attach($categories->random(3));

        $alice = Chef::create([
            'name' => 'Alice Brown',
            'bio' => 'Alice discovered her love for baking while traveling through Europe, drawing inspiration from the continent\'s rich pastry traditions.',
            'photo' => 'images/chef-3.png',
        ]);
        $alice->categories()->attach($categories->random(2));

        $david = Chef::create([
            'name' => 'David Lee',
            'bio' => 'Growing up in Texas, David developed a deep appreciation for smoky flavors and slow-cooked meats, which he now incorporates into his innovative cuisine.',
            'photo' => 'images/chef-4.png',
        ]);
        $david->categories()->attach($categories->random(3));

        Chef::factory()->count(50)->create()->each(function ($chef) use ($categories) {
            $chef->categories()->attach($categories->random(rand(2, 3)));  // Attach 2-3 random categories
        });
    }
}
