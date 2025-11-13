<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário de Cadastro</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/styles.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Quicksand', sans-serif;
      background-color: #f8f9fa;
    }

    h1 {
      font-weight: 600;
      text-align: center;
      color: #0d6efd;
      margin-bottom: 1.5rem;
    }

    fieldset {
      background-color: #fff;
      padding: 1.5rem;
      border-radius: 12px;
      border: 1px solid #dee2e6;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
      margin-bottom: 1.5rem;
    }

    legend {
      font-size: 1.25rem;
      font-weight: 600;
      color: #343a40;
    }

    .form-label {
      font-weight: 500;
    }

    .hidden {
      display: none;
    }

    .btn-primary, .btn-secondary {
      padding: 10px 40px;
    }

    #lista-capacitacoes {
      border: 1px solid #dee2e6;
      border-radius: 10px;
      background-color: #fafafa;
      max-height: 250px;
      overflow-y: auto;
    }

    .alert {
      text-align: center;
    }
  </style>
</head>
<body>
  <?php include "navbar.php"; ?>

  <div class="container mt-5 mb-5" style="max-width: 900px;">
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

        <div class="row g-3">
          <div class="col-md-6">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" placeholder="Digite o seu Nome" name="nome" id="nome" required />
          </div>

          <div class="col-md-6">
            <label for="sobrenome" class="form-label">Sobrenome</label>
            <input type="text" class="form-control" placeholder="Digite o seu Sobrenome" name="sobrenome" id="sobrenome" required />
          </div>

          <div class="col-md-6">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="nome.sobrenome@exemplo.com" required />
          </div>

          <div class="col-md-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" id="cpf" name="cpf" class="form-control" placeholder="Digite o CPF" required />
          </div>

          <div class="col-md-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Digite o telefone" required />
          </div>

          <div class="col-md-6">
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

          <div class="col-md-6 d-flex align-items-center mt-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="trabalha_sabado" name="trabalha_sabado" value="1" />
              <label class="form-check-label" for="trabalha_sabado">Trabalha aos sábados</label>
            </div>
          </div>
        </div>
      </fieldset>

      <fieldset>
        <legend>Capacitações do Professor</legend>

        <form class="d-flex gap-2 mb-3" onsubmit="return false;">
          <div class="flex-grow-1">
            <label for="search-capacitacao" class="form-label">Pesquisar Capacitação</label>
            <input type="text" id="search-capacitacao" class="form-control" placeholder="Digite para filtrar..." />
          </div>
          <div class="d-flex align-items-end">
            <button type="button" id="btnPesquisar" class="btn btn-outline-primary">Pesquisar</button>
          </div>
        </form>

        <div id="lista-capacitacoes" class="list-group">
          <?php 
          require_once "../model/disciplina_model.php";
          $disciplinaModel = new DisciplinaModel();
          $disciplinas = $disciplinaModel->buscarTodas();

          // Ordenar alfabeticamente
          usort($disciplinas, function($a, $b) {
            return strcmp($a['nome'], $b['nome']);
          });

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

      <div class="d-flex justify-content-between mt-4">
        <button type="reset" class="btn btn-secondary">Cancelar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
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

      // Filtro de capacitações (com botão e acentos)
      const searchInput = document.getElementById('search-capacitacao');
      const searchButton = document.getElementById('btnPesquisar');
      const listItems = document.querySelectorAll('.list-group-item');

      const normalizeText = (text) =>
        text.normalize('NFD').replace(/[\u0300-\u036f]/g, '').toLowerCase();

      const filtrar = () => {
        const searchTerm = normalizeText(searchInput.value.trim());
        let encontrou = false;

        listItems.forEach(item => {
          const nome = normalizeText(item.querySelector('span').textContent);
          const match = nome.includes(searchTerm);
          item.style.display = match ? 'flex' : 'none';
          if (match) encontrou = true;
        });

        if (!encontrou && searchTerm !== '') {
          if (!document.getElementById('no-results')) {
            const msg = document.createElement('div');
            msg.id = 'no-results';
            msg.className = 'alert alert-warning mt-2';
            msg.textContent = 'Nenhuma disciplina encontrada.';
            document.getElementById('lista-capacitacoes').appendChild(msg);
          }
        } else {
          const msg = document.getElementById('no-results');
          if (msg) msg.remove();
        }
      };

      searchInput.addEventListener('input', filtrar);
      searchButton.addEventListener('click', filtrar);
    });
  </script>
</body>
</html>
