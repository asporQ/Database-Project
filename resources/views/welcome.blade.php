<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head class=" fixed">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
    body {
        background-color: rgba(252, 247, 236, 0.42);
        font-family: 'Figtree', sans-serif;
    }

    .container {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .header {
        display: flex;
        justify-content: flex-end;
        padding: 1rem;
    }

    .content {
        flex-grow: 1;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .message {
        font-size: 2rem;
        text-align: center;
    }

    .nav-link {
        margin-left: 1rem;
        text-decoration: none;
        color: #000;
    }

    .centered-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
    </style>
</head>

<body className=" fixed">
    <div class="container fixed">
        <header class="header">
            @if (Route::has('login'))
            <nav>
                @auth
                <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="nav-link">Log in</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="nav-link">Register</a>
                @endif
                @endauth
            </nav>
            @endif
        </header>

        <main class="content-center justify-center flex items-center fixed">

            <div>
                <div class="star-wars fixed">
                    @for ($i = 0; $i < 300; $i++) <div class="message"
                        style="font-size: 3rem; font-weight: bold; animation: slide-up 10s linear infinite;">
                        THIS WEBSITE IS FOR 20 AND OVER
                </div>
                @endfor
                <div class="centered-content">
                    <img src="{{ asset('logobig.png') }}" alt="logo" class=" w-fit" />
                </div>

            </div>
    </div>


    <style>
    @keyframes slide-up {
        0% {
            transform: translateY(100%);
            opacity: 0;
        }

        10% {
            opacity: 1;
        }

        90% {
            opacity: 1;
        }

        100% {
            transform: translateY(-900%);
            opacity: 0;
        }
    }

    .star-wars {
        overflow: hidden;
        height: 90vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .message {
        white-space: nowrap;
    }
    </style>
    </div>
    </main>
    </div>
    </main>
    </div>

</body>

</html>