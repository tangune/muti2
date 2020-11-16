@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="width: 80%; margin-left: 12%">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #0b97c4; "><h4 style="color: white; text-align: center; ">Encontre a sua casa aqui, facil, facil !</h4></div>


                <div class="card-body" style="background-color: #b0d4f1">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6" style="margin-left: 25%">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" required autocomplete="name"
                                       placeholder="Userneme" autofocus><br>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4" style="margin-left: 15%; text-align: center;" ></label>
                            <div class="col-md-6" style="margin-left: 25%">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="current-password" placeholder="Password"><br>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4" style="margin-left: 25%">
                                <div class="form-check" >
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" >
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4" style="margin-left: 25%">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
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
