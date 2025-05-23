@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Gráfica de Estado de Vacantes</h2>

    <canvas id="estadoVacantesChart" width="400" height="200"></canvas>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labels = @json($datos->pluck('estado'));
    const data = @json($datos->pluck('total'));

    // Asignamos colores personalizados según el estado
    const backgroundColors = labels.map(estado => {
        if (estado.toLowerCase() === 'activa') return 'rgba(75, 192, 192, 0.6)';   // verde
        if (estado.toLowerCase() === 'cerrada') return 'rgba(223, 25, 68, 0.6)';   // rojo
        return 'rgba(54, 162, 235, 0.6)';  // azul para otros
    });

    const borderColors = labels.map(estado => {
        if (estado.toLowerCase() === 'activa') return 'rgba(75, 192, 192, 1)';
        if (estado.toLowerCase() === 'cerrada') return 'rgba(255, 99, 132, 1)';
        return 'rgba(54, 162, 235, 1)';
    });

    const ctx = document.getElementById('estadoVacantesChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Cantidad de Vacantes',
                data: data,
                backgroundColor: backgroundColors,
                borderColor: borderColors,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });
</script>

@endsection
