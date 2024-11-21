@extends('layout.master')

@section('content')
<main>
    <h1 class="text-center"><i class="fas fa-calendar-alt"></i> Calendário</h1>
    <div id='calendar'></div>
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
            events: eventos // Passa os eventos para o calendário
        });

        calendar.render();
    });
</script>
@endsection
