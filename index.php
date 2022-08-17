<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get">
        <input type="number" name="txtNota1" placeholder="Primeira nota">
        <input type="number" name="txtNota2" placeholder="Segunda nota">
        <input type="number" name="txtNota3" placeholder="Terceira nota">
        <input type="number" name="txtNota4" placeholder="Quarta nota">
        <input type="number" name="txtFrequencia" placeholder="Frequência"><br>
        <input type="submit" name="btnCalc">
    </form>
    <?php
        $nota1 = $_GET['txtNota1'];
        $nota2 = $_GET['txtNota2'];
        $nota3 = $_GET['txtNota3'];
        $nota4 = $_GET['txtNota4'];
        $mediaNota = ($nota1 + $nota2 + $nota3 + $nota4) / 4;
        $frequencia = $_GET['txtFrequencia'];

        if($mediaNota > 5 && $frequencia >= 70){
            $situacao = 'Aprovado';
        }
        else{
            $situacao = 'Reprovado';
        }


        if($mediaNota >= 5){
            if($mediaNota >= 7){
                if($mediaNota >= 9){
                    echo 'Nota: MB; Média: '.$mediaNota.'; Situação: '.$situacao;
                }
                else{
                    echo 'Nota: B; Média: '.$mediaNota.'; Situação: '.$situacao;
                }
            }
            else{
                echo 'Nota: R; Média: '.$mediaNota.'; Situação: '.$situacao;
            }
        }
        else{
            echo 'Nota: I; Média: '.$mediaNota.'; Situação: '.$situacao;
        }



        // var_dump($_GET);
        // $idade = $_GET['textIdade'];
        // if(isset($_GET['textIdade'])){
        //     if($idade > 17){
        //         echo 'Pode votar';
        //     }
        //     else{
        //         echo 'Não pode votar';
        //     }
        // }


        // class Aluno{
        //     public $nome;
        //     public $nota;
        //     public $situacao;
            
        // }
        // $nome = "Jorge";
        // $idade = 19;
        // $salario = 1111111.19;
        // $casado = true;
        // $pessoas = ["P1","P1","P1","P1","P"];

        // $aluno = new Aluno();
        // var_dump($nome,$idade,$salario,$casado,$aluno);
    ?>
</body>
</html>