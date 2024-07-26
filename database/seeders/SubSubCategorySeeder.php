<?php

namespace Database\Seeders;
use App\Models\SubSubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubSubCategory::factory(50)->create();
    }
}
