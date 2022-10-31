<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


use App\Models\consultas_medicas;

class consultas_medicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
          'descipcion'                           =>    'max:500',
          'examen_clinico'                       =>    'max:300',
          'pre_diagnostico'                      =>    'max:500',
          'examenes_complementarios'             =>    'max:300',
          'diagnostico'                          =>    'max:500',
          'tratamiento'                          =>    'max:500',
          'medico_tratante'                      =>    'max:50',
          'profilaxis'                           =>    'max:60',
          'temperatura'                          =>    'max:3',
          'frecuencia_cardiaca'                  =>    'max:3',
          'frecuencia_respiratoria'              =>    'max:3',
          'cc'                                   =>    'max:3',
          'pcm'                                  =>    'max:3',
          'trc'                                  =>    'max:3',
          'condicion_dental'                     =>    'max:3',
          'condicion_oido'                       =>    'max:3',
          'nl'                                   =>    'max:3',
          'pam'                                  =>    'max:3',
          'receta'                               =>    'max:500',
          'recordatorio'                         =>    'max:600',
          'imagen'                               =>    'max:100',
          'formulario'                           =>    'max:600',
          'cirugia'                              =>    'max:3',

        ]);
 
      //  try {
        $data = new consultas_medicas();
 
        $data ->user_id   = $request->userId;
        
        $data->cedula     = $request->cedula;
        $data->nombre     = $request->nombre;
        $data->celular    = $request->celular;
        $data->direccion  = $request->direccion;
        $data->barrio     = $request->barrio;
        $data->email      = $request->email;
        
     
        /*    
        } catch (\Exception  $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        */
      
 
        $data->save();

        $id =$data->id;
     
        return redirect()->route('cliente', $id);
          
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
    public function destroy($id)
    {
        //
    }
}
