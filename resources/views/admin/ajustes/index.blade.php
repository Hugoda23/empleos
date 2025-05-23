@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Ajustes de Cuenta</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @php
        $user = auth()->user();
    @endphp

    @if($user)
        <form action="{{ route('admin.ajustes.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card">
                <div class="card-body">

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $user->nombre) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" id="apellido" name="apellido" value="{{ old('apellido', $user->apellido) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo Electrónico</label>
                        <input type="email" id="correo" name="correo" value="{{ old('correo', $user->correo_electronico) }}" class="form-control" required>
                    </div>

                    <hr class="my-4">

                    <h5>Cambiar Contraseña</h5>

                    <div class="mb-3">
                        <label for="password_actual" class="form-label">Contraseña Actual</label>
                        <input type="password" id="password_actual" name="password_actual" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="nueva_password" class="form-label">Nueva Contraseña</label>
                        <input type="password" id="nueva_password" name="nueva_password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="confirmar_password" class="form-label">Confirmar Nueva Contraseña</label>
                        <input type="password" id="confirmar_password" name="confirmar_password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>
        </form>
    @else
        <div class="alert alert-danger">No se ha detectado un usuario autenticado.</div>
    @endif
</div>
@endsection
