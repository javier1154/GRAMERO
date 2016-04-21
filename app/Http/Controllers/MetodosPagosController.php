<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Laracasts\Flash\Flash;

use App\Metodos_pago;

class MetodosPagosController extends Controller
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
        return view('metodosPagos.registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $existe = Metodos_pago::where('nombre', '=', $request->nombre)->where('tipo', '=', $request->tipo)->first();

        if( count($existe) == 0 ){
            $metodo_pago = new Metodos_pago($request->all());
            $metodo_pago->save();

            Flash::success("Se ha registrado el método de pago ". $request->nombre." para ".$request->tipo." de forma exitosa.");

            return redirect()->route('configuraciones.index');
        }else{
            Flash::error("El método de pago ".$request->nombre." para ".$request->tipo." ya existe.");
            return back()->withInput();
        }    }

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
        //VALIDAR QUE NO ESTE INCLUIDA EN NINGUNA OTRA TABLA CON LA CUAL SE RELACIONES
        $metodo = Metodos_pago::find($id);

        $metodo->delete();

        Flash::success("Se ha eliminado el método ". $metodo->nombre." para ".$metodo->tipo." de forma exitosa.");

        return redirect()->route('configuraciones.index');
    }

    public function status($id){

        $metodo = Metodos_pago::find($id);

        if( $metodo->status == "Habilitado" ){
            $metodo->status = "Deshabilitado";

            $metodo->save();

            Flash::success("Se ha ".$metodo->status." el método ". $metodo->nombre." de forma exitosa.");

        }else{
            $metodo->status = "Habilitado";

            $metodo->save();

            Flash::success("Se ha ".$metodo->status." el método ". $metodo->nombre." de forma exitosa.");
        }

        return redirect()->route('configuraciones.index');


    }
}
