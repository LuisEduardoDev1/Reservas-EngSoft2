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
                            <i class="fa fas fa-user"></i> <strong>Professor(a):</strong> 
                            {{ $reserva->primeiro_nome }}
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
        
                    <div class="d-flex flex-column align-items-center justify-content-center ms-4 flex-grow-1 text-center">
                        <strong>Motivo:</strong><br>
                        <span>{{ $reserva->descricao }}</span>
                    </div>
                    <div>
                        <form action="{{ route('PrefAceitarReserva', ['id' => $reserva->id_reserva_professor]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Você tem certeza que deseja aprovar esta reserva?');">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success btn-sm mb-2">
                                <i class="far fa-thumbs-up"> Aprovar</i>
                            </button>
                        </form><br> 
                        <button class="btn btn-danger btn-sm" id="openmodal" title="Cancelar">
                            <i class="fas fa-ban"> Cancelar</i>
                        </button>
                        <form action="{{ route('PrefCancelarReserva', ['id' => $reserva->id_reserva_professor]) }}" method="POST" onsubmit="return confirm('Você tem certeza que deseja cancelar esta reserva?');" style="display:inline;">
                            @csrf
                            @method('PUT')

                            <dialog  id="popup">
                                <div style="display: flex; justify-content:space-between;" class="mb-4">
                                    <h3>Motivo para o cancelamento:</h3><br>
                                    <div>                                       
                                        <button id="close" type="button" class="btn btn-danger btn-sm ">X</button>
                                    </div>
                                </div>

                                <textarea name="motivo_cancelamento" id="motivo_cancelamento" rows="5" style="resize: none; width:100%"></textarea>

                                <div style="display: flex; justify-content: end;">
                                    <button type="submit" class="btn btn-primary" style="align-self: flex-end;">Enviar</button>
                                </div>
                            </dialog>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
</div>

<script>
    let open = document.getElementById('openmodal')
    let modal = document.querySelector('dialog')
    let close = document.getElementById("close")

    open.onclick = function(){
        modal.showModal()
    }
    close.onclick = function(){
        modal.close()
    }
</script>
@endsection