<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use Illuminate\Http\Request;

class DireccionController extends Controller
{
    // Mostrar la lista (Reemplaza a agenda.php)
    public function index()
    {
        // Traemos todas las direcciones ordenadas de forma descendente
        $contactos = Direccion::orderBy('id', 'desc')->get();
        return view('agenda.index', compact('contactos'));
    }

    // Mostrar formulario de creación (Reemplaza a crear_contacto.php)
    public function create()
    {
        return view('agenda.create');
    }

    // Guardar el nuevo contacto en la BD
    public function store(Request $request)
    {
        // 1. Validamos los datos
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'correo' => 'nullable|email|max:120',
        ]);

        // 2. Guardamos usando Eloquent
        Direccion::create($request->all());

        // 3. Redirigimos con un mensaje de éxito (Reemplaza el $_GET['msg'])
        return redirect()->route('agenda.index')->with('success', 'Contacto registrado correctamente.');
    }

    // Mostrar formulario de edición (Reemplaza a editar_contacto.php)
    public function edit($id)
    {
        $contacto = Direccion::findOrFail($id);
        return view('agenda.edit', compact('contacto'));
    }
    //Método SHOW
    public function show($id)
    {
        $contacto = Direccion::findOrFail($id);

        return view('agenda.show', compact('contacto'));
    }
    // Actualizar el contacto en la BD
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
        ]);

        $contacto = Direccion::findOrFail($id);
        $contacto->update($request->all());

        return redirect()->route('agenda.index')->with('success', 'Contacto actualizado correctamente.');
    }

    // Eliminar el contacto (Reemplaza a eliminar_contacto.php)
    public function destroy($id)
    {
        $contacto = Direccion::findOrFail($id);
        $contacto->delete();

        return redirect()->route('agenda.index')->with('success', 'Contacto eliminado correctamente.');
    }
}
