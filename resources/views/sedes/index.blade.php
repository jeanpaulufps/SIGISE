@extends('layouts.app')

@section('title', 'Sedes')

@section('content')

<div class="page-header">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Sedes</h1>
        <p class="text-sm text-gray-500">Administración de sedes del club</p>
    </div>

    <a href="{{ route('sedes.create') }}" class="btn-primary">
        + Nueva Sede
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
                <th>Dirección</th>
                <th class="text-right">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($sedes as $s)
            <tr>
                <td class="font-medium text-gray-800">
                    {{ $s->nombre }}
                </td>
                <td class="text-gray-600">
                    {{ $s->direccion ?? '—' }}
                </td>

                <td class="text-right space-x-3">
                    <a href="{{ route('sedes.edit', $s) }}" class="text-blue-600 text-sm">
                        Editar
                    </a>

                    <form method="POST" action="{{ route('sedes.destroy', $s) }}" class="inline">
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
        {{ $sedes->links() }}
    </div>

</div>

@endsection