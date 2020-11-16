
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
         <h3 class="box-title" style="color: blue"> Registo de designacao</h3>

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
        </div>
        <div class="box-body">
            <div class="">
               <form  action="/gravarDesignacao" method="POST" enctype="multipart/form-data">

                    {{ csrf_field() }}               
                    <div class="panel-body" >  
                       <label style="color: lightblue"><b>Desiganacao do apartamento</b></label>
                       <select type="text" style="border-radius: 15px" name="descricao" class="form-control">
                         <option value="casa-principal">casa-principal</option>
                         <option value="quarto-interior">quarto-interior</option>
                         <option value="dependencia">dependencia</option>
                       </select><br>
                        <label style="color: lightblue"><b>Numero do apartamento</b></label>
                        <input type="number" name="numero_apartamento" style="border-radius: 15px" class="form-control" ><br>
                       <input type="submit" value="Gravar" class="btn-btn-success pull-right" style="color: blue; border-radius: 15px">
                    </div>
                </form>
            </div>
        </div>
          <hr style="color: blue">
          <div class="box-body table-responsive no-padding">
              <table class="table table-active">
                  <tr>
                      <th class="text-center" style=" color: white; background-color: lightskyblue" >Codigo</th>
                      <th class="text-center" style=" color: white; background-color: lightskyblue" >Descricao</th>
                      <th class="text-center" style=" color: white; background-color: lightskyblue" >Data</th>
                  </tr>
                  <tbody>
                  @foreach($designacoes as $use)
                      <tr>
                      <tr>
                          <td class="text-center">{{$use->id}}</td>
                          <td class="text-center">{{$use->descricao}}</td>
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