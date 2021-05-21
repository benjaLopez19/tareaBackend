<?php
    header('Content-type:application/json');
    header("Access-Control-Allow-Origin:*");
    
    //ARCHIVOS DEL TS
    $json=file_get_contents('php://input'); 
    $info = json_decode($json,true);
    //var_dump($info);

    $estado = $info[1]["estado"]; //ESTADO NOTA ORIGINAL
    $estadoNuevo = $info[0]["estado"]; //ESTADO NUEVO

    $jsonIniciado=file_get_contents("datosIniciado.json");
    $iniciado= json_decode($jsonIniciado,true);
   
    $jsonProceso = file_get_contents("datosProceso.json");
    $proceso = json_decode($jsonProceso,true);

    $jsonTerminado = file_get_contents("datosTerminado.json");
    $terminado = json_decode($jsonTerminado,true);
   
    switch($estado){
        case 1:

            for($i=0;$i<count($iniciado);$i++){
                if($iniciado[$i]["titulo"]==$info[1]["titulo"]){
                    if($iniciado[$i]["descripcion"]==$info[1]["descripcion"]){
                        switch($estadoNuevo){
                            case 1:
                                $iniciado[$i] = $info[0];
                                $aux = json_encode($iniciado);
                                $archivo = fopen("datosIniciado.json", "w");
                                fwrite($archivo,$aux);
                                break;
                            case 2:
                                array_splice($iniciado,$i,1);
                                array_push($proceso,$info[0]);
                                $auxP = json_encode($proceso);
                                $auxI = json_encode($iniciado);

                                $archivoP = fopen("datosProceso.json","w");
                                fwrite($archivoP,$auxP);

                                $archivoI = fopen("datosIniciado.json","w");
                                fwrite($archivoI,$auxI);

                                break;
                            case 3:
                                array_splice($iniciado,$i,1);
                                array_push($terminado,$info[0]);
                                var_dump($terminado);

                                $auxT = json_encode($terminado);
                                $auxI = json_encode($iniciado);

                                $archivoT = fopen("datosTerminado.json","w");
                                fwrite($archivoT,$auxT);

                                $archivoI = fopen("datosIniciado.json","w");
                                fwrite($archivoI,$auxI);
                                break;
                        }
                    }
                        
                }
            }

        case 2:

            for($i=0;$i<count($proceso);$i++){
                if($proceso[$i]["titulo"]==$info[1]["titulo"]){
                    if($proceso[$i]["descripcion"]==$info[1]["descripcion"]){
                        switch($estadoNuevo){
                            case 1:
                                array_splice($proceso,$i,1);
                                array_push($iniciado,$info[0]);
                                $auxP = json_encode($proceso);
                                $auxI = json_encode($iniciado);

                                $archivoP = fopen("datosProceso.json","w");
                                fwrite($archivoP,$auxP);

                                $archivoI = fopen("datosIniciado.json","w");
                                fwrite($archivoI,$auxI);

                                break;
                            case 2:
                                $proceso[$i] = $info[0];
                                $aux = json_encode($proceso);
                                $archivo = fopen("datosProceso.json", "w");
                                fwrite($archivo,$aux);

                                break;
                            case 3:
                                array_splice($proceso,$i,1);
                                array_push($terminado,$info[0]);

                                $auxT = json_encode($terminado);
                                //echo $auxT;
                                $auxP = json_encode($proceso);

                                $archivoT = fopen("datosTerminado.json","w");
                                fwrite($archivoT,$auxT);

                                $archivoP = fopen("datosProceso.json","w");
                                fwrite($archivoP,$auxP);
                                break;
                        }
                    }
                        
                }
            }
        default:
            break;

    }
?>