<?php
require_once __DIR__ . '/../db/connection.php';

class CursoModel {
  private $db;

  public function __construct() {
    $database = new Database();
    $this->db = $database->getConnection();
  }

  public function criarCurso($nome, $horario, $turno) {
    $sql = "INSERT INTO curso (nome, horario, turno) VALUES (?, ?, ?)";

    try {
      $stmt = $this->db->prepare($sql); 
      $stmt->execute([$nome, $horario, $turno]);
      return $this->db->lastInsertId();
    } catch (PDOException $e) {
      error_log("Um erro surgiu ao inserir um curso: " . $e->getMessage());
      return 0;
    }
  }

  public function selectTodosCursos() {
    $sql = "SELECT * FROM curso ORDER BY nome ASC";
    try {
      $stmt = $this->db->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();

    } catch (PDOException $e) {
      error_log("Erro ao buscar professores: " . $e->getMessage());
      return null;
    }
  }

  public function buscarPorId($id) {
    try {
      $sql = "SELECT * FROM curso WHERE id_curso = :id";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      error_log("Erro ao buscar curso: " . $e->getMessage());
      return null;
    }
  }

  public function criarDisciplinaCurso($curso_id, array $disciplinas_ids) {
    try {
      $sql = "INSERT INTO disciplina_curso (id_disciplina, id_curso) VALUES (?, ?)";
      $stmt = $this->db->prepare($sql);

      foreach ($disciplinas_ids as $disciplina_id) {
        $disciplina_id = (int) $disciplina_id; 
        $stmt->execute([$disciplina_id, $curso_id]);    
      }

      return true;
    } catch (\PDOException $e) {
      error_log("Erro ao associar disciplinas: " . $e->getMessage());
      return false;
    }
  }
}
?>