<?php
    $conexao = new mysqli("127.0.0.1", "root", "", "site_teste");    
    if(isset($_POST['btnCadastrar'])){
        
        $nome = $_POST['txtNome']; 
        $email = $_POST['txtEmail'];          
        $tel = $_POST['txtTel'];

        $cmdSQl = "INSERT INTO `contato`(nome, email, tel) VALUES('$nome','$email','$tel')";
        if(!$conexao->query($cmdSQl)){
            echo "<script>alert('Erro de cadastro')</script>";
        }
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
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" class="form-control" name="txtNome">
            </div>

            <div class="mb-3">
                <label class="form-label">E-mail</label>
                <input type="email" class="form-control" name="txtEmail">
            </div>

            <div class="mb-3">
                <label class="form-label">Telefone</label>
                <input type="tel" class="form-control" name="txtTel">
            </div>
            <button type="submit" class="btn btn-primary" name="btnCadastrar">Submit</button>
        </form>

        <hr>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Tel</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $cmdSQl = 'SELECT * FROM contato ORDER BY nome asc';
                    $dados = $conexao->query($cmdSQl);
                    if($dados->num_rows>0){
                        $resultado = $dados->fetch_all();
                        
                        foreach ($resultado as $linha) {
                           echo "<tr>
                                <th scope='row'>$linha[0]</th>
                                <td>$linha[1]</td>
                                <td>$linha[2]</td>
                            </tr>";
                        }
                    }
                ?>
                
            </tbody>
        </table>
    </div>

    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>