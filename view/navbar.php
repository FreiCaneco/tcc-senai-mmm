<!-- navbar.php -->
<!-- Adicione o link para Bootstrap Icons no <head> do seu template -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<nav class="navbar navbar-expand-lg cor-principal navbar-dark shadow-sm">
  <div class="container-fluid">
    <!-- Logo / Marca -->
    <a class="navbar-brand d-flex align-items-center" href="../dashboard.php">
      <i class="bi bi-building me-2"></i>
      Organização Senai
    </a>

    <!-- Botão do menu mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
      aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navbarMenu">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link cor-texto d-flex align-items-center" href="../dashboard.php">
            <i class="bi bi-house-door-fill me-1"></i> Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link cor-texto d-flex align-items-center" href="../view/criar_professor.php">
            <i class="bi bi-person-plus-fill me-1"></i> Criar Professor
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link cor-texto d-flex align-items-center" href="../view/criar_curso.php">
            <i class="bi bi-journal-plus me-1"></i> Criar Curso
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link cor-texto d-flex align-items-center" href="../view/pendecias.php">
            <i class="bi bi-list-check me-1"></i> Pendências
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link cor-texto d-flex align-items-center" href="../index.php">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>


