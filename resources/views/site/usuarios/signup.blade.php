<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Cadastre-se</title>
</head>

<style>

    .error{
        color:red;
        font-weight: 700;
        display: block;
        padding: 6px 0;
        font-size:14px;
    }
    .form-control.error{
        border-color:red;
        padding: .375rem .75rem;

    }
    input.invalid, textarea.invalid{
	border: 2px solid red;
    }

    input.valid, textarea.valid{
        border: 2px solid green;
    }

</style>

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

                    <form id="signupvalidation" action="{{route('saveUsuario')}}" method="post" enctype="multipart/form-data">
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
                                    <input id="cidade" type="text" class="form-control @error('cidade') is-invalid @enderror" name="cidade" value="{{ old('cidade') }}" readonly autocomplete="cidade" autofocus>
                                </div>
                            </div>

                            <br>

                            <div class="textfield">
                                <label for="estado">{{ __('Estado') }}</label>

                                <div class="textfield">
                                    <input id="estado" type="text" class="form-control @error('estado') is-invalid @enderror" name="estado" value="{{ old('estado') }}" readonly autocomplete="estado" autofocus>
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

                            <div class="textfield" style="position:relative">
                                <label for="password">{{ __('Senha') }}</label>

                                <div class="textfield">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    <i class="fa-solid fa-eye" aria-hidden="true" id="eye-user-signup" onclick="toggle()"></i>
                                    <script>
                                    var state= false;
                                    function toggle(){
                                        if(state){
                                            document.getElementById(
                                                "password"
                                            ).setAttribute("type", "password");
                                            document.getElementById(
                                                "eye-user-signup").style.color="#7a797e";
                                            state = false; 
                                        }
                                        else {
                                            document.getElementById(
                                                "password"
                                            ).setAttribute("type", "text");
                                            document.getElementById(
                                                "eye-user-signup").style.color="#5887ef";
                                            state = true;
                                        }
                                    }
                                    </script>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <br>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validation-unobtrusive/4.0.0/jquery.validate.unobtrusive.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    
    <script type="text/javascript" src="jquery.min.js">

        $('#nome').on('input', function() {
            var input=$(this);
            var is_name=input.val();
            if(is_name){input.removeClass("invalid").addClass("valid");}
            else{input.removeClass("valid").addClass("invalid");}
        });

        $('#sobrenome').on('input', function() {
            var input=$(this);
            var is_surname=input.val();
            if(is_surname){input.removeClass("invalid").addClass("valid");}
            else{input.removeClass("valid").addClass("invalid");}
        });

        $('#email').on('input', function() {
            var input=$(this);
            var is_email=input.val();
            if(is_email){input.removeClass("invalid").addClass("valid");}
            else{input.removeClass("valid").addClass("invalid");}
        });

        $('#cep').on('input', function() {
            var input=$(this);
            var is_cep=input.val();
            if(is_cep){input.removeClass("invalid").addClass("valid");}
            else{input.removeClass("valid").addClass("invalid");}
        });
        $('#datanasc').on('input', function() {
            var input=$(this);
            var is_date=input.val();
            if(is_date){input.removeClass("invalid").addClass("valid");}
            else{input.removeClass("valid").addClass("invalid");}
        });
        $('#cpf').on('input', function() {
            var input=$(this);
            var is_cpf=input.val();
            if(is_cpf){input.removeClass("invalid").addClass("valid");}
            else{input.removeClass("valid").addClass("invalid");}
        });
        $('#password').on('input', function() {
            var input=$(this);
            var is_password=input.val();
            if(is_password){input.removeClass("invalid").addClass("valid");}
            else{input.removeClass("valid").addClass("invalid");}
        });

    </script>

    <script type="text/javascript">

    $(document).ready(function(){
            $('#cep').mask('00000-000');
            $('#cpf').mask('000.000.000-00', {reverse: true});

            });

            jQuery.validator.addMethod("cpf", function(value, element) {
            value = jQuery.trim(value);

                value = value.replace('.','');
                value = value.replace('.','');
                cpf = value.replace('-','');
                while(cpf.length < 11) cpf = "0"+ cpf;
                var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
                var a = [];
                var b = new Number;
                var c = 11;
                for (i=0; i<11; i++){
                    a[i] = cpf.charAt(i);
                    if (i < 9) b += (a[i] * --c);
                }
                if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
                b = 0;
                c = 11;
                for (y=0; y<10; y++) b += (a[y] * c--);
                if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }

                var retorno = true;
                if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) retorno = false;

                return this.optional(element) || retorno;

            }, );


    </script>

    <script>

        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        }, ); 
        
        $(document).ready(function() {
            $.validator.addMethod("pwcheck", function(value, element, args) {
            return /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])/.test(value);
        }, 
    );
});
        $("#signupvalidation").validate({
                rules:{
                    nome:{
                        required:true,
                        lettersonly:true,
                    },
                    sobrenome:{
                        required:true,
                        lettersonly:true,
                    },
                    email:{
                        required:true,
                        email:true,
                    },
                    cep:{
                        required:true,
                    },
                    datanasc:{
                        required:true,
                    },
                    cpf:{
                        required:true,
                        cpf:true,
                    },
                    password:{
                        required:true,
                        minlength:8,
                        pwcheck:true,
                    }
                },
                messages:{
                    nome:{
                        required: "Este campo é obrigatório",
                        lettersonly: "Informe apenas caracteres alfabéticos",
                    },
                    sobrenome:{
                        required: "Este campo é obrigatório",
                        lettersonly: "Informe apenas caracteres alfabéticos",
                    },
                    email:{
                        required: "Este campo é obrigatório",
                        email: "Informe um e-mail válido",
                    },
                    cep: "Este campo é obrigatório",
                    datanasc: "Este campo é obrigatório",
                    cpf: {
                        required: "Este campo é obrigatório",
                        cpf: "CPF Inválido",
                    },
                    password:{
                        required: "Este campo é obrigatório",
                        minlength: "A senha deve conter ao mínimo 8 caracteres",
                        pwcheck:"A senha deve conter ao menos 1 letra maiúscula, 1 minúscula, 1 número e 1 caracter especial",
                    },
                },
                
            });
    </script>