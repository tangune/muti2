
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
                    <h3 class="box-title" style="color: blue">  Histórico do processo de arrendamento do cliente</h3>

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
                                <th class="text-center" style=" color: red" >Bairro</th>
                                <th class="text-center" style=" color: red">Quarteirão</th>
                                <th class="text-center" style=" color: red" >Descrição</th>
                                <th class="text-center" style=" color: red">Tipo</th>
                                <th class="text-center" style=" color: red" >Preço</th>
                                <th class="text-center" style=" color: red" >Casa</th>
                                <th class="text-center" style=" color: red">Estado</th>
                                <th class="text-center" style=" color: red">Data expediente</th>
                            </tr>
                            <tbody>
                            @foreach($apartamento as $casa)
                                <tr>
                                <tr>
                                    <td class="text-center">{{$casa->b}}</td>
                                    <td class="text-center">{{$casa->quart}}</td>
                                    <td class="text-center">{{$casa->d}}</td>
                                    <td class="text-center">{{$casa->t}}</td>
                                    <td class="text-center">{{$casa->p}}</td>
                                    <td class="text-center">{{$casa->num}}</td>
                                    <td class="text-center">{{$casa->e}}</td>
                                    <td class="text-center">{{$casa->data}}</td>
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

        </section>
        <!-- /.content -->
    </div>
@endsection