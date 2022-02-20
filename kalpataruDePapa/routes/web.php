<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\MensajesController;
use App\Http\Controllers\PlotterController;
use App\Http\Controllers\CursoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//--------------rutas PlotterController----------------

Route::resource('plotters',PlotterController::class);



//----------------otras rutas--------------------------
Route::get('/',  function () {
    return view('secciones.inicio');
} )->name('home');



Route::get('/mensajes',  function () {
    return view('secciones.mensajes');
} )->name('mensajes');


//Route::resource('/mensajes',MensajesController::class);
//Route::get('mensajes',[MensajesController::class, "index"]);

Route::resource('mensajes',MensajesController::class);

// Route::resource('cursos',CursoController::class);
//Route::get('/cursos',[CursoController::class, "index"]);


Auth::routes(['verify' => true]);




Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});