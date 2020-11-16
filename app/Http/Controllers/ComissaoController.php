<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bairro;
use App\Comissoe;
use Illuminate\Support\Facades\DB;

class comissaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrador.lista_comissao');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bairro = Bairro::all();
        $comissoes = DB::table('comissoes')
            ->join('bairros','bairros.id', '=', 'comissoes.bairros_id')
            ->select('comissoes.nome as comissao', 'bairros.nome as bairro',
                'comissoes.created_at as data')
            ->get();

        return view('administrador.tela_comissao',compact('bairro','comissoes'));
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
            'nome'           =>  'required',
        ]);

        $comissoes = Comissoe::all();
        $comissao = new Comissoe();
        $comissao->bairros_id = $request->bairros_id;
        $comissao->nome = $request->nome;

        $total = count($comissoes);

        for ($i = 0; $i <= $total; $i++){
            if($comissoes->firstWhere('nome','=',$request->nome)){
                return redirect('/comissao')->with('sucesso','Esta comissao ja foi registada!');
            }
            else{
                $comissao->nome = $request->nome;
                $comissao->save();
                return redirect('/comissao');
            }
        }
        /**
        $comissao->save();
        return redirect('/comissao');
         */
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
