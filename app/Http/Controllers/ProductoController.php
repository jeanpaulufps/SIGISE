<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::latest()->paginate(10);
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        Producto::create($data);

        return redirect()->route('productos.index')->with('success', 'Producto creado');
    }

    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        $producto->update($data);

        return redirect()->route('productos.index')->with('success', 'Actualizado');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return back()->with('success', 'Eliminado');
    }
}
