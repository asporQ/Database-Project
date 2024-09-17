<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Find the categories
        $beer = Category::where('name', 'Beer')->first();
        $wine = Category::where('name', 'Wine')->first();
        $liquor = Category::where('name', 'Liquor')->first();

        // Seed products for each category
        Product::create([
            'name' => 'test1',
            'price' => 699.99,
            'stock' => 50,
            'description' => 'test1 discription.',
            'category_id' => $beer->id,
            'product_photo' => 'test1.jpg'
        ]);

        Product::create([
            'name' => 'test2',
            'price' => 899.99,
            'stock' => 10,
            'description' => 'test2 discription.',
            'category_id' => $wine->id,
            'product_photo' => 'test2.jpg'
        ]);

        Product::create([
            'name' => 'test3',
            'price' => 19.99,
            'stock' => 200,
            'description' => 'test3 discription.',
            'category_id' => $liquor->id,
            'product_photo' => 'test3.jpg'
        ]);
    }
}
