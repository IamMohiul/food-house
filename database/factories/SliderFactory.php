<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => '/upload/test',
            'offer' => '50%',
            'title' => fake()->sentence(),
            'sub_title' => fake()->sentence(10),
            'short_description' => fake()->sentence(),
            'button_link' => fake()->url(),
            'status' => fake()->boolean(),
        ];
    }
}
