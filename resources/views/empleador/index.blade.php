@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h3>Panel de Empleador</h3>
        </div>
        <div class="card-body">
            <p class="lead">Hola <strong>{{ Auth::user()->nombre }}</strong>, bienvenido a tu panel de gestión de vacantes.</p>
            <p>Aquí podrás publicar nuevas vacantes, ver postulantes y revisar solicitudes.</p>
        </div>
    </div>
</div>
@endsection
