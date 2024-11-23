@extends('plantilla')
@section('titulo', 'Página de películas')
@section('contenido')


    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <form action="/procesar-datos" method="POST">
        @csrf
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <br>
        <label for="clave">Clave:</label>
        <input type="password" id="clave" name="clave" required>
        <br>
        <button type="submit">Iniciar Sesión</button>
    </form>

@endsection
