@extends('layout.masterpage')
@section('titulo','Perfil')
@section('contenido')
<link rel="stylesheet" type="text/css" href="../public/css/style.css">
@php
$mensajes=App\Models\Mensaje::all()->where('id',Auth::user()->id);
$user=Auth::user();
@endphp

<div id="perfil">
    <img id="image_profile" src="../public/images/perfilUnisex.png">
    <p class="inputsPerfil">{!! trans('jokes.NomUser_Perfil') !!} <span>{{$user->name}}</span></p>
    <p class="inputsPerfil">{!! trans('jokes.Email_Perfil') !!} <span>{{$user->email}}</span></p>
    <p class="inputsPerfil">{{$user->password}}</p>
    @foreach($mensajes as $mensaje)
    <div id="mensajes">
        <ul class="listaMensajes">
            <li class="row" id="tituloMensaje"><strong>{!! trans('jokes.Titulo_msj') !!}</strong></li>
            <p class="tituloMensaje">{{$mensaje->titulo}}</p>
            <li class="row" id="contenidoMensaje"><strong>{!! trans('jokes.Contenido_msj') !!}</strong></li>
            <p class="textoMensaje">{{$mensaje->contenido}}</p>
            <li class="row" id="contenidoMensaje"><strong>{!! trans('jokes.Likes') !!}</strong></li>
            <p class="textoMensaje">{{$mensaje->likes}}</p>
        </ul>
    </div>
    @endforeach
</div>
@endsection
