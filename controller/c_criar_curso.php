<?php 
  require_once "../model/curso_model.php";
  $cursoModel = new CursoModel();

  $nomeCurso = $_POST['nome'];
  $turno = $_POST['turno'];

  $horarios = $_POST['horarios'];
  $horariosSelecionados = array_filter($horarios);
  $horariosString = implode(',', $horariosSelecionados);

  $cursoModel->criarCurso($nomeCurso,$horariosString, $turno);

?>