@extends('layouts.app')

@section('title', 'Productos')

@section('content')

<div class="page-header">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Productos</h1>
        <p class="text-sm text-gray-500">Inventario de uniformes e implementos</p>
    </div>

    <a href="{{ route('productos.create') }}" class="btn-primary">
        + Nuevo Producto
    </a>
</div>

@if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-xl text-sm">
        {{ session('success') }}
    </div>
@endif

<div class="card">

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th class="text-right">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($productos as $p)
            <tr>
                <td class="font-medium text-gray-800">{{ $p->nombre }}</td>
                <td>${{ number_format($p->precio, 0, ',', '.') }}</td>
                <td>{{ $p->stock }}</td>

                <td class="text-right space-x-3">
                    <a href="{{ route('productos.edit', $p) }}" class="text-blue-600 text-sm">
                        Editar
                    </a>

                    <form method="POST" action="{{ route('productos.destroy', $p) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-6">
        {{ $productos->links() }}
    </div>

</div>

@endsection