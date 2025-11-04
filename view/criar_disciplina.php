<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <title>Nova Disciplina</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/styles.css">

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
          crossorigin="anonymous"></script>

  <!-- Fonte -->
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">

  <style>
    .hidden { display: none; }
    .list-group-item { cursor: pointer; }
  </style>
</head>

<body>
  <?php include "navbar.php"; ?>

  <div class="container mt-5">
    <h1 class="mb-4 text-center">Nova Disciplina</h1>

    <form method="POST" action="../controller/c_criar_disciplina.php">
      <fieldset>
        <legend>Preencha corretamente</legend>

        <!-- Nome -->
        <div class="mb-4">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome da disciplina" required>
        </div>

        <!-- Carga horária -->
        <div class="mb-4">
          <label for="duracao" class="form-label">Carga Horária</label>
          <input type="number" id="duracao" name="duracao" class="form-control" placeholder="Digite a carga horária em horas" required>
        </div>

        <!-- Professores -->
        <legend>Professores Habilitados</legend>
        <div id="lista-capacitacoes" class="list-group" style="max-height: 300px; overflow-y: auto;">
          <?php 
            require_once "../model/disciplina_model.php";
            $disciplinaModel = new DisciplinaModel();
            $disciplinas = $disciplinaModel->buscarTodas();

            foreach ($disciplinas as $disciplina) {
              $id = $disciplina['id_disciplina'];
              $nome = ucfirst(str_replace('-', ' ', $disciplina['nome']));
              echo "
              <label class='list-group-item d-flex justify-content-between align-items-center'>
                <div class='d-flex align-items-center'>
                  <input class='form-check-input me-2 disciplina-checkbox' type='checkbox' id='checkbox_$id' name='disciplinas[]' value='$id'>
                  <span>$nome</span>
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

        <!-- Botões -->
        <div class="mt-4 d-flex justify-content-center gap-3">
          <button type="submit" class="btn btn-primary px-5">Salvar</button>
          <button type="reset" class="btn btn-secondary px-5">Cancelar</button>
        </div>
      </fieldset>
    </form>
  </div>

  <script>
    // Mostrar o select (N1, N2, N3) apenas quando o checkbox for marcado
    document.querySelectorAll('.disciplina-checkbox').forEach(checkbox => {
      checkbox.addEventListener('change', () => {
        const selectDiv = document.getElementById(`div-select_${checkbox.id.split('_')[1]}`);
        selectDiv.classList.toggle('hidden', !checkbox.checked);
      });
    });
  </script>
</body>
</html>
