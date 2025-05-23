@extends('layouts.admin') 

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Listado de Solicitudes</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($solicitudes->isEmpty())
        <div class="alert alert-info">No hay solicitudes registradas.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Título del Puesto</th>
                    <th>Postulante</th>
                    <th>Fecha de Postulación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($solicitudes as $solicitud)
                <tr>
                    <td>{{ $solicitud->vacante->titulo_puesto }}</td>
                    <td>{{ $solicitud->usuario->nombre }} {{ $solicitud->usuario->apellido }}</td>
                    <td>{{ \Carbon\Carbon::parse($solicitud->created_at)->format('d/m/Y H:i') }}</td>
                    <td>
                        <!-- Botón de mensaje -->
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#mensajeModal{{ $solicitud->id }}">
                            <i class="fas fa-envelope"></i> Mensaje
                        </button>

                        <!-- Formulario para eliminar -->
                        <form action="{{ route('solicitudes.destroy', $solicitud->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Eliminar esta solicitud?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>

                <!-- Modal de mensaje -->
                <div class="modal fade" id="mensajeModal{{ $solicitud->id }}" tabindex="-1" aria-labelledby="mensajeModalLabel{{ $solicitud->id }}" aria-hidden="true">
                  <div class="modal-dialog">
                    <form action="{{ route('solicitudes.enviarMensaje', $solicitud->id) }}" method="POST">
                      @csrf
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Enviar mensaje a {{ $solicitud->usuario->nombre }}</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                          <div class="mb-3">
                            <textarea name="mensaje" class="form-control" rows="4" required></textarea>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Enviar</button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
