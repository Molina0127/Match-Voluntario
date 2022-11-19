<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    
    @vite(['resources/js/app.js'])

    <title>Configurações</title>
</head>

<style>

    .error{
        color:red;
        font-weight: 700;
        display: block;
        padding: 6px 0;
        font-size:14px;
    }
    .form-control.error{
        border-color:red;
        padding: .375rem .75rem;

    }
    input.invalid, textarea.invalid{
	border: 2px solid red;
    }

    input.valid, textarea.valid{
        border: 2px solid green;
    }

</style>


<body>

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

    <script>

$('#delModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var recipientId = button.data('id');
    console.log(recipientId);

    var modal = $(this);
    modal.find('#ong_id').val(recipientId);
    })
            function limpa_formulário_cep() {
                    //Limpa valores do formulário de cep.
                    document.getElementById('ong_city').value=("");
                    document.getElementById('ong_state').value=("");
            }

            function meu_callback(conteudo) {
                if (!("erro" in conteudo)) {
                    //Atualiza os campos com os valores.
                    document.getElementById('ong_city').value=(conteudo.localidade);
                    document.getElementById('ong_state').value=(conteudo.uf);
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
                        document.getElementById('ong_city').value="...";
                        document.getElementById('ong_state').value="...";

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
                <form id="editOngValidation" enctype="multipart/form-data" action="{{route('atualizarOng', ['id'=>$ong->id])}}" method="post">
        @csrf
        @method('PATCH')

        
        @if(session()->has('ong_updmsg'))
                    <p class="alert alert-success">
                        {{session()->get('ong_updmsg')}}
                    </p>
        @endif
        
        @if(session()->has('ong_fail_updtmsg'))
                    <p class="alert alert-danger">
                        {{session()->get('ong_fail_updtmsg')}}
                    </p>
        @endif
        

        @if(session()->has('notfound_ong'))
                    <p class="alert alert-danger">
                        {{session()->get('notfound_ong')}}
                    </p>
        @endif

        <br>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if($ong->ong_image == null)
                <img src="{{ Vite::asset('resources/img/img-ong.png') }}" alt="{{ $ong->ong_name }}" style="width: 150px; height: 150px; float:left; border-radius: 50%; margin-right: 25px;">
                <h3 class="title">{{$ong->ong_name}}</h3>
                    <label for="ong_image">Buscar Foto</label>
                    <input type="file" id="ong_image" name="ong_image" class="form-control-file">
                @else
                <img src="{{ asset($ong->ong_image) }}" alt="{{$ong->ong_image}}" style="width: 150px; height: 150px; float:left; border-radius: 50%; margin-right: 25px;">
                <h3 class="title">{{$ong->ong_name}}</h3>
                    <label for="ong_image">Buscar Foto</label>
                    <input type="file" id="ong_image" name="ong_image" class="form-control-file">
                @endif
            </div>
        </div>
        
        <br>
                
    
                        <div class="textfield">
                            <label for="owner">{{ __('Proprietário') }}</label>

                            <div class="textfield">
                                <input id="owner" type="text" class="form-control @error('owner') is-invalid @enderror" name="owner" value="{{ $ong->owner }}" required autocomplete="owner">

                                @error('owner')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <br>

                        <div class="textfield">
                            <label for="description">{{ __('Descrição') }}</label>

                            <div class="textfield">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $ong->description }}" required autocomplete="description">

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <br>

                        <div class="textfield">
                            <label for="ong_cep">{{ __('CEP') }}</label>

                            <div class="textfield">
                                <input id="ong_cep" type="text" class="form-control @error('ong_cep') is-invalid @enderror" name="ong_cep" placeholder="00000-000" onblur="pesquisacep(this.value);" value="{{ $ong->ong_cep }}" required autocomplete="ong_cep">

                                @error('ong_cep')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <br>


                        <div class="textfield">
                            <label for="ong_city">{{ __('Cidade') }}</label>

                            <div class="textfield">
                                <input id="ong_city" type="text" class="form-control @error('ong_city') is-invalid @enderror" name="ong_city" readonly value="{{ $ong->ong_city }}" autocomplete="ong_city">

                                @error('ong_city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <br>

                        <div class="textfield">
                            <label for="ong_state">{{ __('Estado') }}</label>

                            <div class="textfield">
                                <input id="ong_state" type="text" class="form-control @error('ong_state') is-invalid @enderror" name="ong_state" readonly value="{{ $ong->ong_state }}" autocomplete="ong_state">

                                @error('ong_state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <br>

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
                        <br>
            
                    <div class="button">
                        <button type="submit">Atualizar</button>
                            <button class="delete" style="position: absolute; right: 0;">
                            <a href="" data-bs-toggle="modal" data-bs-target="#delModal" data-id="{{$ong->id}}">
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

</body>
</html>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validation-unobtrusive/4.0.0/jquery.validate.unobtrusive.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script type="text/javascript" src="jquery.min.js">

        $('#ong_name').on('input', function() {
            var input=$(this);
            var is_name=input.val();
            if(is_name){input.removeClass("invalid").addClass("valid");}
            else{input.removeClass("valid").addClass("invalid");}
        });
        $('#ong_email').on('input', function() {
            var input=$(this);
            var is_email=input.val();
            if(is_email){input.removeClass("invalid").addClass("valid");}
            else{input.removeClass("valid").addClass("invalid");}
        });
        $('#owner').on('input', function() {
            var input=$(this);
            var is_owner=input.val();
            if(is_owner){input.removeClass("invalid").addClass("valid");}
            else{input.removeClass("valid").addClass("invalid");}
        });
        $('#description').on('input', function() {
            var input=$(this);
            var is_description=input.val();
            if(is_description){input.removeClass("invalid").addClass("valid");}
            else{input.removeClass("valid").addClass("invalid");}
        });
        $('#ong_cep').on('input', function() {
            var input=$(this);
            var is_cep=input.val();
            if(is_cep){input.removeClass("invalid").addClass("valid");}
            else{input.removeClass("valid").addClass("invalid");}
        });
        $('#password').on('input', function() {
            var input=$(this);
            var is_password=input.val();
            if(is_password){input.removeClass("invalid").addClass("valid");}
            else{input.removeClass("valid").addClass("invalid");}
        });

    </script>


    <script type="text/javascript">

        $(document).ready(function(){
            $('#ong_cep').mask('00000-000');

        });

    </script>

    <script>

    jQuery.validator.addMethod("lettersonly", function(value, element) {
                return this.optional(element) || /^[a-z\s]+$/i.test(value);
            }, ); 

    function isPasswordPresent() {
        return $('#password').val().length > 0;
    }

    $(document).ready(function() {
            $.validator.addMethod("strengthPassword", function(value, element, args) {
            return /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})/.test(value);
        }, 
    );
});

$("#editOngValidation").validate({
                rules:{
                    owner:{
                    required:true,
                    lettersonly:true,
                  },
                    description:{
                    required:true,
                  },
                  ong_cep:{
                    required:true,
                  },
                    password:{
                        strengthPassword:{
                            depends:isPasswordPresent,
                            param:true,
                        }
                        
                    }
                },
                messages:{
                    owner:{
                    required: "Este campo é obrigatório",
                    lettersonly:"Informe apenas caracteres alfabéticos",
                   },
                    description: "Este campo é obrigatório",
                    ong_cep: "Este campo é obrigatório",
                    password:{
                        minlength: "A senha deve conter ao mínimo 8 caracteres",
                        strengthPassword:"A senha deve conter 8 caracteres e ao menos 1 letra maiúscula, 1 minúscula, 1 número e 1 caractere especial",
                    },
                },
                
            });



    </script>

<!-- Modal -->
<form id="deleteform" method="get" action="{{ route('excluirOng', $ong->id) }}">
    <input type="hidden" name="method" value="DELETE">
      <input type="hidden" name="token" value="{{csrf_token()}}">
       <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center">Você tem certeza que deseja excluir o perfil ?</p>
            </div>
            <input type="hidden" name="ong_id" id="ong_id" value="{{$ong->id}}">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Deletar</button>
            </div>
            </div>
        </div>
    </div>
</form>