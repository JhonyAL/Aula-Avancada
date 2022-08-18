<?php
    class Contato{
        public $nome;
        public $email;
        public $tel;
    }
 $cx = new PDO('mysql:host=localhost;dbname=contato', 'root', '');  
 if(isset($_POST['btnCadastrar'])){
     
     $nome = $_POST['txtNome']; 
     $email = $_POST['txtEmail'];          
     $tel = $_POST['txtTel'];

     $cmdSQl = "INSERT INTO `contato`(nome, email, tel) VALUES('$nome','$email','$tel')";
     
     $cxPronta = $cx->prepare($cmdSQl);

    
     if(!$cxPronta->execute()){
         echo "<script>alert('Erro de cadastro')</script>";
     }
 }
?>
<h1>Seja bem vindo <?php echo $_SESSION['userLogado']->nome;?></h1>
<form method="post">    
    <button type="submit" class="btn btn-primary" name="btnSair">Sair</button>
</form>
<hr>
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

            $cx = new PDO('mysql:host=localhost;dbname=contato', 'root', '');

            $cmdSQl = 'SELECT * FROM contato ORDER BY nome asc';

            $cxPronta = $cx->prepare($cmdSQl);

            $cxPronta->execute();

            $quant_registros = $cxPronta->rowCount();                   

            if($quant_registros > 0){                        

                $contatos = $cxPronta->fetchAll(PDO::FETCH_CLASS, 'Contato');  
                var_dump($contatos);                      
                foreach ($contatos as $contato) {
                    echo "<tr>
                        <th scope='row'>$contato->nome</th>
                        <td>$contato->email</td>
                        <td>$contato->tel</td>
                    </tr>";
                }
            }

        ?>
        
    </tbody>
</table>