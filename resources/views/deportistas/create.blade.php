@extends('layouts.app')

@section('title', 'Nuevo Deportista')

@section('content')

    <div class="max-w-2xl mx-auto">

        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Nuevo Deportista</h1>
            <p class="text-sm text-gray-500">Registrar nueva jugadora</p>
        </div>

        <div class="card">

            <form method="POST" action="{{ route('deportistas.store') }}" class="space-y-5">
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="label">Nombres</label>
                        <input name="nombres" class="input" required>
                    </div>

                    <div>
                        <label class="label">Apellidos</label>
                        <input name="apellidos" class="input" required>
                    </div>
                </div>

                <div>
                    <label class="label">Documento</label>
                    <input name="documento" class="input" required>
                </div>

                <div>
                    <label class="label">Fecha de nacimiento</label>
                    <input type="date" name="fecha_nacimiento" class="input" required>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="label">Teléfono</label>
                        <input name="telefono" class="input">
                    </div>

                    <div>
                        <label class="label">Grupo</label>
                        <select name="grupo_id" class="input" required>
                            <option value="">Seleccione</option>
                            @foreach ($grupos as $g)
                                <option value="{{ $g->id }}">{{ $g->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <label class="label">Dirección</label>
                    <input name="direccion" class="input">
                </div>

                <div class="flex justify-end gap-3 pt-4">
                    <a href="{{ route('deportistas.index') }}" class="btn-secondary">Cancelar</a>
                    <button class="btn-primary">Guardar</button>
                </div>

            </form>

        </div>

    </div>

@endsection
