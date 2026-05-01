@extends('layouts.app')

@section('title', 'Deportistas')

@section('content')

<div class="page-header">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Deportistas</h1>
        <p class="text-sm text-gray-500">Gestión de jugadoras del club</p>
    </div>

    <a href="{{ route('deportistas.create') }}" class="btn-primary">
        + Nuevo
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
                <th>Documento</th>
                <th>Grupo</th>
                <th class="text-right!">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($deportistas as $d)
            <tr>
                <td class="font-medium text-gray-800">
                    {{ $d->nombres }} {{ $d->apellidos }}
                </td>
                <td>{{ $d->documento }}</td>
                <td>{{ $d->grupo->nombre }}</td>

                <td class="text-right space-x-3">
                    <a href="{{ route('deportistas.edit', $d) }}" class="text-blue-600 text-sm">
                        Editar
                    </a>

                    <form method="POST" action="{{ route('deportistas.destroy', $d) }}" class="inline">
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
        {{ $deportistas->links() }}
    </div>

</div>

@endsection