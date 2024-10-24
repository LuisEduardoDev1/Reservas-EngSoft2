@extends('layout.master')

@section('content')

<main>

    <h1>Reserva de salas</h1>

    <form action="" method="post">
            @csrf
            <div class="nome">
                <div>                   
                    <label for="campoSala" class="form-label mt-3">Salas:</label>
                    <select class="form-select" aria-label="Default select example" id="campoSala" name="campoSala">
                        <option value="" disabled selected>Selecione</option>
                        @foreach ($salas as $sala)
                            <option value="{{ $sala->id_sala }}">{{ $sala->numero }}</option>
                        @endforeach
                    </select>

                </div>
                <div>
                    <label for="campoData" class="form-label mt-3">Data:</label>
                    <input type="date" class="form-control" value="{{old('campoData')}}" name="campoData" id="campoData" min="{{ date('Y-m-d') }}" required>
                </div>
            </div>
            <div class="nome">
                <div>
                    <label for="campoHoraIni" class="form-label mt-3">Horário início:</label>
                    <input type="time" class="form-control" name="campoHoraIni" value="{{old('campoHoraIni')}}" id="campoHoraIni" required>
                </div>
                <div>
                    <label for="campoHoraFim" class="form-label mt-3">Horário fim:</label>
                    <input type="time" class="form-control" name="campoHoraFim" value="{{old('campoHoraFim')}}" id="campoHoraFim" required>
                </div>
            </div>
            <div>
                <label for="campoDescricao" class="form-label mt-3">Descrição:</label>
                <textarea rows="7" class="form-control" style="resize: none;" name="campoDescricao" value="{{old('campoDescricao')}}" id="campoDescricao" required>
                </textarea>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>

</main>

@endsection