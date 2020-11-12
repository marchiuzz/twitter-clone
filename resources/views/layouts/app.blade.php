<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="{{asset('css/main.css')}}" rel="stylesheet">
</head>
<body class="antialiased">

<div id="app">
    <div class="flex">
        <div class="justify-center items-center content-center">
            @auth
                <a href="/logout">Logout</a>
                <a href="/tweets">Dashboard</a>
            @else
                <a href="/login">Login</a>
                <a href="/register">Register</a>
            @endauth

        </div>
    </div>


    <section class="px-8 py-4">
        <header class="container mx-auto">
            <h1><img src="https://seeklogo.com/images/T/twitter-bird-icon-logo-B5634C6F6A-seeklogo.com.png"
                     style="width: 100px"></h1>
        </header>
    </section>


    <section class="px-8">
        <main class="container mx-auto">


            @yield('body')
        </main>
    </section>


</div>


</body>
</html>
