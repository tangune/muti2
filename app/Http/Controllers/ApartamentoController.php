<?php

namespace App\Http\Controllers;

use App\Estado;
use App\User;
use Illuminate\Http\Request;
use App\Casa;
use App\Apartamento;
use Illuminate\Support\Facades\Input;
use App\File;
use DB;
use App\Designacoe;
use App\Quarteiroe;
use App\Bairro;



class ApartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bairro = Bairro::all();
        $quarteirao = Quarteiroe::all();
        $estado = Estado::all();
        $apartamento = DB::table('casas')
             ->join('apartamentos','apartamentos.casas_id','=','casas.id')
            ->join('estados','estados.id','=','apartamentos.estado_id')
            ->join('bairros','bairros.id','=','casas.bairros_id')
            ->join('quarteiroes','quarteiroes.id','=','casas.quarteiroes_id')
             ->join('designacoes','designacoes.id','=','apartamentos.designacoes_id')
             ->join('proprietarios','proprietarios.id','=','casas.proprietarios_id')
             ->select('apartamentos.imagem as img','casas.numero_casa as casa','apartamentos.tipo as t',
                 'proprietarios.nome as prop','quarteiroes.numero as n',
                 'proprietarios.contacto as cel','designacoes.descricao as desc','estados.estado as est',
                 'apartamentos.preco as prec','apartamentos.id as id')
            ->get();
        return view('administrador.lista_apartamento',compact('apartamento','bairro','quarteirao','estado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $estados = Estado::all();
        $bairro = Bairro::all();
        $quarteirao = Quarteiroe::all();
        $casa = Casa::all()->Where('users_id','=',auth()->user()->id);
        //$casa = $casas->firstWhere('users_id','=',auth()->user()->id);
        //dd($casa);
        $designacao = Designacoe::all();

        if (auth()->user()->admin == 2) {
            return view('comissao.tela_apartamento',compact('casa','designacao','bairro','quarteirao','estados'));
        } elseif (auth()->user()->admin == 3) {
            return view('comissoes.tela_apartamento',compact('casa','designacao','bairro','quarteirao','estados'));
        }

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
            'casas_id' => 'required',
            'designacoes_id' => 'required',
            'users_id' => 'required',
            'tipo' => 'required',
            'numero_apartamento' => 'required',
            'preco' => 'required',
            'estado_id' => 'required',
            'imagem' => 'required',
        ]);


        $apartamento = new Apartamento;
        $apartamentos = DB::table('casas')
            ->join('apartamentos', 'apartamentos.casas_id', '=', 'casas.id')
            ->join('designacoes', 'designacoes.id', '=', 'apartamentos.designacoes_id')
            ->select('casas.id as id_casa', 'designacoes.id as id_descricao','apartamentos.users_id')
            ->where('casas.id', '=', $request->casas_id)
            ->where('designacoes.id', '=', $request->designacoes_id)
            ->where('apartamentos.users_id', '=', auth()->id())
            ->get();
        //dd($apartamentos);

        $total = count($apartamentos);

        for ($i = 0; $i <= $total; $i++){
            if ($apartamentos->firstWhere('id_casa', '=', $request->casas_id)) {
                $apartamento->designacoes_id = Input::get('designacoes_id');
                if ($apartamentos->firstWhere('id_descricao', '=', $request->designacoes_id)){
                    //return redirect('/apartamento')->with('sucesso', 'Este apartamento ja foi registado!');
                }
                return redirect('/apartamento')->with('sucesso', 'Este apartamento ja foi registado!');
            } else {

            $apartamento->casas_id = Input::get('casas_id');
            $apartamento->designacoes_id = Input::get('designacoes_id');
            $apartamento->users_id = Input::get('users_id');
            $apartamento->tipo = Input::get('tipo');
            $apartamento->numero_apartamento = Input::get('numero_apartamento');
            $apartamento->preco = Input::get('preco');
            $apartamento->estado_id = Input::get('estado_id');

            if ($file = $request->file('imagem')) {

                $name = $file->getClientOriginalName();
                if ($file->move('images', $name)) {
                    $apartamento->imagem = $name;

                    $apartamento->save();
                };
            }
        }

         if (auth()->user()->admin == 2){
         //return $this->create();
                                            return redirect('/apartamento');
                            }elseif (auth()->user()->admin == 3){
         //return $this->create_comissao();
                            return redirect('/apartamento');
         }

        // return $this->create();
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
    public function actualizar($id)
    {

        $apartamento = Apartamento::Find($id);

        /*$apartamento = DB::table('casas')
            ->join('apartamentos','apartamentos.casas_id','=','casas.id')
            ->join('apartamentos','apartamentos.users_id','=','users.id')
            ->join('estados','estados.id','=','apartamentos.estado_id')
            ->join('designacoes','designacoes.id','=','apartamentos.designacoes_id')
            ->join('proprietarios','proprietarios.id','=','casas.proprietarios_id')
            ->select('apartamentos.imagem as imagem','apartamentos.id as id','casas.numero_casa as casa',
                'apartamentos.tipo as tipo',
                'proprietarios.nome as prop','casas.id as casas_id',
                'proprietarios.contacto as cel','designacoes.id as designacoes_id','estados.estado as estado_id',
                'apartamentos.preco as preco','users.id as users_id')
            ->where('apartamentos.id','=',$id )
            ->first();
        */
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
        return redirect('/comissaoListar');
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

    public function pesquisarApartamento(Request $request){

        $bairro = Bairro::all();
        $quarteirao = Quarteiroe::all();
        $estado = Estado::all();
        $apartamento = DB::table('casas')
            ->join('apartamentos','apartamentos.casas_id','=','casas.id')
            ->join('estados','estados.id','=','apartamentos.estado_id')
            ->join('bairros','bairros.id','=','casas.bairros_id')
            ->join('quarteiroes','quarteiroes.id','=','casas.quarteiroes_id')
            ->join('designacoes','designacoes.id','=','apartamentos.designacoes_id')
            ->join('proprietarios','proprietarios.id','=','casas.proprietarios_id')
            ->select('apartamentos.imagem as img','casas.numero_casa as casa','apartamentos.tipo as t'
                ,'proprietarios.nome as prop',
                'proprietarios.contacto as cel','designacoes.descricao as desc','bairros.nome as b'
                ,'estados.estado as est',
                'apartamentos.preco as prec','quarteiroes.numero as n','apartamentos.id')
            ->where('bairros.nome', $request->bairro)
           // ->where('quarteiroes.numero', $request->quarteirao)
            ->where('estados.estado', $request->estado)
            ->get();
        return view('administrador.lista_pesquisa_apartamento',compact('apartamento','bairro','quarteirao','estado'));
    }
}
