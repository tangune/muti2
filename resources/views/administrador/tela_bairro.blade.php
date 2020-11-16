
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
         <h3 class="box-title" style="color: blue"> Registo de Bairros</h3>
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
               <form  action="/gravarBairro" method="POST">
                        {{ csrf_field() }}
                        <div class="panel-body" >
                           <input type="text" name="nome" style="border-radius: 15px" class="form-control" placeholder="nome do bairro"></br>
                            <select name="cidades_id" style="border-radius: 15px" class="form-control">
                              @foreach($cidade as $cid)
                                <option value="{{$cid->id}}">{{$cid->nome}}</option>
                              @endforeach
                            </select></br>
                           <input type="submit" value="Gravar" class="btn-btn-success pull-right" style="color: blue; border-radius: 15px">
                        </div>
                </form>
        </div>
          <hr style="color: blue">
          <div class="box-body table-responsive no-padding">
              <table class="table table-active">
                  <tr>
                      <th class="text-center" style=" color: white; background-color: lightskyblue" >Cidade</th>
                      <th class="text-center" style=" color: white; background-color: lightskyblue" >Bairro</th>
                      <th class="text-center" style=" color: white; background-color: lightskyblue">Acção</th>
                  </tr>
                  <tbody>
                  @foreach($bairros as $use)
                      <tr>
                      <tr>
                          <td class="text-center">{{$use->cidade}}</td>
                          <td class="text-center">{{$use->nome}}</td>
                          <td class="text-center">
                              <button style="size: b5;font-weight: 100;" type="button" class="btn btn-primary btn-small"
                                      data-toggle="modal" data-target="#myModal"
                                      onclick="editar({{$use->id}})" style="margin-right: 105px">
                                  Editar
                              </button>
                          </td>

                      </tr>
                  @endforeach
                  </tbody>
              </table>
          </div>

          <!--inicio tela modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header" style="background-color: lightskyblue">
                          <h4 class="modal-title" id="myModalLabel" style="color: white; text-align: center">Actualizar o nome do bairro</h4>

                      </div>
                      <form  action="/modal_updateBairro" method="POST">
                          <div class="modal-body" style="background-color: #b0d4f1">
                              {{ csrf_field() }}
                              {{ method_field('PUT') }}
                              <input type="hidden" id="idbairro" name="idbairro" style="border-radius: 15px" value="" class="form-control" >
                              <input type="text" id="nome" name="nome" style="border-radius: 15px" value="" class="form-control" >
                              <input type="hidden" id="cidades_id" style="border-radius: 15px" name="cidades_id" value=""  class="form-control"></br>
                              <input type="hidden" id="created_at" name="created_at" style="border-radius: 15px" value="" class="form-control" >
                              <input type="hidden" id="updated_at" name="updated_at" style="border-radius: 15px" value="" class="form-control" >
                              <input type="submit" value="Gravar"  class="btn-btn-success pull-right" style="color: #009fe8; border-radius: 15px; float: right">
                              <a  href="/bairro" class="btn btn-success" style="border-radius: 15px;  background-color: #009fe8">Sair </a>

                              </div>

                      </form>

                      <!--    <div >
                              <button type="button" class="btn btn-default" data-dismiss="modal"
                                      style="margin-right: 20px; float: right; border-radius: 15px">Fechar</button>
                          </div><br> -->
                      <div class="modal-footer" style="background-color: lightskyblue">
                          <h4 style="color: white; text-align: center; ">Sistema de Gestão de Arrendamento de Casas</h4>
                      </div>
                  </div>
              </div>

          </div>


          <!--fim tela modal-->

          <script src="{{ asset('libs/jquery-3.3.1.min.js') }}"></script>
          <!-- Latest compiled and minified JavaScript -->
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
                  integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
                  crossorigin="anonymous"></script>
          <script type="text/javascript">

              function editar(id){

                  $.get('/modal_editarBairro/'+id, function(dados) {

                      $('#myModal .modal-body').modal('show')

                      if (dados.resustado)
                      {

                          let detalheO = dados.resustado
                          let detalhe1 =  detalheO.id
                          let detalhe2 =  detalheO.nome
                          let detalhe3 =  detalheO.cidades_id
                          let detalhe4 =  detalheO.created_at
                          let detalhe5 =  detalheO.updated_at


                          $('#idbairro').val(detalhe1);
                          $('#nome').val(detalhe2);
                          $('#cidades_id').val(detalhe3);
                          $('#created_at').val(detalhe4);
                          $('#updated_at').val(detalhe5);





                          // $('#myModal .modal-body').html( detalhe )
                          $('#myModal .modal-body').modal('show')
                      }
                      else
                      {
                          //$('#myModal .modal-body').html('<p>Esse produto nao tem nenhum detalhe</p>')
                          $('#myModal .modal-body').modal('show')

                      }

                  });

              }




          </script>
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