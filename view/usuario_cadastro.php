<?php

    if(isset($_POST['btnCadastrar'])){
        $email = $_POST['txtEmail'];
        $senha = $_POST['txtSenha'];
        $nome = $_POST['txtNome'];

        $cmdSql = "INSERT INTO `usuario` VALUES(:email, :senha, :nome)";
        $dados = [
            ':email' => $email,
            ':senha' => $senha,
            ':nome' => $nome
        ];

        $cxPronta = $cx->prepare($cmdSql);
        if (($cxPronta->execute($dados))){
            echo '
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Cadastro</h4>
                    <p>Cadastro realizado com sucesso!</p>
                </div>
            ';
        }
        else {
            echo '
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Cadastro</h4>
                    <p>Erro ao cadastrar o usuário!</p>
                </div>
            ';
        }

        $quant_registros = $cxPronta->rowCount();
    }

?>

<fieldset>
    <legend>Cadastro de usuário</legend>
    <form method="POST">
        <div class="form-group">
            <label>Endereço de email</label>
            <input type="email" name="txtEmail" class="form-control" aria-describedby="emailHelp" placeholder="Seu email">
            <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
        </div>
        <div class="form-group">
            <label>Senha</label>
            <input type="password" name="txtSenha" class="form-control" placeholder="Senha">
        </div>    
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="txtNome" class="form-control" placeholder="Seu nome">
        </div>    
        <button type="submit" name="btnCadastrar" class="btn btn-primary">Enviar</button>
    </form>
</fieldset>
