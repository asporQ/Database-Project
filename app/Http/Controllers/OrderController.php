<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\OrderItems;
use App\Models\Transcript;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::id();
        $orders = Order::where('user_id', $user)->get();

        $orderItems = OrderItems::with('Product')->get();


        return view('orders.index', compact('user', 'orders', 'orderItems'));
    }

    public function makePayment(Order $order)
    {

        $order->update(['status' => 'Completed']);


        $transcript = Transcript::firstOrCreate([
            'order_id' => $order->id,
            'payment_method' => 'Cash',// lazy to implement so fixed to Cash only
            'payment_date' => now(),
        ]);

        return redirect()->route('orders.index')->with('success', 'Payment made successfully.');
    }

    public function viewTranscript(Order $order)
    {
        $transcript = Transcript::where('order_id', $order->id)->first();

        $user = User::where('id', Auth::id())->first();

        $orderItems = OrderItems::where('order_id', $order->id)->with('Product')->get();
        return view('orders.transcript', compact('user' ,'order', 'orderItems', 'transcript'));
    }

}