@extends('layouts.app')

@section('title', 'Nuevo Grupo')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Nuevo Grupo</h1>
        <p class="text-sm text-gray-500">Crear un grupo y asignarlo a una sede</p>
    </div>

    <div class="card">

        <form method="POST" action="{{ route('grupos.store') }}" class="space-y-5">
            @csrf

            <div>
                <label class="label">Nombre del grupo</label>
                <input name="nombre" class="input" placeholder="Ej: Sub-15 A" required>
            </div>

            <div>
                <label class="label">Sede</label>
                <select name="sede_id" class="input" required>
                    <option value="">Seleccione una sede</option>
                    @foreach($sedes as $s)
                        <option value="{{ $s->id }}">{{ $s->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('grupos.index') }}" class="btn-secondary">Cancelar</a>
                <button class="btn-primary">Guardar</button>
            </div>

        </form>

    </div>

</div>

@endsection