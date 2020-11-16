
@extends('layouts.backend_comissoes')

@section('title','Dashboard')

@section('content')
    <div class="content-wrapper">
        <br>
        <form action="/comissao_pesquisaCasa" method="GET">
            {{ csrf_field() }}
            <button style="border-radius: 15px; color: lightseagreen; float: right; margin-right: 60%"  name="pesquisar">Pesquisar</button>
            <select type="text" name="estado" class="form-control" style="border-radius: 15px; width: 15%; height: 30px; padding-left: 2%; margin-left: 4%;  border-color: blue; float: left">
                @foreach($estado as $apart)
                    <option value="{{$apart ->estado}}">{{$apart ->estado}}</option>
                @endforeach
            </select>
        <!--select type="text" name="bairro" class="form-control" style="border-radius: 15px; width: 25%; height: 30px; padding-left: 10px; margin-left: 20px;  border-color: blue; float: left">
                    @foreach($bairro as $apart)
            <option value="{{$apart ->nome}}">{{$apart ->nome}}</option>
                    @endforeach
                </select -->
        <!--select type="text" name="quarteirao" class="form-control" style="border-radius: 15px; width: 15%; height: 30px; border-color: blue; ">
                    @foreach($quarteirao as $apart)
            <option value="{{$apart ->numero}}">{{$apart ->numero}}</option>
                    @endforeach
                </select -->
        </form>
        <br>
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <!--h3 class="box-title" style="color: blue"> Lista de Apartamentos</h3 -->

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
                                <th class="text-center" style=" color: lightseagreen" >Apartamento</th>
                                <th class="text-center" style=" color: lightseagreen" >Bairro</th>
                                <th class="text-center" style=" color: lightseagreen" >Quarteirão</th>
                                <th class="text-center" style=" color: lightseagreen" >Descrição</th>
                                <th class="text-center" style=" color: lightseagreen">Casa</th>
                                <th class="text-center" style=" color: lightseagreen">Tipo</th>
                                <th class="text-center" style=" color: lightseagreen">Estado</th>
                                <th class="text-center" style=" color: lightseagreen">Preço</th>
                            </tr>
                            <tbody>
                            @foreach($apartamento as $apart)
                                <tr>
                                <tr>
                                    <td class="text-center"><img src="images/{{$apart->img }}" alt="..." width="150" height="50">
                                        <div class="caption"></td>
                                    <td class="text-center">{{$apart->bairro}}</td>
                                    <td class="text-center">{{$apart->numero}}</td>
                                    <td class="text-center">{{$apart->desc}}</td>
                                    <td class="text-center">{{$apart->casa}}</td>
                                    <td class="text-center">{{$apart->t}}</td>
                                    <td class="text-center">{{$apart->est}}</td>
                                    <td class="text-center">{{$apart->prec}}</td>


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