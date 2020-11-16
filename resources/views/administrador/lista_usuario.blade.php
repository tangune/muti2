
@extends('layouts.backend_admin')

@section('title','Dashboard')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" style="color: lightblue">  Agentes de comissões colaboradoras</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th class="text-center" style=" color: lightblue">Nome</th>
                                <th class="text-center" style=" color: lightblue">Email</th>
                                <th class="text-center" style=" color: lightblue">Perfil</th>
                                <th class="text-center" style=" color: lightblue">Bairro</th>
                                <th class="text-center" style=" color: lightblue">Comissão</th>
                                <th class="text-center" style=" color: lightblue">Acção</th>
                            </tr>
                            <tbody>
                            @foreach($usuario as $usu)
                                <tr>
                                    <td class="text-center">{{$usu->name}}</td>
                                    <td class="text-center">{{$usu->email}}</td>
                                    <td class="text-center">{{$usu->admin}}</td>
                                    <td class="text-center">{{$usu->bairro}}</td>
                                    <td class="text-center">{{$usu->comissao}}</td>
                                    <td class="text-center">
                                        <!--a  href="/editarUsuario/{{$usu->id}}" class="btn btn-success">Editar </a -->
                                            <button style="size: b5;font-weight: 100;" type="button" class="btn btn-primary btn-small"
                                                    data-toggle="modal" data-target="#myModal"
                                                    onclick="abrirModal({{$usu->id}})" style="margin-right: 105px">
                                                Actualizar
                                            </button>
                                    </td >

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                    <div class="modal-dialog" role="document">
                        <div class="modal-content" style="background-color: #b0d4f1">
                            <div class="modal-header">
                                <!--
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                               -->
                                <h4 class="modal-title" id="myModalLabel" style="color: blue; "><h4 style="color: white; text-align: center">Gestão de usuários </h4>
                            </div>

                                <form  action="/updateUser" method="POST">
                                    <div class="modal-body" style="background-color: #009fe8">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}

                                            <div class="panel-body">
                                                <input type="hidden" id="id" name="id" style="border-radius: 15px" class="form-control" >
                                                <input type="hidden" id="name" name="name" style="border-radius: 15px" class="form-control" >
                                                <input type="hidden" id="email" style="border-radius: 15px" name="email"  class="form-control">
                                                <input type="hidden" id="email_verified_at" name="email_verified_at" style="border-radius: 15px" class="form-control" >
                                                <input type="hidden" id="password" name="password" style="border-radius: 15px" class="form-control" >
                                                <input type="hidden" id="remember_token" style="border-radius: 15px" name="remember_token"  class="form-control">
                                                <input type="hidden" id="created_at" name="created_at" style="border-radius: 15px" class="form-control" >
                                                <input type="hidden" id="updated_at" name="updated_at" style="border-radius: 15px" class="form-control" >
                                                <select type="" id="admin" style="border-radius: 15px" name="admin"  class="form-control">
                                                    <option value="1" >Administrador</option>
                                                    <option value="2">Comissão</option>
                                                    <option value="3">Agente</option>
                                                    <option value="0">Cliente</option>
                                                </select>
                                                <!--input type="" id="admin" style="border-radius: 15px" name="admin"  class="form-control"--></br>
                                                <input type="submit" value="Gravar" class="btn-btn-success pull-right" style="color: red; border-radius: 15px">
                                                <button type="button" class="btn btn-default" data-dismiss="modal" style="float: left; border-radius: 15px">Sair</button>

                                            </div>
                                    </div>
                                </form>

                                            <div class="modal-footer">
                                                <h4 style="color: blue; text-align: center; ">Nhumba</h4>
                                            </div>
                        </div>
                    </div>
                </div>
                <script src="{{ asset('libs/jquery-3.3.1.min.js') }}"></script>
                <!-- Latest compiled and minified JavaScript -->
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
                        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
                        crossorigin="anonymous"></script>

                <script type="text/javascript">

                    function abrirModal(id){

                        $.get('/editarUsuario/'+id, function(dados) {

                            //$('#myModal .modal-body').html( '' )
                            $('#myModal .modal-body').modal('show')

                            if (dados.resustado)
                            {

                                /*
                                 let detalheO = dados.resustado
                                 let detalhe = '<h4>Id casa: ' + detalheO.id +   '</h4>'
                                 detalhe += '<h4>Preco casa: ' + detalheO.preco + '</h4>'
                                 detalhe += '<h4>Imagem casa: ' + detalheO.imagem + '</h4>'
                                 */


                                let detalheO = dados.resustado
                                let detalhe1 =  detalheO.id
                                let detalhe2 =  detalheO.name
                                let detalhe3 =  detalheO.email
                                let detalhe4 =  detalheO.email_verified_at
                                let detalhe5 =  detalheO.password
                                let detalhe6 =  detalheO.remember_token
                                let detalhe7 =  detalheO.created_at
                                let detalhe8 =  detalheO.updated_at
                                let detalhe9 =  detalheO.admin

                                $('#id').val(detalhe1);
                                $('#name').val(detalhe2);
                                $('#email').val(detalhe3);
                                $('#email_verified_at').val(detalhe4);
                                $('#password').val(detalhe5);
                                $('#remember_token').val(detalhe6);
                                $('#created_at').val(detalhe7);
                                $('#updated_at').val(detalhe8);
                                $('#admin').val(detalhe9);




                                // $('#myModal .modal-body').html( detalhe )
                                $('#myModal .modal-body').modal('show')
                            }
                            else
                            {
                                //$('#myModal .modal-body').html('<p>Esse produto nao tem nenhum detalhe</p>')
                                $('#myModal .modal-body').modal('show')

                            }

                        });

                    }



                </script>
                <!-- /.box-body -->
                <div class="box-footer">

                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection