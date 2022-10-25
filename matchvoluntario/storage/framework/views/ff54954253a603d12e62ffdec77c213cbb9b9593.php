<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <title>Ongs</title>
</head>
<body>

    <!-- main wrapper start -->
    <div class="main-wrapper">

    <!-- header start -->
        <header class="header">
            <div class="container">
                <div class="header-main d-flex justify-content-between align-items-center">
                    <div class="header-logo">
                        <a href="<?php echo e(route('home')); ?>"><span>match</span>voluntario</a>
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
                            <li class="menu-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li class="menu-item menu-item-has-children">
                                <a href="#" class="js-toggle-sub-menu">Ongs<i class="fas fa-chevron-down"></i></a>
                                <ul class="sub-menu js-sub-menu">
                                    <li class="sub-menu-item"><a href="<?php echo e(route('ongs')); ?>">Ongs</a></li>
                                    <li class="sub-menu-item"><a href="<?php echo e(route('ongsDetails')); ?>">Detalhes Ongs</a></li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children">
                                <a href="#" class="js-toggle-sub-menu">Pages<i class="fas fa-chevron-down"></i></a>
                                <ul class="sub-menu js-sub-menu">
                                    <li class="sub-menu-item"><a href="<?php echo e(route('login')); ?>">Login</a></li>
                                    <li class="sub-menu-item"><a href="<?php echo e(route('signup')); ?>">Cadastre-se</a></li>
                                </ul>
                            </li>
                            <li class="menu-item"><a href="<?php echo e(route('contact')); ?>">Contato</a></li>
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
                    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ongs</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- ongs section start -->
    <div class="courses-section courses-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-title text-center mb-4">
                        <h2 class="title">Ongs</h2>
                        <p class="sub-title">Encontre a Ong certa para você</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                <nav>
                    <div class="nav nav-tabs border-0 justify-content-center mb-4" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="unemployment-tab" data-bs-toggle="tab" data-bs-target="#unemployment" type="button" role="tab" aria-controls="unemployment" aria-selected="true">Desemprego</button>
                        <button class="nav-link" id="environment-tab" data-bs-toggle="tab" data-bs-target="#environment" type="button" role="tab" aria-controls="environment" aria-selected="false">Meio Ambiente</button>
                        <button class="nav-link" id="animal-tab" data-bs-toggle="tab" data-bs-target="#animal" type="button" role="tab" aria-controls="animal" aria-selected="false">Animais</button>
                    </div>

                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="unemployment" role="tabpanel" aria-labelledby="unemployment-tab" tabindex="0">
                        
                        <div class="row justify-content-center">

                            <!-- courses item start -->
                            <div class="col-md-6 col-lg-3">
                                <div class="courses-item">
                                    <a href="#" class="link">
                                        <div class="courses-item-inner">
                                            <div class="img-box">
                                                <img src="<?php echo e(Vite::asset('resources/img/img-ong.jpg')); ?>" alt="ong imagem">
                                            </div>
                                            <h3 class="title">Ong de ajuda aos indígenas</h3>
                                            <div class="instructor">
                                                <img src="<?php echo e(Vite::asset('resources/img/user-pequeno.svg')); ?>" alt="instrutor imagem">
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
                                                <img src="<?php echo e(Vite::asset('resources/img/img-ong.jpg')); ?>" alt="ong imagem">
                                            </div>
                                            <h3 class="title">Ong de ajuda aos indígenas</h3>
                                            <div class="instructor">
                                                <img src="<?php echo e(Vite::asset('resources/img/user-pequeno.svg')); ?>" alt="instrutor imagem">
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
                                                <img src="<?php echo e(Vite::asset('resources/img/img-ong.jpg')); ?>" alt="ong imagem">
                                            </div>
                                            <h3 class="title">Ong de ajuda aos indígenas</h3>
                                            <div class="instructor">
                                                <img src="<?php echo e(Vite::asset('resources/img/user-pequeno.svg')); ?>" alt="instrutor imagem">
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
                                                <img src="<?php echo e(Vite::asset('resources/img/img-ong.jpg')); ?>" alt="ong imagem">
                                            </div>
                                            <h3 class="title">Ong de ajuda aos indígenas</h3>
                                            <div class="instructor">
                                                <img src="<?php echo e(Vite::asset('resources/img/user-pequeno.svg')); ?>" alt="instrutor imagem">
                                                <span class="instructor-name">Guilherme</span>
                                            </div>
                                            <!-- <div class="rating"></div> -->
                                            <div class="price">$ 49</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!-- courses item end -->

                        </div>

                    </div>

                    <div class="tab-pane fade" id="environment" role="tabpanel" aria-labelledby="environment-tab" tabindex="0">
                        
                        <div class="row justify-content-center">

                            <!-- courses item start -->
                            <div class="col-md-6 col-lg-3">
                                <div class="courses-item">
                                    <a href="#" class="link">
                                        <div class="courses-item-inner">
                                            <div class="img-box">
                                                <img src="<?php echo e(Vite::asset('resources/img/img-ong.jpg')); ?>" alt="ong imagem">
                                            </div>
                                            <h3 class="title">Ong de ajuda aos indígenas</h3>
                                            <div class="instructor">
                                                <img src="<?php echo e(Vite::asset('resources/img/user-pequeno.svg')); ?>" alt="instrutor imagem">
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
                                                <img src="<?php echo e(Vite::asset('resources/img/img-ong.jpg')); ?>" alt="ong imagem">
                                            </div>
                                            <h3 class="title">Ong de ajuda aos indígenas</h3>
                                            <div class="instructor">
                                                <img src="<?php echo e(Vite::asset('resources/img/user-pequeno.svg')); ?>" alt="instrutor imagem">
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
                                                <img src="<?php echo e(Vite::asset('resources/img/img-ong.jpg')); ?>" alt="ong imagem">
                                            </div>
                                            <h3 class="title">Ong de ajuda aos indígenas</h3>
                                            <div class="instructor">
                                                <img src="<?php echo e(Vite::asset('resources/img/user-pequeno.svg')); ?>" alt="instrutor imagem">
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
                                                <img src="<?php echo e(Vite::asset('resources/img/img-ong.jpg')); ?>" alt="ong imagem">
                                            </div>
                                            <h3 class="title">Ong de ajuda aos indígenas</h3>
                                            <div class="instructor">
                                                <img src="<?php echo e(Vite::asset('resources/img/user-pequeno.svg')); ?>" alt="instrutor imagem">
                                                <span class="instructor-name">Guilherme</span>
                                            </div>
                                            <!-- <div class="rating"></div> -->
                                            <div class="price">$ 49</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!-- courses item end -->

                        </div>

                    </div>

                    <div class="tab-pane fade" id="animal" role="tabpanel" aria-labelledby="animal-tab" tabindex="0">
                        
                        <div class="row justify-content-center">

                            <!-- courses item start -->
                            <div class="col-md-6 col-lg-3">
                                <div class="courses-item">
                                    <a href="#" class="link">
                                        <div class="courses-item-inner">
                                            <div class="img-box">
                                                <img src="<?php echo e(Vite::asset('resources/img/img-ong.jpg')); ?>" alt="ong imagem">
                                            </div>
                                            <h3 class="title">Ong de ajuda aos indígenas</h3>
                                            <div class="instructor">
                                                <img src="<?php echo e(Vite::asset('resources/img/user-pequeno.svg')); ?>" alt="instrutor imagem">
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
                                                <img src="<?php echo e(Vite::asset('resources/img/img-ong.jpg')); ?>" alt="ong imagem">
                                            </div>
                                            <h3 class="title">Ong de ajuda aos indígenas</h3>
                                            <div class="instructor">
                                                <img src="<?php echo e(Vite::asset('resources/img/user-pequeno.svg')); ?>" alt="instrutor imagem">
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
                                                <img src="<?php echo e(Vite::asset('resources/img/img-ong.jpg')); ?>" alt="ong imagem">
                                            </div>
                                            <h3 class="title">Ong de ajuda aos indígenas</h3>
                                            <div class="instructor">
                                                <img src="<?php echo e(Vite::asset('resources/img/user-pequeno.svg')); ?>" alt="instrutor imagem">
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
                                                <img src="<?php echo e(Vite::asset('resources/img/img-ong.jpg')); ?>" alt="ong imagem">
                                            </div>
                                            <h3 class="title">Ong de ajuda aos indígenas</h3>
                                            <div class="instructor">
                                                <img src="<?php echo e(Vite::asset('resources/img/user-pequeno.svg')); ?>" alt="instrutor imagem">
                                                <span class="instructor-name">Guilherme</span>
                                            </div>
                                            <!-- <div class="rating"></div> -->
                                            <div class="price">$ 49</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!-- courses item end -->

                        </div>


                    </div>

                    <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">...</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-3">
                    <!-- pagination start -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <i class="fas fa-chevron-left"></i>

                            </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">10</a></li>
                            <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">

                                <i class="fas fa-chevron-right"></i>
                            </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- pagination end -->
                </div>
            </div>
        </div>
    </div>
    <!-- ongs section end -->

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

</html><?php /**PATH D:\Desktop\Match Voluntario\matchvoluntario\resources\views/site/ongs/ongs.blade.php ENDPATH**/ ?>