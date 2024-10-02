<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Manage Discounts</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
</head>

<body>

    <body class="bg-gray-100 p-6">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-2xl font-bold mb-6">Add Discount</h1>

            @if (session('success'))
            <div
                class="alert alert-success bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
            @endif

            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                <div
                    class="alert alert-error bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    {{ $error }}
                </div>
                @endforeach
            </ul>

            @endif

            @if ($errors->any())
            <div>

            </div>
            @endif

            <form action="{{ route('discounts.store') }}" method="POST">
                @csrf
                <label for="discount_percentage" class="text-gray-700 font-bold mb-2">
                    Discount Percentage:</label><br>
                <input type="number" id="discount_percentage" name="discount_percentage" min="1" max="100"
                    value="{{ 0 }}" class="w-52 border border-gray-300 rounded-md p-1">
                %<br><br>

                <label for=" start_date" class="text-gray-700 font-bold mb-2">Start Date:</label><br>
                <input type="date" id="start_date" name="start_date" value="{{ date('Y-m-d') }}"
                    class="w-52 border border-gray-300 rounded-md p-1">
                <br><br>

                <label for="end_date" class="text-gray-700 font-bold mb-2">End Date:</label><br>
                <input type="date" id="end_date" name="end_date" value="{{ date('Y-m-d', strtotime('+1 day')) }}"
                    class="w-52 border border-gray-300 rounded-md p-1">
                <br><br>



                <div>
                    <span><button
                            class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            type="submit">Add Discount</button></span>
                    <span>
                        <a href="{{ route('products.manage') }}"
                            class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-700 mt-4 inline-block font-bold">
                            Back to Manage

                        </a>
                    </span>
                </div>
            </form>



            <div class="bg-white rounded-lg overflow-fixed my-5">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 text-center">
                        <tr>
                            <th scope="col" class="px-2 py-1 text-left text-m font-bold text-gray-700 tracking-wider">
                                Available Discounts:
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-3 py-1 whitespace-nowrap text-m text-gray-800">
                                @if($activeDiscounts->isNotEmpty())
                                <ul>
                                    @foreach($activeDiscounts as $discount)
                                    <li>
                                        <span>{{ $discount->discount_percentage }}% until {{ $discount->end_date
                                            }}</span>
                                        <span>
                                            <form action="{{ route('discounts.destroy', $discount->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-primary bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-1 my-1 rounded"
                                                    onclick="return confirm('Are you sure you want to delete this discount?')">Delete</button>
                                            </form>
                                        </span>
                                    </li>
                                    @endforeach
                                </ul>
                                @else
                                <li>No active discounts available.</li>
                                @endif
                            </td>

                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="bg-white rounded-lg overflow-fixed my-5">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 text-center">
                        <tr>
                            <th scope="col" class="px-2 py-1 text-left text-m font-bold text-gray-700 tracking-wider ">
                                Expired Discounts:
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-3 py-1 whitespace-nowrap text-m text-gray-800">
                                @if($expiredDiscounts->isNotEmpty())
                                <ul>
                                    @foreach($expiredDiscounts as $discount)
                                    <li>
                                        <span> {{ $discount->discount_percentage }}% expired on {{ $discount->end_date
                                            }}</span>
                                        <span>
                                            <form action="{{ route('discounts.destroy', $discount->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-primary bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-1 my-1 rounded"
                                                    onclick="return confirm('Are you sure you want to delete this discount?')">Delete</button>
                                            </form>
                                        </span>


                                    </li>
                                    @endforeach
                                </ul>
                                @else
                                <li>No expired discounts available.</li>
                                @endif
                            </td>

                        </tr>

                    </tbody>
                </table>
            </div>


    </body>

</html>