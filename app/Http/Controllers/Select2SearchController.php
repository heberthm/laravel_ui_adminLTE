<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


use App\Models\Cliente;


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

    $id_clientes = Cliente::leftJoin('mascotas', 'mascotas.id_cliente', '=', 'clientes.id_cliente')
    ->select('clientes.id_cliente', 'clientes.cedula', 'clientes.nombre', 'clientes.celular', 'clientes.direccion',
    'clientes.barrio', 'clientes.email', 'mascotas.id', 'mascotas.nombre as nombreMascota', 'mascotas.edad',
    'mascotas.sexo', 'mascotas.especie', 'mascotas.raza', 'mascotas.caracteristicas', 'mascotas.color',
    'mascotas.peso', 'mascotas.esterilizado', 'mascotas.foto')
    ->where('clientes.id_cliente',  $id_clientes)
    ->get();
            
   // $id_cliente = cliente::where('id_cliente',  $id_cliente)->firstOrFail();

    return view('cliente', compact('id_clientes'));
  
       
  } 
 
}