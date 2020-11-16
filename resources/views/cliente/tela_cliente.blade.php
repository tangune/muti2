
@extends('layouts.backend_cliente')

@section('title','Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="content-wrapper">
                        <!-- Content Header (Page header) -->
                       <!-- teste1 de github -->
                        <section class="content-header">
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
                            <form action="/pesquisaCasa" method="GET">
                                {{ csrf_field() }}
                                <button style="border-radius: 15px; color: red; float: right; margin-right: 35%"  name="pesquisar">Pesquisar</button>
                                <select type="text" name="bairro" class="form-control" style="border-radius: 15px; width: 25%; height: 30px; padding-left: 10px; margin-left: 20px;  border-color: blue; float: left">
                                    @foreach($bairro as $apart)
                                        <option value="{{$apart ->nome}}">{{$apart ->nome}}</option>
                                    @endforeach
                                </select><br>
                                <!--select type="text" name="quarteirao" class="form-control" style="border-radius: 15px; width: 15%; height: 30px; border-color: blue; ">
                                    @foreach($quarteirao as $apart)
                                        <option value="{{$apart ->numero}}">{{$apart ->numero}}</option>
                                    @endforeach
                                </select -->

                            </form>
                        </section>

                        <!-- Main content -->
                        <section class="content">

                            <!-- Default box -->
                            <div class="box">
                                <div class="box-header with-border">
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
                                                    <div class="panel-heading" style="padding-left: 30% ; padding-right: 35%">
                                                        @if(session('response'))
                                                            <div class="alert alert-success" style="padding-left: 30%" >
                                                                {{session('response')}}
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div id="datatable" class="panel-body">
                                                        <div class="row">
                                                            @foreach($apartamento as $apart)

                                                                <div class="col-sm-4 col-md-4">
                                                                    <div class="info-box" >
                                                                        <img src="images/{{$apart->img }}" alt="..." width="300" height="200">
                                                                        <div class="caption">
                                                                            <h4 style="color: red">{{$apart->p }}mt</h4>
                                                                            <!--h5 style="color: red">{{$apart->estado }}</h5 -->

                                                                            <button style="size: b5;font-weight: 100;" type="button" class="btn btn-primary btn-small"
                                                                                    data-toggle="modal" data-target="#myModal"
                                                                                    onclick="abrirModal({{$apart->id}})" style="margin-right: 105px">
                                                                                Detalhes
                                                                            </button>

                                                                           <button style="size: b5;font-weight: 100;" type="button" class="btn btn-primary btn-small"
                                                                                  data-toggle="modal" data-target="#modalEncomendar"
                                                                                    onclick="encomenda({{$apart->id}})" style="margin-right: 105px">
                                                                                Reservar
                                                                            </button>
                                                                        <!--  <a  href="/reservar/{{$apart->id}}" class="btn btn-success">Reservar </a> -->

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

                                <!--inicio da tela modal detalhes -->

                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: #0b97c4">
                                                <h4 class="modal-title" id="myModalLabel" style="color: white; text-align: center;">Detalhes da casa</h4>

                                            </div>
                                            <div class="modal-body">

                                            </div>
                                            <hr style="border: thick; width: 100%">
                                            <div >
                                                <button type="button" class="btn btn-default" data-dismiss="modal"
                                                        style="margin-right: 20px; float: right; border-radius: 15px">Fechar</button>
                                            </div><br>
                                            <div class="modal-footer" style="background-color: #0b97c4">
                                                <h4 style="color: white; text-align: center; ">Faça a sua reserva e garanta o seu lar !</h4>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- da tela modal detalhes -->


                                   <!--inicio da tela modal encomendar -->

                                <div class="modal fade" id="modalEncomendar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="background-color: #b0d4f1">
                                            <div class="modal-header">


                                               <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->

                                                <h4 class="modal-title" id="myModalLabel" style="color: blue; color: white; text-align: center ">Connosco, voce consegue um lar !</h4>
                                            </div>

                                            <form id="formulario" action="/gravarReserva" method="POST" onsubmit="return validar();">
                                                <div class="modal-body" style="background-color: #009fe8">

                                                    {{ csrf_field() }}
                                                    {{ method_field('PUT') }}
                                                    <input type="hidden" id="users_id" name="users_id" style="border-radius: 15px" class="form-control" value="{{ auth()->user()->id}}"><br>
                                                    <input type="hidden" id="apartamento_id" name="apartamento_id" style="border-radius: 15px" class="form-control" value=""><br>
                                                    <input name="celular" id="celular" style="border-radius: 15px" class="form-control" placeholder="Contacto do cliente" ><br>
                                                    <button style="color: red; border-radius: 15px" class="btn-btn-success pull-left"><a href="/cliente_lista_apartamento" >Sair</a></button>
                                                    <input type="submit" name="submit" value="Enviar"  class="btn-btn-success pull-right" style="color: red; border-radius: 15px">

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
                                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
                                        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
                                        crossorigin="anonymous"></script>

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


                                    //funcao encomendar

                                    function encomenda(id) {

                                       // $.get('/reservar_modal/'+id, function(dados) {

                                          //$('#modalEncomendar .modal-body').html( '' )
                                          //  $('#modalEncomendar .modal-body').modal('show')
                                           // if (dados.resustado)
                                           // {

                                               // let detalheO = dados.resustado


                                                $('#apartamento_id').val(id);

                                               /* let detalhe = ' <form action="/gravarReserva" method="POST">'

                                                detalhe +='<input type="hidden" name="users_id" style="border-radius: 15px" class="form-control" value=" '+ {{ auth()->user()->id}} +' ">'+ '<br><br>'
                                                detalhe +=' <input type="hidden" name="apartamento_id" style="border-radius: 15px" class="form-control" value=" '+ detalheO.id +' ">'+ '<br><br>'
                                                detalhe +=' <input name="celular" style="border-radius: 15px" class="form-control" placeholder="Contacto do cliente" >'+ '<br><br>'+'<br><br>'
                                                detalhe +='<input type="submit" value="Enviar"  class="btn-btn-success pull-right" style="color: red; border-radius: 15px">'
                                                '</form>' */

                                                //$('#modalEncomendar .modal-body').html( detalhe )
                                                $('#modalEncomendar .modal-body').modal('show')
                                          //  }
                                            //else
                                            //{
                                              // $('#modalEncomendar .modal-body').html('<p>Esse produto nao tem nenhum detalhe</p>')


                                           // }

                                       // });

                                    }

                                    function validar() {

                                        if (document.formulario.celular.value()== "" ){
                                            alert("Por favor introduza um contacto correcto!")
                                            return false;
                                        }

                                    }

                                </script>



                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                Footer
                            </div>
                            <!-- /.box-footer-->
                    </div>
                    <!-- /.box -->

                    </section>
                    <!-- /.content -->
                </div>
@endsection