<?php 
require_once '../model/db/connection.php'

class CursoModel {
    private $db
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }


    public function criarCurso($nome, array $horario, $turno) {
        $sql = "INSERT INTO curso (nome, horario, turno) VALUES (?, ?, ?)";

        try {
            $stmt = $this->db->prepare($sql);

            $resultado = $stmt->execute([
            $nome,
            $horario,
            $turno
            ]);


        } catch (PDOException $e) {
            //throw $th;
        }
    }
}

?> 