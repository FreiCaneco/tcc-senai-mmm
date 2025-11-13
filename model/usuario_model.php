<?php
require_once __DIR__ . '/../db/connection.php';

class UsuarioModel {
  private $db;

  public function __construct() {
    $database = new Database();
    $this->db = $database->getConnection();
  }

  public function buscarPorEmail($email) {
    $sql = "SELECT * FROM usuario WHERE email = :email";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  // Cria um usuário padrão para testes
  public function criarUsuarioPadrao() {
    $email = "admin@teste.com";

    // verifica se já existe
    $check = $this->buscarPorEmail($email);
    if ($check) return;

    $nome = "Administrador";
    $senha = password_hash("123456", PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();
  }
}
?>
