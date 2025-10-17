<?php 

    require_once __DIR__ . '/../db/connection.php';

    class DisciplinaModel {
        private $db;

        public function __construct() {
            $database = new Database();
            $this->db = $database->getConnection();
        }
        
        public function buscarTodas(){
            $sql = "SELECT * FROM disciplina ORDER BY nome ASC";

            try {
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
            }
            catch (PDOException $e) {
                error_log("Erro ao buscar disciplinas: " . $e->getMessage());
                return null;
            }
        }
    }
?>