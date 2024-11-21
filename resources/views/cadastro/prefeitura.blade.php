@extends('layout.master')

@section('content')
<main id="prefpro">
        <h1>Cadastro Prefeitura</h1>
        <form action="" method="post">
            @csrf
            <input type="text" style="visibility: hidden;" id="campoTipo" name="campoTipo" value="5"></input>
            <div class="mb-3">
                <label for="nome_prefeitura" class="form-label mt-3">Nome da Prefeitura:</label>
                <input type="text" class="form-control" name="nome_prefeitura" value="{{ old('nome_prefeitura') }}" id="nome_prefeitura" required>
            </div>
            <div class="mb-3">
                <label for="cnpj_prefeitura" class="form-label mt-3">CNPJ:</label>
                <input type="text" class="form-control" name="cnpj_prefeitura" value="{{ old('cnpj_prefeitura') }}" id="cnpj_prefeitura" required>
            </div>
            <div class="mb-3">
                <label for="cidade" class="form-label mt-3">Cidade:</label>
                <input type="text" class="form-control" name="cidade" value="{{ old('cidade') }}" id="cidade" required>
            </div>
            <div class="mb-3">
                <label for="campoEmail" class="form-label mt-3">Email:</label>
                <input type="email" class="form-control" name="campoEmail" value="{{ old('campoEmail') }}" id="campoEmail" required>
            </div>
            <div class="mb-3">
                <label for="campoSenha" class="form-label mt-3">Senha:</label>
                <input type="password" class="form-control" name="campoSenha" value="{{ old('campoSenha') }}" id="campoSenha" required>
            </div>
            <div class="mb-3">
                <label for="campoConfirmSenha" class="form-label mt-3">Confirmar Senha:</label>
                <input type="password" class="form-control" name="campoConfirmSenha" value="{{ old('campoConfirmSenha') }}" id="campoConfirmSenha" required>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>

        </form>
    </main>
@endsection