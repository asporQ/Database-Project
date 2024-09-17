<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed categories for different types of alcohol
        Category::create(['name' => 'Beer']);
        Category::create(['name' => 'Wine']);
        Category::create(['name' => 'Whiskey']);
        Category::create(['name' => 'Vodka']);
        Category::create(['name' => 'Rum']);
        Category::create(['name' => 'Tequila']);
        Category::create(['name' => 'Gin']);
    }
}
