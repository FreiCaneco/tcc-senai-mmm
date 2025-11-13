<?php
require_once __DIR__ . '/../model/disciplina_model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = trim($_POST['nome'] ?? '');
  $duracao = intval($_POST['duracao'] ?? 0);

  if ($nome !== '' && $duracao > 0) {
    $disciplinaModel = new DisciplinaModel();
    $novaDisciplinaId = $disciplinaModel->criarDisciplina($nome, $duracao);

    if ($novaDisciplinaId) {
      header("Location: ../view/criar_curso.php?sucesso=1");
      exit;
    } else {
      header("Location: ../view/criar_curso.php?erro=1");
      exit;
    }
  } else {
    header("Location: ../view/criar_curso.php?erro=2");
    exit;
  }
} else {
  header("Location: ../view/criar_curso.php");
  exit;
}
?>
