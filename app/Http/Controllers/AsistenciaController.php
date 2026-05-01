<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\AsistenciaDetalle;
use App\Models\Deportista;
use App\Models\Grupo;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    // LISTADO (historial)
    public function index()
    {
        $asistencias = Asistencia::with('grupo')
            ->latest()
            ->paginate(10);

        return view('asistencias.index', compact('asistencias'));
    }

    // FORMULARIO
    public function create(Request $request)
    {
        $grupos = Grupo::all();

        $grupo_id = $request->grupo_id;
        $deportistas = [];

        if ($grupo_id) {
            $deportistas = Deportista::where('grupo_id', $grupo_id)->get();
        }

        return view('asistencias.create', compact('grupos', 'deportistas', 'grupo_id'));
    }

    // GUARDAR
    public function store(Request $request)
    {
        $request->validate([
            'grupo_id' => 'required',
            'fecha' => 'required|date',
        ]);

        $asistencia = Asistencia::create([
            'grupo_id' => $request->grupo_id,
            'fecha' => $request->fecha
        ]);

        // Si no mandan check, no viene en request → se maneja así:
        $deportistas = Deportista::where('grupo_id', $request->grupo_id)->get();

        foreach ($deportistas as $d) {
            AsistenciaDetalle::create([
                'asistencia_id' => $asistencia->id,
                'deportista_id' => $d->id,
                'asistio' => $request->asistencias[$d->id] ?? 0
            ]);
        }

        return redirect()->route('asistencias.index')
            ->with('success', 'Asistencia guardada correctamente');
    }

    public function show(Asistencia $asistencia)
    {
        $asistencia->load('grupo', 'detalles.deportista');
        $asistieron = $asistencia->detalles->where('asistio', true)->count();
        $faltaron = $asistencia->detalles->where('asistio', false)->count();
        return view('asistencias.show', compact('asistencia', 'asistieron', 'faltaron'));
    }
}
