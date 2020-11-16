
@extends('layouts.backend_comissoes')

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

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" style="color: darkgreen"> Lista de reservas</h3>

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
                                <th class="text-center" style=" color: darkgreen" >Imagem</th>
                                <th class="text-center" style=" color: darkgreen" >Bairro</th>
                                <th class="text-center" style=" color: darkgreen" >Quarteirao</th>
                                <th class="text-center" style=" color: darkgreen" >Casa</th>
                                <th class="text-center" style=" color: darkgreen" >Descricao</th>
                                <th class="text-center" style=" color: darkgreen" >Preco</th>
                                <th class="text-center" style=" color: darkgreen" >Estado</th>
                                <th class="text-center" style=" color: darkgreen">Cliente</th>
                            </tr>
                            <tbody>
                            @foreach($apartamento as $apart)
                                <tr>
                                <tr>
                                    <td class="text-center"><img src="images/{{$apart->img }}" alt="..." width="150" height="50">
                                        <div class="caption"></td>
                                    <td class="text-center">{{$apart->b}}</td>
                                    <td class="text-center">{{$apart->numero}}</td>
                                    <td class="text-center">{{$apart->num}}</td>
                                    <td class="text-center">{{$apart->d}}</td>
                                    <td class="text-center">{{$apart->p}}</td>
                                    <td class="text-center">{{$apart->e}}</td>
                                    <td class="text-center">{{$apart->n}}</td>
                                </tr>
                            @endforeach
                            </tbody>


                        </table>
                    </div>
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