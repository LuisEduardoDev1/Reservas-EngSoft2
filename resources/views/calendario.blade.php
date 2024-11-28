@extends('layout.master')

@section('content')
<style>
    .fc-event {
    cursor: pointer; 
    background-color: rgb(0, 143, 209);
    color: white
}

</style>
<main>
    <h1 class="text-center"><i class="fas fa-calendar-alt"></i> Calendário</h1>
    <select class="form-select" aria-label="Default select example" id="campoSala" name="campoSala">
        <option value="" disabled selected>Selecione uma sala</option>
        @foreach ($salas as $sala)
            <option value="{{ $sala->numero }}">{{ $sala->numero }}</option>
        @endforeach
    </select>
    <div id='calendar'></div>

    <!-- Dialog para mostrar os detalhes da reserva -->
    <dialog id="popup" class="popup">
        <div style="display: flex; justify-content:space-between;" class="mb-4">
            <h3>Detalhes da reserva:</h3>
            <div>
                <button id="close" type="button" class="btn btn-danger btn-sm">X</button>
            </div>
        </div>
        <div id="reservation-info">
            <!-- Informações da reserva serão injetadas aqui -->
        </div>
    </dialog>
</main>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        // Dados de eventos do servidor
        var eventos = @json($eventos);

        // Inicializa o calendário com eventos
        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'pt-br',
            initialView: 'dayGridMonth',
            events: eventos, // Passa os eventos para o calendário

            eventClick: function(info) {
        // Obtém os dados do evento
        var event = info.event;
        
        // Verificar os dados no console para garantir que eles estão corretos
        console.log(event); // Verifique o objeto do evento no console para ver todos os dados

        var title = event.title;
        
        // Verificando se as datas de início e fim estão corretamente formatadas
        var start = event.start; // Obtemos a data e hora de início
        var end = event.end; // Obtemos a data e hora de término

        // Formatar a data
        var startDate = start.toLocaleDateString('pt-BR'); // Exibe apenas a data (dd/mm/yyyy)
        var startTime = start.toLocaleTimeString('pt-BR', { hour: '2-digit', minute: '2-digit' }); // Exibe apenas a hora (hh:mm)

        var endTime = end ? end.toLocaleTimeString('pt-BR', { hour: '2-digit', minute: '2-digit' }) : 'Não especificado'; // Se existir, exibe o horário de fim

        // Acessando a descrição (se houver) através de extendedProps
        var description = event.extendedProps.description || 'Sem descrição';  // Descrição (caso exista)
        var local = event.extendedProps.local || 'Local não especificado';

        // Preenche o conteúdo do popup com os dados do evento
        var reservationInfo = `
            <p><strong>Reservado por:</strong> ${title}</p>
            <p><strong>Sala:</strong> ${local}</p>
            <p><strong>Data:</strong> ${startDate}</p>
            <p><strong>Início:</strong> ${startTime}</p>
            <p><strong>Término:</strong> ${endTime}</p>
            <p><strong>Descrição:</strong> ${description}</p>
        `;
        document.getElementById('reservation-info').innerHTML = reservationInfo;

        // Exibe o popup
        var dialog = document.getElementById('popup');
            dialog.showModal();
        }
    });

        calendar.render();

        // Fecha o popup quando clicar no botão "X"
        document.getElementById('close').addEventListener('click', function() {
            var dialog = document.getElementById('popup');
            dialog.close();
        });

        document.getElementById('campoSala').addEventListener('change', function () {
            var salaSelecionada = this.value;

            // Remove todos os eventos do calendário
            calendar.removeAllEvents();

            // Filtra os eventos pela sala selecionada
            var eventosFiltrados = salaSelecionada
                ? eventos.filter(event => event.local == salaSelecionada)
                : eventos; // Se nenhuma sala for selecionada, exibe todos os eventos

            // Adiciona os eventos filtrados ao calendário
            calendar.addEventSource(eventosFiltrados);
        });
    });
</script>
@endsection
