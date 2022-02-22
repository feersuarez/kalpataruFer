@extends('layout.masterpage')
@section('titulo','Mensajes')
@section('contenido')
<link rel="stylesheet" type="text/css" href="../public/css/style.css">
<script src="{{asset('./js/app.js')}}"></script>



<div class="mensjesComp">
    <table class="table  text-color-w">
        <thead>
            <tr>
                <th scope="col">{!! trans('jokes.Titulo_mensaje') !!}</th>
                <th scope="col">{!! trans('jokes.Contenidomsj') !!}</th>
                <th scope="col">{!! trans('jokes.Likes') !!}</th>
                @foreach($mensajes as $mensaje)

            <tr>
                <td>{{$mensaje->titulo}}</td>
                <td>{{$mensaje->contenido}}</td>
                <td>{{$mensaje->likes}}</td>
            </tr>
            @endforeach

            </tr>

        </thead>
        <button id="añadir_mensaje" onclick="anyadir_mensaje()">{!! trans('jokes.New_Message') !!}</button>
        <div id="nuevo_mensaje">
            <form action="{{route('mensajes.store')}}" method="post" class="row">
                @csrf
                <div>
                    <p class="form_newmsj">{!! trans('jokes.Titulo_msj') !!}</p>
                    <input type="text" class="input_msj" name="titulo" required>
                </div>
                <div>
                    <p class="form_newmsj">{!! trans('jokes.Contenido_msj') !!}</p>
                    <input type="text" class="input_msj" name="contenido" required>

                </div>
                <div>

                    <button id="crear_mensaje" type="submit">{!! trans('jokes.Crear_msj') !!}</button>
                    <button id="cerrar_anyadir_mensaje" onclick="cerrar_mensaje()">X</button>
            </form>


    </table>
</div>

@endsection
<!-- Para hacer migrate y seed ala vez -->
<!-- php artisan migrate:fresh --seed -->
