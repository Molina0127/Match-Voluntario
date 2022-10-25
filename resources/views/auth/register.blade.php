@extends('layouts.user_header')

@section('content')
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="{{ asset('site/css/register.css') }}">
            <title>Cadastro</title>
        </head>
        <body>
            <div class="main-login">
                <div class="left-login">
                    <h1>Cadastre-se aqui!</h1>
                    <img src="{{ secure_asset('site/img/img_register.svg')}}" class="image" alt="animação">
                </div>
                <div class="right-login">
                    <div class="card-login">
                        <h1>Cadastro</h1>
                        <form method="post" action="{{ route('register') }}">
                        @csrf

                        <div class="textfield">
                            <label for="nome">{{ __('Nome') }}</label>

                            <div class="textfield">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" placeholder="Digite aqui" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>

                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="textfield">
                            <label for="sobrenome">{{ __('Sobrenome') }}</label>

                            <div class="textfield">
                                <input id="sobrenome" type="text" class="form-control @error('sobrenome') is-invalid @enderror" name="sobrenome" value="{{ old('sobrenome') }}" required autocomplete="sobrenome" autofocus>

                                @error('sobrenome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="textfield">
                            <label for="email">{{ __('Email') }}</label>

                            <div class="textfield">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="nome@email.com" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="textfield">
                            <label for="nasc">{{ __('Data de nascimeto') }}</label>

                            <div class="textfield">
                                <input id="dn" type="date" class="form-control @error('datanasc') is-invalid @enderror" name="datanasc" placeholder="DD/MM/AAAA" value="{{ old('datanasc') }}" required autocomplete="datanasc" autofocus>

                                @error('datanasc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="textfield">
                            <label for="cpf">{{ __('CPF') }}</label>

                            <div class="textfield">
                                <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf"  placeholder="123.456.789-10" value="{{ old('cpf') }}" required autocomplete="cpf" autofocus maxlength="14">

                                @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="textfield">
                            <label for="password">{{ __('Senha') }}</label>

                            <div class="textfield">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <button class="btn-login">Cadastrar</button>
                    </form>
                  </div>
</div>

    <!-- Scripts -->
    <script src="{{ secure_asset('site/js/data.js')}}"></script>

</body>
</html>
@endsection