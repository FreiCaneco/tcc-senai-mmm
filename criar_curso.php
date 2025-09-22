<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Formulário de Cadastro</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- Fonte -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php include "navbar.php" ?>
    <h1>Novo Curso</h1>

    <form>
      <fieldset>
        <legend>Preencha corretamente</legend>

        <div class="g-3 mb-3">
          <label for="nome" class="form-label">Nome</label>
          <div class="col">
            <input type="text" class="form-control" placeholder="Nome" aria-label="Nome">
          </div>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" id="email" class="form-control" placeholder="nome.sobrenome@exemplo">
        </div>

        <div class="container">
    <h2 class="mb-4">Tabela de Horários</h2>

    <table class="table table-bordered table-striped text-center align-middle">
      <thead class="table-primary">
        <tr>
          <th>Período</th>
          <th>Segunda</th>
          <th>Terça</th>
          <th>Quarta</th>
          <th>Quinta</th>
          <th>Sexta</th>
          <th>Sábado</th>
          <th>Domingo</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">Manhã</th>
          <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
        </tr>
        <tr>
          <th scope="row">Tarde</th>
          <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
        </tr>
        <tr>
          <th scope="row">Noite</th>
          <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
        </tr>
      </tbody>
    </table>
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

    </form>
</html>