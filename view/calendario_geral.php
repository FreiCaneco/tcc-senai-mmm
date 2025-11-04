<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <title>Formulário de Cadastro</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.css">
  <!-- Estilos personalizados -->
  <link rel="stylesheet" href="../css/styles.css">
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
          integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" 
          crossorigin="anonymous"></script>
  <!-- Fonte -->
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
  <!-- FullCalendar -->
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.js'></script>
</head>

<body>
  <!-- Barra de navegação -->
  <?php include "../view/navbar.php"; ?>

  <!-- Botões centralizados acima do calendário -->
  <div class="text-center mt-4">
    <button type="button" class="btn btn-primary mx-2 px-4">Manhã</button>
    <button type="button" class="btn btn-primary mx-2 px-4">Tarde</button>
    <button type="button" class="btn btn-primary mx-2 px-4">Noite</button>
  </div>

  <!-- Contêiner do calendário -->
  <div id="calendar-container" class="container my-4">
    <div id="calendar"></div>
  </div>

  <!-- Script do FullCalendar -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const calendarEl = document.getElementById('calendar');

      // Inicializa o calendário
      const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'pt-br',   // idioma português
        firstDay: 1,       // começa na segunda-feira
        headerToolbar: {
          left: 'prev',
          center: 'title today',
          right: 'next'
        },
        buttonText: {
          today: 'Hoje' // tradução do botão
        },
        dayMaxEvents: true,

        // Personaliza a aparência das células do calendário
        dayCellDidMount: function (info) {
          const day = info.date.getDate();

          // Alterna cores entre dias pares e ímpares
          info.el.style.backgroundColor = (day % 2 === 0) ? '#e9ecef' : '#ffffff';

          // Destaca o dia atual
          const today = new Date();
          if (info.date.toDateString() === today.toDateString()) {
            info.el.style.backgroundColor = '#dbe9ff';
            info.el.style.border = '2px solid #0059df';
            info.el.style.borderRadius = '8px';
          }
        }
      });

      // Renderiza o calendário
      calendar.render();
    });
  </script>
</body>
</html>
