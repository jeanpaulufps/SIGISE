@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Editar Producto</h1>
        <p class="text-sm text-gray-500">Actualizar información del producto</p>
    </div>

    <div class="card">

        <form method="POST" action="{{ route('productos.update', $producto) }}" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="label">Nombre</label>
                <input name="nombre" value="{{ $producto->nombre }}" class="input" required>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="label">Precio</label>
                    <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}" class="input" required>
                </div>

                <div>
                    <label class="label">Stock</label>
                    <input type="number" name="stock" value="{{ $producto->stock }}" class="input" required>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('productos.index') }}" class="btn-secondary">Cancelar</a>
                <button class="btn-primary">Actualizar</button>
            </div>

        </form>

    </div>

</div>

@endsection