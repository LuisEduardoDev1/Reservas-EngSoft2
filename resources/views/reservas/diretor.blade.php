@extends('layout.master')

@section('content')

<main>

    <h1>Reserva de Equipamentos</h1>

    <form action="" method="post">
            @csrf
            <div class="nome">
                <div>
                    <label for="campoSala" class="form-label mt-3">Tipo:</label>
                    <select class="form-select" aria-label="Default select example" id="campoSala" name="campoSala">
                    @foreach($equipamentos as $equipamento)
                        <option value=""selected>{{$equipamento->nome}}</option>
                    @endforeach  
                    </select>

                </div>
                <div>

                    <label for="campoAno" class="form-label mt-3">Ano:</label>
                    <select class="form-select" aria-label="Default select example" id="campoAno" name="campoAno">
                        
                        <option value="" disabled selected>Selecione</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                    </select>
                </div>
            </div>
            <div class="nome">
                <div>
                    <label for="campoPeriodo" class="form-label mt-3">Período:</label>
                    <input type="text" class="form-control" name="campoPeriodo" value="{{old('campoPeriodo')}}" id="campoPeriodo" required>
                </div>
                <div>
                    <label for="campoDias" class="form-label mt-3">Dias da semana:</label>
                    <input type="text" class="form-control" name="campoDias" value="{{old('campoDias')}}" id="campoDias" required>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>

</main>

@endsection