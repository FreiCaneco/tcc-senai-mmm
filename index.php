<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organização Senai</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <?php include './view/navbar.php'; ?>

    <div class="container mt-4">
      <div class="row">
        <div class="col-12">
          <h1>Dashboard do Sistema</h1>
          <p class="text-center text-muted">Bem-vindo ao sistema de organização do SENAI</p>
        </div>
      </div>

        <h3 >Estatísticas</h3>
        <div class="dashboard dashboard-stats  mb-4">
            <div class="stat-item mb-3">
                <div class="stat-label">Professores</div>
            </div>
            <div class="stat-item mb-3">
                <div class="stat-label">Cursos</div>
            </div>
            <div class="stat-item mb-3  ">
                <div class="stat-label">Pendências</div>
            </div>
        </div>

        <h3 class="mt-4">Ações Rápidas</h3>
        <div class="row mt-4 dashboard">
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="dashboard-card text-center">
                    <h5>Professores</h5>
                    <p class="text-muted">Gerenciar professores do sistema</p>
                    <a href="./view/professores.php" class="btn btn-primary">Acessar</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="dashboard-card text-center">
                    <h5>Cursos</h5>
                    <p class="text-muted">Gerenciar cursos e horários</p>
                    <a href="./view/cursos.php" class="btn btn-primary">Acessar</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="dashboard-card text-center">
                    <h5>Pendências</h5>
                    <p class="text-muted">Visualizar tarefas pendentes</p>
                    <a href="./view/pendencias.php" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>


      <div class="row">
        <div class="col-12">
          <div class="dashboard-card mb-5">
            <h5 class="mb-3" style="margin-left: 590px;">Ações Rápidas</h5>
            <div style="margin-left: 450px;" class="d-flex flex-wrap gap-2">
              <a href="./view/criar_professor.php" style="padding: 5px 50px;" class="btn btn-outline-primary">Novo Professor</a>
              <a href="./view/criar_curso.php" style="padding: 5px 60px;" class="btn btn-outline-primary">Novo Curso</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>