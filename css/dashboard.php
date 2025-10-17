<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Cursos Cadastrados</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
  </head>
<body>

  <?php include "navbar.php"; ?>

  <div class="container mt-5">
    <h1 class="page-header">Cursos Cadastrados</h1>

    <?php
    require_once 'db/connection.php';

    try {
        $database = new Database();
        $conn = $database->getConnection();

        $query = "SELECT * FROM curso ORDER BY nome ASC";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($cursos) > 0) {
            echo '<div class="table-container">';
            echo '<div class="table-responsive">';
            echo '<table class="table table-bordered table-striped align-middle">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Nome do Curso</th>';
            echo '<th>Horário</th>';
            echo '<th>Turno</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            foreach ($cursos as $curso) {
                $horarios = str_replace(',', ', ', $curso['horario']);
                $turno_formatado = ucfirst($curso['turno']);
                
                echo '<tr>';
                echo '<td>' . htmlspecialchars($curso['id_curso']) . '</td>';
                echo '<td>' . htmlspecialchars($curso['nome']) . '</td>';
                echo '<td>' . htmlspecialchars($horarios) . '</td>';
                echo '<td>' . htmlspecialchars($turno_formatado) . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
        } else {
            echo '<div class="alert alert-info text-center mt-4">Nenhum curso cadastrado até o momento.</div>';
        }

    } catch (Exception $e) {
        echo '<div class="alert alert-danger text-center mt-4">Erro ao carregar cursos: ' . $e->getMessage() . '</div>';
    }
    ?>

    <div class="text-center">
      <button class="btn-voltar" onclick="window.location.href='criar_curso.php'">+ Novo Curso</button>
    </div>
  </div>

</body>
</html>
