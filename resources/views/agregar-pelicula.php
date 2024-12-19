<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Película</title>
</head>
<body>
    <h2>Agregar Película</h2>
    <form action="{{ route('agregarPelicula') }}" method="POST">
        @csrf
        <div>
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required>
        </div>
        <div>
            <label for="anio_estreno">Año de estreno:</label>
            <input type="number" id="anio_estreno" name="anio_estreno" required>
        </div>
        <div>
            <label for="director_nombre">Nombre del Director:</label>
            <input type="text" id="director_nombre" name="director_nombre" required>
        </div>
        <div>
            <label for="director_apellido">Apellido del Director:</label>
            <input type="text" id="director_apellido" name="director_apellido" required>
        </div>
        <button type="submit">Agregar Película</button>
    </form>
    
    <!-- Mostrar errores si los hay -->
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
</body>
</html>
