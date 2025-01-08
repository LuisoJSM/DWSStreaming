<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas de {{ $director->nombre }} {{ $director->apellido }}</title>
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
    <h1>Películas de {{ $director->nombre }} {{ $director->apellido }}</h1>

    @include('layouts.navadmin')

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Año de Estreno</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peliculas as $pelicula)
                <tr>
                    <td>{{ $pelicula->id }}</td>
                    <td>{{ $pelicula->titulo }}</td>
                    <td>{{ $pelicula->anio_estreno }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación de películas -->
    {{ $peliculas->links() }}

    <p><a href="{{ route('listaDirectores') }}">Volver a la lista de Directores</a></p>

</body>

</html>
