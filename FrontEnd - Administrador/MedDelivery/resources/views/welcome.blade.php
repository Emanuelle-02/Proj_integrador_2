<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MedDelivery - Admin</title>

        <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    </head>
    <body class="antialiased">

        <div class="login">
            <h1>MedDelivery</h1>
            <form method="get"> 
                <button class="btn" type="submit">
                    <a href="auth/google" style="width:100%; text-decoration:none">Logar com o Google</a>
                </button>
            </form>
        </div>
    </body>
</html>