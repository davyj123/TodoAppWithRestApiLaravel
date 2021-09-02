<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home | PHP Internship Project</title>
        <link rel="stylesheet" href="{{ asset('frontend/css/index.css') }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
    <div class="nav">
        <div class="log">
            <h3>To Do App</h3>
        </div>
        <div class="nav-links">
            <ul>
            @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </ul>
        </div>
    </div>
            
               

            <div class="wrapper">
                <header>PHP Internship Project (i)</header>
                <h4>Custom User Login System.</h4>
                <p>Complete custom login and signup system in laravel.</p>
                <img style="max-width:300px;" src="{{ asset('frontend/img/main.png') }}" alt="img" width="100%" height="250px">
                <h3>How to Use:</h3>
                <ul style="list-style-type: circle;margin:auto;width:50%;">
                    <li>Register yourself with signup.</li>
                    <li>then, Go to login page, login to your account with saved credentials.</li>
                    <li>After login, You will be redirected to your dashboard.</li>
                    <li>In dashboard, Enjoy the functionalities.</li>
                </ul>
                <p>Developed By: Sudeep Kumar.</p>
            </div>    
        </body>
</html>
