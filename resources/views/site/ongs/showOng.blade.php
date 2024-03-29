<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Ong</title>
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
                        <li class="menu-item">
                                <a href="{{route('showUsuarioInvitations')}}">
                                    <img src="{{Vite::asset('resources/img/Icone-mensagem.png')}}">
                                    {{App\Models\AdicionaUsuario::all()->where('status', null)->where('usuario_id', Auth::user(
                                    )->id)->count()}}
                                </a>
                            </li>
                            <li class="menu-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="menu-item menu-item-has-children">
                                <a href="#" class="js-toggle-sub-menu">Ongs<i class="fas fa-chevron-down"></i></a>
                                <ul class="sub-menu js-sub-menu">
                                    <li class="sub-menu-item"><a href="{{ route('ongs') }}">Ongs</a></li>
                                    <li class="sub-menu-item"><a href="/invitations/ong">Convites de Ongs</a></li>
                                    <li class="sub-menu-item"><a href="/myongs">Ongs que participo</a></li>
                                    
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children">
                            <a href="#" class="js-toggle-sub-menu" style="position:relative; padding-left: 50px;">
                                    @if($usuario->user_image == null)
                                            <img src="{{ Vite::asset('resources/img/user-profile.png') }}" alt="{{ $usuario->nome }}" style="width: 32px; height: 32px; position:absolute; top: 20px; left: 10px; border-radius: 50%">
                                    @else
                                            <img src="{{ asset($usuario->user_image) }}" alt="{{$usuario->user_image}}" style="width: 32px; height: 32px; position:absolute; top: 20px; left: 10px; border-radius: 50%">
                                    @endif
                                    {{Auth::user()->nome}}<i class="fas fa-chevron-down"></i>
                            </a>
                                <ul class="sub-menu js-sub-menu">  
                                <li class="sub-menu-item"><a href="/usuario/edit/{{Auth::user()->id}}">Configurações</a></li>               
                                       <li class="sub-menu-item">
                                        <div class="" aria-labelledby="navbarDropdown">
                                            <div>
                                            <a class="" href="{{url('logout')}}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Sair') }}
                                            </a>
                                            </div>
                                            

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
                    <li class="breadcrumb-item active" aria-current="page">Ongs</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- breadcrumb end -->

    <script>

        $('#inviteToOngModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var recipientId = button.data('id');
    console.log(recipientId);

    var modal = $(this);
    modal.find('#inviteOngId').val(recipientId);
    })

    $('#leaveOngModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var recipientId = button.data('id');
    console.log(recipientId);

    var modal = $(this);
    modal.find('#leaveOngId').val(recipientId);
    })

    </script>

    <!-- ongs section start -->
    <div class="courses-section courses-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-title text-center mb-4">
                        <h2 class="title">Ong:</h2>
                        <p class="sub-title">{{$ong->ong_name}}</p>
                        
                        @if(session()->has('send_to_Ong'))
                                                <p class="alert alert-success">
                                                    {{session()->get('send_to_Ong')}}
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
                                                
                                                <br>
                                                <br>
                                                
                                                @if($hasUserJoined)
                                                    <p class="ong-email">{{$ong->ong_email}}</p>
                                                @else 
                                                <div class="fun-facts-item text-left">
                                                    <h6 class="style-3">Ao fazer parte de uma Ong, esta poderá ver seu e-mail e você terá acesso ao dela</h6>
                                                </div>
                                                
                                                @endif
                                                <p class="ong-description">Descrição:{{$ong->description}}</p>
                                                <p class="ong-city">Cidade:{{$ong->ong_city}}</p>
                                                <p class="ong-state">UF:{{$ong->ong_state}}</p>
                                                <p class="category">Categoria:{{$ong_categorias}}</p>
                                                <p class="ong-volunteers">{{ count($ong->usuarios) }} Voluntários</p>
                                                
                                            </div>
                                            
                                             @if(!$hasUserJoined)
                                                <!--<a href="/invite/ong/{{$ong->id}}/" 
                                                class="btn btn-primary">Enviar pedido</a>-->
                                                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inviteToOngModal" data-id="{{$ong->id}}">
                                                   Enviar Pedido    
                                                </a>

                                            @else

                                                <!--<form action="/ong/leave/{{$ong->id}}">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-danger delete-btn">
                                                    <ion-icon name="trash-outline"></ion-icon>Remover participação da Ong
                                                </button>
                                            </form>-->

                                        <button class="btn btn-danger delete-btn">
                                            <a href="" data-bs-toggle="modal" data-bs-target="#leaveOngModal" data-id="{{$ong->id}}" style="color:white">
                                            Remover participação   
                                            </a>
                                        </button>

                                            @endif  
                                        </div>
                                    </a>
                                </div>
                            </div>
                            
                            <!-- courses item end -->




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

<!-- Modal -->
<form id="inviteform" method="get" action="{{ route('sendInvite', $ong->id) }}">
      <input type="hidden" name="token" value="{{csrf_token()}}">
       <div class="modal fade" id="inviteToOngModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center">Você tem certeza que deseja enviar o pedido ?</p>
            </div>
            <input type="hidden" name="inviteOngId" id="inviteOngId" value="{{$ong->id}}">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Enviar</button>
            </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal -->
<form id="leaveOngform" method="get" action="{{ route('leaveOngParticipation', $ong->id) }}">
      <input type="hidden" name="token" value="{{csrf_token()}}">
       <div class="modal fade" id="leaveOngModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center">Você tem certeza que deseja sair desta Ong ?</p>
            </div>
            <input type="hidden" name="leaveOngId" id="leaveOngId" value="{{$ong->id}}">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Sim, remover</button>
            </div>
            </div>
        </div>
    </div>
</form>