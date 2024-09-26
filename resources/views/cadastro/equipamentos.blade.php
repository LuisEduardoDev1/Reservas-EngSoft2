@extends('layout.master')

@section('content')
    <main>
        <h1>Cadastrar Equipamentos</h1>
        <form action="" method="post">
            @csrf
            <div class="nome">
                <div>
                    <label for="campoNumero" class="form-label mt-3">Equipamento:</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Selecione</option>
                        <option value="1">Datashow</option>
                        <option value="2">Notebook</option>
                    </select>
                </div>
                <div>
                    <label for="campoQtd" class="form-label mt-3">Quantidade:</label>
                    <input type="text" class="form-control" name="campoQtd" value="{{old('campoQtd')}}" id="campoQtd" required>
                </div>
            </div>
            <div class="nome">
                <div>
                    <label for="campoNumero" class="form-label mt-3">Marca:</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Selecione</option>
                        <option value="1">Datashow</option>
                        <option value="2">Notebook</option>
                    </select>
                </div>
                <div>
                    <label for="campoQtd" class="form-label mt-3">Descrição:</label>
                    <input type="text" class="form-control" name="campoQtd" value="{{old('campoQtd')}}" id="campoQtd" required>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </main>

@endsection