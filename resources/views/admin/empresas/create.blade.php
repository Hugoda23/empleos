@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Crear Nueva Empresa</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Hay errores en el formulario.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.empresas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre_empresa" class="form-label">Nombre de la empresa</label>
            <input type="text" name="nombre_empresa" class="form-control" id="nombre_empresa" value="{{ old('nombre_empresa') }}" required maxlength="100">
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="4">{{ old('descripcion') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="sitio_web" class="form-label">Sitio web</label>
            <input type="url" name="sitio_web" class="form-control" id="sitio_web" value="{{ old('sitio_web') }}">
        </div>
        
        <div class="mb-3">
    <label for="estado" class="form-label">Estado</label>
    <select name="estado" id="estado" class="form-select" required>
        <option value="1" {{ old('estado') == "1" ? 'selected' : '' }}>Activo</option>
        <option value="0" {{ old('estado') == "0" ? 'selected' : '' }}>Inactivo</option>
    </select>
</div>


       <div class="mb-3">
    <label for="id_ubicacion" class="form-label">Ubicación</label>
    <select name="id_ubicacion" id="id_ubicacion" class="form-select">
        <option value="">-- Seleccione una ubicación --</option>
        @foreach($ubicaciones as $ubicacion)
            <option value="{{ $ubicacion->id_ubicacion }}"
                {{ old('id_ubicacion') == $ubicacion->id_ubicacion ? 'selected' : '' }}>
                {{ $ubicacion->ciudad }}, {{ $ubicacion->estado_provincia }}, {{ $ubicacion->pais }}
            </option>
        @endforeach
    </select>
</div>

        <div class="mb-3">
            <label for="id_usuario" class="form-label">Usuario responsable</label>
            <select name="id_usuario" id="id_usuario" class="form-select">
                <option value="">-- Seleccione un usuario --</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id_usuario }}" {{ old('id_usuario') == $usuario->id_usuario ? 'selected' : '' }}>
                        {{ $usuario->nombre ?? 'Usuario #' . $usuario->id_usuario }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('admin.empresas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
