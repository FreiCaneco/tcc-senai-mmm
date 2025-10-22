<?php
$host = 'localhost';
$db = 'tcc-mmm';
$user = 'root'; // ajuste se for diferente
$pass = '';     // ajuste se tiver senha

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Contagem de professores
    $stmtProf = $pdo->query("SELECT COUNT(*) FROM professor");
    $totalProfessores = $stmtProf->fetchColumn();

    // Contagem de cursos
    $stmtCurso = $pdo->query("SELECT COUNT(*) FROM curso");
    $totalCursos = $stmtCurso->fetchColumn();

    $totalPendencias = 0;

    echo json_encode([
        'professores' => $totalProfessores,
        'cursos' => $totalCursos,
        'pendencias' => $totalPendencias
    ]);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Erro na conexão com o banco: ' . $e->getMessage()]);
}
?>
