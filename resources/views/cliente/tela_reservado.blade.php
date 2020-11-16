
@extends('layouts.backend_cliente')

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
                                <th class="text-center" style=" color: #009fe8" >Apartamento</th>
                                <th class="text-center" style=" color: #009fe8" >Bairro</th>
                                <th class="text-center" style=" color: #009fe8">Quarteirão</th>
                                <th class="text-center" style=" color: #009fe8" >Descrição</th>
                                <th class="text-center" style=" color: #009fe8">Tipo</th>
                                <th class="text-center" style=" color: #009fe8" >Preço</th>
                                <th class="text-center" style=" color: #009fe8" >Casa</th>
                                <th class="text-center" style=" color: #009fe8">Estado</th>
                                <th class="text-center" style=" color: #009fe8">Data</th>
                                <th class="text-center" style=" color:red">Contacto</th>
                            </tr>
                            <tbody>
                            @foreach($apartamento as $casa)
                                <tr>
                                <tr>
                                    <td class="text-center"><img src="images/{{$casa->imagem }}" alt="..." width="150" height="50">
                                        <div class="caption"></td>
                                    <td class="text-center">{{$casa->b}}</td>
                                    <td class="text-center">{{$casa->quart}}</td>
                                    <td class="text-center">{{$casa->d}}</td>
                                    <td class="text-center">{{$casa->t}}</td>
                                    <td class="text-center">{{$casa->p}}</td>
                                    <td class="text-center">{{$casa->num}}</td>
                                    <td class="text-center">{{$casa->e}}</td>
                                    <td class="text-center">{{$casa->data}}</td>
                                    <td class="text-center">
                                    <button style="size: b5;font-weight: 100;" type="button" class="btn btn-primary btn-small"
                                            data-toggle="modal" data-target="#myModal"
                                            onclick="abrirModal({{$casa->id}})" style="margin-right: 105px">
                                        Agente
                                    </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>


                        </table>
                    </div>
                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="/cliente_lista_apartamento" style="margin-left: 4px;
                    text-decoration: none; border-radius: 15px" class="btn-success">voltar</a>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

            <!--inicio da tela modal contacto -->

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #0b97c4">
                            <h4 class="modal-title" id="myModalLabel" style="color: white; text-align: center">Informaçoes de Agente</h4>

                        </div>
                        <div class="modal-body">

                        </div>
                        <hr style="border: thick; width: 100%">
                        <div >
                            <button type="button" class="btn btn-default" data-dismiss="modal"
                                    style="margin-right: 20px; float: right; border-radius: 15px">Fechar</button>
                        </div><br>
                        <div class="modal-footer" style="background-color: #0b97c4">
                            <h4 style="color: white; text-align: center; ">Contacte o seu agente, e garanta o seu lar !</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- fim da tela modal contacto -->

            <script src="{{ asset('libs/jquery-3.3.1.min.js') }}"></script>
            <!-- Latest compiled and minified JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
                    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
                    crossorigin="anonymous"></script>

            <script type="text/javascript">

                function abrirModal(id){

                    $.get('/detalhesAgente/'+id, function(dados) {

                        $('#myModal .modal-body').html( '' )

                        if (dados.resustado)
                        {

                            let detalheO = dados.resustado
                            let detalhe = '<h4 style="color: red">Comissão: ' + detalheO.c +   '</h4>'
                            detalhe += '<h4 style="color: red">Agente: ' + detalheO.n + '</h4>'
                            detalhe += '<h4 style="color: red">Contacto: ' + detalheO.tel + '</h4>'
                            $('#myModal .modal-body').html( detalhe )
                        }
                        else
                        {
                            $('#myModal .modal-body').html('<p>Esse produto nao tem nenhum detalhe</p>')

                        }

                    });

                }
            </script>


                </section>
        <!-- /.content -->
    </div>
@endsection