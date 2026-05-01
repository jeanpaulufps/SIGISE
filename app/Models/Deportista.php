<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deportista extends Model
{
    protected $fillable = [
        'nombres',
        'apellidos',
        'documento',
        'fecha_nacimiento',
        'telefono',
        'direccion',
        'grupo_id'
    ];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }
}
