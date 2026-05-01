@extends('layouts.app')

@section('title', 'Nuevo Producto')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Nuevo Producto</h1>
        <p class="text-sm text-gray-500">Registrar uniforme o implemento</p>
    </div>

    <div class="card">

        <form method="POST" action="{{ route('productos.store') }}" class="space-y-5">
            @csrf

            <div>
                <label class="label">Nombre</label>
                <input name="nombre" class="input" placeholder="Ej: Uniforme oficial" required>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="label">Precio</label>
                    <input type="number" step="0.01" name="precio" class="input" required>
                </div>

                <div>
                    <label class="label">Stock</label>
                    <input type="number" name="stock" class="input" required>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('productos.index') }}" class="btn-secondary">Cancelar</a>
                <button class="btn-primary">Guardar</button>
            </div>

        </form>

    </div>

</div>

@endsection