<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $guarded = [];

    public function deportista()
    {
        return $this->belongsTo(Deportista::class);
    }

    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class);
    }
}
