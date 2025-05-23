@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Notificaciones de Solicitudes</h2>

    @if($solicitudes->isEmpty())
        <div class="alert alert-info">No hay nuevas solicitudes.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Postulante</th>
                    <th>Puesto</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($solicitudes as $solicitud)
                <tr>
                    <td>{{ $solicitud->usuario->nombre }} {{ $solicitud->usuario->apellido }}</td>
                    <td>{{ $solicitud->vacante->titulo_puesto }}</td>
                    <td>{{ $solicitud->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
