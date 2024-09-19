@extends('layout.master')

@section('content')
    <main id="cadastro">
        <h1>Editar dados</h1>
        <form action="{{ route('updtUser', $usuario->id_usuario) }}" method="POST">
            @csrf
            @method('PUT')
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
                <label for="campoEmail" class="form-label mt-3">Email:</label>
                <input type="email" class="form-control" name="campoEmail" value="{{$usuario->email}}" id="campoEmail" required>
            </div>
            <div>
                <label for="campoCurso" class="form-label mt-3">Curso:</label>
                <input type="text" class="form-control" name="campoCurso" value="{{$usuario->curso}}" id="campoCurso" required>
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
                <button type="submit" class="btn btn-success" href="{{ route('editUser', $usuario->id_usuario) }}">Entrar</button>
            </div>
        </form>
    </main>
@endsection