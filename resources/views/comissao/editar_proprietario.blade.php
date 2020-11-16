@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color: lightgreen"><h4 style="color: white; text-align: center; ">Editar dados da Casa</h4></div>

                    <div class="card-body" style="background-color: darkseagreen">
                        <form  action="/updateProprietario/{{$proprietarios ->id}}" method="POST">

                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="panel-body" >

                                </br>
                                </br></br>
                                <input type="text" name="nome" value="{{$proprietarios ->nome}}" class="form-control" style="border-radius: 15px"></br></br>
                                <input type="text" name="contacto" value="{{$proprietarios ->contacto}}" class="form-control" style="border-radius: 15px"></br></br>
                                <input type="submit" class="btn-btn-success pull-right" style="color: green; border-radius: 15px">

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
