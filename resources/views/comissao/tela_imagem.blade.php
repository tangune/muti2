@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center;"><strong style="color: green">Registo de imagem</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form  action="/gravarImagem" method="POST" id="upload" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="panel-body" >
            
                            <label>Imagem</label>
                           <input type="file" name="file[]" multiple  class="form-control" placeholder="imagem de casa"> 
                            <input type="hidden" name="_token" value="{{csrf_token()}}" class="form-control"></br>               
                           <input type="submit" class="btn-btn-success pull-right" style="color: green; border-radius: 15px">
                           <button  style="border-radius: 15px; float: right;"><a href="/home" style="text-decoration: none; color: green">Sair</a> </button>
                       </div>

                    </form>
                    @if(Session::has)

                    <script type="text/javascript">
                        var form = document.getElementById('upload');
                        var request = XMLHttpRequest();
                        form.addEventListener('submit', function(){

                            e.preventDefault();
                            var formdata  = new formData(form);
                            request.open('post','/gravarImagem');
                            request.addEventListener("load", transferComplete );
                            request.send(formdata);
                        })

                        function transferComplete(data){
                           console.log(data.currentTarget.response);
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
