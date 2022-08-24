<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Farmácia</title>

        <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    </head>
    <body class="antialiased">

        <div class="login">
            <h1>Login:</h1>
            <form action="/fazerLogin" method="get"> 
                <div class="textbox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text"placeholder="Email" name="email" required>
                </div>

                <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password"placeholder="Password" name="password" required>
                </div>

                <button class="btn" type="submit" class="">Login</button>
            </form>
        </div>
    </body>
</html>