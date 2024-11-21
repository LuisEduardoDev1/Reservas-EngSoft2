@extends('layout.master')

@section('content')
<main id="cadastro">
        <h1>Cadastro Pró-Reitura</h1>
        <form action="" method="post">
            @csrf
            <input type="text" style="visibility: hidden;" id="campoTipo" name="campoTipo" value="4"></input>
            <div class="nome">
                <div>
                    <label for="campoProReitura" class="form-label mt-3">Nome:</label>
                    <input type="text" class="form-control" name="campoProReitura" value="{{old('campoProReitura')}}" id="campoProReitura" required>
                </div>
                <div>
                    <label for="campoUniversidade" class="form-label mt-3">Universidade:</label>
                    <input type="text" class="form-control" name="campoUniversidade" value="{{old('campoUniversidade')}}" id="campoUniversidade" required>
                </div>
            </div>
            <div>
                <label for="campoEmail" class="form-label mt-3">Email:</label>
                <input type="email" class="form-control" name="campoEmail" value="{{old('campoEmail')}}" id="campoEmail" required>
            </div>
            <div>
                <label for="campoSenha" class="form-label mt-3">Senha:</label>
                <input type="password" class="form-control" name="campoSenha" value="{{old('campoSenha')}}" id="campoSenha" required>
            </div>
            <div class="mb-3">
                <label for="campoConfirmSenha" class="form-label mt-3">Confirmar Senha:</label>
                <input type="password" class="form-control" name="campoConfirmSenha" value="{{old('campoConfirmSenha')}}" id="campoConfirmSenha" required>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
        </form>
    </main>
@endsection