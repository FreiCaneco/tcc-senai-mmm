<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>

    <!-- Link para os estilos do Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Link para o arquivo de estilos personalizado -->
    <link rel="stylesheet" href="css/styles.css">

    <!-- Script do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" 
            crossorigin="anonymous"></script>

    <!-- Fonte personalizada -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">

  </head>

  <body>
    <!-- Inclusão do menu de navegação -->
    <?php include "navbar.php" ?>
    <h1>Novo Curso</h1>
    <form>

      <fieldset>
        <legend>Preencha corretamente</legend>

        <div class="g-3 mb-3">
          <label for="nome" class="form-label">Nome</label>
          <div class="col">
            <input type="text" class="form-control" placeholder="Nome do Curso" aria-label="Nome">
          </div>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" id="email" class="form-control" placeholder="nome.sobrenome@exemplo">
        </div>

        <div class="row g-3">
          <div class="col">
            <label for="turno" class="form-label">Turno</label>
            <select id="turno" class="form-select">
              <option selected>Selecione</option>
              <option>Manhã</option>
              <option>Tarde</option>
              <option>Noite</option>
            </select>
          </div>

          <div class="col">
            <label for="cargaHoraria" class="form-label">Carga Horária</label>
            <select id="cargaHoraria" class="form-select">
              <option selected>Selecione</option>
              <option>20 Horas</option>
              <option>40 Horas</option>
            </select>
          </div>
        </div>
      </fieldset>    
    </form>
  </body>
</html>
