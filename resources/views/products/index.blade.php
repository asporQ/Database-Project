<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Product List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<nav x-data="{ open: false }" class="bg-[#292827] dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 h-32">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <!-- <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-32 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div> -->
                <!-- @auth -->
                <!-- Navigation Links -->
                <!-- <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div> -->
                <!-- @endauth -->

                <!-- Settings Dropdown -->
                @auth
                <div class="hidden sm:flex sm:items-center sm:ms-6 pl-[1120px]">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <x-dropdown-link>
                                {{ __('Order') }}
                            </x-dropdown-link>
                            <x-dropdown-link>
                                {{ __('Checkout') }}
                            </x-dropdown-link>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                @endauth

                @guest
                <div class="hidden sm:flex sm:items-center sm:ms-6 sm:ml-auto pl-[1133px]">
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-nav-link>
                </div>


                @endguest

            </div>
        </div>
        <div class=" border h-[1px] bg-white rounded-md"></div>
        <div class="text-white">
            <div class="flex justify-between">
                <div class="flex items gap-x-40 my-4">
                    <a
                        class="text-white hover:text-[#F3B917] dark:text-gray-200 dark:hover:text-[#F3B917] cursor-pointer">PRODUCT</a>
                    <a
                        class="ms-4 text-white hover:text-[#F3B917] dark:text-gray-200 dark:hover:text-[#F3B917] cursor-pointer">CATEGORY</a>
                    <a
                        class="ms-4 text-white hover:text-[#F3B917] dark:text-gray-200 dark:hover:text-[#F3B917] cursor-pointer">SALES</a>
                </div>
                <a
                    class="me-2 text-white hover:text-[#F3B917] dark:text-gray-200 dark:hover:text-[#F3B917] my-4 cursor-pointer">CONTACT</a>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                </div>

                <!-- Responsive Settings Options -->
                @auth
                <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}
                        </div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
                @endauth

                @guest
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="px-4">
                        <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                            {{ __('Login') }}
                        </x-responsive-nav-link>
                    </div>
                </div>
                @endguest
            </div>
</nav>

<body class="h-full bg-[#FCF7EC]">
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <x-slot name="header">
            <h2 class="font-black font-inter text-4xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('PRODUCTS') }}
            </h2>
        </x-slot>

        <style>
        select {
            outline: none;
            border: none;
        }
        </style>

        <!-- Dropdown filters -->
        <div class="py-2 px-3">
            <h2 class="font-bold font-inter text-4xl">FILTER</h2>

            <div class="py-4 -mx-56">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                                    Price Range
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

        </div>

        <div class=" h-[968px] sm:rounded-md mt-24">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 gap-x-6 p-4">
                @foreach ($products as $product)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="flex flex-col items-center p-4">
                        <div class="w-full flex justify-end">
                            <p class="text-sm text-gray-500 font-bold">Stock: <span
                                    class="font-bold text-2xl">{{ $product->stock }}</span></p>
                        </div>
                        <img alt="{{ $product->name }}" class="h-44 w-36 object-cover rounded-md mt-2"
                            src="{{ asset('storage/' . $product->product_photo) }}">
                        <div class="mt-4 flex-1 text-center">
                            <h2 class="text-2xl font-semibold text-[#474543] truncate">{{ $product->name }}</h2>
                            <p class="mt-1 text-sm text-gray-600">{{ $product->description }}</p>
                            <p class="mt-1 text-sm text-gray-600">
                                Price: <span class="font-bold text-[#F3B917] text-2xl">${{ $product->price }}</span>
                            </p>
                            @if ($product->discount)
                            <div class="mt-1 text-sm text-gray-600">Discount:
                                {{$product->discount->discount_percentage}}%
                                {{$product->discount->start_date}} - {{$product->discount->end_date}}</div>
                            @endif
                            <p class="mt-1 text-sm text-gray-500">Category: {{ $product->category->name }}</p>

                            @auth
                            <form class="add-to-cart-form mt-2" data-product-id="{{ $product->id }}"
                                style="display: inline;">
                                @csrf
                                <input min="1" name="quantity" style="width: 50px;" type="number" value="1"
                                    max="{{ $product->stock }}">
                                <button class="btn btn-primary" type="submit">Add to Cart</button>
                            </form>
                            @else
                            <p class="mt-2"><em>Please log in to add products to your cart.</em></p>
                            @endauth
                        </div>
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