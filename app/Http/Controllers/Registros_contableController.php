<?php

namespace App\Http\Controllers;

use App\Models\registros_contable;

use Illuminate\Http\Request;

use DataTables;

use Carbon\Carbon;

use Redirect,Response;



class Registros_contableController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

     /* 
        $registros  = registros_contable::SELECT('id', 'saldo', 'ingreso', 'egreso', 'responsable', 'descripcion');
        return view('inicio',compact('registros'));
  
      */
        
         
               
      if(request()->ajax()) {
            $registros = registros_contable::select('id', 'saldo', 'ingreso', 'egreso', 'responsable', 'descripcion');
            
            return datatables()->of($registros)
          
            ->addColumn('created_at', function($row)  {  
            //   $date = date('d-m-Y h:i', strtotime($row->created_at));

               // return $date;
                return Carbon::parse($row->created_at)->format('d-m-Y h:i');
              })
            ->addColumn('action', 'atencion')
            ->rawColumns(['action'])
            ->addColumn('action', function($data) {


                $actionBtn = '<a href="{{ route(\'perfil_usuario\') }}"  title="ir a consulta" class="ir_cita fa fa-stethoscope"  </a> 
               
                <a href="#" name="delete" id="'.$data->id.'" class="delete fa fa-trash" title="Eliminar cita"</a>';
                
                 
                return $actionBtn;
               
            })

           
            ->make(true);
        } 
        return view('inicio');



    }



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
      
     /*
        $validatedData = $request->validate([
            
            'saldo'            =>    'required|max:12',
            'ingreso'          =>    'required|max:12',
            'egreso'           =>    'required|max:12',
            'responsable'      =>    'required|max:100',
            'descripcion'      =>    'required|max:200',
            

          ]);
    */
   
          $save = new registros_contable;
   
         
          $save -> saldo = $request->saldo;
          $save-> ingreso = $request->ingreso;
          $save-> egreso = $request->egreso;
          $save-> responsable = $request->responsable;
          $save-> descripcion = $request->descripcion;

        
            
          $save->save();

       

          return response()->json(['success'=>'Successfully']);
           
          
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function crear_saldo(Request $request)
    {
      
     /*
        $validatedData = $request->validate([
            
            'saldo'            =>    'required|max:12',
            'ingreso'          =>    'required|max:12',
            'egreso'           =>    'required|max:12',
            'responsable'      =>    'required|max:100',
            'descripcion'      =>    'required|max:200',
            

          ]);
    */
   
          $save = new registros_contable;
   
         
         
          $save-> ingreso = $request->ingreso;
          $save-> responsable = $request->responsable;
          $save-> descripcion = $request->descripcion;

        
            
          $save->save();

       

          return response()->json(['success'=>'Successfully']);
           
          
    }


}

