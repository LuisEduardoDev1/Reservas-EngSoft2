@extends('layout.master')

@section('content')

<div class="container mt-5">
    <h2 class="mt-5">Pré-Reservas</h2>
        <ul class="list-group">
            @foreach ($reservas as $reserva)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <i class="	fa fa-user"></i> <b>Professor:</b> {{ $reserva->id_professor }} <br>
                        <i class="fa fa-calendar-days"></i> <b>Data:</b> {{  \Carbon\Carbon::parse($reserva->data)->format('d/m/Y') }}<br>
                        <i class="fa fa-check-square"></i> <b>Status:</b> {{ $reserva->status }}<br> 
                        <i class="	fa fa-hourglass-1"></i> <b>Início:</b> {{ $reserva->horario_inicio }} <br>
                        <i class="	fa fa-hourglass-3"></i> <b>Fim:</b> {{ $reserva->horario_fim }} <br>
                    </div>
                    <div>
                        <form action="{{ route('PrefAceitarReserva', ['id' => $reserva->id_reserva_professor]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Você tem certeza que deseja aprovar esta reserva?');">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Aprovar</button>
                        </form>
                        <form action="#" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?');" style="display:inline;">
                            @csrf
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