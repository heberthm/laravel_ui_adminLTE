<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ValidarFormularioRequest;

use Illuminate\Support\Facades\Auth;

use Redirect,Response;


use App\Models\Cliente;


class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTable()
    {
        return view('inicio');
    }


    public function index(Request $request)
    {

        if(request()->ajax()) {

          //  $data = Cliente::where('user_id', Auth::user()->id)->latest()->get();
          $data = Cliente::where('user_id', Auth::user()->id)->get()->latest();
         // ->select('*');
            return datatables()->of($data)
            ->addColumn('action', 'Editar')
            ->rawColumns(['action'])
            ->addColumn('action', function($article) {
                return "<a href='route-for-delete' class='btn btn-primary btn-sm'>Editar</a>";
            })

            ->make(true);
        }
        return view('inicio');

      /** 
        if ($request->ajax()) {
            $data = Cliente::latest()->get();
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="btn btn-sm btn-primary">Edit</a> <a href="javascript:void(0)" class="btn btn-sm btn-danger">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);


        }

        **/
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
          'cedula'    =>    'required|unique:clientes|max:18',
          'nombre'    =>    'required|max:35',
          'celular'   =>    'required|max:26',
          'direccion' =>    'required|max:50',
          'barrio'    =>    'required|max:25',
          'email'     =>    'required|max:50',
        ]);
 
        try {
        $save = new Cliente;
 
        $save ->user_id   = $request->userId;
        $save->cedula     = $request->cedula;
        $save->nombre     = $request->nombre;
        $save->celular    = $request->celular;
        $save->direccion  = $request->direccion;
        $save->barrio     = $request->barrio;
        $save->email      = $request->email;

        } catch (\Exception  $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
 
        $save->save();
        return response()->json(['success'=>'Successfully']);
       // return redirect('inicio');

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
  
     
    public function update(Request $request, $id_cliente)
    { 
      
      try{
        $id = array('id_cliente' => $request->id_cliente);
        $updateArray = [
                        'cedula' => $request->cedula,
                        'nombre' => $request->nombre,
                        'celular' => $request->celular,
                        'direccion' => $request->direccion,
                        'barrio' => $request->barrio,
                        'email' => $request->email,
                       
                       ];
          
          $id_cliente  = Cliente::where($id)->update($updateArray);
 
        } catch (\Exception  $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

          return response()->json(['success'=>'Successfully']);
     
         /*
        $cliente = Cliente::findOrFail($id_cliente);
        $name = $request->get('name');
        $value = $request->get('value');
        $cliente->$name = $value;
        return $cliente->save();
       */

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


