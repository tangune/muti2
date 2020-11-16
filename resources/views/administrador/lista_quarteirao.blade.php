
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
         <h3 class="box-title" style="color: blue"> Lista de Quarteiroes</h3>

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
                  <th class="text-center" style=" color: red" >Imagem</th>
                  <th class="text-center" style=" color: red" >Quarteirao</th>
                  <th class="text-center" style=" color: red">Casa</th>
                  <th class="text-center" style=" color: red">Proprietario</th>
                  <th class="text-center" style=" color: red">Contacto</th>
                  <th class="text-center" style=" color: red">Editar</th>
                </tr>
                  <tbody>
                    @foreach($quarteiroes as $quart)
                      <tr>
                        <td class="text-center"><img src="images/{{$quart->img }}" alt="..." width="150" height="50">
                                    <div class="caption"></td>
                         <td class="text-center">{{$quart->quart}}</td>
                         <td class="text-center">{{$quart->casa}}</td>
                         <td class="text-center">{{$quart->n}}</td>
                         <td class="text-center">{{$quart->cel}}</td>
                         <td class="text-center">
                             <button style="border-radius: 15px"><a  href="/lista_bairro/edit/{{$quart->id}}">Editar </a></button>
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