<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form-group mb-3">
        <input 
            type="email" 
            name="correo_electronico" 
            class="form-control @error('correo_electronico') is-invalid @enderror" 
            placeholder="Correo electrónico" 
            value="{{ old('correo_electronico') }}" 
            required 
            autofocus
        >
        @error('correo_electronico')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mb-3">
        <input 
            type="password" 
            name="password" 
            class="form-control @error('password') is-invalid @enderror" 
            placeholder="Contraseña" 
            required
        >
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary btn-block">Ingresar</button>

    <p class="mt-3 mb-0 text-center">
        <a href="{{ route('register') }}" class="text-decoration-none">¿No tienes cuenta? Regístrate</a>
    </p>
</form>
