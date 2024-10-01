<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Discount</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Add Discount') }}
            </h2>
        </x-slot>

        <div class="container mx-auto px-[10%] py-8">
            @if(session('success'))
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
                <form action="{{ route('discounts.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Discount Percentage -->
                    <div>
                        <label for="discount_percentage" class="block text-sm font-medium text-gray-700">Discount Percentage</label>
                        <input type="number" id="discount_percentage" name="discount_percentage" min="1" max="100"
                            value="{{ old('discount_percentage') }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Enter discount percentage">
                    </div>

                    <!-- Start Date -->
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                        <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm focus:outline-none focus:ring focus:border-blue-300">
                    </div>

                    <!-- End Date -->
                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                        <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-sm focus:outline-none focus:ring focus:border-blue-300">
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                            class="w-full bg-black text-white py-2 px-4 rounded-md shadow-sm">
                            Add Discount
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
