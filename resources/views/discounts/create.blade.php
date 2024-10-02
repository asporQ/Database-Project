<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Discount</title>
</head>

<body>
    <h1>Add Discount</h1>

    @if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li style="color: red;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('discounts.store') }}" method="POST">
        @csrf
        <label for="discount_percentage">Discount Percentage:</label><br>
        <input type="number" id="discount_percentage" name="discount_percentage" min="1" max="100"
            value="{{ old('discount_percentage') }}"><br><br>

        <label for="start_date">Start Date:</label><br>
        <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}"><br><br>

        <label for="end_date">End Date:</label><br>
        <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}"><br><br>

        <button type="submit">Add Discount</button>
    </form>


    <h3>Available Discounts:</h3>
    @if($activeDiscounts->isNotEmpty())
    <ul>
        @foreach($activeDiscounts as $discount)
        <li>{{ $discount->discount_percentage }}% valid until {{ $discount->end_date }}</li>
        <form action="{{ route('discounts.destroy', $discount->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit"
                onclick="return confirm('Are you sure you want to delete this discount?')">Delete</button>
        </form>
        @endforeach
    </ul>
    @else
    <li>No active discounts available.</li>
    @endif

    <h3>Expired Discounts:</h3>
    @if($expiredDiscounts->isNotEmpty())
    <ul>
        @foreach($expiredDiscounts as $discount)
        <li>{{ $discount->discount_percentage }}% expired on {{ $discount->end_date }}</li>
        <form action="{{ route('discounts.destroy', $discount->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit"
                onclick="return confirm('Are you sure you want to delete this discount?')">Delete</button>
        </form>
        @endforeach
    </ul>
    @else
    <li>No expired discounts available.</li>
    @endif
</body>

</html>