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

      <div class="row">
        <div class="col-12">
          <div class="dashboard-card mb-5">
            <h5 class="mb-3 legend" style="margin-left: auto; margin-right: auto; text-align: center; font-size: 1.5rem;">Ações Rápidas</h5>
            <div class="d-flex flex-wrap gap-2 justify-content-center">
              <a href="./view/criar_professor.php" style="padding: 5px 50px;" class="btn btn-outline-primary">Novo Professor</a>
              <a href="./view/criar_curso.php" style="padding: 5px 60px;" class="btn btn-outline-primary">Novo Curso</a>
            </div>
          </div>
        </div>
      </div>

        <h3 class="mt-4 legend" style="font-size: 2.0rem; color: #0059df; text-align: center;">Estatísticas</h3>
        <div class="dashboard dashboard-stats mb-4 text-center">
  <div class="stat-item mb-3">
    <div class="stat-label">Professores</div>
    <div class="stat-value" id="contador-professores">...</div>
  </div>
  <div class="stat-item mb-3">
    <div class="stat-label">Cursos</div>
    <div class="stat-value" id="contador-cursos">...</div>
  </div>
  <div class="stat-item mb-3">
    <div class="stat-label">Pendências</div>
    <div class="stat-value" id="contador-pendencias">...</div>
  </div>
</div>


        <h3 class="mt-4 legend" style="font-size: 2.0rem; color: #0059df; text-align: center;">Gerenciadores</h3>
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
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="dashboard-card text-center">
                    <h5>Calendários</h5>
                    <p class="text-muted">Visualizar calendários</p>
                    <a href="./view/teste_copy.php" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>


     
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"> </script>

    <script>
  document.addEventListener("DOMContentLoaded", function () {
    fetch('controller/contadores.php') // ajuste o caminho se necessário
      .then(response => response.json())
      .then(data => {
        if (data.error) {
          alert("Erro ao buscar contadores: " + data.error);
        } else {
          document.getElementById('contador-professores').textContent = data.professores;
          document.getElementById('contador-cursos').textContent = data.cursos;
          document.getElementById('contador-pendencias').textContent = data.pendencias;
        }
      })
      .catch(error => {
        alert("Erro na requisição: " + error);
      });
  });
</script>

  </body>
</html>
