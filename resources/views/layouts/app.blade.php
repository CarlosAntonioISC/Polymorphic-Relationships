<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body class="bg-gray-100">
        <nav class="p-6 border-b-2 border-gray-300 bg-white w-full">
            <h1> <a class="text-3xl" href="{{ route('home') }}"> Laravel</a></h1>
        </nav>
        <div class="m-auto container">
   
            @yield('content')
        </div>
    </body>
</html>
