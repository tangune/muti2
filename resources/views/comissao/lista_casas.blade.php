
@extends('layouts.backend_comissao')

@section('title','Dashboard')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header)
        <section class="content-header">
            <form action="/pesquisaCasa" method="GET">
                {{ csrf_field() }}
                <input style="border-radius: 15px; width: 25%; padding-left: 10px; border-color: blue;" type="text" name="bairro" placeholder="bairro">
                <input style="border-radius: 15px; width: 25%; padding-left: 10px; border-color: blue;" type="text" name="quarteirao" placeholder="quarteirao">
                <button style="border-radius: 15px; color: red" name="pesquisar">Pesquisar</button>
            </form>
        </section>
        -->

        <!-- Main content -->
            <section class="content-header">
                <form action="/comissao1_casa_pesquisa" method="GET">
                    {{ csrf_field() }}
                    <button style="border-radius: 15px; color: green; float: right; margin-right: 40%"  name="pesquisar">Pesquisar</button>
                    <select type="text" name="bairro" class="form-control" style="border-radius: 15px; width: 25%; height: 30px; padding-left: 10px; margin-left: 20px;  border-color: blue; float: left">
                        @foreach($bairro as $apart)
                            <option value="{{$apart ->nome}}">{{$apart ->nome}}</option>
                        @endforeach
                    </select>
                    <!--select type="text" name="quarteirao" class="form-control" style="border-radius: 15px; width: 15%; height: 30px; border-color: blue; ">
                        @foreach($quarteirao as $apart)
                            <option value="{{$apart ->numero}}">{{$apart ->numero}}</option>
                        @endforeach
                    </select -->

                </form>
            </section>
            <br><br>
            <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <!--h3 class="box-title" style="color: green"> Lista de Casas</h3 --><br>
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
                                <th class="text-center" style=" color: green" >Casa</th>
                                <th class="text-center" style=" color: green" >Número casa</th>
                                <th class="text-center" style=" color: green" >Bairro</th>
                                <th class="text-center" style=" color: green" >Proprietário </th>
                                <th class="text-center" style=" color: green">Contacto</th>
                                <th class="text-center" style=" color: green">Quarteirão</th>
                                <th class="text-center" style=" color: green">Acção</th>
                            </tr>
                            <tbody>
                            @foreach($casas as $casa)
                                <tr>
                                <tr>
                                    <td class="text-center"><img src="images/{{$casa->img }}" alt="..." width="150" height="50">
                                        <div class="caption"></td>
                                    <td class="text-center">{{$casa->casa}}</td>
                                    <td class="text-center">{{$casa->b}}</td>
                                    <td class="text-center">{{$casa->prop}}</td>
                                    <td class="text-center">{{$casa->cel}}</td>
                                    <td class="text-center">{{$casa->numero}}</td>
                                    <td class="text-center">
                                      <!--  <button style="border-radius: 15px" ><a  href="/editarProprietario/{{$casa->id}}">Actualizar</a></button> -->
                                        <button style="size: b5;font-weight: 100; background-color: lightgreen" type="button" class="btn btn-primary btn-small"
                                                data-toggle="modal" data-target="#myModal"
                                                onclick="abrirModal({{$casa->id}})" style="margin-right: 105px">
                                            Actualizar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>


                        </table>
                    </div>
                </div>

                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: lightgreen">
                                <h4 class="modal-title" id="myModalLabel" style="color: white; text-align: center">Actualizar proprietario da casa</h4>

                            </div>
                            <form  action="/updateProprietario" method="POST">
                                <div class="modal-body" style="background-color: darkseagreen">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    </br>
                                    <input type="hidden" id="proprietarios_id" name="id" style="border-radius: 15px" class="form-control" value=""><br>
                                    <input type="" id="nome" name="nome" style="border-radius: 15px" class="form-control" value=""><br>
                                    <input type="" id="contacto" name="contacto" style="border-radius: 15px" class="form-control" value=""><br><br>
                                    <button style="color: green; border-radius: 15px" class="btn-btn-success pull-left"><a href="/lista_casa" >Sair</a></button>
                                    <input type="submit" value="Actualizar"  class="btn-btn-success pull-right" style="color: green; border-radius: 15px">
                                </div>

                            </form>

                        <!--    <div >
                                <button type="button" class="btn btn-default" data-dismiss="modal"
                                        style="margin-right: 20px; float: right; border-radius: 15px">Fechar</button>
                            </div><br> -->
                            <div class="modal-footer" style="background-color: lightgreen">
                                <h4 style="color: white; text-align: center; ">Sistema de Gestão de Arrendamento de Casas</h4>
                            </div>
                        </div>
                    </div>

                </div>

                <!--inicio da tela modal encomendar -->

                <div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                    <div class="modal-dialog" role="document">
                        <div class="modal-content" style="background-color: #b0d4f1">
                            <div class="modal-header">
                                <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->

                                <h4 class="modal-title" id="myModalLabel" style="color: blue; color: white; text-align: center ">Editar dados da Casa</h4>
                            </div>
                            <form  action="" method="POST">
                                <div class="modal-body" style="background-color: #009fe8">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}

                                    </br>
                                    </br></br>
                                    <input type="" id="apartamento_id" name="apartamento_id" style="border-radius: 15px" class="form-control" value=""><br>
                                    <input type="" id="nome" name="nome" style="border-radius: 15px" class="form-control" value=""><br>
                                    <input type="" id="contacto" name="contacto" style="border-radius: 15px" class="form-control" value=""><br>
                                    <button style="color: red; border-radius: 15px" class="btn-btn-success pull-left"><a href="/lista_casa" >Sair</a></button>
                                    <input type="submit" value="Enviar"  class="btn-btn-success pull-right" style="color: red; border-radius: 15px">

                                </div>

                            </form>

                            <div class="modal-footer">
                                <h4 style="color: blue; text-align: center; ">Nhumba, a sua plataforma de gestão de arrendamentos!</h4>
                            </div>
                        </div>
                    </div>

                </div>



    <!--fim da tela modal encomendar -->

                <script src="{{ asset('libs/jquery-3.3.1.min.js') }}"></script>
                <!-- Latest compiled and minified JavaScript -->
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
                        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
                        crossorigin="anonymous"></script>


                <script type="text/javascript">

                    function actualizar(id) {

                      //  $('#apartamento_id').val(id);
                       // $('#modalActualizar .modal-body').modal('show')

                        $.get('/actualizar/'+id, function(dados) {

                            $('#myModal .modal-body').modal('show')

                            if (dados.resustado)
                            {

                                let detalheO = dados.resustado
                                let detalhe = '<h4>Bairro: ' + detalheO.n +   '</h4>'
                                detalhe += '<h4>Tipo da casa: ' + detalheO.c + '</h4>'
                                detalhe += '<h4>Numero da casa: ' + detalheO.casa + '</h4>'

                               $('#apartamento_id').val(id);
                               $('#nome').val(detalheO.n);
                               $('#contacto').val( );


                                $('#modalActualizar .modal-body').modal('show')
                            }
                            else
                            {
                                $('#modalActualizar .modal-body').html('<p>Esse produto nao tem nenhum detalhe</p>')

                            }


                        });


                    }


                    function abrirModal(id){

                        $.get('/actualizar/'+id, function(dados) {

                           // $('#myModal .modal-body').html( '' )
                            $('#myModal .modal-body').modal('show')

                            if (dados.resustado)
                            {

                                let detalheO = dados.resustado
                                let detalhe1 =  detalheO.n
                                let detalhe2 =  detalheO.c
                               let detalhe3 =  detalheO.id

                                $('#nome').val(detalhe1);
                                $('#contacto').val(detalhe2);
                                $('#proprietarios_id').val(detalhe3);



                               // $('#myModal .modal-body').html( detalhe )
                                $('#myModal .modal-body').modal('show')
                            }
                            else
                            {
                               // $('#myModal .modal-body').html('<p>Esse produto nao tem nenhum detalhe</p>')
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