<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        #usr{
            margin-right: 20px;
        }
        /* .navbar .dropdown-menu .dropdown-item{
            margin-right: 500px;
            width: 0px;
        } */
        #login{
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin: 0 auto;
            height: 60vh;
            /* align-items: center; */
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

        @media(max-height:700px){
            #cadastro{
                height: 100vh;
                padding-bottom: 50px;
            }
        }

        @media(max-height:470px){
            #cadastro{
                margin-top: 70px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container-fluid">
        <b><a class="navbar-brand" href="{{route('login')}}">Inicio</a></b>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('showSalas')}}">Reservas</a>
                </li>
            </ul>
            <form class="d-flex " id="usr">
                @auth
                    <div class="nav-item dropdown">
                        <a class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->primeiro_nome }}
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('editUser', Auth::user()->id_usuario) }}">
                                <i class="fas fa-user-edit"></i> Editar Perfil
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