<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Agenda Laravel</title>
    {{-- En Laravel, los CSS se vinculan usando asset() --}}
    <link rel="stylesheet" href="{{ asset('estilos.css') }}">
</head>
<body>
    <div class="contenedor">
        <h1>Agenda de Contactos</h1>

        {{-- Usamos la función route() para generar la URL segura --}}
        <a class="boton boton-verde" href="{{ route('agenda.create') }}">+ Nuevo contacto</a>

        {{-- Mostrar mensajes de éxito (Reemplaza tu validación de $_GET) --}}
        @if (session('success'))
            <div class="mensaje ok">
                {{ session('success') }}
            </div>
        @endif

        <table class="tabla">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Dirección</th>
                <th>Fecha registro</th>
                <th>Acciones</th>
            </tr>

            {{-- El bucle foreach de Blade es mucho más limpio que mysqli_fetch_assoc --}}
            @forelse ($contactos as $contacto)
                <tr>
                    <td>{{ $contacto->id }}</td>
                    <td>{{ $contacto->nombre }}</td>
                    <td>{{ $contacto->apellido }}</td>
                    <td>{{ $contacto->telefono }}</td>
                    <td>{{ $contacto->correo }}</td>
                    <td>{{ $contacto->direccion }}</td>
                    <td>{{ $contacto->fecha_registro }}</td>
                    <td class="acciones" style="display: flex; gap: 5px;">
                        <a class="boton" href="{{ route('agenda.edit', $contacto->id) }}">Editar</a>
                        
                        {{-- ATENCIÓN: En Laravel, las eliminaciones DEBEN hacerse por POST/DELETE por seguridad, no con un simple enlace <a> --}}
                        <form action="{{ route('agenda.destroy', $contacto->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este contacto?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="boton boton-rojo">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align: center;">No hay contactos registrados.</td>
                </tr>
            @endforelse
        </table>
    </div>
</body>
</html>