<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Directores</title>
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
    <h1>Lista de Directores</h1>

    @include('layouts.navadmin')

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($directores as $director)
                <tr>
                    <td>{{ $director->id }}</td>
                    <td>{{ $director->nombre }} {{ $director->apellido }}</td>
                    <td>
                        <a href="{{ route('directores.lista-directores-peliculas', $director->id) }}">Ver Películas</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación de directores -->
    {{ $directores->links() }}

   

</body>

</html>
