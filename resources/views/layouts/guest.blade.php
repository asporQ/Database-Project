<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{  asset('Logo.png') }}" type="image/x-icon">

    <title>SO FAR SO GOOD SHOP</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#292827] dark:bg-[#292827]">
        <div>
            <a href="/">
                <x-application-logo class="w-40 h-40 fill-current text-gray-500" />

            </a>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-[#FCF7EC] dark:bg-[#FCF7EC] shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>