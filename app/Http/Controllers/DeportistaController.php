<?php

namespace App\Http\Controllers;

use App\Models\Deportista;
use App\Models\Grupo;
use Illuminate\Http\Request;

class DeportistaController extends Controller
{
    public function index()
    {
        $deportistas = Deportista::with('grupo')->latest()->paginate(10);
        return view('deportistas.index', compact('deportistas'));
    }

    public function create()
    {
        $grupos = Grupo::all();
        return view('deportistas.create', compact('grupos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'documento' => 'required|unique:deportistas',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'nullable',
            'direccion' => 'nullable',
            'grupo_id' => 'required|exists:grupos,id'
        ]);

        Deportista::create($data);

        return redirect()->route('deportistas.index')->with('success', 'Deportista creado');
    }

    public function edit(Deportista $deportista)
    {
        $grupos = Grupo::all();
        return view('deportistas.edit', compact('deportista', 'grupos'));
    }

    public function update(Request $request, Deportista $deportista)
    {
        $data = $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'documento' => 'required|unique:deportistas,documento,' . $deportista->id,
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'nullable',
            'direccion' => 'nullable',
            'grupo_id' => 'required|exists:grupos,id'
        ]);

        $deportista->update($data);

        return redirect()->route('deportistas.index')->with('success', 'Actualizado');
    }

    public function destroy(Deportista $deportista)
    {
        $deportista->delete();
        return back()->with('success', 'Eliminado');
    }
}
