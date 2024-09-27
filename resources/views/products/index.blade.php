<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Product List</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Products') }}
            </h2>
        </x-slot>

        <div class="container mx-auto px-[10%] py-6">
            <div class="grid grid-cols-2  md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">{{ $product->name }} </h3>

                        <!-- Show product image -->
                        <img class="w-full h-50 object-cover mb-4 rounded-[15px]"
                            src="{{ $product->product_photo ? asset('storage/' . $product->product_photo) : 'https://via.placeholder.com/200' }}"
                            alt="{{ $product->name }}">

                        <span class="text-black">${{ number_format($product->price, 2) }}</span>

                        <!-- Show Discount if available -->
                        @if ($product->discount)
                        <div class="text-sm text-red-600">
                            Discount: {{$product->discount->discount_percentage}}% ({{$product->discount->start_date}} - {{$product->discount->end_date}})
                        </div>
                        @endif

                        <div class="text-gray-600 mb-2">
                            Category: {{ $product->category->name }}
                        </div>

                        <!-- Add to Cart Form -->
                        @auth
                        <form class="add-to-cart-form" data-product-id="{{ $product->id }}" class="flex items-center space-x-2">
                            @csrf
                            <div class="flex flex-row justify-center space-x-4">
                                <div class="flex items-center space-x-2">
                                    <!-- Decrement Button -->
                                    <button type="button" class="decrement-btn w-6 h-6 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:outline-none">
                                        -
                                    </button>
                                    
                                    <!-- Quantity Input -->
                                    <input min="1" name="quantity" type="number" value="1"
                                        class="border border-gray-300 rounded-md w-16 text-center">
                                    
                                    <!-- Increment Button -->
                                    <button type="button" class="increment-btn  w-6 h-6  bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:outline-none">
                                        +
                                    </button>
                                </div>
                                <button class="bg-black text-white rounded-md px-4 py-2 hover:bg-[#F3B917] focus:outline-none">
                                    <svg class="w-4 h-4 fill-current text-white " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/>
                                    </svg>
                                </button>
                            </div>
                        </form>
                        @else
                        <p class="text-sm text-gray-500 italic">Please log in to add products to your cart.</p>
                        @endauth
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </x-app-layout>

    <!-- jQuery AJAX Logic -->
    <script>
        $(document).ready(function() {
            // Handle form submission
            $('.add-to-cart-form').on('submit', function(e) {
                e.preventDefault();

                var form = $(this);
                var productId = form.data('product-id');
                var quantity = form.find('input[name="quantity"]').val();

                // Ensure we have a valid quantity
                if (quantity < 1) {
                    alert('Quantity must be at least 1.');
                    return;
                }

                // Ajax request to add the product to the cart
                $.ajax({
                    url: "{{ route('cart.add') }}", // Ensure this route is defined correctly
                    method: "POST",
                    data: {
                        _token: $('input[name="_token"]').val(),
                        product_id: productId,
                        quantity: quantity
                    },
                    success: function(response) {
                        alert('Product added to cart successfully!');
                    },
                    error: function(xhr) {
                        alert('Failed to add product to cart.');
                    }
                });
            });

            // Handle increment and decrement button clicks
            $('.increment-btn').on('click', function() {
                var form = $(this).closest('form'); // Get the form this button belongs to
                var quantityInput = form.find('input[name="quantity"]');
                var currentValue = parseInt(quantityInput.val());

                // Increment the quantity by 1
                quantityInput.val(currentValue + 1);
            });

            $('.decrement-btn').on('click', function() {
                var form = $(this).closest('form'); // Get the form this button belongs to
                var quantityInput = form.find('input[name="quantity"]');
                var currentValue = parseInt(quantityInput.val());

                // Decrement the quantity but not below 1
                if (currentValue > 1) {
                    quantityInput.val(currentValue - 1);
                }
            });
        });

    </script>
</body>

</html>
