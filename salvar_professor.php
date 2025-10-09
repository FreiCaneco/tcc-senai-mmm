<?php
require_once 'db/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $sobrenome = $_POST['sobrenome'] ?? '';
    $email = $_POST['email'] ?? '';
    $cpf = $_POST['CPF'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $turno = $_POST['turno'] ?? '';
    $trabalhaSabado = isset($_POST['trabalha']) ? 1 : 0;

    // Juntar nome completo
    $nomeCompleto = $nome . ' ' . $sobrenome;

    // Conectar
    $database = new Database();
    $conn = $database->getConnection();

    try {
        $conn->beginTransaction();

        // Inserir professor
        $stmt = $conn->prepare("INSERT INTO professor (nome, cpf, telefone, email, `trabalha-sabado`, turno) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nomeCompleto, $cpf, $telefone, $email, $trabalhaSabado, $turno]);

        $idProfessor = $conn->lastInsertId();

        // Inserir habilidades (capacitacoes)
        if (isset($_POST['capacitacoes']) && is_array($_POST['capacitacoes'])) {
            foreach ($_POST['capacitacoes'] as $disciplinaNome => $dados) {
                // Verifica se o checkbox foi marcado
                if (isset($dados['ativo'])) {
                    // Buscar o ID da disciplina pelo nome (sem strtolower para evitar problemas)
                    $stmtDisc = $conn->prepare("SELECT id_disciplina FROM disciplina WHERE nome = ?");
                    $stmtDisc->execute([$disciplinaNome]);
                    $disciplina = $stmtDisc->fetch();

                    if ($disciplina) {
                        $idDisciplina = $disciplina['id_disciplina'];

                        // Inserir no relacionamento
                        $stmtInsertHab = $conn->prepare("INSERT INTO professor_habilidade (id_professor, id_disciplina) VALUES (?, ?)");
                        $stmtInsertHab->execute([$idProfessor, $idDisciplina]);
                    }
                }
            }
        }

        $conn->commit();

        // Redireciona com sucesso
        header("Location: criar_professor.php?status=success");
        exit;
    } catch (Exception $e) {
        $conn->rollBack();

        // Redireciona com erro (opcional: pode logar o erro)
        header("Location: criar_professor.php?status=error");
        exit;
    }
} else {
    die("Requisição inválida.");
}
?>
