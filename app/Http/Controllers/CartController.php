<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItems;
use App\Models\Discount;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::id();
        $cart = Cart::where('user_id', $user)->first();

        $cartItems = CartItems::with('Product')->get();


        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $discountValue = 0;
            if ($item->product->discount) {
                $discountValue = $item->product->price * $item->product->discount->discount_percentage / 100;
            }
            $totalPrice += ($item->product->price - $discountValue) * $item->quantity;
        }

        return view('cart.index', compact('cartItems', 'cart', 'totalPrice'));
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


    public function placeOrder(Request $request)
    {
        $user = Auth::id();
        $cart = Cart::where('user_id', $user)->first();

        $cartItems = CartItems::with('Product')->get();


        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $discountValue = 0;
            if ($item->product->discount) {
                $discountValue = $item->product->price * $item->product->discount->discount_percentage / 100;
            }
            $totalPrice += ($item->product->price - $discountValue) * $item->quantity;
        }

        if (!$cart) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }


        $order = Order::firstOrCreate([
            'user_id' => Auth::id(),
            'order_date' => now(),
            'total_price' => $totalPrice,
            'status' => 'Awaiting payment',
        ]);

        foreach ($cartItems as $item) {
            $product = Product::find($item->product_id);
            $product->stock -= $item->quantity;
            $product->save();
            $orderItems = OrderItems::firstOrCreate([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
            ]);
        }

        $cart->delete();
        return redirect()->route('cart.index')->with('success', 'Your order has been placed successfully!');
    }

    public function getCartItemCount()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $cart = Cart::where('user_id', $userId)->first();
            if ($cart) {
                $cartItemCount = $cart->items()->count();
                return $cartItemCount;
            }
        }
        return 0;
    }
}
