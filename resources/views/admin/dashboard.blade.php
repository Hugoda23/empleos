@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Tarjeta de Vacantes -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalVacantes }}</h3>
                    <p>Vacantes Totales</p>
                </div>
                <div class="icon">
                    <i class="fas fa-briefcase"></i>
                </div>
                <a href="{{ route('admin.empleos.index') }}" class="small-box-footer">
                    Más información <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Tarjeta de Empresas -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalEmpresas }}</h3>
                    <p>Empresas Registradas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-building"></i>
                </div>
                <a href="{{ route('admin.empresas.index') }}" class="small-box-footer">
                    Más información <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Tarjeta de Postulantes -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalPostulantes }}</h3>
                    <p>Postulantes Activos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Más información <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Tarjeta de Solicitudes -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $totalSolicitudes }}</h3>
                    <p>Solicitudes Pendientes</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Más información <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Gráficos -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Estado de Vacantes</h3>
                </div>
                <div class="card-body">
                    <canvas id="vacantesPorEstado"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Empresas más Activas</h3>
                </div>
                <div class="card-body">
                    <canvas id="empresasActivas"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Aquí irá el código JavaScript para inicializar los gráficos
    // usando los datos que pases desde el controlador
</script>
@endpush
@endsection