<?php

namespace App\Http\Controllers;

use App\Analisis;
use App\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnalisisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //presenta un listado de usuarios paginados de 100 en 100
    $analisis=Analisis::paginate(100);
  
    return view("listados.listado_analisis")->with("analisis",$analisis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $area=Area::paginate(100);
        return view("formularios.form_nuevo_analisis")->with("areas",$area);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //crea un nuevo usuario en el sistema

        $reglas=[  'nombre' => 'required',
                    'clave' => 'required', 
                    'area' => 'required',];
         
        $mensajes=['nombre.unique' => 'El analisis ya se encuentra registrado en la base de datos', ];
          
        $validator = Validator::make( $request->all(),$reglas,$mensajes );
        if( $validator->fails() ){ 
            return view("mensajes.mensaje_error")->with("msj","...Existen errores...")
                                                ->withErrors($validator->errors());         
        }

        $analisis=new Analisis;
        $analisis->nombre=strtoupper( $request->input("nombre") ) ;
        $analisis->area_id=$request->input("area");
        $analisis->clave=$request->input("clave");
        
        
            
        if($analisis->save())
        {
            //PENDIENTE A MODIFICAR
      
          return view("mensajes.msj_creado")->with("msj","Analisis agregado correctamente")
                                            ->with("clase","Analisis") ;
        }
        else
        {
            return view("mensajes.mensaje_error")->with("msj","...Hubo un error al agregar ;...") ;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Analisis  $analisis
     * @return \Illuminate\Http\Response
     */
    public function show(Analisis $analisis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Analisis  $analisis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $analisis=Analisis::find($id);
        $area=Area::all();
        return view("formularios.form_editar_analisis")->with("analisis",$analisis)
                                                    ->with("area",$areas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Analisis  $analisis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id_analisis=$request->input("id_analisis");
        $analisis=Analisis::find($id_analisis);
        $analisis->name=strtoupper( $request->input("nombre") ) ;
        $analisis->clave=strtoupper( $request->input("clave") ) ;
        $analisis->area_id=$request->get("area1");
    
     
        if( $analisis->save()){
            return view("mensajes.msj_usuario_actualizado")->with("msj","Analisis actualizado correctamente")
                                                           ->with("idusuario",$id_analisis) ;
        }
        else
        {
            return view("mensajes.mensaje_error")->with("msj","..Hubo un error al agregar ; intentarlo nuevamente..");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Analisis  $analisis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $idusuario=$request->input("id_usuario");
        $usuario=User::find($idusuario);
    
        if($usuario->delete()){
             return view("mensajes.msj_usuario_borrado")->with("msj","Usuario borrado correctamente") ;
        }
        else
        {
            return view("mensajes.mensaje_error")->with("msj","..Hubo un error al agregar ; intentarlo nuevamente..");
        }
    }

    //METODOS
    public function listado_analisis(){
    //presenta un listado de usuarios paginados de 100 en 100
    $analisis=Analisis::paginate(100);
  
    return view("listados.listado_analisis")->with("analisis",$analisis);
    }
/////////////////////////////
    public function form_editar_analisis($id){
    $analisis=Analisis::find($id);
    $area=Area::all();
    return view("formularios.form_editar_analisis")->with("analisis",$analisis)
                                                    ->with("area",$areas);
    }
/////////////////////////////
    public function editar_analisis(Request $request){
          
    $id_analisis=$request->input("id_analisis");
    $analisis=Analisis::find($id_analisis);
    $analisis->name=strtoupper( $request->input("nombre") ) ;
    $analisis->clave=strtoupper( $request->input("clave") ) ;
    $analisis->area_id=$request->get("area1");
    
     
        if( $analisis->save()){
            return view("mensajes.msj_usuario_actualizado")->with("msj","Analisis actualizado correctamente")
                                                           ->with("idusuario",$id_analisis) ;
        }
        else
        {
            return view("mensajes.mensaje_error")->with("msj","..Hubo un error al agregar ; intentarlo nuevamente..");
        }
    }
//////////////////////////
    public function form_nuevo_analisis(){
    //carga el formulario para agregar un nuevo usuario
    
    return view("formularios.form_nuevo_analisis");

    }
    public function crear_analisis(Request $request){
    //crea un nuevo usuario en el sistema

        $reglas=[  'password' => 'required|min:8',
                     'email' => 'required|email|unique:users', ];
         
        $mensajes=[  'password.min' => 'El password debe tener al menos 8 caracteres',
                     'email.unique' => 'El email ya se encuentra registrado en la base de datos', ];
          
        $validator = Validator::make( $request->all(),$reglas,$mensajes );
        if( $validator->fails() ){ 
            return view("mensajes.mensaje_error")->with("msj","...Existen errores...")
                                                ->withErrors($validator->errors());         
        }

        $usuario=new User;
        $usuario->name=strtoupper( $request->input("nombres")." ".$request->input("apellidos") ) ;
        $usuario->nombres=strtoupper( $request->input("nombres") ) ;
        $usuario->apellidos=strtoupper( $request->input("apellidos") ) ;
        $usuario->telefono=$request->input("telefono");
        $usuario->email=$request->input("email");
        $usuario->password= bcrypt( $request->input("password") ); 
     
            
        if($usuario->save())
        {

      
          return view("mensajes.msj_usuario_creado")->with("msj","Usuario agregado correctamente") ;
        }
        else
        {
            return view("mensajes.mensaje_error")->with("msj","...Hubo un error al agregar ;...") ;
        }

        }
}
