<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\SubCategory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategory>
 */
class SubCategoryFactory extends Factory
{
    protected $model = SubCategory::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'categorie_id' => Category::inRandomOrder()->first()->id ?? null, // Provide null if no category is found
            'name' => $this->faker->word,
            'code' => strtoupper(Str::random(5)),
            'description' => $this->faker->paragraph,
            'img_url' => $this->faker->imageUrl(),
            'created_by' => $this->faker->randomDigitNotNull,
            'created_at' => now(),
            'update_by' => $this->faker->randomDigitNotNull,
            'update_at' => now(),
            'delete_by' => null,
            'delete_at' => null,
            'status' => 1
        ];
        
    }
}
