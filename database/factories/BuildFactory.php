<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Fake;

class BuildFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3), // например, «Мощный огненный билд»
            'description' => fake()->paragraph(),
            'skills' => json_encode([
                fake()->word(),
                fake()->word()
            ]),
            'items' => json_encode([
                'меч',
                'щит'
            ]),
            'characteristics' => json_encode([
                'сила' => fake()->numberBetween(10, 100),
                'ловкость' => fake()->numberBetween(10, 100)
            ]),
            'is_published' => fake()->boolean(80), // 80 % шанс публикации
        ];
    }
}
