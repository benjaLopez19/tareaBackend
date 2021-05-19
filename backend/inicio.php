<?php
    header('Content-type:application/json');
    header("Access-Control-Allow-Origin:*");

    $jsonIniciado = file_get_contents("datosIniciado.json");
    $jsonProceso = file_get_contents("datosProceso.json");
    $jsonTerminado = file_get_contents("datosTerminado.json");


    $iniciado = json_decode($jsonIniciado,true);
    $proceso = json_decode($jsonProceso,true);
    $terminado = json_decode($jsonTerminado,true);
    $aux = array();
    array_push($aux,$iniciado);
    array_push($aux,$proceso);
    array_push($aux,$terminado);
    //var_dump($aux);
   
    $auxJson = json_encode($aux);
    echo $auxJson;

    /*
    echo "------------------------------------------------------------------------\n";
    var_dump($aux);
    echo "----------------------------------------------------------------------\n";
    $estado = $aux[2][1][0]["titulo"];
    echo $estado;
    echo "\n";
    var_dump($estado);
    */

    

?>