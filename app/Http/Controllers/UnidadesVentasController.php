<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Unidades_compra;
use App\Unidades_venta;

use Laracasts\Flash\Flash;


class UnidadesVentasController extends Controller
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
        $unidades_compras = Unidades_compra::whereNotIn('id', function($q){
            $q->select('id_unidad_compra')->from('unidades_ventas');
        })->lists('nombre', 'id');

        return view('unidades.registrarVenta')
                ->with('unidades_compras', $unidades_compras);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $existe_compra = Unidades_venta::where('id_unidad_compra', '=', $request->id_unidad_compra)->first();

        if( count($existe_compra) == 0 ){

            $existe_nombre = Unidades_venta::where('nombre', '=', $request->nombre)->first();

            if( count($existe_nombre) == 0 ){

                $existe_nomenclatura = Unidades_venta::where('nomenclatura', '=', $request->nomenclatura)->first();

                if( count($existe_nomenclatura) == 0 ){
                    $unidad = new Unidades_venta($request->all());
                    $unidad->save();

                    Flash::success("Se ha registrado la unidad de venta ". $request->nombre." de forma exitosa.");

                    return redirect()->route('unidades.index');
                }else{
                    Flash::error("Ya existe una unidad de venta con la nomenclatura ".$request->nomenclatura.".");
                    return back()->withInput();
                }
            }else{
                Flash::error("Ya existe una unidad de venta con el nombre ".$request->nombre.".");
                return back()->withInput();
            }
        }else{
            Flash::error("Ya existe una unidad de venta registrada para la unidad de compra que seleccionó.");
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
        $unidad = Unidades_venta::find($id);
        $unidad->delete();

        Flash::success("Se ha eliminado la unidad de venta ". $unidad->nombre." de forma exitosa.");

        return redirect()->route('unidades.index');    }
}
