@extends('layout.master')

@section('content')
    <main>
        <h1>Cadastrar Salas</h1>
        <form action="" method="post">
            @csrf
            <div class="nome">
                <div>
                    <label for="campoNumero" class="form-label mt-3">Numero da sala:</label>
                    <input type="text" class="form-control" name="campoNumero" value="{{old('campoNumero')}}" id="campoNumero" required>
                </div>
                <div>
                    <label for="campoQtd" class="form-label mt-3">Quantidade máxima de alunos:</label>
                    <input type="text" class="form-control" name="campoQtd" value="{{old('campoQtd')}}" id="campoQtd" required>
                </div>
            </div>
            <div class="nome">
                <div>
                    <label for="campoTamanho" class="form-label mt-3">Tamanho da sala:</label>
                    <input type="text" class="form-control" name="campoTamanho" value="{{old('campoTamanho')}}" id="campoTamanho" placeholder="em m²" required>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </main>

@endsection