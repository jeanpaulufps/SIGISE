@extends('layouts.app')

@section('title', 'Grupos')

@section('content')

<div class="page-header">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Grupos</h1>
        <p class="text-sm text-gray-500">Gestión de grupos por sede</p>
    </div>

    <a href="{{ route('grupos.create') }}" class="btn-primary">
        + Nuevo Grupo
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
                <th>Sede</th>
                <th class="text-right">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($grupos as $g)
            <tr>
                <td class="font-medium text-gray-800">
                    {{ $g->nombre }}
                </td>
                <td class="text-gray-600">
                    {{ $g->sede->nombre }}
                </td>

                <td class="text-right space-x-3">
                    <a href="{{ route('grupos.edit', $g) }}" class="text-blue-600 text-sm">
                        Editar
                    </a>

                    <form method="POST" action="{{ route('grupos.destroy', $g) }}" class="inline">
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
        {{ $grupos->links() }}
    </div>

</div>

@endsection