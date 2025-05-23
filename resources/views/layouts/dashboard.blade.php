<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel Administrador</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token (clave para evitar error 419) -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Estilos AdminLTE y Bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css?v=3.2.0') }}">
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap">
  ...
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css?v=3.2.0') }}">
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-KOJJ0fZk+KzEO+ZHZMN59OKl5+FscEToWtzRGeRRFJ6MLxD3yfYkzO4zVcbRX+T4i61z2h7HbV3VmvvJ2tNSMg==" crossorigin="anonymous" referrerpolicy="no-referrer" />



  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }
    .brand-link {
      font-weight: bold;
      text-align: center;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar superior -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Botón sidebar -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Cierre de sesión -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="btn btn-danger btn-sm" type="submit">
            <i class="fas fa-sign-out-alt"></i> Cerrar sesión
          </button>
        </form>
      </li>
    </ul>
  </nav>

  <!-- Sidebar lateral -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link text-center">
      SISTEMA DE EMPLEOS
    </a>

   <div class="sidebar">
  <div class="user-panel mt-3 pb-3 d-flex flex-column align-items-center">
    <div class="info text-center">
      <i class="bi bi-person-fill icon-user"></i>
      <hr>

    </div>
  </div>
  
      <!-- Menú -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
          <li class="nav-item">
              <a href="{{ route('dashboard.vacantes') }}" class="nav-link">
              <i class="bi bi-table"></i>
              <p>Vacantes</p>
            </a>
          </li>

        <li class="nav-item">
  <a href="{{ route('dashboard.empresas.index') }}" class="nav-link">
    <i class="nav-icon fas fa-users-cog"></i>
    <p>Empresas</p>
  </a>
</li>


          <li class="nav-item">
            <a href="{{ route('dashboard.notificaciones.index') }}" class="nav-link">
              <i class="bi bi-bell-fill"></i>
              <p>Notificaciones</p>
            </a>
          </li>

          <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
          <li class="nav-item">
            <a href="{{ route('dashboard.graficos.index') }}" class="nav-link">
              <i class="bi bi-graph-up"></i>
              <p>Graficos</p>
            </a>
          </li>
   
    <!-- Empresa -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
        <li class="nav-item">
            <a href="{{ route('dashboard.empleos_publicados.index') }}" class="nav-link">
                <i class="bi bi-megaphone-fill"></i>
                <p>Empleos Publicados</p>
            </a>
        </li>
        <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
        <li class="nav-item">
            <a href="{{ route('dashboard.solicitudes.index') }}" class="nav-link">
                <i class="bi bi-journal-check"></i>
                <p>Solicitudes</p>
            </a>
        </li>

 <!-- Usuarios -->
<li class="nav-item">
            <a href="{{ route('dashboard.empleos.index') }}" class="nav-link">
              <i class="bi bi-clipboard-minus-fill"></i>
              <p>Empleos</p>
            </a>
          </li>

<li class="nav-item">
            <a href="{{ route('dashboard.empresas_usuarios.index') }}" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>Empresas</p>
            </a>
          </li>

             <li class="nav-item">
            <a href="{{ route('dashboard.notificaciones_usuarios.index') }}" class="nav-link">
              <i class="bi bi-bell-fill"></i>
              <p>Notificaciones</p>
            </a>
          </li>
             <li class="nav-item">
            <a href="{{ route('dashboard.solicitudes_usuarios.index') }}" class="nav-link">
              <i class="bi bi-bell-fill"></i>
              <p>Solicitudes</p>
            </a>
          </li>

                 <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
          <li class="nav-item">
            <a href="{{ route('dashboard.ajustes.index') }}" class="nav-link">
              <i class="bi bi-wrench-adjustable"></i>
              <p>Ajustes</p>
            </a>
          </li>



        </ul>
      </nav>
    </div>
  </aside>


    


  <!-- Contenido principal -->
  <div class="content-wrapper p-4">
    @yield('content')
  </div>

  <!-- Footer -->
  <footer class="main-footer text-center">
    <strong>&copy; {{ date('Y') }} Sistema de Empleos</strong>
  </footer>
</div>

<!-- Scripts -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js?v=3.2.0') }}"></script>
<!-- Bootstrap 5 CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS (para modales) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
