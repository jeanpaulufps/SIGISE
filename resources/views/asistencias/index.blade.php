@extends('layouts.app')

@section('title', 'Asistencias')

@section('content')

<div class="page-header">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Asistencias</h1>
        <p class="text-sm text-gray-500">Historial por grupos</p>
    </div>

    <a href="{{ route('asistencias.create') }}" class="btn-primary">
        + Nueva Asistencia
    </a>
</div>

@if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-xl text-sm">
        {{ session('success') }}
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

    @foreach($asistencias as $a)

    <div class="card hover:shadow-lg transition">

        <div class="flex justify-between items-center mb-3">
            <h2 class="font-semibold text-gray-800">
                {{ $a->grupo->nombre }}
            </h2>

            <span class="text-xs bg-gray-100 px-2 py-1 rounded">
                {{ \Carbon\Carbon::parse($a->fecha)->format('d/m/Y') }}
            </span>
        </div>

        <div class="text-sm text-gray-500 mb-4">
            Registro de asistencia del grupo
        </div>

        <div class="flex justify-end">
            <a href="{{ route('asistencias.show', $a) }}"
               class="text-green-600 text-sm font-medium">
                Ver detalle →
            </a>
        </div>

    </div>

    @endforeach

</div>

<div class="mt-6">
    {{ $asistencias->links() }}
</div>

@endsection