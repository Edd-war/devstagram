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
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(5),
            'contenido' => $this->faker->sentence(20),
            'imagen' => $this->faker->uuid() . '.jpg',
            'user_id' => $this->faker->randomElement([1, 2, 3]),
            // 'imagen' => 'posts/' . $this->faker->image('public/storage/posts', 640, 480, null, false),
            // 'user_id' => \App\Models\User::all()->random()->id,
        ];
    }
}
