<?php
session_start();
if (isset($_POST['btnSair'])) {
  session_destroy();
  $url_server = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/';
?>
  <meta http-equiv="refresh" content="0; URL='<?php echo $url_server; ?>'" />
<?php
}

require_once 'Conexao.php';
if (isset($_POST['btnLogin'])) {
  $email = $_POST['txtLoginEmail'];
  $senha = $_POST['txtLoginSenha'];

  $cmdSql = 'SELECT * FROM usuario WHERE usuario.email = :email';

  $cxPronta = $cx->prepare($cmdSql);
  $cxPronta->execute([':email' => $email]);
  if ($cxPronta->rowCount() > 0) {
    $usuario = $cxPronta->fetch(PDO::FETCH_OBJ);
    if ($usuario->senha == $senha) {
      $_SESSION['user_logado'] = $usuario;
    } else {
      echo '<script>alert("Senha ERRADA")</script>';
    }
  } else {
    echo '<script>alert("E-mail não encontrado!!!")</script>';
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/estilo.css">

  <title>Base bootstrap</title>
</head>

<body>
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand">Rede-Fotos</a>
    <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link" href="?home">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?cadastro">Cadastro</a>
      </li>
    </ul>
    <?php
    if (isset($_SESSION['user_logado'])) {
      echo '
            <form class="form-inline" method="POST">
              <a href="?perfil">
                <label for="">' . $_SESSION['user_logado']->nome . '</label>
              </a>
              <button class="btn btn-outline-primary mx-2  my-0" name="btnSair" type="submit">Sair</button>
            </form>
          ';
    } else {
    ?>
      <form class="form-inline" method="POST">
        <input class="form-control mr-sm-2" name="txtLoginEmail" type="text" placeholder="E-mail">
        <input class="form-control mr-sm-2" name="txtLoginSenha" type="password" placeholder="Senha">
        <button class="btn btn-outline-success my-2 my-sm-0" name="btnLogin" type="submit">Login</button>
      </form>
    <?php
    }
    ?>

  </nav>

  <div class="container-fluid">
    <?php

    if (isset($_GET['cadastro'])) {
      require_once 'view/usuario_cadastro.php';
    } elseif (isset($_GET['perfil']) && isset($_SESSION['user_logado'])) {
      require_once 'view/usuario_perfil.php';
    }

    ?>
  </div>

  <script src="bootstrap/js/jquery-3.3.1.min.js"></script>
  <script src="bootstrap/js/popper.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>