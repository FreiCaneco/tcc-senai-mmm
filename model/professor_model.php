<?php 

  require_once '../db/connection.php';


  class ProfessorModel {
    private $db;
    public function __construct(){
      $database = new Database();
      $this->db = $database->getConnection();
    }

    public function criarProfessor($nome, $cpf, $telefone, $email, $trabalha_sabado, $turno ) {
      $sql = "INSERT INTO professor (nome, cpf, telefone, email, trabalha_sabado, turno) 
      VALUES (?, ?, ?, ?, ?, ?)";

      try {
        $stmt = $this->db->prepare($sql);
        
        $resultado = $stmt->execute([
          $nome,
          $cpf,
          $telefone,
          $email,
          $trabalha_sabado,
          $turno
        ]);
        
        if ($resultado) {
          return $this->db->lastInsertId();
        }
        return false;

      } catch (PDOException $e) {
        echo "Um erro surgiu ao inserir um professor: " . $e->getMessage();
        return false;
      }
    }


    // Era pra estar em outro model, "disciplinasProfessor" ou algo assim
    public function salvarDisciplinasProfessor($professorId, array $disciplinaIDs_niveis,) {
      $sql = "INSERT INTO professor_habilidade (id_disciplina, id_professor, nivel_professor) VALUES (?,?,?)";

      $stmt = $this->db->prepare($sql);

      foreach ($disciplinaIDs_niveis as $disciplinaId => $nivel) {
        $stmt->execute([
          $disciplinaId,
          $professorId,
          $nivel
        ]);
      }
    }
  }
?>