<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário de Cadastro</title>

  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/styles.css">

  <script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" 
    crossorigin="anonymous">
  </script>

  <!-- Fonte -->
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
  <?php include "navbar.php"; ?>

  <div class="container mt-4">
    <h1 class="mb-4">Novo Professor</h1>

    <?php
    if (isset($_GET['status'])) {
      if ($_GET['status'] == 'success') {
        echo '<div class="alert alert-success" role="alert">Formulário feito com sucesso</div>';
      } elseif ($_GET['status'] == 'error') {
        echo '<div class="alert alert-danger" role="alert">Erro no formulário</div>';
      }
    }
    ?>

    <form method="POST" action="../controller/c_criar_professor.php">
      <fieldset>
        <legend>Preencha corretamente</legend>

        <div class="row mb-4">
          <div class="col">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" placeholder="Digite o seu Nome" name="nome" id="nome" required />
          </div>
          <div class="col">
            <label for="sobrenome" class="form-label">Sobrenome</label>
            <input type="text" class="form-control" placeholder="Digite o seu Sobrenome" name="sobrenome" id="sobrenome" required />
          </div>
        </div>

        <div class="mb-4">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="nome.sobrenome@exemplo.com" required />
        </div>

        <div class="row mb-4">
          <div class="col">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" id="cpf" name="cpf" class="form-control" placeholder="Digite o CPF" required />
          </div>
          <div class="col">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Digite o telefone" required />
          </div>
        </div>

        <div class="row g-3 mb-4">
          <div class="col">
            <label for="turno" class="form-label">Turno</label>
            <select id="turno" name="turno" class="form-select" required>
              <option selected disabled>Selecione</option>
              <option value="manhã">Manhã</option>
              <option value="tarde">Tarde</option>
              <option value="noite">Noite</option>
              <option value="manhã-tarde">Manhã e Tarde</option>
              <option value="manhã-noite">Manhã e Noite</option>
              <option value="tarde-noite">Tarde e Noite</option>
            </select>
          </div>
        </div>

        <div class="form-check mt-3 mb-4">
          <input class="form-check-input" type="checkbox" id="trabalha" name="trabalha" value="1" />
          <label class="form-check-label" for="trabalha">Trabalha durante a semana</label>

          <input class="form-check-input ms-3" type="checkbox" id="trabalha_sabado" name="trabalha_sabado" value="1" />
          <label class="form-check-label" for="trabalha_sabado">Trabalha aos sábados</label>
        </div>
      </fieldset>

      <fieldset class="mt-4">
        <legend>Capacitações do Professor</legend>

        <div class="mb-4">
          <label for="search-capacitacao" class="form-label">Pesquisar Capacitação</label>
          <input type="text" id="search-capacitacao" class="form-control" placeholder="Digite para filtrar..." />
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
                <input class='form-check-input me-1 disciplina-checkbox' type='checkbox' id='checkbox_$id' name='disciplinas[]' value='$id'>
                <span>$disciplinaNome</span>
              </div>
              <div class='w-auto hidden' id='div-select_$id'>
                <select class='form-select' name='nivel_selecionado[$id]'>
                  <option value='n1'>N1</option>
                  <option value='n2'>N2</option>
                  <option value='n3'>N3</option>
                </select>
              </div>
            </label>";
          }
          ?>
        </div>
      </fieldset>

      <!-- Botões de ação -->
      <div class="mt-4">
        <button type="submit" class="btn btn-primary" style="margin-right: 320px; padding: 5px 50px;">Salvar</button>
        <button type="reset" class="btn btn-secondary" style="padding: 5px 40px;">Cancelar</button>
      </div>
    </form>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Mostrar select ao marcar checkbox
      const checkboxes = document.querySelectorAll('.disciplina-checkbox');
      checkboxes.forEach(checkbox => {
        const id = checkbox.id.split('_').pop();
        const conteudo = document.getElementById(`div-select_${id}`);
        checkbox.addEventListener('change', () => {
          conteudo.classList.toggle('hidden', !checkbox.checked);
        });
      });

      // Filtro de capacitações
      const searchInput = document.getElementById('search-capacitacao');
      const listItems = document.querySelectorAll('.list-group-item');
      searchInput.addEventListener('keyup', () => {
        const searchTerm = searchInput.value.trim().toLowerCase();
        listItems.forEach(item => {
          const nome = item.querySelector('span').textContent.toLowerCase();
          item.style.display = nome.includes(searchTerm) ? 'flex' : 'none';
        });
      });
    });
  </script>
</body>
</html>
