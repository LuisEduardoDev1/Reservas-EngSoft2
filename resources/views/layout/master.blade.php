<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        #usr{
            margin-right: 20px;
        }
        #login{
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin: 0 auto;
            height: 60vh;
        }
        .custom-btn {
            border-radius: 20px; /* Bordas arredondadas */
            padding: 15px 20px; /* Padding maior */
            font-size: 16px; /* Tamanho da fonte */
            transition: transform 0.3s, box-shadow 0.3s; /* Efeito de transição */
        }

        .custom-btn:hover {
            transform: translateY(-5px); /* Efeito de levitar */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Sombra */
        }
        #cadastro{
            width: 70%;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 70vh;
        }
        nav{
            background-color: #bbb;            
        }
        .dropdown-menu{
            margin-right: 20px;
        }
        .btn-custom{
            color: white;
        }
        .btn-custom:hover{
            color: white;
        }
        .nome{
            display: flex;
            justify-content: space-between;
        }
        .nome div{
            width: 49%;
        }

        #alertas{
            justify-content: center;
            width: 50%;
            margin: 0 auto;
        }

        /*Página inicial*/
        section.hero {
            color: rgb(0, 0, 0);
            text-align: center;
            padding: 50px 20px;
        }
        .hero h1 {
            font-size: 48px;
        }
        section.features {
            display: flex;
            justify-content: space-around;
            margin: 40px 0;
            padding: 20px;
            color: white;
        }
        .feature {
            width: 30%;
            background-color: #007bff;
            text-align: center;
            padding: 20px;
            border-radius: 8px;
        }
        .feature i {
            font-size: 48px;
            margin-bottom: 10px;
        }
        /*fim pagina inicial*/

        
        @media(max-height:700px){
            #cadastro{
                height: 100vh;
                padding-bottom: 50px;
            }
            section.hero{
                margin-top: 0px;
            }
            #logo{
                margin-top: 20px;
                width: 70px;
            }
        }
        @media(max-height:600px){
            section.hero{
                margin-top: 0px;
                padding: 20px;
            }
        }
        @media(max-width:750px){
            section.features{
                flex-direction: column;
                justify-content: center;
                align-items: center;
                margin: 10px 0;
            }
            .feature{
                width: 80%;
                margin-bottom: 15px;
            }
            section.hero{
                margin-top: 0px;
                padding: 20px;
            }
        }

        @media(max-height:470px){
            #cadastro{
                margin-top: 70px;
            }
        }

        #popup{
            width: 50%;
        }
        @media screen and (max-width: 600px) {
            #popup {
                width: 90%;
            }
        }
        dialog::backdrop{
            background-color: rgb(0 0 0/ .6);
        }

        .custom-btn {
            border-radius: 20px; /* Bordas arredondadas */
            padding: 15px 20px; /* Padding maior */
            font-size: 16px; /* Tamanho da fonte */
            transition: transform 0.3s, box-shadow 0.3s; /* Efeito de transição */
        }

        .custom-btn:hover {
            transform: translateY(-5px); /* Efeito de levitar */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Sombra */
        }
        #prefpro{
            width: 70%;
            margin: 0 auto;
        }

        #reservaAprovada{
            background-color: rgb(175, 255, 175)
        }

        #reservaCancelada{
            background-color: rgb(255, 175, 175)
        }

        #popup{
            border-style: none;
            border-radius: 10px;
            box-shadow: #000000 0px 0px 6px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container-fluid">
        <b><a class="navbar-brand" href="{{route('inicio')}}">Inicio</a></b>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                    @if (Auth::user()->tipo == 5)
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('PreReservaSalas')}}">Solicitações</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('PrefReservasAprovadas')}}">Reservas</a>
                        </li>
                        <div class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Salas
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('PrefCadastroSalas') }}">
                                    Cadastrar nova
                                </a>
                                <a class="dropdown-item" aria-current="page" href="{{route('ShowSalas')}}">Cadastradas</a>
                            </div>
                        </div>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('calendario')}}">Calendário</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('ShowSalas')}}">Salas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('calendario')}}">Calendário</a>
                        </li>
                    @endif
                @endauth
                
                @auth
                    @if (Auth::user()->tipo == 3)
                    <div class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Equipamentos
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('DirCadastroEquipamentos') }}">
                                 Cadastrar novo
                            </a>
                            <a class="dropdown-item" aria-current="page" href="{{route('ShowEquipamentos')}}">Cadastrados</a>
                        </div>
                    </div>
                    @elseif (Auth::user()->tipo == 2)
                    <div class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Reservas
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('MinhasReservas')}}">
                                Minhas reservas
                            </a>
                            <a class="dropdown-item" aria-current="page" href="{{route('ProReservaSalas')}}">Solicitar pré-reserva</a>
                        </div>
                    </div>
                    @elseif (Auth::user()->tipo == 4)
                    <div class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Reservas
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('MinhasReservas')}}">
                                Minhas reservas
                            </a>
                            <a class="dropdown-item" aria-current="page" href="{{route('ProReiReservaSalas')}}">Nova Reserva</a>
                        </div>
                    </div>
                    @else
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('ShowEquipamentos')}}">Equipamentos</a>
                    </li>
                    @endif
                @endauth
            </ul>
            <form class="d-flex" id="usr">
                @auth
                    <div class="nav-item dropdown">
                        <a class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(Auth::user()->tipo == 5)
                            {{Auth::user()->nome_prefeitura}} 
                        @elseif (Auth::user()->tipo == 4)  
                            {{ Auth::user()->nome_proReitoria }}
                        @else
                            {{ Auth::user()->primeiro_nome }}
                        @endif
                        </a>
                        <div class="dropdown-menu mr-4">
                            <a class="dropdown-item" href="{{ route('editUser', Auth::user()->id_usuario) }}">
                                 Editar Perfil
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="GET">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}"> Logout
                                </a>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-custom ">Login</a>
                @endauth
            </form>
        </div>
    </div>
    </nav>
    
    <div id="alertas" class="mt-4">
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            <i class="bi bi-check"></i>
            {{ session('success') }}
        </div>
        @endif
        
        @if(session('error'))
        <div class="alert alert-danger" role="alert">
            <i class="bi bi-exclamation-triangle text-danger"></i>
            {{ session('error') }}
        </div>
        @endif        
    </div>

    <div class="container content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        function formatarCPF(input) {

            var cpf = input.value.replace(/\D/g, '');

            cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
            cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
            cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2');

            input.value = cpf;
        }
    </script>
</body>
</html>