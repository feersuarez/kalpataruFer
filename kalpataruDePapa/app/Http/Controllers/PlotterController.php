<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plotter;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class PlotterController extends Controller
{

    public function __construct(){
        //$this->middleware('auth'); //Todo lo que afecta a este controlador
        $this->middleware('auth')->only('index'); //Solo a estas dos funciones
        $this->middleware('admin')->except('index'); //Afecta a todo excepto a index
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Controlador accede al modelo para enviarselo a vista 
        $plotters = Plotter::all();
        
        
        //Devolvemos la vista
         return view('plotters.index',['maquinas'=> $plotters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "Aqui debería salir un form para crear un plotter";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //Recibir datos
        $datos=$request->all();
       //Validar datos
       $rules= array (
        'imagen' => 'required|mimes:jpeg,jpg|max:1024*1024*1',
        'marca' => 'required',
        'velocidad' =>'required|numeric',
       );

       $messages= array (
        'imagen.required' => 'Campo imagen es requerido',
        'imagen.mimes' => 'El tipo de archivo debe ser una imagen',
        'imagen.max' => 'El tamaño de la imagen es excesivo',
        'marca.required' => 'Campo marca es requerido',
        'velocidad.required' => 'Campo velocidad es requerido',
        'velocidad.numeric' => 'Campo velocidad debe ser un número',
       );

       $validador= Validator::make($datos,$rules,$messages);
       if($validador->fails()){
            $errors=$validador->messages();
            $errors->add('mierror','Se ha cancelado la creación del plotter.');
            \Session::flash('tipoMensaje','danger');
            \Session::flash('mensaje','Error, no se cumplen las validaciones. Compruebe todos los campos');
            //Volver con los errores
            
            return \Redirect::back()->withInput()->withErrors($validador);
        }else{

                //Generar plotter
                $plotter=new Plotter();
                $plotter->marca=$datos["marca"];
                $plotter->modelo=$datos["modelo"];
                $plotter->nombre=$datos["nombre"];
                $plotter->descripcion=$datos["descripcion"];
                $plotter->velocidad=$datos["velocidad"];
                
            
            //Generar un nombre único para la imagen
            $nombreImagen=Str::random(30)."-".$request->file('imagen')->getClientOriginalName();
            //Asociarselo al modelo
            $plotter->imagen=$nombreImagen;
            try{
                //Almacenar en la BD
                $plotter->save();
                //Almacenar el archivo en el servidor
                $request->file('imagen')->move('images/plotters',$nombreImagen);   
                    //Volver al listado
                    //Mensaje de OK
                    \Session::flash('tipoMensaje','success');
                    \Session::flash('mensaje','Plotter creado correctamente');
                
            }catch(\Exception $e){
                //echo $e->getMessage();
                //Mensaje de KO
                \Session::flash('tipoMensaje','danger');
                \Session::flash('mensaje','Error al crear el plotter');


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
       $plotter=Plotter::find($id);
       if (is_null($plotter))
        echo "No existe el plotter solicitado";    
       else
       {
        //Devolvemos la vista
        return view('plotters.show',['plotter'=> $plotter]);
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy(Plotter $plotter)
    {
        //$plotter=Plotter::find($id);  //Para cogerlo por el id
        $plotter->delete();
        \Session::flash('tipoMensaje','info');
        \Session::flash('mensaje','Plotter borrado correctamente');
        return \Redirect::back();
      
    }

   
}
