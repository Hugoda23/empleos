<form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="text" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}" required>
    @error('nombre') <div>{{ $message }}</div> @enderror

    <input type="text" name="apellido" placeholder="Apellido" value="{{ old('apellido') }}" required>
    @error('apellido') <div>{{ $message }}</div> @enderror

    <input type="email" name="correo_electronico" placeholder="Correo electrónico" value="{{ old('correo_electronico') }}" required>
    @error('correo_electronico') <div>{{ $message }}</div> @enderror

    <input type="password" name="contrasena" placeholder="Contraseña" required>
    @error('contrasena') <div>{{ $message }}</div> @enderror

    <input type="password" name="contrasena_confirmation" placeholder="Confirmar contraseña" required>

    <select name="tipo_usuario" required>
        <option value="">Seleccione tipo de usuario</option>
        <option value="2">Reclutador</option>
        <option value="3">Candidato</option>
    </select>
    @error('tipo_usuario') <div>{{ $message }}</div> @enderror

    <input type="text" name="telefono" placeholder="Teléfono (opcional)" value="{{ old('telefono') }}">
    @error('telefono') <div>{{ $message }}</div> @enderror

    <button type="submit">Registrarse</button>
</form>
