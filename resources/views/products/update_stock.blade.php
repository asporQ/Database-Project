<x-app-layout>
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md mt-12">
        <h1 class="text-2xl font-bold mb-6">Update Stock for {{ $product->name }}</h1>

        <form action="{{ route('products.updateStock', $product->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group mb-4">
                <label for="stock" class="block text-gray-700 font-bold mb-2">Stock</label>
                <input class="form-control border border-gray-300 p-2 w-full rounded" id="stock" name="stock" required
                    type="number" value="{{ old('stock', $product->stock) }}">
                @error('stock')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-between">
                <button class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    type="submit">Update Stock</button>
                <a class="btn btn-secondary bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded"
                    href="{{ route('products.manage') }}">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
