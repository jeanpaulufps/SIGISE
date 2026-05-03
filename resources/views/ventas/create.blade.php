@extends('layouts.app')

@section('title', 'Nueva Venta')

@section('content')

    <div class="max-w-3xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold">Nueva Venta</h1>
            <p class="text-sm text-gray-500">Registrar venta de productos</p>
        </div>

        <div class="card">
            @if (session('error'))
                <div
                    class="mb-4 p-4 rounded-xl bg-red-100 border border-red-200 text-red-700 flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <span>⚠️</span>
                        <span class="text-sm font-medium">
                            {{ session('error') }}
                        </span>
                    </div>

                    <button onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-700">
                        ✕
                    </button>
                </div>
            @endif
            @if ($errors->any())
                <div class="mb-4 p-4 rounded-xl bg-red-100 border border-red-200 text-red-700">
                    <ul class="text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('ventas.store') }}" class="space-y-5">
                @csrf

                <!-- Deportista -->
                <div>
                    <label class="label">Deportista</label>
                    <select name="deportista_id" class="input" required>
                        <option value="">Seleccione</option>
                        @foreach ($deportistas as $d)
                            <option value="{{ $d->id }}">
                                {{ $d->nombres }} {{ $d->apellidos }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Productos -->
                <div class="space-y-3">

                    @foreach ($productos as $p)
                        <div class="flex justify-between items-center border p-3 rounded-xl">

                            <div>
                                <p class="font-medium">{{ $p->nombre }}</p>
                                <p class="text-sm text-gray-500">${{ $p->precio }}</p>
                            </div>

                            <input type="number"
                                name="productos[{{ $p->id }}]"
                                min="0"
                                value="0"
                                class="input w-20">
                        </div>
                    @endforeach

                </div>

                <div class="flex justify-end gap-3">
                    <a href="{{ route('productos.index') }}" class="btn-secondary">Cancelar</a>
                    <button class="btn-primary">Guardar Venta</button>
                </div>

            </form>

        </div>

    </div>

@endsection
