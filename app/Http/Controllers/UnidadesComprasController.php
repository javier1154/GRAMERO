<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Unidades_compra;
use App\Unidades_venta;

use Laracasts\Flash\Flash;

class UnidadesComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidades_compras = Unidades_compra::all();
        $unidades_ventas = Unidades_venta::all();

        return view('unidades.index')
                ->with('unidades_compras', $unidades_compras)
                ->with('unidades_ventas', $unidades_ventas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unidades.registrarCompra');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $existe_nombre = Unidades_compra::where('nombre', '=', $request->nombre)->first();

        if( count($existe_nombre) == 0 ){

            $existe_nomenclatura = Unidades_compra::where('nomenclatura', '=', $request->nomenclatura)->first();

            if( count($existe_nomenclatura) == 0 ){
                $unidad = new Unidades_compra($request->all());
                $unidad->save();

                Flash::success("Se ha registrado la unidad de compra ". $request->nombre." de forma exitosa.");

                return redirect()->route('unidades.index');
            }else{
                Flash::error("Ya existe una unidad de compra con la nomenclatura ".$request->nomenclatura.".");
                return back()->withInput();
            }
        }else{
            Flash::error("Ya existe una unidad de compra con el nombre ".$request->nombre.".");
            return back()->withInput();
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
        //VALIDAR QUE NO ESTE ASOCIADA CON OTRO METODO O TABLA
        $unidad = Unidades_compra::find($id);
        $unidad->delete();

        Flash::success("Se ha eliminado la unidad de compra ". $unidad->nombre." de forma exitosa.");

        return redirect()->route('unidades.index');
    }
}
