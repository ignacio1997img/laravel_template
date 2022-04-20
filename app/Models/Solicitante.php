<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nit', 'nombre', 'direccion', 'referencia', 'contacto', 'tel', 'fecha', 'requisito',
        'observacion', 'status', 'status', 'tipocontrato', 'usuariosolicitante',

        'residuo', 'lugar', 'estado', 'fechainspeccion', 'usuarioinspeccion','inspector',

        'fechacosto', 'usuariocosto', 'contrato',

        'frecuencia', 'fechaprogramacion', 'usuarioprogramacion', 'obs', 'turno'

    ];



}
