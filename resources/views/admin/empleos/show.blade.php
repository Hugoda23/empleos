@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Detalles del Empleo</h2>

    <div class="card">
        <div class="card-body">

            <h4 class="card-title">{{ $empleo->titulo_puesto }}</h4>
            
            <p><strong>Empresa:</strong> {{ $empleo->empresa->nombre_empresa ?? 'No asignada' }}</p>

            <p><strong>Ubicación:</strong>
                @if($empleo->empresa && $empleo->empresa->ubicacion)
                    {{ $empleo->empresa->ubicacion->ciudad }},
                    {{ $empleo->empresa->ubicacion->estado_provincia }},
                    {{ $empleo->empresa->ubicacion->pais }}
                @else
                    Ubicación no especificada
                @endif
            </p>

            <p><strong>Descripción del Trabajo:</strong><br>
                {{ $empleo->descripcion_trabajo }}
            </p>

            <p><strong>Requisitos:</strong><br>
                {{ $empleo->requisitos ?? 'No especificados' }}
            </p>

            <p><strong>Salario:</strong>
                {{ $empleo->salario ? 'Q' . number_format($empleo->salario, 2) : 'No especificado' }}
            </p>

            <p><strong>Estado:</strong>
                @if($empleo->estado === 'activa')
                    <span class="badge bg-success">Activa</span>
                @elseif($empleo->estado === 'cerrada')
                    <span class="badge bg-danger">Cerrada</span>
                @else
                    <span class="badge bg-secondary">{{ ucfirst($empleo->estado) }}</span>
                @endif
            </p>

            <p><strong>Fecha de Publicación:</strong>
                {{ $empleo->created_at ? $empleo->created_at->format('d/m/Y') : 'No disponible' }}
            </p>

            <a href="{{ route('admin.empleos.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
        </div>
    </div>
</div>
@endsection
