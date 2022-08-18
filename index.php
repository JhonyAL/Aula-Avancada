<?php
    session_start();

    if(isset($_POST['btnLogin'])){
        $cx = new PDO('mysql:host=localhost;dbname=contato', 'root', '');

        $cmdSQl = "SELECT * FROM admin where admin.email = '".$_POST['txtUsuario']."';";
            
        $cxPronta = $cx->prepare($cmdSQl);

        $cxPronta->execute();

        $quant_registros = $cxPronta->rowCount();

            if($quant_registros > 0){
                $dadosUser = $cxPronta->fetch(PDO::FETCH_OBJ);
                if($dadosUser->senha == $_POST['txtSenha']){
                    $_SESSION['userLogado'] = $dadosUser;
                }
            }

        
    }  

    if(isset($_POST['btnSair'])){
        session_destroy();
        ?>
            <meta http-equiv="refresh" content="0; URL='http://teste.local/'"/>
        <?php
    }
    
  
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>

    <div class="container">

        <?php
            if(isset($_SESSION['userLogado'] )){
                var_dump($_SESSION['userLogado']);
                include_once 'tela_contatos.php';                
            }
            else{
                include_once 'tela_login.php';
            }
        ?>

        

        
    </div>

    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>