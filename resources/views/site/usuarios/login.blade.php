<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Login</title>
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
                        <form action="{{route('authUsuario')}}" method="post">
                            
                            @if(Session::get('fail'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail') }}
                                </div>
                            @endif

                            @if(session()->has('user_excludemsg'))
                                <p class="alert alert-danger">
                                    {{session()->get('user_excludemsg')}}
                                </p>
                            @endif
                            
                            @csrf
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" name="email" placeholder="Digite aqui" value="{{ old ('email') }}">
                                <span class="text-danger">@error ('email') {{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="password">Senha</label>
                                <input type="password" class="form-control" name="password" placeholder="Digite aqui" value="{{ old ('password') }}">
                                <span class="text-danger">@error ('password') {{$message}} @enderror</span>
                            </div>
                            

                            <button type="submit" class="btn btn-theme btn-block btn-form">log in</button>
                            
                            <br>
                            <br>
                            
                            <a class="d-flex mb-2 justify-content-center" href="{{route('forget-password')}}">Esqueceu a Senha?</a>
                            <p class="text-center mt-4 mb-0">Não possui conta ? <a href="{{ route('signup') }}">Cadastre-se</a></p>
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