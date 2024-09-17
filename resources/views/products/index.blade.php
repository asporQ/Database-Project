<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>
<body>
<ul>
    @foreach($products as $product)
        <li>
            {{ $product->name }} - ${{ $product->price }} 
            <br>
            Category: {{ $product->category->name }}
        </li>
    @endforeach
</ul>

</body>
</html>
