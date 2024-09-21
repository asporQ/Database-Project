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

                        </td>
                    </tr>
                @endforeach

                <a class="btn btn-warning" href="{{ route('products.create', $product->id) }}">Add
                    product</a>
            </tbody>
        </table>


    </body>

</html>
