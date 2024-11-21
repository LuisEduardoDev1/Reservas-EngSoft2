@extends('layout.master')

@section('content')
    <main id="cadastro">
        <h1>Editar dados</h1>
        <form action="{{ route('updtUser', $usuario->id_usuario) }}" method="POST">
            @csrf
            @method('PUT')
            @if(Auth::user()->tipo == 5)

                <div class="nome">
                    <div>
                        <label for="nome_prefeitura" class="form-label mt-3">Nome:</label>
                        <input type="text" class="form-control" name="nome_prefeitura" value="{{$usuario->nome_prefeitura}}" id="nome_prefeitura" required>
                    </div>
                    <div>
                        <label for="campoCidade" class="form-label mt-3">Cidade:</label>
                        <input type="text" class="form-control" name="campoCidade" value="{{$usuario->cidade}}" id="campoCidade" required>
                    </div>
                </div>
                <div>
                    <label for="campoCurso" class="form-label mt-3">CNPJ:</label>
                    <input type="text" class="form-control" name="campoCurso" value="{{$usuario->cnpj_prefeitura}}" id="campoCurso" readonly>
                </div>

            @elseif(Auth::user()->tipo == 4)

                <div class="nome">
                    <div>
                        <label for="campoProReitura" class="form-label mt-3">Nome:</label>
                        <input type="text" class="form-control" name="campoProReitura" value="{{$usuario->nome_proReitura}}" id="campoProReitura" required>
                    </div>
                    <div>
                        <label for="campoUniversidade" class="form-label mt-3">Cidade:</label>
                        <input type="text" class="form-control" name="campoUniversidade" value="{{$usuario->cidade}}" id="campoUniversidade" required>
                    </div>
                </div>ut type="password" class="form-control" name="campoConfirmSenha" value="{{old('campoConfirmSenha')}}" id="campoConfirmSenha" >
                </div>
            @else

                <div class="nome">
                    <div>
                        <label for="campoPrimNome" class="form-label mt-3">Nome:</label>
                        <input type="text" class="form-control" name="campoPrimNome" value="{{$usuario->primeiro_nome}}" id="campoPrimNome" required>
                    </div>
                    <div>
                        <label for="campoSobrenome" class="form-label mt-3">Sobrenome:</label>
                        <input type="text" class="form-control" name="campoSobrenome" value="{{$usuario->sobrenome}}" id="campoSobrenome" required>
                    </div>
                </div>
                <div>
                    <label for="campoCurso" class="form-label mt-3">CPF:</label>
                    <input type="text" class="form-control" name="campoCurso" value="{{$usuario->cpf}}" id="campoCurso" readonly>
                </div>

            @endif

            <div>
                <label for="campoEmail" class="form-label mt-3">Email:</label>
                <input type="email" class="form-control" name="campoEmail" value="{{$usuario->email}}" id="campoEmail" required>
            </div>
            <div>
                <label for="campoSenha" class="form-label mt-3">Senha:</label>
                <input type="password" class="form-control" name="campoSenha" value="{{old('campoSenha')}}" id="campoSenha" >
            </div>
            <div class="mb-3">
                <label for="campoConfirmSenha" class="form-label mt-3">Confirmar Senha:</label>
                <input type="password" class="form-control" name="campoConfirmSenha" value="{{old('campoConfirmSenha')}}" id="campoConfirmSenha" >                
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success" href="{{ route('editUser', $usuario->id_usuario) }}">Salvar</button>
            </div>
        </form>
    </main>
@endsection