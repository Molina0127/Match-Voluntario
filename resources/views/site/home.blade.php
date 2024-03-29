<?php use Illuminate\Support\Facades\DB; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    

    <title>Home</title>
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
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <!-- header end -->

        <!-- banner section start -->
        <section class="banner-section d-flex align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="banner-text">
                            <h2 class="mb-3">Encontre as melhores Ongs e os melhores voluntários em um só lugar</h2>
                            <h1 class="mb-3 text-capitalize">O melhor Website do Voluntariado!</h1>
                            <p>Envie pedidos para Ong ou voluntários de seu interesse e ao fazer parte de uma dessas entidades
                               você terá acesso as suas informações de contato
                            </p>
                            <a href="#" class="btn btn-theme">Faça parte dessa ação</a> 
                        </div>
                    </div>
                    <div class="col-md-6 order-first order-md-last mb-5 mb-md-0">
                        <div class="banner-img">
                            <div class="circular-img">
                                <div class="circular-img-inner">
                                    <div class="circular-img-circle"></div>
                                    <img src="{{ Vite::asset('resources/img/Foto-banner-removebg-preview-reduced-200.png') }}" alt="Banner Image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner section end -->


        <!-- ongs section start -->
        <section class="courses-section section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="section-title text-center">
                            <h2 class="title">Ongs</h2>
                            <p class="sub-title">Encontre a Ong certa para você</p>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <!-- courses item start -->
                    @foreach($ongs as $ong)
                    @if(DB::table('ongs')->count() < 10)
                            <div class="col-md-6 col-lg-3">
                                <div class="courses-item">
                                    <a href="#" class="link">
                                        <div class="courses-item-inner">
                                            <div class="img-box">
                                                @if($ong->ong_image == null)
                                                <img src="{{ Vite::asset('resources/img/img-ong.png') }}" alt="{{ $ong->ong_name }}" style="width: 205px; height: 205px;">
                                                @else
                                                <img src="{{ asset($ong->ong_image) }}" alt="{{$ong->ong_image}}" style="width: 205px; height: 205px;">
                                                @endif
                                            </div>
                                            <h3 class="title">{{$ong->ong_name}}</h3>
                                            <div class="instructor">
                                                <img src="{{ Vite::asset('resources/img/user-pequeno.svg') }}" alt="instrutor imagem">
                                                <span class="instructor-name">{{$ong->owner}}</span>
                                            </div>  
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @else 
                            
                            @endif
                            @endforeach
                    <!-- courses item end -->

            </div>
        </section>

        <!-- ongs section end -->

        <!-- torne-se um volunário section start -->
            <div class="bai-section section-padding">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div class="box">
                                <div class="row align-items-center">
                                    <div class="col-md-6 mb-4 m-md-0">
                                        <div class="circular-img">
                                            <div class="circular-img-inner">
                                                <div class="circular-img-circle"></div>
                                                <img src="{{ Vite::asset('resources/img/Foto-com-fundo-removido-quadrangular2.png') }}" alt="bai img">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="section-title m-0">
                                            <h2 class="title">torne-se um voluntário</h2>
                                            <p class="sub-title">Torne-se Um Voluntário</p>
                                        </div>
                                        <a href="{{ route('signup') }}" class="btn btn-theme">Inscreva-se</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        <!-- torne-se um volunário section end -->

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
                
                

        <br><br>

    </div>
    <!-- main wrapper end-->
    

</body>

</html>