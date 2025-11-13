<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Novo Curso</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php include "../view/navbar.php"; ?>

  <div class="container mt-4">
    <h1 class="text-center mb-4">Novo Curso</h1>

    <form method="POST" action="../controller/c_criar_curso.php">
      <fieldset>
        <legend>Preencha corretamente</legend>

        <div class="mb-4">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" required>
        </div>

        <div class="mb-4">
          <label for="turno" class="form-label">Turno</label>
          <select id="turno-select" name="turno" class="form-select" required>
            <option selected>Manhã</option>
            <option>Tarde</option>
            <option>Noite</option>
          </select>
        </div>

        <legend>Tabela de Horários</legend>
        <table id="tabela-horario" class="table table-bordered table-striped text-center align-middle">
          <thead class="table-primary">
            <tr><th colspan="7">Turno</th></tr>
          </thead>
          <tbody>
            <tr id="linha-dia">
              <th id="titulo-linha" scope="row">Nenhum</th>
              <?php
                $dias = ['segunda', 'terça', 'quarta', 'quinta', 'sexta', 'sábado'];
                foreach ($dias as $dia) {
                  echo "
                    <td>
                      <button type='button' class='btn btn-outline-primary w-100 dia-btn' value='$dia'>
                        " . ucfirst($dia) . "
                      </button>
                      <input type='hidden' name='horarios[]' data-input-dia='$dia' disabled>
                    </td>
                  ";
                }
              ?>
            </tr>
          </tbody>
        </table>

        <legend>Disciplinas do Curso</legend>
        <div class="mb-4">
          <label for="search-capacitacao" class="form-label">Pesquisar Capacitação</label>
          <input type="text" id="search-capacitacao" class="form-control" placeholder="Digite para filtrar...">
        </div>

        <div class="text-end mb-3">
           <button 
            type="button" 
            class="btn btn-outline-primary bg-white text-primary border-primary shadow-sm px-4 py-2 fw-semibold" data-bs-toggle="modal"  data-bs-target="#modalNovaDisciplina">
            + Nova Disciplina
          </button>
        </div>

        <div id="lista-capacitacoes" class="list-group" style="max-height: 250px; overflow-y: auto;">
          <?php 
            require_once "../model/disciplina_model.php";
            $disciplinaModel = new DisciplinaModel();
            $disciplinas = $disciplinaModel->buscarTodas();
            foreach ($disciplinas as $disciplina) {
              $id = $disciplina['id_disciplina'];
              $disciplinaNome = ucfirst(str_replace('-', ' ', $disciplina['nome']));
              echo "
                <label class='list-group-item d-flex justify-content-between align-items-center'>
                  <div class='me-3'>
                    <input class='form-check-input me-1 disciplina-checkbox' type='checkbox' id='checkbox_$id' name='disciplinasIds[$id]' value='$id'>
                    <span>$disciplinaNome</span>
                  </div>
                </label>
              ";
            }
          ?>
        </div>

        <div class="mt-4 d-flex justify-content-center gap-3">
          <button type="submit" class="btn btn-primary px-5">Salvar</button>
          <button type="reset" class="btn btn-secondary px-5">Cancelar</button>
        </div>
      </fieldset>
    </form>
  </div>


 <!-- MODAL NOVA DISCIPLINA -->
<div class="modal fade" id="modalNovaDisciplina" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nova Disciplina</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>

      <div class="modal-body">
        <form id="formNovaDisciplina" method="POST" action="../controller/c_criar_disciplina.php">
          <fieldset>
            <legend>Preencha corretamente</legend>

            <div class="mb-4">
              <label for="nome-disciplina" class="form-label">Nome</label>
              <input type="text" id="nome-disciplina" name="nome" class="form-control" placeholder="Digite o nome da disciplina" required>
            </div>

            <div class="mb-4">
              <label for="duracao" class="form-label">Carga Horária (em horas)</label>
              <input type="number" id="duracao" name="duracao" class="form-control" placeholder="Digite a carga horária" required>
            </div>
          </fieldset>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <!-- Envia o form -->
        <button type="submit" form="formNovaDisciplina" class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const botoesDias = document.querySelectorAll('.dia-btn');
      const selectTurno = document.getElementById('turno-select');
      const tituloLinha = document.getElementById('titulo-linha');
      const searchInput = document.getElementById('search-capacitacao');
      const listItems = document.querySelectorAll('.list-group-item');
      selectTurno.addEventListener('change', () => tituloLinha.textContent = selectTurno.value);
      tituloLinha.textContent = selectTurno.value;
      botoesDias.forEach(botao => {
        const inputOculto = botao.nextElementSibling;
        botao.addEventListener('click', () => {
          botao.classList.toggle('btn-primary');
          botao.classList.toggle('btn-outline-primary');
          botao.classList.toggle('selected');
          inputOculto.value = botao.classList.contains('selected') ? botao.value : '';
          inputOculto.disabled = !botao.classList.contains('selected');
        });
      });
      searchInput.addEventListener('keyup', () => {
        const termo = searchInput.value.trim().toLowerCase();
        listItems.forEach(item => {
          const nome = item.querySelector('span').textContent.toLowerCase();
          item.style.display = nome.includes(termo) ? 'flex' : 'none';
        });
      });
      document.querySelectorAll('.professor-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', () => {
          const selectDiv = document.getElementById(`div-select_${checkbox.id.split('_')[2]}`);
          selectDiv.classList.toggle('hidden', !checkbox.checked);
        });
      });
    });
  </script>
</body>
</html>
