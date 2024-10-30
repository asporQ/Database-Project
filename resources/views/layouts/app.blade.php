<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SO FAR SO GOOD SHOP</title>

    <!-- Fonts -->
    {{--
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alumni+Sans:ital,wght@0,100..900;1,100..900&family=Paytone+One&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-[#FCF7EC] ">
        @include('layouts.navigation')


        <!-- Page Heading -->
        @isset($header)
        <header class="  ">

            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <!-- SVG Background -->

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <span class=" svg-container">

            <svg viewBox="200 70 1080 200" class=" top-0 w-screen h-full">
                <path class="wave1"
                    d="M0,160L48,170.7C96,181,192,203,288,202.7C384,203,480,181,576,176C672,171,768,181,864,186.7C960,192,1056,192,1152,186.7C1248,181,1344,171,1392,165.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
                <path class="wave2"
                    d="M0,224L48,213.3C96,203,192,181,288,176C384,171,480,181,576,186.7C672,192,768,192,864,186.7C960,181,1056,171,1152,176C1248,181,1344,203,1392,213.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
                <path class="wave3"
                    d="M0,288L48,272C96,256,192,224,288,213.3C384,203,480,213,576,218.7C672,224,768,224,864,213.3C960,203,1056,181,1152,176C1248,171,1344,181,1392,186.7L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
                <path class="wave4"
                    d="M0,320L48,298.7C96,277,192,235,288,213.3C384,192,480,192,576,213.3C672,235,768,277,864,298.7C960,320,1056,320,1152,298.7C1248,277,1344,235,1392,213.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>

            </svg>

        </span>

    </div>

    <footer class=" alumni-sans-500 bg-[#FCF7EC]    " style="font-size: 100%">
        <div class="container mx-auto text-center text-black ">
            <p>&copy; 2024 SO FAR SO GOOD Shop. All rights reserved.</p>
        </div>
    </footer>

    <!-- Inline CSS for SVG styling -->
    <style>
    .svg-container {
        position: relative;
        width: 100%;
        height: 200px;
        /* Match SVG height */
    }

    .svg-container2 {
        position: inherit;
        width: 100%;
        height: 100px;
        /* Match SVG height */
    }

    .wave1 {
        fill: #F3B917;
    }

    .wave2 {
        fill: #F4C612;
        opacity: 0.8;
    }

    .wave3 {
        fill: #F4C612;
        opacity: 0.5;
    }

    .wave4 {
        fill: #F3B917;
        opacity: 0.3;
    }
    </style>

</body>



</html>