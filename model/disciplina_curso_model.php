<?php 
require_once __DIR__ . '/../db/connection.php';

class DisciplinaCursoModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function buscarDisciplinasPorCursoID($cursoID){
        $sql = "SELECT * FROM disciplina_curso WHERE id_curso = ?";

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$cursoID]);
            return $stmt->fetchAll();
        }
        catch (PDOException $e) {
            error_log("Erro ao buscar disciplinas/cursos: " . $e->getMessage());
            return null;
        }   
    }

    public function buscarTodas(){
        $sql = "SELECT * FROM disciplina_curso";

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        catch (PDOException $e) {
            error_log("Erro ao buscar disciplinas/cursos: " . $e->getMessage());
            return null;
        }   
    }
}
?>