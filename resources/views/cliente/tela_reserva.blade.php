@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color: #0b97c4"><h4 style="color: white; text-align: center; ">
                            Reserva o seu apartamento e garanta o seu lar !</h4></div>
                    @if(count($errors ) > 0)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" >
                                x
                            </button>
                            <ul>
                                @foreach( $errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if($message = Session::get('sucesso'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" >
                                x
                            </button>
                            <strong>{{$message}}</strong>

                        </div>
                    @endif

                    <div class="card-body" style="background-color: #b0d4f1">

                        <form  action="/gravarReserva" method="POST">

                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="panel-body" >
                                </br></br>

                                <input type="hidden" name="users_id" style="border-radius: 15px" value="{{ auth()->user()->id}}" class="form-control" >
                                <input type="hidden"name="apartamento_id" style="border-radius: 15px" value="{{ $apartamento ->id}}" class="form-control" >
                                <input type="" style="border-radius: 15px" name="celular"   class="form-control" placeholder="Contacto"></br>
                                <input type="submit" value="Enviar"  class="btn-btn-success pull-right" style="color: red; border-radius: 15px; float: right">
                                <a  href="/cliente_lista_apartamento" class="btn btn-success" style="border-radius: 15px;">Sair </a>
                            </div>

                        </form>
                    </div>
                </div>
                <div style="background-color: #0b97c4" class="card-footer">
                    <h6 style="color: white; text-align: center; "></h6>
                </div>
            </div>
        </div>
    </div>
@endsection
