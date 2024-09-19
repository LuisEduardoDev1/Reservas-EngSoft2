@extends('layout.master')

@section('content')
<main id="login">
    <!-- <div id="alertas" class="mt-4">
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
    </div> -->

    <h1 class="mb-4">Login</h1>
        <form action="" method="POST">
            @csrf
            <div>
                <label for="email" class="form-label">Email:</label>
                <input type="email" placeholder="Informe seu email" class="form-control mb-3" value="{{old('email')}}" name="email" id="email">
            </div>
            <div class="mb-3"> 
                <label for="senha" class="form-label">Senha:</label>
                <input type="password" placeholder="Digite sua senha" class="form-control" value="{{old('senha')}}" name="senha" id="senha">
                <p>Ainda não possui cadastro?<a href="{{route('cadastro')}}">Cadastre-se</a></p>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
        </form>
</main>
@endsection