
@extends('layouts.backend_admin')

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
         <!-- h3 class="box-title" style="color: blue"> Registo de Cidades</h3 -->

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

          <div class="box-body table-responsive no-padding">
              <form  action="/gravarCidade" method="POST">

                        {{ csrf_field() }}
                        <div class="panel-body" >
                           <input type="text" name="nome" style="border-radius: 15px" class="form-control" placeholder="nome da cidade"><br>
                           <input type="submit" value="Gravar" class="btn-btn-success pull-right" style="color: blue; border-radius: 15px">
                       </div>
              </form>
            </div>
          <hr style="color: blue">
          <div class="box-body table-responsive no-padding">

              <table class="table table-active">
                  <tr>
                      <th class="text-center" style=" color: white; background-color: lightskyblue" >Codigo</th>
                      <th class="text-center" style=" color: white; background-color: lightskyblue" >Nome</th>
                      <th class="text-center" style=" color: white; background-color: lightskyblue" >Data</th>
                  </tr>
                  <tbody>
                  @foreach($cidades as $use)
                      <tr>
                      <tr>
                          <td class="text-center"> {{$use->id}}</td>
                          <td class="text-center">{{$use->nome}}</td>
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