@extends('layout.master')

@section('content')

<div class="container mt-5">
    <h2 class="mt-5">Pré-Reservas</h2>
    @if ($reservas->isEmpty())
        <div class="alert alert-warning mt-4">Nenhuma solicitação encontrada.</div>
    @endif
        <ul class="list-group">
            @foreach ($reservas as $reserva)
                <li class="list-group-item d-flex justify-content-between align-items-center">
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
        
                    <div class="d-flex flex-column align-items-center justify-content-center ms-4 flex-grow-1 text-center">
                        <strong>Motivo:</strong><br>
                        <span>{{ $reserva->descricao }}</span>
                    </div>
                    <div>
                        <form action="{{ route('PrefAceitarReserva', ['id' => $reserva->id_reserva_professor]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Você tem certeza que deseja aprovar esta reserva?');">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Aprovar</button>
                        </form>
                        <form action="{{ route('PrefCancelarReserva', ['id' => $reserva->id_reserva_professor]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja cancelar esta reserva?');" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
</div>

@endsection