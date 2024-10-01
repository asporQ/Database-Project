<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Order Transcript</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Transcript') }}
            </h2>
        </x-slot>

        @auth
        <div class="container mx-auto px-[10%] py-8">
            <!-- Order Transcript Section -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h1 class="text-xl font-bold mb-4">Order Transcript - Order ID: {{ $order->id }}</h1>

                <!-- Order Items List -->
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Order Items:</h3>
                    <ul class="list-disc list-inside space-y-2">
                        @foreach ($orderItems as $item)
                        @if ($order->id == $item->order_id)
                        <li class="text-gray-600">- {{ $item->product->name }} (x{{ $item->quantity }})</li>
                        @endif
                        @endforeach
                    </ul>
                </div>

                <!-- Order Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p><strong>User:</strong> <span class="text-gray-600">{{ $order->user_id }}</span>
                        </p>
                        <p><strong>Total Price:</strong> <span class="text-gray-600">${{
                                number_format($order->total_price, 2) }}</span></p>
                    </div>
                    <div>
                        <p><strong>Status:</strong>
                            <span
                                class="px-2 py-1 text-xs font-semibold {{ $order->status == 'Completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }} rounded-full">{{
                                $order->status }}</span>
                        </p>
                        <p><strong>Order Date:</strong> <span class="text-gray-600">{{ $order->created_at->format('d M
                                Y, h:i A') }}</span></p>
                    </div>
                </div>

                <!-- Payment Information -->
                @if ($order->status == 'Completed' && $transcript)
                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Payment Information:</h3>
                    <p><strong>Payment Method:</strong> <span class="text-gray-600">{{ $transcript->payment_method
                            }}</span></p>
                    <p><strong>Payment Date:</strong> {{ $order->created_at }}</p>
                </div>
                @endif

                <!-- Back to Orders Button -->
                <div class="mt-6">
                    <a href="{{ route('orders.index') }}"
                        class="inline-block bg-black text-white py-2 px-4 rounded-md hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Back to Orders
                    </a>
                </div>
            </div>
        </div>
        @endauth
    </x-app-layout>
</body>

</html>