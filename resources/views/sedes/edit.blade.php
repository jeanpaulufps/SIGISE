@extends('layouts.app')

@section('title', 'Editar Sede')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Editar Sede</h1>
        <p class="text-sm text-gray-500">Modificar información de la sede</p>
    </div>

    <div class="card">

        <form method="POST" action="{{ route('sedes.update', $sede) }}" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="label">Nombre de la sede</label>
                <input name="nombre" value="{{ $sede->nombre }}" class="input" required>
            </div>

            <div>
                <label class="label">Dirección</label>
                <input name="direccion" value="{{ $sede->direccion }}" class="input">
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('sedes.index') }}" class="btn-secondary">Cancelar</a>
                <button class="btn-primary">Actualizar</button>
            </div>

        </form>

    </div>

</div>

@endsection