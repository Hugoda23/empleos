@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Listado de Empresas</h2>

    @if($empresas->isEmpty())
        <div class="alert alert-info">No hay empresas registradas.</div>
    @else
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nombre de la Empresa</th>
                    <th>Descripción</th>
                    <th>Ubicación</th>
                    <th>Vacantes Publicadas</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empresas as $empresa)
                <tr>
                    <td>{{ $empresa->nombre_empresa }}</td>
                    <td>{{ $empresa->descripcion ?? 'No especificada' }}</td>
                    <td>
                        @if($empresa->ubicacion)
                            {{ $empresa->ubicacion->ciudad }},
                            {{ $empresa->ubicacion->estado_provincia }},
                            {{ $empresa->ubicacion->pais }}
                        @else
                            Ubicación no especificada
                        @endif
                    </td>
                    <td>
                        <span class="badge bg-primary">{{ $empresa->vacantes_count }}</span>
                    </td>
                    <td>
                        <a href="{{ route('admin.empresas_usuarios.show', $empresa->id_empresa) }}" class="btn btn-sm btn-info">
    <i class="fas fa-eye"></i> Ver
</a>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
