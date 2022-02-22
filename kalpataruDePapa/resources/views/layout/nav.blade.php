{{-- CSS --}}
<?php echo '<link rel="stylesheet" type="text/css" href="../public/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">'
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.typeit/3.0.1/typeit.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="app.js"></script>


<nav class="navbar navbar-expand-md mb-1" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" id="titulo_kalpataru" href="{{route('home')}}"></a>
        <script>
            $('#titulo_kalpataru').typeIt({
                strings: ["Nuestro Árbol", "Gure Zuhaitza", "Kalpataru"],
                speed: 90,
                breakLines: false
            });

        </script>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" style="color: #D401D6;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">


                {{-- Solo Invitados --}}
                @if(!Auth::check())
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('login')}}">{!! trans('jokes.IniSesion') !!}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('register')}}">{!! trans('jokes.Registrarse') !!}</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link active">{!! trans('jokes.Bienvenida') !!} <b
                            style="color: #b9ffff">{{auth()->user()->name}}</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('mensajes.index')}}">{!! trans('jokes.Arboldeseos') !!}</a>
                </li>
                @if(Auth::user()->role_id=="1")

                <li class="nav-item">
                    <a class="nav-link active" id="admin" onMouseOver="this.style.cssText='color: #cc0000'"
                        onMouseOut="this.style.cssText='color: #fff'" aria-current="page"
                        href="{{ route('voyager.dashboard') }}">{!! trans('jokes.Administradora') !!}</a></a>
                </li>

                @endif
                <li class="nav-item">
                    {{-- Petición POST (La ruta así lo espera) --}}
                    <a class="nav-link" aria-current="page" onclick="event.preventDefault();
                    document.getElementById('logout').submit();">
                        {!! trans('jokes.CerrarSesion') !!}
                    </a>

                    {{-- Solo usuarios identificados --}}
                    <form id="logout" action="{{ route('logout') }}" method="POST" style="display:none;">
                        @csrf
                    </form>
                </li>
                @endif
                <li class="nav-item">
                    @if (config('locale.status') && count(config('locale.languages')) > 0)
                    @foreach (array_keys(config('locale.languages')) as $lang)
                    @if ($lang != App::getLocale())
                    <a class="nav-link  text-color-GureB " href="{!! route('lang.swap', $lang) !!}"
                        style="padding-right:0px; margin-right:0px;">
                        {!! $lang !!}
                    </a>
                </li>
                @endif
                @endforeach
                @endif
                <li class="nav-item">
                    @if (config('locale.status') && count(config('locale.languages')) > 0)
                    @foreach (array_keys(config('locale.languages')) as $lang)
                    @if ($lang == App::getLocale())
                    <a class="nav-link  text-color-GureB " href="{!! route('lang.swap', $lang) !!}"
                        style="padding-left:0px; margin-left:0px;">
                        <u style="margin-left: 5px;">{!! $lang !!}</u>
                    </a>
                    @endif
                    @endforeach
                    @endif
                </li>
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
