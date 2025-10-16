<?php
require_once __DIR__ . '/model/curso_model.php'; // Caminho correto, ajustado para o diretório atual

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $turno = $_POST['turno'] ?? '';
    $horarios = array_filter($_POST['horarios'] ?? []);

    $horariosString = implode(',', $horarios);

    $curso_model = new CursoModel();
    $cursoId = $curso_model->criarCurso($nome, $horariosString, $turno);

    if ($cursoId) {
        header("Location: ../curso_detalhes.php?id=$cursoId&status=success");
    } else {
        header("Location: ../curso_detalhes.php?id=0&status=error");
    }
    exit();
}
?>
