@extends('layouts.admin')

@section('content')
<a href="{{ route('dashboard.empleos_publicados.create') }}" class="btn btn-primary mb-3">+ Publicar Nueva Vacante</a>
<div class="container">
    <h2 class="mb-4">Empleos Publicados</h2>

    @if($vacantes->isEmpty())
        <div class="alert alert-info">No hay empleos publicados actualmente.</div>
    @else
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Empresa</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vacantes as $vacante)
                <tr>
                    <td>{{ $vacante->titulo_puesto }}</td>
                    <td>{{ $vacante->descripcion_trabajo }}</td>
                    <td>{{ $vacante->empresa->nombre_empresa ?? 'N/A' }}</td>
                    <td>{{ ucfirst($vacante->estado) }}</td>
                    <td>
<a href="{{ route('admin.empleos_publicados.edit', $vacante->id_vacante) }}" class="btn btn-warning">Editar</a>

                        <form action="{{ route('admin.empleos_publicados.destroy', $vacante->id_vacante) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Seguro que deseas eliminar esta vacante?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
