<?php

namespace App\Http\Controllers;

use App\Apartamento;
use App\Estado;
use Illuminate\Http\Request;
use App\Casa;
use App\Quarteiroe;
use App\Bairro;
use App\Comissoe;
use App\Proprietario;
use DB;
use Illuminate\Support\Facades\Input;


class casaController extends Controller
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
        /**
        $casas = DB::table('casas')
            ->join('apartamentos', 'apartamentos.casas_id', '=', 'casas.id')
            ->join('proprietarios', 'proprietarios.id', '=', 'casas.proprietarios_id')
            ->join('bairros', 'bairros.id', '=', 'casas.bairros_id')
            ->join('designacoes', 'designacoes.id', '=', 'apartamentos.designacoes_id')
            ->select('casas.numero_casa as casa','apartamentos.imagem as img',
                'proprietarios.nome as prop', 'proprietarios.id as id','bairros.nome as b',
                'proprietarios.contacto as cel', 'designacoes.descricao as desc')
            ->where('designacoes.descricao','=','casa-principal')
            ->get();
         */
        $casas = DB::table('casas')
            ->join('quarteiroes', 'quarteiroes.id', '=', 'casas.quarteiroes_id')
            ->join('apartamentos', 'apartamentos.casas_id', '=', 'casas.id')
            ->join('proprietarios', 'proprietarios.id', '=', 'casas.proprietarios_id')
            ->join('bairros', 'bairros.id', '=', 'casas.bairros_id')
            //->join('designacoes', 'designacoes.id', '=', 'apartamentos.designacoes_id')
            ->select('casas.numero_casa as casa','casas.created_at as data', 'proprietarios.nome as prop',
                'apartamentos.imagem as img','quarteiroes.numero as numero',
                'proprietarios.id as id','bairros.nome as b', 'proprietarios.contacto as cel')
            ->where('apartamentos.numero_apartamento','=',0)
            ->orderBy('bairros.nome')
            ->get();

          if (auth()->user()->admin == 2){
              return view('comissao.lista_casas', compact('casas','bairro','quarteirao'));
          }elseif (auth()->user()->admin == 1){
              return view('administrador.lista_casas', compact('casas','bairro','quarteirao'));
          }

    }

    public function pesquisarCasa(Request $request)
    {
        $bairro = Bairro::all();
        $quarteirao = Quarteiroe::all();
        /**
        $casas = DB::table('casas')
            ->join('apartamentos', 'apartamentos.casas_id', '=', 'casas.id')
            ->join('quarteiroes', 'quarteiroes.id', '=', 'casas.quarteiroes_id')
            ->join('bairros', 'bairros.id', '=', 'quarteiroes.bairros_id')
            ->join('designacoes', 'designacoes.id', '=', 'apartamentos.designacoes_id')
            ->join('proprietarios', 'proprietarios.id', '=', 'casas.proprietarios_id')
            ->select('casas.numero_casa as casa', 'proprietarios.nome as prop',
                'proprietarios.id as id','bairros.nome','quarteiroes.numero',
                'proprietarios.contacto as cel', 'designacoes.descricao as desc')
            ->where('bairros.nome', $request->bairro)
            ->where('quarteiroes.numero', $request->quarteirao)
            ->get();
         */
        $casas = DB::table('casas')
            ->join('quarteiroes', 'quarteiroes.id', '=', 'casas.quarteiroes_id')
            ->join('apartamentos', 'apartamentos.casas_id', '=', 'casas.id')
            ->join('proprietarios', 'proprietarios.id', '=', 'casas.proprietarios_id')
            ->join('bairros', 'bairros.id', '=', 'casas.bairros_id')
            //->join('designacoes', 'designacoes.id', '=', 'apartamentos.designacoes_id')
            ->select('casas.numero_casa as casa','casas.created_at as data', 'proprietarios.nome as prop','quarteiroes.numero as numero',
                'proprietarios.id as id','bairros.nome as b', 'proprietarios.contacto as cel','apartamentos.imagem as img')
            ->where('apartamentos.numero_apartamento','=',0)
            ->where('bairros.nome', $request->bairro)
            //->where('quarteiroes.numero', $request->quarteirao)
            ->get();
        if (auth()->user()->admin == 2){
            return view('comissao.lista_pesquisa_casas', compact('casas','bairro','quarteirao'));
        }elseif (auth()->user()->admin == 1){
            return view('administrador.lista_pesquisa_casas', compact('casas','bairro','quarteirao'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = auth()->id();

       /**
        $comissao = DB::table('comissoes')
            ->join('agentes', 'agentes.comissoes_id', '=', 'comissoes.id')
            ->select('comissoes.nome')
            ->where('agentes.users_id','=',$id)
            ->get();
        dd($comissao);
        */




        $bairro = DB::table('bairros')
            ->join('comissoes', 'comissoes.bairros_id', '=', 'bairros.id')
            ->join('agentes', 'agentes.comissoes_id', '=', 'comissoes.id')
            ->select('bairros.nome','bairros.id as id','comissoes.nome as c')
            ->where('agentes.users_id','=',$id)
            ->get();

        $quarteirao = DB::table('bairros')
        ->join('quarteiroes', 'quarteiroes.bairros_id', '=', 'bairros.id')
            ->join('comissoes', 'comissoes.bairros_id', '=', 'bairros.id')
            ->join('agentes', 'agentes.comissoes_id', '=', 'comissoes.id')
        ->select('quarteiroes.numero as numero','quarteiroes.id as id')
            ->where('agentes.users_id','=',$id)
        ->get();
        //dd($quarteirao);

        $proprietario = DB::table('bairros')
            ->join('quarteiroes', 'quarteiroes.bairros_id', '=', 'bairros.id')
            ->join('casas', 'casas.quarteiroes_id', '=', 'quarteiroes.id')
            ->join('proprietarios', 'proprietarios.id', '=', 'casas.proprietarios_id')
            ->join('comissoes', 'comissoes.bairros_id', '=', 'bairros.id')
            ->join('agentes', 'agentes.comissoes_id', '=', 'comissoes.id')
            ->select('proprietarios.nome as nome','proprietarios.id as id')
            ->where('agentes.users_id','=',$id)
            ->get();
        //dd($proprietario);

        $comissao = DB::table('comissoes')
            ->join('agentes', 'agentes.comissoes_id', '=', 'comissoes.id')
            ->select('comissoes.nome as nome','comissoes.id as id')
            ->where('agentes.users_id','=',$id)
            ->get();
        //dd($comissao);

        if (auth()->user()->admin == 2) {
            /**$bairro = Bairro::all();
            $quarteirao = Quarteiroe::all();
            $proprietario = Proprietario::all();
            $comissao = Comissoe::all(); */
            return view('comissao.tela_casa', compact('quarteirao', 'proprietario', 'bairro', 'comissao'));
        } elseif (auth()->user()->admin == 3) {
            return view('comissoes.tela_casa', compact('quarteirao', 'proprietario', 'bairro', 'comissao'));
        }
        //return view('comissao.tela_casa', compact('quarteirao', 'proprietario', 'bairro', 'comissao'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'bairros_id'           =>  'required',
            'quarteiroes_id'           =>  'required',
            'proprietarios_id'           =>  'required',
            'numero_casa'           =>  'required',
            'comissoes_id'          =>  'required',
        ]);

        /**
        $casas = DB::table('bairros')
            ->join('quarteiroes', 'quarteiroes.bairros_id', '=', 'bairros.id')
            ->join('casas', 'casas.quarteiroes_id', '=', 'quarteiroes.id')
            ->join('proprietarios', 'proprietarios.id', '=', 'casas.proprietarios_id')
            ->join('comissoes', 'comissoes.bairros_id', '=', 'bairros.id')
            ->join('agentes', 'agentes.comissoes_id', '=', 'comissoes.id')
            ->select('casas.bairros_id as bairro','casas.numero_casa as numero')
            ->where('agentes.users_id','=',auth()->id())
            ->get();
         */


        $casa = new Casa();

        //$casas = Casa::all()->Where('users_id','=',auth()->user()->id);
        $casas = DB::table('bairros')
            ->join('quarteiroes', 'quarteiroes.bairros_id', '=', 'bairros.id')
            ->join('casas', 'casas.quarteiroes_id', '=', 'quarteiroes.id')
            ->join('comissoes', 'comissoes.bairros_id', '=', 'bairros.id')
            ->join('agentes', 'agentes.comissoes_id', '=', 'comissoes.id')
            ->select('bairros.id as bairro','casas.numero_casa as casa','casas.users_id')
            ->where('casas.bairros_id', '=', $request->bairros_id)
            ->where('casas.numero_casa', '=', $request->numero_casa)
            ->where('casas.users_id', '=', auth()->id())
            ->get();

        //dd($casas);
        //$comissao_casas = Casa::all();



        $total = count($casas);
        //$comissao_total = count($comissao_casas);



        for ($i = 0; $i <= $total; $i++){
            if($casas->firstWhere('bairro','=', $request->bairros_id)){
                $casa->numero_casa = Input::get('numero_casa');
                if ($casas->firstWhere('casa', '=', $request->numero_casa)){

                }
                return redirect('/casa')->with('sucesso','Esta casa ja foi registada!');
            }
            else{
                $casa->bairros_id = $request->bairros_id;
                $casa->quarteiroes_id = $request->quarteiroes_id;
                $casa->proprietarios_id = $request->proprietarios_id;
                $casa->numero_casa = $request->numero_casa;
                $casa->comissoes_id = $request->comissoes_id;
                $casa->users_id = $request->users_id;
                $casa->save();
                return redirect('/casa');
            }
        }

       // $casa = Casa::create($request->all());
        /**$casa->save();
        //return $this->create();
        */return redirect('/casa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function actualizar($id)
    {
        $proprietario = DB::table('proprietarios')
            ->join('casas', 'casas.proprietarios_id', '=', 'proprietarios.id')
            ->select('proprietarios.nome as n','proprietarios.contacto as c','proprietarios.id as id',
                'casas.numero_casa as casa')
            ->where('proprietarios.id','=',$id )
            ->first();
        return response()->json(['resustado'=>$proprietario]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //listar apartamento para o controlo da comissao
    public function listar()
    {
        $bairro = Bairro::all();
        $quarteirao = Quarteiroe::all();
        $estado = Estado::all();
        $apart = Apartamento::all();
        $apartamento = DB::table('bairros')
            ->join('quarteiroes', 'quarteiroes.bairros_id', '=', 'bairros.id')
            ->join('casas', 'casas.quarteiroes_id', '=', 'quarteiroes.id')
            ->join('apartamentos', 'apartamentos.casas_id', '=', 'casas.id')
            ->join('estados', 'estados.id', '=', 'apartamentos.estado_id')
            ->join('designacoes', 'designacoes.id', '=', 'apartamentos.designacoes_id')
            ->join('proprietarios', 'proprietarios.id', '=', 'casas.proprietarios_id')
            ->select('apartamentos.imagem as img', 'casas.numero_casa as casa','casas.users_id','quarteiroes.numero as numero',
                'bairros.nome as bairro', 'apartamentos.tipo as t','apartamentos.users_id',
                'designacoes.descricao as desc', 'estados.estado as est',
                'apartamentos.preco as prec', 'apartamentos.id')
            ->where('apartamentos.users_id','=', auth()->user()->id)
            ->where('casas.users_id','=', auth()->user()->id)
            ->orderby('casa', 'asc')
            ->get();
        if (auth()->user()->admin == 2) {
            return view('comissao.lista_apartamento', compact('apartamento', 'bairro', 'quarteirao'));
        } elseif (auth()->user()->admin == 3) {
            return view('comissoes.comissoes_lista_apartamento', compact('apartamento', 'bairro', 'quarteirao', 'apart','estado'));
        }
        // return view('comissao.lista_apartamento',compact('apartamento','bairro','quarteirao'));
    }

    public function comissaoListar()
    {
        $bairro = Bairro::all();
        $quarteirao = Quarteiroe::all();
        $apart = Apartamento::all();
        $apartamento = DB::table('bairros')
            ->join('quarteiroes', 'quarteiroes.bairros_id', '=', 'bairros.id')
            ->join('casas', 'casas.quarteiroes_id', '=', 'quarteiroes.id')
            ->join('apartamentos', 'apartamentos.casas_id', '=', 'casas.id')
            ->join('estados', 'estados.id', '=', 'apartamentos.estado_id')
            ->join('designacoes', 'designacoes.id', '=', 'apartamentos.designacoes_id')
            ->join('proprietarios', 'proprietarios.id', '=', 'casas.proprietarios_id')
            ->select('apartamentos.imagem as img', 'casas.numero_casa as casa', 'apartamentos.tipo as t',
                'proprietarios.nome as prop',
                'proprietarios.contacto as cel', 'designacoes.descricao as desc', 'bairros.nome as bairro',
                'estados.estado as est',
                'apartamentos.preco as prec', 'quarteiroes.numero as numero', 'apartamentos.id')
            ->orderby('bairros.nome')
            ->get();
         return view('comissao.lista_apartamento',compact('apartamento','bairro','quarteirao'));
    }

    public function pesquisar(Request $request)
    {
        $bairro = Bairro::all();
        $quarteirao = Quarteiroe::all();
        $apart = Apartamento::all();
        $estado = Estado::all();
        $apartamento = DB::table('bairros')
            ->join('quarteiroes', 'quarteiroes.bairros_id', '=', 'bairros.id')
            ->join('casas', 'casas.quarteiroes_id', '=', 'quarteiroes.id')
            ->join('users', 'users.id', '=', 'casas.users_id')
            ->join('apartamentos', 'apartamentos.casas_id', '=', 'casas.id')
            ->join('estados', 'estados.id', '=', 'apartamentos.estado_id')
            ->join('designacoes', 'designacoes.id', '=', 'apartamentos.designacoes_id')
            ->join('proprietarios', 'proprietarios.id', '=', 'casas.proprietarios_id')
            ->select('apartamentos.imagem as img', 'casas.numero_casa as casa', 'apartamentos.tipo as t',
                'proprietarios.nome as prop','users.name as usuario',
                'proprietarios.contacto as cel', 'designacoes.descricao as desc', 'bairros.nome as bairro',
                'estados.estado as est',
                'apartamentos.preco as prec', 'quarteiroes.numero as numero', 'apartamentos.id')
            ->where('estados.estado', $request->estado)
           // ->where('quarteiroes.numero', $request->quarteirao)
            ->where('apartamentos.users_id','=', auth()->user()->id )
            ->orderby('t','asc')
            ->get();
        if (auth()->user()->admin == 2) {
            return view('comissao.lista_pesquisa', compact('apartamento', 'bairro', 'quarteirao'));
        } elseif (auth()->user()->admin == 3) {
            return view('comissoes.comissoes_lista_pesquisa', compact('apartamento', 'bairro', 'quarteirao', 'apart','estado'));
        }
        //return view('comissao.lista_pesquisa',compact('apartamento','bairro','quarteirao'));
    }

    public function comissaoPesquisar(Request $request)
    {
        $bairro = Bairro::all();
        $quarteirao = Quarteiroe::all();
        $apart = Apartamento::all();
        $apartamento = DB::table('bairros')
            ->join('quarteiroes', 'quarteiroes.bairros_id', '=', 'bairros.id')
            ->join('casas', 'casas.quarteiroes_id', '=', 'quarteiroes.id')
            ->join('users', 'users.id', '=', 'casas.users_id')
            ->join('apartamentos', 'apartamentos.casas_id', '=', 'casas.id')
            ->join('estados', 'estados.id', '=', 'apartamentos.estado_id')
            ->join('designacoes', 'designacoes.id', '=', 'apartamentos.designacoes_id')
            ->join('proprietarios', 'proprietarios.id', '=', 'casas.proprietarios_id')
            ->select('apartamentos.imagem as img', 'casas.numero_casa as casa', 'apartamentos.tipo as t',
                'proprietarios.nome as prop','users.name as usuario',
                'proprietarios.contacto as cel', 'designacoes.descricao as desc', 'bairros.nome as bairro', 'estados.estado as est',
                'apartamentos.preco as prec', 'quarteiroes.numero as numero', 'apartamentos.id')
            ->where('bairros.nome', $request->bairro)
            ->where('quarteiroes.numero', $request->quarteirao)
            ->orderby('t','asc')
            ->get();
        return view('comissao.lista_pesquisa',compact('apartamento','bairro','quarteirao'));
    }


}