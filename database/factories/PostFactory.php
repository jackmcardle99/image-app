<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1,1),
            'title' => $this->faker->unique()->sentence,
            'summary' => $this->faker->text(),
            'image_filename' => $this->faker->image('storage/app/public/uploads',640,480),
            'is_published' => $this->faker->boolean(70),
            'value' => $this->faker->numberBetween(1,100),
        ];
    }
}
