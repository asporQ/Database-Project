<!DOCTYPE html>
<html lang="en" class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

        <!-- Dropdown filters -->
        <!-- <div class="py-2 px-3">
            <h2 class="font-bold font-inter text-4xl pl-3">FILTER</h2>

            <div class="py-4 mx-auto">
                <div class="">
                    <div class="flex space-x-4">
                        <div x-data="{ open: false }" class="relative inline-block text-left mt-4">
                            <div>
                                <button @click="open = !open" type="button"
                                    class="inline-flex justify-center w-full px-4 py-2 bg-[#FCF7EC] text-sm font-medium text-gray-700 hover:scale-105 transition-transform duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    id="options-menu" aria-expanded="true" aria-haspopup="true">
                                    % Alcohol
                                    <svg :class="{'transform rotate-180': open}"
                                        class="-mr-1 ml-2 h-5 w-5 transition-transform duration-200"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                            <div x-show="open" @click.away="open = false"
                                class="origin-top-right absolute right-0 mt-2 w-56 rounded-md bg-none " role="menu"
                                aria-labelledby="options-menu">
                                <div class="py-1 pl-40 w-fit " role="none">
                                    @foreach (['< 5%', '5-10%' , '> 10%' ] as $option) <a
                                        class="block px-2 py-2 text-sm text-gray-700 w-fit cursor-pointer hover:scale-110 transition-transform duration-200 hover:bg-[#F4C612] "
                                        role="menuitem">
                                        {{ $option }}
                                        </a>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                        <div x-data="{ open: false }" class="relative inline-block text-left mt-4">
                            <div>
                                <button @click="open = !open" type="button"
                                    class="inline-flex justify-center w-full px-4 py-2 bg-[#FCF7EC] text-sm font-medium text-gray-700 hover:scale-105 transition-transform duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    id="price-options-menu" aria-expanded="true" aria-haspopup="true">
                                    Price
                                    <svg :class="{'transform rotate-180': open}"
                                        class="-mr-1 ml-2 h-5 w-5 transition-transform duration-200"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                            <div x-show="open" @click.away="open = false"
                                class="origin-top-right absolute right-0 mt-2 w-56 rounded-md bg-none " role="menu"
                                aria-labelledby="price-options-menu">
                                <div class="py-1 pl-40 w-fit " role="none">
                                    @foreach (['< $10', '$10 - $50' , '> $50' ] as $priceOption) <a
                                        class="block py-2 text-sm text-gray-700 w-fit cursor-pointer hover:scale-110 transition-transform duration-200 hover:bg-[#F4C612] "
                                        role="menuitem">
                                        {{ $priceOption }}
                                        </a>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> -->

        <div class="h-[968px] sm:rounded-md mt-24">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 gap-x-6 p-4">
                @foreach ($products as $product)
                <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col">
                    <div class="flex justify-end p-4">
                        <p class="text-sm text-gray-500 font-bold">Stock: <span
                                class="font-bold text-2xl">{{ $product->stock }}</span></p>
                    </div>
                    <div class="flex justify-center">
                        <img alt="{{ $product->name }}" class="h-44 w-36 object-cover rounded-md mt-2"
                            src="{{ asset('storage/' . $product->product_photo) }}">
                    </div>
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <div class="text-center">
                            <h2 class="text-2xl font-semibold text-[#474543] truncate">{{ $product->name }}</h2>
                            <p class="mt-1 text-sm text-gray-600">{{ $product->description }}</p>
                            <p class="mt-1 text-sm text-gray-600">
                                Price: <span class="font-bold text-[#F3B917] text-2xl">${{ $product->price }}</span>
                            </p>
                            @if ($product->discount && isset($product->discount->discount_percentage))
                            <div class="mt-1 text-sm text-black">
                                Discount: {{$product->discount->discount_percentage}}%
                                ({{$product->discount->start_date}} - {{$product->discount->end_date}})
                            </div>
                            @endif
                            <p class="mt-1 text-sm text-gray-500">Category: {{ $product->category->name }}</p>
                        </div>
                        @auth
                        <form class="add-to-cart-form mt-2" data-product-id="{{ $product->id }}"
                            style="display: inline;">
                            @csrf
                            <div class="flex justify-center items-center mt-2">
                                <input min="1" name="quantity" style="width: 50px;" type="number" value="1"
                                    max="{{ $product->stock }}">
                                <button class="btn btn-primary ml-2" type="submit">Add to Cart</button>
                            </div>
                        </form>
                        @else
                        <p class="mt-2 text-center"><em>Please log in to add products to your cart.</em></p>
                        @endauth
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <script>
        $(document).ready(function() {
            $('.add-to-cart-form').on('submit', function(e) {
                e.preventDefault();



                var form = $(this);
                var productId = form.data('product-id');
                var quantity = form.find('input[name="quantity"]').val();

                $.ajax({
                    url: "{{ route('cart.add') }}",
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
        });
        </script>
    </div>
</body>

</html>