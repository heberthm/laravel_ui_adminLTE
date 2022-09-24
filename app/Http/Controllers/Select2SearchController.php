<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\ModelNotFoundException;  



use App\Models\Cliente;

use App\Models\mascota;


class Select2SearchController extends Controller
{

    public function index()
    {
    	return view('cliente');
    }

    public function selectSearch(Request $request)
    {
    	

        if($request->has('q')){
            $search = $request->q;
            $cliente =Cliente::select("user_id", "id_cliente", "cedula", "nombre")
                    ->where('user_id', Auth::user()->id)
            		->where('nombre',  'LIKE', "%${search}%" )
                   // ->orWhere('cedula', 'LIKE', "%{$search}%") 
            		->get();
        }
        return response()->json($cliente);
        
    }

  
    public function mostrarCliente($id_clientes) 
   {

    $id_clientes = cliente::select('id_cliente', 'cedula', 'nombre', 'celular', 'direccion', 'barrio', 'email')
    ->where('clientes.id_cliente',  $id_clientes)
    ->get();
    
    if($id_clientes === null){
   // $id_cliente = cliente::where('id_cliente',  $id_cliente)->firstOrFail();

   
    return Redirect()->Route('inicio');

} else {

    return view('cliente', compact('id_clientes'));
   
 }


  
  
    
       
  } 
 
}