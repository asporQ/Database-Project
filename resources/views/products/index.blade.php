<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Product List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full bg-gray-100">
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Product List</h1>

        <div class="bg-white shadow overflow-y-auto h-[968px] sm:rounded-md">
            <ul role="list" class="divide-y divide-gray-200">
                @foreach ($products as $product)
                <li>
                    <div class="px-4 py-4 sm:px-6 flex items-center">
                        <div class="min-w-0 flex-1">
                            <h2 class="text-2xl font-semibold text-[#474543] truncate">{{ $product->name }}</h2>
                            <p class="mt-1 text-sm text-gray-600">
                                Price: <span class=" font-bold text-[#F3B917] text-2xl">${{ $product->price }}</span>
                            </p>
                            <p class="mt-1 text-sm text-gray-500">Category: {{ $product->category->name }}</p>
                            <p class="mt-1 text-sm text-gray-500 font-bold">Stock: <span
                                    class="font-bold text-2xl">{{ $product->stock }}</span></p>
                            <!-- <p class="mt-1 text-sm text-gray-500">description : {{ $product->description }}</p> -->
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            <img alt="{{ $product->name }}" class=" h-44 w-36 object-cover rounded-md"
                                src="{{ asset('storage/' . $product->product_photo) }}">
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>

</html>