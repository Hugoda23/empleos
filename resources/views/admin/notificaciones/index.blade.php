@extends('layouts.admin')

@section('content')
@php
    use Carbon\Carbon;
@endphp

<div class="container">
    <h2 class="mb-4">Notificaciones Importantes</h2>

    @if($notificaciones->isEmpty())
        <div class="alert alert-info">No hay notificaciones recientes.</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Mensaje</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notificaciones as $notificacion)
                    <tr>
                        <td>{{ ucfirst($notificacion->tipo_notificacion) }}</td>
                        <td>{{ $notificacion->mensaje }}</td>
                        <td>{{ Carbon::parse($notificacion->fecha_creacion)->format('d/m/Y H:i') }}</td>
                        <td>
                            @if($notificacion->estado == 'no leído')
                                <span class="badge bg-danger">No leído</span>
                            @else
                                <span class="badge bg-success">Leído</span>
                            @endif
                        </td>
                        <td>
                            @if($notificacion->estado == 'no leído')
                                <form action="{{ route('admin.notificaciones.marcarLeida', $notificacion->id_notificacion) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-sm btn-primary" type="submit">Marcar como leído</button>
                                </form>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
