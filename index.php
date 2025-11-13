<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Sistema Escolar</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="/css/bootstrap.css">
  <link rel="stylesheet" href="/css/styles.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Quicksand', sans-serif;
      background: linear-gradient(135deg, #e3f2fd, #ffffffff);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-card {
      width: 100%;
      max-width: 420px;
      background: white;
      border-radius: 16px;
      padding: 2rem;
      border: 2px solid #000000a6;
      box-shadow: 0 5px 15px rgba(0, 60, 255, 0.47);
    }
    .login-card h3 {
      text-align: center;
      margin-bottom: 1.5rem;
      font-weight: 600;
      color: #0d6efd;
    }
  </style>
</head>
<body>
  <div class="login-card">
    <h3>Login do Sistema</h3>

    <?php if (isset($_GET['erro'])): ?>
      <div class="alert alert-danger text-center">Usuário ou senha incorretos!</div>
    <?php endif; ?>

    <form action="../controller/c_login.php" method="POST">
      <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" required>
      </div>

      <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Entrar</button>
      </div>
    </form>

    <p class="text-center mt-3 text-muted" style="font-size: 0.9rem;">
      © <?php echo date('Y'); ?> - Sistema Escolar
    </p>
  </div>
</body>
</html>
