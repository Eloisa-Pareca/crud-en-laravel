<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Contacto</title>
    <link rel="stylesheet" href="{{ asset('estilos.css') }}">
</head>
<body>
    <div class="contenedor">
        <h1>Editar Contacto</h1>

        <form action="{{ route('agenda.update', $contacto->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Simulamos el método PUT de HTTP para actualizaciones --}}
            
            <label>Nombre:</label><br>
            <input type="text" name="nombre" value="{{ old('nombre', $contacto->nombre) }}" required><br><br>

            <label>Apellido:</label><br>
            <input type="text" name="apellido" value="{{ old('apellido', $contacto->apellido) }}" required><br><br>

            <label>Teléfono:</label><br>
            <input type="text" name="telefono" value="{{ old('telefono', $contacto->telefono) }}"><br><br>

            <label>Correo:</label><br>
            <input type="email" name="correo" value="{{ old('correo', $contacto->correo) }}"><br><br>

            <label>Dirección:</label><br>
            <input type="text" name="direccion" value="{{ old('direccion', $contacto->direccion) }}"><br><br>

            <button type="submit" class="boton boton-verde">Actualizar Contacto</button>
            <a href="{{ route('agenda.index') }}" class="boton">Cancelar</a>
        </form>
    </div>
</body>
</html>