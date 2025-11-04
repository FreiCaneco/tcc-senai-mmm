<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <title>Formulário de Cadastro</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../css/bootstrap.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="../css/styles.css">
  <!-- JS Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
          integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" 
          crossorigin="anonymous"></script>
  <!-- Fonte -->
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
  <!-- FullCalendar -->
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.js'></script>
</head>

<body>
  <?php 
    // Inclui a navbar e o modelo do curso
    include "../view/navbar.php"; 
    require_once '../model/curso_model.php';

    $curso = null;
    if (isset($_GET['id_curso'])) {
      $idCurso = intval($_GET['id_curso']);
      $cursoModel = new CursoModel();
      $curso = $cursoModel->buscarPorId($idCurso);
    }
  ?>

  <!-- Container principal -->
  <div id="container">

    <!-- Parte lateral azul -->
    <div id="parteDaEsquerda">
      <!-- Nome do curso -->
      <button type="button" class="btn btn-light bt-curso">
        <?= $curso ? htmlspecialchars($curso['nome']) : 'Curso não encontrado' ?>
      </button>

      <!-- Accordion -->
      <div class="accordion accordion-flush mt-3" id="accordionFlushExample"> 
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              Accordion Item #1
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              Conteúdo do primeiro item do acordeão.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
              Accordion Item #2
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              Conteúdo do segundo item do acordeão.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
              Accordion Item #3
            </button>
          </h2>
          <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              Conteúdo do terceiro item do acordeão.
            </div>
          </div>
        </div>
      </div>

      <!-- Botão Gerar -->
      <button type="button" class="btn btn-light bt-curso mt-auto">Gerar</button>
    </div>

    <!-- Calendário -->
    <div id='calendar'></div>
  </div>

  <!-- Script do FullCalendar -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const calendarEl = document.getElementById('calendar');

      const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'pt-br',
        firstDay: 1,
        headerToolbar: {
          left: 'prev',
          center: 'title today',
          right: 'next'
        },
        buttonText: { today: 'Hoje' },
        dayMaxEvents: true,

        dayCellDidMount: function(info) {
          const day = info.date.getDate();

          // Define cores alternadas entre os dias
          info.el.style.backgroundColor = (day % 2 === 0) ? '#e9ecef' : '#ffffff';

          // Destaque para o dia atual
          const today = new Date();
          if (info.date.toDateString() === today.toDateString()) {
            info.el.style.backgroundColor = '#dbe9ff';
            info.el.style.border = '2px solid #0059df';
            info.el.style.borderRadius = '8px';
          }
        }
      });

      calendar.render();
    });
  </script>
</body>
</html>
