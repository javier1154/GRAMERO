<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Iva;

use Laracasts\Flash\Flash;

class IvasController extends Controller
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
        return view('ivas.registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $iva = Iva::orderBy('id', 'DESC')->first();

        if(count($iva) == 1){

            $iva->hasta = date("Y-m-d", strtotime("$request->desde -1 day"));

            $iva->save();

            $iva_nuevo = new Iva($request->all());
            $iva_nuevo->save();

            Flash::success("Se ha registrado el nuevo IVA de ".$iva_nuevo->iva."% de forma exitosa.");

        }else{

            $iva_nuevo = new Iva($request->all());
            $iva_nuevo->save();

            Flash::success("Se ha registrado el nuevo IVA de ".$iva_nuevo->iva."% de forma exitosa.");

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
