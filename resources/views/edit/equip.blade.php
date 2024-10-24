@extends('layout.master')

@section('content')

<main>

    <h1>Editar Equipamento</h1>

    <form action="{{ route('DirAtualizaEquipamentos', $equipamento->id_equipamentos) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="nome">
            <div>
                <label for="campoEquipamento" class="form-label mt-3">Equipamento:</label>
                <input type="text" class="form-control" name="campoEquipamento" value="{{ $equipamento->nome }}" id="campoEquipamento" readonly>
            </div>
            <div>
                <label for="campoSNumber" class="form-label mt-3">Serial Number:</label>
                <input type="text" class="form-control" name="campoSNumber" value="{{ $equipamento->serialNum }}" id="campoSNumber" readonly>
            </div>
        </div>
        <div class="nome">
            <div>
                <label for="campoMarca" class="form-label mt-3">Marca:</label>
                <input type="text" class="form-control" name="campoMarca" value="{{ $equipamento->marca }}" id="campoMarca" required>
            </div>
            <div>
                <label for="campoDescricao" class="form-label mt-3">Descrição:</label>
                <input type="text" class="form-control" name="campoDescricao" value="{{ $equipamento->descricao }}" id="campoDescricao" placeholder="ex: 5000 lumens ou Processador I3, SSD 256gb, 4gb RAM" required>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>

    </form>
</main>


@endsection