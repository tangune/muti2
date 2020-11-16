
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
         <h3 class="box-title" style="color: green"> Registo de agentes</h3> 

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
                    <form name="form"  action="/gravarAgente" method="POST" onsubmit="return validar();" >

                        {{ csrf_field() }}
                        
                        <div class="panel-body" >
                            <select name="users_id" class="form-control" style="border-radius: 15px">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select></br>
                           <input type="text" name="celular" style="border-radius: 15px" class="form-control" placeholder="celular"></br>
                           <select name="comissoes_id" style="border-radius: 15px" class="form-control">
                              @foreach($comissao as $comis)
                                <option value="{{$comis->id}}">{{$comis->nome}}</option>
                              @endforeach
                            </select><br>
                           <input type="submit" name="submit" value="Gravar" class="btn-btn-success pull-right" style="color: green; border-radius: 15px">
                       </div>
                    </form>
            </div>
        </div>

          <div class="box-body table-responsive no-padding">

              <table class="table table-active">
                  <tr>
                      <th class="text-center" style=" color: white; background-color: #8cdd8c" >Nome</th>
                      <th class="text-center" style=" color: white; background-color: #8cdd8c" >Celular</th>
                      <th class="text-center" style=" color: white; background-color: #8cdd8c" >Comissao</th>
                  </tr>
                  <tbody>
                  @foreach($agentes as $use)
                      <tr>
                      <tr>
                          <td class="text-center"> {{$use->nome}}</td>
                          <td class="text-center">{{$use->c}}</td>
                          <td class="text-center">{{$use->comissao}}</td>
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
        <script src="{{ asset('libs/jquery-3.3.1.min.js') }}"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
                integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
                crossorigin="anonymous"></script>

        <script>

            function validar() {

                if (document.form.celular.value()== ""){
                    alert("Por favor introduza um contacto correcto!");
                    document.form.celular.focus();
                    return false;
                }

            }
        </script>

    </section>
    <!-- /.content -->
  </div>
@endsection