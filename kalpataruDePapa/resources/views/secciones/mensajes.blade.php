@extends('layout.masterpage')
@section('titulo','Mensajes')
@section('contenido')
<?php echo '<link rel="stylesheet" type="text/css" href="../public/css/style.css">' 
?>
<script src="{{asset('./js/app.js')}}"></script>



<div  class="mensjesComp">
<table class="table  text-color-w">
                            <thead style="border-color:green;">
                                <tr>
                                    <th scope="col">Título Mensaje</th>
                                    <th scope="col">Contenido</th>
                                    <th scope="col">Likes</th>
                                    @foreach($mensajes as $mensaje)
                                    
                                <tr>
                                    <td>{{$mensaje->titulo}}</td>
                                    <td>{{$mensaje->contenido}}</td>
                                    <td>{{$mensaje->likes}}</td>
                                </tr>
                                @endforeach
                              
                                </tr>

                            </thead>
                            <button id="añadir_mensaje"onclick="anyadir_mensaje()">Crear mensaje nuevo </button>
                           <div id="nuevo_mensaje">
                            <form action="{{route('mensajes.store')}}" method="post" class="row">
                                        @csrf
                                        <div class=" col-md-2 offset-md-4 fs-1 fw-bold text-texto-Gure text-color-w  ">
                                            Título
                                            <input type="text"
                                                class=" text-start forms-control form-place-gure-white border-bottom-GureO text-texto-Gures " name="titulo" id="titulo_mensaje"
                                                required>
                                        </div>
                                        <div class=" col-md-2 offset-md-4 fs-1 fw-bold text-texto-Gure text-color-w">
                                            Contenido
                                            <input type="text"
                                                class=" text-start forms-control form-place-gure-white border-bottom-GureO text-texto-Gures " name="contenido" id="contenido"
                                                required>

                                        </div>
                                        <div>

                                        <button type="submit" class="btn fs-4 mt-5 col-4 offset-md-4 btn-Gure" style="  background-color: #961acf;; color:white; margin-bottom:50px;">Crear</button>
                                        <button id="cerrar_anyadir_mensaje"onclick="cerrar_mensaje()">Cerrar </button>
                            </form>  
                          
                               
</table>
</div>

@endsection
<!-- Para hacer migrate y seed ala vez -->
<!-- php artisan migrate:fresh --seed -->
