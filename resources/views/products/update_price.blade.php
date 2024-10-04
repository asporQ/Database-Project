<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Manage</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
</head>

<body class="bg-gray-100 p-6">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6">Update Price for {{ $product->name }}</h1>

        <form action="{{ route('products.updatePrice', $product->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-bold mb-2">Price</label>
                <input class="form-control border border-gray-300 p-2 w-full rounded" id="price" name="price" required
                    step="0.01" type="number" value="{{ old('price', $product->price) }}">
                @error('price')
                <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-between">
                <button class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    type="submit">Update Price</button>
                <a class="btn btn-secondary bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded"
                    href="{{ route('products.manage') }}">Cancel</a>
            </div>
        </form>
    </div>
</body>

</html>