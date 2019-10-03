 <?php

    // Conectar la base de datos
  include("../conexion/conexionpg.php");
    
    // Tomamos los parametros de Array
    $id_organizacion = !empty($_GET['id'])
              ?intval($_GET['id']):0;
    
    // Si no es seleccionada ninguna ciudad, tomamos data por defecto    
    $query = "SELECT id_org, organizacion FROM e_organizacion";
    
    //  Sino, concatenamos la consulta con el id de la ciudad
    if($id_organizacion>0) $query.=" WHERE id_tipo_org = '$id_organizacion' and estatus='1'"; 
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
	$items[] = array( 26, "Otro" );
    echo json_encode($items); 
?> 


