@extends('plantilla')
@section('titulo','catálogo')


@section('contenido')
    <!-- Bucle forelse para leer las películas almacenadas -->

@forelse ($catalogos as $catalogo)
    <p> 
        Título: {{ $catalogo['Titulo'] }}, 
        Año estreno: {{ $catalogo['estreno'] }}, 
        Director: {{ $catalogo['director'] }}, 
    </p>
@empty
    <p>No hay películas para mostar</p>
@endforelse
@endsection