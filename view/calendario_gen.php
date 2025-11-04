<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.js'></script>
  </head>
  <body>
    <?php include "../view/navbar.php";

    require_once '../model/curso_model.php';

    $curso = null;  
    if (isset($_GET['id_curso'])) {
      $idCurso = intval($_GET['id_curso']);
      $cursoModel = new CursoModel();
      $curso = $cursoModel->buscarPorId($idCurso);
    }
    ?>


    <div id="container">
      <div id='parteDaEsquerda'>
        <button type="button" class="btn btn-light bt-curso">
          <?= $curso ? htmlspecialchars($curso['nome']) : 'Curso não encontrado' ?>
        </button>
        <button type="button" style="margin-top: 600px; text-align: center;" class="btn btn-light bt-curso">Gerar </button>
      </div>

      <div id='calendar'></div>
    </div>

  </body>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'pt-br',
        firstDay: 1,
        headerToolbar: {
          left: 'prev',
          center: 'title today',
          right: 'next'
        },
        buttonText: {
          today: 'Hoje'
        },
        dayMaxEvents: true,

        events: [
          {
            title: "Manhã",
            startTime: '08:00:00',
            endTime: '12:00:00',
            daysOfWeek: [1,3,5],
            startRecur: '2025-11-01',
            endRecur: '2026-11-01',
            color: '28a745',
            extendedProps: {
              professor: 'Carlos',
              disciplina: 'Banco de dados'
            }
          },
          {
            title: "Tarde",
            startTime: '13:30:00',
            endTime: '17:30:00',
            daysOfWeek: [1,3,5],
            startRecur: '2025-11-01',
            endRecur: '2026-11-01',
            color: '28a745',
            extendedProps: {
              professor: 'Carlos',
              disciplina: 'Banco de dados'
            }
          }
        ],
        

        dayCellDidMount: function(info) {
          const day = info.date.getDate();
          if (day % 2 === 0) {
            info.el.style.backgroundColor = '#f5f5f5'; // cinza claro
          } else {
            info.el.style.backgroundColor = '#ffffff'; // branco
          }

          const today = new Date();
          const isToday = info.date.toDateString() === today.toDateString();
          if (isToday) {
            info.el.style.backgroundColor = '#dbe9ff'; // azul claro
            info.el.style.border = '2px solid #0059df';
            info.el.style.borderRadius = '8px';
          }
        }
      });

      calendar.render();
    });

  </script>
</html>