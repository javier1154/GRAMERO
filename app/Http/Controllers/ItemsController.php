<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Unidades_compra;
use App\Categoria;
use App\inventario;

use Laracasts\Flash\Flash;

use App\Http\Requests;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $items = Item::all();
        return view('items.index')->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::where('tipo', 'Items')->lists('nombre', 'id');
        $unidades = Unidades_compra::lists('nombre', 'id');

        return view('items.registrar')
                ->with('categorias', $categorias)
                ->with('unidades', $unidades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $existe = Item::where('nombre', '=', $request->nombre)->first();

        if(count($existe) == 0){

            $item = new Item($request->all());
            $item->save();

            Flash::success("Se ha registrado el nuevo item ".$request->combre." de forma exitosa.");
            return redirect()->route('items.index');

        }else{

            Flash::error("Ocurrió un error al intentar registrar el item ".$request->nombre.".");
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
       $item = Item::find($id);
       return view('items.ver')->with('item', $item);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $categorias = Categoria::where('tipo', 'Items')->lists('nombre', 'id');
        $unidades = Unidades_compra::lists('nombre', 'id');

        return view('items.editar')
                ->with('item', $item)
                ->with('categorias', $categorias)
                ->with('unidades', $unidades);
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
        $existe = Item::where('id', '<>', $id)->where('nombre', '=', $request->nombre)->first();

        if(count($existe) == 0){

            $item = Item::find($id);
            $item->fill($request->all());
            $item->save();

            Flash::success("Se ha editado el ".$request->nombre." de forma exitosa.");
            return redirect()->route('items.index');

        }else{

            Flash::error("Ocurrió un error al intentar editar el item ".$request->nombre.".");
            return redirect()->back();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);

        $item->delete();

        Flash::success("El item ". $item->nombre." ha sido eliminado de forma exitosa.");

        return redirect()->route('items.index');

    }

    public function status($id){

        $item = Item::find($id);

        if( $item->status == "Habilitado" ){
            $item->status = "Deshabilitado";

            $item->save();

            Flash::success("Se ha ".$item->status." el item ". $item->nombre." de forma exitosa.");

        }else{
            $item->status = "Habilitado";

            $item->save();

            Flash::success("Se ha ".$item->status." el item ". $item->nombre." de forma exitosa.");
        }

        return redirect()->route('items.index');

    }

}
