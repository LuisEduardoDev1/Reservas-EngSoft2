@extends('layout.master')

@section('content')

<div class="container mt-5">
    <h2 class="mt-5">Reservas Aprovadas</h2>

        <ul class="list-group">
            @foreach ($reservas as $reserva)

                <li class="list-group-item d-flex justify-content-between align-items-center mb-3 shadow rounded-lg" id="reservaAprovada">
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
                            <i class="fa fa-hourglass-1 text-warning"></i> <strong>Início:</strong> 
                            {{ $reserva->horario_inicio }}
                        </div>
                        <div>
                            <i class="fa fa-hourglass-3 text-danger"></i> <strong>Fim:</strong> 
                            {{ $reserva->horario_fim }}
                        </div>
                    </div>
        
                    <!-- Descrição -->
                    <div class="d-flex flex-column align-items-center justify-content-center ms-4 flex-grow-1 text-center">
                        <strong>Descrição:</strong><br>
                        <span>{{ $reserva->descricao }}</span>
                    </div>
            
                    <div>
                        <strong>Reservado por:</strong> <br>
                        {{ $reserva->primeiro_nome }}
                    </div>
                </li>
               
            @endforeach

            @foreach ($reservasProRei as $reserva)

                <li class="list-group-item d-flex justify-content-between align-items-center mb-3 shadow rounded-lg" id="reservaAprovada">
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
                            <i class="fa fa-hourglass-1 text-warning"></i> <strong>Início:</strong> 
                            {{ $reserva->horario_inicio }}
                        </div>
                        <div>
                            <i class="fa fa-hourglass-3 text-danger"></i> <strong>Fim:</strong> 
                            {{ $reserva->horario_fim }}
                        </div>
                    </div>
        
                    <!-- Descrição -->
                    <div class="d-flex flex-column align-items-center justify-content-center ms-4 flex-grow-1 text-center">
                        <strong>Descrição:</strong><br>
                        <span>{{ $reserva->descricao }}</span>
                    </div>
            
                    <div>
                        <strong>Reservado por:</strong> <br>
                        Pró-Reitoria
                    </div>
                </li>
               
            @endforeach
        </ul>
</div>

@endsection