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

  <div class="container mt-4">
    <h1>Novo Curso</h1>

    <form>
      <fieldset>
        <legend>Preencha corretamente</legend>

        <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" required>
        </div>

        <div class="col mb-4">
            <label for="turno" class="form-label">Turno</label>
            <select id="turno" name="turno" class="form-select" required>
              <option selected disabled>Selecione</option>
              <option>Manhã</option>
              <option>Tarde</option>
              <option>Noite</option>
            </select>
          </div>

        <!-- TABELA DENTRO DO FORM -->
        <h2 style="text-align: center;" class="mb-4 t">Tabela de Horários</h2>

        <table class="table table-bordered table-striped text-center align-middle  mb-5">
          <thead class="table-primary">
            <tr>
              <th colspan="7">Turno</th>
            </tr> 
          </thead>
          <tbody>
            <tr id="linha-manha">
              <th scope="row">Manhã</th>
              <td><button type="button" class="btn btn-outline-primary w-100 dia-btn">Segunda</button></td>
              <td><button type="button" class="btn btn-outline-primary w-100 dia-btn">Terça</button></td>
              <td><button type="button" class="btn btn-outline-primary w-100 dia-btn">Quarta</button></td>
              <td><button type="button" class="btn btn-outline-primary w-100 dia-btn">Quinta</button></td>
              <td><button type="button" class="btn btn-outline-primary w-100 dia-btn">Sexta</button></td>
              <td><button type="button" class="btn btn-outline-primary w-100 dia-btn">Sábado</button></td>
            </tr>
            <tr id="linha-tarde">
              <th scope="row">Tarde</th>
              <td><button type="button" class="btn btn-outline-primary w-100 dia-btn">Segunda</button></td>
              <td><button type="button" class="btn btn-outline-primary w-100 dia-btn">Terça</button></td>
              <td><button type="button" class="btn btn-outline-primary w-100 dia-btn">Quarta</button></td>
              <td><button type="button" class="btn btn-outline-primary w-100 dia-btn">Quinta</button></td>
              <td><button type="button" class="btn btn-outline-primary w-100 dia-btn">Sexta</button></td>
              <td><button type="button" class="btn btn-outline-primary w-100 dia-btn">Sábado</button></td>
            </tr>
            <tr id="linha-noite">
              <th scope="row">Noite</th>
              <td><button type="button" class="btn btn-outline-primary w-100 dia-btn">Segunda</button></td>
              <td><button type="button" class="btn btn-outline-primary w-100 dia-btn">Terça</button></td>
              <td><button type="button" class="btn btn-outline-primary w-100 dia-btn">Quarta</button></td>
              <td><button type="button" class="btn btn-outline-primary w-100 dia-btn">Quinta</button></td>
              <td><button type="button" class="btn btn-outline-primary w-100 dia-btn">Sexta</button></td>
              <td><button type="button" class="btn btn-outline-primary w-100 dia-btn">Sábado</button></td>
            </tr>
          </tbody>
        </table>

      </fieldset>

      <button id="bt-adicionarDisciplina" type="submit" class="btn mb-5" style="text-align: center;" onclick="window.location.href='criar_disciplina.php'">Adicionar Disciplinas</button>
    </form>
  </div>

  <!-- SCRIPT PARA SELEÇÃO DOS DIAS -->


<script>
  const botoesDias = document.querySelectorAll('.dia-btn');

  botoesDias.forEach(botao => {
    botao.addEventListener('click', () => {
      botao.classList.toggle('btn-primary');
      botao.classList.toggle('btn-outline-primary');
      botao.classList.toggle('selected');
    });
  });

  // NOVO CÓDIGO PARA ESCONDER TURNOS
  const selectTurno = document.getElementById('turno');
  const linhaManha = document.getElementById('linha-manha');
  const linhaTarde = document.getElementById('linha-tarde');
  const linhaNoite = document.getElementById('linha-noite');

  selectTurno.addEventListener('change', () => {
    const valorSelecionado = selectTurno.value;

    // Mostra/oculta as linhas com base na seleção
    linhaManha.style.display = (valorSelecionado === 'Manhã') ? 'table-row' : 'none';
    linhaTarde.style.display = (valorSelecionado === 'Tarde') ? 'table-row' : 'none';
    linhaNoite.style.display = (valorSelecionado === 'Noite') ? 'table-row' : 'none';
  });
</script>
</body>

</html>
