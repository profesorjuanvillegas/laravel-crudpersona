<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Exception;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $datos['personas']= Persona::paginate(5);
        return view('persona.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('persona.create');
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
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Sexo'=>'required|string|max:100',
            'Telefono'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'

        ];
        
        $this->validate($request,$campos,$mensaje);



        //$datosPersona = request()->all();
        $datosPersona = request()->except('_token');
        Persona::insert($datosPersona);
        
        //return response()->json($datosPersona);

        return redirect('persona')->with('mensaje','Persona agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $persona=Persona::findOrFail($id);
        return view('persona.edit', compact('persona'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $campos=[
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Sexo'=>'required|string|max:100',
            'Telefono'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];
        
        $this->validate($request,$campos,$mensaje);


        $datosPersona = request()->except(['_token','_method']);
        Persona::where('id','=',$id)->update($datosPersona);
        $persona=Persona::findOrFail($id);
        //return view('persona.edit', compact('persona'));
        return redirect('persona')->with('mensaje','Persona Modificado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Persona::destroy($id);
        return redirect('persona')->with('mensaje','Persona Borrada');
    }
}
