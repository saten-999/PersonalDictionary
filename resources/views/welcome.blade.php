<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Personal Dictionary</title>

        <link href="css/app.css" rel="stylesheet">
 
    </head>
    <body>
        <div  id="welcome">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md" >
                    Welcome Your Dictionary
                </div>

                <p>
                    For use please 
                    <a href="/register">Register</a>
                    Or
                    <a href="/login">Log In</a>
                </p>
            </div>
        </div>
    </body>
</html>
