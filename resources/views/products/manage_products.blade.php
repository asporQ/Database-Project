<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Manage</title>
    </head>

    <body>
        <h1>Manage Products</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}
                            <a class="btn btn-info"
                                href="{{ route('products.showUpdatePriceForm', $product->id) }}">Adjust Price</a>
                        </td>
                        <td>{{ $product->stock }}
                            <a class="btn btn-warning"
                                href="{{ route('products.showUpdateStockForm', $product->id) }}">Fill Stock</a>
                        </td>
                        <td>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this product?');"
                                    type="submit">Remove</button>
                            </form>
                        </td>
                        <td>
                            <ul>
                                @if ($discounts)
                                    @foreach ($discounts as $discount)
                                        @if ($discount->product_id == $product->id)
                                            <li>{{ $discount->discount_percentage }}% ({{ $discount->start_date }} to
                                                {{ $discount->end_date }})</li>
                                            <form action="{{ route('discounts.destroy', $discount->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">Remove</button>
                                            </form>
                                        @endif
                                    @endforeach
                                @endif
                                <a class="btn btn-primary"
                                    href="{{ route('products.showDiscountForm', $product->id) }}">Set
                                    Discount</a>
                            </ul>

                        </td>
                    </tr>
                @endforeach

                <a class="btn btn-warning" href="{{ route('products.create', $product->id) }}">Add
                    product</a>
            </tbody>
        </table>


    </body>

</html>
