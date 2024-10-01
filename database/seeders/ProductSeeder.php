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
        $whiskey = Category::where('name', 'Whiskey')->first();
        $vodka = Category::where('name', 'Vodka')->first();
        $rum = Category::where('name', 'Rum')->first();
        $tequila = Category::where('name', 'Tequila')->first();
        $gin = Category::where('name', 'Gin')->first();

        // Seed products for each category
        Product::create([
            'name' => 'Heineken',
            'price' => 3.99,
            'stock' => 100,
            'description' => 'A pale lager beer brewed by Heineken.',
            'category_id' => $beer->id,
            //'product_photo' => 'heineken.jpg'
        ]);

        Product::create([
            'name' => 'Corona Extra',
            'price' => 4.50,
            'stock' => 80,
            'description' => 'A pale lager produced by Cervecería Modelo in Mexico.',
            'category_id' => $beer->id,
            // 'product_photo' => 'corona_extra.jpg'
        ]);

        Product::create([
            'name' => 'Château Margaux',
            'price' => 299.99,
            'stock' => 5,
            'description' => 'A famous Bordeaux wine from France.',
            'category_id' => $wine->id,
            // 'product_photo' => 'chateau_margaux.jpg'
        ]);

        Product::create([
            'name' => 'Jack Daniel\'s',
            'price' => 29.99,
            'stock' => 50,
            'description' => 'Tennessee whiskey with a smooth flavor.',
            'category_id' => $whiskey->id,
            // 'product_photo' => 'jack_daniels.jpg'
        ]);

        Product::create([
            'name' => 'Smirnoff Vodka',
            'price' => 19.99,
            'stock' => 75,
            'description' => 'Triple distilled vodka, known for its purity.',
            'category_id' => $vodka->id,
            // 'product_photo' => 'smirnoff.jpg'
        ]);

        Product::create([
            'name' => 'Captain Morgan',
            'price' => 25.99,
            'stock' => 40,
            'description' => 'Spiced rum with a smooth, rich taste.',
            'category_id' => $rum->id,
            // 'product_photo' => 'captain_morgan.jpg'
        ]);

        Product::create([
            'name' => 'Jose Cuervo',
            'price' => 34.99,
            'stock' => 60,
            'description' => 'Tequila made from blue agave plants.',
            'category_id' => $tequila->id,
            // 'product_photo' => 'jose_cuervo.jpg'
        ]);

        Product::create([
            'name' => 'Bombay Sapphire',
            'price' => 31.99,
            'stock' => 50,
            'description' => 'Premium gin with a balanced blend of botanicals.',
            'category_id' => $gin->id,
            // 'product_photo' => 'bombay_sapphire.jpg'
        ]);
    }
}
