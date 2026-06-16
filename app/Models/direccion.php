<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    // Indicamos el nombre exacto de la tabla (opcional si sigues la convención)
    protected $table = 'direcciones';
    // Desactivamos los timestamps automáticos (created_at, updated_at) de Laravel
    // porque tu tabla usa 'fecha_registro'
    public $timestamps = false;

    // Campos permitidos para inserción masiva
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'correo',
        'direccion',
        'fecha_registro'
    ];
}
