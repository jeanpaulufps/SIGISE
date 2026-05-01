<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsistenciaDetalle extends Model
{
    protected $guarded = [];

    public function deportista()
    {
        return $this->belongsTo(Deportista::class);
    }

    public function asistencia()
    {
        return $this->belongsTo(Asistencia::class);
    }
}
