<?php

namespace App\Http\Controllers;

use App\Models\Deportista;
use App\Models\Producto;
use App\Models\Venta;
use App\Models\DetalleVenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    public function create()
    {
        $productos = Producto::where('stock', '>', 0)->get();
        $deportistas = Deportista::all();

        return view('ventas.create', compact('productos', 'deportistas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'deportista_id' => 'required',
            'productos' => 'required|array'
        ]);

        DB::beginTransaction();

        try {

            $total = 0;
            $productosValidos = [];

            foreach ($request->productos as $producto_id => $cantidad) {

                if ($cantidad > 0) {

                    $producto = Producto::find($producto_id);

                    if (!$producto) {
                        throw new \Exception('Producto no encontrado');
                    }

                    if ($producto->stock < $cantidad) {
                        throw new \Exception("Stock insuficiente para {$producto->nombre}");
                    }

                    $subtotal = $producto->precio * $cantidad;

                    $total += $subtotal;

                    $productosValidos[] = [
                        'producto' => $producto,
                        'cantidad' => $cantidad,
                    ];
                }
            }

            // 🚨 VALIDACIÓN AQUÍ (NO dentro del foreach)
            if ($total <= 0) {
                return redirect()->route('ventas.create')
                    ->with('error', 'Debes seleccionar al menos un producto');
            }

            $venta = Venta::create([
                'deportista_id' => $request->deportista_id,
                'total' => $total
            ]);

            foreach ($productosValidos as $item) {

                DetalleVenta::create([
                    'venta_id' => $venta->id,
                    'producto_id' => $item['producto']->id,
                    'cantidad' => $item['cantidad'],
                    'precio_unitario' => $item['producto']->precio
                ]);

                $item['producto']->decrement('stock', $item['cantidad']);
            }

            DB::commit();

            return redirect()->route('ventas.index')
                ->with('success', 'Venta registrada correctamente');
        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->route('ventas.create')
                ->with('error', $e->getMessage());
        }
    }


    public function index()
    {
        $ventas = Venta::with('deportista')
            ->latest()
            ->paginate(10);

        return view('ventas.index', compact('ventas'));
    }

    public function show(Venta $venta)
    {
        $venta->load('deportista', 'detalles.producto');

        return view('ventas.show', compact('venta'));
    }
}
