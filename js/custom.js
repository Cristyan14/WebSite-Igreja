document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',

        right: 'dayGridMonth'
      },
      height:'auto',
        contentHeight: 1000,
      //initialDate: '2024-12-03',
      navLinks: true, 
      selectable: true,
      selectMirror: true,
      locale: 'pt-br',
   
      dayMaxEvents: true,
      events: 'listar_evento.php'
      
    });

    calendar.render();
  });