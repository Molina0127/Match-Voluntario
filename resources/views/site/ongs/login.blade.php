<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Login</title>
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
                    <li class="breadcrumb-item active" aria-current="page">Log In</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- login section start -->
    <section class="login-section section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-6 col-xl-5">
                    <div class="login-form box">
                        <h2 class="form-title text-center">Login</h2>
                        <form id="loginOngValidation" action="{{route('authOng')}}" method="post">
                            @if(Session::get('fail'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail') }}
                                </div>
                            @endif
                            
                            @csrf
                        <div class="form-group">
                            <label for="ong_email">E-mail</label>
                            <input type="email" class="form-control" name="ong_email" placeholder="ong@email.com" value="{{ old ('ong_email') }}">
                            <span class="text-danger">@error ('ong_email') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" id="ong-password" name="password" placeholder="Digite aqui" value="{{ old ('password') }}">
                            <i class="fa-solid fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>
                                <script>
                                 var state= false;
                                 function toggle(){
                                    if(state){
                                        document.getElementById(
                                            "ong-password"
                                        ).setAttribute("type", "password");
                                        document.getElementById(
                                            "eye").style.color="#7a797e";
                                        state = false; 
                                    }
                                    else {
                                        document.getElementById(
                                            "ong-password"
                                        ).setAttribute("type", "text");
                                        document.getElementById(
                                            "eye").style.color="#5887ef";
                                        state = true;
                                    }
                                 }
                                </script>
                            <span class="text-danger">@error ('password') {{$message}} @enderror</span>
                        </div>

                            <button type="submit" class="btn btn-theme btn-block btn-form">log in</button>

                            <br>
                            <br>

                            <a class="d-flex mb-2 justify-content-center" href="">Esqueceu a Senha?</a>
                            <p class="text-center mt-4 mb-0">Não possui conta ? <a href="{{ route('createOng') }}">Cadastre-se</a></p>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login section end -->

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

    <script type="text/javascript" src="jquery.min.js">

    $('#ong_email').on('input', function() {
            var input=$(this);
            var is_email=input.val();
            if(is_email){input.removeClass("invalid").addClass("valid");}
            else{input.removeClass("valid").addClass("invalid");}
        });
        $('#password').on('input', function() {
            var input=$(this);
            var is_password=input.val();
            if(is_password){input.removeClass("invalid").addClass("valid");}
            else{input.removeClass("valid").addClass("invalid");}
        });

    </script>
    
    <script>


$(document).ready(function() {
            $.validator.addMethod("strengthPassword", function(value, element, args) {
            return /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])/.test(value);
        }, 
    );
});

    $("#loginOngValidation").validate({
                rules:{
                    ong_email:{
                        required:true,
                        email:true,
                    },
                    password:{
                        required:true,
                        strengthPassword:true,  
                    },
                },
                messages:{
                    ong_email:{
                        required: "Este campo é obrigatório",
                        email: "Informe um e-mail váido",
                    },
                    password:{
                        required: "Este campo é obrigatório",
                        minlength: "A senha deve conter ao mínimo 8 caracteres",
                        strengthPassword:"A senha deve conter ao menos 1 letra maiúscula, 1 minúscula, 1 número e 1 caractere especial",
                    },
                },
                
            });   

    </script>