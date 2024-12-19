@extends('layout.master')

@section('content')

<style>
    .reserva-status {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
    }

    .btn-outline-info {
        border: 1px solid #1890ff;
        background-color: #1890ff;
        color: #fff;
    }

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

<div class="container mt-5">
    <h2 class="mt-5">Minhas Reservas</h2>

    <hr>

    <h4>Salas</h4>
    @if ($reservas->isEmpty())
        <div class="alert alert-warning mt-4">Você ainda não tem nenhuma reserva de sala.</div>
    @endif
        <ul class="list-group">
            @foreach ($reservas as $reserva)

                @if($reserva->status == 'aprovado')

                    <li class="list-group-item d-flex justify-content-between align-items-center mb-3 shadow rounded-lg" id="reservaAprovada">
                        <!-- Detalhes da Reserva -->
                        <div class="d-flex flex-column text-dark">
                            <div class="reserva-info">
                                <i class="fa fa-calendar-days text-primary"></i>
                                <span><strong>Data:</strong> {{ \Carbon\Carbon::parse($reserva->data)->format('d/m/Y') }}</span>
                            </div>
                            <div class="reserva-info">
                                <i class="fa fa-map-marker-alt text-success"></i>
                                <span><strong>Sala:</strong> {{ $reserva->id_sala }}</span>
                            </div>
                            <div class="reserva-info">
                                <i class="fa fa-clock text-warning"></i>
                                <span><strong>Início:</strong> {{ \Carbon\Carbon::parse($reserva->horario_inicio)->format('H:i') }}</span>
                            </div>
                            <div class="reserva-info">
                                <i class="fa fa-clock text-danger"></i>
                                <span><strong>Fim:</strong> {{ \Carbon\Carbon::parse($reserva->horario_fim)->format('H:i') }}</span>
                            </div>
                        </div>
            
                        <!-- Descrição -->
                        <div class="d-flex flex-column align-items-center justify-content-center ms-4 flex-grow-1 text-center">
                            <strong>Descrição:</strong><br>
                            <span>{{ $reserva->descricao }}</span>
                        </div>
            
                        <div>
                            <strong>Status:</strong> <br>
                            {{ $reserva->status }}
                        </div>
                    </li>

                @elseif ($reserva->status == 'cancelado')

                    <li class="list-group-item d-flex justify-content-between align-items-center mb-3 shadow" id="reservaCancelada">
                        <!-- Detalhes da Reserva -->
                        <div class="d-flex flex-column text-dark">
                            <div class="reserva-info">
                                <i class="fa fa-calendar-days text-primary"></i>
                                <span><strong>Data:</strong> {{ \Carbon\Carbon::parse($reserva->data)->format('d/m/Y') }}</span>
                            </div>
                            <div class="reserva-info">
                                <i class="fa fa-map-marker-alt text-success"></i>
                                <span><strong>Sala:</strong> {{ $reserva->id_sala }}</span>
                            </div>
                            <div class="reserva-info">
                                <i class="fa fa-clock text-warning"></i>
                                <span><strong>Início:</strong> {{ \Carbon\Carbon::parse($reserva->horario_inicio)->format('H:i') }}</span>
                            </div>
                            <div class="reserva-info">
                                <i class="fa fa-clock text-danger"></i>
                                <span><strong>Fim:</strong> {{ \Carbon\Carbon::parse($reserva->horario_fim)->format('H:i') }}</span>
                            </div>
                        </div>
            
                        <!-- Descrição -->
                        <div class="d-flex flex-column align-items-center justify-content-center ms-4 flex-grow-1 text-center">
                            <strong>Descrição:</strong><br>
                            <span>{{ $reserva->descricao }}</span>
                        </div>
            
                        <div class="reserva-status">
                            <div class="status-info">
                                <strong>Status:</strong> <br>
                                <span class="badge-danger">
                                    {{ $reserva->status }}
                                </span>
                            </div>
                            <button class="btn btn-outline-info btn-sm openmodal" title="Ver Motivo">
                                <i class="fas fa-info-circle"></i> Motivo
                            </button>
                        </div>
                    </li>
                    <dialog id="popup" class="popup">
                        <div style="display: flex; justify-content:space-between;" class="mb-4">
                            <h3>Motivo para o cancelamento:</h3><br>
                            <div>
                                <button type="button" class="close btn btn-danger btn-sm">X</button>
                            </div>
                        </div>

                        <p>{{ $reserva->motivo_cancelamento }}</p>
                    </dialog>

                @else

                    <li class="list-group-item d-flex justify-content-between align-items-center mb-3 shadow">
                        <!-- Detalhes da Reserva -->
                        <div class="d-flex flex-column text-dark">
                            <div>
                                <i class="fa fa-calendar-days text-primary"></i> <strong>Data:</strong> 
                                {{ \Carbon\Carbon::parse($reserva->data)->format('d/m/Y') }}
                            </div>
                            <div>
                                <i class="fa fas fa-map-marker-alt text-success"></i> <strong>Sala:</strong> 
                                {{ $reserva->id_sala }}
                            </div>
                            <div>
                                <i class="fa fa-clock text-warning"></i>
                                <span><strong>Início:</strong> {{ \Carbon\Carbon::parse($reserva->horario_inicio)->format('H:i') }}</span>
                            </div>
                            <div>
                                <i class="fa fa-clock text-danger"></i>
                                <span><strong>Fim:</strong> {{ \Carbon\Carbon::parse($reserva->horario_fim)->format('H:i') }}</span>
                            </div>
                        </div>
            
                        <!-- Descrição -->
                        <div class="d-flex flex-column align-items-center justify-content-center ms-4 flex-grow-1 text-center">
                            <strong>Descrição:</strong><br>
                            <span>{{ $reserva->descricao }}</span>
                        </div>
            
                        <div>
                            <strong>Status:</strong> <br>
                            {{ $reserva->status }}
                        </div>
                    </li>

                @endif
            @endforeach

            <h4>Equipamentos</h4>

            @if($reservas_equipamentos->isEmpty())
                <div class="alert alert-warning mt-4">Você ainda não tem nenhuma reserva de equipamentos.</div>
            @endif

            @foreach ($reservas_equipamentos as $equipamentos)
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
        </ul>
</div>

<script>
     const openButtons = document.querySelectorAll('.openmodal');
    const modals = document.querySelectorAll('.popup');
    const closeButtons = document.querySelectorAll('.close');

    // Itera sobre os botões de abrir modal
    openButtons.forEach((button, index) => {
        button.onclick = function() {
            modals[index].showModal();
        }
    });

    // Itera sobre os botões de fechar modal
    closeButtons.forEach((button, index) => {
        button.onclick = function() {
            modals[index].close();
        }
    });
</script>

@endsection