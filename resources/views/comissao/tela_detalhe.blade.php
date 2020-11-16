
@extends('layouts.backend_comissao')

@section('title','Dashboard')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <!--Lista de Cidade -->
                <!-- <small>it all starts here</small> -->
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" style="color: green"> Registo de detalhes</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="">
                        <form  action="/gravarDetalhe" method="POST" enctype="multipart/form-data">

                            {{ csrf_field() }}


                            <div class="panel-body" >
                                <label style="color: green">Casa</label>
                                <select name="apartamentos_id" style="border-radius: 15px" class="form-control">
                                    @foreach($apartamento as $apart)
                                        <option value="{{$apart->id}}">{{$apart->numero_casa}}</option>
                                    @endforeach
                                </select></br>
                                <label style="color: green">Descricao</label>
                                <input type="text" name="descricao" style="border-radius: 15px" placeholder="tipo de face da casa, frente, tras, teto, lateral esquerdo, lateral direito" class="form-control"></br>
                                <label style="color: green">Faixa do apartamento</label>
                                <input type="file" name="face_casa" style="border-radius: 15px" class="form-control" placeholder="imagem faixa da casa"></br>
                                <input type="hidden" name="_token" value="{{csrf_token()}}" class="form-control"
                                       placeholder=""></br>
                                <input type="submit" class="btn-btn-success pull-right" style="color: green; border-radius: 15px">

                            </div>

                        </form>
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