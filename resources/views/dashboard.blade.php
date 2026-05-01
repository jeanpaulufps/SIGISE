@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="space-y-6">

        <!-- MÉTRICAS -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">

            <div class="card">
                <p class="text-sm text-gray-500">Deportistas</p>
                <h2 class="text-3xl font-bold text-gray-800">{{ $totalDeportistas }}</h2>
            </div>

            <div class="card">
                <p class="text-sm text-gray-500">Grupos</p>
                <h2 class="text-3xl font-bold text-gray-800">{{ $totalGrupos }}</h2>
            </div>

            <div class="card">
                <p class="text-sm text-gray-500">Sedes</p>
                <h2 class="text-3xl font-bold text-gray-800">{{ $totalSedes }}</h2>
            </div>

            <div class="card">
                <p class="text-sm text-gray-500">Asistencias Hoy</p>
                <h2 class="text-3xl font-bold text-gray-800">{{ $asistenciaHoy }}</h2>
            </div>

        </div>

        <!-- PORCENTAJE -->
        <div class="card">
            <h3 class="text-lg font-semibold mb-3">Asistencia promedio</h3>

            <div class="w-full bg-gray-200 rounded-full h-4">
                <div class="bg-green-600 h-4 rounded-full"
                    style="width: {{ $porcentajeAsistencia }}%"></div>
            </div>

            <p class="text-sm text-gray-600 mt-2">
                {{ $porcentajeAsistencia }}% de asistencia general
            </p>
        </div>

        <!-- TOP INASISTENCIAS -->
        <div class="card">
            <h3 class="text-lg font-semibold mb-4">Mayor inasistencia</h3>

            <div class="space-y-3">

                @foreach ($inasistencias as $i)
                    <div class="flex justify-between items-center border p-3 rounded-xl">

                        <span>
                            {{ $i->deportista->nombres }} {{ $i->deportista->apellidos }}
                        </span>

                        <span class="text-red-600 font-semibold">
                            {{ $i->faltas }} faltas
                        </span>

                    </div>
                @endforeach

            </div>
        </div>

    </div>

@endsection
