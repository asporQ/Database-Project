<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Manage Products</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-6">
    <h1 class="text-3xl font-bold mb-6">Manage Products</h1>

    @if (session('success'))
    <div
        class="alert alert-success bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
        {{ session('success') }}
    </div>
    @endif


    <div class="overflow-auto" style="max-height: 800px;">

        <table class="table-auto w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200 sticky top-0">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Stock</th>
                    <th class="px-4 py-2">Current Discount</th>
                    <th class="px-4 py-2">Assign New Discount</th>
                    <th class="px-4 py-2">Remove Product</th>
                    <th class="px-4 py-2">Discounts</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $product)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $product->name }}</td>
                    <td class="px-4 py-2">
                        {{ $product->price }}
                        <a class="text-blue-500 hover:text-blue-700 ml-2"
                            href="{{ route('products.showUpdatePriceForm', $product->id) }}">Adjust Price</a>
                    </td>
                    <td class="px-4 py-2">
                        {{ $product->stock }}
                        <a class="text-yellow-500 hover:text-yellow-700 ml-2"
                            href="{{ route('products.showUpdateStockForm', $product->id) }}">Fill Stock</a>
                    </td>
                    <td class="px-4 py-2">
                        @if($product->discount)
                        {{ $product->discount->discount_percentage }}% (Valid from {{ $product->discount->start_date }}
                        to
                        {{ $product->discount->end_date }})
                        @else
                        No Discount
                        @endif
                    </td>
                    <td class="px-4 py-2">
                        <form action="{{ route('products.updateDiscount') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <select name="discount_id" class="border rounded px-2 py-1">
                                <option value="">No Discount</option>
                                @foreach($discounts as $discount)
                                <option value="{{ $discount->id }}"
                                    {{ $product->discount_id == $discount->id ? 'selected' : '' }}>
                                    {{ $discount->discount_percentage }}% ({{ $discount->start_date }} -
                                    {{ $discount->end_date }})
                                </option>
                                @endforeach
                            </select>
                            <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 ml-2">Update</button>
                        </form>
                    </td>
                    <td class="px-4 py-2">
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-2 py-2 rounded hover:bg-red-700 ml-14"
                                onclick="return confirm('Are you sure you want to delete this product?');"
                                type="submit">Remove</button>
                        </form>
                    </td>
                    <td class="px-4 py-2">
                        <ul>
                            @foreach ($discounts as $discount)
                            @if ($discount->product_id == $product->id)
                            <li class="flex items-center justify-between">
                                {{ $discount->discount_percentage }}% ({{ $discount->start_date }} to
                                {{ $discount->end_date }})
                                <form action="{{ route('discounts.destroy', $discount->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-700 ml-2"
                                        type="submit">Remove</button>
                                </form>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700 mt-4 inline-block"
        href="{{ route('products.create') }}">Add Product</a>
</body>

</html>