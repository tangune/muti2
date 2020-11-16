
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
         <h3 class="box-title" style="color: green"> Registo de Casas</h3> 

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
                     <form  action="/gravarCasa" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}

                
                <div class="panel-body" >
   
                   <label style="color: green">Bairro</label> 
                   <select name="bairros_id" style="border-radius: 15px" class="form-control">
                      @foreach($bairro as $bair)
                        <option value="{{$bair->id}}">{{$bair->nome}}</option>
                      @endforeach
                    </select></br>
                    <label style="color: green">Quarteirao</label>
                   <select name="quarteiroes_id" style="border-radius: 15px" class="form-control">
                      @foreach($quarteirao as $quart)
                        <option value="{{$quart->id}}">{{$quart->numero}}</option>
                      @endforeach
                    </select></br> 
                    <label style="color: green">Proprietario</label>
                   <select name="proprietarios_id" style="border-radius: 15px" class="form-control">
                      @foreach($proprietario as $prop)
                        <option value="{{$prop->id}}">{{$prop->nome}}</option>
                      @endforeach
                    </select></br>
                   <label style="color: green">Numero casa</label>
                   <input type="text" style="border-radius: 15px" name="numero_casa" class="form-control" placeholder="numero de casa"></br>
                   <label style="color: green">Comissao</label> 
                   <select name="comissoes_id" style="border-radius: 15px" class="form-control">
                      @foreach($comissao as $comis)
                        <option value="{{$comis->id}}">{{$comis->nome}}</option>
                      @endforeach
                    </select></br>
                    <input type="hidden" name="users_id" value="{{auth()->id()}}" class="form-control" ></br>
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