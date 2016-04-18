<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index')->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $existe_email = User::where('email', '=', $request->email)->get();

        if(count($existe_email) == 0){

            $usuario = new User($request->all());
            $usuario->save();

            //Flash::success("Se ha registrado el usuario ". $request->name." de forma exitosa.");

            return redirect()->route('usuarios.index');

        }else{
            //Flash::error("El correo electrónico ".$request->email." ya esta en uso.");

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
        $usuario = User::find($id);

        return view('usuarios.editar')->with('usuario', $usuario);
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

        //VERIFICAR SI LA CLAVE FUE CAMBIADA.

        $usuario = User::find($id);
        $usuario->fill($request->all());

        $usuario->save();

        //Flash::success("Se ha editado el usuario ". $request->name." de forma exitosa.");

        return redirect()->route('usuarios.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);

        $usuario->delete();

        //Flash::success("El usuario ". $usuario->name." ha sido eliminado de forma exitosa.");

        return redirect()->route('usuarios.index');

    }

    public function status($id){

        $user = User::find($id);

        if( $user->status == "Habilitado" ){
            $user->status = "Deshabilitado";

            $user->save();

            //Flash::success("Se ha ".$user->status." el usuario ". $user->name." de forma exitosa.");

        }else{
            $user->status = "Habilitado";

            $user->save();

            //Flash::success("Se ha ".$user->status." el usuario ". $user->name." de forma exitosa.");
        }

        return redirect()->route('usuarios.index');


    }
}
