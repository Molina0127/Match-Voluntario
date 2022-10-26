<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <title>Cadastre-se</title>
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
                        <form class="form" action="">
                                <div class="signup-form box first">
                                    <h2 class="form-title text-center">Cadastre-se</h2>
                                    
                                        <div class="form-group">
                                            
                                            <div class="form-sub-group">
                                                <input type="text" class="form-control" placeholder="Nome">
                                                <input type="text" class="form-control" placeholder="Sobrenome">
                                            </div>                                

                                            <input type="email" class="form-control" placeholder="Email">
                            
                                        </div>

                                        <div class="form-group">    
                                            <!-- <div class="d-flex mb-2 justify-content-end"><a href="#">Esqueceu sua senha?</a></div> -->
                                            <div class="form-sub-group">
                                                <input type="password" class="form-control" placeholder="Senha">
                                                <input type="password" class="form-control" placeholder="Confirmar Senha">
                                            </div>
                                        </div>

                                        <!-- <div class="form-group">    
                                            <div class="d-flex mb-2 justify-content-end"><a href="#">Esqueceu sua senha?</a></div>
                                            <div class="form-sub-group">
                                                <input type="text" class="form-control" placeholder="CEP">
                                                <input type="text" class="form-control" placeholder="Cidade">
                                                <input type="text" class="form-control" placeholder="UF">
                                            </div>
                                        </div> -->

                                        <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-theme btn-form col-lg-4 nextBtn">Avançar</button>
                                            <!-- <p class="text-center mt-4 mb-0">Não possui conta ? <a href="<?php echo e(route('signup')); ?>">Cadastre-se</a></p> -->
                                        </div>
                                </div>
                                
                                <div class="signup-form box second">
                                    <h2 class="form-title text-center">Cadastre-se</h2>
                        
                                <div class="form-group">
                                    
                                    <div class="form-sub-group">
                                        <input type="text" class="form-control" placeholder="Cidade">
                                        <input type="text" class="form-control" placeholder="Estado">
                                        <input type="text" class="form-control" placeholder="CEP">
                                    </div>                                
                    
                                </div>

                                <div class="form-group">    
                                    <!-- <div class="d-flex mb-2 justify-content-end"><a href="#">Esqueceu sua senha?</a></div> -->
                                    <div class="form-sub-group">
                                        <input type="date" class="form-control" placeholder="dd/mm/aaaa">
                                        <input type="text" class="form-control" placeholder="CPF">
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                    <label>Gênero</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Masculino
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Feminino
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Outro
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Prefiro não dizer
                                        </label>
                                    </div>
                                </div>
                                

                                <!-- <div class="form-group">    
                                    <div class="d-flex mb-2 justify-content-end"><a href="#">Esqueceu sua senha?</a></div>
                                    <div class="form-sub-group">
                                        <input type="text" class="form-control" placeholder="CEP">
                                        <input type="text" class="form-control" placeholder="Cidade">
                                        <input type="text" class="form-control" placeholder="UF">
                                    </div>
                                </div> -->

                                <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-theme btn-form col-lg-4 backBtn">Voltar</button>
                                <button type="submit" class="btn btn-theme btn-form col-lg-4 nextBtn">Avançar</button>
                                    <!-- <p class="text-center mt-4 mb-0">Não possui conta ? <a href="<?php echo e(route('signup')); ?>">Cadastre-se</a></p> -->
                                </div>
                        </form>  
                    </div>



                    <!-- col-md-7 col-lg-6 col-xl-5 -->
                    <!-- <div class="signup-form box">
                        <h2 class="form-title text-center">Cadastre-se</h2>
                        <form action="">
                            <div class="form-group">
                                
                                <div class="form-sub-group">
                                    <input type="text" class="form-control" placeholder="Cidade">
                                    <input type="text" class="form-control" placeholder="Estado">
                                    <input type="text" class="form-control" placeholder="CEP">
                                </div>                                
                
                            </div>

                            <div class="form-group">    
                                <div class="d-flex mb-2 justify-content-end"><a href="#">Esqueceu sua senha?</a></div>
                                <div class="form-sub-group">
                                    <input type="date" class="form-control" placeholder="dd/mm/aaaa">
                                    <input type="text" class="form-control" placeholder="CPF">
                                </div>
                            </div>

                             
                            <div class="form-group">
                                <label>Gênero</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Masculino
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Feminino
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Outro
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Prefiro não dizer
                                    </label>
                                </div>
                            </div>
                            

                            <div class="form-group">    
                                <div class="d-flex mb-2 justify-content-end"><a href="#">Esqueceu sua senha?</a></div>
                                <div class="form-sub-group">
                                    <input type="text" class="form-control" placeholder="CEP">
                                    <input type="text" class="form-control" placeholder="Cidade">
                                    <input type="text" class="form-control" placeholder="UF">
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                               <button type="submit" class="btn btn-theme btn-form col-lg-4 backBtn">Voltar</button>
                               <button type="submit" class="btn btn-theme btn-form col-lg-4 nextBtn">Avançar</button>
                                <p class="text-center mt-4 mb-0">Não possui conta ? <a href="<?php echo e(route('signup')); ?>">Cadastre-se</a></p>
                            </div>
                            
                        </form>
                        
                    </div> -->

                </div>
            </div>
        </div>
    </section>
    <!-- signup section end -->

    


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

</html><?php /**PATH D:\Desktop\Match Voluntario\matchvoluntario\resources\views/site/signup.blade.php ENDPATH**/ ?>