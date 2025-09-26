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

  <div class="container mt-5">
    <h1 class="mb-4">Novo Professor</h1>

    <form>
      <fieldset>
        <legend>Preencha corretamente</legend>

        <!-- Nome e Sobrenome -->
        <div class="row g-3 mb-4">
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
        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="nome.sobrenome@exemplo.com" required>
        </div>

        <!-- CPF e Telefone -->
        <div class="row g-3 mb-4">
          <div class="col">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" id="cpf" name="CPF" class="form-control" placeholder="Digite o CPF" required>
          </div>
          <div class="col">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Digite o telefone" required>
          </div>
        </div>

        <!-- Turno e Carga Horária -->
        <div class="row g-3 mb-3">
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

        <!-- Trabalha aos sábados -->
       <div style="margin-top: 20px;" class="form-check">
          <input class="form-check-input" type="checkbox" value="trabalha" id="trabalha">
          <label class="form-check-label" for="trabalha">Trabalha aos sábados</label>
        </div>

        <!-- Capacitações Dinâmicas -->
        <fieldset class="mb-4">
          <legend>Capacitações do Professor</legend>
          <div id="capacitacoes-container">
            <div class="border p-3 position-relative">
              <div class>
                <label class="form-label">Nome do Curso/Capacitação</label>
              </div>
            </div>
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
