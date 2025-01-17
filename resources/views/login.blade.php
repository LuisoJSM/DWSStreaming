<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>

<body>
    @include('layouts.nav')
    <main>
        <h1>Login Admin</h1>
        @if (session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif

        <form action="{{ route('autenticar') }}" method="POST">
            @csrf
            <div>
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>
            <div>
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </main>
</body>

</html>
