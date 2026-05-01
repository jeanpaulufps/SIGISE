<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Sede;

class GrupoController extends Controller
{
    public function index()
    {
        $grupos = Grupo::with('sede')->latest()->paginate(10);
        return view('grupos.index', compact('grupos'));
    }

    public function create()
    {
        $sedes = Sede::all();
        return view('grupos.create', compact('sedes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'sede_id' => 'required|exists:sedes,id'
        ]);

        Grupo::create($data);

        return redirect()->route('grupos.index')->with('success', 'Grupo creado');
    }

    public function edit(Grupo $grupo)
    {
        $sedes = Sede::all();
        return view('grupos.edit', compact('grupo', 'sedes'));
    }

    public function update(Request $request, Grupo $grupo)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'sede_id' => 'required|exists:sedes,id'
        ]);

        $grupo->update($data);

        return redirect()->route('grupos.index')->with('success', 'Actualizado');
    }

    public function destroy(Grupo $grupo)
    {
        $grupo->delete();
        return back()->with('success', 'Eliminado');
    }
}
