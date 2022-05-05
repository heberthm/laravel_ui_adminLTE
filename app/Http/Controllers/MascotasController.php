<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ValidarFormularioRequest;

use Illuminate\Support\Facades\Auth;

use Redirect,Response;


use App\Models\Mascota;
use App\Models\Cliente;




class MascotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, $id_cliente)
    {
      
        $id = Mascota::get('id', 'id_cliente','nombre','raza', 'especie', 'edad', 'color', 'sexo');
        return view('cliente',compact('id', 'id_cliente'));


    //   $id_clientes = Mascota::where('id',$id_clientes)->get('id', 'id_cliente','nombre','raza', 'especie', 'edad', 'color', 'sexo');
 
    //   return view('cliente', compact('id_clientes'));

      
    }



    public function buscarMascota(Request $request)
    {
     
        try{
            $data = Mascota::where("id_cliente",$request->id_cliente)->get(["id_cliente", "nombre", "especie"]);
       
        } catch (\Exception  $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

          return response()->json($data);
     

    }



    public function mostrarMascotas($id_clientes )
    {

       
      try{ 
        // $id_clientes = Mascota::where('id_cliente',$id_clientes)->get('id', 'id_cliente','nombre','raza', 'especie', 'edad', 'color', 'sexo');
 
        $id_clientes = Mascota::select('id', 'id_cliente','nombre','raza', 'especie', 'edad', 'color', 'sexo')->where('id_cliente', $id_clientes)->get(); 

        } catch (\Exception  $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return view('cliente', compact('id_clientes'));

     /*
        if($request->ajax()){
            $id_clientes = Mascota::all();
              return response()->json([
                 'success' => true,
                  'id_clientes' => $id_clientes
              ]);
           
        }
        return view('cliente');
      */  
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
      
      try{  
        $validatedData = $request->validate([
            
            'nombre'           =>    'required|max:20',
            'especie'          =>    'required|max:20',
            'raza'             =>    'required|max:20',
            'edad'             =>    'required|max:10',
            'sexo'             =>    'required|max:8',
            'color'            =>    'required|max:15',
            'peso'             =>    'required|max:8',
            'esterilizado'     =>    'required|max:20',
            'caracteristicas'  =>    'required|max:90',

          ]);
   
          $save = new Mascota;
   
          $save -> user_id = $request->userId;
          $save -> id_cliente = $request->id_cliente;
          $save->nombre = $request->nombre;
      
          $save->especie = $request->especie;
          $save->raza = $request->raza;
          $save->edad = $request->edad;
          $save->color = $request->color;
          $save->sexo = $request->sexo;
          $save->peso = $request->peso;
          $save->esterilizado = $request->esterilizado;
          $save->caracteristicas = $request->caracteristicas;
          $save->foto = $request->foto;
          
            
          $save->save();

        } catch (\Exception  $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

          return response()->json(['success'=>'Successfully']);
           
          
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
    public function destroy(Request $request, $id)
    {
     try{  
         $id = Mascota::where('id',$request->id)->delete();
   
        } catch (\Exception  $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return response()->json(['success' => true]);
    }
  


}