<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $guarded = [];

    public function producto()
    {
        return $this->belongsTo(\App\Models\Producto::class);
    }
}
