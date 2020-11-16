@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #0b97c4"><h4 style="color: white; text-align: center; ">Encontre a sua casa aqui, facil, facil !</h4></div>

                <div class="card-body" style="background-color: #b0d4f1">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">


                            <div class="col-md-6" style="margin-left: 25%">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nome">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">


                            <div class="col-md-6" style="margin-left: 25%">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail Address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">


                            <div class="col-md-6" style="margin-left: 25%">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6" style="margin-left: 25%">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                       required autocomplete="new-password" placeholder="Confirmar password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4" style="margin-left: 25%">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div style="background-color: #0b97c4" class="card-footer">
                <h4 style="color: white; text-align: center; ">Faça a sua reserva e garanta o seu lar !</h4>
            </div>
        </div>
    </div>
</div>
@endsection
