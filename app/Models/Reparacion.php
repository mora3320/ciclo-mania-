<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reparacion extends Model
{
    protected $table = 'reparaciones';

    protected $fillable = [
        'tipo_bicicleta',
        'marca',
        'reparacion_necesita',
        'nombre_dueno',
        'telefono',
        'estado',
    ];
}
