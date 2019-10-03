 <?php

    // Conectar la base de datos
  include("../conexion/conexionpg.php");
    
    // Tomamos los parametros de Array
    $cityid = !empty($_GET['id'])
              ?intval($_GET['id']):0;
    
    // Si no es seleccionada ninguna ciudad, tomamos data por defecto    
    $query = "SELECT id_eje, eje FROM e_eje_parroquial";
    
    //  Sino, concatenamos la consulta con el id de la ciudad
    if($cityid>0) $query.=" WHERE id_parroquia = '$cityid'"; 
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
	$items[] = array( 30, "Todos" );
    echo json_encode($items); 
?> 
