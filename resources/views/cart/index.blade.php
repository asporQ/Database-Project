<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Cart</title>
    </head>

    <body>
        <ul>

            @foreach ($cartItems as $item)
                <li>

                    {{ $item->product->name }} - ${{ $item->product->price }}
                    <br>
                    Quantity: {{ $item->quantity }}
                    <br>
                    Category: {{ $item->product->category->name }}
                    <br>
                    ${{ $item->product->product_photo }}
                    <img alt="Product Photo" height="200px" src="storage/{{ $item->product->product_photo }}">
                    <br>
                    <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Remove</button>
                    </form>
                </li>
            @endforeach
        </ul>

    </body>

</html>
