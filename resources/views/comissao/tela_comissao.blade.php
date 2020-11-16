@extends('layouts.app')
<style type="text/css">
    
    *{
        padding: 0;
        margin: 0;
    }

    body{

        background-size: cover;
    }

    .menu-bar{
      background-color: rgb(0,100,0); 

      
    }

     .menu-bar ul{
      display: inline-flex;
      list-style: none;
      color: #fff;
     }

     .menu-bar ul li{
      width: 120px;
      margin: 10px;
      padding: 15px; 

     }

      .menu-bar ul li a{
      text-decoration: none;
      color: #fff; 
     }

        .active, .menu-bar ul li:hover {
            background: #2bab0d;
            border-radius: 3px;
        }

    
    .sub-menu-1{
        
        display: none;
    }

    .menu-bar ul li:hover .sub-menu-1 {
            display: block;
            position: absolute;
            background: rgb(0,100,0); 
            margin-top: 15px;
            margin-left: -15px;
        }

        .menu-bar ul li:hover .sub-menu-1 ul {
           display: block;
           margin: 10px; 
        }

        .menu-bar ul li:hover .sub-menu-1 ul li {
           width: 150px;
           padding: 10px;
           border-bottom: 1px dotted #fff; 
           background: transparent; 
           border-radius: 0px;
           text-align: left; 
        }

        .menu-bar ul li:hover .sub-menu-1 ul li:last-child {
          border-bottom: none; 
        }

        .menu-bar ul li:hover .sub-menu-1 ul li a:hover {
          color: #b2ff00; 
        }

  </style>

@section('content')
<div class="container" >
    <div class="row" >
        <div class="col-md-20 col-md-offset-" style="margin-left: -40px;">
            <div class="panel panel-default" >
     
               <div class="btn-group btn-group-justified" role="group" aria-label="..." style="margin-top: 5px;   ">

                 <nav class="menu-bar"  style="width: 1175px;">
                      <ul >   
                         <li class="active"><a href="#" >Registo</a>
                            <div class="sub-menu-1">
                                <ul>
                                    <li><a href="/agente">Agente</a></li>
                                    <li><a href="/proprietario">Prorietario</a></li>
                                    <li><a href="/casa">Casa</a></li>
                                    <li><a href="/apartamento">Apartamento</a></li>
                                    <li><a href="/detalhe">Detalhe</a></li>
                                </ul>

                            </div>
                         </li>
                         <li><a href="/lista">Listagem</a>
                            <div class="sub-menu-1">
                                <ul>
                                    <li><a href="/lista_agente">Agente</a></li>
                                    <li><a href="/lista_casas">Casa</a></li>
                                </ul>

                            </div>
                         </li>
                          <li><a href="/lista">Gerencias</a>
                            <div class="sub-menu-1">
                                <ul>
                                    <li><a href="#">Atualizacoes</a></li
                                </ul>

                            </div>
                         </li>
                                
                      </ul> 
                    </nav>                
                    
                </div>

                    
            </div>

        </div>
        <img src="../fotos/casas/casa2.jpg" alt="logo" style="height:200%; width: 103%; margin-left: -40px; margin-top: 20px"  >

    </div>
</div>
@endsection
