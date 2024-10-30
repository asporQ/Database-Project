<x-app-layout>
    <!-- <img src="{{ asset('Discount.png') }}" alt="so far so good" class="w-fit h-fit mx-auto mb-0 mt-0 relative"> -->
    @php
    $highestDiscount = $discounts->max('discount_percentage');
    @endphp

    @if($highestDiscount)
    <div class="text-4xl py-3 fixed top-20 left-0 right-0 bg-ye text-white p-2 hidden" style="z-index: 1000;"
        id="scroll-bar">

        <a href="/products?category=&discount=30">Special Offers Up to {{ $highestDiscount }}% off!</a>

    </div>
    @endif

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 mt-0 overflow-x-hidden pt-10 ">

        <div class="h-auto sm:rounded-md mt-1 pt-10">
            <div class="pl-3 mt-10 text-5xl font-bold mb-8">OUR PRODUCTS</div>

            <div x-data="{ isOpen: false }" class="relative flex justify-end pr-3">
                <!-- Mobile Hamburger Button -->
                <button @click="isOpen = !isOpen"
                    class="md:hidden ml-auto flex items-center p-2 rounded-lg hover:bg-gray-100" type="button">
                    <svg x-show="!isOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="isOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Desktop Form -->
                <form method="GET" action="{{ route('products.index') }}"
                    class="hidden md:flex space-x-4 items-center p-4 rounded-lg border bg-white shadow-md">
                    <div class="flex flex-col">
                        <label for="category" class="text-lg font-medium mb-1">Category</label>
                        <select name="category" id="category"
                            class="border border-gray-300 rounded px-8 py-1 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('category')==$category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label for="discount" class="text-lg font-medium mb-1">Discount</label>
                        <select name="discount" id="discount"
                            class="border rounded px-6 py-1 text-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">All Discounts</option>
                            <option value="5" {{ request('discount')==5 ? 'selected' : '' }}>5% and above</option>
                            <option value="10" {{ request('discount')==10 ? 'selected' : '' }}>10% and above</option>
                            <option value="20" {{ request('discount')==20 ? 'selected' : '' }}>20% and above</option>
                            <option value="30" {{ request('discount')==30 ? 'selected' : '' }}>30% and above</option>
                        </select>
                    </div>



                    <div class="flex flex-col">
                        <label for="sort" class="text-lg font-medium mb-1">Sort By</label>
                        <select name="sort" id="sort"
                            class="border border-gray-300 rounded px-2 py-1 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Sort By</option>
                            <option value="price_asc" {{ request('sort')=='price_asc' ? 'selected' : '' }}>Price: Low to
                                High</option>
                            <option value="price_desc" {{ request('sort')=='price_desc' ? 'selected' : '' }}>Price: High
                                to Low</option>
                            <option value="name_asc" {{ request('sort')=='name_asc' ? 'selected' : '' }}>Name: A to Z
                            </option>
                            <option value="name_desc" {{ request('sort')=='name_desc' ? 'selected' : '' }}>Name: Z to A
                            </option>
                        </select>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="in_stock" value="1" id="in_stock"
                            {{ request('in_stock') ? 'checked' : '' }} class="mr-2 focus: to-yellowy focus: bg-ye">
                        <label for="in_stock" class="text-lg font-medium">In Stock</label>
                    </div>

                    <button type="submit"
                        class="bg-ye text-xl text-white font-Alumni font-bold rounded px-5 py-2 hover:bg-yellowy focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Apply Filters
                    </button>
                </form>

                <!-- Mobile Menu -->
                <form method="GET" action="{{ route('products.index') }}" x-show="isOpen" @click.away="isOpen = false"
                    class="absolute md:hidden right-0 mt-2 bg-white shadow-lg rounded-lg p-4 w-64 space-y-4 z-50">
                    <div class="space-y-2">
                        <label class="block text-xl font-medium">Category</label>
                        <select name="category" class="w-full border rounded px-2 py-1 text-xl">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category')==$category->id ? 'selected' : ''
                                }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-xl font-medium">Discount</label>
                        <select name="discount" class="w-full border rounded px-2 py-1 text-xl">
                            <option value="">All Discounts</option>
                            <option value="5" {{ request('discount')==5 ? 'selected' : '' }}>5% and above</option>
                            <option value="10" {{ request('discount')==10 ? 'selected' : '' }}>10% and above</option>
                            <option value="20" {{ request('discount')==20 ? 'selected' : '' }}>20% and above</option>
                            <option value="30" {{ request('discount')==30 ? 'selected' : '' }}>30% and above</option>
                        </select>
                    </div>

                    <div class="flex items-center text-xl">
                        <input type="checkbox" name="in_stock" value="1" id="mobile_in_stock" {{ request('in_stock')
                            ? 'checked' : '' }}>
                        <label for="mobile_in_stock" class="ml-2">In Stock</label>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-xl font-medium">Sort By</label>
                        <select name="sort" class="w-full border rounded px-2 py-1 text-xl">
                            <option value="">Sort By</option>
                            <option value="price_asc" {{ request('sort')=='price_asc' ? 'selected' : '' }}>Price: Low to
                                High</option>
                            <option value="price_desc" {{ request('sort')=='price_desc' ? 'selected' : '' }}>Price: High
                                to Low</option>
                            <option value="name_asc" {{ request('sort')=='name_asc' ? 'selected' : '' }}>Name: A to Z
                            </option>
                            <option value="name_desc" {{ request('sort')=='name_desc' ? 'selected' : '' }}>Name: Z to A
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="w-full bg-blue-500 text-white rounded px-5 py-2 hover:bg-blue-600">
                        Apply Filters
                    </button>
                </form>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 p-4 ">

                @foreach ($products as $product)
                <div class="bg-white shadow-md rounded-lg  overflow-hidden flex flex-col">

                    <div class="relative">
                        @auth
                        <div class="absolute top-5 right-3 w-22 h-8 flex items-center justify-center"
                            style="z-index: 10">
                            @if ($product->stock > 0)
                            <div class="bg-yellowy text-black text-xl font-medium px-2 rounded">In Stock:
                                {{ $product->stock }}
                            </div>
                            @else
                            <div class="bg-gray-500 text-white text-xl px-2 rounded">Out Of Stock</div>
                            @endif
                        </div>
                        @if ($product->discount && isset($product->discount->discount_percentage))
                        <div class="absolute top-10 mt-5 right-3 w-22 h-8 flex items-center justify-center"
                            style="z-index: 10">
                            <div class="bg-[#F59758] text-black text-xl px-2 rounded">
                                {{$product->discount->discount_percentage}}% Off!
                                <span id="countdown-{{$product->id}}">00X 00X</span>
                            </div>



                            <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var endDate = new Date("{{ $product->discount->end_date }}").getTime();

                                var countdownFunction = setInterval(function() {
                                    var now = new Date().getTime();
                                    var distance = endDate - now;

                                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 *
                                        60 *
                                        60));
                                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 *
                                        60));
                                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                    document.getElementById("countdown-{{$product->id}}").innerHTML =
                                        days +
                                        "d " + hours + "h " +
                                        minutes + "m " + seconds + "s ";

                                    if (distance < 0) {
                                        clearInterval(countdownFunction);
                                        document.getElementById("countdown-{{$product->id}}")
                                            .innerHTML =
                                            "Discount has ended";
                                    } else if (distance < 3600000) {
                                        document.getElementById("countdown-{{$product->id}}")
                                            .innerHTML =
                                            minutes + "m " + seconds + "s ";
                                    } else if (distance < 86400000) {
                                        document.getElementById("countdown-{{$product->id}}")
                                            .innerHTML =
                                            hours + "h " + minutes + "m ";
                                    } else {
                                        document.getElementById("countdown-{{$product->id}}")
                                            .innerHTML =
                                            days + "d " + hours + "h ";
                                    }
                                }, 1000);
                            });
                            </script>
                        </div>
                        @endif
                        @endauth
                        <div class="flex justify-center">
                            <div
                                class="max-h-80 min-h-80 flex items-center justify-center overflow-hidden transform hover:scale-105 transition duration-300 animate__animated animate__fadeIn animate__delay-2s">

                                <img alt="{{ $product->name }}" class="w-auto h-80 object-contain"
                                    src="{{ $product->product_photo ? asset('storage/' . $product->product_photo) : asset('storage/default_photo.png') }}">
                            </div>
                        </div>
                    </div>

                    <div class="p-4 flex-1 flex flex-col justify-between overflow-hidden text-center">

                        <h2 class="text-3xl  text-black truncate">{{ $product->name }}</h2>
                        <p class="mt-1 text-xl text-gray-500 overflow-ellipsis overflow-hidden">{{
                            $product->description }}</p>
                        @auth

                        @if ($product->discount && isset($product->discount->discount_percentage))
                        <p class="mt-1 text-3xl text-gray-600">
                            Price:
                            <span style="text-decoration: line-through;" class="font-semibold text-[#F3B917] ">
                                ${{ number_format($product->price, 2) }}
                            </span>
                            <span style="margin-left: 10px;" class="font-semibold text-green-500">
                                ${{ number_format(floor($product->price * (1 -
                                $product->discount->discount_percentage/100) * 100) / 100, 2) }}
                            </span>
                        </p>
                        @else
                        <p class="mt-1 text-3xl text-gray-600">
                            Price: <span class="font-semibold text-[#F3B917]">${{ $product->price }}</span>
                        </p>
                        @endif


                        <p class="mt-1 text-xl text-gray-500">Category: {{ $product->category->name }}</p>
                        @endauth
                        @auth
                        <form class="add-to-cart-form mt-2" data-product-id="{{ $product->id }}"
                            style="display: inline;">
                            @csrf
                            @if ($product->stock > 0 )
                            <div class="flex justify-center items-center">
                                <input min="1" name="quantity" class="border rounded text-center text-xl" type="number"
                                    value="1" max="{{ $product->stock }}">
                                <button
                                    class="btn btn-primary ml-2 mt-2 text-center text-xl bg-yellowy rounded my-2 p-2"
                                    type="submit">ADD TO CART</button>
                            </div>
                            @endif
                        </form>
                        @if ($product->stock <= 0 ) <div
                            class="bg-gray-500 ml-2 mt-2 text-center text-xl rounded my-2 p-2 text-white">
                            BACK SOON!
                    </div>
                    @endif

                    @else
                    <a href="{{ route('login') }}" class="mt-2 text-center text-xl bg-yellowy rounded my-2 p-2">
                        LOGIN FOR PRICE AND TO ORDER
                    </a>
                    @endauth
                </div>
            </div>
            @endforeach
        </div>
        @if ($products->isEmpty())
        <div class="flex justify-center items-center p-4">
            <div class="mt-6 text-center ">
                <div class="text-gray-600 text-2xl">0 product found for the filters.
                </div>
                <a href="{{ url('products') }}" class="text-blue-600 hover:underline text-2xl">Clear Filter</a>
            </div>
        </div>
        @endif
        <div class="mt-4">
            {{ $products->appends(request()->query())->links() }}
        </div>

    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                    console.log(xhr)
                    alert('Failed to add product to cart.');
                }
            });
        });

        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $('#scroll-bar').slideDown(100);
            } else {
                $('#scroll-bar').slideUp(100);
            }
        });
    });
    </script>

</x-app-layout>