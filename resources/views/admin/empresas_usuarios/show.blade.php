@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Detalles de la Empresa</h2>

    <div class="card mb-4">
        <div class="card-body">
            <h4 class="card-title">{{ $empresa->nombre_empresa }}</h4>
    <p><strong> </strong><br>
            <p><strong>Descripción:</strong><br>
                {{ $empresa->descripcion ?? 'No especificada' }}
            </p>

            <p><strong>Sitio Web:</strong><br>
                @if($empresa->sitio_web)
                    <a href="{{ $empresa->sitio_web }}" target="_blank">{{ $empresa->sitio_web }}</a>
                @else
                    No especificado
                @endif
            </p>

            <p><strong>Ubicación:</strong><br>
                @if($empresa->ubicacion)
                    {{ $empresa->ubicacion->ciudad }},
                    {{ $empresa->ubicacion->estado_provincia }},
                    {{ $empresa->ubicacion->pais }}
                @else
                    Ubicación no especificada
                @endif
            </p>

            <p><strong>Total de Vacantes Publicadas:</strong>
                <span class="badge bg-primary">{{ $empresa->vacantes->count() }}</span>
            </p>
        </div>
    </div>

    <h5>Vacantes Publicadas</h5>
    @if($empresa->vacantes->isEmpty())
        <div class="alert alert-info">Esta empresa no ha publicado vacantes.</div>
    @else
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Título del Puesto</th>
                    <th>Estado</th>
                    <th>Fecha de Publicación</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empresa->vacantes as $vacante)
                <tr>
                    <td>{{ $vacante->titulo_puesto }}</td>
                    <td>
                        @if($vacante->estado === 'activa')
                            <span class="badge bg-success">Activa</span>
                        @elseif($vacante->estado === 'cerrada')
                            <span class="badge bg-danger">Cerrada</span>
                        @else
                            <span class="badge bg-secondary">{{ ucfirst($vacante->estado) }}</span>
                        @endif
                    </td>
                    <td>{{ $vacante->created_at ? $vacante->created_at->format('d/m/Y') : 'No disponible' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('admin.empresas_usuarios.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
</div>
@endsection
