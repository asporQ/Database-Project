<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItems;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::id();
        $cart = Cart::where('user_id', $user)->first();

        $cartItems = CartItems::with('Cart', 'Product')->get();

        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

        $cartItem = CartItems::updateOrCreate(
            [
                'cart_id' => $cart->id,
                'product_id' => $request->product_id,
            ],
            ['quantity' => DB::raw('quantity + ' . $request->quantity)]
        );

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
    }

    public function remove($id)
    {
        $cartItem = CartItems::findOrFail($id);
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed from cart successfully!');
    }
}
