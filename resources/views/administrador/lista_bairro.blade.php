
@extends('layouts.backend_admin')

@section('title','Dashboard')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
         <h3 class="box-title" style="color: blue">  Lista de Bairros</h3>

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
                  <th class="text-center" style=" color: red" >Bairro</th>
                  <th class="text-center" style=" color: red">Data</th>
                  <th class="text-center" style=" color: red">Editar</th>
                </tr>
                  <tbody>
                    @foreach($bairros as $bairro)
                      <tr>
                         <td class="text-center">{{$bairro->nome}}</td>
                         <td class="text-center">{{$bairro->created_at}}</td>
                         <td class="text-center">
                           <a  href="/editarBairro/{{$bairro->id}}" class="btn btn-success">Editar </a>
                         </td>
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