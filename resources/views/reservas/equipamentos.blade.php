@extends('layout.master')

@section('content')

<style>
    .table th, .table td {
        padding: 8px;
        text-align: center;
    }

    .table th:nth-child(1), .table td:nth-child(1) {
        width: 15%;  /* 15% da largura total da tabela */
    }

    .table th:nth-child(2), .table td:nth-child(2) {
        width: 15%;  /* 20% da largura total da tabela */
    }

    .table th:nth-child(3), .table td:nth-child(3) {
        width: 25%;  /* 25% da largura total da tabela */
    }

    .table th:nth-child(4), .table td:nth-child(4) {
        width: 10%;  /* 10% da largura total da tabela */
    }

    .table th:nth-child(5), .table td:nth-child(5) {
        width: 10%;  /* 10% da largura total da tabela */
    }

    .table th:nth-child(6), .table td:nth-child(6) {
        width: 25%;  /* 20% da largura total da tabela */
    }
</style>

<main>

    <h1>Reserva de Equipamentos</h1>

    <form action="" method="post">
            @csrf
            <div class="nome">
                <div>
                    <label for="campoEquipamento" class="form-label mt-3">Tipo:</label>
                    <select class="form-select" aria-label="Default select example" id="campoEquipamento" name="campoEquipamento">
                        <option value="" disabled selected>Selecione</option>
                        <option value="Datashow">Datashow</option>
                        <option value="Notebook">Notebook</option>
                    </select>

                </div>
                <div>
                    <label for="campoEspecificacao" class="form-label mt-3">Especificação:</label>
                    <select class="form-select" aria-label="Default select example" value="{{old('campoEspecificacao')}}" name="campoEspecificacao" id="campoEspecificacao" required>
                        <option value="" disabled selected>Selecione</option>
                        @foreach ($equipamentos as $equipamento)
                            <option value="{{ $equipamento->serialNum}}">oi</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="data">
                <div>
                    <label for="campoData" class="form-label mt-3">Data:</label>
                    <input type="date" class="form-control" value="{{old('campoData')}}" name="campoData" id="campoData" min="{{ date('Y-m-d') }}" required>
                </div>
                <div>
                    <label for="campoHoraIni" class="form-label mt-3">Horário início:</label>
                    <input type="time" class="form-control" name="campoHoraIni" value="{{old('campoHoraIni')}}" min="08:00" max="22:00" id="campoHoraIni" required>
                </div>
                <div>
                    <label for="campoHoraFim" class="form-label mt-3">Horário fim:</label>
                    <input type="time" class="form-control" name="campoHoraFim" value="{{old('campoHoraFim')}}" min="08:00" max="22:00" id="campoHoraFim" required>
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

    <hr>
    <h4>Minhas reservas de equipamentos</h4>
    <br>

    @if($reservas->isEmpty())
        <div class="alert alert-warning mt-4">Você ainda não tem nenhuma reserva de equipamentos.</div>
    @endif

    @foreach ($reservas as $equipamentos)
    <table class="table table-bordered table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th class="text-center">Data</th>
            <th class="text-center">Equipamento</th>
            <th class="text-center">Especificações</th>
            <th class="text-center">Hora Início</th>
            <th class="text-center">Hora Fim</th>
            <th class="text-center">Descrição</th>
        </tr>
    </thead>
    <tbody>
        <div class="list-group">
        
            <tr>
                <td class="text-center">{{ \Carbon\Carbon::parse($equipamentos->data)->format('d/m/Y') }}</td>
                <td class="text-center">{{ $equipamentos->equipamento->nome }}</td>
                <td class="text-center">{{ $equipamentos->equipamento->descricao }}</td>
                <td class="text-center">{{ \Carbon\Carbon::parse($equipamentos->horario_inicio)->format('H:i') }}</td>
                <td class="text-center">{{ \Carbon\Carbon::parse($equipamentos->horario_fim)->format('H:i') }}</td>
                <td class="text-center">{{ $equipamentos->descricao }}</td>
            </tr>
        </div>
    </tbody>
    @endforeach
    </table>
</main>


<script>
    // Limpa as opções do campoEspecificacao assim que a página for carregada
    document.getElementById('campoEspecificacao').innerHTML = '<option value="" disabled selected>Selecione</option>';

    document.getElementById('campoEquipamento').addEventListener('change', function () {
        var tipo = this.value; // Pega o valor do tipo selecionado
        var selectEspecificacao = document.getElementById('campoEspecificacao');

        // Limpa as opções anteriores de especificação
        selectEspecificacao.innerHTML = '<option value="" disabled selected>Selecione</option>';

        // Faz a requisição AJAX se um tipo for selecionado
        if (tipo) {
            fetch(`/reserva/equipamento/especificacoes/${tipo}`)
                .then(response => response.json())
                .then(data => {
                    // Se houver descrições, preenche o campo de especificação
                    // Itera sobre o objeto recebido (chave = id_equipamentos, valor = descricao)
                    for (const [id_equipamentos, descricao] of Object.entries(data)) {
                        var option = document.createElement('option');
                        option.value = id_equipamentos;  // ID do equipamento
                        option.textContent = descricao; // Descrição do equipamento
                        selectEspecificacao.appendChild(option);
                    }
                    console.log(data); // Para depuração
                })
                .catch(error => console.error('Erro ao carregar especificações:', error));

        }
    });
</script>

@endsection