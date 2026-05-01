<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sede;


class SedeController extends Controller
{
    public function index()
    {
        $sedes = Sede::latest()->paginate(10);
        return view('sedes.index', compact('sedes'));
    }

    public function create()
    {
        return view('sedes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'direccion' => 'nullable'
        ]);

        Sede::create($data);

        return redirect()->route('sedes.index')->with('success', 'Sede creada');
    }

    public function edit(Sede $sede)
    {
        return view('sedes.edit', compact('sede'));
    }

    public function update(Request $request, Sede $sede)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'direccion' => 'nullable'
        ]);

        $sede->update($data);

        return redirect()->route('sedes.index')->with('success', 'Actualizada');
    }

    public function destroy(Sede $sede)
    {
        $sede->delete();
        return back()->with('success', 'Eliminada');
    }
}
