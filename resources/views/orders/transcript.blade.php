<x-app-layout>




    @auth
    <div class="container mx-auto px-[10%] py-8">
        <div class="mt-20 bg-white p-6 rounded-lg shadow-md">
            <h1 class="text-3xl font-bold mb-4">Transcript - Order ID: {{ $order->id }}</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>

                    <p class="text-xl"><strong>Customer:</strong> <span class="text-gray-600">{{ $user->first_name }} {{
                            $user->last_name }}</span>
                    </p>
                    <div class="mb-4 py-2 text-xl">
                        <p><strong>Order Items:</strong></p>
                        <ul class="list-disc list-inside space-y-2">
                            @foreach ($orderItems as $item)
                            @if ($order->id == $item->order_id)
                            <li class="text-gray-600 mx-6"> {{ $item->product->name }} (x{{ $item->quantity }})</li>
                            @endif
                            @endforeach

                        </ul>
                    </div>
                    <p class="text-xl"><strong>Total Price:</strong> <span class="text-gray-600">${{
                            number_format($order->total_price, 2) }}</span></p>
                </div>
                <div>

                    @if ($order->status == 'Completed' && $transcript)
                    <div class="mt-6 ">
                        <h3 class="text-2xl font-semibold mb-2">Payment Information:</h3>
                        <p class="text-xl"><strong>Status:</strong>
                            <span
                                class="px-2 py-1 font-bold {{ $order->status == 'Completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }} rounded-full">{{
                                $order->status }}</span>
                        </p>
                        <p class="text-xl"><strong>Payment Method:</strong> <span class="text-gray-600">{{
                                $transcript->payment_method
                                }}</span></p>
                        <p class="text-xl"><strong>Payment Date:</strong> {{ $order->created_at }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Payment Information -->


            <p class="text-xl"><strong>Order Date:</strong> <span class="text-gray-600">{{
                    $order->created_at->format('d M
                    Y, h:i A') }}</span></p>

            <!-- Back to Orders Button -->
            <div class="mt-6 text-xl">
                <a href="{{ route('orders.index') }}"
                    class="inline-block bg-yellow-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Back to Orders
                </a>
            </div>
        </div>
    </div>
    @endauth

</x-app-layout>