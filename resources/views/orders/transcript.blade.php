<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset=" UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Product List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>

@include('layouts.navigation')

<body class="h-full bg-[#FCF7EC]">

    

    @auth
    <div class="container mx-auto px-[10%] py-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h1 class="text-xl font-bold mb-4">Order Transcript - Order ID: {{ $order->id }}</h1>

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
</body>

</html>