<?php
session_start();
include_once ("../funciones/funciones_session.php");
comprobarSession($_SESSION['adminProy']);
include_once ("../conexion/conexionpg.php");
include_once ("../funciones/queryProyectos.php");
include_once ("../funciones/funciones.php");
extract($_POST);
extract($_GET);



 //Recoger datos para auditoria
    $id_user = $_SESSION['adminProy']['id_usuario'];
    $fecha = date('Y-m-d H:i:s');
    $ip_maq = capturar_ip();
    $estatus_tabla = 1;

// echo "inicio";
/********************************************************************************************************************/
include("SimpleImage.class.php"); //incluimos la clase

$var_usar_thumb=1;
$var_thumb_ancho= 342;
$var_thumb_alto= 250;

   //Preguntamos si nuetro arreglo 'archivos' fue definido
         if (isset ($_FILES["archivos"])) {
         //de se asi, para procesar los archivos subidos al servidor solo debemos recorrerlo
         //obtenemos la cantidad de elementos que tiene el arreglo archivos
         $tot = count($_FILES["archivos"]["name"]);



         //este for recorre el arreglo
         for ($i = 0; $i < $tot; $i++){


	$descripcion[]=$_POST['descripcion'][$i];

         //con el indice $i, poemos obtener la propiedad que desemos de cada archivo
         //para trabajar con este
            //$tmp_name = $_FILES["archivos"]["tmp_name"][$i];
            //$name = $_FILES["archivos"]["name"][$i];



	$var_name_img = $_FILES["archivos"]["name"][$i]; //repecionamos la imagen, y tomamos su nombre
	$var_img_dir = "../files/"; //obtenemos el directorio actual con el cual se está trabajando

if (move_uploaded_file($_FILES["archivos"]["tmp_name"][$i], $var_img_dir.$var_name_img)){ //si la imagen es subida al directorio del servidor
		$subida = true; //admitimos que la subida fue correcta
	}

if ($subida === true){ //si la subida fue correcta
		$obj_simpleimage = new SimpleImage(); //creamos un objeto de la clase SimpleImage
		$obj_simpleimage->load($var_img_dir.$var_name_img); //leemos la imagen 
		if ( ($_FILES["file_img"]["type"]) != 'image/gif' && $var_usar_thumb == 1){//Si la imagen no es de tipo gif, y marcamos en el formulario como thumbnail
			$var_nuevo_archivo = time().rand().".jpg"; //asignamos un nombre aleatorio al nuevo archivo, para evitar sobreescritura
			$obj_simpleimage->resize($var_thumb_ancho,$var_thumb_alto); //redimensionamos la imagen, con los valores de ancho y alto que hemos especificado
		}else{ //sino
			$var_nuevo_archivo = time().rand().$var_name_img; //se agregará al nombre original de la imagen una serie de números aleatorios
		}
		$var_nuevo_archivo = strtolower(str_replace(' ', '_', $var_nuevo_archivo)); //reemplazamos los espacios en blanco con sub-guiones, para hacer más compatible el nombre del archivo
		$obj_simpleimage->save($var_img_dir.$var_nuevo_archivo); //guardamos los cambios efectuados en la imagen
		unlink($var_img_dir . $var_name_img); //eliminamos del temporal la imagen que estabamos subiendo

	$subidos[]= $var_nuevo_archivo;

		/*echo "<div align=\"center\">Imagen subida correctamente. <br /><h4>Vista de la imagen:</h4><br /><img src=\"".$var_img_dir.$var_nuevo_archivo."\" alt=\"".$var_nuevo_archivo."\" /></div>"; //mostramos los resultados*/
	}


 else {
  
                  $status = "Error al subir el archivo". $var_name_img;
  
              }

           /* echo("<b>Archivo </b> $key ");
            echo("<br />");
            echo("<b>el nombre original:</b> ");
            echo($name);
            echo("<br />");
            echo("<b>el nombre temporal:</b> \n");
            echo($tmp_name);
            echo("<br />");  */          
            }
      } 



//echo (dar_formato($nombreProy).', '.dar_formato($descripcionProy).', '.dar_formato($comite_eco_comunal).', '.dar_formato($figura_juridica).', '.dar_formato($figura_registrada).', '.dar_formato($fecha).','.dar_formato($area_cons).', '.dar_formato($area_terreno).', '.dar_formato($unidades_produccion).', '.dar_formato($tiempo_instalacion).', '.dar_formato($elaboracion).', '.dar_formato($titularidad).', '.dar_formato($formacion).', '.dar_formato($balance).', '.$estatus_tabla.','.$id_user.','.dar_formato($posee).','.dar_formato($requerimiento).' ->  ');
/*********************************************************************************************************************/
	



$sql='INSERT INTO v_proyecto ("nombre_proyecto", "descripcion_proyecto","comite_eco_comunal", "id_fig_juridica", "figura_jur_reg","fecha_registro_proyecto","area_construccion","area_terreno","unidades_produccion","tiempo_instalacion","elaboracion","titularidad","proceso_formativo", "balance_politico","estatus_tabla_proyecto","id_usuario_registra","posee","requerimiento") VALUES ('.dar_formato($nombreProy).', '.dar_formato($descripcionProy).', '.dar_formato($comite_eco_comunal).', '.dar_formato($figura_juridica).', '.dar_formato($figura_registrada).', '.dar_formato($fecha).','.dar_formato($area_cons).', '.dar_formato($area_terreno).', '.dar_formato($unidades_produccion).', '.dar_formato($tiempo_instalacion).', '.dar_formato($elaboracion).', '.dar_formato($titularidad).', '.dar_formato($formacion).', '.dar_formato($balance).', '.$estatus_tabla.','.$id_user.','.dar_formato($posee).','.dar_formato($requerimiento).');';

$regnuevoproy=pg_query($sql) or die("Error Registrando Nuevo Proyecto");

if(isset($regnuevoproy)){
	//CONSULTA EL MAXIMO ID EN LA TABLA proyecto
	$sql_maxId = 'SELECT MAX(id_proyecto) FROM v_proyecto';
	$rs_id = pg_query($sql_maxId) or die();
	$row_id=pg_fetch_array($rs_id);

	if(isset($row_id)){
		$id_proyecto=$row_id[0];
		//REGISTRA EN LA TABLA v_tipo_actividad_economica   
		for($i=0;$i<count($_POST['area_cadena']);$i++) {
		
			$can=$_POST['cadena'][0];
			$area=$_POST['area_cadena'][$i];

			$sql_v_tipo_actividad_economica='INSERT INTO v_tipo_actividad_economica
			 (id_proyecto, id_cadena, id_area_cadena, estatus_tabla)
					VALUES ('.dar_formato($id_proyecto).', '.dar_formato($can).', '.dar_formato($area).', '.$estatus_tabla.');';
			$row_tipo_actividad_economica=pg_query($sql_v_tipo_actividad_economica) or die();

		}

		//REGISTRA EN LA TABLA v_org_comunitarias_sociales_vinculadas (las comunas)
		for($i=0;$i<count($_POST['nomb_comuna']);$i++) {
		
			$nomb_comuna=$_POST['nomb_comuna'][$i];

			$sql_v_org_comunitarias_sociales_vinculadas='INSERT INTO v_org_comunitarias_sociales_vinculadas
			 (id_proyecto, id_tipo_org, id_org, estatus_tabla)
					VALUES ('.dar_formato($id_proyecto).', '.dar_formato($comuna).', '.dar_formato($nomb_comuna).', '.$estatus_tabla.');';
			$row_org_comunitarias_sociales_vinculadas=pg_query($sql_v_org_comunitarias_sociales_vinculadas) or die();

		}

		//REGISTRA EN LA TABLA v_org_comunitarias_sociales_vinculadas (los consejos comunales)
		for($i=0;$i<count($_POST['nomb_consejo_comunal']);$i++) {

			$nomb_consejo_comunal=$_POST['nomb_consejo_comunal'][$i];


			$sql_v_org_comunitarias_sociales_vinculadas='INSERT INTO v_org_comunitarias_sociales_vinculadas
			 (id_proyecto, id_tipo_org, id_org, estatus_tabla)
					VALUES ('.dar_formato($id_proyecto).', '.dar_formato($consejo_comunal).', '.dar_formato($nomb_consejo_comunal).', 
					'.$estatus_tabla.');';
			$row_org_comunitarias_sociales_vinculadas=pg_query($sql_v_org_comunitarias_sociales_vinculadas) or die();

		}

		//REGISTRA EN LA TABLA v_org_comunitarias_sociales_vinculadas (los movimientos)
		for($i=0;$i<count($_POST['nomb_movimiento']);$i++) {
		
			$nomb_movimiento=$_POST['nomb_movimiento'][$i];

			$sql_v_org_comunitarias_sociales_vinculadas='INSERT INTO v_org_comunitarias_sociales_vinculadas
			 (id_proyecto, id_tipo_org, id_org, estatus_tabla)
					VALUES ('.dar_formato($id_proyecto).', '.dar_formato($movimiento).', '.dar_formato($nomb_movimiento).', '.$estatus_tabla.');';
			$row_org_comunitarias_sociales_vinculadas=pg_query($sql_v_org_comunitarias_sociales_vinculadas) or die();

		}

		//REGISTRA EN LA TABLA v_financiamiento
		 // for($i=0;$i<count($_POST['tipo_fin']);$i++) {

		 // 	$sql_v_financiamiento='INSERT INTO v_financiamiento (id_proyecto, obj_financiamiento, id_ente_financiamiento, id_estatus_financiamiento, monto, monto_aprobado, monto_transferido, monto_pendiente, anio_financiamiento, tipo_financiamiento, estatus_tabla_financiamiento)
		 // 		VALUES ('.dar_formato($id_proyecto).', '1', '1', '1', '1','1', '1', '1', '1', '1', '1');';
		 // 	$row_financiamiento=pg_query($sql_v_financiamiento) or die();
		
		 // }

		//REGISTRA EN LA TABLA v_inversion_fragmentada
		$sql_v_inversion_fragmentada='INSERT INTO v_inversion_fragmentada (id_proyecto, infraestructura, maquinaria, insumos, fuerza_trabajo, servicios, inversion, estatus_tabla) VALUES ('.dar_formato($id_proyecto).', '.dar_formato($pago_0).', '.dar_formato($pago_1).', 
			'.dar_formato($pago_2).', '.dar_formato($pago_3).', '.dar_formato($pago_4).', 
			'.dar_formato($pago).', '.$estatus_tabla.');';
		$row_inversion_fragmentada=pg_query($sql_v_inversion_fragmentada) or die();

		//REGISTRA EN LA TABLA v_productores
		$sql_v_productores='INSERT INTO v_productores
		 (id_proyecto, num_pro_directos, num_prod_femeninos, num_prod_masculinos, num_prod_indirectos, estatus_tabla)
				VALUES ('.dar_formato($id_proyecto).', '.dar_formato($productores_directos).', '.dar_formato($productores_femenino).', 				'.dar_formato($productores_masculino).', '.dar_formato($productores_indirectos).', '.$estatus_tabla.');';
		$row_productores=pg_query($sql_v_productores) or die();

		//REGISTRA EN LA TABLA v_produccion_proyecto
		$sql_v_produccion_proyecto='INSERT INTO v_produccion_proyecto
		 (id_proyecto, estatus_produccion , fecha_produccion , prod_principal, meta_produccion, beneficiarios,  estatus_tabla_produccion)
				VALUES ('.dar_formato($id_proyecto).', '.dar_formato($estatus_produccion).', '.dar_formato($fecha_inicio_produccion).', 
			'.dar_formato($producto_principal).', '.dar_formato($meta_produccion).', '.dar_formato($beneficiarios).', '.$estatus_tabla.');';
		$row_produccion_proyecto=pg_query($sql_v_produccion_proyecto) or die();

		//REGISTRA EN LA TABLA v_ubicacion_proyecto_georeferencial
		$sql_v_ubicacion='INSERT INTO v_ubicacion_proyecto_georeferencial
		 (id_proyecto, estado, municipio, parroquia, id_circuito, id_eje_parroquial,latitud,longitud,direccion,estatus_tabla)
				VALUES ('.dar_formato($id_proyecto).', '.dar_formato($estado).', '.dar_formato($municipio).', '.dar_formato($parroquia).', 
		'.dar_formato($circuito).', '.dar_formato($eje_parroquial).','.dar_formato($latitud).','.dar_formato($longitud).',
		'.dar_formato($direccion_proyecto).','.$estatus_tabla.');';
		$row_ubicacion=pg_query($sql_v_ubicacion) or die();

			//REGISTRA EN LA TABLA v_fotos_proyecto   
		for($i=0;$i<$tot;$i++) {

			$sql_v_fotos_proyecto='INSERT INTO v_fotos_proyecto (id_proyecto, nombre_archivo, descripcion_archivo, estatus_tabla)
					VALUES ('.dar_formato($id_proyecto).', '.dar_formato($subidos[$i]).', '.dar_formato($descripcion[$i]).', '.$estatus_tabla.');';
			$row_fotos_proyecto=pg_query($sql_v_fotos_proyecto) or die();

		}

		if(!empty($row_ubicacion)){ 

			print "<script>" . mostrar_mensaje(' El Proyecto fue Registrado con Exito!!!...') . "</script>";
			print("<script>window.location.replace('../principal.php');</script>");

		}

	}

}
?>


