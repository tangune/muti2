
@extends('layouts.backend_comissao')

@section('title','Dashboard')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <form action="/comissao1_pesquisaCasa" method="GET">
                {{ csrf_field() }}
                <button style="border-radius: 15px; color: green; float: right; margin-right: 40%"  name="pesquisar">Pesquisar</button>
                <select type="text" name="bairro" class="form-control" style="border-radius: 15px; width: 25%; height: 30px; padding-left: 10px; margin-left: 20px;  border-color: blue; float: left">
                    @foreach($bairro as $apart)
                        <option value="{{$apart ->nome}}">{{$apart ->nome}}</option>
                    @endforeach
                </select>
                <select type="text" name="quarteirao" class="form-control" style="border-radius: 15px; width: 15%; height: 30px; border-color: blue; ">
                    @foreach($quarteirao as $apart)
                        <option value="{{$apart ->numero}}">{{$apart ->numero}}</option>
                    @endforeach
                </select>

            </form>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <!--h3 class="box-title" style="color: green"> Lista de Apartamentos</h3 -->

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
                                <th class="text-center" style=" color: green" >Apartamento</th>
                                <th class="text-center" style=" color: green" >Bairro</th>
                                <th class="text-center" style=" color: green" >Quarteirao</th>
                                <th class="text-center" style=" color: green" >Descricao</th>
                                <th class="text-center" style=" color: green">Casa</th>
                                <th class="text-center" style=" color: green">Tipo</th>
                                <th class="text-center" style=" color: green">Proprietario</th>
                                <th class="text-center" style=" color: green">Contacto</th>
                                <th class="text-center" style=" color: green">Estado</th>
                                <th class="text-center" style=" color: green">Preco</th>
                                <th class="text-center" style=" color: green">Acção</th>
                            </tr>
                            <tbody>
                            @foreach($apartamento as $apart)
                                <tr>
                                <tr>
                                    <td class="text-center"><img src="images/{{$apart->img }}" alt="..." width="150" height="50">
                                        <div class="caption"></td>
                                    <td class="text-center">{{$apart->bairro}}</td>
                                    <td class="text-center">{{$apart->numero}}</td>
                                    <td class="text-center" style="color: red">{{$apart->desc}}</td>
                                    <td class="text-center">{{$apart->casa}}</td>
                                    <td class="text-center">{{$apart->t}}</td>
                                    <td class="text-center">{{$apart->prop}}</td>
                                    <td class="text-center">{{$apart->cel}}</td>
                                    <td class="text-center">{{$apart->est}}</td>
                                    <td class="text-center" style="color: red">{{$apart->prec}}</td>
                                    <td class="text-center">
                                        <button style="size: b5;font-weight: 100; background-color: lightgreen" type="button" class="btn btn-primary btn-small"
                                                data-toggle="modal" data-target="#myModal"
                                                onclick="abrirModal({{$apart->id}})" style="margin-right: 105px">
                                            Actualizar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>


                        </table>
                    </div>
                </div>

                <!-- inicio tela modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: lightgreen">
                                <h4 class="modal-title" id="myModalLabel" style="color: white; text-align: center">Actualizar o preço do apartamento</h4>

                            </div>
                            <form  action="/updateApartamentoPreco" method="POST">
                                <div class="modal-body" style="background-color: darkseagreen">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}

                                    </br>
                                    </br></br>
                                    <input type="" id="preco" name="preco" style="border-radius: 15px" class="form-control" value=""><br>
                                    <input type="hidden" id="apartamento_id" name="apartamento_id" style="border-radius: 15px" class="form-control" value="">
                                    <input type="hidden" id="casas_id" name="casas_id" style="border-radius: 15px" class="form-control" value="">
                                    <input type="hidden" id="designacoes_id" name="designacoes_id" style="border-radius: 15px" class="form-control" value="">
                                    <input type="hidden" id="users_id" name="users_id" style="border-radius: 15px" class="form-control" value="">
                                    <input type="hidden" id="tipo" name="tipo" style="border-radius: 15px" class="form-control" value="">
                                    <input type="hidden" id="estado_id" name="estado_id" style="border-radius: 15px" class="form-control" value="">
                                    <input type="hidden" id="imagem" name="imagem" style="border-radius: 15px" class="form-control" value=""><br>
                                    <button style="color: red; border-radius: 15px" class="btn-btn-success pull-left"><a href="/comissaoListar" style="color: green" >Sair</a></button>
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


                <!--fim tela modal -->

                <!--inicio da tela modal detalhes -->

                <div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #0b97c4">
                                <h4 class="modal-title" id="myModalLabel" style="color: white;">Detalhes da casa</h4>
                            </div>
                            <div class="modal-body">
                            </div>
                            <hr style="border: thick; width: 100%">
                            <div >
                                <button type="button" class="btn btn-default" data-dismiss="modal"
                                        style="margin-right: 20px; float: right; border-radius: 15px">Fechar</button>
                            </div><br>
                            <div class="modal-footer" style="background-color: #0b97c4">
                                <h4 style="color: white; text-align: center; ">Faça a sua reserva e garanta o seu lar !</h4>
                            </div>
                        </div>
                    </div>

                </div>

                <!--fim da tela modal detalhes -->

                <script src="{{ asset('libs/jquery-3.3.1.min.js') }}"></script>
                <!-- Latest compiled and minified JavaScript -->
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
                        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
                        crossorigin="anonymous"></script>

                <script type="text/javascript">

                    function abrirModal(id){

                        $.get('/actualizarApartamento/'+id, function(dados) {

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
                                let detalhe2 =  detalheO.casas_id
                                let detalhe3 =  detalheO.designacoes_id
                                let detalhe4 =  detalheO.users_id
                                let detalhe5 =  detalheO.tipo
                                let detalhe6 =  detalheO.preco
                                let detalhe7 =  detalheO.estado_id
                                let detalhe8 =  detalheO.imagem

                              $('#apartamento_id').val(detalhe1);
                                $('#casas_id').val(detalhe2);
                                $('#designacoes_id').val(detalhe3);
                                $('#users_id').val(detalhe4);
                                $('#tipo').val(detalhe5);
                                $('#preco').val(detalhe6);
                                $('#estado_id').val(detalhe7);
                                $('#imagem').val(detalhe8);




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