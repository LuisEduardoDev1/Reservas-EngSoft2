@extends('layout.master')

@section('content')

<main class="container mt-5">
    <img id="logo" src="/img/logo.jpeg" width=70px heigth=70px alt="logo da uespi">
    <style>
        #logo {
            margin-left: 38em;
            margin-bottom: 10px;
        }

        #texto {
            margin-left: 9em;
            margin-top: 10px;
        }

        #botoes {
            margin-left: 10em;
        }
    </style>
    <h2 id="texto" class=" mb-4">Escolha o tipo de Usuário que deseja se cadastrar</h2>

    <div id="botoes" class="row text-center mt-5">
        <div class="col-md-2 mb-3">
            <a href="{{route('cadastroDiretor')}}" class="btn btn-primary custom-btn">
                <i class="fas fa-user-tie"></i> Diretor
            </a>
        </div>
        <div class="col-md-2 mb-3">
            <a href="{{route('cadastroPrefeitura')}}" class="btn btn-success custom-btn">
                <i class="fas fa-city"></i> Prefeitura
            </a>
        </div>
        <div class="col-md-2 mb-3">
            <a href="{{route('cadastroProReitura')}}" class="btn btn-warning custom-btn">
                <i class="fas fa-university"></i> Pro-Reitoria
            </a>
        </div>
        <div class="col-md-2 mb-3">
            <a href="{{route('cadastroProfessor')}}" class="btn btn-info custom-btn">
                <i class="fas fa-chalkboard-teacher"></i> Professor
            </a>
        </div>
        <div class="col-md-2 mb-3">
            <a href="{{route('cadastroPubl')}}" class="btn btn-secondary custom-btn">
                <i class="fas fa-users"></i> Público
            </a>
        </div>
    </div>
</main>
@endsection