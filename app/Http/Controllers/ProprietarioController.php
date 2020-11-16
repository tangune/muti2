<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proprietario;
use Illuminate\Support\Facades\DB;

class ProprietarioController extends Controller
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
        $proprietarios = DB::table('proprietarios')
            ->join('casas', 'casas.proprietarios_id', '=', 'proprietarios.id')
            ->join('comissoes', 'comissoes.id', '=', 'casas.comissoes_id')
            ->join('bairros', 'bairros.id', '=', 'comissoes.bairros_id')
            ->select('proprietarios.nome as nome','proprietarios.contacto as celular', 'comissoes.nome as comissao',
                'bairros.nome as bairro','casas.numero_casa as numero')->orderBy('nome')
            ->get();
        return view('comissao.tela_proprietario', compact('proprietarios'));
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
            'nome'           =>  'required',
            'contacto'           =>  'required',
        ]);

        $proprietario = new Proprietario();
        $proprietario->nome = $request->nome;
        $proprietario->contacto = $request->contacto;

        $proprietario= Proprietario::create($request->all());
        $proprietario->save();
        return $this->create();
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
        $proprietarios = Proprietario::where('id','=',$id)->first();
        return view('comissao.editar_proprietario',compact('proprietarios'));
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
        $proprietarios = Proprietario::Find($id);

        $proprietarios->nome = $request->input('nome');
        $proprietarios->contacto = $request->input('contacto');
        $proprietarios->save();
        return redirect('/lista_casa');
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
