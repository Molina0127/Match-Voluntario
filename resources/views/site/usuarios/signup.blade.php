<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Cadastre-se</title>
</head>
<body>

    <!-- main wrapper start -->
    <div class="main-wrapper">

    <!-- header start -->
        <header class="header">
            <div class="container">
                <div class="header-main d-flex justify-content-between align-items-center">
                    <div class="header-logo">
                        <a href="{{ route('home')}}"><span>match</span>voluntario</a>
                    </div>
                    <button type="button" class="header-hamburguer-btn js-header-menu-toggler">
                        <span></span>
                    </button>
                    <div class="header-backdrop js-header-backdrop"></div>
                    <nav class="header-menu js-header-menu">
                        <button type="button" class="header-close-btn js-header-menu-toggler">
                            <i class="fas fa-times"></i>
                        </button>
                        <ul class="menu">
                            <li class="menu-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="menu-item menu-item-has-children">
                                <a href="#" class="js-toggle-sub-menu">Ongs<i class="fas fa-chevron-down"></i></a>
                                <ul class="sub-menu js-sub-menu">
                                    <li class="sub-menu-item"><a href="{{route('loginOng')}}">Login</a></li>
                                    <li class="sub-menu-item"><a href="{{route('createOng')}}">Cadastro</a></li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children">
                                <a href="#" class="js-toggle-sub-menu">Voluntário<i class="fas fa-chevron-down"></i></a>
                                <ul class="sub-menu js-sub-menu">
                                    <li class="sub-menu-item"><a href="{{ route('login') }}">Login</a></li>
                                    <li class="sub-menu-item"><a href="{{ route('signup') }}">Cadastre-se</a></li>
                                </ul>
                            </li>
                            <li class="menu-item"><a href="{{ route('contact') }}">Contato</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
    <!-- header end -->

    <!-- breadcrumb start -->
    <div class="breadcrumb-nav">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cadastre-se</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- signup section start -->
    <section class="signup-section section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">

                    <!-- col-md-7 col-lg-6 col-xl-5 -->
                    <div class="signup-form box">
                        <h2 class="form-title text-center">Cadastre-se</h2>
                        
                    @if(session()->has('user_savemsg'))
                        <p class="alert alert-success">
                            {{session()->get('user_savemsg')}}
                        </p>
                    @endif

                    <form action="{{route('saveUsuario')}}" method="post" enctype="multipart/form-data">
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

                            <br>

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

                            <br>

                            <div class="form-group">
                            <label for="user_image">Buscar Foto</label>
                            <input type="file" id="user_image" name="user_image" class="form-control-file">
                        </div>

                            <div class="textfield">
                                <label for="email">{{ __('E-mail') }}</label>

                                <div class="textfield">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="nome@email.com" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <br>

                            <div class="textfield">
                                <label for="cep">{{ __('CEP') }}</label>

                                <div class="textfield">
                                    <input id="cep" type="text" class="form-control @error('cep') is-invalid @enderror" name="cep" placeholder="00000-000" value="{{ old('cep') }}" onblur="pesquisacep(this.value);" required autocomplete="cep" autofocus>
                                </div>
                            </div>

                            <br>

                            <div class="textfield">
                                <label for="cidade">{{ __('Cidade') }}</label>

                                <div class="textfield">
                                    <input id="cidade" type="text" class="form-control @error('cidade') is-invalid @enderror" name="cidade" value="{{ old('cidade') }}" readonly required autocomplete="cidade" autofocus>
                                </div>
                            </div>

                            <br>

                            <div class="textfield">
                                <label for="estado">{{ __('Estado') }}</label>

                                <div class="textfield">
                                    <input id="estado" type="text" class="form-control @error('estado') is-invalid @enderror" name="estado" value="{{ old('estado') }}" readonly required autocomplete="estado" autofocus>
                                </div>
                            </div>  

                            <br>

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

                            <br>

                            <div class="form-group @if($errors->has('categoria_id')) has-error @endif">
                            {!! Form::label('Categoria de preferência') !!}
                            {!! Form::select ('categoria_id[]', $categorias, null, ['class' => 'form-control', 'required', 'id' => 'categoria_id', 'multiple']) !!}
                            @if($errors->has('categoria_id'))
                                <span class="help-block">{!! $errors->first('categoria_id') !!}</span>
                            @endif
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

                            <br>

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
                          <button type="submit" class="btn btn-theme btn-block btn-form">Cadastrar</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- signup section end -->

    <script>
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('cidade').value=("");
            document.getElementById('estado').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('estado').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('cidade').value="...";
                document.getElementById('estado').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>


    <!-- footer start -->

    <footer class="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="footer-item">
                                <h3 class="footer-logo"><span>match</span>voluntario</a></h3>
                                <ul>
                                    <li><a href="#">sobre</a></li>
                                    <li><a href="#">o que fazemos</a></li>
                                    <li><a href="#">blog</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="footer-item">
                                <h3>voluntarios</h3>
                                <ul>
                                    <li><a href="#">membros ativos</a></li>
                                    <li><a href="#">testemunhos</a></li>
                                    <li><a href="#">projetos</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="footer-item">
                                <h3>saiba mais</h3>
                                <ul>
                                    <li><a href="#">ongs</a></li>
                                    <li><a href="#">proprietarios</a></li>
                                    <li><a href="#">projetos de expansão</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="footer-item">
                                <h3>entre em contato</h3>
                                <ul>
                                    <li><a href="#"><i class="fab fa-linkedin social-icon"></i>linkedin</a></li>
                                    <li><a href="#"><i class="fab fa-instagram social-icon"></i>instagram</a></li>
                                    <li><a href="#"><i class="fab fa-youtube social-icon"></i>youtube</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <p class="m-0 py-4 text-center">Copyright &copy; 2022 FastSolutions</p>
                </div>
            </div>
    </footer>
    <!-- footer end -->


    </div>
    <!-- main wrapper end-->


</body>

</html>