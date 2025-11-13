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
      <form action="../controller/gerar_eventos.php" method="POST" class="form-gen">
      <div id='parteDaEsquerda'>
        <h2 class="titulo-curso">
          <?= $curso ? htmlspecialchars($curso['nome']) : 'Curso não encontrado' ?>
        </h2>
        <div class="mb-3">
          <label for="dataInicioCurso" class="form-label">Início do Curso</label>
          <input type="date"
            class="form-control"
            id="dataInicioCurso"
            name="data_inicio_curso"
            required>
        </div>

        <div class="mb-3">
          <label for="dataFimCurso" class="form-label">Fim do Curso</label>
          <input type="date"
            class="form-control"
            id="dataFimCurso"
            name="data_fim_curso"
            required>
        </div>
        <?php
          require_once '../model/disciplina_curso_model.php';
          require_once '../model/disciplina_model.php';

          $cursoDisciplinaModel = new DisciplinaCursoModel();
          $disciplinas_curso = $cursoDisciplinaModel->buscarDisciplinasPorCursoID($idCurso);

          // Garante Todos IDs a serem procurados pelo disciplina model
          $idsDisciplinas = array_column($disciplinas_curso, 'id_disciplina');

          $disciplinaModel = new DisciplinaModel();
          $disciplinas = $disciplinaModel->buscarPorListaDeID($idsDisciplinas);

          $disciplinas_json = htmlspecialchars(json_encode($disciplinas));
        ?>

        <input type="hidden" name="disciplinas_data" value="<?= $disciplinas_json ?>">

        <button type="button"
          class="btn btn-primary mt-3 mb-3"
          data-bs-toggle="modal"
          data-bs-target="#modalDisciplinas">
          Visualizar Disciplinas (<?= count($disciplinas) ?>)
        </button>

        <button type="submit" style="text-align: center;" class="btn btn-light bt-curso">Gerar</button>
      </div>
  </form>

      <div id='calendar'></div>

      <div class="modal fade" id="eventDetailModal" tabindex="-1" aria-labelledby="eventDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalTitle">Detalhes do Evento</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <h6 class="mb-3" id="modalCourseTitle"></h6>
              <p id="modalEventTime"></p>

              <h5 class="mt-4">Disciplinas e Professores Associadas:</h5>
              <ul class="list-group" id="professorList"></ul>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modalDisciplinas" tabindex="-1" aria-labelledby="modalDisciplinasLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="modalDisciplinasLabel">
              Disciplinas do Curso: <?= $curso ? htmlspecialchars($curso['nome']) : 'Curso' ?>
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <?php
              // Verifica se a lista de disciplinas foi preenchida
              if (!empty($disciplinas)):
                // Mantendo o ID 'lista-disciplinas-ordenavel' caso você queira reativar a funcionalidade SortableJS
                echo '<ul id="lista-disciplinas-ordenavel" class="list-group">';

                foreach ($disciplinas as $disciplina) {
                  $id = $disciplina['id_disciplina'];
                  // Formata o nome para exibição (Ex: banco-de-dados -> Banco de dados)
                  $nome = ucfirst(str_replace('-', ' ', $disciplina['nome']));

                  echo "<li class='list-group-item' data-id='{$id}'>";
                  echo "  <span>{$nome}</span>";
                  echo "</li>";
                }
                echo '</ul>';
              else:
                echo '<p class="text-center text-muted">Nenhuma disciplina associada a este curso.</p>';
              endif;
            ?>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
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
            color: '#28a745',
            extendedProps: {
              turno: "Manhã",
              detalhes: [
                {
                  professor: 'Carlos',
                  disciplina: 'Banco de dados',
                },
                {
                  professor: 'Mauricio',
                  disciplina: 'Bolas',
                }
              ]
            }
          },
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
        },

        eventClick: function(info) {
          info.jsEvent.preventDefault();
          const event = info.event;
          const extendedProps = event.extendedProps;
          const listaDetalhes = extendedProps.detalhes;

          if (!listaDetalhes || listaDetalhes.length === 0) {
            alert(`Nenhum detalhe associado encontrado para: ${event.title}`);
            return;
          }

          const professorListEl = document.getElementById('professorList');
          professorListEl.innerHTML = '';

          // Atualiza o Título principal do Modal
          document.getElementById('modalTitle').innerText = `Detalhes: ${event.title}`;

          // Atualiza o Título do Curso/Turno
          document.getElementById('modalCourseTitle').innerText = `Turno: ${extendedProps.turno || 'Não Definido'}`;

          // Monta a lista de professores/disciplinas
          listaDetalhes.forEach(detalhe => {
            const listItem = document.createElement('li');
            listItem.className = 'list-group-item';
            listItem.innerHTML = `
              <strong>${detalhe.disciplina}</strong>
              <br>
              Professor(a): ${detalhe.professor}`;
            professorListEl.appendChild(listItem);
          });

          // 3. Abre o Modal do Bootstrap
          const modal = new bootstrap.Modal(document.getElementById('eventDetailModal'));
          modal.show();
        }
      });

      calendar.render();
    });
  </script>
</html>