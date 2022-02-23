@extends('layout.masterpage')
@section('titulo','Bienvenido a Kalpataru')
@section('contenido')
<link rel="stylesheet" type="text/css" href="../public/css/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>


<div id="principal">
    <div class="animacion_princ">
        <p class="li_inicio" id="palabra1_animacion">{!! trans('jokes.Nuestros_Inicio') !!}</p>
        <ul class="ul_inicio">
            <li class="li_inicio">{!! trans('jokes.Arbol_Inicio') !!}</li>
            <li class="li_inicio">{!! trans('jokes.Deseos_Inicio') !!}</li>
            <li class="li_inicio">{!! trans('jokes.Futuro_Inicio') !!}</li>
        </ul>
    </div>
 
    




<style>
</style>
@endsection