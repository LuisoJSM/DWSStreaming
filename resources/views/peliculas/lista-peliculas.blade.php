<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Películas</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>

<body>
    <h1>Lista de Películas</h1>

    @include('layouts.navadmin')

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Director</th>
                <th>Año de Estreno</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($peliculas as $pelicula)
                <tr>
                    <td>{{ $pelicula->id }}</td>
                    <td>{{ $pelicula->titulo }}</td>
                    <td>{{ $pelicula->director }}</td>
                    <td>{{ $pelicula->anio_estreno }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay peliculas disponibles</td>
                </tr>
            @endforelse
        </tbody>
    </table>


    <p><a href="{{ route('adminPeliculas') }}">Volver a la página de Administración de películas</a></p>

</body>

</html>
