<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Configurações</title>
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
                                    <li class="sub-menu-item"><a href="/invitations/ong">Convites de Ongs</a></li>
                                    <li class="sub-menu-item"><a href="/myongs">Ongs que participo</a></li>
                                    
                            </ul>
                        </li>
                        <li class="menu-item menu-item-has-children">
                        <a href="#" class="js-toggle-sub-menu" style="position:relative; padding-left: 50px;">
                                    @if($usuario->user_image == null)
                                            <img src="{{ Vite::asset('resources/img/user-profile.png') }}" alt="{{ $usuario->nome }}" style="width: 32px; height: 32px; position:absolute; top: 20px; left: 10px; border-radius: 50%">
                                    @else
                                            <img src="/img/usuarios/{{$usuario->user_image}}" alt="{{$usuario->user_image}}" style="width: 32px; height: 32px; position:absolute; top: 20px; left: 10px; border-radius: 50%">
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
    
    $('#deleteModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var recipientId = button.data('id');
    console.log(recipientId);

    var modal = $(this);
    modal.find('#usuario_id').val(recipientId);
    })

    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('cidade').value=("");
            document.getElementById('estado').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('estado').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('cidade').value="...";
                document.getElementById('estado').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>

    <!-- ongs section start -->
    <div class="courses-section courses-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-title text-center mb-4">
                        <h2 class="title">Meus dados</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-3">
                    <form enctype="multipart/form-data" action="{{route('atualizarUsuario', ['id'=>$usuario->id])}}" method="post">
        @csrf
        @method('PATCH')


        @if(session()->has('user_updtmsg'))
                    <p class="alert alert-success">
                        {{session()->get('user_updtmsg')}}
                    </p>
        @endif

        @if(session()->has('user_fail_updtmsg'))
                    <p class="alert alert-danger">
                        {{session()->get('user_fail_updtmsg')}}
                    </p>
        @endif
       

        @if(session()->has('notfound_user'))
                    <p class="alert alert-danger">
                        {{session()->get('notfound_user')}}
                    </p>
        @endif

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                    @if($usuario->user_image == null)
                        <img src="{{ Vite::asset('resources/img/user-profile.png') }}" alt="{{ $usuario->nome }}" style="width: 150px; height: 150px; float:left; border-radius: 50%; margin-right: 25px;">
                        <h3 class="title">{{$usuario->nome }} {{$usuario->sobrenome}}</h3>
                            <label for="user_image">Buscar Foto</label>
                            <input type="file" id="user_image" name="user_image" class="form-control-file">
                    @else
                        <img src="/img/usuarios/{{$usuario->user_image}}" alt="{{$usuario->user_image}}" style="width: 150px; height: 150px; float:left; border-radius: 50%; margin-right: 25px;">
                        <h3 class="title">{{$usuario->nome }} {{$usuario->sobrenome}}</h3>
                            <label for="user_image">Buscar Foto</label>
                            <input type="file" id="user_image" name="user_image" class="form-control-file">
                    @endif
            </div>
        </div>

        <br>
        
        

                        <div class="textfield">
                            <label for="cep">{{ __('CEP') }}</label>

                            <div class="textfield">
                                <input id="cep" type="text" class="form-control @error('cep') is-invalid @enderror" name="cep" placeholder="00000-000" value="{{ $usuario->cep }}" onblur="pesquisacep(this.value);" required autocomplete="cep" autofocus>
                            </div>
                        </div>

                        <div class="textfield">
                            <label for="cidade">{{ __('Cidade') }}</label>

                            <div class="textfield">
                                <input id="cidade" type="text" class="form-control @error('cidade') is-invalid @enderror" name="cidade" value="{{ $usuario->cidade }}" readonly required autocomplete="cidade" autofocus>
                            </div>
                        </div>

                        <div class="textfield">
                            <label for="estado">{{ __('Estado') }}</label>

                            <div class="textfield">
                                <input id="estado" type="text" class="form-control @error('estado') is-invalid @enderror" name="estado" value="{{ $usuario->estado }}" readonly required autocomplete="estado" autofocus>
                            </div>
                        </div> 

                        <div class="textfield">
                            <label for="password">{{ __('Nova Senha') }}</label>

                            <div class="textfield">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <br>

            
            <div class="button">
                
                        <button type="submit">Atualizar</button>
                        <button class="delete" style="position: absolute; right: 0;">
                            <a href="" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{$usuario->id}}">
                                Excluir Perfil    
                            </a>
                                            
                        </button>
            </div>
            
        </form>

                </div>
            </div>

            </div>
        </div>
        <!-- ongs section end -->

        <br>

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
<form id="deleteform" method="get" action="{{ route('excluirUsuario', $usuario->id) }}">
    <input type="hidden" name="method" value="DELETE">
      <input type="hidden" name="token" value="{{csrf_token()}}">
       <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center">Você tem certeza que deseja excluir o perfil ?</p>
            </div>
            <input type="hidden" name="usuario_id" id="usuario_id" value="{{$usuario->id}}">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Deletar</button>
            </div>
            </div>
        </div>
    </div>
</form>

