<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
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
                        
                    @if(session()->has('ong_savemsg'))
                        <p class="alert alert-success">
                            {{session()->get('ong_savemsg')}}
                        </p>
                    @endif

                    @if(session()->has('failcnpj_msg'))
                        <p class="alert alert-danger">
                            {{session()->get('failcnpj_msg')}}
                        </p>
                    @endif

                    <form id="singupOngValidation" action="{{route('saveOng')}}" method="post" enctype="multipart/form-data">
                        @csrf
                                
                        <div class="textfield">
                            <label for="ong_name">{{ __('ONG') }}</label>

                            <div class="textfield">
                                <input id="ong_name" type="text" class="form-control @error('ong_name') is-invalid @enderror" name="ong_name" value="{{ old('ong_name') }}" required autocomplete="ong_name" autofocus>

                                @error('ong_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <br>

                        <div class="textfield">
                                <label for="ong_email">{{ __('E-mail') }}</label>

                                <div class="textfield">
                                    <input id="ong_email" type="email" class="form-control @error('ong_email') is-invalid @enderror" placeholder="nome@email.com" name="ong_email" value="{{ old('ong_email') }}" required autocomplete="ong_email">

                                    @error('ong_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <br>

                        <div class="form-group">
                            <label for="ong_image">Buscar Foto</label>
                            <input type="file" id="ong_image" name="ong_image" class="form-control-file">
                        </div>
                    
                        <div class="textfield">
                            <label for="cnpj">{{ __('CNPJ') }}</label>

                            <div class="textfield">
                                <input id="cnpj" type="text" class="form-control @error('cnpj') is-invalid @enderror" name="cnpj" placeholder="00.000.000/0000-00" value="{{ old('cnpj') }}" required autocomplete="cnpj" autofocus>

                                @error('cnpj')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="textfield">
                            <label for="owner">{{ __('Proprietário') }}</label>

                            <div class="textfield">
                                <input id="owner" type="text" class="form-control @error('owner') is-invalid @enderror" name="owner" value="{{ old('owner') }}" required autocomplete="owner" autofocus>

                                @error('owner')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="textfield">
                            <label for="description">{{ __('Descrição') }}</label>

                            <div class="textfield">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="textfield">
                            <label for="ong_cep">{{ __('CEP') }}</label>

                            <div class="textfield">
                                <input id="ong_cep" type="text" class="form-control @error('ong_cep') is-invalid @enderror" name="ong_cep" placeholder="00000-000" value="{{ old('ong_cep') }}" onblur="pesquisacep(this.value);" required autocomplete="ong_cep" autofocus>
                            </div>
                        </div>

                        <div class="textfield">
                            <label for="ong_city">{{ __('Cidade') }}</label>

                            <div class="textfield">
                                <input id="ong_city" type="text" class="form-control @error('ong_city') is-invalid @enderror" name="ong_city" value="{{ old('ong_city') }}" readonly autocomplete="ong_city" autofocus>
                            </div>
                        </div>

                        <div class="textfield">
                            <label for="ong_state">{{ __('Estado') }}</label>

                            <div class="textfield">
                                <input id="ong_state" type="text" class="form-control @error('ong_state') is-invalid @enderror" name="ong_state" value="{{ old('ong_state') }}" readonly autocomplete="ong_state" autofocus>
                            </div>
                        </div>            
                        
                        <br>
                        
                        <div class="form-group @if($errors->has('categoria_id')) has-error @endif">
                        {!! Form::label('Categoria') !!}
                       {!! Form::select ('categoria_id[]', $categorias, null, ['class' => 'form-control', 'required', 'id' => 'categoria_id', 'multiple' => 'max:2']) !!}
                        @if($errors->has('categoria_id'))
                            <span class="help-block">{!! $errors->first('categoria_id') !!}</span>
                        @endif
                    </div>

                    <br>
                                                

                        <div class="textfield" style="position:relative">
                            <label for="password">{{ __('Senha') }}</label>

                            <div class="textfield">
                                <input id="ong-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <i class="far fa-eye" aria-hidden="true" id="eye-ong-signup" onclick="toggle()"></i>
                                <script>
                                 var state= false;
                                 function toggle(){
                                    if(state){
                                        document.getElementById(
                                            "ong-password"
                                        ).setAttribute("type", "password");
                                        document.getElementById(
                                            "eye-ong-signup").style.color="#7a797e";
                                        state = false; 
                                    }
                                    else {
                                        document.getElementById(
                                            "ong-password"
                                        ).setAttribute("type", "text");
                                        document.getElementById(
                                            "eye-ong-signup").style.color="#5887ef";
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
                    document.getElementById('ong_city').value=("");
                    document.getElementById('ong_state').value=("");
            }

            function meu_callback(conteudo) {
                if (!("erro" in conteudo)) {
                    //Atualiza os campos com os valores.
                    document.getElementById('ong_city').value=(conteudo.localidade);
                    document.getElementById('ong_state').value=(conteudo.uf);
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
                        document.getElementById('ong_city').value="...";
                        document.getElementById('ong_state').value="...";

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

        $('#ong_name').on('input', function() {
            var input=$(this);
            var is_name=input.val();
            if(is_name){input.removeClass("invalid").addClass("valid");}
            else{input.removeClass("valid").addClass("invalid");}
        });
        $('#ong_email').on('input', function() {
            var input=$(this);
            var is_email=input.val();
            if(is_email){input.removeClass("invalid").addClass("valid");}
            else{input.removeClass("valid").addClass("invalid");}
        });
        $('#cnpj').on('input', function() {
            var input=$(this);
            var is_cnpj=input.val();
            if(is_cnpj){input.removeClass("invalid").addClass("valid");}
            else{input.removeClass("valid").addClass("invalid");}
        });
        $('#owner').on('input', function() {
            var input=$(this);
            var is_owner=input.val();
            if(is_owner){input.removeClass("invalid").addClass("valid");}
            else{input.removeClass("valid").addClass("invalid");}
        });
        $('#description').on('input', function() {
            var input=$(this);
            var is_description=input.val();
            if(is_description){input.removeClass("invalid").addClass("valid");}
            else{input.removeClass("valid").addClass("invalid");}
        });
        $('#ong_cep').on('input', function() {
            var input=$(this);
            var is_cep=input.val();
            if(is_cep){input.removeClass("invalid").addClass("valid");}
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
            $('#ong_cep').mask('00000-000');
            $('#cnpj').mask('00.000.000/0000-00', {reverse: true});

            });

            jQuery.validator.addMethod("cnpj", function(cnpj, element) {
            cnpj = cnpj.replace('/','');
            cnpj = cnpj.replace('.','');
            cnpj = cnpj.replace('.','');
            cnpj = cnpj.replace('-','');

            var numeros, digitos, soma, i, resultado, pos, tamanho,
            digitos_iguais;
            digitos_iguais = 1;

            if (cnpj.length < 14 && cnpj.length < 15){
            return false;
            }
            for (i = 0; i < cnpj.length - 1; i++){
            if (cnpj.charAt(i) != cnpj.charAt(i + 1)){
            digitos_iguais = 0;
            break;
            }
            }

            if (!digitos_iguais){
            tamanho = cnpj.length - 2
            numeros = cnpj.substring(0,tamanho);
            digitos = cnpj.substring(tamanho);
            soma = 0;
            pos = tamanho - 7;

            for (i = tamanho; i >= 1; i--){
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2){
                pos = 9;
                }
            }
            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
                if (resultado != digitos.charAt(0)){
                return false;
            }
                tamanho = tamanho + 1;
                numeros = cnpj.substring(0,tamanho);
                soma = 0;
            pos = tamanho - 7;
            for (i = tamanho; i >= 1; i--){
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2){
                pos = 9;
                }
            }
            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
                if (resultado != digitos.charAt(1)){
                return false;
                }
                return true;
                }else{
                    return false;
                }
        }, );

    </script>
    
    <script>

    jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        }, ); 
        
        $(document).ready(function() {
            $.validator.addMethod("strengthPassword", function(value, element, args) {
            return /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])/.test(value);
        }, 
    );
});

        $("#singupOngValidation").validate({
            rules:{
                ong_name:{
                    required:true,
                },
                ong_email:{
                    required:true,
                    email:true,
                },
                cnpj:{
                    required:true,
                    cnpj:true,
                },
                owner:{
                    required:true,
                    lettersonly:true,
                },
                description:{
                    required:true,
                },
                ong_cep:{
                    required:true,
                },
                password:{
                    required:true,
                    minlength:8,
                    strengthPassword:true,

                },
            },
            messages:{
                ong_name: "Este campo é obrigatório",
                ong_email:{
                    required: "Este campo é obrigatório",
                    email: "Informe um e-mail válido",
                },
                cnpj:{
                    required: "Este campo é obrigatório",
                    cnpj: "CNPJ Inválido",

                },
                owner:{
                    required: "Este campo é obrigatório",
                    lettersonly:"Informe apenas caracteres alfabéticos",
                },
                description: "Este campo é obrigatório",
                ong_cep: "Este campo é obrigatório",
                password:{
                    required: "Este campo é obrigatório",
                    minlength: "A senha deve conter ao mínimo 8 caracteres",
                    strengthPassword: "A senha deve conter ao menos 1 letra maiúscula, 1 minúscula, 1 número e 1 caracter especial",
                },

            },
        });

    </script>