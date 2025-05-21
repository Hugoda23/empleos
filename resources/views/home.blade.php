<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido al sistema de empleos</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <style>
        body {
            background-image: url('{{ asset('assets/img/hero-carousel/tendencias-busqueda-de-empleo-arranque-2021.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
        }

        .card-custom {
            background-color: rgba(255, 255, 255, 0.97);
            border-radius: 20px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.4);
            padding: 30px;
        }

        .card-header h2 {
            font-weight: 700;
            font-size: 2rem;
        }

        .lead {
            font-size: 1.5rem;
        }

        .btn-custom {
            font-size: 1.25rem;
            padding: 0.75rem 2.5rem;
            border-radius: 50px;
        }

        .user-name {
            font-weight: bold;
            font-size: 1.3rem;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-custom text-center">
                <div class="card-header bg-primary text-white rounded-top">
                    <h2>Bienvenido al Sistema de empleos</h2>
                </div>

                <div class="card-body">
                    <p class="lead mb-3">
                        Hola, <span class="user-name">{{ Auth::user()->nombre }}</span>. Has iniciado sesión correctamente.
                    </p>

                    <a href="{{ route('admin.index') }}" class="btn btn-outline-primary btn-custom mt-4" style="border-width: 2px; background-color: #e6f0ff;">
                        <i class="fas fa-tools me-2"></i> Ir al Panel de Administración
                    </a>

                    <form action="{{ route('logout') }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-custom">
                            <i class="fas fa-sign-out-alt me-2"></i> Cerrar sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
