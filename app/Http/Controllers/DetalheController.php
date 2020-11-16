<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartamento;
use App\Detalhe;
use Illuminate\Support\Facades\Input;
use App\File;
use DB;

class DetalheController extends Controller
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
        //$apartamento = Apartamento::all();
        $apartamento = DB::table('casas')
             ->join('apartamentos','apartamentos.casas_id','=','casas.id')
             ->select('casas.id','casas.numero_casa','apartamentos.estado_id','apartamentos.id')->get();
        return view('comissao.tela_detalhe',compact('apartamento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detalhe = new Detalhe;
                      
           $detalhe->apartamentos_id = Input::get('apartamentos_id');
           $detalhe->descricao = Input::get('descricao');

                if($file = $request->file('face_casa')){
          
                        $name = $file->getClientOriginalName();
                        if ($file->move('images', $name)) {                    
                            $detalhe->face_casa = $name;
                            $detalhe->save();                                
                   };                    
                } 
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
