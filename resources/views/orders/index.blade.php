<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Your orders') }}
            </h2>
        </x-slot>

        @auth
        <div class="container mx-auto px-[10%] py-8">

            <!-- Check if any order has the status 'Awaiting payment' -->
            @php
            $hasAwaitingPayment = $orders->contains('status', 'Awaiting payment');
            @endphp

            @if (!$hasAwaitingPayment)
            <div class="mb-6 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4">
                <p class="font-semibold">All your orders have been processed. No pending payments!</p>
            </div>
            @endif

            <!-- Display Orders Table -->
            <div class="bg-white shadow-md rounded-lg overflow-fixed">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 text-center">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Order Date
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Items
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Total Price
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($orders as $order)
                        <tr>

                            <!-- Order Date -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                {{ \Carbon\Carbon::parse($order->order_date)->format('F j, Y') }}
                            </td>

                            <!-- List of Items -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                <ul class="list-disc pl-4">
                                    @foreach($order->items as $item)
                                    <div>{{ '-'}} {{$item->product->name }} (x{{ $item->quantity }})</div>
                                    @endforeach
                                </ul>
                            </td>

                            <!-- Order Status -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $order->status === 'Completed' ? 'bg-green-100 text-green-800' : ($order->status === 'Awaiting payment' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                                    {{ $order->status }}
                                </span>
                            </td>

                            <!-- Total Price -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                ${{ number_format($order->total_price, 2) }}
                            </td>

                            <!-- Actions -->
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                @if ($order->status === 'Awaiting payment')
                                <form action="{{ route('orders.makePayment', $order) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    <button type="submit"
                                        class="text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 rounded-md px-4 py-2">
                                        Make Payment
                                    </button>
                                </form>
                                @else
                                <div>
                                    <p> Completed</p>
                                    <a href="{{ route('orders.viewTranscript', $order) }}"
                                        class="text-blue-600 hover:text-blue-900">View Transcript
                                    </a>
                                </div>
                                @endif
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($orders->isEmpty())
            <div class="mt-6 text-center">
                <p class="text-gray-600">You have no orders yet.</p>
                <a href="{{ route('products') }}" class="text-blue-600 hover:underline">Continue Shopping</a>
            </div>
            @endif
        </div>
        @endauth
    </x-app-layout>
</body>

</html>