<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function create()
    {
        $activeDiscounts = Discount::active()->get();
        $expiredDiscounts = Discount::deactivated()->get();
        return view('discounts.create', compact('activeDiscounts', 'expiredDiscounts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'discount_percentage' => 'required|numeric|min:1|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Discount::create([
            'discount_percentage' => $request->discount_percentage,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('discounts.create')->with('success', 'Discount created successfully!');
    }

    public function destroy($id)
    {
        $discount = Discount::findOrFail($id);
        $discount->delete();

        return redirect()->route('discounts.create')->with('success', 'Discount deleted successfully!');
    }
}