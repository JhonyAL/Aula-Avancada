<?php
$usuario = $_SESSION['user_logado'];
require_once './Upload.php';
require_once 'Conexao.php';

if (isset($_POST['btnImg'])) {
    $up = new Upload($_FILES['foto'], './img/');
    var_dump($_FILES['foto']);
    $url_img = $up->salvarImagem();

    $cmdSql = "INSERT INTO `imagem`(link, fk_usuario_email) VALUES (:urlImg, :email)";
    $dados = [
        ':urlImg' => $url_img,
        ':email' => $usuario->email
    ];

    $cxPronta = $cx->prepare($cmdSql);
    if ($cxPronta->execute($dados)) {
        echo  '<p>Imagem cadastrada com sucesso</p>';
    }
    else {
        echo '<p>Erro</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <h2 class="text-center">Seja bem vindo: <?php echo $usuario->nome ?></h2>

        <form class="form-inline" enctype="multipart/form-data" method="post">
            <label for="">Foto</label>
            <input type="file" name="foto" class="form-control" id="">
            <button type="file" name="btnImg" class="form-control bg-primary btn text-light" id="">Enviar</button>
        </form>

        <fieldset>
            <legend class="text-center">Minhas Fotos</legend>
            <?php
                $cmdSql = "SELECT * FROM imagem WHERE imagem.fk_usuario_email = :email";
                $cxPronta = $cx->prepare($cmdSql);
                if ($cxPronta->execute([':email'=>$usuario->email])) {
                    if ($cxPronta->rowCount() > 0) {
                        $fotos = $cxPronta->fetchAll(PDO::FETCH_OBJ);
                        foreach ($fotos as $value) {
                            echo '<div class="card">
                            <img class="card-img-top" src="'.$value->link.'" alt="Card image cap">
                            </div>';
                        }
                    }
                }
            ?>
                <div class="card">
                    <img class="card-img-top" src="../img/Fusca-1300-1970-Preto-17-site.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title that wraps to a new line</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
        </fieldset>
    </div>

</body>

</html>