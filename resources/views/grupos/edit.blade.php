@extends('layouts.app')

@section('title', 'Editar Grupo')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Editar Grupo</h1>
        <p class="text-sm text-gray-500">Actualizar información del grupo</p>
    </div>

    <div class="card">

        <form method="POST" action="{{ route('grupos.update', $grupo) }}" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="label">Nombre del grupo</label>
                <input name="nombre" value="{{ $grupo->nombre }}" class="input" required>
            </div>

            <div>
                <label class="label">Sede</label>
                <select name="sede_id" class="input" required>
                    @foreach($sedes as $s)
                        <option value="{{ $s->id }}" {{ $grupo->sede_id == $s->id ? 'selected' : '' }}>
                            {{ $s->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('grupos.index') }}" class="btn-secondary">Cancelar</a>
                <button class="btn-primary">Actualizar</button>
            </div>

        </form>

    </div>

</div>

@endsection