
@extends('layouts.backend_comissao')


@section('title','Dashboard')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       <!-- <section class="content-header">
            <form action="" method="GET">
                {{ csrf_field() }}
                <input style="border-radius: 15px; width: 25%; padding-left: 10px; border-color: blue;" type="text" name="bairro" placeholder="bairro">
                <input style="border-radius: 15px; width: 25%; padding-left: 10px; border-color: blue;" type="text" name="quarteirao" placeholder="quarteirao">
                <button style="border-radius: 15px; color: red" name="pesquisar">Pesquisar</button>
            </form>
        </section>
        -->

        <!-- Main content -->
        <section class="content">
            <form action="/pesquisa_reservas" method="GET">
                {{ csrf_field() }}
                <button style="border-radius: 15px; color: green; float: right; margin-right: 35%"  name="pesquisar">Pesquisar</button>
                <select type="text" name="bairro" class="form-control" style="border-radius: 15px; width: 25%; height: 30px; padding-left: 10px; margin-left: 20px;  border-color: blue; float: left">
                    @foreach($bairros as $apart)
                        <option value="{{$apart ->nome}}">{{$apart ->nome}}</option>
                    @endforeach
                </select>
                <select type="text" name="estado" class="form-control" style="border-radius: 15px; width: 15%; height: 30px; border-color: blue; ">
                    @foreach($estados as $estado)
                        <option value="{{$estado ->estado}}">{{$estado ->estado}}</option>
                    @endforeach
                </select>

            </form>
            <br>
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <!--h3 class="box-title" style="color: darkgreen"> Lista de reservas</h3 -->

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
                        <table id="datatable" class="table table-hover">

                            <tr>
                                <th class="text-center" style=" color: darkgreen" >Imagem</th>
                                <th class="text-center" style=" color: darkgreen" >Casa</th>
                                <th class="text-center" style=" color: darkgreen" >Descrição</th>
                                <th class="text-center" style=" color: darkgreen" >Preço</th>
                                <th class="text-center" style=" color: darkgreen" >Estado</th>
                                <th class="text-center" style=" color: darkgreen">Cliente</th>
                                <th class="text-center" style=" color: darkgreen">Contacto</th>

                                <th class="text-center" style=" color: darkgreen">Accao</th>
                            </tr>
                            <tbody>
                            @foreach($apartamento as $apart)
                                <tr>
                                <tr>
                                    <td class="text-center"><img src="images/{{$apart->img }}" alt="..." width="150" height="50">
                                        <div class="caption"></td>
                                    <td class="text-center">{{$apart->num}}</td>
                                    <td class="text-center">{{$apart->d}}</td>
                                    <td class="text-center">{{$apart->p}}</td>
                                    <td class="text-center">{{$apart->e}}</td>
                                    <td class="text-center">{{$apart->n}}</td>
                                    <td class="text-center">{{$apart->cel}}</td>
                                    <td class="text-center">
                                        <button style="size: b5; background-color: lightgreen;font-weight: 100;" type="button" class="btn btn-primary btn-small"
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

                    <!--inicio da tela modal reservas -->

                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                        <div class="modal-dialog" role="document">
                            <div class="modal-content" >
                                <div class="modal-header" style="background-color: lightgreen">

                                    <h4 class="modal-title" id="myModalLabel" style="color: blue; color: white; text-align: center ">Validar uma reserva ou arrendamento</h4>
                                </div>

                                    <form id="form" action="/updateReserva" method="POST">

                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}

                                        <div class="modal-body" style="background-color: darkseagreen">

                                            </br>
                                            <input type="hidden" id="apartamento_id" name="apartamento_id" style="border-radius: 15px" class="form-control" value="">
                                            <input type="hidden" id="casas_id" name="casas_id" class="form-control" >
                                            <input type="hidden" id="designacoes_id" name="designacoes_id"  class="form-control" >
                                            <input type="hidden" id="users_id" name="users_id" style="border-radius: 15px" class="form-control" value="">
                                            <input type="hidden" id="tipo" name="tipo" class="form-control" >
                                            <input type="hidden" id="preco" name="preco"  class="form-control" >
                                            <!--input type="" id="estado_id" name="estado_id" style="border-radius: 15px"  class="form-control" --></br>
                                            <select type="" id="estado_id" name="estado_id" style="border-radius: 15px"   class="form-control">
                                                <option value="1" >Livre</option>
                                                <option value="2">Reservado</option>
                                                <option value="3">Arrendado</option>
                                            </select>
                                            <input type="hidden"id="imagem" name="imagem"  class="form-control" >
                                            <input type="hidden" id="token" name="_token" value="{{csrf_token()}}" class="form-control"></br>
                                            <input type="submit" value="Gravar" class="btn-btn-success pull-right" style="color: green; border-radius: 15px; float: right">
                                            <button style="color: red; border-radius: 15px" class="btn-btn-success pull-left"><a href="/reservas" >Sair</a></button>
                                        </div>

                                    </form>

                                <div class="modal-footer" style="background-color: lightgreen">
                                    <h4 style="color: white; text-align: center; ">Nhumba, Sistema de Auxílio na  Gestão de arrendamento de Casa  !</h4>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!--fim da tela modal reservas -->

                    <script src="{{ asset('libs/jquery-3.3.1.min.js') }}"></script>
                    <!-- Latest compiled and minified JavaScript -->
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

                    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
                    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


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

                </div>
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