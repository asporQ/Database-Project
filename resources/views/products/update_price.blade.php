<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Manage</title>
    </head>

    <body>
        <h1>Adjust Price for {{ $product->name }}</h1>

        <form action="{{ route('products.updatePrice', $product->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="price">Price</label>
                <input class="form-control" id="price" name="price" required step="0.01" type="number"
                    value="{{ old('price', $product->price) }}">
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Update Price</button>
            <a class="btn btn-secondary" href="{{ route('products.manage') }}">Cancel</a>
        </form>

    </body>

</html>
