<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Laracasts\Flash\Flash;

use App\Categoria;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cat_items = Categoria::where('tipo', '=', 'Items')->get();
        $cat_productos = Categoria::where('tipo', '=', 'Productos')->get();

        return view('categorias.index')
                ->with('cat_items', $cat_items)
                ->with('cat_productos', $cat_productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $existe = Categoria::where('nombre', '=', $request->nombre)->where('tipo', '=', $request->tipo)->first();

        if( count($existe) == 0 ){
            $categoria = new Categoria($request->all());
            $categoria->save();

            Flash::success("Se ha registrado la categoría ". $request->nombre." de forma exitosa.");

            return redirect()->route('categorias.index');
        }else{
            Flash::error("La categoría ".$request->nombre." ya existe.");
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
        //VALIDAR QUE NO ESTE INCLUIDA EN NINGUNA OTRA TABLA CON LA CUAL SE RELACIONES
        $categoria = Categoria::find($id);

        $categoria->delete();

        Flash::success("Se ha eliminado la categoría ". $categoria->nombre." de forma exitosa.");

        return redirect()->route('categorias.index');
    }
}
