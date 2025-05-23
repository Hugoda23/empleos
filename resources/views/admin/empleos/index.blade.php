@extends('layouts.admin') {{-- o 'layouts.app' según estés usando --}}

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Listado de Todos los Empleos</h2>

    @if($empleos->isEmpty())
        <div class="alert alert-warning">No hay vacantes registradas.</div>
    @else
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Título del Puesto</th>
                    <th>Empresa</th>
                    <th>Ubicación</th>
                    <th>Estado</th>
                    <th>Fecha de Publicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleos as $empleo)
                <tr>
                    <td>{{ $empleo->titulo_puesto }}</td>
                    <td>{{ $empleo->empresa->nombre_empresa ?? 'No asignada' }}</td>
<td>
    @if($empleo->empresa && $empleo->empresa->ubicacion)
        {{ $empleo->empresa->ubicacion->ciudad }},
        {{ $empleo->empresa->ubicacion->estado_provincia }},
        {{ $empleo->empresa->ubicacion->pais }}
    @else
        Ubicación no especificada
    @endif
</td>



                    <td>
                        @if($empleo->estado === 'activa')
                            <span class="badge bg-success">Activa</span>
                        @elseif($empleo->estado === 'cerrada')
                            <span class="badge bg-danger">Cerrada</span>
                        @else
                            <span class="badge bg-secondary">{{ ucfirst($empleo->estado) }}</span>
                        @endif
                    </td>
                    <td>
    {{ $empleo->created_at ? $empleo->created_at->format('d/m/Y') : 'No disponible' }}
</td>

                    <td>
                        <a href="{{ route('admin.empleos.show', $empleo->id_vacante) }}" class="btn btn-sm btn-primary">
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
