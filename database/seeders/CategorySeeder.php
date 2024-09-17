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
        // Seed some example categories
        Category::create(['name' => 'Beer']);
        Category::create(['name' => 'Wine']);
        Category::create(['name' => 'Liquor']);
    }
}
