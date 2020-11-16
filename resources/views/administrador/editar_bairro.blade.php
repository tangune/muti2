@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color: #0b97c4"><h4 style="color: white; text-align: center; ">Actualizacao de dados de bairros</h4></div>

                    <div class="card-body" style="background-color: #b0d4f1">
                        <form  action="/updateBairro/{{$bairro ->id}}" method="POST">

                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="panel-body" >
                                </br></br>

                                <input type="hidden" name="idbairro" style="border-radius: 15px" value="{{ $bairro ->idbairro}}" class="form-control" ></br>
                                <label>Nome :</label>
                                <input type="text"name="nome" style="border-radius: 15px" value="{{ $bairro ->nome}}" class="form-control" ></br>
                                <input type="hidden" style="border-radius: 15px" name="cidades_idcidades" value="{{ $bairro ->cidades_idcidades}}"  class="form-control"></br>
                                <input type="hidden" name="created_at" style="border-radius: 15px" value="{{$bairro ->creat_at}}" class="form-control" >
                                <input type="hidden"name="updated_at" style="border-radius: 15px" value="{{$bairro ->updated_at}}" class="form-control" >
                                <input type="submit"  class="btn-btn-success pull-right" style="color: red; border-radius: 15px; float: right">
                                <a  href="/lista_bairro" class="btn btn-success" style="border-radius: 15px;">Sair </a>
                            </div>

                        </form>
                    </div>
                </div>
                <div style="background-color: #0b97c4" class="card-footer">
                    <h6 style="color: white; text-align: center; ">desenvolvido por Costa Tangune versao 1.0</h6>
                </div>
            </div>
        </div>
    </div>
@endsection
