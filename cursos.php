<?php
require_once 'model/CursoModel.php';

$idCurso = $_GET['id'] ?? 0;
$status = $_GET['status'] ?? '';

$cursoModel = new CursoModel();
$curso = $cursoModel->buscarPorId($idCurso);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Detalhes do Curso</title>
  <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
  <div class="container mt-4">
    <?php if ($status === 'success'): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Curso cadastrado com sucesso!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php elseif ($status === 'error'): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Erro ao cadastrar o curso.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <?php if ($curso): ?>
      <h1><?= htmlspecialchars($curso['nome']) ?></h1>
      <p><strong>Turno:</strong> <?= htmlspecialchars($curso['turno']) ?></p>
      <p><strong>Horários:</strong> 
        <?= implode(', ', explode(',', $curso['horario'])) ?>
      </p>
    <?php else: ?>
      <div class="alert alert-warning">Curso não encontrado.</div>
    <?php endif; ?>
  </div>
</body>
</html>
