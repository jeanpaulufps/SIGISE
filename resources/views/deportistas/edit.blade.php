@extends('layouts.app')

@section('title', 'Editar Deportista')

@section('content')

<div class="max-w-2xl mx-auto">

    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Editar Deportista</h1>
        <p class="text-sm text-gray-500">
            Actualiza la información de la deportista
        </p>
    </div>

    <!-- Card -->
    <div class="card">

        <form method="POST" action="{{ route('deportistas.update', $deportista) }}" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Nombres y apellidos -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="label">Nombres</label>
                    <input 
                        name="nombres" 
                        value="{{ old('nombres', $deportista->nombres) }}"
                        class="input" 
                        required>
                </div>

                <div>
                    <label class="label">Apellidos</label>
                    <input 
                        name="apellidos" 
                        value="{{ old('apellidos', $deportista->apellidos) }}"
                        class="input" 
                        required>
                </div>
            </div>

            <!-- Documento -->
            <div>
                <label class="label">Documento</label>
                <input 
                    name="documento" 
                    value="{{ old('documento', $deportista->documento) }}"
                    class="input" 
                    required>
            </div>

            <!-- Fecha -->
            <div>
                <label class="label">Fecha de nacimiento</label>
                <input 
                    type="date" 
                    name="fecha_nacimiento" 
                    value="{{ old('fecha_nacimiento', $deportista->fecha_nacimiento) }}"
                    class="input" 
                    required>
            </div>

            <!-- Teléfono + Grupo -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="label">Teléfono</label>
                    <input 
                        name="telefono" 
                        value="{{ old('telefono', $deportista->telefono) }}"
                        class="input">
                </div>

                <div>
                    <label class="label">Grupo</label>
                    <select name="grupo_id" class="input" required>
                        @foreach($grupos as $g)
                            <option 
                                value="{{ $g->id }}"
                                {{ old('grupo_id', $deportista->grupo_id) == $g->id ? 'selected' : '' }}>
                                {{ $g->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Dirección -->
            <div>
                <label class="label">Dirección</label>
                <input 
                    name="direccion" 
                    value="{{ old('direccion', $deportista->direccion) }}"
                    class="input">
            </div>

            <!-- Botones -->
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('deportistas.index') }}" class="btn-secondary">
                    Cancelar
                </a>

                <button class="btn-primary">
                    Actualizar
                </button>
            </div>

        </form>

    </div>

</div>

@endsection