<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Product List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>


<body>


    <body class="h-full bg-gray-100">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-8">Product List</h1>
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
            @endif

            <div class="bg-white shadow overflow-y-auto h-[968px] sm:rounded-md">
                <ul role="list" class="divide-y divide-gray-200">
                    @foreach ($products as $product)
                    <li>
                        <div class="px-4 py-4 sm:px-6 flex items-center">
                            <div class="min-w-0 flex-1">
                                <h2 class="text-2xl font-semibold text-[#474543] truncate">{{ $product->name }}</h2>
                                <p class="mt-1 text-sm text-gray-600">
                                    Price: <span class=" font-bold text-[#F3B917] text-2xl">${{ $product->price
                                        }}</span>
                                </p>
                                <br>
                                    @if ($product->discount) {
                                    <div>Discount: {{$product->discount->discount_percentage}}%
                                        {{$product->discount->start_date}} -
                                        {{$product->discount->end_date}}</div>
                                    }
                                    @endif

                                    <p class="mt-1 text-sm text-gray-500">Category: {{ $product->category->name }}</p>

                                    <img alt="Product Photo" height="200px" src="storage/{{ $product->product_photo }}">

                                    <p class="mt-1 text-sm text-gray-500 font-bold">Stock: <span
                                            class="font-bold text-2xl">{{ $product->stock }}</span></p>
                                    <!-- <p class="mt-1 text-sm text-gray-500">description : {{ $product->description }}</p> -->

                                    @auth
                                    <form action="{{ route('cart.add') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <input min="1" name="quantity" style="width: 50px;" type="number" value="1">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button class="btn btn-primary" type="submit">Add to Cart</button>
                                    </form>
                                    @else
                                    <p><em>Please log in to add products to your cart.</em></p>
                                    @endauth
                            </div>
                            <div class="ml-4 flex-shrink-0">
                                <img alt="{{ $product->name }}" class=" h-44 w-36 object-cover rounded-md"
                                    src="{{ asset('storage/' . $product->product_photo) }}">
                            </div>
                        </div>
                    </li>
                    <br>
                    @endforeach
                </ul>

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
                        }//,
                        //success: function(response) {
                        //    alert('Product added to cart successfully!');
                        //},
                        //error: function(xhr) {
                        //    alert('Failed to add product to cart.');
                        //}
                    });
                });
            });
                </script>

    </body>

</html>