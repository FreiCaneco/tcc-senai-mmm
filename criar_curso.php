<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Formulário de Cadastro</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

  <?php include "navbar.php" ?>

  <div class="container mt-4">
    <h1>Novo Curso</h1>

    <form>
      <fieldset>
        <legend>Preencha corretamente</legend>

        <div class="mb-4">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" required>
        </div>

        <div class="col mb-4">
          <label for="turno" class="form-label">Turno</label>
          <select id="turno" name="turno" class="form-select" required>
            <option selected>Manhã</option>
            <option>Tarde</option>
            <option>Noite</option>
          </select>
        </div>

        <legend id="titulo-tabela" style="display: none;">Tabela de Horários</legend>

        <table id="tabela-horarios" class="table table-bordered table-striped text-center align-middle" style="display: none;">
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

        <legend>Disciplinas do curso</legend>
        <div id="lista-capacitacoes" class="list-group" style="max-height: 250px; overflow-y: auto;">
          <?php 
            require_once "./model/disciplina_model.php";

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
    </form>
  </div>

  <script>
    // Seleção dos botões para o efeito toggle
    const botoesDias = document.querySelectorAll('.dia-btn');
    botoesDias.forEach(botao => {
      botao.addEventListener('click', () => {
        botao.classList.toggle('btn-primary');
        botao.classList.toggle('btn-outline-primary');
        botao.classList.toggle('selected'); // Adiciona uma classe 'selected' para controle
      });
    });

    // CÓDIGO PARA EXIBIR TABELA APÓS SELEÇÃO DO TURNO
    const selectTurno = document.getElementById('turno');
    const tabelaHorarios = document.getElementById('tabela-horarios');
    const tituloTabela = document.getElementById('titulo-tabela');

    const linhaManha = document.getElementById('linha-manha');
    const linhaTarde = document.getElementById('linha-tarde');
    const linhaNoite = document.getElementById('linha-noite');

    // Função que encapsula a lógica de exibição/ocultação das linhas e da tabela
    function atualizarExibicaoTurno() {
      const valorSelecionado = selectTurno.value;

      // Exibe tabela e título apenas se houver seleção válida
      if (valorSelecionado && valorSelecionado !== 'Selecione') {
        tabelaHorarios.style.display = 'table';
        tituloTabela.style.display = 'block';
      } else {
        tabelaHorarios.style.display = 'none';
        tituloTabela.style.display = 'none';
      }

      // Esconde todas as linhas antes de mostrar a correta
      linhaManha.style.display = 'none';
      linhaTarde.style.display = 'none';
      linhaNoite.style.display = 'none';

      // Mostra apenas a linha correspondente
      if (valorSelecionado === 'Manhã') linhaManha.style.display = 'table-row';
      if (valorSelecionado === 'Tarde') linhaTarde.style.display = 'table-row';
      if (valorSelecionado === 'Noite') linhaNoite.style.display = 'table-row';
    }

    // Adiciona o listener ao <select>
    selectTurno.addEventListener('change', atualizarExibicaoTurno);

    // NOVO CÓDIGO: Dispara a função no carregamento da página
    document.addEventListener('DOMContentLoaded', () => {
      // 1. Opcional: Garante que "Manhã" esteja selecionado no <select> (se não estiver no HTML)
      // selectTurno.value = 'Manhã'; // Descomente se não conseguir garantir isso pelo HTML
      
      // 2. Chama a função de atualização para exibir o turno inicial
      atualizarExibicaoTurno(); 
    });
</script>
</body>
</html>