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
        $products = Product::with('category')->get();


        // Return the view and pass the products data
        return view('products.index', ['products' => $products]);
    }
}
