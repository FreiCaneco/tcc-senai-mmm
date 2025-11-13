<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professores</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
  </head>
  <body>

    <?php include "navbar.php"; ?>
    <div class="container mt-4">
      <div id="liveAlertPlaceholder"></div>

      <?php
      if (isset($_GET['status'])) {
        echo "<script>
          document.addEventListener('DOMContentLoaded', function () {
            const alertPlaceholder = document.getElementById('liveAlertPlaceholder');
            const wrapper = document.createElement('div');
            let type = '" . ($_GET['status'] === 'success' ? 'success' : 'danger') . "';
            let message = '" . ($_GET['status'] === 'success' ? 'Novo professor cadastrado com sucesso!' : 'Erro ao tentar criar novo professor.') . "';

            wrapper.innerHTML = [
              `<div class=\"alert alert-\${type} alert-dismissible fade show\" role=\"alert\">`,
              `  <div>\${message}</div>`,
              '  <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>',
              '</div>'
            ].join('');

            alertPlaceholder.append(wrapper);
          });
        </script>";
      }
      ?>
    </div>

    <div class="container mt-4">
      <legend style="font-size: 3.0rem; text-align: center;">Professores Cadastrados</legend>

      <?php
      require_once '../model/professor_model.php';

      $professorModel = new ProfessorModel();
      $professores = $professorModel->selectTodosProfessores();
      if ($professores === null) {
        echo '<div class="alert alert-danger text-center mt-4">Erro ao carregar a lista de professores. Consulte o log de erros do servidor para detalhes.</div>';

      } elseif (!empty($professores)) {

        echo "
        <div class=\"custom-table-container\">
          <table class=\"custom-table\">
            <thead>
              <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Trabalha aos sábados</th>
                <th>Turno</th>
              </tr>
            </thead>
            <tbody>";

        // Loop para preencher as linhas
        foreach ($professores as $prof) {
          $trabalha = $prof['trabalha_sabado'] == 1 ? 'Sim' : 'Não';
          echo '<tr>';
            echo '<td>' . htmlspecialchars($prof['nome']) . '</td>';
            echo '<td>' . htmlspecialchars($prof['cpf']) . '</td>';
            echo '<td>' . htmlspecialchars($prof['telefone']) . '</td>';
            echo '<td>' . htmlspecialchars($prof['email']) . '</td>';
            echo '<td>' . $trabalha . '</td>';
            echo '<td>' . htmlspecialchars($prof['turno']) . '</td>';
          echo '</tr>';
        }

        echo "
        </tbody>
        </table>
        </div>";

      } else {
        echo '<div class="alert alert-info text-center mt-4">Nenhum professor cadastrado até o momento.</div>';
      }
      ?>
    </div>

    <div class='mt-4 d-flex justify-content-center gap-2'>
      <button class="bt-adicionarDisciplina" onclick="window.location.href='criar_professor.php'">+ Novo Professor</button>
    </div>

  </body>
</html>