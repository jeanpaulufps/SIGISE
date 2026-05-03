@extends('layouts.app')

@section('title', 'Detalle Venta')

@section('content')

    <div class="max-w-3xl mx-auto space-y-6">

        <!-- Header -->
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Venta #{{ $venta->id }}
            </h1>
            <p class="text-sm text-gray-500">
                {{ \Carbon\Carbon::parse($venta->created_at)->format('d/m/Y') }}
            </p>
        </div>

        <!-- Info -->
        <div class="card">
            <p class="text-sm text-gray-500">Deportista</p>
            <p class="font-semibold">
                {{ $venta->deportista->nombres }} {{ $venta->deportista->apellidos }}
            </p>
        </div>

        <!-- Productos -->
        <div class="card space-y-3">

            @foreach ($venta->detalles as $d)
                <div class="flex justify-between items-center border p-3 rounded-xl">
                    <div>
                        <p class="font-medium">{{ $d->producto->nombre }}</p>
                        <p class="text-sm text-gray-500">
                            ${{ number_format($d->precio_unitario, 0) }} x {{ $d->cantidad }}
                        </p>
                    </div>

                    <span class="font-semibold text-gray-800">
                        ${{ number_format($d->precio_unitario * $d->cantidad, 0) }}
                    </span>

                </div>
            @endforeach

        </div>

        <!-- Total -->
        <div class="card flex justify-between items-center">

            <span class="text-lg font-semibold">Total</span>

            <span class="text-2xl font-bold text-green-600">
                ${{ number_format($venta->total, 0) }}
            </span>

        </div>

        <!-- Botón -->
        <div class="flex justify-end">
            <a href="{{ route('ventas.index') }}" class="btn-secondary">
                Volver
            </a>
        </div>

    </div>

@endsection
