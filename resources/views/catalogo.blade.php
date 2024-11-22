@extends('plantilla')
@section('titulo','catálogo')


@section('contenido')

@forelse ($catalogos as $catalogo)
    <p> 
        Evento: {{ $catalogo['Titulo'] }}, 
        Distancia: {{ $catalogo['estreno'] }}, 
        Fecha: {{ $catalogo['director'] }}, 
    </p>
@empty
    <p>No events</p>
@endforelse
@endsection