<?php

    // Conectar la base de datos
include("../conexion/conexionpg.php");

    // Ejecutamos la consulta en el orden correcto 
    //(value,text)
    $query = "SELECT id_tipo_org, tipo_org FROM e_tipo_organizacion where estatus='1'";
    $result = pg_query($query);
    $items = array();
    if($result && 
       pg_num_rows($result)>0) {
        while($row = pg_fetch_array($result)) {
            $items[] = array( $row[0], $row[1] );
        }        
    }
    pg_close();
    // Convertimos en formato JSON, luego imprimimos la data
    echo json_encode($items); 
?> 
