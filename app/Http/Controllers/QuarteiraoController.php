<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bairro;
use App\Quarteiroe;
use App\Proprietario;
use App\Casa;
use App\Apartamento;
use DB;

class quarteiraoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quarteiroes = DB::table('quarteiroes')
             ->join('casas','casas.quarteirao_id','=','quarteiroes.id')
             ->join('proprietarios','proprietarios.id','=','casas.id')
             ->join('apartamentos','apartamentos.id','=','casas.id')
             ->select('quarteiroes.numero as quart','casas.numero_casa as casa','proprietarios.nome as n',
                 'proprietarios.id as id','apartamentos.imagem as img','proprietarios.contacto as cel')
            ->get();
                        return view('administrador.lista_quarteirao', compact('quarteiroes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bairro = Bairro::all();
        $quarteiroes = DB::table('cidades')
            ->join('bairros','bairros.cidades_id','=','cidades.id')
            ->join('quarteiroes','quarteiroes.bairros_id','=','bairros.id')
            ->select('bairros.nome as nome','bairros.id as id','bairros.created_at as data',
                'cidades.nome as cidade','quarteiroes.numero as numero')->get();
        return view('administrador.tela_quarteirao',compact('bairro','quarteiroes'));
    
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
            'bairros_id'           =>  'required',
            'numero'     =>  'required'


        ]);

        $quarteirao = new Quarteiroe();
        $quarteirao->bairros_id = $request->bairros_id;
        $quarteirao->numero = $request->numero;

        //$quarteirao= Quarteiroe::create($request->all());
        $quarteirao->save();
        //return $this->create();
        return redirect('/quarteirao');
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
}
