
@extends('layouts.backend_comissao')

@section('title','Dashboard')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" style="color: darkgreen"> Envio de Email </h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>

                    </div>
                </div>

                @if(count($errors ) > 0)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" >
                            x
                        </button>
                        <ul>
                            @foreach( $errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if($message = Session::get('sucesso'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" >
                            x
                        </button>
                        <strong>{{$message}}</strong>

                    </div>
                @endif
                <form  action="{{url('enviarEmail/enviar')}}" method="POST">

                    {{ csrf_field() }}

                    <div class="panel-body" >
                        <div class="form-group">
                          <!--  <label style="color: green"><b>Nome</b></label> -->
                            <input type="hidden" value="Nhumba" name="nome" class="form-control">
                        </div>
                        <div class="form-group">
                            <label style="color: green"><b>Destinatario</b></label>
                          <!--  <input type="text" name="email" class="form-control"> -->
                            <select name="email" class="form-control" style="border-radius: 15px; border-color: green">
                                @foreach($usuarios as $usu)
                                    <option value="{{$usu->email}}">{{$usu->email}}</option>
                                @endforeach
                            </select></br>
                        </div>
                        <div class="form-group">
                            <label style="color: green"><b>Mensagem</b></label></br></br>
                            <div class="col-md-6">
                                <textarea  name="message"  class="form-control" style="border-color: green" required autofocus></textarea>
                            </div>
                            <br>
                        <div class="form-group">
                            <input type="submit" name="enviar" value="Enviar"  class="btn btn-info" style="float: right; background-color: green"/>
                        </div>
                    </div>
                </form></br></br></br></br>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th class="text-center" style=" color: white; background-color: lightgreen" >Email</th>
                            <th class="text-center" style=" color: white; background-color: lightgreen" >Mensagem</th>
                            <th class="text-center" style=" color: white; background-color: lightgreen" >Data de envio</th>
                        </tr>
                        <tbody>
                        @foreach($emeiles as $use)
                            <tr>
                            <tr>
                                <td class="text-center"> {{$use->email}}</td>
                                <td class="text-center">{{$use->mensagem}}</td>
                                <td class="text-center">{{$use->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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