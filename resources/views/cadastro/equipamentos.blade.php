@extends('layout.master')

@section('content')
    <main>
        <h1>Cadastrar Equipamentos</h1>
        <form action="" method="post">
            @csrf
            <div class="nome">
                <div>
                    <label for="campoEquipamento" class="form-label mt-3">Equipamento:</label>
                    <select class="form-select" aria-label="Default select example" id="campoEquipamento" name="campoEquipamento">
                        <option value="" disabled selected>Selecione</option>
                        <option value="Datashow">Datashow</option>
                        <option value="Notebook">Notebook</option>
                    </select>

                </div>
                <div>
                    <label for="campoSNumber" class="form-label mt-3">Serial Number:</label>
                    <input type="text" class="form-control" name="campoSNumber" value="{{old('campoSNumber')}}" id="campoSNumber" required>
                </div>
            </div>
            <div class="nome">
                <div>
                    <label for="campoMarca" class="form-label mt-3">Marca:</label>
                    <input type="text" class="form-control" name="campoMarca" value="{{old('campoMarca')}}" id="campoMarca" required>
                </div>
                <div>
                    <label for="campoDescricao" class="form-label mt-3">Descrição:</label>
                    <input type="textarea" style="resize: none;" class="form-control" name="campoDescricao" value="{{old('campoDescricao')}}" id="campoDescricao"  placeholder="ex: 5000 lumens ou Processador I3, SSD 256gb, 4gb RAM" required>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </main>

@endsection