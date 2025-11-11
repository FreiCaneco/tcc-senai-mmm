<?php
require_once  '../model/curso_model.php'; // Caminho correto, ajustado para o diretório atual

try {
  $nome = $_POST['nome'] ?? '';
  $turno = $_POST['turno'] ?? '';
  $horarios = array_filter($_POST['horarios'] ?? []);

  $horariosString = implode(',', $horarios);

  $disciplinasIDS = array_filter($_POST['disciplinasIds'] ?? []);

  $curso_model = new CursoModel();
  $cursoId = $curso_model->criarCurso($nome, $horariosString, $turno);
  $curso_model->criarDisciplinaCurso($cursoId,$disciplinasIDS);

  if ($cursoId > 0) {
    header("Location: ../view/cursos.php?status=success");
  } 
  exit();
  } catch (Exception $e) {
      header("Location: ../view/cursos.php?status=error");
      exit();
  }
?>
