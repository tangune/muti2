
@extends('layouts.backend_admin')

@section('title','Dashboard')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
            <form action="" method="GET">
                {{ csrf_field() }}
            <input style="border-radius: 15px; width: 25%; padding-left: 10px; border-color: blue;" type="text" name="bairro" placeholder="bairro">
            <input style="border-radius: 15px; width: 25%; padding-left: 10px; border-color: blue;" type="text" name="quarteirao" placeholder="quarteirao">
            <button style="border-radius: 15px; color: red" name="pesquisar">Pesquisar</button>
        </form>
    </section>
-->

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" style="color: darkblue"> Lista de casas arrendadas</h3>

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
                                <th class="text-center" style=" color: darkblue" >Imagem</th>
                                <th class="text-center" style=" color: darkblue" >Bairro</th>
                                <th class="text-center" style=" color: darkblue" >Casa</th>
                                <th class="text-center" style=" color: darkblue" >Descrição</th>
                                <th class="text-center" style=" color: darkblue" >Preço</th>
                                <th class="text-center" style=" color: darkblue">Cliente</th>
                                <th class="text-center" style=" color: darkblue">Contacto</th>
                                <th class="text-center" style=" color: darkblue">Data</th>

                            </tr>
                            <tbody>
                            @foreach($apartamento as $apart)
                                <tr>
                                <tr>
                                    <td class="text-center"><img src="images/{{$apart->img }}" alt="..." width="150" height="50">
                                        <div class="caption"></td>
                                    <td class="text-center">{{$apart->bairro}}</td>
                                    <td class="text-center">{{$apart->num}}</td>
                                    <td class="text-center">{{$apart->d}}</td>
                                    <td class="text-center">{{$apart->p}}</td>
                                    <td class="text-center">{{$apart->n}}</td>
                                    <td class="text-center">{{$apart->cel}}</td>
                                    <td class="text-center">{{$apart->created_at}}</td>

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
            <!-- /.box-->

        </section>
        <!-- /.content

                    /**
                     * Created by PhpStorm.
                     * User: costa
                     * Date: 11/10/2019
                     * Time: 3:46 PM
                     */
        -->
    </div>
@endsection

