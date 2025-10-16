<?php
require_once '../model/professor_model.php';

try {
    $professorModel = new ProfessorModel();

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $nomeCompleto = $nome . " " . $sobrenome;
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $trabalhaSabado = $_POST['trabalha_sabado'] ?? 0;
    $turno = $_POST['turno'];

    $novoProfessorId = $professorModel->criarProfessor($nomeCompleto, $cpf, $telefone, $email, $trabalhaSabado, $turno);

    if ($novoProfessorId) {
        $niveisSelecionados = $_POST['nivel_selecionado'] ?? [];

        if (!empty($niveisSelecionados)) {
            $professorModel->salvarDisciplinasProfessor($novoProfessorId, $niveisSelecionados);
        }

        //  Redireciona com status de sucesso
        header("Location: ../professores.php?status=success");
        exit();
    } else {
        // Redireciona com status de erro
        header("Location: ../professores.php?status=error");
        exit();
    }

} catch (Exception $e) {
    // Redireciona com status de erro se ocorrer exceção
    header("Location: ../professores.php?status=error");
    exit();
}
?>
