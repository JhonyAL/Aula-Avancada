<?php
if (isset($_POST['btnCadastrar'])) {
    $nome = $_POST['textName'];
    $email = $_POST['textEmail'];
    $senha = $_POST['textSenha'];

    
    
    
    
    $cmdSQl = "INSERT INTO `usuario`(nome, email, senha) VALUES('$nome','$email','$senha')";
    

    // ORDER BY nome asc
      
    $cxPronta = $cx->prepare($cmdSQl);

    

    $cxPronta->execute();

    echo $cxPronta->rowCount();

    // $cmdSQl = "INSERT INTO `usuario`(nome, email, senha) VALUES('$nome','$email','$senha')";
}

?>

<fieldset>
    <legend>Cadastro de Usuário</legend>
    <form method="POST">
        <div class="form-group">
            <label for="inputNome">Nome</label>
            <input type="text" name="textName" class="form-control" id="inputNome" placeholder="Seu nome">
        </div>
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" name="textEmail" class="form-control" id="inputEmail1" placeholder="Seu email">
        </div>
        <div class="form-group">
            <label for="inputPassword">Senha</label>
            <input type="password" name="textSenha" class="form-control" id="inputPassword" placeholder="Sua senha">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Lembre-se de mim</label>
        </div>
        <button type="submit" name="btnCadastrar" class="btn btn-primary">Cadastre-se</button>
    </form>
</fieldset>