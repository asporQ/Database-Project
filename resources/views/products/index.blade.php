<x-app-layout>

    <div class="fixed top-0 left-0 right-0 bg-gray-800 text-white p-4 hidden" style="z-index: 1000;" id="scroll-bar">
        <p>Special Offers and Discounts!</p>
    </div>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 mt-0 overflow-x-hidden">
        <div class="h-auto sm:rounded-md mt-1">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 p-4">
                @foreach ($products as $product)
                <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col">

                    <div class="relative">
                        @auth
                        <div
                            class="absolute top-5 right-1 w-22 h-8 flex items-center justify-center bg-yellowy text-white text-sm font-bold px-1 rounded">
                            @if ($product->stock > 0)
                            In Stock: <span class="font-bold text-sm">{{ $product->stock }}</span>
                            @else
                            <span class="text-white px-1 rounded text-sm flex items-center justify-center">Sold
                                Out</spaan>
                                @endif
                        </div>
                        @endauth
                        <div class="flex justify-center">
                            <div class="max-h-80 min-h-80 overflow-hidden">
                                <img alt="{{ $product->name }}" class="w-full h-full object-cover"
                                    src="{{ $product->product_photo ? asset('storage/' . $product->product_photo) : asset('storage/default_photo.png') }}">
                            </div>
                        </div>
                    </div>

                    <div class="p-4 flex-1 flex flex-col justify-between overflow-hidden text-center">
                        <h2 class="text-2xl font-semibold text-[#474543] truncate">{{ $product->name }}</h2>
                        <p class="mt-1 text-sm text-gray-600 overflow-ellipsis overflow-hidden">{{
                            $product->description }}</p>
                        @auth
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
                        @endauth
                        @auth
                        <form class="add-to-cart-form mt-2" data-product-id="{{ $product->id }}"
                            style="display: inline;">
                            @csrf
                            @if ($product->stock > 0 )
                            <div class="flex justify-center items-center mt-2">
                                <input min="1" name="quantity" class="w-16 p-1 border rounded" type="number" value="1"
                                    max="{{ $product->stock }}">
                                <button class="btn btn-primary  font-bold ml-2 p-2 bg-yellowy text-black rounded"
                                    type="submit">Add to Cart</button>
                            </div>
                            @else
                            <div
                                class="flex justify-center items-center w-15 mt-2 font-bold ml-2 p-2 bg-yellowy text-black rounded">
                                OUT OF STOCK
                            </div>
                            @endif
                        </form>
                        @else
                        <a href="{{ route('login') }}" class="mt-2 text-center bg-yellowy rounded m-2 font-bold"
                            style="font-size: 16px;">
                            REGISTER AND LOGIN FOR PRICE AND TO ORDER.
                        </a>
                        @endauth
                    </div>
                </div>
                @endforeach
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
                            alert('Failed to add product to cart.');
                        }
                    });
                });

                $(window).scroll(function() {
                    if ($(this).scrollTop() > 100) {
                        $('#scroll-bar').slideDown();
                    } else {
                        $('#scroll-bar').slideUp();
                    }
                });
            });
    </script>

</x-app-layout>