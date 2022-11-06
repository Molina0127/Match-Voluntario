<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Contato</title>
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
                                    <li class="sub-menu-item"><a href="{{ route('ongs') }}">Ongs</a></li>
                                    
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children">
                                <a href="#" class="js-toggle-sub-menu">Pages<i class="fas fa-chevron-down"></i></a>
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
                    <li class="breadcrumb-item active" aria-current="page">Contato</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- contact section start -->
    <div class="contact-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-title">
                        <div class="sub-title">
                            Entre em contato
                        </div>
                    </div>
                    <div class="contact-items">
                        <div class="contact-item">
                            <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                            <h3>Endereço</h3>
                            <p>Endereço</p>
                        </div>
                        <div class="contact-item">
                            <div class="icon-box"><i class="fas fa-phone"></i></div>
                            <h3>Telefone</h3>
                            <p>(XX)90009-0987</p>
                        </div>
                        <div class="contact-item">
                            <div class="icon-box"><i class="fas fa-envelope"></i></div>
                            <h3>Email</h3>
                            <p>(XX)90009-0987</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form box">
                        <h2 class="form-title text-center">
                            Deixe uma mensagem
                        </h2>
                        <form action="">
                            <div class="form-group">
                               <input type="text" class="form-control" placeholder="Nome">
                            </div>
                            <div class="form-group">
                               <input type="text" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                               <input type="text" class="form-control" placeholder="Telefone">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Mensagem"></textarea>
                            </div>
                            <button type="submit" class="btn btn-block btn-theme btn-form">Enviar Mensagem</button>                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact section end -->

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