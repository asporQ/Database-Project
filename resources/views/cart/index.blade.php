<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Cart</title>
</head>

<body>
    @auth

    <ul>

        @foreach ($cartItems as $item)
        {{-- <div>{{ $item }}</div> --}}
        <br>
        <li>
            <span>{{ $item->product->name }} - ${{ $item->product->price }} </span>
            @if ($item->product->discount){
            <div>Discount: {{$item->product->discount->discount_percentage}}
                {{$item->product->discount->start_date}} -
                {{$item->product->discount->end_date}}</div>
            <br>
            }
            @endif

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

        <div>{{ $totalPrice }}</div>
        @if ($cartItems->isNotEmpty())
        <form action="{{ route('cart.placeOrder') }}" method="POST">
            @csrf
            <button class="btn btn-primary" type="submit">Place Order</button>
        </form>
        @else
        <p>Your cart is empty.</p>
        @endif
    </ul>
    @endauth
</body>

</html>