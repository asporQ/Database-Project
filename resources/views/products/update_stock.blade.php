<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Manage</title>
    </head>

    <body>
        <h1>Update Stock for {{ $product->name }}</h1>

        <form action="{{ route('products.updateStock', $product->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="stock">Stock</label>
                <input class="form-control" id="stock" name="stock" required type="number"
                    value="{{ old('stock', $product->stock) }}">
                @error('stock')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Update Stock</button>
            <a class="btn btn-secondary" href="{{ route('products.manage') }}">Cancel</a>
        </form>

    </body>

</html>
