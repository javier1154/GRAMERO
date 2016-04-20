<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Proveedor;

use Laracasts\Flash\Flash;

use Illuminate\Support\Facades\Auth;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $proveedores = Proveedor::all();
        return view('proveedores.index')->with('proveedores', $proveedores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedores.registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $existe = Proveedor::where('rif', '=', $request->rif)->first();

        if(count($existe) == 0){

            $proveedor = new Proveedor($request->all());
            $proveedor->id_usuario = Auth::user()->id;
            $proveedor->save();

            Flash::success("Se ha registrado al nuevo proveedor ".$request->combre." de forma exitosa.");
            return redirect()->route('proveedores.index');

        }else{

            Flash::error("Ocurrió un error al intentar registrar al proveedor ".$request->nombre.".");
            return redirect()->back();

        }
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
        $proveedor = Proveedor::find($id);

        return view('proveedores.editar')->with('proveedor', $proveedor);
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
        $proveedor = Proveedor::find($id);
        $proveedor->fill($request->all());
        $proveedor->save();

        Flash::success("Se ha editado el ".$request->nombre." de forma exitosa.");
        return redirect()->route('proveedores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::find($id);

        $proveedor->delete();

        Flash::success("El proveedor ". $proveedor->nombre." ha sido eliminado de forma exitosa.");

        return redirect()->route('proveedores.index');

    }

    public function status($id){

        $proveedor = Proveedor::find($id);

        if( $proveedor->status == "Habilitado" ){
            $proveedor->status = "Deshabilitado";

            $proveedor->save();

            Flash::success("Se ha ".$proveedor->status." al proveedor ". $proveedor->nombre." de forma exitosa.");

        }else{
            $proveedor->status = "Habilitado";

            $proveedor->save();

            Flash::success("Se ha ".$proveedor->status." al proveedor ". $proveedor->nombre." de forma exitosa.");
        }

        return redirect()->route('proveedores.index');

    }
}
