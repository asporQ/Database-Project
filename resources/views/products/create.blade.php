<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Create Product</title>
</head>

<body>
    <h1>Create Product</h1>

    @if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Display validation errors -->
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li style="color: red;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('products.store') }}" enctype="multipart/form-data" method="POST">
        @csrf

        <label for="name">Product Name:</label><br>
        <input id="name" name="name" type="text" value="{{ old('name') }}"><br><br>

        <label for="price">Price:</label><br>
        <input id="price" name="price" type="text" value="{{ old('price') }}"><br><br>

        <label for="stock">Stock:</label><br>
        <input id="stock" name="stock" type="text" value="{{ old('stock') }}"><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description">{{ old('description') }}</textarea><br><br>

        <label for="category_id">Category:</label><br>
        <select id="category_id" name="category_id">
            @foreach ($categories as $category)
            <option {{ old('category_id')==$category->id ? 'selected' : '' }} value="{{ $category->id }}">
                {{ $category->name }}
            </option>
            @endforeach
        </select><br><br>

        <label for="product_photo">Product Photo:</label><br>
        <input id="product_photo" name="product_photo" type="file"><br><br>

        <label for="discount_id">Discount (Optional):</label><br>
        <select id="discount_id" name="discount_id">
            <option value="">No Discount</option>
            @foreach($discounts as $discount)
            <option value="{{ $discount->id }}" {{ old('discount_id')==$discount->id ? 'selected' : '' }}>
                {{ $discount->discount_percentage }}% ({{ $discount->start_date }} to {{ $discount->end_date }})
            </option>
            @endforeach
        </select><br><br>


        <button type="submit">Create Product</button>
    </form>
</body>

</html>