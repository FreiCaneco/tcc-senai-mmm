<?php
session_start();
require_once __DIR__ . '/../model/usuario_model.php';

$usuarioModel = new UsuarioModel();
$usuarioModel->criarUsuarioPadrao(); // garante que o admin existe

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'] ?? '';
  $senha = $_POST['senha'] ?? '';

  $usuario = $usuarioModel->buscarPorEmail($email);

  if ($usuario && password_verify($senha, $usuario['senha'])) {
    $_SESSION['usuario_id'] = $usuario['id_usuario'];
    $_SESSION['usuario_nome'] = $usuario['nome'];
    header("Location: ../dashboard.php");
    exit;
  } else {
    header("Location: ../login.php?erro=1");
    exit;
  }
}
?>
