@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color: lightgreen"><h4 style="color: white; text-align: center; ">Confirmar a Reserva</h4></div>

                    <div class="card-body" style="background-color: darkseagreen">
                        <form  action="/updateReserva/{{$apartamento ->id}}" method="POST">

                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="panel-body" >

                                </br>
                                <input type="hidden" name="casas_id" value="{{$apartamento ->casas_id}}" class="form-control" ></br>
                                <input type="hidden" name="designacoes_id" value="{{$apartamento ->designacoes_id}}" class="form-control" ></br>
                                <input type="hidden" name="tipo" value="{{$apartamento ->tipo}}" class="form-control" ></br>
                                <input type="hidden" name="preco" value="{{$apartamento ->preco}}" class="form-control" ></br>
                                </br>
                                <select type="text" name="estado" class="form-control" style="border-radius: 15px">
                                    @foreach($estados as $cas)
                                        <option value="{{$cas->id}}">{{$cas->estado}}</option>
                                    @endforeach
                                </select></br>
                                <input type="hidden" name="imagem" value="{{$apartamento ->imagem}}" class="form-control" ></br>
                                <input type="hidden" name="_token" value="{{csrf_token()}}" class="form-control"></br>
                                <input type="submit" value="Gravar" class="btn-btn-success pull-right" style="color: green; border-radius: 15px; float: right">
                                <button style=" border-radius: 15px;">
                                    <a href="/reservas", class="btn-success" style="border-radius: 15px;text-decoration: none">voltar</a>
                                </button>

                            </div>

                        </form>
                    </div>
                </div>
                <div style="background-color: lightgreen" class="card-footer">
                    <h6 style="color: white; text-align: center; ">desenvolvido por Costa Tangune versao 1.0</h6>
                </div>
            </div>
        </div>
    </div>
@endsection
