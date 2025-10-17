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
            <label for="formacao" class="form-label">Formação Necessária</label>
            <input type="text" id="formacao" name="formacao" class="form-control" placeholder="Digite a formação necessária" required>
          </div>
        </div>

        <!-- Professores -->
        <div class="row g-3 mb-3">
          <div class="col">
            <label for="professores" class="form-label">Professores</label>
            <select id="professores" name="professores" class="form-select" required>
              <option selected disabled>Selecione</option>
              <option>Professor 1</option>
              <option>Professor 2</option>
              <option>Professor 3</option>
              <option>Professor 4</option>
              <option>Professor 5</option>
              <option>Professor 6</option>
            </select>
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
