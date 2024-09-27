<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: Figtree, ui-sans-serif, system-ui, sans-serif;
            background-color: #f8f8f8;
        }

        /* Modal Styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 50; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            background-color: rgba(0, 0, 0, 0.5); /* Black background with opacity */
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            border-radius: 5px;
            width: 90%;
            max-width: 400px;
            text-align: center;
        }

        .modal button {
            padding: 10px 20px;
            margin: 10px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .modal .yes-btn {
            background-color: black;
            color: white;
        }

        .modal .no-btn {
            background-color: black;
            color: white;
        }
    </style>
</head>
<body class="antialiased bg-gray-50">

<div class="min-h-screen bg-white">
    <!-- Navbar -->
    <nav class="p-6 bg-gray-100 shadow-md">
        <div class="container mx-auto flex justify-between">
            <h1 class="text-2xl font-bold">Logo</h1>
            <div class="space-x-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-gray-700">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-700">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-sm font-semibold text-gray-700">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-cover bg-center h-96 relative"
             style="background-image: url('{{ asset('build/assets/cover.png') }}')">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="relative container mx-auto h-full flex flex-col items-center justify-center text-center text-white">
            <h1 class="text-5xl font-bold">The Best Drink at the Best Prices</h1>
            <p class="text-lg mt-4">Find the best drink curated by our experts. Get $50 off your first order!</p>
            <div class="mt-6">
                <input type="email" placeholder="Enter your email address"
                       class="px-4 py-2 w-72 rounded-md focus:ring-2 focus:ring-yellow-500 outline-none">
                <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md">Get $50 off</button>
            </div>
        </div>
    </section>

    <!-- Why You'll Love Us Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold">Why You'll Love Us</h2>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">We bring you the best strong drink at the best prices, curated by
                experts, with free shipping on orders over $50.</p>

                <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2">
                <div>
                    <img src="{{ asset('/build/assets/wine1.png') }}" alt="Wine" class="h-[300px] mx-auto">
                    <h3 class="mt-4 text-lg font-semibold">Great wines, great prices</h3>
                </div>
                <div>
                    <img src="{{ asset('/build/assets/wine2.png') }}" alt="Curated" class="h-[300px] mx-auto">
                    <h3 class="mt-4 text-lg font-semibold">Curated by experts</h3>
                </div>
                <div>
                    <img src="{{ asset('/build/assets/wine3.png') }}" alt="Free Shipping" class="h-[300px] mx-auto">
                    <h3 class="mt-4 text-lg font-semibold">Free shipping over $50</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Us Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold">Need Help Finding the Perfect Wine?</h2>
            <p class="mt-4 text-gray-600">Our team is here to help you select the perfect bottle for any occasion.</p>

            <form class="mt-8 max-w-lg mx-auto text-left">
                <div class="grid grid-cols-1 gap-6">
                    <input type="text" placeholder="Your Name" class="px-4 py-2 border border-gray-300 rounded-md">
                    <input type="email" placeholder="Your Email" class="px-4 py-2 border border-gray-300 rounded-md">
                    <textarea rows="4" placeholder="Your Message"
                              class="px-4 py-2 border border-gray-300 rounded-md"></textarea>
                </div>
                <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 mt-6 rounded-md">Send
                    Message
                </button>
            </form>
        </div>
    </section>

    <!-- Modal -->
    <div id="ageModal" class="modal">
        <div class="modal-content">
            <h2 class="text-xl font-bold mb-4">Are you 20 years old or older?</h2>
            <button class="yes-btn hover:bg-yellow-500 ">Yes</button>
            <button class="no-btn hover:bg-yellow-500 ">No</button>
        </div>
    </div>

</div>

<script>
    // Show modal on page load
    window.onload = function() {
        document.getElementById("ageModal").style.display = "block";
    }

    // Function to close the modal
    function closeModal() {
        document.getElementById("ageModal").style.display = "none";
    }

    // Close modal when clicking Yes or No
    document.querySelector('.yes-btn').addEventListener('click', closeModal);
    document.querySelector('.no-btn').addEventListener('click', closeModal);
</script>

</body>
</html>
