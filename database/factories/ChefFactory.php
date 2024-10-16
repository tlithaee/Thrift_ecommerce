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
        $backgrounds = [
            "Growing up in a family of restaurateurs, %s discovered their passion for cooking at a young age. They spent countless hours in their family's bustling kitchen, absorbing techniques and flavors that would later influence their culinary style.\n\nAfter formal training at a prestigious culinary institute, %s honed their skills in various high-end restaurants across the country. Their innovative approach to traditional dishes quickly caught the attention of food critics and fellow chefs alike.",
            "%s's culinary journey began unexpectedly during a gap year traveling the world. Fascinated by the diverse flavors and techniques they encountered, they decided to pursue a career in the culinary arts.\n\nReturning home, %s enrolled in a renowned cooking school and later apprenticed under several Michelin-starred chefs. Their unique perspective, shaped by their travels and formal training, has made them a rising star in the culinary world.",
            "Before becoming a chef, %s had a successful career in a completely different field. A life-changing meal at a famous restaurant inspired them to follow their true passion - cooking.\n\nStarting from scratch, %s worked their way up from dishwasher to head chef, absorbing knowledge and techniques at every step. Their unconventional background brings a fresh perspective to their culinary creations, often resulting in unexpected and delightful flavor combinations."
        ];

        $selectedBackground = $this->faker->randomElement($backgrounds);
        $firstName = $this->faker->firstName;
        $bio = sprintf($selectedBackground, $firstName, $firstName);

        return [
            'name' => $firstName . ' ' . $this->faker->lastName,
            'bio' => $bio,
            'photo' => 'https://picsum.photos/400/300?random=' . $this->faker->unique()->numberBetween(1, 10000),
        ];
    }
}