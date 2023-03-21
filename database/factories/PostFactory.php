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
            //
            'title' => $this->faker->unique()->sentence,
            'summary' => $this->faker->text(),
            'image_path' => $this->faker->imageUrl(640,480),
            'is_published' => $this->faker->boolean(1),
            'value' => $this->faker->numberBetween(1,100),
            'likes' => $this->faker->numberBetween(1,10),
            'favourites' =>$this->faker->numberBetween(1,5),
        ];
    }
}
