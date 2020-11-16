<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserva;
use App\Apartamento;
use App\Casa;
use DB;
use App\Designacoe;
use App\Quarteiroe;
use App\Bairro;
use App\User;

class admin_tela_principalController extends Controller
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
        return view('read.administrador');
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

    public function listarReservas(){
        $bairro = Bairro::all();
        $quarteirao = Quarteiroe::all();
        $apartamento = DB::table('users')
            ->join('reservas','reservas.users_id','=','users.id')
            ->join('apartamentos','apartamentos.id','=','reservas.apartamentos_id')
            ->join('estados','estados.id','=','apartamentos.estado_id')
            ->join('designacoes','designacoes.id','=','apartamentos.designacoes_id')
            ->join('casas','casas.id','=','apartamentos.casas_id')
            ->join('bairros','bairros.id','=','casas.bairros_id')
            ->select('apartamentos.imagem as img','apartamentos.tipo as t', 'reservas.celular as cel',
                'reservas.id as idres','estados.estado as est',
                'users.name as n','designacoes.descricao as d','casas.numero_casa as num',
                'apartamentos.estado_id as e','reservas.created_at','apartamentos.preco as p',
                'apartamentos.id as id','bairros.nome as bairro')
            ->where('apartamentos.estado_id','=','2')->get();
        return view('administrador.tela_reservas',compact('apartamento','bairro','quarteirao') );
    }

    public function pesquisarReservas(Request $request){
        $bairro = Bairro::all();
        $quarteirao = Quarteiroe::all();
        $apartamento = DB::table('users')
            ->join('reservas','reservas.users_id','=','users.id')
            ->join('apartamentos','apartamentos.id','=','reservas.apartamentos_id')
            ->join('designacoes','designacoes.id','=','apartamentos.designacoes_id')
            ->join('casas','casas.id','=','apartamentos.casas_id')
            ->join('bairros','bairros.id','=','casas.bairros_id')
            ->join('quarteiroes','quarteiroes.bairros_id','=','bairros.id')
            ->select('apartamentos.imagem as img','apartamentos.tipo as t', 'reservas.celular as cel',
                'reservas.id as idres','bairros.nome','quarteiroes.numero',
                'users.name as n','designacoes.descricao as d','casas.numero_casa as num',
                'apartamentos.estado_id as e','reservas.created_at','apartamentos.preco as p',
                'apartamentos.id as id','bairros.nome as bairro')
            ->where('apartamentos.estado_id','=','2')
            ->where('bairros.nome','=',$request->bairro)
            ->where('quarteiroes.numero','=',$request->quarteirao)
            ->get();
        return view('administrador.lista_pesquisa_reservas',compact('apartamento','bairro','quarteirao') );
    }

    public function listarArrendamentos(){
        $apartamento = DB::table('users')
            ->join('reservas','reservas.users_id','=','users.id')
            ->join('apartamentos','apartamentos.id','=','reservas.apartamentos_id')
            ->join('designacoes','designacoes.id','=','apartamentos.designacoes_id')
            ->join('casas','casas.id','=','apartamentos.casas_id')
            ->join('bairros','bairros.id','=','casas.bairros_id')
            ->select('apartamentos.imagem as img','apartamentos.tipo as t', 'reservas.celular as cel',
                'reservas.id as idres','bairros.nome as bairro',
                'users.name as n','designacoes.descricao as d','casas.numero_casa as num',
                'apartamentos.estado_id as e','reservas.created_at','apartamentos.preco as p','apartamentos.id as id')
            ->where('apartamentos.estado_id','=','3')->get();
        return view('administrador.tela_arrendamento',compact('apartamento') );
    }
}
