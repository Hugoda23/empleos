<form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="text" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}" required>
    @error('nombre') <div>{{ $message }}</div> @enderror

    <input type="text" name="apellido" placeholder="Apellido" value="{{ old('apellido') }}" required>
    @error('apellido') <div>{{ $message }}</div> @enderror

    <input type="email" name="correo_electronico" placeholder="Correo electrónico" value="{{ old('correo_electronico') }}" required>
    @error('correo_electronico') <div>{{ $message }}</div> @enderror

    <input type="password" name="password" placeholder="Contraseña" required>
    @error('password') <div>{{ $message }}</div> @enderror

    <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required>

    <input type="text" name="telefono" placeholder="Teléfono (opcional)" value="{{ old('telefono') }}">
    @error('telefono') <div>{{ $message }}</div> @enderror

    <button type="submit">Registrarse</button>
</form>
