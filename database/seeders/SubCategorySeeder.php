<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {

        SubCategory::factory()->count(30)->create();
    
    }
}
