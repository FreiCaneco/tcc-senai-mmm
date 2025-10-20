<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Formulário de Cadastro</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- Fonte -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php include "navbar.php" ?>

  <div class="container mt-5">
    <h1 class="mb-4">Nova Disciplina</h1>

    <form>
      <fieldset>
        <legend>Preencha corretamente</legend>

        <!-- Nome-->
        <div class="row g-3 mb-4">
          <div class="col">
             <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" placeholder="Digite o seu Nome" name="nome" required>
          </div>
        </div>

        <!--Formação necessária-->
        <div class="row g-3 mb-4">
          <div class="col">
            <label for="duracao" class="form-label">Carga Horária</label>
            <input type="text" id="duracao" name="duracao" class="form-control" placeholder="Digite a Carga Horária" required>
          </div>
        </div>

        <!-- Professores -->
        <div id="lista-capacitacoes" class="list-group" style="max-height: 250px; overflow-y: auto;">
          <?php 
            require_once "../model/disciplina_model.php";

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
                <div class='w-auto hidden' id='div-select_$id'>
                  <select class='form-select' name='nivel_selecionado[$id]'>
                    <option value='n1'>N1</option>
                    <option value='n2'>N2</option>
                    <option value='n3'>N3</option>
                  </select> 
                </div>
              </label>";
            };
          ?>
        </div>
        </fieldset>

        <!-- Botões de ação -->
        <div class="mt-4">
          <button  style="margin-right:320px; Padding: 5px 50px;" type="submit" class="btn btn-primary">Salvar</button>
          <button style=" Padding: 5px 40px;" type="reset" class="btn btn-secondary">Cancelar</button>
        </div>
      </fieldset>
    </form>
  </div>
</body>
</html>
