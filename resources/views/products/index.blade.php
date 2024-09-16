<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>
<body>
    <h1>Product List</h1>
    
    @if(empty($products))
        <p>No products found.</p>
    @else
        <ul>
            @foreach($products as $product)
                <li>{{ $product['name'] }} - ${{ $product['price'] }}</li>
            @endforeach
        </ul>
    @endif
</body>
</html>
