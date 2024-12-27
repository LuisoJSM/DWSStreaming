<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @include('layouts.navadmin')

    <h1>Vista de admin LOGUEADO</h1>
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif


    <p>Esto es la vista adminLog</p>


    <div><a href="{{ route('adminPeliculas') }}">Ir a la administración de Peliculas</a></div>

    <div><a href="{{ route('adminClientes') }}">Ir a la administración de Clientes</a></div>

</body>

</html>
