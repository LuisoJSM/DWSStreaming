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
        <h1>Vista de admin</h1>
        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif



        <h2>Agregar Película</h2>
        <form action="{{ route('agregarPelicula') }}" method="POST">
            @csrf
            <div>
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required>
            </div>
            <div>
                <label for="director">Director:</label>
                <input type="text" id="director" name="director" required>
            </div>
            <div>
                <label for="anio_estreno">Año de estreno:</label>
                <input type="number" id="anio_estreno" name="anio_estreno" required>

            </div>
            <button type="submit">Agregar Película</button>
        </form>
        {{-- 
        <h2>Lista de Películas</h2>
        @if ($peliculas->isEmpty())
            <p>No hay películas registradas.</p>
        @else
            <table border="1">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Director</th>
                        <th>Año de Estreno</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peliculas as $pelicula)
                        <tr>
                            <td>{{ $pelicula->titulo }}</td>
                            <td>{{ $pelicula->director }}</td>
                            <td>{{ $pelicula->anio_estreno }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif --}}


        <button> <a href="{{ route('listaPeliculas') }}">Ver lista de Peliculas</a></button>


    </main>
</body>

</html>
