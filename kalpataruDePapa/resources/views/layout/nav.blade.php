{{-- CSS --}}
<?php echo '<link rel="stylesheet" type="text/css" href="../public/css/style.css">' ?>


<nav class="navbar navbar-expand-md mb-1" id="navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}">Kalpataru</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('mensajes.index')}}">Mensajes</a>
          </li>
          
          {{-- Solo Invitados --}}
        @if(!Auth::check())
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('login')}}">Inicio sesión</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('register')}}">Registrarse</a>
          </li>
        @else
          <li class="nav-item">
            {{-- Petición POST (La ruta así lo espera) --}}
            <a  class="nav-link" aria-current="page"  
              onclick="event.preventDefault();
              document.getElementById('logout').submit();">
              Cerrar sesión
            </a>
          
            {{-- Solo usuarios identificados --}}
            <form id="logout" action="{{ route('logout') }}" method="POST" style="display:none;">
              @csrf
            </form>
          </li>
          @endif
          {{-- <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li> --}}
        </ul>
      </div>
    </div>
  </nav>
  <style>
    nav{
      background-color: blueviolet;
    }
  </style>