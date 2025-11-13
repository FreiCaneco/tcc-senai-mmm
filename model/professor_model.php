<?php 

  require_once __DIR__ . '/../db/connection.php';

  class ProfessorModel {
    private $db;
    public function __construct(){
      $database = new Database();
      $this->db = $database->getConnection();
    }

    public function criarProfessor($nome, $cpf, $telefone, $email, $trabalha_sabado, $turno ) {
      $sql = "INSERT INTO professor (nome, cpf, telefone, email, trabalha_sabado, turno, disponivel) 
      VALUES (?, ?, ?, ?, ?, ?,?)";

      try {
        $stmt = $this->db->prepare($sql);
        
        $resultado = $stmt->execute([
          $nome,
          $cpf,
          $telefone,
          $email,
          $trabalha_sabado,
          $turno,
          1
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

  public function selectTodosProfessoresDisciplinasPorId($professorID) {
    $sql = "SELECT * FROM professor_habilidade WHERE id_professor = ?"; 
    
    try {
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$professorID]); 
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
        error_log("Erro ao buscar professores: " . $e->getMessage());
        return null;
    } 
}

  public function selectTodosProfessores() {
    $sql = "SELECT * FROM professor ORDER BY nome ASC";
    try {
      $stmt = $this->db->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
      
    } catch (PDOException $e) {
        error_log("Erro ao buscar professores: " . $e->getMessage());
        return null;
    } 
  }

  public function selectTodosProfessoresDisponiveis() {
    $sql = "SELECT * FROM professor WHERE disponivel = 1 ORDER BY nome ASC";
    try {
      $stmt = $this->db->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
      
    } catch (PDOException $e) {
        error_log("Erro ao buscar professores: " . $e->getMessage());
        return null;
    } 
  }
}
?>