<?php use Illuminate\Support\Facades\DB; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Convites de Voluntários</title>
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
                            <a href="#" class="js-toggle-sub-menu">Voluntários<i class="fas fa-chevron-down"></i></a>
                            <ul class="sub-menu js-sub-menu">
                                <li class="sub-menu-item"><a href="{{ route('usuarios') }}">Voluntários</a></li>
                                <li class="sub-menu-item"><a href="/invitations/vol">Convites de Voluntários</a></li>
                                <li class="sub-menu-item"><a href="/myVolunteers">Meus Voluntários</a></li>
                                <li class="sub-menu-item"><a href="{{ route('ongsDetails') }}">Detalhes Ongs</a></li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-has-children">
                            <a href="#" class="js-toggle-sub-menu">{{auth()->guard('ong')->user()->ong_name}}<i class="fas fa-chevron-down"></i></a>
                            <ul class="sub-menu js-sub-menu">
                            <li class="sub-menu-item"><a href="/ong/edit/{{auth()->guard('ong')->user()->id}}">Configurações</a></li>                  
                                   <li class="sub-menu-item">
                                    <div class="" aria-labelledby="navbarDropdown">
                                        <div>
                                        <a class="" href="{{url('logoutOng')}}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Sair') }}
                                        </a>
                                        </div>
                                        

                                        <form id="logout-form" action="{{ route('logoutOng') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
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
                    <li class="breadcrumb-item active" aria-current="page">Voluntários</li>
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
                        <h2 class="title">Convites de Voluntários</h2>
                       
                        @if(session()->has('delRequest'))
                            <p class="alert alert-danger">
                                {{session()->get('delRequest')}}
                            </p>
                        @endif
                        
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="unemployment" role="tabpanel" aria-labelledby="unemployment-tab" tabindex="0">
                        
                        <div class="row justify-content-center">

                            <!-- courses item start -->
                            @if($show->count()> 0)    
                            @foreach($show as $show)
                            <div class="col-md-6 col-lg-3">
                                <div class="courses-item">
                                    <a href="#" class="link">
                                        <div class="courses-item-inner">
                                                    <?php
                                                    
                                                    $check = DB::table('convida_ongs')
                                                    ->where('status',1)->get();
                                                    if($check == true){

                        

                                            ?>
                                            <div class="img-box">
                                               @if($show->user_image == null)
                                                    <img src="{{ Vite::asset('resources/img/user-profile.png') }}" alt="{{ $show->nome }}" style="width: 200px; height: 200px;">
                                                @else
                                                    <img src="/img/usuarios/{{$show->user_image}}" alt="{{$show->user_image}}" style="width: 200px; height: 200px;">
                                                @endif
                                                </div>
                                                <h3 class="title">{{$show->nome }} {{$show->sobrenome}}</h3>
                                                <div class="button">
                                                    <button class="learnMore">
                                                    <a href="/usuario/{{ $show->id }}">
                                                    Saiba mais    
                                                    </a>
                                            
                                                    </button>
                                                </div>

                                                <br>

                                                <div class="instructor">                                                
                                                                                                
                                                <a href="/confirm/vol/{{$show->id}}/" 
                                                class="btn btn-primary">Aceitar pedido</a>

                                                <br>
                                                <br>

                                                <a href="/invitations/del/vol{{$show->id}}/" 
                                                class="btn btn-danger">Recusar pedido</a>
                                                <?php } ?>   
                                            
                                                
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                            @endforeach
                            @else
                                <h5>Nenhum pedido pendente</h5>
                            @endif

                            
                            <!-- courses item end -->




                        </div>

                    </div>

                </div>
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
</html>