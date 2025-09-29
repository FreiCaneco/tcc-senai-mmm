<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Formulário de Cadastro</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">

    <!-- Bootstrap JS -->
    <script 
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" 
      crossorigin="anonymous">
    </script>

    <!-- Fonte -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php include "navbar.php" ?>

    <div class="container mt-4">
      <h1 class="mb-4">Novo Professor</h1>

      <form>
        <fieldset>
          <legend>Preencha corretamente</legend>

          <!-- Nome e Sobrenome -->
          <div class="row mb-4">
            <div class="col">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" class="form-control" placeholder="Digite o seu Nome" name="nome" required>
            </div>
            <div class="col">
              <label for="sobrenome" class="form-label">Sobrenome</label>
              <input type="text" class="form-control" placeholder="Digite o seu Sobrenome" name="sobrenome" required>
            </div>
          </div>

          <!-- E-mail -->
          <div class="mb-4">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="nome.sobrenome@exemplo.com" required>
          </div>

          <!-- CPF e Telefone -->
          <div class="row mb-4">
            <div class="col">
              <label for="cpf" class="form-label">CPF</label>
              <input type="text" id="cpf" name="CPF" class="form-control" placeholder="Digite o CPF" required>
            </div>
            <div class="col">
              <label for="telefone" class="form-label">Telefone</label>
              <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Digite o telefone" required>
            </div>
          </div>

          <!-- Turno -->
          <div class="row g-3 mb-4">
            <div class="col">
              <label for="turno" class="form-label">Turno</label>
              <select id="turno" name="turno" class="form-select" required>
                <option selected disabled>Selecione</option>
                <option>Manhã</option>
                <option>Tarde</option>
                <option>Noite</option>
                <option>Manhã e Tarde</option>
                <option>Manhã e Noite</option>
                <option>Tarde e Noite</option>
              </select>
            </div>
          </div>

          <!-- Trabalha aos sábados -->
          <div class="form-check mt-3 mb-4">
            <input class="form-check-input" type="checkbox" value="trabalha" id="trabalha">
            <label class="form-check-label" for="trabalha">Trabalha aos sábados</label>
          </div>
        </fieldset>

        <fieldset>
          <legend>Capacitações do Professor</legend>

          <!-- Barra de busca -->
          <div class="mb-4">
            <label for="searchCapacitacao" class="form-label">Pesquisar Capacitação</label>
            <input type="text" id="searchCapacitacao" class="form-control" placeholder="Digite para filtrar...">
          </div>

          <!-- Lista de capacitações -->
          <div id="listaCapacitacoes" class="list-group" style="max-height: 250px; overflow-y: auto;">

            <!-- Didática -->
            <label class="list-group-item d-flex justify-content-between align-items-center">
              <div class="me-3">
                <input type="checkbox" class="form-check-input me-1" name="capacitacoes[Didática][ativo]">
                <span>Automação</span>
              </div>
              <select name="capacitacoes[Didática][nivel]" class="form-select form-select-sm w-auto">
                <option value="N1">N1</option>
                <option value="N2">N2</option>
                <option value="N3">N3</option>
              </select>
            </label>

            <!-- Gestão Escolar -->
            <label class="list-group-item d-flex justify-content-between align-items-center">
              <div class="me-3">
                <input type="checkbox" class="form-check-input me-1" name="capacitacoes[Gestão Escolar][ativo]">
                <span>Desenvolvimento de Sistemas</span>
              </div>
              <select name="capacitacoes[Gestão Escolar][nivel]" class="form-select form-select-sm w-auto">
                <option value="N1">N1</option>
                <option value="N2">N2</option>
                <option value="N3">N3</option>
              </select>
            </label>

            <!-- Didática -->
            <label class="list-group-item d-flex justify-content-between align-items-center">
              <div class="me-3">
                <input type="checkbox" class="form-check-input me-1" name="capacitacoes[Didática][ativo]">
                <span>Mecatrônica</span>
              </div>
              <select name="capacitacoes[Didática][nivel]" class="form-select form-select-sm w-auto">
                <option value="N1">N1</option>
                <option value="N2">N2</option>
                <option value="N3">N3</option>
              </select>
            </label>
          </div>
        </fieldset>

        <!-- Botões de ação -->
        <div class="mt-4">
          <button type="submit" class="btn btn-primary" style="margin-right: 320px; padding: 5px 50px;">Salvar</button>
          <button type="reset" class="btn btn-secondary" style="padding: 5px 40px;">Cancelar</button>
        </div>
      </form>
    </div>
  </body>
</html>
