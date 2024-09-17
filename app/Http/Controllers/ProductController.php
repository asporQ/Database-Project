<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Assuming you have a Product model
use App\Models\Category;

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

    public function create()
    {
        // Fetch all categories for the dropdown
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    // Handle form submission and save the product
    public function store(Request $request)
    {
        // Validate form input
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'product_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload if exists
        $productPhoto = null;
        if ($request->hasFile('product_photo')) {
            $fileName = time() . '_' . $request->file('product_photo')->getClientOriginalName();
            $productPhoto = $request->file('product_photo')->storeAs('uploads/product_photos', $fileName, 'public');
        }

        // Create a new product
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'product_photo' => $productPhoto
        ]);

        return redirect()->route('products.create')->with('success', 'Product created successfully!');
    }
}
