<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Comissoe;
use App\Agente;
use Illuminate\Support\Facades\DB;

class agenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('comissao.lista_agente');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $comissao = Comissoe::all();
        $agentes = DB::table('users')
            ->join('agentes', 'agentes.users_id', '=', 'users.id')
            ->join('comissoes', 'comissoes.id', '=', 'agentes.comissoes_id')
            ->select('agentes.celular as c', 'comissoes.nome as comissao','users.name as nome')
            ->get();
        return view('comissao.tela_agente',compact('comissao','users','agentes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'users_id'           =>  'required',
            'celular'           =>  'required',
            'comissoes_id'           =>  'required',
        ]);

        $agente = new Agente();
        $agente->users_id = $request->users_id;
        $agente->celular = $request->celular;
        $agente->comissoes_id = $request->comissoes_id;

       // $agente= Agente::create($request->all());
        $agente->save();
       // return $this->create();
        return redirect('/agente');
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

    public function listaAgente()
    {
        $agentes = DB::table('users')
            ->join('agentes', 'agentes.users_id', '=', 'users.id')
            ->join('comissoes', 'comissoes.id', '=', 'agentes.comissoes_id')
            ->select('agentes.celular as c', 'comissoes.nome as comissao','users.name as nome')
            ->get();
        return view('comissao.tela_agente',compact('agentes'));
    }

}
