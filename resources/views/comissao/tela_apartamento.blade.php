
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
         <h3 class="box-title" style="color: green"> Registo de apartamentos</h3> 

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
                  <form  action="/gravarApartamento" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="panel-body" >
                           <label style="color: green">Numero casa</label>
                           <select name="casas_id" style="border-radius: 15px" class="form-control">
                              @foreach($casa as $cas)
                                <option value="{{$cas->id}}">{{$cas->numero_casa}}</option>
                              @endforeach
                            </select></br>
                           <label style="color: green">Descricao</label>
                           <select name="designacoes_id" style="border-radius: 15px" class="form-control">
                              @foreach($designacao as $desig)
                                <option value="{{$desig->id}}">{{$desig->descricao}}</option>
                              @endforeach
                           </select>
                            <input type="hidden" style="border-radius: 15px"  name="users_id" value="{{auth()->id()}}" class="form-control" ></br>
                           <input type="text" style="border-radius: 15px" name="tipo" class="form-control" placeholder="Tipo da casa"></br>
                            <input type="number" style="border-radius: 15px" name="numero_apartamento" class="form-control" placeholder="Numero de apartamento"></br>
                           <input type="text" style="border-radius: 15px" name="preco" class="form-control" placeholder="preco de arrendamento da casa"></br>
                           <label style="color: green">Estado</label>
                            <select name="estado_id" style="border-radius: 15px" class="form-control">
                                @foreach($estados as $est)
                                    <option value="{{$est->id}}">{{$est->estado}}</option>
                                @endforeach
                            </select></br>
                            <label style="color: green">Imagem apartamento</label>
                           <input type="file" style="border-radius: 15px" name="imagem" class="form-control" >
                           <input type="hidden" name="_token" value="{{csrf_token()}}" class="form-control"></br>
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