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
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Lista de Películas</h1>
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
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->titulo }}</td>
                    <td>{{ $cliente->direttor }}</td>
                    <td>{{ $cliente->anio_estreno }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay peliculas disponibles</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
