@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Estadísticas de Vacantes por Estado</h2>

    <!-- Gráfico de vacantes por estado -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Vacantes por estado</h5>
        </div>
        <div class="card-body">
            <canvas id="vacantesChart"></canvas>
        </div>
    </div>

    <!-- Gráfico de empresas activas -->
    <div class="card">
        <div class="card-header">
            <h5>Empresas Activas</h5>
        </div>
        <div class="card-body">
            <canvas id="empresasChart"></canvas>
        </div>
    </div>
</div>

<!-- Estilos para reducir tamaño de los gráficos -->
<style>
    canvas {
        display: block;
        margin: auto;
    }

    #vacantesChart, #empresasChart {
        max-width: 600px;
        height: 300px;
    }
</style>

<!-- Script para gráficos -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Datos de las vacantes por estado
    var vacantesData = @json($vacantesPorEstado);
    var estados = vacantesData.map(function (item) {
        return item.estado;
    });
    var cantidadVacantes = vacantesData.map(function (item) {
        return item.cantidad;
    });

    // Crear el gráfico de vacantes por estado
    var ctxVacantes = document.getElementById('vacantesChart').getContext('2d');
    new Chart(ctxVacantes, {
        type: 'pie',
        data: {
            labels: estados,
            datasets: [{
                label: 'Vacantes por estado',
                data: cantidadVacantes,
                backgroundColor: ['#ff6384', '#36a2eb', '#ffce56', '#4bc0c0', '#9966ff', '#ff9f40']
            }]
        },
        options: {
            responsive: true
        }
    });

    // Datos de las empresas activas
    var empresasData = @json($empresas);
    var nombresEmpresas = empresasData.map(function (item) {
        return item.nombre_empresa;
    });
    var cantidadEmpresas = new Array(empresasData.length).fill(1);  // Todos los valores son 1

    // Crear el gráfico de empresas activas
    var ctxEmpresas = document.getElementById('empresasChart').getContext('2d');
    new Chart(ctxEmpresas, {
        type: 'bar',
        data: {
            labels: nombresEmpresas,
            datasets: [{
                label: 'Empresas Activas',
                data: cantidadEmpresas,
                backgroundColor: '#36a2eb',
                borderColor: '#36a2eb',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            indexAxis: 'y', // Para poner las barras horizontales (opcional)
            scales: {
                x: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
