@extends('plantilla')

@section('titulo', 'Eventos')

@section('contenido')
<h1>Catálogo de Películas</h1>

@forelse ($catalogo as $catalogo )
    <p> Evento: {{ $catalogo['evento_nombre']}}, {{$catalogo['evento_distancia'] }}, {{ $catalogo['evento_fecha']}}, {{$catalogo['evento_hora'] }}  </p>
    @empty
    <p>No events</p>
@endforelse
@endsection