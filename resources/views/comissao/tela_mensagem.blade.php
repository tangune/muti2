
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
                    <h3 class="box-title" style="color: blue"> Envio de Mensagem </h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>

                    </div>
                </div>
                <div class="panel-heading">
                    @if(session('response'))
                    <div class="alert alert-success">
                        {{session('response')}}
                    </div>
                    @endif
                </div>
                <form  action="{{url('/enviarMensagem')}}" method="POST">

                    {{ csrf_field() }}

                    <div class="panel-body" >
                        <label style="color: green"><b>Mensagem</b></label></br>
                        <div class="col-md-6">
                            <textarea id="name" name="message"  class="form-control" required autofocus></textarea>
                        </div>
                        </br></br></br></br>

                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tr>
                                        <th class="text-center" style=" color: red"></th>
                                        <th class="text-center" style=" color: red" >Contacto</th>
                                        <th class="text-center" style=" color: red" >Nome</th>
                                    </tr>
                                    <tbody>
                                    @foreach($reservas as $use)
                                        <tr>
                                        <tr>
                                            <td><input class="form-check-input" type="checkbox" name="mobile[]" value="{{$use->celular}}" >
                                            </td>
                                            <td class="text-center"> {{$use->celular}}</td>
                                            <td class="text-center">{{$use->users_id}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        <div class="col-md-6 col-md-offset-4">

                            <button type="submit" class="btn btn-primary">Enviar mensagem</button>
                        </div>


                    </div>
                </form>

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