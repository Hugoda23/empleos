@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Empresas</h2>
    <a href="{{ route('admin.empresas.create') }}" class="btn btn-success mb-3">Nueva Empresa</a>

    <table class="table table-bordered table-striped">
        <!-- ... tu tabla ... -->
    </table>
</div>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empresas as $empresa)
                <tr>
                    <td>{{ $empresa->nombre_empresa }}</td>
                    <td>{{ $empresa->descripcion }}</td>
                    <td>
                        @if($empresa->estado)
                            <span class="badge bg-success">Activo</span>
                        @else
                            <span class="badge bg-danger">Inactivo</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.empresas.edit', $empresa->id_empresa) }}" class="btn btn-sm btn-primary">Editar</a>
<form action="{{ route('admin.empresas.destroy', $empresa->id_empresa) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Seguro que deseas eliminar esta empresa?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
