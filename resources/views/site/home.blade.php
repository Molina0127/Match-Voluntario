<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/js/main.js')

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
                            <li class="menu-item"><a href="{{ route('contact') }}">Contato</a></li>
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
                            <h2 class="mb-3">Encontre os melhores projetos e os melhores voluntários em um só lugar</h2>
                            <h1 class="mb-3 text-capitalize">O melhor Website do Voluntariado!</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Laborum repellat ut qui veniam quibusdam tempora?
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

        <!-- fun facts section start -->
        <section class="fun-facts-section">
            <div class="container">
                <div class="box py-2">
                    <div class="row text-center">
                        <div class="col-md-6 col-lg-3">
                            <div class="fun-facts-item">
                                <h2 class="style-1">800+</h2>
                                <p>Números de Voluntários</p>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="fun-facts-item">
                                <h2 class="style-2">200+</h2>
                                <p>Ongs Cadastradas</p>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="fun-facts-item">
                                <h2 class="style-3">10+</h2>
                                <p>Categorias</p>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="fun-facts-item">
                                <h2 class="style-4">30+</h2>
                                <p>Matchs</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- fun facts section end -->

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
                    <div class="col-md-6 col-lg-3">
                        <div class="courses-item">
                            <a href="#" class="link">
                                <div class="courses-item-inner">
                                    <div class="img-box">
                                        <img src="{{ Vite::asset('resources/img/img-ong.jpg') }}" alt="ong imagem">
                                    </div>
                                    <h3 class="title">Ong de ajuda aos indígenas</h3>
                                    <div class="instructor">
                                        <img src="{{ Vite::asset('resources/img/user-pequeno.svg') }}" alt="instrutor imagem">
                                        <span class="instructor-name">Guilherme</span>
                                    </div>
                                    <!-- <div class="rating"></div> -->
                                    <div class="price">$ 49</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- courses item end -->
                
                    <!-- courses item start -->
                    <div class="col-md-6 col-lg-3">
                        <div class="courses-item">
                            <a href="#" class="link">
                                <div class="courses-item-inner">
                                    <div class="img-box">
                                        <img src="{{ Vite::asset('resources/img/img-ong.jpg') }}" alt="ong imagem">
                                    </div>
                                    <h3 class="title">Ong de ajuda aos indígenas</h3>
                                    <div class="instructor">
                                        <img src="{{ Vite::asset('resources/img/user-pequeno.svg') }}" alt="instrutor imagem">
                                        <span class="instructor-name">Luís</span>
                                    </div>
                                    <!-- <div class="rating"></div> -->
                                    <div class="price">$ 49</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- courses item end -->

                    <!-- courses item start -->
                    <div class="col-md-6 col-lg-3">
                        <div class="courses-item">
                            <a href="#" class="link">
                                <div class="courses-item-inner">
                                    <div class="img-box">
                                        <img src="{{ Vite::asset('resources/img/img-ong.jpg') }}" alt="ong imagem">
                                    </div>
                                    <h3 class="title">Ong de ajuda aos indígenas</h3>
                                    <div class="instructor">
                                        <img src="{{ Vite::asset('resources/img/user-pequeno.svg') }}" alt="instrutor imagem">
                                        <span class="instructor-name">Murilo</span>
                                    </div>
                                    <!-- <div class="rating"></div> -->
                                    <div class="price">$ 49</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- courses item end -->

                    <!-- courses item start -->
                    <div class="col-md-6 col-lg-3">
                        <div class="courses-item">
                            <a href="#" class="link">
                                <div class="courses-item-inner">
                                    <div class="img-box">
                                        <img src="{{ Vite::asset('resources/img/img-ong.jpg') }}" alt="ong imagem">
                                    </div>
                                    <h3 class="title">Qualificação de Mulheres</h3>
                                    <div class="instructor">
                                        <img src="{{ Vite::asset('resources/img/user-pequeno.svg') }}" alt="instrutor imagem">
                                        <span class="instructor-name">Katheleen</span>
                                    </div>
                                    <!-- <div class="rating"></div> -->
                                    <div class="price">$ 49</div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- courses item end -->
                
                    <div class="row">
                    <div class="col-12 text-center mt-3">
                        <a href="{{ route('ongs') }}" class="btn btn-theme">Veja Todas as Ongs</a>
                    </div>
                </div>

            </div>
        </section>

        <!-- ongs section end -->

        <!-- testemunhos section start -->
            <div class="testimonials-section section-padding position-relative">
                <div class="decoration-circles d-none d-lg-block">
                    <div class="decoration-circles-item"></div>
                    <div class="decoration-circles-item"></div>
                    <div class="decoration-circles-item"></div>
                    <div class="decoration-circles-item"></div>
                </div>

                <div class="decoration-imgs d-none d-lg-block">
                    <!-- Deve ser colocado uma imagem de decoração -->
                    <img src="{{ Vite::asset('resources/img/Foto-com-fundo-removido-quadrangular2.png') }}" alt="" class="decoration-imgs-item">
                    <img src="{{ Vite::asset('resources/img/Foto-com-fundo-removido-quadrangular2.png') }}" alt="" class="decoration-imgs-item">
                    <img src="{{ Vite::asset('resources/img/Foto-com-fundo-removido-quadrangular2.png') }}" alt="" class="decoration-imgs-item">
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="section-title text-center">
                                <h2 class="title">Voluntários Feedback</h2>
                                <p class="sub-title">Os que os voluntários dizem</p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6">
                            <div class="img-box rounded-circle position-relative">
                                <img src="{{ Vite::asset('resources/img/Foto-com-fundo-removido-quadrangular2.png') }}" class="w-100 js-testimonial-img-rounded-circle" alt="Imagem de Testemunho">
                            </div>

                            <div id="carouselOne" class="carousel slide text-center" data-bs-ride="carousel">
                                <div class="carousel-inner mb-4">
                                    <div class="carousel-item active" data-js-testimonial-img="{{ Vite::asset('resources/img/Foto-com-fundo-removido-quadrangular.png') }}">
                                        <div class="testimonials-item">
                                            <p class="text-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, 
                                            sed consequuntur maiores deserunt dolores atque minima temporibus numquam. 
                                            Voluptatibus, neque!</p>
                                            <h3>Guilherme Molina</h3>
                                            <p class="text-2">Web Developer</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item" data-js-testimonial-img="{{ Vite::asset('resources/img/Foto-com-fundo-removido-quadrangular2.png') }}">
                                        <div class="testimonials-item">
                                                <p class="text-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, 
                                                sed consequuntur maiores deserunt dolores atque minima temporibus numquam. 
                                                Voluptatibus, neque!</p>
                                                <h3>Guilherme Molina</h3>
                                                <p class="text-2">Web Developer</p>
                                            </div>
                                        </div>
                                    <div class="carousel-item" data-js-testimonial-img="{{ Vite::asset('resources/img/Foto-de-perfil-linkedin-recortada.jpeg') }}">
                                        <div class="testimonials-item">
                                            <p class="text-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, 
                                            sed consequuntur maiores deserunt dolores atque minima temporibus numquam. 
                                            Voluptatibus, neque!</p>
                                            <h3>Luís Miguel</h3>
                                            <p class="text-2">Web Developer</p>
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselOne" data-bs-slide="prev">
                                    <i class="fas fa-arrow-left"></i>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselOne" data-bs-slide="next">
                                    <i class="fas fa-arrow-right"></i>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <!-- testemunhos section end -->

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