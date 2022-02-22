<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Mensaje;
use App\Models\User;
use App\Models\Role;
use Auth;

class MensajesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensajes = Mensaje::all();

        return view('secciones.mensajes',['mensajes' => $mensajes]);
    }

    public function create()
    {

    }


     public function store(Request $request)
    {
        $datos=$request->all();
$usuario=Auth::user();
        $rules= array (
            'titulo' => 'required',
            'contenido' =>'required',
            

           );

           $messages= array (
            'titulo.required' => 'Campo titulo es requerido',
            'contenido.required' => 'Campo contenido es requerido',
           

           );

           $validador= Validator::make($datos,$rules,$messages);
           if($validador->fails()){
            $errors=$validador->messages();
            $errors->add('mierror','Se ha cancelado la creación del mensaje.');
            \Session::flash('tipoMensaje','danger');
            \Session::flash('mensaje','Error, no se cumplen las validaciones. Compruebe todos los campos');
            //Volver con los errores

            return \Redirect::back()->withInput()->withErrors($validador);
        }else{
                 //Generar actividad
                $mensajes=new Mensaje();
                $mensajes->titulo=$datos["titulo"];
                $mensajes->contenido=$datos["contenido"];
               $mensajes->id_user=$usuario->id;
               $mensajes->save();

        try{
            //Almacenar en la BD
            
            //Almacenar el archivo en el servidor
                //Volver al listado
                //Mensaje de OK
                \Session::flash('tipoMensaje','success');
                \Session::flash('mensaje','Mensaje creado correctamente.');

        }catch(\Exception $e){
            //echo $e->getMessage();
            //Mensaje de KO
            \Session::flash('tipoMensaje','danger');
            \Session::flash('mensaje','Error en la creación del mensaje.');


        }
        return \Redirect::back();
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mensaje $mensajes)
    {
        $mensajes->delete();
        \Session::flash('tipoMensaje','info');
        \Session::flash('mensaje','Actividad borrada correctamente');
        return \Redirect::back();
    }
}
