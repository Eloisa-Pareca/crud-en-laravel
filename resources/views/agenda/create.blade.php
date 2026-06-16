<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Contacto</title>
    <link rel="stylesheet" href="{{ asset('estilos.css') }}">
</head>
<body>
    <div class="contenedor">
        <h1>Agregar Nuevo Contacto</h1>

        <form action="{{ route('agenda.store') }}" method="POST">
            @csrf {{-- Directiva obligatoria de Blade para protección de formularios --}}
            
            <label>Nombre:</label><br>
            <input type="text" name="nombre" value="{{ old('nombre') }}" required><br><br>

            <label>Apellido:</label><br>
            <input type="text" name="apellido" value="{{ old('apellido') }}" required><br><br>

            <label>Teléfono:</label><br>
            <input type="text" name="telefono" value="{{ old('telefono') }}"><br><br>

            <label>Correo:</label><br>
            <input type="email" name="correo" value="{{ old('correo') }}"><br><br>

            <label>Dirección:</label><br>
            <input type="text" name="direccion" value="{{ old('direccion') }}"><br><br>

            <button type="submit" class="boton boton-verde">Guardar Contacto</button>
            <a href="{{ route('agenda.index') }}" class="boton">Cancelar</a>
        </form>
    </div>
</body>
</html>