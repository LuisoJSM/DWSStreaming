@extends('plantilla')
@section('titulo', 'Administrar Catálogo')
@section('contenido')


    @if (session('mensaje'))
        <div style="color: green;">
            <p>{{ session('mensaje') }}</p>
        </div>
    @endif

    <h1>Administrar Catálogo de Películas</h1>

    <!-- Mostrar los eventos actuales -->
    <h2>Catálogo de películas</h2>
    @forelse ($catalogos as $catalogo)
        <p>
            Evento: {{ $catalogo['Titulo'] }},
            Estreno: {{ $catalogo['estreno'] }},
            Director: {{ $catalogo['director'] }}
        </p>
    @empty
        <p>No hay películas en el catálogo.</p>
    @endforelse

    <!-- Formulario para añadir nuevos eventos -->
    <h2>Añadir nuevo evento</h2>
    <form method="POST" action="{{ route('agregarEventoCatalogo') }}">
        @csrf
        <div>
            <label for="Titulo">Título:</label>
            <input type="text" name="Titulo" required>
        </div>
        <div>
            <label for="estreno">Estreno:</label>
            <input type="number" name="estreno" required>
        </div>
        <div>
            <label for="director">Director:</label>
            <input type="text" name="director" required>
        </div>
        <button type="submit">Añadir</button>
    </form>

    <!-- Mensaje de éxito -->
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
@endsection
