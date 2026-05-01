<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{

    protected $guarded = [];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

    public function detalles()
    {
        return $this->hasMany(AsistenciaDetalle::class);
    }
}
