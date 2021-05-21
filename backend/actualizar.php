<?php
    header('Content-type:application/json');
    header("Access-Control-Allow-Origin:*");

    $jsonData=file_get_contents("datosIniciado.json");
    echo "SIN TRIM \n";
    echo $jsonData."\n";
    echo "CON TRIM \n";
    echo trim($jsonData,"[]")."\n";

    $str = json_decode($jsonData);
    var_dump($str);
    echo trim($str);
?>