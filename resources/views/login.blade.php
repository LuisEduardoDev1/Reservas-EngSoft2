@extends('layout.master')

@section('content')
<main id="login">
    <img id="logo" src="/img/logo.jpeg" width=70px heigth=70px alt="logo da uespi">
    <style>
        #logo {
            margin-bottom: 10px;
            align-self: center;
        }
    </style>

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
                <p>Ainda não possui cadastro?<a href="{{route('escolher')}}">Cadastre-se</a></p>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
        </form>
</main>
@endsection