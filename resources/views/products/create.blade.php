<x-app-layout>

    <div class="py-36  inset-0 overflow-y-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
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
                            <label for="description"
                                class="block text-sm font-medium text-gray-700 mb-1">Description:</label>
                            <textarea id="description" name="description"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 h-32">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="category_id"
                                class="block text-sm font-medium text-gray-700 mb-1">Category:</label>
                            <select id="category_id" name="category_id"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @foreach ($categories as $category)
                                <option {{ old('category_id')==$category->id ? 'selected' : '' }}
                                    value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="product_photo" class="block text-sm font-medium text-gray-700 mb-1">Product
                                Photo:</label>
                            <input id="product_photo" name="product_photo" type="file"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mb-4">
                            <label for="discount_id" class="block text-sm font-medium text-gray-700 mb-1">Discount
                                (Optional):</label>
                            <select id="discount_id" name="discount_id"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">No Discount</option>
                                @foreach($discounts as $discount)
                                <option value="{{ $discount->id }}"
                                    {{ old('discount_id')==$discount->id ? 'selected' : '' }}>
                                    {{ $discount->discount_percentage }}% ({{ $discount->start_date }} to
                                    {{ $discount->end_date }})
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <button type="submit"
                                class="bg-[#474543] text-white py-2 px-4 rounded-md hover:bg-[#282727] focus:outline-none font-semibold focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Create
                                Product</button>
                            <a href="{{ route('products.manage') }}"
                                class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-700 mt-4 inline-block font-semibold">
                                Back to Manage
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>