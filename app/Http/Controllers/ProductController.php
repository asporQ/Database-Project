<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $discounts = Discount::active()->get()->keyBy('id');

        $productsToReset = [];
        $unUpdateProducts = Product::with('category')->get();

        foreach ($unUpdateProducts as $product) {
        if ($product->discount_id !== null && !isset($discounts[$product->discount_id])) {
            $productsToReset[] = $product->id;
        }
        }

        if (!empty($productsToReset)) {
        Product::whereIn('id', $productsToReset)->update(['discount_id' => null]);
        }

        $query = Product::with('category');

        if ($request->has('category') && $request->category != '') {
        $query->where('category_id', $request->category);
        }

        if ($request->filled('in_stock')) {
        $query->where('stock', '>', 0);
        }

        if ($request->filled('discount')) {
            $query->whereHas('discount', function ($q) use ($request) {
                $q->where('discount_percentage', '>=', $request->discount);
            });
        }

        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
            }
        }
        
        $products = $query->paginate(12);
        $categories = Category::all();
        $user = Auth::user();

        return view('products.index', compact('user','products', 'discounts', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        $discounts = Discount::active()->get();

        return view('products.create', compact('categories', 'discounts'));
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        if ($product->product_photo && \Storage::disk('public')->exists($product->product_photo)) {
            \Storage::disk('public')->delete($product->product_photo);
        }
        
        $product->delete();

        return redirect()->route('products.manage')->with('success', 'Product removed successfully.');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'discount_id' => 'nullable|exists:discounts,id',
            'product_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $productPhoto = null;
        if ($request->hasFile('product_photo')) {
            $fileName = time() . '_' . str_replace(' ', '-', $request->file('product_photo')->getClientOriginalName());
            $productPhoto = $request->file('product_photo')->storeAs('uploads/product_photos', $fileName, 'public');
        }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'discount_id' => $request->discount_id,
            'product_photo' => $productPhoto
        ]);

        return redirect()->route('products.manage')->with('success', $request->name . ' created successfully!');
    }

    public function manageProducts(Request $request)
    {
        $search = $request->input('search');

        $products = Product::with('discount')
            ->when($search, function ($query) use ($search) {
                return $query->where('name', 'LIKE', "%{$search}%");
            })
            ->get();


        $discounts = Discount::active()->get();

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

    public function updateDiscount(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'discount_id' => 'nullable|exists:discounts,id',
        ]);

        $product = Product::findOrFail($request->product_id);
        $product->discount_id = $request->discount_id;
        $product->save();

        return redirect()->route('products.manage')->with('success', 'Discount updated for product!');
    }


    public function updateProductPhoto(Request $request, $id)
    {
        $request->validate([
            'product_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::findOrFail($id);

        $oldProductPhoto = $product->product_photo;

        if ($request->hasFile('product_photo')) {
            $fileName = time() . '_' . str_replace(' ', '-', $request->file('product_photo')->getClientOriginalName());
            $productPhoto = $request->file('product_photo')->storeAs('uploads/product_photos', $fileName, 'public');

            if ($oldProductPhoto) {
                Storage::disk('public')->delete($oldProductPhoto);
            }

            $product->product_photo = $productPhoto;
            $product->save();
        }

        return redirect()->route('products.manage')->with('success', 'Product image updated successfully!');
    }

}