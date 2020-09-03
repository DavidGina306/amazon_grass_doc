@extends('layouts.login')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <div  class="text-center">
                            <img src="/images/logo01.png" class="rounded-circle  text-center" alt="caa" width="150" height="100">
                        </div>
                        <h5 class="card-title text-center"><B>DESMEMBRAMENTO</B></h5>
                        <form method="POST"  action="{{ route('login') }}">
                            @csrf
                            <div class="form-label-group">
                                <input type="text"  name='nome_guerra' value="{{ old('login') }}" id="login" class="form-control" placeholder="Login" required autofocus>
                                <label for="login" class="col-md-4 col-form-label text-md-right">{{ __('Login') }}</label>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-label-group">
                                <input type="password" name='senhabd' id="inputPassword" class="form-control" placeholder="Senha"
                                    required>
                                    <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>
                                    @error('senha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
