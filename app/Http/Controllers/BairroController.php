<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bairro;
use App\Cidade;
use DB;

class bairroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $bairros = Bairro::all();
      /**  $bairros = DB::table('cidades')
             ->join('bairros','bairros.cidades_idcidades','=','cidades.idcidades')
             ->join('comissoes','comissoes.bairro_idbairro','=','bairros.idbairro')
             ->select('bairros.nome as n','bairros.idbairro as id','comissoes.nome as com','cidades.nome as cid')->get();                 
                return view('administrador.lista_bairro', compact('bairros'));
           */
        return view('administrador.lista_bairro', compact('bairros'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $bairros = DB::table('cidades')
            ->join('bairros','bairros.cidades_id','=','cidades.id')
            ->select('bairros.nome as nome','bairros.id as id','bairros.created_at as data',
                'cidades.nome as cidade')->get();
        $cidade = Cidade::all();
        return view('administrador.tela_bairro',compact('cidade','bairros'));
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
            'cidades_id'     =>  'required'


        ]);

        $bairros = Bairro::all();
        $bairro = new Bairro();
        $bairro->nome = $request->nome;
        $bairro->cidades_id = $request->cidades_id;

        $total = count($bairros);

        for ($i = 0; $i <= $total; $i++){
            if($bairros->firstWhere('nome','=',$request->nome)){
                return redirect('/bairro')->with('sucesso','Este bairro ja foi registado!');
            }
            else{
                $bairro->nome = $request->nome;
                $bairro->save();
                return redirect('/bairro');
            }
        }
        /**$bairro->save();
        return redirect('/bairro');
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
        $bairro = Bairro::where('id','=',$id)->first();
        //$bairro = Bairro::FindOrFail($id);
        return view('administrador.editar_bairro',compact('bairro'));
    }
    public function modal_edit($id)
    {
        //$bairro = Bairro::where('id','=',$id)->first();
        $bairro = Bairro::Find($id);
        return response()->json(['resustado'=>$bairro]);
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
        $bairro = Bairro::Find($id);
        //$bairro = Bairro::where('idbairro','=',$idbairro)->first();

        $bairro->nome = $request->input('nome');
        $bairro->save();
        return redirect('/lista_bairro');
    }

    public function modal_update(Request $request)
    {
        $id = $request->input('idbairro');
        $bairro = Bairro::Find($id);
        //$bairro = Bairro::where('idbairro','=',$idbairro)->first();
       // $bairro->idbairro = $request->input('idbairro');
        $bairro->nome = $request->input('nome');
        $bairro->cidades_id = $request->input('cidades_id');
        $bairro->created_at = $request->input('created_at');
        $bairro->updated_at = $request->input('updated_at');
        $bairro->save();
        return redirect('/bairro');
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
