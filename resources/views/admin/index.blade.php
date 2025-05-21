@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Panel de Administración</h4>
        </div>
        <div class="card-body">
            <p class="lead">Bienvenido <strong>{{ Auth::user()->nombre }}</strong>,</p>
            <p>Desde este panel puedes gestionar usuarios, vacantes, y revisar el funcionamiento del sistema de empleos.</p>
        </div>
    </div>
</div>
@endsection
