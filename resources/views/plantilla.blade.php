<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>@yield('titulo')</title>
</head>
<body>
    <nav>
        <!-- MENÚ DE NAVEGACIÓN -->
        @include('layouts.partials.nav')
    </nav>
    <div class="container">
        @yield('contenido')
    </div>
</body>
</html>
