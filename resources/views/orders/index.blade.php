<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Orders</title>
    </head>

    <body>
        @auth
            <h1>Orders</h1>
            <div>{{ $orders }}</div>
            <div>{{ $orderItems }}</div>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>

                            <td>{{ $order->status }}</td>
                            <td>
                                @if ($order->status !== 'Completed')
                                    <form action="{{ route('orders.makePayment', $order) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        <button class="btn btn-success" type="submit">Make Payment</button>
                                    </form>
                                @endif
                                <a class="btn btn-secondary" href="{{ route('orders.viewTranscript', $order) }}">View
                                    Transcript</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>



        @endauth
    </body>

</html>
