@extends('layout.masterpage')
@section('titulo','Mensajes')
@section('contenido')
<link rel="stylesheet" type="text/css" href="../public/css/style.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<script src="{{asset('./js/app.js')}}"></script>


<h1 class="titulos">{!! trans('jokes.Titulo_mensaje') !!}</h1>
<div class="mensjesComp">
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
</div>
</div>
@foreach($mensajes as $mensaje)
<div class="card" style="width: 18rem;">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">{!! trans('jokes.Autor_msj') !!}</li>
        <li class="list-group-item">
            @php
            $usuario=App\Models\User::find($mensaje->id_user);
            @endphp
            {{$usuario->name}}
        </li>
        <li class="list-group-item">{!! trans('jokes.Titulo_msj') !!}</li>
        <li class="list-group-item">{{$mensaje->titulo}}</li>
        <li class="list-group-item">{!! trans('jokes.Contenido_msj') !!}</li>
        <li class="list-group-item">{{$mensaje->contenido}}</li>
        <li class="list-group-item">{!! trans('jokes.Likes') !!}</li>
        <li class="list-group-item">{{$mensaje->likes}}<i class="fa-solid fa-heart"></i></li>

    </ul>
</div>
@endforeach
@endsection
<!-- Para hacer migrate y seed ala vez -->
<!-- php artisan migrate:fresh --seed -->
