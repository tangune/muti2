<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$usuario = User::all();
        $usuario = DB::table('users')
            ->join('agentes','agentes.users_id','=','users.id')
            ->join('comissoes','comissoes.id','=','agentes.comissoes_id')
            ->join('bairros','bairros.id','=','comissoes.bairros_id')
            ->select( 'users.id as id','users.name as name','users.email as email','users.admin as admin'
                ,'comissoes.nome as comissao','bairros.nome as bairro' )
            ->where('admin','=',0)
            ->get();
        return view('administrador.lista_usuario',compact('usuario'));
    }
    public function administrador()
    {
        //$usuario = User::all();
        $usuario = DB::table('users')
            ->join('agentes','agentes.users_id','=','users.id')
            ->join('comissoes','comissoes.id','=','agentes.comissoes_id')
            ->join('bairros','bairros.id','=','comissoes.bairros_id')
            ->select( 'users.id as id','users.name as name','users.email as email','users.admin as admin'
                ,'comissoes.nome as comissao','bairros.nome as bairro' )
            ->where('admin','=',1)
            ->orWhere('admin','=',2)
            ->orWhere('admin','=',3)
            ->get();
        return view('administrador.lista_usuario',compact('usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $usuario = User::FindOrFail($id);
       // return view('administrador.editar_usuario',compact('usuario'));

        //$detalhes = User::where('id','=',$id)->first();
        /**$detalhes = DB::table('casas')
            ->join('apartamentos','apartamentos.casa_idcasa','=','casas.idcasa')
            ->join('bairros','idbairro','=','casas.bairro_idbairro')
            ->select('apartamentos.tipo as t','bairros.nome as b','casas.numero_casa as n')
            ->where( 'idcasa','=',$id)->first();
         */

        //return view('administrador.editar_usuario',compact('usuario'));
        return response()->json(['resustado'=>$usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $usuario = User::Find($id);

        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->admin = $request->input('admin');

        $usuario->save();

        /**
        $usuario->update([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
         */
        return redirect('/lista_usuario');
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
