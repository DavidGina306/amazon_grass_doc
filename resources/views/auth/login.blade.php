@extends('layouts.login')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <div  class="text-center">
                            <img src={{{ asset('images/logo01.png') }}} class="rounded-circle  text-center" alt="caa" width="180" height="200">
                        </div>
                        <form method="POST"  action="{{ route('login') }}">
                            @csrf
                            <div class="form-label-group" style="text-transform: capitalize">
                                <input type="text"  oninput="handleInput(event)" name='nome_guerra' value="{{ old('nome_guerra') }}" id="login" class="form-control" placeholder="Login" required autofocus>
                                <label for="login" class="col-md-4 col-form-label text-md-right">{{ __('Usuário') }}</label>
                                @error('nome_guerra')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-label-group">
                                <input type="password" name='password' id="inputPassword" class="form-control" placeholder="Senha"
                                    required>
                                    <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>
                            </div>
                            @error('nome_guerra')
                            <div class="alert alert-danger" style="text-align: center;font-size: 13px;">
                                <span style="text-align: center;">Atenção! Login ou Senha inválidos. Tente Novamente.</span>
                            </div>
                            @enderror

                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Entrar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(session()->get('errors'))
        <show-msg mensagem="Erro" tipo="error"></show-msg>
    @endif
@endsection

