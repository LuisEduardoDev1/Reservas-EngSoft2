@extends('layout.master')

@section('content')
<main id="cadastro">
        <h1>Cadastro Publico</h1>
        <form action="" method="post">
            @csrf
            <input type="text" style="visibility: hidden;" id="campoTipo" name="campoTipo" value="1"></input>
            <div class="nome">
                <div>
                    <label for="campoPrimNome" class="form-label mt-3">Nome:</label>
                    <input type="text" class="form-control" name="campoPrimNome" value="{{old('campoPrimNome')}}" id="campoPrimNome" required>
                </div> 
                <div>
                    <label for="campoSobrenome" class="form-label mt-3">Sobrenome:</label>
                    <input type="text" class="form-control" name="campoSobrenome" value="{{old('campoSobrenome')}}" id="campoSobrenome" required>
                </div>
            </div>
            <div>
                <label for="campoEmail" class="form-label mt-3">Email:</label>
                <input type="email" class="form-control" name="campoEmail" value="{{old('campoEmail')}}" id="campoEmail" required>
            </div>
            <div>
                <label for="campoCpf" class="form-label mt-3">Cpf:</label>
                <input type="text" oninput="formatarCPF(this)" class="form-control" name="campoCpf" value="{{old('campoCpf')}}" id="campoCpf" required>
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