<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
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
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <h1>Lista de Clientes</h1>
    @include('layouts.navadmin')
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>edad</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->apellido }}</td>
                    <td>{{ $cliente->edad }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay clientes disponibles</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <p><a href="{{ route('adminClientes') }}">Volver a la página de Administración de Clientes</a></p>
</body>
</html>
