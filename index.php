<?php
  require_once 'class/conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="css/estilo.css">

  <title>Aula Avançada</title>
</head>

<body>

    <div class="container-fluid">
        <?php
            include_once './view/usuario_cadastro.php';
        ?>
    </div>


  <script src="./js/jquery.js"></script>
  <script src="./js/popper.js"></script>
  <script src="./js/bootstrap.min.js"></script>
</body>

</html>