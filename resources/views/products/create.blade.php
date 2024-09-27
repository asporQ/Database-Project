<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Create Product</title>
<<<<<<< HEAD
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create Product') }}
            </h2>
        </x-slot>

        <div class="container mx-auto px-[10%] py-8">
            @if (session('success'))
            <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3 mb-6" role="alert">
                <p class="font-bold">{{ session('success') }}</p>
            </div>
            @endif

            @if ($errors->any())
            <div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3 mb-6" role="alert">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="bg-white shadow-md rounded-lg p-6">
                <form action="{{ route('products.store') }}" enctype="multipart/form-data" method="POST" class="space-y-6">
                    @csrf

                    <!-- Product Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Enter product name">
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <input id="price" name="price" type="text" value="{{ old('price') }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Enter price">
                    </div>

                    <!-- Stock -->
                    <div>
                        <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                        <input id="stock" name="stock" type="text" value="{{ old('stock') }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Enter available stock">
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description" name="description"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Enter product description">{{ old('description') }}</textarea>
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                        <select id="category_id" name="category_id"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm focus:outline-none focus:ring focus:border-blue-300">
                            @foreach ($categories as $category)
                            <option {{ old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Product Photo -->
                    <div>
                        <label for="product_photo" class="block text-sm font-medium text-gray-700">Product Photo</label>
                        <input id="product_photo" name="product_photo" type="file"
                            class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer bg-gray-50 focus:outline-none focus:ring focus:border-blue-300">
                    </div>

                    <!-- Discount -->
                    <div>
                        <label for="discount_id" class="block text-sm font-medium text-gray-700">Discount (Optional)</label>
                        <select id="discount_id" name="discount_id"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm focus:outline-none focus:ring focus:border-blue-300">
                            <option value="">No Discount</option>
                            @foreach($discounts as $discount)
                            <option value="{{ $discount->id }}" {{ old('discount_id') == $discount->id ? 'selected' : '' }}>
                                {{ $discount->discount_percentage }}% ({{ $discount->start_date }} to {{ $discount->end_date }})
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                                class="w-full bg-black text-white py-2 px-4 rounded-md shadow-sm ">
                            Create Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-app-layout>
=======

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center text-[#F3B917]">Create Product</h1>

        @if (session('success'))
        <p class="text-green-600 mb-4">{{ session('success') }}</p>
        @endif

        <!-- Display validation errors -->
        @if ($errors->any())
        <div class="mb-4">
            <ul class="list-disc list-inside text-red-600">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('products.store') }}" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Product Name:</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price:</label>
                <input id="price" name="price" type="text" value="{{ old('price') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">Stock:</label>
                <input id="stock" name="stock" type="text" value="{{ old('stock') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description:</label>
                <textarea id="description" name="description"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 h-32">{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Category:</label>
                <select id="category_id" name="category_id"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($categories as $category)
                    <option {{ old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="product_photo" class="block text-sm font-medium text-gray-700 mb-1">Product Photo:</label>
                <input id="product_photo" name="product_photo" type="file"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <label for="discount_id">Discount (Optional):</label><br>
        <select id="discount_id" name="discount_id">
            <option value="">No Discount</option>
            @foreach($discounts as $discount)
            <option value="{{ $discount->id }}" {{ old('discount_id')==$discount->id ? 'selected' : '' }}>
                {{ $discount->discount_percentage }}% ({{ $discount->start_date }} to {{ $discount->end_date }})
            </option>
            @endforeach
        </select><br><br>

            <button type="submit"
                class="w-full bg-[#474543] text-white py-2 px-4 rounded-md hover:bg-[#F3B917] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Create
                Product</button>
        </form>
    </div>

>>>>>>> 6eea3ad702e96cf192e3e619707cb706f5266c96
</body>

</html>
