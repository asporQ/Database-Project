<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    @auth
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Cart') }}
            </h2>
        </x-slot>

        <div class="container mx-auto px-[10%] py-6">
            @if ($cartItems->isNotEmpty())
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Cart Items Section -->
                <div class="lg:col-span-2">
                    <ul class="space-y-4">
                        @foreach ($cartItems as $item)
                        <li class="bg-white p-4 rounded-lg shadow-md">
                            <div class="flex items-center space-x-4">
                                <!-- Product Image -->
                                <div class="w-24 h-24">
                                    <img alt="{{ $item->product->name }}" class="w-full h-full object-cover rounded-md"
                                        src="{{ asset('storage/' . $item->product->product_photo) }}">
                                </div>

                                <!-- Product Details -->
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold">{{ $item->product->name }}</h3>
                                    <p class="text-sm text-gray-500">Category: {{ $item->product->category->name }}</p>

                                    <!-- Product Price -->
                                    <div class="mt-2">
                                        <span class="text-gray-800 font-bold">${{ number_format($item->product->price, 2) }}</span>
                                        @if ($item->product->discount)
                                        <div class="text-sm text-red-500">Discount: {{ $item->product->discount->discount_percentage }}% ({{ $item->product->discount->start_date }} - {{ $item->product->discount->end_date }})
                                        </div>
                                        @endif
                                    </div>

                                    <!-- Quantity and Remove Button -->
                                    <div class="mt-4 flex items-center space-x-4">
                                        <span class="text-sm">Quantity: {{ $item->quantity }}</span>

                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:text-red-800 text-sm" type="submit">Remove</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Order Summary Section -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-800">Order Summary</h3>
                    <div class="mt-4 space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-bold text-gray-800">${{ number_format($totalPrice, 2) }}</span>
                        </div>
                        <!-- Add more details if necessary, e.g., shipping costs, taxes -->
                        <div class="flex justify-between">
                            <span class="text-gray-600">Shipping</span>
                            <span class="font-bold text-gray-800">Free</span>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="flex justify-between text-lg font-bold text-gray-800">
                        <span>Total</span>
                        <span>${{ number_format($totalPrice, 2) }}</span>
                    </div>

                    <form action="{{ route('cart.placeOrder') }}" method="POST" class="mt-6">
                        @csrf
                        <button class="w-full bg-black text-white py-3 rounded-md hover:bg-yellow-500" >
                            Place Order
                        </button>
                    </form>
                </div>
            </div>
            
            @else
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <p class="text-gray-600">Your cart is empty.</p>
                <a href="{{ route('orders.index') }}" class="mt-4 text-blue-500 hover:underline">See your order</a>
            </div>
            
            @endif
        </>
    </x-app-layout>
    @endauth
</body>

</html>
