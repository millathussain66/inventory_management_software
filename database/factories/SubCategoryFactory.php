<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategory>
 */
class SubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'categorie_id'  => Str::random(1,10),
            'name'          => fake()->unique()->name(),
            'code'          => fake()->unique()->code(),
            'description'   => fake()->description(),
            'e_at'          => now(),
            'e_by'          => 1,
        ];
    }
}
