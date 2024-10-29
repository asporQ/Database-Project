<x-app-layout>

    @php
    $highestDiscount = $discounts->max('discount_percentage');
    @endphp

    @if($highestDiscount)
    <div class="text-5xl fixed top-20 left-0 right-0 bg-ye text-white p-2 hidden" style="z-index: 1000;"
        id="scroll-bar">

        <p>Special Offers Up to {{ $highestDiscount }}% off!</p>

    </div>
    @endif

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 mt-0 overflow-x-hidden pt-10">

        <div class="h-auto sm:rounded-md mt-1 pt-10">
            <div class="mt-10 text-5xl">OUR PRODUCTS</div>

            <div class="text-xl flex justify-end">
                <form method="GET" action="{{ route('products.index') }}" class="flex space-x-4">

                    <select name="category" class="border rounded px-10 py-1">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category')==$category->id ? 'selected' :
                            '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>

                    <select name="discount" class="border rounded px-10 py-1">
                        <option value="">All Discounts</option>

                        <option value="5" {{ request('discount')==5 ? 'selected' : '' }}>5% and above
                        </option>
                        <option value="10" {{ request('discount')==10 ? 'selected' : '' }}>10% and above
                        </option>
                        <option value="20" {{ request('discount')==20 ? 'selected' : '' }}>20% and above
                        </option>
                        <option value="30" {{ request('discount')==30 ? 'selected' : '' }}>30% and above
                        </option>
                    </select>

                    <div>
                        <input type="checkbox" name="in_stock" value="1" id="in_stock" {{ request('in_stock')
                            ? 'checked' : '' }}>
                        <label for="in_stock" class="ml-3 items-center">In Stock</label>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white rounded px-5 py-1">Filter</button>
                </form>
            </div>


            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 p-4 ">

                @foreach ($products as $product)
                <div class="bg-white shadow-md rounded-lg  overflow-hidden flex flex-col ">

                    <div class="relative">
                        @auth
                        <div class="absolute top-5 right-3 w-22 h-8 flex items-center justify-center ">
                            @if ($product->stock > 0)
                            <div class="bg-yellowy text-black text-xl px-2 rounded">In Stock: {{ $product->stock }}
                            </div>
                            @else
                            <div class="bg-gray-500 text-white text-xl px-2 rounded">Out Of Stock</div>
                            @endif
                        </div>
                        @if ($product->discount && isset($product->discount->discount_percentage))
                        <div class="absolute top-10 mt-5 right-3 w-22 h-8 flex items-center justify-center">
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
                                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 *
                                        60));
                                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
                                    document.getElementById("countdown-{{$product->id}}").innerHTML = days +
                                        "d " + hours + "h " +
                                        minutes + "m " + seconds + "s ";
    
                                    if (distance < 0) {
                                        clearInterval(countdownFunction);
                                        document.getElementById("countdown-{{$product->id}}").innerHTML =
                                            "Discount has ended";
                                    } else if (distance < 3600000) {
                                        document.getElementById("countdown-{{$product->id}}").innerHTML =
                                            minutes + "m " + seconds + "s ";
                                    } else if (distance < 86400000) {
                                        document.getElementById("countdown-{{$product->id}}").innerHTML =
                                            hours + "h " + minutes + "m ";
                                    } else {
                                        document.getElementById("countdown-{{$product->id}}").innerHTML =
                                            days + "d " + hours + "h ";
                                    }
                                }, 1000);
                            });
                            </script>
                        </div>
                        @endif
                        @endauth
                        <div class="flex justify-center">
                            <div class="max-h-80 min-h-80 overflow-hidden">
                                <img alt="{{ $product->name }}" class="w-full h-full object-cover"
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
                        @if ($product->stock <= 0 ) <button onclick="notifyMe(this);"
                            class="flex justify-center items-center w-15 mt-2 text-center text-xl bg-yellowy rounded my-2 p-2">
                            NOTIFY ME WHEN AVAILABLE
                            </button>

                            <script>
                                // Check localStorage for the button state on page load
                                window.onload = function() {
                                    const button = document.getElementById('notifyButton');
                                    const isDisabled = localStorage.getItem('notifyButtonDisabled');
                            
                                    if (isDisabled === 'true') {
                                        button.disabled = true;
                                        button.textContent = 'We will notify you when we fill stock';
                                        button.style.backgroundColor = 'grey';
                                    }
                                };
                            
                                function notifyMe(button) {
                                    // Show alert message
                                    alert('We will notify you when this product is back in stock!');
                                    
                                    // Disable the button, update the text, and change background color to grey
                                    button.disabled = true;
                                    button.textContent = 'We will notify you when we fill stock';
                                    button.style.backgroundColor = 'grey';
                            
                                    // Save the disabled state in localStorage
                                    localStorage.setItem('notifyButtonDisabled', 'true');
                                }
                            </script>
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

            <div class="mt-4">
                {{ $products->links() }}
                <!-- Pagination Links -->
            </div>

            <footer class=" py-6 mt-12">
                <div class="container mx-auto text-center text-black">
                    <p>&copy; 2024 so far so good Shop. All rights reserved.</p>
                </div>
            </footer>
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