<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="{{  asset('Logo.png') }}" type="image/x-icon">
    <link
        href="https://fonts.googleapis.com/css2?family=Alumni+Sans:ital,wght@0,100..900;1,100..900&family=Paytone+One&display=swap"
        rel="stylesheet">
    <title>SOFARSOGOOD SHOP</title>
    <style>
    .alumni-sans-500 {
        font-family: "Alumni Sans", serif;
        font-optical-sizing: auto;
        font-weight: 500;
        font-style: normal;
    }

    body {
        background-image: url('{{ asset("bg.png") }}');
        background-size: cover;
        background-position: center;
        font-family: 'Figtree', sans-serif;
        min-height: 100vh;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .container {
        background-color: rgba(255, 255, 255, 0.85);
        border-radius: 8px;
        text-align: center;
        width: 100%;
        max-width: 1000px;
        overflow: hidden;
    }

    .txt-lg {
        font-size: 1.25rem;
        margin: 0 20px 1rem;
        font-weight: inherit;
        line-height: 1.4;
    }

    .txt-xl {
        font-size: 1.75rem;
        margin-bottom: 1rem;
        font-weight: bolder;
        padding-top: 1.5rem;
    }

    .btn {
        border: none;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 8px;
        font-weight: bolder;
        width: 90%;
        max-width: 300px;
    }

    .btn-yes {
        background-color: #f3b917;
        color: black;
    }

    .btn-no {
        background-color: #686868;
        color: white;
    }

    .image-container {
        width: 100%;
    }

    .age-image {
        width: 100%;
        height: auto;
        display: block;
    }

    .form-container {
        padding: 20px;
    }

    /* Media Queries */
    @media (min-width: 768px) {
        .container {
            display: flex;
            height: 380px;
        }

        .image-container {
            flex: 1;
        }

        .age-image {
            height: 100%;
            object-fit: cover;
            border-end-start-radius: 8px;
            border-start-start-radius: 8px;
        }

        .form-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .txt-xl {
            font-size: 2rem;
        }

        .txt-lg {
            font-size: 1.5rem;
            margin: 0 50px 1rem;
        }
    }

    /* Additional Media Query for very small screens */
    @media (max-width: 380px) {
        .txt-xl {
            font-size: 1.5rem;
        }

        .txt-lg {
            font-size: 1rem;
        }

        .btn {
            padding: 12px 24px;
            font-size: 14px;
        }
    }
    </style>
</head>

<body class="alumni-sans-500" style="font-size: 100%">
    <div class="container">
        <div class="image-container">
            <img src="{{ asset('age-check-page.png') }}" alt="Age Verification" class="age-image">
        </div>
        <div class="form-container">
            <h1 class="txt-xl">ARE YOU OLD ENOUGH? (20+)</h1>
            <h2 class="txt-lg">Please verify that your age is 20+ to buy & consume alcohol within Global Regulations.
            </h2>
            <a href="/guest-content"><button class="btn btn-yes">YES I AM OLD ENOUGH!</button></a>
            <a href="https://www.youtube.com/watch?v=j8z7UjET1Is&t=3s"><button class="btn btn-no">I'M TOO YOUNG
                    :)</button></a>
        </div>
    </div>
</body>

</html>