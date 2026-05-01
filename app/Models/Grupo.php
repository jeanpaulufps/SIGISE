<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = ['nombre', 'sede_id'];

    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }

    public function deportistas()
    {
        return $this->hasMany(Deportista::class);
    }
}
