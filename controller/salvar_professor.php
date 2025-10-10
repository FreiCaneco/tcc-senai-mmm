<?php

  require_once '../model/professor_model.php';

  $professorModel = new ProfessorModel();

  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
  $nomeCompleto = $nome . " " . $sobrenome;
  $cpf = $_POST['cpf'];
  $telefone = $_POST['telefone'];
  $email = $_POST['email'];
  $trabalhaSabado = $_POST['trabalha_sabado'];
  $turno = $_POST['turno']

  $novoProfessorId = $professorModel->criarProfessor($nomeCompleto,$cpf,$telefone,$email,$trabalhaSabado,$turno);

  if($novoProfessorId) {
    $niveisSelecionados = $_POST['nivel_selecionado'] ?? [];
    
    if(!empty($niveisSelecionados)) {
      
    }
  }

?>