@extends('layout.masterpage')
@section('titulo','Perfil')
@section('contenido')
<link rel="stylesheet" type="text/css" href="../public/css/style.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@php
$mensajes=App\Models\Mensaje::all()->where('id',Auth::user()->id);
$user=Auth::user();
@endphp

<div id="perfil">
    <h1 class="titulos">{!!trans('jokes.Perfil')!!}</h1>
    <div id="parteArribaPerfil">
    <img id="image_profile" src="../public/images/perfilUnisex.png">
    <p class="inputsPerfil">{!! trans('jokes.NomUser_Perfil') !!} <span class="contenidoInputs">{{$user->name}}</span></p>
    <p class="inputsPerfil">{!! trans('jokes.Email_Perfil') !!} <span class="contenidoInputs">{{$user->email}}</span></p>
    <p class="inputsPerfil">{!! trans('jokes.Pass_Perfil') !!} <button id="ojo"onclick="mostrarPass();"><i class="fa-solid fa-eye"></i></button></p>
    <p id="pass" class="contenidoInputs">{{$user->password}}</p>
    <script>
        var contador=1;
    function mostrarPass(){
        if (contador%2 !=1){
            document.getElementById('pass').style.display="none";
        }else{
            document.getElementById('pass').style.display="block";
        }
        contador++;
    }
    </script>
    <h4 class="subtitlePerfil">{!! trans('jokes.H3_Perfil') !!}</h4>
    </div>
    @foreach($mensajes as $mensaje)
<div class="card" style="width: 18rem; display: inline-block; margin-bottom: 2%; margin-top: 2%; background-color: rgba(15, 0, 95, 0.2)">
    <ul class="list-group list-group-flush" style="">
        <li class="list-group-item" style="background-color: rgba(230, 90, 233, 0.6); color: rgb(15, 0, 95); text-align: center;">{!! trans('jokes.Autor_msj') !!}</li>
        <li class="list-group-item" style="font-family: 'Helvetica'; background-color: rgba(230, 90, 233, 0.6); text-align: center; color: #ffc9d0;">
            @php
            $usuario=App\Models\User::find($mensaje->id);
            @endphp
            {{$usuario->name}}
        </li>
        <li class="list-group-item" style="background-color: rgba(230, 90, 233, 0.6); color: rgb(15, 0, 95); text-align: center;">{!! trans('jokes.Titulo_msj') !!}</li>
        <li class="list-group-item" style="font-family: 'Helvetica'; background-color: rgba(230, 90, 233, 0.6); text-align: center; color: #ffc9d0;">{{$mensaje->titulo}}</li>
        <li class="list-group-item" style="background-color: rgba(230, 90, 233, 0.6); color: rgb(15, 0, 95); text-align: center;">{!! trans('jokes.Contenido_msj') !!}</li>
        <li class="list-group-item" style="font-family: 'Helvetica'; background-color: rgba(230, 90, 233, 0.6); text-align: center; color: #ffc9d0;">{{$mensaje->contenido}}</li>
        <li class="list-group-item" style="background-color: rgba(230, 90, 233, 0.6); color: rgb(15, 0, 95); text-align: center;">{!! trans('jokes.Likes') !!}</li>
        <li class="list-group-item" style="font-family: 'Helvetica'; background-color: rgba(230, 90, 233, 0.6); text-align: center; color: #ffc9d0;">{{$mensaje->likes}}<i class="fa-solid fa-heart"></i></li>
    </ul>
</div>
@endforeach
</div>
@endsection
