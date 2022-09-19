<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <title>Document</title>
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
                                    <li class="sub-menu-item"><a href="#">Ongs</a></li>
                                    <li class="sub-menu-item"><a href="#">Detalhes Ongs</a></li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children">
                                <a href="#" class="js-toggle-sub-menu">Pages<i class="fas fa-chevron-down"></i></a>
                                <ul class="sub-menu js-sub-menu">
                                    <li class="sub-menu-item"><a href="#">Login</a></li>
                                    <li class="sub-menu-item"><a href="#">Cadastre-se</a></li>
                                </ul>
                            </li>
                            <li class="menu-item"><a href="#">Contato</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <!-- header end -->

        <!-- banner section start -->
        <section class="banner-section d-flex align-items-center">
            <div class="container bg-info">
                <div class="row">
                    <div class="col-md-6 bg-primary">
                        <div class="banner-text">
                            <h2>Encontre os melhores projetos e os melhores voluntários em um só lugar</h2>
                            <h1>O melhor Website do Voluntariado!</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Laborum repellat ut qui veniam quibusdam tempora?
                            </p>
                            <a href="#" class="btn btn-theme">Faça parte dessa ação</a> 
                        </div>
                    </div>
                    <div class="col-md-6">
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

    </div>
    <!-- main wrapper end-->
    

</body>

</html>