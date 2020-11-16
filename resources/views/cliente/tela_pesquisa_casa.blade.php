
@extends('layouts.backend_cliente')

@section('title','Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12 ">
        <div class="panel panel-default">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!--section class="content-header">
      <form action="/pesquisaCasa" method="GET">
        {{ csrf_field() }}
      </form>     
    </section -->

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
            <div>
                <button style="border-radius: 15px; color: red"><a href="cliente_lista_apartamento" class="btn-success" style="border-radius: 15px" >Voltar</a></button>
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
        <!--  <h3 class="box-title">Lista de apartamentos</h3> -->

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 ">
        <div class="panel panel-default">
          <div class="panel-heading"></div>

            <div class="panel-body">
                        <div class="row">
                           @foreach($casas as $apart)

                                <div class="col-sm-4 col-md-4">
                                  <div class="info-box" >
                                        <img src="images/{{$apart->img }}" alt="..." width="300" height="200">
                                    <div class="caption">
                                            <h5 style="color: red">{{$apart->p }}mt</h5>
                                          
                                            <button style="size: b5;font-weight: 100;" type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModal" 
                                            onclick="abrirModal({{$apart->id}})" style="margin-right: 105px;">
                                            Detalhes 
                                            </button>
                                        <button style="size: b5;font-weight: 100;" type="button" class="btn btn-primary btn-small"
                                                data-toggle="modal" data-target="#modalEncomendar"
                                                onclick="encomenda({{$apart->id}})" style="margin-right: 105px">
                                            Reservar
                                        </button>
                                    </div>
                                  </div>
                                </div>
                            @endforeach
                        </div>
            </div>       
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header" style="background-color: #0b97c4">
        <h4 id="myModalLabel" style="color: white; text-align: center;">Detalhes da casa</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <hr style="border: thick; width: 100%">
      <div >
        <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-right: 20px; float: right; border-radius: 15px">Fechar</button>
      </div><br>  
      <div class="modal-footer" style="background-color: #0b97c4">
          <h4 style="color: white; text-align: center; ">Faça a sua reserva e garanta o seu lar !</h4>
      </div>
    </div>
  </div>

</div>

          <!--inicio da tela modal encomendar -->
          <div class="modal fade" id="modalEncomendar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

              <div class="modal-dialog" role="document">
                  <div class="modal-content" style="background-color: #b0d4f1">
                      <div class="modal-header">


                          <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->

                          <h4 class="modal-title" id="myModalLabel" style="color: blue; color: white; text-align: center ">Connosco, voce consegue um lar !</h4>
                      </div>

                      <form id="formulario" action="/gravarReserva" method="POST">
                          <div class="modal-body" style="background-color: #009fe8">

                              {{ csrf_field() }}
                              {{ method_field('PUT') }}
                              <input type="hidden" id="users_id" name="users_id" style="border-radius: 15px" class="form-control" value="{{ auth()->user()->id}}"><br>
                              <input type="hidden" id="apartamento_id" name="apartamento_id" style="border-radius: 15px" class="form-control" value=""><br>
                              <input name="celular" id="celular" style="border-radius: 15px" class="form-control" placeholder="Contacto do cliente" ><br>
                              <button style="color: red; border-radius: 15px" class="btn-btn-success pull-left"><a href="/cliente_lista_apartamento" >Sair</a></button>
                              <input type="submit" value="Enviar"  class="btn-btn-success pull-right" style="color: red; border-radius: 15px">

                          </div>
                      </form>

                      <div class="modal-footer">
                          <h4 style="color: blue; text-align: center; ">Faça a sua reserva e garanta o seu lar !</h4>
                      </div>
                  </div>
              </div>

          </div>
          <!--fim da tela modal encomendar -->
<script src="{{ asset('libs/jquery-3.3.1.min.js') }}"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript">

  function abrirModal(id){

    $.get('/detalhes/'+id, function(dados) {
     
     $('#myModal .modal-body').html( '' ) 

     if (dados.resustado)
     {

      let detalheO = dados.resustado
      let detalhe = '<h4>Quarteirão: ' + detalheO.nq +   '</h4>'
          detalhe += '<h4>Numero da casa: ' + detalheO.n + '</h4>'
          detalhe += '<h4>Tipo da casa: ' + detalheO.t + '</h4>'
          $('#myModal .modal-body').html( detalhe )
    }
    else
    {
      $('#myModal .modal-body').html('<p>Esse produto nao tem nenhum detalhe</p>') 
    }
    
  });

  }

        function encomenda(id) {

                $('#apartamento_id').val(id);
                $('#modalEncomendar .modal-body').modal('show')

        }


    </script>

        <!-- /.box-body -->


        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
@endsection