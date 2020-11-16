<?php

namespace App\Http\Controllers;

use App\Estado;
use Doctrine\DBAL\Types\DateType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Reserva;
use App\Apartamento;
use App\Casa;
use DB;
use App\Designacoe;
use App\Quarteiroe;
use App\Bairro;
use App\User;
use function Sodium\add;


class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserva::all();
        return view('comissao.tela_mensagem', compact('reservas'));
    }

    public function indexModal()
    {

        return view('cliente.tela_modal_reserva');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('comissao.tela_reserva');  
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
            'apartamento_id'     =>  'required',
            'celular'            =>  'required'

        ]);


        $reserva = new Reserva;
        $reserva->users_id = $request->users_id;
        $reserva->apartamentos_id = $request->apartamento_id;
        $reserva->celular = $request->celular;
        $reserva->save();

        //return redirect('/reservar')->with('sucesso','A sua reserva foi feita com sucesso!');

        return redirect('/cliente_lista_apartamento')->with('sucesso','A sua reserva foi feita com sucesso!');
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
        $apartamento = Apartamento::FindOrFail($id);
        return view('cliente.tela_cliente', compact('apartamento'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /*
    public function update(Request $request, $id)
    {
        $apartamento = Apartamento::Find($id);

        $apartamento->casas_id = $request->input('casas_id');

        $apartamento->designacoes_id = $request->Input('designacoes_id');
        $apartamento->tipo = $request-> Input('tipo');
        $apartamento->preco = $request-> Input('preco');
        $apartamento->estado_id = $request-> Input('estado');
        $apartamento->imagem = $request->input('imagem');

        $apartamento->save();

        return redirect('/reservas');
    }

    */

    public function actualizar($id)
    {
        //$apartamento = Apartamento::Find($id);
        $apartamento = DB::table('estados')
            ->join('apartamentos','apartamentos.estados_id','=','estados.id')
            ->select('apartamentos.id as id','apartamentos.casas_id as casas_id',
                'apartamentos.designacoes_id as designacoes_id','apartamentos.users_id as users_id',
                'apartamentos.tipo as tipo','apartamentos.preco as preco','apartamentos.estado_id as estado_id',
                'apartamentos.imagem as imagem','estado.estado as estado')
            ->where('apartamentos.id','=',$id )->get();
        return response()->json(['resustado'=>$apartamento]);
    }

    public function update(Request $request)
    {
        $id = $request->input('apartamento_id');
        $apartamento = Apartamento::Find($id);

        $apartamento->casas_id = $request->input('casas_id');
        $apartamento->designacoes_id = $request->input('designacoes_id');
        $apartamento->users_id = $request->input('users_id');
        $apartamento->tipo = $request->input('tipo');
        $apartamento->preco = $request->input('preco');
        $apartamento->estado_id = $request->input('estado_id');
        $apartamento->imagem = $request->input('imagem');
        $apartamento->save();

        return redirect('/reservas');
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

    public function expediente(){

        $id = auth()->id();
        $apartamento = DB::table('users')
            ->join('reservas','reservas.users_id','=','users.id')
            ->join('apartamentos','apartamentos.id','=','reservas.apartamentos_id')
            ->join('casas','casas.id','=','apartamentos.casas_id')
            ->join('bairros','bairros.id','=','casas.bairros_id')
            ->join('quarteiroes','quarteiroes.id','=','casas.quarteiroes_id')
            ->join('estados','estados.id','=','apartamentos.estado_id')
            ->join('designacoes','designacoes.id','=','apartamentos.designacoes_id')
            ->select('apartamentos.imagem as imagem','apartamentos.tipo as t', 'reservas.celular as cel',
                'users.name as n','users.id','designacoes.descricao as d','quarteiroes.numero as quart',
                'casas.numero_casa as num','reservas.created_at as data','reservas.apartamentos_id as idaprt','bairros.nome as b',
                'estados.estado as e','apartamentos.preco as p','apartamentos.id as id','casas.id as idcasa')
            ->where('users.id','=',$id )
            ->where('estados.estado','!=','livre' )->OrderBy('bairros.nome')->get();
        return view('cliente.tela_reservado',compact('apartamento') );

    }

    public function expedienteConfirmado(){

        $id = auth()->id();
        $apartamento = DB::table('users')
            ->join('reservas','reservas.users_id','=','users.id')
            ->join('apartamentos','apartamentos.id','=','reservas.apartamentos_id')
            ->join('estados','estados.id','=','apartamentos.estado_id')
            ->join('designacoes','designacoes.id','=','apartamentos.designacoes_id')
            ->join('casas','casas.id','=','apartamentos.casas_id')
            ->join('agentes','agentes.comissoes_id','=','casas.comissoes_id')
            ->join('bairros','bairros.id','=','casas.quarteiroes_id')
            ->join('quarteiroes','quarteiroes.id','=','casas.quarteiroes_id')
            ->select('apartamentos.imagem as imagem','apartamentos.tipo as t', 'reservas.celular as cel',
                'users.name as n','users.id','designacoes.descricao as d','quarteiroes.numero as quart',
                'casas.numero_casa as num','reservas.created_at as data','bairros.nome as b',
                'estados.estado as e','apartamentos.preco as p','apartamentos.id as id','agentes.celular as tel')
            ->where('users.id','=',$id )
            ->where('estados.estado','=', 'arrendado' )->get();
        return view('cliente.tela_reservado',compact('apartamento') );

    }

    public function experiencia_expediente(){

        $id = auth()->id();
        $apartamento = DB::table('users')
            ->join('reservas','reservas.users_id','=','users.id')
            ->join('apartamentos','apartamentos.id','=','reservas.apartamentos_id')
            ->join('estados','estados.id','=','apartamentos.estado_id')
            ->join('designacoes','designacoes.id','=','apartamentos.designacoes_id')
            ->join('casas','casas.id','=','apartamentos.casas_id')
            ->join('bairros','bairros.id','=','casas.quarteiroes_id')
            ->join('quarteiroes','quarteiroes.id','=','casas.quarteiroes_id')
            ->select('apartamentos.imagem','apartamentos.tipo as t', 'reservas.celular as cel',
                'users.name as n','users.id','designacoes.descricao as d','quarteiroes.numero as quart',
                'casas.numero_casa as num','reservas.created_at as data','bairros.nome as b',
                'estados.estado as e','apartamentos.preco as p','apartamentos.id as id')
            ->where('users.id','=',$id )
            ->where('estados.estado','=', 'arrendado' )->get();

        return view('cliente.tela_espediente_experiencia',compact('apartamento'));
    }

    public function prepararReserva($id){

        $apartamento = Apartamento::where('id','=',$id)->first();
        //$bairro = Bairro::FindOrFail($id);
        return view('cliente.tela_reserva',compact('apartamento'));

    }

    public function editReserva($id)
    {
        $apartamento = Apartamento::where('id','=',$id)->first();
        $estados = Estado::all();
        return view('comissao.editar_reserva',compact('apartamento','estados'));
    }




    public function listarReservas(){

       $bairros = Bairro::all();
       $estados = Estado::all();
       $apartamento = DB::table('users')
            ->join('reservas','reservas.users_id','=','users.id')
            ->join('apartamentos','apartamentos.id','=','reservas.apartamentos_id')
           ->join('estados','estados.id','=','apartamentos.estado_id')
            ->join('designacoes','designacoes.id','=','apartamentos.designacoes_id')
            ->join('casas','casas.id','=','apartamentos.casas_id')
            ->select('apartamentos.imagem as img','apartamentos.tipo as t', 'reservas.celular as cel',
                'reservas.id as idres',
                'users.name as n','designacoes.descricao as d','casas.numero_casa as num',
                    'estados.estado as e','apartamentos.preco as p','apartamentos.id as id')->get();
        return view('comissao.tela_apartamento_reservado',compact('apartamento','bairros','estados') );
    }

    public function pesquisarReservas( Request $request ){

        $bair =  $request->input('bairro');
        $est =  $request->input('estado');
        $bairros = Bairro::all();
        $estados = Estado::all();
        $apartamento = DB::table('users')
            ->join('reservas','reservas.users_id','=','users.id')
            ->join('apartamentos','apartamentos.id','=','reservas.apartamentos_id')
            ->join('estados','estados.id','=','apartamentos.estado_id')
            ->join('designacoes','designacoes.id','=','apartamentos.designacoes_id')
            ->join('casas','casas.id','=','apartamentos.casas_id')
            ->join('quarteiroes','quarteiroes.id','=','casas.quarteiroes_id')
            ->join('bairros','bairros.id','=','quarteiroes.bairros_id')
            ->select('apartamentos.imagem as img','apartamentos.tipo as t', 'reservas.celular as cel',
                'reservas.id as idres','bairros.nome as b','estados.estado as est',
                'users.name as n','designacoes.descricao as d','casas.numero_casa as num',
                'estados.estado as e','apartamentos.preco as p','apartamentos.id as id')
            ->where('bairros.nome','=',$bair )
            ->where('estados.estado','=',$est )->get();
        return view('comissao.lista_pesquisa_reserva',compact('apartamento','bairros','estados') );
    }

    public function modal_listarReservas(){
        $apartamento = DB::table('users')
            ->join('reservas','reservas.users_id','=','users.id')
            ->join('apartamentos','apartamentos.id','=','reservas.apartamentos_id')
            ->join('estados','estados.id','=','apartamentos.estado_id')
            ->join('designacoes','designacoes.id','=','apartamentos.designacoes_id')
            ->join('casas','casas.id','=','apartamentos.casas_id')
            ->select('apartamentos.imagem as img','apartamentos.tipo as t', 'reservas.celular as cel',
                'reservas.id as idres',
                'users.name as n','designacoes.descricao as d','casas.numero_casa as num',
                'estados.estado as e','apartamentos.preco as p','apartamentos.id as id')->get();
        return view('comissao.tela_apartamento_reservado',compact('apartamento') );
    }

    public function ReservasComissoes(){

        $usuario = auth()->id();
        $apartamento = DB::table('users')
            ->join('reservas','reservas.users_id','=','users.id')
            ->join('apartamentos','apartamentos.id','=','reservas.apartamentos_id')
            ->join('estados','estados.id','=','apartamentos.estado_id')
            ->join('designacoes','designacoes.id','=','apartamentos.designacoes_id')
            ->join('casas','casas.id','=','apartamentos.casas_id')
            ->join('quarteiroes','quarteiroes.id','=','.casas.quarteiroes_id')
            ->join('bairros','bairros.id','=','quarteiroes.bairros_id')
            ->select('apartamentos.imagem as img','apartamentos.tipo as t', 'reservas.celular as cel',
                'reservas.id as idres','casas.users_id','quarteiroes.numero as numero','bairros.nome as b',
                'users.name as n','designacoes.descricao as d','casas.numero_casa as num',
                'estados.estado as e','apartamentos.preco as p','apartamentos.id as id','apartamentos.users_id')
            ->where('casas.users_id','=',$usuario)
            ->orderby('numero', 'asc')->get();
        return view('comissoes.tela_apartamento_reservado',compact('apartamento') );
    }

    public function editmensagem(){

        return view('comissao.tela_mensagem');
    }

}
