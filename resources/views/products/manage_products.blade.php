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
                <th>Current Discount</th>
                <th>Assign New Discount</th>
                <th>Remove Product</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}
                    <a class="btn btn-info" href="{{ route('products.showUpdatePriceForm', $product->id) }}">Adjust
                        Price</a>
                </td>
                <td>{{ $product->stock }}
                    <a class="btn btn-warning" href="{{ route('products.showUpdateStockForm', $product->id) }}">Fill
                        Stock</a>
                </td>
                <td>
                    @if($product->discount)
                    {{ $product->discount->discount_percentage }}% (Valid from {{ $product->discount->start_date }} to
                    {{ $product->discount->end_date }})
                    @else
                    No Discount
                    @endif
                </td>

                <td>
                    <form action="{{ route('products.updateDiscount') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <select name="discount_id">
                            <option value="">No Discount</option>
                            @foreach($discounts as $discount)
                            <option value="{{ $discount->id }}" {{ $product->discount_id == $discount->id ? 'selected' :
                                '' }}>
                                {{ $discount->discount_percentage }}% ({{ $discount->start_date }} - {{
                                $discount->end_date }})
                            </option>
                            @endforeach
                        </select>

                        <button type="submit">Update</button>
                    </form>
                </td>

                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
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
                        <form action="{{ route('discounts.destroy', $discount->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Remove</button>
                        </form>
                        @endif
                        @endforeach
                        @endif
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