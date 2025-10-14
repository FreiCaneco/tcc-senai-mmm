<?php 
require_once '../db/connection.php';

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

    } catch (PDOException $e) {
        echo "Um erro surgiu ao inserir um curso: " . $e->getMessage();
        return false;
    }
  }
}

?> 