@extends('layout.master')

@section('content')

<main class="container mt-5">
    <h2 class=" mb-4">Escolha o tipo de Usuário que deseja se cadastrar</h2>

    <div class="row text-center mt-5">
        <div class="col-md-2 mb-3">
            <a href="/cadastro/diretor" class="btn btn-primary custom-btn">
                <i class="fas fa-user-tie"></i> Diretor
            </a>
        </div>
        <div class="col-md-2 mb-3">
            <a href="/cadastro/prefeitura" class="btn btn-success custom-btn">
                <i class="fas fa-city"></i> Prefeitura
            </a>
        </div>
        <div class="col-md-2 mb-3">
            <a href="/cadastro/pro-reitoria" class="btn btn-warning custom-btn">
                <i class="fas fa-university"></i> Pro-Reitoria
            </a>
        </div>
        <div class="col-md-2 mb-3">
            <a href="/cadastro/professor" class="btn btn-info custom-btn">
                <i class="fas fa-chalkboard-teacher"></i> Professor
            </a>
        </div>
        <div class="col-md-2 mb-3">
            <a href="/cadastro/publico" class="btn btn-secondary custom-btn">
                <i class="fas fa-users"></i> Público
            </a>
        </div>
    </div>
</main>
@endsection