@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Notificaciones Recibidas</h2>

    @if($notificaciones->isEmpty())
        <div class="alert alert-info">No tienes notificaciones por el momento.</div>
    @else
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Mensaje</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notificaciones as $notificacion)
                <tr>
                    <td>{{ $notificacion->mensaje }}</td>
                    <td>{{ \Carbon\Carbon::parse($notificacion->fecha_creacion)->format('d/m/Y H:i') }}</td>
                    <td>
                        @if($notificacion->estado === 'leído')
                            <span class="badge bg-success">Leído</span>
                        @else
                            <span class="badge bg-warning text-dark">No leído</span>
                        @endif
                    </td>
                    <td>
                        @if($notificacion->estado === 'no leído')
                        <form action="{{ route('admin.notificaciones_usuarios.marcarLeido', $notificacion->id_notificacion) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-sm btn-success">Marcar como leído</button>
                        </form>
                        @endif

                        <form action="{{ route('admin.notificaciones_usuarios.destroy', $notificacion->id_notificacion) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar esta notificación?');">
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
