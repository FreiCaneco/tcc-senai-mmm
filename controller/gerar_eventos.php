<?php
  require_once __DIR__ . '/../model/professor_model.php';
  
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $disciplinasJsonString = $_POST['disciplinas_data'];
    $disciplinas = json_decode($disciplinasJsonString,true);

    $professorModel = new ProfessorModel();
    $professores = $professorModel->selectTodosProfessoresDisponiveis();
    $professoresFiltrados = [];
    
    $professoresComDisciplinas = [];

    foreach ($professores as $professor) {
      $professoresFiltrados[] = [
        'id_professor' => $professor['id_professor'],
        'nome' => $professor['nome'],
        'disciplinas' => $professorModel->selectTodosProfessoresDisciplinasPorId($professor['id_professor'])
      ];
    }

    echo "<pre>";
        echo "Conteúdo de ProfessoresESuasDisciplinas:\n";
        print_r($professoresFiltrados);
        echo "</pre>";
  }
?>