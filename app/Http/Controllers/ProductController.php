<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Assuming you have a Product model

class ProductController extends Controller
{
    // Function to show the list of products
    public function index()
    {
        // Fetch all products from the database
        // $products = Product::all();

        $products = [
            ['name' => 'Product 1', 'price' => 10],
            ['name' => 'Product 2', 'price' => 20],
            ['name' => 'Product 3', 'price' => 30]
        ];

        // Return the view and pass the products data
        return view('products.index', ['products' => $products]);
    }
}
