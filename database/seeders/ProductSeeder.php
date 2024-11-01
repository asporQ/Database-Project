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

        // Array of products to seed
        $products = [
            // Beer category  Cabernet Sauvignon.png
            ['name' => 'Heineken', 'price' => 3.99, 'stock' => 100,'product_photo' => 'temp/product_photo/Amstel Light.png', 'description' => 'A pale lager beer brewed by Heineken.', 'category_id' => $beer->id],
            ['name' => 'Corona Extra', 'price' => 4.50, 'stock' => 80, 'product_photo' => 'temp/product_photo/CoronaExtra.png', 'description' => 'A pale lager produced by Cervecería Modelo in Mexico.', 'category_id' => $beer->id],
            ['name' => 'Budweiser', 'price' => 3.75, 'stock' => 120, 'product_photo' => 'temp/product_photo/Budweiser.png', 'description' => 'American-style pale lager.', 'category_id' => $beer->id],
            ['name' => 'Coors Light', 'price' => 3.50, 'stock' => 100, 'product_photo' => 'temp/product_photo/Coors Light.png', 'description' => 'Popular American light beer.', 'category_id' => $beer->id],
            ['name' => 'Miller Lite', 'price' => 3.60, 'stock' => 90, 'product_photo' => 'temp/product_photo/Miller Lite.png', 'description' => 'Light beer with a crisp taste.', 'category_id' => $beer->id],
            ['name' => 'Blue Moon', 'price' => 4.25, 'stock' => 60, 'product_photo' => 'temp/product_photo/Blue Moon.png', 'description' => 'Wheat beer with a hint of orange.', 'category_id' => $beer->id],
            ['name' => 'Stella Artois', 'price' => 4.10, 'stock' => 85, 'product_photo' => 'temp/product_photo/Stella Artois.png', 'description' => 'Belgian pilsner.', 'category_id' => $beer->id],
            ['name' => 'Guinness Draught', 'price' => 5.00, 'stock' => 70, 'product_photo' => 'temp/product_photo/Guinness Draught.png', 'description' => 'Irish dry stout.', 'category_id' => $beer->id],
            ['name' => 'Amstel Light', 'price' => 3.80, 'stock' => 65, 'product_photo' => 'temp/product_photo/Amstel Light.png', 'description' => 'Low-calorie lager.', 'category_id' => $beer->id],
            ['name' => 'Pabst Blue Ribbon', 'price' => 2.99, 'stock' => 110, 'product_photo' => 'temp/product_photo/Pabst Blue Ribbon.png', 'description' => 'American lager with a light, crisp taste.', 'category_id' => $beer->id],
            ['name' => 'Samuel Adams Boston Lager', 'price' => 4.50, 'stock' => 80, 'product_photo' => 'temp/product_photo/Samuel Adams Boston Lager.png', 'description' => 'Rich, full-flavored lager from Samuel Adams.', 'category_id' => $beer->id],
            ['name' => 'Beck\'s', 'price' => 3.99, 'stock' => 90, 'product_photo' => 'temp/product_photo/Beck\'s.png', 'description' => 'German pilsner with a hoppy taste.', 'category_id' => $beer->id],
            ['name' => 'Leffe Blonde', 'price' => 4.75, 'stock' => 75, 'product_photo' => 'temp/product_photo/Leffe Blonde.png', 'description' => 'Belgian pale ale with a smooth finish.', 'category_id' => $beer->id],
            ['name' => 'Hoegaarden', 'price' => 4.20, 'stock' => 85, 'product_photo' => 'temp/product_photo/Hoegaarden.png', 'description' => 'Belgian wheat beer with coriander and orange peel.', 'category_id' => $beer->id],
            ['name' => 'Sapporo Premium', 'price' => 4.30, 'stock' => 70, 'product_photo' => 'temp/product_photo/Sapporo Premium.png', 'description' => 'Japanese pale lager with a light taste.', 'category_id' => $beer->id],
            ['name' => 'Asahi Super Dry', 'price' => 4.50, 'stock' => 80, 'product_photo' => 'temp/product_photo/Asahi Super Dry.png', 'description' => 'Popular Japanese dry lager.', 'category_id' => $beer->id],
            ['name' => 'Newcastle Brown Ale', 'price' => 4.10, 'stock' => 90, 'product_photo' => 'temp/product_photo/Newcastle Brown Ale.png', 'description' => 'English brown ale with a caramel flavor.', 'category_id' => $beer->id],
            ['name' => 'Dos Equis Lager', 'price' => 3.80, 'stock' => 75, 'product_photo' => 'temp/product_photo/Dos Equis Lager.png', 'description' => 'Mexican lager with a balanced taste.', 'category_id' => $beer->id],
            ['name' => 'Sierra Nevada Pale Ale', 'price' => 4.75, 'stock' => 65, 'product_photo' => 'temp/product_photo/Sierra Nevada Pale Ale.png', 'description' => 'American pale ale with a hoppy character.', 'category_id' => $beer->id],
            ['name' => 'Shiner Bock', 'price' => 3.99, 'stock' => 85, 'product_photo' => 'temp/product_photo/Shiner Bock.png', 'description' => 'American bock-style beer from Texas.', 'category_id' => $beer->id],
            ['name' => 'Yuengling Traditional Lager', 'price' => 3.75, 'stock' => 95, 'product_photo' => 'temp/product_photo/Yuengling Traditional Lager.png', 'description' => 'Popular American amber lager.', 'category_id' => $beer->id],
            ['name' => 'Red Stripe', 'price' => 4.20, 'stock' => 80, 'product_photo' => 'temp/product_photo/Red Stripe.png', 'description' => 'Jamaican lager with a smooth taste.', 'category_id' => $beer->id],
            ['name' => 'Anchor Steam', 'price' => 4.50, 'stock' => 70, 'product_photo' => 'temp/product_photo/Anchor Steam.png', 'description' => 'California common beer with a distinct flavor.', 'category_id' => $beer->id],
            ['name' => 'Lagunitas IPA', 'price' => 5.00, 'stock' => 60, 'product_photo' => 'temp/product_photo/Lagunitas IPA.png', 'description' => 'Popular American IPA with a hoppy taste.', 'category_id' => $beer->id],
            ['name' => 'Modelo Especial', 'price' => 4.00, 'stock' => 75, 'product_photo' => 'temp/product_photo/Modelo Especial.png', 'description' => 'Mexican lager with a full, rich flavor.', 'category_id' => $beer->id],
            ['name' => 'Peroni Nastro Azzurro', 'price' => 4.10, 'stock' => 85, 'product_photo' => 'temp/product_photo/Peroni Nastro Azzurro.png', 'description' => 'Italian lager with a refreshing taste.', 'category_id' => $beer->id],
            ['name' => 'Birra Moretti', 'price' => 4.15, 'stock' => 65, 'product_photo' => 'temp/product_photo/Birra Moretti.png', 'description' => 'Italian pale lager with a balanced taste.', 'category_id' => $beer->id],
            ['name' => 'Pacifico', 'price' => 3.90, 'stock' => 90, 'product_photo' => 'temp/product_photo/Pacifico.png', 'description' => 'Mexican pilsner-style lager.', 'category_id' => $beer->id],
            ['name' => 'Old Speckled Hen', 'price' => 4.30, 'stock' => 55, 'product_photo' => 'temp/product_photo/Old Speckled Hen.png', 'description' => 'English ale with a smooth finish.', 'category_id' => $beer->id],
            ['name' => 'Kingfisher', 'price' => 3.70, 'stock' => 100, 'product_photo' => 'temp/product_photo/Kingfisher.png', 'description' => 'Indian pale lager with a smooth flavor.', 'category_id' => $beer->id],
            
            // Wine category
            ['name' => 'Château Margaux', 'price' => 299.99, 'stock' => 5, 'product_photo' => 'temp/product_photo/Château Margaux.png', 'description' => 'A famous Bordeaux wine from France.', 'category_id' => $wine->id],
            ['name' => 'Moët & Chandon', 'price' => 59.99, 'stock' => 30, 'product_photo' => 'temp/product_photo/Moët & Chandon.png', 'description' => 'Famous Champagne from France.', 'category_id' => $wine->id],
            ['name' => 'Dom Pérignon', 'price' => 199.99, 'stock' => 15, 'product_photo' => 'temp/product_photo/Dom Pérignon.png', 'description' => 'Prestige Champagne brand.', 'category_id' => $wine->id],
            ['name' => 'Pinot Noir', 'price' => 19.99, 'stock' => 40, 'product_photo' => 'temp/product_photo/Pinot Noir.png', 'description' => 'Classic red wine.', 'category_id' => $wine->id],
            ['name' => 'Cabernet Sauvignon', 'price' => 24.99, 'stock' => 50, 'product_photo' => 'temp/product_photo/Cabernet Sauvignon.png', 'description' => 'Rich red wine.', 'category_id' => $wine->id],
            ['name' => 'Merlot', 'price' => 18.99, 'stock' => 60, 'product_photo' => 'temp/product_photo/Merlot.png', 'description' => 'Soft, round red wine.', 'category_id' => $wine->id],
            ['name' => 'Sauvignon Blanc', 'price' => 16.99, 'stock' => 55, 'product_photo' => 'temp/product_photo/Sauvignon Blanc.png', 'description' => 'Crisp, refreshing white wine.', 'category_id' => $wine->id],
            ['name' => 'Riesling', 'price' => 14.99, 'stock' => 45, 'product_photo' => 'temp/product_photo/Riesling.png', 'description' => 'Sweet white wine.', 'category_id' => $wine->id],
            ['name' => 'Chardonnay', 'price' => 21.99, 'stock' => 40, 'description' => 'Popular white wine.', 'category_id' => $wine->id],
            ['name' => 'Zinfandel', 'price' => 22.99, 'stock' => 50, 'description' => 'Bold red wine.', 'category_id' => $wine->id],

            // Whiskey category
            ['name' => 'Jack Daniel\'s', 'price' => 29.99, 'stock' => 50, 'description' => 'Tennessee whiskey with a smooth flavor.', 'category_id' => $whiskey->id],
            ['name' => 'Glenfiddich 12', 'price' => 42.99, 'stock' => 25, 'description' => 'Single malt Scotch whisky.', 'category_id' => $whiskey->id],
            ['name' => 'Chivas Regal', 'price' => 35.99, 'stock' => 70, 'description' => 'Blended Scotch whisky.', 'category_id' => $whiskey->id],
            ['name' => 'Jameson Irish Whiskey', 'price' => 27.99, 'stock' => 65, 'description' => 'Popular Irish whiskey.', 'category_id' => $whiskey->id],
            ['name' => 'Maker\'s Mark', 'price' => 31.99, 'stock' => 55, 'description' => 'Handcrafted bourbon whiskey.', 'category_id' => $whiskey->id],
            ['name' => 'Buffalo Trace', 'price' => 29.99, 'stock' => 35, 'description' => 'Kentucky bourbon.', 'category_id' => $whiskey->id],
            ['name' => 'Crown Royal', 'price' => 32.99, 'stock' => 45, 'description' => 'Canadian blended whisky.', 'category_id' => $whiskey->id],
            ['name' => 'Johnnie Walker Black Label', 'price' => 39.99, 'stock' => 40, 'description' => 'Smooth Scotch whisky.', 'category_id' => $whiskey->id],
            ['name' => 'Bulleit Bourbon', 'price' => 33.99, 'stock' => 50, 'description' => 'Spicy bourbon whiskey.', 'category_id' => $whiskey->id],
            ['name' => 'Redbreast 12 Year', 'price' => 49.99, 'stock' => 30, 'description' => 'Rich Irish whiskey.', 'category_id' => $whiskey->id],

            // Vodka category
            ['name' => 'Smirnoff Vodka', 'price' => 19.99, 'stock' => 75, 'description' => 'Triple distilled vodka, known for its purity.', 'category_id' => $vodka->id],
            ['name' => 'Absolut Vodka', 'price' => 22.99, 'stock' => 80, 'description' => 'Swedish vodka with a smooth finish.', 'category_id' => $vodka->id],
            ['name' => 'Grey Goose', 'price' => 34.99, 'stock' => 60, 'description' => 'French vodka known for its quality.', 'category_id' => $vodka->id],
            ['name' => 'Belvedere Vodka', 'price' => 39.99, 'stock' => 55, 'description' => 'Polish rye vodka.', 'category_id' => $vodka->id],
            ['name' => 'Tito\'s Handmade Vodka', 'price' => 28.99, 'stock' => 75, 'description' => 'American craft vodka.', 'category_id' => $vodka->id],

            // Rum category
            ['name' => 'Captain Morgan', 'price' => 25.99, 'stock' => 40, 'description' => 'Spiced rum with a smooth, rich taste.', 'category_id' => $rum->id],
            ['name' => 'Bacardi Superior', 'price' => 18.99, 'stock' => 90, 'description' => 'Popular white rum.', 'category_id' => $rum->id],
            ['name' => 'Malibu Coconut Rum', 'price' => 15.99, 'stock' => 70, 'description' => 'Rum with a coconut flavor.', 'category_id' => $rum->id],

            // Tequila category
            ['name' => 'Jose Cuervo', 'price' => 21.99, 'stock' => 60, 'description' => 'Well-known brand for smooth tequila.', 'category_id' => $tequila->id],
            ['name' => 'Patron Silver', 'price' => 39.99, 'stock' => 45, 'description' => 'Premium silver tequila.', 'category_id' => $tequila->id],

            // Gin category
            ['name' => 'Bombay Sapphire', 'price' => 27.99, 'stock' => 55, 'description' => 'Popular gin with a hint of citrus.', 'category_id' => $gin->id],
            ['name' => 'Tanqueray', 'price' => 26.99, 'stock' => 60, 'description' => 'London Dry Gin with a classic flavor.', 'category_id' => $gin->id]
        ];

        // Insert each product into the database
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}