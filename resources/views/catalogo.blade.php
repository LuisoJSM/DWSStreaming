<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo - Películas</title>
</head>

<body>

    @include('layouts.navlogin')

    <main>
        <h1>Catálogo de Películas</h1>
        <!-- Si no hay películas, muestro el mensaje -->
        @if (empty($peliculas))
            <p>No hay películas.</p>
        @else
            <!-- Tabla para mostrar las películas -->
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
                            <td>{{ $pelicula['titulo'] }}</td>
                            <td>{{ $pelicula['director'] }}</td>
                            <td>{{ $pelicula['anio_estreno'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </main>

</body>

</html>
