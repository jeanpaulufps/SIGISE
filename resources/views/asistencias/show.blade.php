@extends('layouts.app')

@section('title', 'Detalle Asistencia')

@section('content')

    <div class="max-w-3xl mx-auto">

        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">
                {{ $asistencia->grupo->nombre }}
            </h1>
            <p class="text-sm text-gray-500">
                {{ \Carbon\Carbon::parse($asistencia->fecha)->format('d/m/Y') }}
            </p>
        </div>

        <div class="card">

            <div class="space-y-3">

                @foreach ($asistencia->detalles as $d)
                    <div class="flex justify-between items-center p-3 border rounded-xl">

                        <span class="font-medium">
                            {{ $d->deportista->nombres }} {{ $d->deportista->apellidos }}
                        </span>

                        @if ($d->asistio)
                            <span class="text-green-600 text-sm font-semibold">
                                ✔ Asistió
                            </span>
                        @else
                            <span class="text-red-600 text-sm font-semibold">
                                ✘ Faltó
                            </span>
                        @endif

                    </div>
                @endforeach

            </div>

        </div>

    </div>
    <div class="flex gap-4 mb-4">
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded-xl text-sm">
            ✔ {{ $asistieron }} asistieron
        </div>

        <div class="bg-red-100 text-red-700 px-4 py-2 rounded-xl text-sm">
            ✘ {{ $faltaron }} faltaron
        </div>
    </div>
@endsection
