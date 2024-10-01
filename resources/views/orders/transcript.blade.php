<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Orders</title>
    </head>

    <body>
        @auth
            <h1>Order Transcript - Order ID: {{ $order->id }}</h1>

            <p><strong>List</strong>
                @foreach ($orderItems as $item)
                    @if ($order->id == $item->order_id)
                        <p> - {{ $item->product->name }} {{ $item->quantity }} </p>
                    @endif
                @endforeach
            </p>


            <p><strong>User ID:</strong> {{ $order->user_id }}</p>
            <p><strong>Total Price:</strong> {{ $order->total_price }}</p>
            <p><strong>Status:</strong> {{ $order->status }}</p>
            <p><strong>Order Date:</strong> {{ $order->created_at }}</p>
            <p>

                @if ($order->status == 'Completed' && $transcript)
                    <span><strong>Payment:</strong> {{ $transcript->payment_method }} @
                        {{ $transcript->payment_date }}</span>
                @endif
            </p>
            <a class="btn btn-primary" href="{{ route('orders.index') }}">Back to Orders</a>


        @endauth
    </body>

</html>
