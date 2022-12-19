<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                text-align: center;
                margin-top: 20%;
            }
            h4{
                font-size: 25px;
            }
        </style>

    </head>
    <body>

        <div>
            <h4>Chat and Url Shortener Web App</h4>

            @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ route('dashboard') }}" >Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" style="padding: 0 1%">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" >Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

    </body>
</html>
