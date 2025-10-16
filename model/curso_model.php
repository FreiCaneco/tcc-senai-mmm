<?php
require_once 'db/connection.php';

class CursoModel {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function criarCurso($nome, $turno, $horariosArray) {
        // Converte array ['segunda','quarta'] → 'segunda,quarta'
        $horariosStr = implode(',', $horariosArray);

        $sql = "INSERT INTO curso (nome, horario, turno) VALUES (:nome, :horario, :turno)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':horario', $horariosStr);
        $stmt->bindParam(':turno', $turno);

        if ($stmt->execute()) {
            return $this->conn->lastInsertId();
        }
        return false;
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM curso WHERE id_curso = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
