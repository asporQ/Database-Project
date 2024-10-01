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

    .custom-buttonYes {
        background-color: #f3b917;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 8px;
        font-weight: bold;
    }

    .custom-buttonNo {
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 8px;
        background: #ABABAB;
        opacity: 32%;
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

        <main class="content">
            <div class="centered-content">
                <div>
                    <h1 class="message">This website is for 20 and over</h1>
                    <h2 class="message">Are you 20 or over yet?</h2>
                    <button class="custom-buttonNo">No</button>
                    <a href="{{ url('/guest-content') }}" class="custom-buttonYes">Yes</a>
                </div>
            </div>
        </main>
    </div>

</body>

</html>