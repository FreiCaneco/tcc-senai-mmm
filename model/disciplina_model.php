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
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e) {
      error_log("Erro ao buscar disciplinas: " . $e->getMessage());
      return null;
    }
  }

  public function buscarPorListaDeID(array $ids){
    if (empty($ids)) {
        return [];
    }
    $placeholders = implode(',', array_fill(0, count($ids), '?'));

    $sql = "SELECT * FROM disciplina WHERE id_disciplina IN ($placeholders) ORDER BY nome ASC";
    
    try {
      $stmt = $this->db->prepare($sql);
      $stmt->execute($ids); 
        
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Erro ao buscar disciplinas por lista de IDs: " . $e->getMessage());
        return [];
    }
  }
}
?>