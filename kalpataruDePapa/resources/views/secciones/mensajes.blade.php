@extends('layout.masterpage')
@section('titulo','Mensajes')
@section('contenido')
<link rel="stylesheet" type="text/css" href="../public/css/style.css">
<script src="{{asset('./js/app.js')}}"></script>


<h1 class="titulos">{!! trans('jokes.Titulo_mensaje') !!}</h1>
<div class="mensjesComp">
    
    <table class="table">
        <thead style="border-color: #b9ffff;">
            <tr>
                <th scope="col">{!! trans('jokes.Titulo_msj') !!}</th>
                <th scope="col">{!! trans('jokes.Contenido_msj') !!}</th>
                <th scope="col">{!! trans('jokes.Autor_msj') !!}</th>
                @foreach($mensajes as $mensaje)

            <tr>
                <td>{{$mensaje->titulo}}</td>
                <td>{{$mensaje->contenido}}</td>
                <td>
                    @php
                    $usuario=App\Models\User::find($mensaje->id_user);
                    @endphp
                    {{$usuario->name}}</td>
                <td>
            </tr>
            @endforeach
            </tr>
        </thead>
        <button id="añadir_mensaje" onclick="anyadir_mensaje()">{!! trans('jokes.New_Message') !!}</button>
        <div id="nuevo_mensaje">
            <button id="cerrar_anyadir_mensaje" onclick="cerrar_mensaje()">x</button>
            <form action="{{route('mensajes.store')}}" method="post" class="row">
                @csrf
                <div>
                    <p class="form_newmsj">{!! trans('jokes.Titulo_msj') !!}</p>
                    <input type="text" id="input_msj_title" class="input_msj" name="titulo" required>
                </div>
                <div>
                    <p class="form_newmsj">{!! trans('jokes.Contenido_msj') !!}</p>
                    <textarea type="text" class="input_msj" name="contenido" required></textarea>

                </div>
                <div>

                    <button id="crear_mensaje" type="submit">{!! trans('jokes.Crear_msj') !!}</button>

            </form>


    </table>
</div>
<div class="card" style="width: 18rem;">
    <div class="card-header">
      Featured
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Cras justo odio</li>
      <li class="list-group-item">Dapibus ac facilisis in</li>
      <li class="list-group-item">Vestibulum at eros</li>
    </ul>
  </div>
@endsection
<!-- Para hacer migrate y seed ala vez -->
<!-- php artisan migrate:fresh --seed -->
