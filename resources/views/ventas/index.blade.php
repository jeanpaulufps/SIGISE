@extends('layouts.app')

@section('title', 'Ventas')

@section('content')

    <div class="page-header">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Ventas</h1>
            <p class="text-sm text-gray-500">Historial de ventas</p>
        </div>

        <a href="{{ route('ventas.create') }}" class="btn-primary">
            + Nueva Venta
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-xl text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="card overflow-x-auto">

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Deportista</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th class="text-right">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($ventas as $venta)
                    <tr>
                        <td>{{ $venta->id }}</td>

                        <td>
                            {{ $venta->deportista->nombres }}
                            {{ $venta->deportista->apellidos }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($venta->created_at)->format('d/m/Y') }}
                        </td>

                        <td class="font-semibold text-green-600">
                            ${{ number_format($venta->total, 0) }}
                        </td>

                        <td class="text-right">
                            <a href="{{ route('ventas.show', $venta) }}"
                                class="text-blue-600 hover:text-blue-800 text-sm">
                                👁 Ver
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <div class="mt-4">
            {{ $ventas->links() }}
        </div>

    </div>

@endsection
