<?php
    $dados_recebidos = file_get_contents('php://input');

    $dados_recebidos = json_decode($dados_recebidos);

    function calculo($dados_recebidos){
        if ($dados_recebidos->op == "+") {
            $resultado = $dados_recebidos->n1 + $dados_recebidos->n2;
        }
        elseif ($dados_recebidos->op == "-") {
            $resultado = $dados_recebidos->n1 - $dados_recebidos->n2;
        }
        elseif ($dados_recebidos->op == "*") {
            $resultado = $dados_recebidos->n1 * $dados_recebidos->n2;
        }
        else {
            $resultado = $dados_recebidos->n1 / $dados_recebidos->n2;
        }
        return $resultado;
    }

    $dados_recebidos->result = calculo($dados_recebidos);

    $result = [
        "result" => true,
        "dados" => $dados_recebidos
    ];

    echo json_encode($result);