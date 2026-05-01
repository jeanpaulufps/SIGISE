@extends('layouts.app')

@section('title', 'Tomar Asistencia')

@section('content')

    <div class="max-w-3xl mx-auto">

        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Tomar Asistencia</h1>
            <p class="text-sm text-gray-500">Selecciona grupo y marca asistencia</p>
        </div>

        <!-- Selección grupo -->
        <div class="card mb-6">

            <form method="GET" action="{{ route('asistencias.create') }}" class="flex gap-4 items-end">

                <div class="flex-1">
                    <label class="label">Grupo</label>
                    <select name="grupo_id" class="input" required onchange="this.form.submit()">
                        <option value="">Seleccione</option>
                        @foreach ($grupos as $g)
                            <option value="{{ $g->id }}" {{ $grupo_id == $g->id ? 'selected' : '' }}>
                                {{ $g->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </form>

        </div>

        @if ($grupo_id)

            <!-- Form asistencia -->
            <div class="card">

                <form method="POST" action="{{ route('asistencias.store') }}" class="space-y-5">
                    @csrf

                    <input type="hidden" name="grupo_id" value="{{ $grupo_id }}">

                    <div>
                        <label class="label">Fecha</label>
                        <input type="date" name="fecha" class="input" value="{{ date('Y-m-d') }}" required>
                    </div>

                    <div class="space-y-3 max-h-96 overflow-y-auto">

                        @foreach ($deportistas as $d)
                            <div class="flex items-center justify-between p-3 border rounded-xl">

                                <span class="font-medium text-gray-800">
                                    {{ $d->nombres }} {{ $d->apellidos }}
                                </span>

                                <input type="checkbox"
                                    name="asistencias[{{ $d->id }}]"
                                    value="1"
                                    checked
                                    class="w-5 h-5">
                            </div>
                        @endforeach

                    </div>

                    <div class="flex justify-end gap-3 pt-4">
                        <a href="{{ route('asistencias.index') }}" class="btn-secondary">Cancelar</a>
                        <button class="btn-primary">Guardar Asistencia</button>
                    </div>

                </form>

            </div>

        @endif

    </div>

@endsection
