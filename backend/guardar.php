<?php
    header('Content-type:application/json');
    header("Access-Control-Allow-Origin:*");

    $json=file_get_contents('php://input'); 
    $info = json_decode($json);
    $aux = json_decode($json,true);
    //var_dump($info);
    $estado = $aux[0]["estado"];
    echo $estado;
    //$estado = 1;
    //$archivo = fopen("datos.json","w");

    switch($estado){
        case 1:
            $jsonData=file_get_contents("datosIniciado.json");
            $arrayData=json_decode($jsonData);
            array_push($arrayData,$info);
            $jsonData = json_encode($arrayData);
        
            $archivo = fopen("datosIniciado.json", "w");
            fwrite($archivo,$jsonData);
      
            break;
        case 2:
            //$archivo = fopen("datosProceso.json", "w");
            $jsonData=file_get_contents("datosProceso.json");
            $arrayData=(array)json_decode($jsonData);
            array_push($arrayData,$info);
            $jsonData = json_encode($arrayData);
            
            $archivo = fopen("datosProceso.json", "w");
            fwrite($archivo,$jsonData);
            break;
        case 3:
            $jsonData=file_get_contents("datosTerminado.json");
            $arrayData=json_decode($jsonData);
            array_push($arrayData,$info);
            $jsonData = json_encode($arrayData);

            $archivo = fopen("datosTerminado.json","w");
            fwrite($archivo,$jsonData);
            break;
    }
?>