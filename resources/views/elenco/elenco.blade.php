<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>

<body>




    @include('layouts.navadmin')

    <main>
        <h1>Página para añadir elenco</h1>
        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif



        <h2>Agregar actor o actriz</h2>
        <form action="{{ route('agregarElenco') }}" method="POST">
            @csrf
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div>
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required>
            </div>
            <div>
                <label for="fecha_nacimiento">Año de nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>
            <div>
                <label for="pelicula">Película:</label>
                <select id="pelicula" name="pelicula" required>
                    <option value="">Seleccione una película</option>
                    @foreach($peliculas as $pelicula)
                        <option value="{{ $pelicula->id }}">{{ $pelicula->titulo }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Agregar Elenco</button>
        </form>
        



        <a href="{{ route('adminPeliculas') }}">
            <button>Volver a la página de Adminsitración de Películas</button>
        </a>



    </main>
</body>

</html>
