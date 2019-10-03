 <?php

    // Conectar la base de datos
  include("../conexion/conexionpg.php");
    
    // Tomamos los parametros de Array
    $id_cadena = !empty($_GET['id'])
              ?intval($_GET['id']):0;
    
    // Si no es seleccionada ninguna, tomamos data por defecto    
    $query = "SELECT id_area, area FROM e_area_cadena";
    
    //  Sino, concatenamos la consulta con el id de la cadena
    if($id_cadena>0) $query.=" WHERE id_cadena = '$id_cadena' and estatus_area='1'"; 
    else $query.=" LIMIT 10";
    
    //  Obtenemos los resultados
    $result = pg_query($query);
    $items = array();
    if($result && pg_num_rows($result)>0) {
        while($row = pg_fetch_array($result)) {
            $items[] = array( $row[0], $row[1] );
        }        
    }
    pg_close();
	$items[] = array( 2, "Otro" );
    echo json_encode($items); 
?> 


