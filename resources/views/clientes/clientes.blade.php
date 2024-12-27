<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>



    @include('layouts.navadmin')

    <main>
        <h1>Vista de admin para la GESTIÓN DE CLIENTES</h1>
        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif



        <h2>Agregar Cliente</h2>
        <form action="{{ route('agregarCliente') }}" method="POST">
            @csrf
            <div>
                <label for="titulo">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div>
                <label for="director">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required>
            </div>
            <div>
                <label for="anio_estreno">Edad:</label>
                <input type="number" id="edad" name="edad" required>

            </div>
            <button type="submit">Agregar Cliente</button>
        </form>

        <button> <a href="{{ route('listaClientes') }}">Ver lista de Clientes</a></button>

    </main>
</body>
