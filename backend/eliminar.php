<?php
    header('Content-type:application/json');
    header("Access-Control-Allow-Origin:*");
    
    //ARCHIVOS DEL TS
    $json=file_get_contents('php://input'); 
    $str = trim($json,"[]");
    $info = json_decode($str,true);
    //var_dump($info);
    
    

    $estado = $info["estado"]; //ESTADO NOTA ORIGINAL

    $jsonIniciado=file_get_contents("datosIniciado.json");
    $iniciado= json_decode($jsonIniciado,true);
   
    $jsonProceso = file_get_contents("datosProceso.json");
    $proceso = json_decode($jsonProceso,true);

    $jsonTerminado = file_get_contents("datosTerminado.json");
    $terminado = json_decode($jsonTerminado,true);

    switch($estado){
        case 1:
            for($i=0;$i<count($iniciado);$i++){
                if($iniciado[$i]["titulo"]==$info["titulo"]){
                    if($iniciado[$i]["descripcion"]==$info["descripcion"]){
                        //var_dump($iniciado);
                    
                        array_splice($iniciado,$i,1);
                        //var_dump($iniciado);
                    
                        $aux = json_encode($iniciado);

                        $archivo = fopen("datosIniciado.json","w");
                        fwrite($archivo,$aux);
                        break;
                    }
                }
            }
            break;
        
        case 2:
            for($i=0;$i<count($proceso);$i++){
                if($proceso[$i]["titulo"]==$info["titulo"]){
                    if($proceso[$i]["descripcion"]==$info["descripcion"]){
        
                        array_splice($proceso,$i,1);
                        var_dump($iniciado);
                    
                        $aux = json_encode($proceso);

                        $archivo = fopen("datosProceso.json","w");
                        fwrite($archivo,$aux);
                        break;
                    }
                }
            }
        case 3:
            for($i=0;$i<count($terminado);$i++){
                if($terminado[$i]["titulo"]==$info["titulo"]){
                    if($terminado[$i]["descripcion"]==$info["descripcion"]){
                        array_splice($terminado,$i,1);                 
                        $aux = json_encode($terminado);

                        $archivo = fopen("datosTerminado.json","w");
                        fwrite($archivo,$aux);
                        break;
                    }
                }
            }
        default:
            break;
    }
?>