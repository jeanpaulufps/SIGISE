@extends('layouts.app')

@section('title', 'Nueva Sede')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Nueva Sede</h1>
        <p class="text-sm text-gray-500">Registrar una nueva sede</p>
    </div>

    <div class="card">

        <form method="POST" action="{{ route('sedes.store') }}" class="space-y-5">
            @csrf

            <div>
                <label class="label">Nombre de la sede</label>
                <input name="nombre" class="input" placeholder="Ej: Sede Centro" required>
            </div>

            <div>
                <label class="label">Dirección</label>
                <input name="direccion" class="input" placeholder="Ej: Calle 10 #15-20">
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('sedes.index') }}" class="btn-secondary">Cancelar</a>
                <button class="btn-primary">Guardar</button>
            </div>

        </form>

    </div>

</div>

@endsection