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

</style>

<div class="container mt-5">
    <h2 class="mt-5">Minhas Reservas</h2>
    @if ($reservas->isEmpty())
        <div class="alert alert-warning mt-4">Você ainda não tem nenhuma reserva.</div>
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