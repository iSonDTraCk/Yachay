<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>@yield('title') - Yachay </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .navbar-brand.fucsia {
      color: #FF00FF !important;
      font-weight: bold;
      font-size: 1.8rem;
    }
  </style>
</head>
<body>

  {{-- Navbar (oculta en la página de login) --}}
  @if (!request()->routeIs('acceso.index'))
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
      <div class="container">
        <a class="navbar-brand fucsia" href="{{ route('acceso.index') }}">YACHAY</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            @if(session('rol') === 'profesor')
              <li class="nav-item">
                <a class="nav-link" href="{{ route('lessons.index') }}">Mis Lecciones</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('lessons.create') }}">Crear Lección</a>
              </li>
            @elseif(session('rol') === 'alumno')
              <li class="nav-item">
                <a class="nav-link" href="{{ route('lessons.index') }}">Aprender</a>
              </li>
            @endif
            <li class="nav-item">
              <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-link nav-link" type="submit">Salir</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  @endif

  {{-- Contenido principal --}}
  <div class="container">
    @yield('content')
  </div>

  {{-- Scripts --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
