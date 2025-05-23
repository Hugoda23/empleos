@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Mis Solicitudes Enviadas</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($solicitudes->isEmpty())
        <div class="alert alert-info">Aún no has enviado ninguna solicitud.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th>Título del Puesto</th>
                    <th>Empresa</th>
                    <th>Fecha de Postulación</th>
                </tr>
            </thead>
            <tbody>
                @foreach($solicitudes as $solicitud)
                <tr>
                    <td>{{ $solicitud->vacante->titulo_puesto ?? 'No disponible' }}</td>
                    <td>{{ $solicitud->vacante->empresa->nombre_empresa ?? 'No asignada' }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($solicitud->created_at)->format('d/m/Y H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
