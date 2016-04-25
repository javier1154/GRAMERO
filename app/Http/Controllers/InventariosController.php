<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Item;
use App\Iva;
use App\Proveedor;
use App\Metodos_pago;
use App\Inventario;
use App\Facturas_compra;

use Laracasts\Flash\Flash;

use Illuminate\Support\Facades\Auth;


class InventariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventarios = Inventario::
                    groupBy('id_item')
                    ->get();

        return view('inventarios.index')
                ->with('inventarios', $inventarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = date('Y-m-d');
        $iva_actual = Iva::where('desde', '<=', $hoy)->where('hasta', '>=', $hoy)->first();
        if(count($iva_actual) == 0){
            $iva_actual = Iva::where('desde', '<=', $hoy)->where('hasta', '=', NULL)->first();
        }

        if(count($iva_actual) > 0){

            $items = Item::orderBy('nombre', 'ASC')
                    ->where('status', '=','Habilitado')
                    ->get();

            $proveedores = Proveedor::where('status', '=', 'Habilitado')->lists('nombre', 'id');

            $metodos_pagos = Metodos_pago::where('tipo', '=', 'Proveedores')->where('status', '=', 'Habilitado')->lists('nombre', 'id');

            return view('inventarios.registrar')
                    ->with('items', $items)
                    ->with('iva', $iva_actual)
                    ->with('proveedores', $proveedores)
                    ->with('metodos_pagos', $metodos_pagos);

        }else{

            Flash::error("Ocurrió un error al intentar registrar una nueva compra de ingredientes. No existe un IVA configurado en el sistema para la fecha actual.");

            return view('inventarios.index');

        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if( count($request->id_item) > 1 ){

            $factura = new Facturas_compra();
            $factura->numero_factura = $request->numero_factura;
            $factura->id_proveedor = $request->id_proveedor;
            $factura->fecha = $request->fecha;
            $factura->id_metodo_pago = $request->id_metodo_pago;
            $factura->id_iva = $request->id_iva;
            $factura->id_usuario = Auth::user()->id;

            $factura->save();

            for ($i = 0; $i < count($request->id_item); $i++) { 
                
                if($i != 0){

                    $inventario = new Inventario();
                    $inventario->id_item = $request->id_item[$i];
                    $inventario->cantidad = $request->cantidad[$i];
                    $inventario->costo = $request->costo[$i];
                   
                    $item = Item::find($inventario->id_item);
                    $equivalencia = $item->unidad_compra->unidad_venta->equivalencia;

                    $inventario->cantidad_venta = $inventario->cantidad * $equivalencia;
                    $inventario->costo_unitario = $inventario->costo / $inventario->cantidad_venta;
                    $inventario->id_factura_compra = $factura->id;
                   
                    $inventario->save();

                }
                
            }

            //VALIDAR QUE SE HAYAN REGISTRADO TODOS LOS INGREDIENTES
            Flash::success("Se ha registrado la nueva factura de compra de forma exitosa.");
            return redirect()->route('inventarios.index');
            
        }else{
             Flash::error("Ocurrió un error al intentar registrar una nueva compra de ingredientes. Asegúrese de agregar ingredientes a la factura.");

            return view('inventarios.registrar');
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
        //
    }
}
