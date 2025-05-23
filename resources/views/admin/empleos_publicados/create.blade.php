@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Publicar Nueva Vacante</h2>

    <form action="{{ route('admin.empleos_publicados.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="titulo_puesto" class="form-label">Título del Puesto</label>
            <input type="text" name="titulo_puesto" id="titulo_puesto" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="descripcion_trabajo" class="form-label">Descripción del Trabajo</label>
            <textarea name="descripcion_trabajo" id="descripcion_trabajo" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="requisitos" class="form-label">Requisitos</label>
            <textarea name="requisitos" id="requisitos" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="salario" class="form-label">Salario</label>
            <input type="number" name="salario" id="salario" class="form-control" step="0.01">
        </div>

        <div class="mb-3">
            <label for="id_empresa" class="form-label">Empresa</label>
            <select name="id_empresa" id="id_empresa" class="form-control">
                <option value="">Selecciona una empresa</option>
                @foreach($empresas as $empresa)
                    <option value="{{ $empresa->id_empresa }}">{{ $empresa->nombre_empresa }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_categoria" class="form-label">Categoría</label>
            <select name="id_categoria" id="id_categoria" class="form-control">
                <option value="">Selecciona una categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id_categoria }}">{{ $categoria->nombre_categoria }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
    <label for="id_ubicacion" class="form-label">Ubicación</label>
    <select name="id_ubicacion" id="id_ubicacion" class="form-select" required>
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
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-control" required>
                <option value="activa">Activa</option>
                <option value="cerrada">Cerrada</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar Vacante</button>
        <a href="{{ route('admin.empleos_publicados.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
