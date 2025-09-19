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
    <h1>Novo Professor</h1>

    <form>
      <fieldset>
        <legend>Preencha corretamente</legend>

        <!--Nome e Sobrenome -->
        <div class="g-3 mb-3">
          <label for="nome" class="form-label">Nome</label>
          <div class="col">
            <input type="text" class="form-control" placeholder="Nome" aria-label="Nome">
          </div>
        </div>

        <!--Email -->
        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" id="email" class="form-control" placeholder="nome.sobrenome@exemplo">
        </div>

        <!-- Turno e Carga Horária -->
        <div class="row g-3">
          <div class="col">
            <label for="turno" class="form-label">Turno</label>
            <select id="turno" class="form-select">
              <option selected>Selecione</option>
              <option>Manhã</option>
              <option>Tarde</option>
              <option>Noite</option>
              <option>Manhã e Tarde</option>
              <option>Manhã e Noite</option>
              <option>Tarde e Noite</option>
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

        <!-- Trabalha aos sábados -->
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="trabalha" id="trabalha">
          <label class="form-check-label" for="trabalha">Trabalha aos sábados</label>
        </div>

        <!-- Campo dinâmico para adicionar múltiplas capacitações -->
        <fieldset>
          <legend>Capacitações do Professor</legend>
          <div id="capacitacoes-container">
            <div class="capacitation-group mb-4 border p-3 position-relative">
              <div class="mb-3">
                <label for="cursoNome" class="form-label">Nome do Curso/Capacitação</label>
                <input type="text" class="form-control" placeholder="Digite o nome do curso">
              </div>
              <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 me-2 mt-2 btn-remover">Remover</button>
            </div>
          </div>
          <button type="button" class="btn btn-secondary" id="adicionarCapacitacao">Adicionar Nova Capacitação</button>
        </fieldset>

        <!-- Botões de Ação -->
        <div class="mt-4">
          <button id="bt-primary" type="submit" class="btn btn-primary">Salvar</button>
          <button id="bt-secondary" type="reset" class="btn btn-secondary">Cancelar</button>
        </div>
      </fieldset>
    </form>

    <!-- Script para adicionar novos campos de capacitação -->
    <script>
      document.getElementById('adicionarCapacitacao').addEventListener('click', function () {
        const newGroup = document.createElement('div');
        newGroup.classList.add('capacitation-group', 'mb-4', 'border', 'p-3', 'position-relative');
        newGroup.innerHTML = `
          <div class="mb-3">
            <label for="cursoNome" class="form-label">Nome do Curso/Capacitação</label>
            <input type="text" class="form-control" placeholder="Digite o nome do curso">
          </div>
          <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 me-2 mt-2 btn-remover">Remover</button>
        `;
        document.getElementById('capacitacoes-container').appendChild(newGroup);
      });

      // Delegação de evento para o botão remover (funciona para todos os botões, inclusive os adicionados dinamicamente)
      document.getElementById('capacitacoes-container').addEventListener('click', function (event) {
        if (event.target && event.target.classList.contains('btn-remover')) {
          const group = event.target.closest('.capacitation-group');
          if (group) {
            group.remove();
          }
        }
      });
    </script>
  </body>
</html>