<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Product List</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>

    <body>
        <ul>
            @foreach ($products as $product)
                <li>
                    {{ $product->name }} - ${{ $product->price }}
                    <br>
                    @foreach ($discounts as $discount)
                        @if ($discount->product_id == $product->id)
                            <div>Discount: {{ $discount->discount_percentage }} {{ $discount->start_date }} to
                                {{ $discount->end_date }}</div>
                        @endif
                    @endforeach

                    Category: {{ $product->category->name }}
                    <br>
                    <img alt="Product Photo" height="200px" src="storage/{{ $product->product_photo }}">
                    <br>
                    @auth
                        <form class="add-to-cart-form" data-product-id="{{ $product->id }}" style="display: inline;">
                            @csrf
                            <input min="1" name="quantity" style="width: 50px;" type="number" value="1">
                            <button class="btn btn-primary" type="submit">Add to Cart</button>
                        </form>
                    @else
                        <p><em>Please log in to add products to your cart.</em></p>
                    @endauth

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
    </body>

</html>
