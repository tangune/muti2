@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color: #0b97c4"><h4 style="color: white; text-align: center; ">Actualizacao de dados de usuarios</h4></div>

                    <div class="card-body" style="background-color: #b0d4f1">
                        <form  action="/updateUser/{{$usuario ->id}}" method="POST">

                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="panel-body" >
                                </br></br>

                                <input type="hidden" name="id" style="border-radius: 15px" value="{{$usuario ->id}}" class="form-control" ></br>
                                <label>Nome :</label>
                                <input type="text"name="name" style="border-radius: 15px" value="{{$usuario ->name}}" class="form-control" ></br>
                                <label>Email :</label>
                                <input type="text" style="border-radius: 15px" name="email" value="{{$usuario ->email}}"  class="form-control"></br>
                                <input type="hidden" name="email_verified_at" style="border-radius: 15px" value="{{$usuario ->email_verified_at}}" class="form-control" >
                                <input type="hidden"name="password" style="border-radius: 15px" value="{{$usuario ->password}}" class="form-control" >
                                <input type="hidden" style="border-radius: 15px" value="{{$usuario ->remember_token}}" name="remember_token"  class="form-control">
                                <input type="hidden" name="created_at" style="border-radius: 15px" value="{{$usuario ->creat_at}}" class="form-control" >
                                <input type="hidden"name="updated_at" style="border-radius: 15px" value="{{$usuario ->updated_at}}" class="form-control" >
                                <label>Perfil :</label></br>
                                <select type="text" style="border-radius: 15px" name="admin"  class="form-control">
                                    <option value="{{$usuario ->admin}}" >Administrador</option>
                                    <option value="2">Comissao</option>
                                    <option value="3">Agente</option>
                                </select><br>
                                <input type="submit" value="Gravar"  class="btn-btn-success pull-right" style="color: red; border-radius: 15px; float: right">
                                <a  href="/lista_usuario" class="btn btn-success" style="border-radius: 15px;">Sair </a>
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
