<?php

namespace Database\Factories;

use App\Models\Menu;
use App\Models\Chef;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    protected $model = Menu::class;

    public function definition()
    {
        $category = Category::inRandomOrder()->first();

        $chef = Chef::whereHas('categories', function ($query) use ($category) {
            $query->where('categories.id', $category->id);
        })->inRandomOrder()->first();

        return [
            'food_name' => $this->faker->words(rand(1, 3), true),
            'price' => $this->faker->numberBetween(20000, 60000),
            'food_image' => 'https://picsum.photos/400/300?random=' . $this->faker->unique()->numberBetween(1, 10000),
            'category_id' => $category->id,
            'description' => $this->faker->sentence(14),
            'ingredients' => json_encode([$this->faker->word, $this->faker->word, $this->faker->word, $this->faker->word, $this->faker->word]),
            'slug' => $this->faker->words(2, true),
            'chef_id' => $chef ? $chef->id : null,
        ];
    }
}
