<?php
    $inputs = file_get_contents('php://input');
    $inputs = json_decode($inputs);

    $cx = new PDO('mysql:host=localhost;dbname=campeonato_futbol','root','');

    $cxProta =  $cx->prepare('SELECT * FROM clube');
    $cxProta->execute();

    $result = [
        "result" => false,
        "dados" => []
    ];

    if($cxProta->rowCount()){
        $result['result'] = true;
        $result['dados'] = $cxProta->fetchAll(PDO::FETCH_OBJ);
    }

    

    echo json_encode($result);