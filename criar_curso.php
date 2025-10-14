<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Formulário de Cadastro</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

  <?php include "navbar.php" ?>

  <div class="container mt-4">
    <h1>Novo Curso</h1>

    <form>
      <fieldset>
        <legend>Preencha corretamente</legend>

        <div class="mb-4">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" required>
        </div>

        <div class="col mb-4">
          <label for="turno" class="form-label">Turno</label>
          <select id="turno-select" name="turno" class="form-select" required>
            <option selected>Manhã</option>
            <option>Tarde</option>
            <option>Noite</option>
          </select>
        </div>

        <legend id="titulo-tabela" style="display: none;">Tabela de Horários</legend>
        <table id="tabela-horario" class="table table-bordered table-striped text-center align-middle">
          <thead class="table-primary">
            <tr>
              <th colspan="7">Turno</th>
            </tr> 
          </thead>
          <tbody>
            <tr id="linha-dia">
              <th id='titulo-linha' scope="row">Nenhum</th>
              <td><button type="button" class="btn btn-outline-primary w-100 dia-btn">Segunda</button></td>
              <td><button type="button" class="btn btn-outline-primary w-100 dia-btn">Terça</button></td>
              <td><button type="button" class="btn btn-outline-primary w-100 dia-btn">Quarta</button></td>
              <td><button type="button" class="btn btn-outline-primary w-100 dia-btn">Quinta</button></td>
              <td><button type="button" class="btn btn-outline-primary w-100 dia-btn">Sexta</button></td>
              <td><button type="button" class="btn btn-outline-primary w-100 dia-btn">Sábado</button></td>
            </tr>
          </tbody>
        </table>

        <legend>Disciplinas do curso</legend>

        <div class="mb-4">
          <label for="search-capacitacao" class="form-label">Pesquisar Capacitação</label>
          <input type="text" id="search-capacitacao" class="form-control" placeholder="Digite para filtrar...">
        </div>

        <div id="lista-capacitacoes" class="list-group" style="max-height: 250px; overflow-y: auto;">
          <?php 
            require_once "./model/disciplina_model.php";

            $disciplinaModel = new DisciplinaModel();
            $disciplinas = $disciplinaModel->buscarTodas();

            foreach ($disciplinas as $disciplina) {
              $id = $disciplina['id_disciplina'];
              $disciplinaNome = ucfirst(str_replace('-',' ', $disciplina['nome']));
              
              echo "
              <label class='list-group-item d-flex justify-content-between align-items-center'>
                <div class='me-3'>
                  <input class='form-check-input me-1 disciplina-checkbox' type='checkbox' id='checkbox_$id'>
                  <span>$disciplinaNome</span>
                </div>
              </label>";
            };
          ?>
        </div>

        <div class='mt-4'>
          <button type='submit' class='btn btn-primary'>
            Salvar
          </button>
          <button type='reset'class='btn btn-secondary'>
            Cancelar
          </button>
        </div>
      </fieldset>
    </form>
  </div>

  <script>
    // Seleção dos botões para o efeito toggle
    const botoesDias = document.querySelectorAll('.dia-btn');
    botoesDias.forEach(botao => {
      botao.addEventListener('click', () => {
        botao.classList.toggle('btn-primary');
        botao.classList.toggle('btn-outline-primary');
        botao.classList.toggle('selected'); // Adiciona uma classe 'selected' para controle
      });
    });

    // CÓDIGO PARA MUDAR TITULO LINHA DA TABELA APÓS SELEÇÃO DO TURNO
      const selectTurno = document.getElementById('turno-select');
      const tituloLinhaTabela = document.getElementById('titulo-linha');
      function atualizarTituloLinhaTabela() {
        const valorSelecionado = selectTurno.value;
        tituloLinhaTabela.textContent = valorSelecionado;
      }
      selectTurno.addEventListener('change',atualizarTituloLinhaTabela);
      atualizarTituloLinhaTabela();

    // Parte Responsavel pela procura de capacitações
      const searchInput = document.getElementById('search-capacitacao');
      const listItems = document.querySelectorAll('.list-group-item');

      searchInput.addEventListener('keyup', function() {
        const searchTerm = searchInput.value.trim().toLowerCase();

        listItems.forEach(item => {
          const disciplinaNomeElement = item.querySelector('span');

          if(disciplinaNomeElement) {
            const nome = disciplinaNomeElement.textContent.toLowerCase();
            
            if(nome.includes(searchTerm)) {
              item.setAttribute('style', 'display: flex !important');
            } else {
              item.setAttribute('style', 'display: none !important');
            }
          }
        })
      })
</script>
</body>
</html>