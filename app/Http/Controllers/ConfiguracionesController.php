<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Configuracion;
use App\Metodos_pago;
use App\Iva;

use Laracasts\Flash\Flash;

class ConfiguracionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configuracion = Configuracion::first();

        $ivas = Iva::all();
        $metodos = Metodos_pago::all();

        $hoy = date('Y-m-d');

        $iva_actual = Iva::where('desde', '<=', $hoy)->where('hasta', '>=', $hoy)->first();

        if(count($iva_actual) == 0){
            $iva_actual = Iva::where('desde', '<=', $hoy)->where('hasta', '=', NULL)->first();
        }

        return view('configuraciones.index')
                ->with('configuracion', $configuracion)
                ->with('iva_actual', $iva_actual)
                ->with('ivas', $ivas)
                ->with('metodos', $metodos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuraciones.registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $existen = Configuracion::all();

        if(count($existen) == 0){

            $configuracion = new Configuracion($request->all());
            $configuracion->save();

            //Flash::success("La información de la empresa fue registrada de forma exitosa.");

        }else{
            //Flash::error("La información de la empresa ya fue registrada anteriormente.");
        }

        return redirect()->route('configuraciones.index');
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
        $configuracion = Configuracion::find($id);

        return view('configuraciones.editar')->with('configuracion', $configuracion);
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
        $configuracion = Configuracion::find($id);
        $configuracion->fill($request->all());

        $configuracion->save();

        //Flash::success("Se ha editado la información de la empresa de forma exitosa.");

        return redirect()->route('configuraciones.index');
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
