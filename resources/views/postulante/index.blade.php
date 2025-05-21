@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h3>Panel del Postulante</h3>
        </div>
        <div class="card-body">
            <p class="lead">Hola <strong>{{ Auth::user()->nombre }}</strong>, bienvenido a tu perfil de postulante.</p>
            <p>Aquí podrás actualizar tu CV, ver vacantes disponibles y gestionar tus aplicaciones.</p>
        </div>
    </div>
</div>
@endsection
