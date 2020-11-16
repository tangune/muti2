<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cidade;
use DB;
use Illuminate\Support\Facades\Input;

class CidadeController extends Controller
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
        $cidades = Cidade::all();
        return view('administrador.tela_cidade',compact('cidades'));
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
        ]);

        $cidade = new Cidade();
        $cidades = Cidade::all();
        //dd($cidades->where('nome','=','maputo'));
        $n = $cidades->firstWhere('nome','=',$request->nome);
       //dd($n);
        $total = count($cidades);

        for ($i = 0; $i <= $total; $i++){
            if($cidades->firstWhere('nome','=',$request->nome)){
                return redirect('/cidade')->with('sucesso','Esta cidade ja foi registada!');
            }
            else{
                $cidade->nome = $request->nome;
                $cidade->save();
                return redirect('/cidade');
            }
        }
      /**
        $cidade = new Cidade();
        $cidade->nome = $request->nome;
        //$cidade= Cidade::create($request->all());
        $cidade->save();
        //return $this->create();
        return redirect('/cidade');

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
