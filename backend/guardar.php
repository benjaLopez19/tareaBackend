<?php
    header('Content-type:application/json');
    header("Access-Control-Allow-Origin:*");

    $json=file_get_contents('php://input'); 
    $info = json_decode($json);
    $archivo = fopen("datos.json","w");

    if(file_get_contents("datos.json")){
        $jsonData=file_get_contents("datos.json");
        $arrayData=json_decode($jsonData);
        array_push($arrayData,$info);
        $jsonData = json_encode($arrayData);

        fwrite($archivo,$jsonData);
    }else{
       fwrite($archivo,$json);
    }

    
    

    



?>