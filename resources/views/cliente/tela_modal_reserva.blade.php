<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
<div class="container">
    <div class="modal fade" id="modalEncomendar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #b0d4f1">
                <div class="modal-header">
                    <!--
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   -->
                    <h4 class="modal-title" id="myModalLabel" style="color: blue; "><h4 style="color: white; text-align: center">Connosco, voce consegue um lar !</h4>
                </div>
                <div class="modal-body" style="background-color: #009fe8">
                    <form  action="" method="GET">
                        {{ csrf_field() }}

                        <div class="panel-body">
                            <input type="hidden" name="users_id" style="border-radius: 15px" value="{{ auth()->user()->id}}" class="form-control" >
                            <input type="hidden"name="apartamento_id" style="border-radius: 15px" value="{{ $apartamento ->id}}" class="form-control" >
                            <input type="" style="border-radius: 15px" name="celular"   class="form-control" placeholder="Contacto"></br>
                            <input type="submit" value="Enviar"  class="btn-btn-success pull-right" style="color: red; border-radius: 15px; float: right">
                            <button type="button" class="btn btn-default" data-dismiss="modal" style="float: left; border-radius: 15px">Sair</button>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <h4 style="color: blue; text-align: center; ">Faça a sua reserva e garanta o seu lar !</h4>
                </div>
            </div>
        </div>

    </div>

</div>

</body>

</html>