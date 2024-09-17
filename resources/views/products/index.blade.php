<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Product List</title>
    </head>

    <body>
        <ul>$products</ul>

        <ul>
            @foreach ($products as $product)
                <li>
                    {{ $product->name }} - ${{ $product->price }}
                    <br>
                    Category: {{ $product->category->name }}
                    <br>
                    ${{ $product->product_photo }}
                    <img alt="Product Photo" height="200px" src="storage/{{ $product->product_photo }}">
                </li>
            @endforeach
        </ul>

    </body>

</html>
