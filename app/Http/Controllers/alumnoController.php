<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Alumno;
use App\Genero;
use App\Http\Requests\AlumnoRequest;

class alumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $alumnos=Alumno::orderBy('id','ASC')->paginate(5);
        return view('alumnoLista')->with('alumnos',$alumnos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('alumnoFormulario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'documento' => 'required|max:20',
            'nombres' => 'required|max:50',
            'apellidos' => 'required|max:50',
            'genero' => 'required|max:3',
            'fechanacimiento' => 'required'
        ],[
            'documento.max' => 'Maximo 20 caracteres para el documento'            
        ]);
        
        Alumno::create([
            'documento' => $request->get('documento'),
            'nombres' => $request->get('nombres'),
            'apellidos' => $request->get('apellidos'),
            'genero' => $request->get('genero'),
            'fechanacimiento' => $request->get('fechanacimiento')
        ]);
        return back()->with('mensaje','Haz agregado un alumno a la lista');
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
        //
        $alumno = Alumno::find($id);
        $generos = Genero::all();
        return view('alumnoEditar')->with("alumno", $alumno)->with("generos", $generos);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlumnoRequest $request, $id)
    {
        //
        /*$this->validate($request, [
            'documento' => 'required|max:20',
            'nombres' => 'required|max:50',
            'apellidos' => 'required|max:50',
            'generoalumno' => 'required|max:3',
            'fechanacimiento' => 'required'
        ],[
            'documento.max' => 'Maximo 20 caracteres para el documento'            
        ]);*/
                
        $alumno=Alumno::find($id);
        $alumno->documento=$request->documento;
        $alumno->nombres=$request->nombres;
        $alumno->apellidos=$request->apellidos;
        $alumno->genero=$request->generoalumno;
        $alumno->fechanacimiento=$request->fechanacimiento;
        $alumno->save();
        return back()->with('mensaje','Haz editado el alumno '. $alumno->nombres.' con exito');
        //dd($alumno);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $alumno = Alumno::find($id);
        $alumno->delete();
        
        return back()->with('mensaje','Haz borrado un alumno de la lista');
    }
}
