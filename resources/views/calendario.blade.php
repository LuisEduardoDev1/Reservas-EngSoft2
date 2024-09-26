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
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });

    </script>
@endsection