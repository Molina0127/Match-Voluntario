<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Voluntário</title>
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
                                <a href="{{route('showInvitations')}}">
                                    <img src="{{Vite::asset('resources/img/Icone-mensagem.png')}}">
                                    {{App\Models\AdicionaOng::all()->where('status', null)->where('ong_id', Auth::guard('ong')->user(
                                    )->id)->count()}}
                                </a>
                            </li>
                            <li class="menu-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="menu-item menu-item-has-children">
                                <a href="#" class="js-toggle-sub-menu">Voluntários<i class="fas fa-chevron-down"></i></a>
                                <ul class="sub-menu js-sub-menu">
                                    <li class="sub-menu-item"><a href="{{ route('usuarios') }}">Voluntários</a></li>
                                    <li class="sub-menu-item"><a href="/invitations/vol">Convites de Voluntários</a></li>
                                    <li class="sub-menu-item"><a href="/myVolunteers">Meus Voluntários</a></li>
                                    
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children">
                            <a href="#" class="js-toggle-sub-menu" style="position:relative; padding-left: 50px;">
                                @if($ong->ong_image == null)
                                <img src="{{ Vite::asset('resources/img/img-ong.png') }}" alt="{{ $ong->ong_name }}" style="width: 32px; height: 32px; position:absolute; top: 20px; left: 10px; border-radius: 50%">
                                @else
                                <img src="{{ asset($ong->ong_image) }}" alt="{{$ong->ong_image}}" style="width: 32px; height: 32px; position:absolute; top: 20px; left: 10px; border-radius: 50%">
                                @endif    
                                {{auth()->guard('ong')->user()->ong_name}}<i class="fas fa-chevron-down"></i>
                            
                        </a>
                                <ul class="sub-menu js-sub-menu">   
                                <li class="sub-menu-item"><a href="/ong/edit/{{auth()->guard('ong')->user()->id}}">Configurações</a></li>              
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
                    <li class="breadcrumb-item active" aria-current="page">Voluntários</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- breadcrumb end -->

    <script>

        $('#inviteToUsuarioModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var recipientId = button.data('id');
    console.log(recipientId);

    var modal = $(this);
    modal.find('#inviteUsuarioId').val(recipientId);
    
    })

    $('#removeVolModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var recipientId = button.data('id');
    console.log(recipientId);

    var modal = $(this);
    modal.find('#removeVolId').val(recipientId);
    
    })

    </script>

    <!-- ongs section start -->
    <div class="courses-section courses-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-title text-center mb-4">
                        <h2 class="title">Voluntário:</h2>
                        <p class="sub-title">{{$usuario->nome }} {{$usuario->sobrenome}}</p>
                        
                        @if(session()->has('send_to_user'))
                                <p class="alert alert-success">
                                    {{session()->get('send_to_user')}}
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
                                                @if($usuario->user_image == null)
                                                    <img src="{{ Vite::asset('resources/img/user-profile.png') }}" alt="{{ $usuario->nome }}">
                                                @else
                                                    <img src="{{ asset($usuario->user_image) }}" alt="{{$usuario->user_image}}">
                                                @endif
                                            </div>
                                            <h3 class="title">{{$usuario->nome }} {{$usuario->sobrenome}}</h3>
                                            <div class="instructor">
                                            @if($hasOngJoined)                                                
                                                <p class="user-email">{{$usuario->email}}</p>
                                            @else
                                                <div class="fun-facts-item text-left">
                                                        <h6 class="style-3">Ao selecionar um voluntário ele poderá ver seu e-mail e você o dele</h6>
                                                </div>
                                            @endif
                                            <p class="user-city">Cidade:{{$usuario->cidade}}</p>
                                            <p class="user-state">Estado:{{$usuario->estado}}</p>
                                            <p class="user-category">Categoria:{{$usuario_categorias}}</p>
                                            <p class="user-birth">Data de nascimento:{{Carbon\Carbon::parse($usuario->datanasc)->format('d-m-Y')}}</p>
                                            <p class="identifier">CPF:{{$usuario->cpf}}</p>
                                            <p class="ong-participations">{{ count($usuario->ongs) }} Ong(s) que participa</p>
                                            
                                                
                                            </div>  
                                        </div>

                            @if(!$hasOngJoined)
                            
                                <!--<a href="/invite/usuario/{{$usuario->id}}/"
                                class="btn btn-primary">Enviar pedido</a>-->

                                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inviteToUsuarioModal" data-id="{{$usuario->id}}">
                                    Enviar Pedido    
                                </a>

                                @else
                                
                                <!--<form action="/usuario/leave/{{$usuario->id}}">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger delete-btn">
                                        <ion-icon name="trash-outline"></ion-icon>Remover Voluntário
                                    </button>
                                </form>-->

                                <button class="btn btn-danger delete-btn">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#removeVolModal" data-id="{{$usuario->id}}" style="color:white">
                                    Remover Voluntário   
                                    </a>
                                </button>

                            @endif
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
<form id="inviteform" method="get" action="{{ route('invite', $usuario->id) }}">
      <input type="hidden" name="token" value="{{csrf_token()}}">
       <div class="modal fade" id="inviteToUsuarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center">Você tem certeza que deseja enviar o pedido ?</p>
            </div>
            <input type="hidden" name="inviteUsuarioId" id="inviteUsuarioId" value="{{$usuario->id}}">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Enviar</button>
            </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal -->
<form id="removeVolform" method="get" action="{{ route('removeVolunteer', $usuario->id) }}">
      <input type="hidden" name="token" value="{{csrf_token()}}">
       <div class="modal fade" id="removeVolModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center">Você tem certeza que deseja remover este voluntário ?</p>
            </div>
            <input type="hidden" name="removeVolId" id="removeVolId" value="{{$usuario->id}}">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Sim, remover</button>
            </div>
            </div>
        </div>
    </div>
</form>