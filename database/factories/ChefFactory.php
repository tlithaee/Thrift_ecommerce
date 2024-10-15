<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Chef;
use App\Models\Category;

class ChefFactory extends Factory
{
    protected $model = Chef::class;

    /**
     * Define the model's default state.
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,               // Generate a random name
            'bio' => $this->faker->paragraph,           // Generate a random bio
            'photo' => 'https://picsum.photos/400/300?random=' . $this->faker->unique()->numberBetween(1, 10000),  // Generate a unique random image
        ];
    }
}
