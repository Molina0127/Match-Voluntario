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
            <img src="{{ asset('site/img/img_register.svg')}}" class="image" alt="animação">
        </div>
        <div class="right-login">
            <div class="card-login">
                <h1>Cadastro</h1>

                <form action="{{ route('saveUser') }}" method="post">
                @csrf
                    <div class="textfield">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" placeholder="Digite aqui">
                    </div>
                    <div class="textfield">
                        <label for="snome">Sobrenome</label>
                        <input type="text" name="sobrenome" placeholder="Digite aqui">
                    </div>
                    <div class="textfield">
                            <label for="email">Email</label>
                            <input type="email" name="email" placeholder="nome@exemplo.com">
                    </div>
                    <div class="juntos">
                        <div class="textfield" id="dn">
                            <label for="nasc">Data de nascimeto</label>
                            <input type="date" name="datanasc" placeholder="DD/MM/AAAA">
                        </div>
                        <div class="textfield">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" id="cpf" placeholder="000.000.000-00">
                        </div>
                    </div>
                    <div class="textfield">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Digite aqui">
                    </div>
                    <button class="btn-login">Cadastrar</button>
                    </div>
                </form>
                
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('site/js/data.js')}}"></script>

</body>
</html>