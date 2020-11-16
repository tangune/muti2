
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
         <h3 class="box-title" style="color: green"> Registo de Proprietarios</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
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
        </div>
        <div class="box-body">
            <div class="">
                  <form  action="/gravarProprietario" method="POST">
                        {{ csrf_field() }}
                        
                        <div class="panel-body" >
                           <input type="text" name="nome" style="border-radius: 15px" class="form-control" placeholder="nome do proprietario"></br></br>
                           <input type="text" name="contacto" style="border-radius: 15px" class="form-control" placeholder="celular do proprietario"></br></br>
                           <input type="submit" value="Gravar" class="btn-btn-success pull-right" style="color: green; border-radius: 15px">
                       </div>
                  </form>
            </div>
        </div>
          <hr>
            <h4 style="text-align: center; color: green">Lista de proprietarios</h4>
          <div class="box-body table-responsive no-padding">

              <table class="table table-active">
                  <thead>
                  <tr>
                      <th class="text-center" style=" color: white; background-color: #8cdd8c" >Nome</th>
                      <th class="text-center" style=" color: white; background-color: #8cdd8c" >Celular</th>
                      <th class="text-center" style=" color: white; background-color: #8cdd8c" >Numero de casa</th>
                      <th class="text-center" style=" color: white; background-color: #8cdd8c" >Bairro</th>
                      <th class="text-center" style=" color: white; background-color: #8cdd8c" >Comissao</th>
                  </tr>
                  </thead>

                  <tbody>
                  @foreach($proprietarios as $prop)
                      <tr>
                      <tr>
                          <td class="text-center"> {{$prop->nome}}</td>
                          <td class="text-center">{{$prop->celular}}</td>
                          <td class="text-center">{{$prop->numero}}</td>
                          <td class="text-center">{{$prop->bairro}}</td>
                          <td class="text-center">{{$prop->comissao}}</td>
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