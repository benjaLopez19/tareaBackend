<?php
    header('Content-type:application/json');
    header("Access-Control-Allow-Origin:*");

    $json=file_get_contents('php://input'); 
    $str = trim($json,"[]");
    $info = json_decode($str,true);
    
    $aux = json_decode($json,true);
    //var_dump($info);
    $estado = $aux[0]["estado"];
    echo $estado;
    //$estado = 1;
    //$archivo = fopen("datos.json","w");

    switch($estado){
        case 1:
            $jsonData=file_get_contents("datosIniciado.json");
            if(empty($jsonData)==1){
                $archivo = fopen("datosIniciado.json", "w");
                fwrite($archivo,$json);
                break;
            }else{
                $arrayData=json_decode($jsonData);
                array_push($arrayData,$info);
                $jsonData = json_encode($arrayData);
              
                $archivo = fopen("datosIniciado.json", "w");
                fwrite($archivo,$jsonData); 
                break;
            }

        case 2:
            $jsonData=file_get_contents("datosProceso.json");
            if(empty($jsonData)==1){
                $archivo = fopen("datosProceso.json", "w");
                fwrite($archivo,$json);
                break;
            }else{
                $arrayData=json_decode($jsonData);
                array_push($arrayData,$info);
                $jsonData = json_encode($arrayData);

                $archivo = fopen("datosProceso.json", "w");
                fwrite($archivo,$jsonData); 
                break;
            }
            
           
        case 3:
            $jsonData=file_get_contents("datosTerminado.json");
            if(empty($jsonData)==1){
                $archivo = fopen("datosTerminado.json","w");
                fwrite($archivo,$json);
                break;
            }else{
                $arrayData=json_decode($jsonData);
                array_push($arrayData,$info);
                $jsonData = json_encode($arrayData);

                $archivo = fopen("datosTerminado.json", "w");
                fwrite($archivo,$jsonData); 
                break;
            }
        
        default:
            break;
            
    }
?>