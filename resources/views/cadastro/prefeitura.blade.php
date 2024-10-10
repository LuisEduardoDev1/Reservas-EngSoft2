@extends('layout.master')

@section('content')
<main id="prefpro">
        <h1>Cadastro</h1>
        <form action="" method="post">
            @csrf
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
                <label for="telefone" class="form-label mt-3">Telefone:</label>
                <input type="text" class="form-control" name="telefone" value="{{ old('telefone') }}" id="telefone" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label mt-3">Email:</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label mt-3">Senha:</label>
                <input type="password" class="form-control" name="senha" value="{{ old('senha') }}" id="senha" required>
            </div>
            <div class="mb-3">
                <label for="confirmar_senha" class="form-label mt-3">Confirmar Senha:</label>
                <input type="password" class="form-control" name="confirmar_senha" value="{{ old('confirmar_senha') }}" id="confirmar_senha" required>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>

        </form>
    </main>
@endsection