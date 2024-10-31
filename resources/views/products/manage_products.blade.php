<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if (session('success'))
                <div
                    class="alert alert-success bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
                @endif

                <div class="flex justify-between items-center mb-4">
                    <form action="{{ route('products.manage') }}" method="GET" class="flex">
                        <input type="text" name="search" placeholder="Search Products..."
                            value="{{ request('search') }}" class="border rounded-l px-4 py-2 w-64">
                        <button type="submit"
                            class="bg-blue-500 text-white rounded-r px-4 py-2 hover:bg-blue-700">Search</button>
                        <a href="{{ route('products.manage') }}"
                            class="bg-gray-300 text-black rounded px-4 py-2 ml-2 hover:bg-gray-400">Clear</a>
                    </form>
                </div>

                <div class="overflow-auto rounded" style="max-height: 800px;">
                    <table class="text-left table-auto w-full bg-white shadow-md rounded-lg overflow-auto">
                        <thead class="bg-gray-200 sticky top-0 text-2xl">
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Price</th>
                                <th class="px-4 py-2">Stock</th>
                                <th class="px-4 py-2">Discount</th>
                                <th class="px-4 py-2">Product Image</th>
                                <th class="text-right px-4 py-2">Remove Product</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if ($products->isEmpty())
                            <tr>
                                <td colspan="7" class="px-4 py-2 text-center text-2xl text-red-500">
                                    No products found for "{{ request('search') }}"
                                </td>
                            </tr>
                            @else
                            @foreach ($products as $product)
                            <tr class="">
                                <td class="px-4 py-2 text-xl">{{ $product->id }}</td>
                                <td class="px-4 py-2 text-xl">{{ $product->name }}</td>
                                <td class="px-4 py-2">
                                    <p class=" text-xl">{{ $product->price }}</p>
                                    <a class="text-blue-500 hover:text-blue-700 "
                                        href="{{ route('products.showUpdatePriceForm', $product->id) }}">Update
                                        Price</a>
                                </td>
                                <td class="px-4 py-2">
                                    <p class=" text-xl">{{ $product->stock }}</p>
                                    <a class="text-yellow-500 hover:text-yellow-700"
                                        href="{{ route('products.showUpdateStockForm', $product->id) }}">Update
                                        Stock</a>
                                </td>

                                <td class="px-4 py-2">
                                    <div class="flex-grow flex items-center justify-start pl-4">
                                        <button onclick="openDiscountModal({{ $product->id }})"
                                            class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-700 ">
                                            Select Discount
                                        </button>
                                    </div>


                                    <!-- Discount Selection Modal -->
                                    <div id="discount-modal-{{ $product->id }}"
                                        class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
                                        <div class="bg-white p-6 rounded shadow-lg ">
                                            <h3 class="text-lg font-semibold mb-4">Select Discount for {{ $product->name
                                                }}</h3>
                                            <form action="{{ route('products.updateDiscount') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <select name="discount_id" class="border rounded px-2 py-1 w-40">
                                                    <option value="">No Discount</option>
                                                    @foreach($discounts as $discount)
                                                    <option value="{{ $discount->id }}" {{ $product->discount_id ==
                                                        $discount->id ? 'selected' : '' }}>
                                                        {{ $discount->discount_percentage }}% ({{ $discount->start_date
                                                        }} - {{ $discount->end_date }})
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <div class="flex justify-end mt-4 ">
                                                    <button type="submit"
                                                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Update
                                                        Discount</button>
                                                    <button type="button"
                                                        onclick="closeDiscountModal({{ $product->id }})"
                                                        class="bg-gray-300 text-black px-4 py-2 rounded hover:bg-gray-400 ml-2 ">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-4 py-2">
                                    <div class="flex justify-center items-center">
                                        <div class="flex items-center w-full max-w-lg px-2">
                                            <div class="flex-shrink-0 w-10 max-h-10 flex items-center justify-center">
                                                @if ($product->product_photo)
                                                <img alt="{{ $product->name }}" class="h-10 object-contain"
                                                    src="{{ asset('storage/' . $product->product_photo) }}">
                                                @else
                                                <span class="text-center">
                                                    <p>No</p>
                                                    <p>Photo</p>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="flex-grow flex items-center justify-end pl-4">
                                                <!-- Button to open modal -->
                                                <button onclick="openModal({{ $product->id }})"
                                                    class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-700">Update
                                                    Image</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div id="modal-{{ $product->id }}"
                                        class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
                                        <div class="bg-white p-6 rounded shadow-lg w-96">
                                            <h3 class="text-lg font-semibold mb-4">Upload Image for {{ $product->name }}
                                            </h3>

                                            <div class="flex-shrink-0 w-full flex items-center justify-center mb-4">
                                                <img id="current-image-{{ $product->id }}" alt="{{ $product->name }}"
                                                    class="h-64 object-contain {{ $product->product_photo ? '' : 'hidden' }}"
                                                    src="{{ $product->product_photo ? asset('storage/' . $product->product_photo) : '' }}">
                                                <span id="no-photo-{{ $product->id }}"
                                                    class="{{ $product->product_photo ? 'hidden' : '' }}">
                                                    <p>No Photo</p>
                                                </span>
                                            </div>

                                            <form action="{{ route('products.updateImage', $product->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" name="product_photo" accept="image/*"
                                                    class="border rounded px-2 py-1 mb-2 w-full" required
                                                    onchange="previewImage(event, {{ $product->id }})">
                                                <div class="flex justify-end">
                                                    <button type="submit"
                                                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Upload</button>
                                                    <button type="button" onclick="closeModal({{ $product->id }})"
                                                        class="bg-gray-300 text-black px-4 py-2 rounded hover:bg-gray-400 ml-2">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </td>

                                <td class="text-right px-4 py-2">
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 text-white px-2 py-2 rounded hover:bg-red-700 ml-14"
                                            onclick="return confirm('Are you sure you want to delete this product?');"
                                            type="submit">Remove</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <a class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700 mt-4 inline-block text-xl"
                    href="{{ route('products.create') }}">Add Product</a>
                <a class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700 mt-4 inline-block text-xl"
                    href="{{ route('discounts.create') }}">Add Discount</a>
                <div class="flex justify-end">
                    <a class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700 mt-4 inline-block font-bold "
                        href="{{ '/products' }}">Back to Products</a>
                </div>
            </div>
        </div>
    </div>

    <script>
    function openDiscountModal(productId) {
        document.getElementById(`discount-modal-${productId}`).classList.remove('hidden');
    }

    function closeDiscountModal(productId) {
        document.getElementById(`discount-modal-${productId}`).classList.add('hidden');
    }
    </script>

    <script>
    function openModal(productId) {
        document.getElementById(`modal-${productId}`).classList.remove('hidden');
    }

    function closeModal(productId) {
        document.getElementById(`modal-${productId}`).classList.add('hidden');
    }
    </script>

    <script>
    function previewImage(event, productId) {
        const input = event.target;
        const currentImage = document.getElementById(`current-image-${productId}`);
        const noPhoto = document.getElementById(`no-photo-${productId}`);

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                currentImage.src = e.target.result;
                currentImage.classList.remove('hidden');
                noPhoto.classList.add('hidden');
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            currentImage.src = currentImage.src;
            currentImage.classList.toggle('hidden', !currentImage.src);
            noPhoto.classList.toggle('hidden', currentImage.src);
        }
    }
    </script>
</x-app-layout>