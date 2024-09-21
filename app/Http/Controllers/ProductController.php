<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('category')->get();

        $discounts = Discount::all();

        return view('products.index', compact('products', 'discounts'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $discount = Discount::find($product->id);


        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        if ($discount) {
            $discount->delete();
        }

        $product->delete();
        return redirect()->route('products.manage')->with('success', 'Product removed successfully.');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'product_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $productPhoto = null;
        if ($request->hasFile('product_photo')) {
            $fileName = time() . '_' . $request->file('product_photo')->getClientOriginalName();
            $productPhoto = $request->file('product_photo')->storeAs('uploads/product_photos', $fileName, 'public');
        }

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

    public function manageProducts()
    {
        $products = Product::all();
        $discounts = Discount::all();
        return view('products.manage_products', compact('products', 'discounts'));
    }

    public function showUpdateStockForm($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return view('products.update_stock', compact('product'));
    }

    public function updateStock(Request $request, $id)
    {
        $request->validate(['stock' => 'required|integer|min:0']);

        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->stock = $request->stock;
        $product->save();

        return redirect()->route('products.manage')->with('success', 'Stock updated successfully');
    }

    public function showUpdatePriceForm($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return view('products.update_price', compact('product'));
    }

    public function updatePrice(Request $request, $id)
    {
        $request->validate([
            'price' => 'required|numeric|min:0',
        ]);

        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->price = $request->price;
        $product->save();

        return redirect()->route('products.manage')->with('success', 'Price updated successfully.');
    }

    public function showDiscountForm($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return view('products.discount', compact('product'));
    }

    public function setDiscount(Request $request, $id)
    {
        $request->validate([
            'discount_percentage' => 'required|numeric|min:0|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $discount = Discount::firstOrCreate([
            'product_id' => $id,
            'discount_percentage' => $request->discount_percentage,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('products.manage')->with('success', 'Discount set successfully.');
    }

    public function destroyDiscount($id)
    {
        $discount = Discount::find($id);

        if (!$discount) {
            return response()->json(['message' => 'Discount not found'], 404);
        }

        $discount->delete();

        return redirect()->route('products.manage')->with('success', 'Discount removed successfully.');
    }

}
