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
                <label for="nombre_director">Nombre del Director:</label>
                <input type="text" id="nombre_director" name="nombre_director" required>
            </div>
            <div>
                <label for="apellido_director">Apellido del Director:</label>
                <input type="text" id="apellido_director" name="apellido_director" required>
            </div>
            <div>
                <label for="anio_estreno">Año de estreno:</label>
                <input type="number" id="anio_estreno" name="anio_estreno" required>
            </div>
            <button type="submit">Agregar Película</button>
        </form>






        {{-- <h2>Agregar Película</h2>
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
        </form> --}}
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


      

        <a href="{{ route('listaPeliculas') }}">
            <button>Ver lista de Peliculas</button>
        </a>


        <a href="{{ route('listaDirectores') }}">
            <button>Ver lista de Directores</button>
        </a>

    </main>
</body>

</html>
