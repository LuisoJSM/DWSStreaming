<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Elenco</title>
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
    <h1>Lista de Elenco</h1>

    @include('layouts.navadmin')

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($elenco as $elencos)
                <tr>
                  
                    <td>{{ $elencos->nombre }} {{ $elencos->apellido }}</td>
                    <td>
                        <a href="{{ route('elenco.lista-elenco-peliculas', $elencos->id) }}">Ver Películas</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación de directores -->
    {{ $elenco->links() }}



</body>

</html>
