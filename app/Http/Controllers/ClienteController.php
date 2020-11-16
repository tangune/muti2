<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Casa;
use App\Detalhe;
use App\Bairro;
use App\Quarteiroe;
use App\Apartamento;
use Illuminate\Support\Facades\Input;
use App\File;
use App\User;
use DB;
use function Sodium\add;

class clienteController extends Controller
{
    
          public function index()
    {
        $bairro = Bairro::all();
        $quarteirao = Quarteiroe::all();
        $user_id = auth()->user()->id;
          $apartamento = DB::table('casas')
             ->join('apartamentos','apartamentos.casas_id','=','casas.id')
              ->join('estados','estados.id','=','apartamentos.estado_id')
             ->select('apartamentos.imagem as img','apartamentos.preco as p','estados.estado','apartamentos.id')
              ->where( 'estados.estado','=','livre')->get();
        return view('cliente.tela_cliente',compact('apartamento','user_id','bairro','quarteirao'));
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

    public function detalhes($id)
    {
    //$detalhes = Apartamento::where('idapartamento','=',$id)->first();
     $detalhes = DB::table('casas')
             ->join('apartamentos','apartamentos.casas_id','=','casas.id')
             ->join('bairros','bairros.id','=','casas.bairros_id')
             ->join('quarteiroes','quarteiroes.id','=','casas.quarteiroes_id')
             ->select('apartamentos.tipo as t','bairros.nome as b','casas.numero_casa as n','quarteiroes.numero as nq')
         ->where( 'apartamentos.id','=',$id)->first();
    return response()->json(['resustado'=>$detalhes]);


   /* select casas.numero_casa as num, apartamentos.estado as e, detalhes.descricao as d , bairros.nome as n from casas JOIN apartamentos ON apartamentos.casa_idcasa = casas.idcasa JOIN detalhes ON detalhes.apartamentos_idapartamento = idapartamento JOIN bairros ON idbairro = casas.bairro_idbairro
     */
    }

    public function detalhesAgente($id)
    {
        //$detalhes = Apartamento::where('idapartamento','=',$id)->first();
        $detalhes = DB::table('apartamentos')
            ->join('casas','casas.id','=','apartamentos.casas_id')
            ->join('agentes','agentes.id','=','casas.users_id')
            ->join('comissoes','comissoes.id','=','casas.comissoes_id')
            ->join('users','users.id','=','agentes.id')
            ->select('agentes.celular as tel','comissoes.nome as c','users.name as n')
            ->where( 'apartamentos.id','=',$id)->first();
        return response()->json(['resustado'=>$detalhes]);


        /* select casas.numero_casa as num, apartamentos.estado as e, detalhes.descricao as d , bairros.nome as n from casas JOIN apartamentos ON apartamentos.casa_idcasa = casas.idcasa JOIN detalhes ON detalhes.apartamentos_idapartamento = idapartamento JOIN bairros ON idbairro = casas.bairro_idbairro
          */
    }

    public function reservar($id)
    {
        $apartamento = Apartamento::where('id','=',$id)->first();

        return response()->json(['resustado'=>$apartamento]);

        /* select casas.numero_casa as num, apartamentos.estado as e, detalhes.descricao as d , bairros.nome as n from casas JOIN apartamentos ON apartamentos.casa_idcasa = casas.idcasa JOIN detalhes ON detalhes.apartamentos_idapartamento = idapartamento JOIN bairros ON idbairro = casas.bairro_idbairro
          */
    }

    public function pesquisarCasa(Request $request){
        $bairro = Bairro::all();
        $quarteirao = Quarteiroe::all();
 $casas = DB::table('casas')
             ->join('apartamentos','apartamentos.casas_id','=','casas.id')
             ->join('bairros','bairros.id','=','casas.bairros_id')
             ->join('quarteiroes','quarteiroes.id','=','casas.quarteiroes_id')
 ->select('apartamentos.imagem as img','apartamentos.preco as p','apartamentos.id','bairros.nome as b', 'quarteiroes.numero as n')
 ->where('bairros.nome', $request->bairro)
 //->where('quarteiroes.numero', $request->quarteirao)
 ->get();

 return view('cliente.tela_pesquisa_casa',compact('casas','bairro','quarteirao'));
}




}