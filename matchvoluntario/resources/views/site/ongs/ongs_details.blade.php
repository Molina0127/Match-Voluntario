<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Detalhes Ong</title>
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
                                    <li class="sub-menu-item"><a href="{{ route('ongsDetails') }}">Detalhes Ongs</a></li>
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
                    <li class="breadcrumb-item"><a href="{{ route('ongs') }}">Ongs</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detalhes da Ong</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- ong details section start -->
    <div class="course-details section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- ong header start -->
                    <div class="course-header box">
                        <h2 class="text-capitalize">Sampa Verde</h2>
                        
                        <ul>
                            <li>Voluntários Inscritos - <span>15</span></li>
                            <li>Criado por - <span>Guilherme</span></li>
                            <li>Última ação - <span></span>23/02/2022</li>
                            <li>Categoria - <span></span>Meio Ambiente</li>
                        </ul>

                    </div>    
                    <!-- ong header end -->

                    <!-- ong tabs start -->

                    <nav class="course-tabs">
                        <div class="nav nav-tabs border-0" id="nav-tab" role="tablist">
                            <button class="nav-link" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Descrição</button>
                            <button class="nav-link active" id="projects-tab" data-bs-toggle="tab" data-bs-target="#projects" type="button" role="tab" aria-controls="projects" aria-selected="false">Projetos</button>
                            <button class="nav-link" id="owner-tab" data-bs-toggle="tab" data-bs-target="#owner" type="button" role="tab" aria-controls="owner" aria-selected="false">Proprietário</button>
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contato</button>
                        </div>
                    </nav>

                    <!-- ong tabs end -->

                    <!-- tab panes start -->

                    <div class="tab-content" id="nav-tabContent">
                        
                        <!-- description start -->
                        <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab" tabindex="0">
                            <div class="course-description box">
                                <h3 class="text-capitalize mb-4">Descrição</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Nobis ipsa eligendi reiciendis consequuntur temporibus aspernatur ut vero tempore.
                                Sequi quis repudiandae voluptate molestiae expedita repellendus nemo facilis cumque nostrum hic!</p>
                                <h4>Qual o objetivo dessa ong?</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Nobis ipsa eligendi reiciendis consequuntur temporibus aspernatur ut vero tempore.
                                Sequi quis repudiandae voluptate molestiae expedita repellendus nemo facilis cumque nostrum hic!</p>
                                <h4>Como operamos atualmente?</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Nobis ipsa eligendi reiciendis consequuntur temporibus aspernatur ut vero tempore.
                                Sequi quis repudiandae voluptate molestiae expedita repellendus nemo facilis cumque nostrum hic!</p>
                                
                            </div>
                        </div>
                        <!-- description end -->

                        <!-- projects start -->
                        <div class="tab-pane fade show active" id="projects" role="tabpanel" aria-labelledby="projects-tab" tabindex="0">
                            <div class="course-reviews box">
                                Hello
                            </div>
                        </div>
                        <!-- projects end -->

                        <!-- owner start -->
                        <div class="tab-pane fade" id="owner" role="tabpanel" aria-labelledby="owner-tab" tabindex="0">
                            <div class="course-instructor box">
                                <h3 class="mb-3 text-capitalize">Proprietário</h3>
                                <div class="instructor-details">
                                    <div class="details-wrap d-flex align-items-center flex-wrap">
                                        <div class="left-box me-4">
                                            <div class="img-box">
                                                <img src="{{ Vite::asset('resources/img/Foto-de-perfil-linkedin-recortada.jpeg') }}" class="rounded-circle" alt="owner img">
                                            </div>
                                        </div>
                                        <div class="right-box">
                                            <h4>Guilherme <span>(Ambientalista)</span> </h4>
                                            <ul>
                                                <li><i class="fas fa-user"></i>+8 anos ajudando o meio ambiente</li>
                                                <li><i class="fas fa-certificate"></i>Revitalizou +80 praças e parques</li>
                                                <li><i class="fas fa-book"></i>Economia - USP</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis qui tempora, 
                                        est temporibus odio, minima iure hic ad culpa ut esse commodi dolores nam magnam a, 
                                        quis recusandae eligendi nihil. Optio eveniet temporibus nulla consequuntur at consectetur nemo corporis 
                                        aliquam rem provident nihil omnis, officia dolor ex blanditiis iure dolorem.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- owner end -->
                    
                        <!-- contact start -->
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                            Contato
                        </div>
                        <!-- contact end -->

                    </div>

                    <!-- tab panes end -->



                </div>

                <div class="col-lg-4">
                    <!-- ong sidebar start -->
                    <div class="course-sidebar box">
                        <div class="img-box position-relative" data-bs-toggle="modal" data-bs-target="#video-modal">
                            <img src="{{ Vite::asset('resources/img/Foto-com-fundo-removido-quadrangular.png') }}" class="w-100" alt="ong image">
                            <div class="play-icon">
                                <i class="fas fa-play"></i>
                            </div>
                            <p class="text-center">Apresentação da Ong</p>
                        </div>
                        
                        <div class="btn-wrap">
                            <button type="button" class="btn btn-theme btn-block">Quero ser voluntário</button>
                        </div>
                        
                    </div>
                    <!-- ong sidebar end -->
                </div>

            </div>
        </div>
    </div>
    <!-- ong details section end -->

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

    <!-- ong preview modal start -->
    <div class="modal fade video-modal js js-course-preview-modal" id="video-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="ratio ratio-16x9">
                        <video controls class="js-course-preview-video">
                            <source src= "{{ Vite::asset('resources/video/video.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ong preview modal end --> 


    </div>
    <!-- main wrapper end-->


</body>

</html>