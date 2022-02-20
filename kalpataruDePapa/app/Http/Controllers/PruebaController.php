<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    
    //acciones
    public function index(){

        //Devolvemos la vista
        return view('inicio');


    }

    public function mostrarLapida($correo){

        echo "Bieeeen hooola holita $correo, voy a mostrarte tu lápida";

    }
    

}
