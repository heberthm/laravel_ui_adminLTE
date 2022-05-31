<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\Models\registros_contable;

class Registros_contableController extends Controller
{
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
      
      try{  
        $validatedData = $request->validate([
            
            'saldo'            =>    'required|max:12',
            'ingreso'          =>    'required|max:12',
            'egreso'           =>    'required|max:12',
            'responsable'      =>    'required|max:100',
            'descripcion'      =>    'required|max:200',
            

          ]);
   
          $save = new registros_contable;
   
         
          $save -> saldo = $request->saldo;
          $save-> ingreso = $request->ingreso;
          $save-> egreso = $request->egreso;
          $save-> responsable = $request->responsable;
          $save-> descripcion = $request->descripcion;

        
            
          $save->save();

        } catch (\Exception  $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

          return response()->json(['success'=>'Successfully']);
           
          
    }

}
