<?php
session_start();
include_once ("../funciones/funciones_session.php");
comprobarSession($_SESSION['adminProy']);
include_once ("../conexion/conexionpg.php");
include_once ("../funciones/queryProyectos.php");
include_once ("../funciones/funciones.php");
extract($_POST);
extract($_GET);

/*echo"<pre>";
print_r($_POST);
echo"</pre>";

die();*/

 //Recoger datos para auditoria
    $id_user = $_SESSION['adminProy']['id_usuario'];
    $fecha = date('Y-m-d H:i:s');
    $ip_maq = capturar_ip();
    $estatus_tabla = 1;


/********************************************************************************************************************/

	include("SimpleImage.class.php"); //incluimos la clase
	$foto = traerFoto($id_proyecto);

	if (!empty($editar_foto))
	{
		$var_usar_thumb=1;
		$var_thumb_ancho= 342;
		$var_thumb_alto= 250;
		 //Preguntamos si nuetro arreglo 'archivos' fue definido
	  if ($editar_foto!="")
		{
			//de se asi, para procesar los archivos subidos al servidor solo debemos recorrerlo
      //obtenemos la cantidad de elementos que tiene el arreglo archivos
			$tot = count($_FILES["archivos"]["name"]);
      //este for recorre el arreglo
      for ($i = 0; $i < $tot; $i++)
			{
				$descripcion[]=$_POST['descripcion'][$i];
        //con el indice $i, poemos obtener la propiedad que desemos de cada archivo
        //para trabajar con este
        //$tmp_name = $_FILES["archivos"]["tmp_name"][$i];
        //$name = $_FILES["archivos"]["name"][$i];
				$var_name_img = $_FILES["archivos"]["name"][$i]; //repecionamos la imagen, y tomamos su nombre
				$var_img_dir = "../files/"; //obtenemos el directorio actual con el cual se está trabajando
				if (move_uploaded_file($_FILES["archivos"]["tmp_name"][$i], $var_img_dir.$var_name_img))
				{ //si la imagen es subida al directorio del servidor
					$subida = true; //admitimos que la subida fue correcta
				}
				if ($subida === true)
				{ //si la subida fue correcta
					$obj_simpleimage = new SimpleImage(); //creamos un objeto de la clase SimpleImage
					$obj_simpleimage->load($var_img_dir.$var_name_img); //leemos la imagen 
					if (($_FILES["file_img"]["type"]) != 'image/gif' && $var_usar_thumb == 1)
					{//Si la imagen no es de tipo gif, y marcamos en el formulario como thumbnail
						$var_nuevo_archivo = time().rand().".jpg"; //asignamos un nombre aleatorio al nuevo archivo, para evitar sobreescritura
						$obj_simpleimage->resize($var_thumb_ancho,$var_thumb_alto); //redimensionamos la imagen, con los valores de ancho y alto que hemos especificado
					}
					else
					{ //sino
						$var_nuevo_archivo = time().rand().$var_name_img; //se agregará al nombre original de la imagen una serie de números aleatorios
					}
					$var_nuevo_archivo = strtolower(str_replace(' ', '_', $var_nuevo_archivo)); //reemplazamos los espacios en blanco con sub-guiones, para hacer más compatible el nombre del archivo
					$obj_simpleimage->save($var_img_dir.$var_nuevo_archivo); //guardamos los cambios efectuados en la imagen
					unlink($var_img_dir . $var_name_img); //eliminamos del temporal la imagen que estabamos subiendo
					$subidos[]= $var_nuevo_archivo;
					//echo "<div align=\"center\">Imagen subida correctamente. <br /><h4>Vista de la imagen:</h4><br /><img src=\"".$var_img_dir.$var_nuevo_archivo."\" alt=\"".$var_nuevo_archivo."\" /></div>"; //mostramos los resultados
				}
				else
				{
          $status = "Error al subir el archivo". $var_name_img;
        }
            echo("<b>Archivo </b> $key ");
            echo("<br />");
            echo("<b>el nombre original:</b> ");
            echo($name);
            echo("<br />");
            echo("<b>el nombre temporal:</b> \n");
            echo($tmp_name);
            echo("<br />");            
      }
    } 
		$num_foto = pg_num_rows($foto);
		if (!empty($num_foto))
		{
			while ($r=pg_fetch_array($foto))
			{
				unlink("../files/".$r['nombre_archivo']);
			}
		}
		
		//Borra v_tipo_actividad_economica
		$sql_v_fotos_proyecto='DELETE FROM v_fotos_proyecto WHERE "id_proyecto"='.dar_formato($id_proyecto).';';
		$fotos_proyecto=pg_query($sql_v_fotos_proyecto) or die("Error borrando v_fotos_proyecto ".pg_last_error().$sql_v_fotos_proyecto);
		if(!empty($fotos_proyecto))
		{ 
			//REGISTRA EN LA TABLA v_fotos_proyecto   
			for($i=0;$i<$tot;$i++)
			{
				$sql_v_fotos_proyecto='INSERT INTO v_fotos_proyecto(id_proyecto, nombre_archivo, descripcion_archivo, estatus_tabla)
															 VALUES ('.dar_formato($id_proyecto).', '.dar_formato($subidos[$i]).', '.dar_formato($descripcion[$i]).', '.$estatus_tabla.');';
				$row_fotos_proyecto=pg_query($sql_v_fotos_proyecto) or die("Error actualizando v_fotos_proyecto ".pg_last_error().$sql_v_fotos_proyecto);
			}
		}
	}
	

/*********************************************************************************************************************/
	
	//ACTUALIZA EN LA TABLA v_proyecto
	$sql_v_proyecto='UPDATE public.v_proyecto SET nombre_proyecto='.dar_formato($nombreProy).', descripcion_proyecto='.dar_formato($descripcionProy).',
	                                       comite_eco_comunal='.dar_formato($comite_eco_comunal).', id_fig_juridica='.dar_formato($figura_juridica).',
																				 figura_jur_reg='.dar_formato($figura_registrada).', area_construccion='.dar_formato($area_cons).',
																				 area_terreno='.dar_formato($area_terreno).', unidades_produccion='.dar_formato($unidades_produccion).',
																				 tiempo_instalacion='.dar_formato($tiempo_instalacion).', elaboracion='.dar_formato($elaboracion).',
																				 titularidad='.dar_formato($titularidad).', proceso_formativo='.dar_formato($formacion).',
																				 balance_politico='.dar_formato($balance).' WHERE id_proyecto='.dar_formato($id_proyecto).';';
	$result=pg_query($sql_v_proyecto) or die("Error actualizando v_proyecto ".pg_last_error().$sql_v_proyecto);
 	 
	//Borra v_tipo_actividad_economica
	$sql_actividad='DELETE FROM v_tipo_actividad_economica WHERE "id_proyecto"='.dar_formato($id_proyecto).';';
	$actividad=pg_query($sql_actividad) or die("Error borrando v_tipo_actividad_economica ".pg_last_error().$sql_actividad);
	if(!empty($actividad))
	{	//REGISTRA EN LA TABLA v_tipo_actividad_economica   
		for($i=0;$i<count($_POST['area_cadena']);$i++)
		{
			$can=$_POST['cadena'][0];
			$area=$_POST['area_cadena'][$i];
			$sql_v_tipo_actividad_economica='INSERT INTO v_tipo_actividad_economica(id_proyecto, id_cadena, id_area_cadena, estatus_tabla)
					                             VALUES ('.dar_formato($id_proyecto).', '.dar_formato($can).', '.dar_formato($area).', '.$estatus_tabla.');';
			$row_tipo_actividad_economica=pg_query($sql_v_tipo_actividad_economica) or die("Error actualizando v_tipo_actividad_economica ".pg_last_error().$sql_v_tipo_actividad_economica);
		}
	}//fin Actualizar en v_tipo_actividad_economica
 
 	//Borra v_org_comunitarias_sociales_vinculadas
	$sql_v_org='DELETE FROM v_org_comunitarias_sociales_vinculadas WHERE "id_proyecto"='.dar_formato($id_proyecto).';';
	$v_org=pg_query($sql_v_org) or die("Error borrando v_org_comunitarias_sociales_vinculadas ".pg_last_error().$sql_v_org);
	if(!empty($v_org))
	{ //REGISTRA EN LA TABLA v_org_comunitarias_sociales_vinculadas (las comunas)
		for($i=0;$i<count($_POST['nomb_comuna']);$i++)
		{
			$nomb_comuna=$_POST['nomb_comuna'][$i];
			$sql_v_org_comunitarias_sociales_vinculadas='INSERT INTO v_org_comunitarias_sociales_vinculadas(id_proyecto, id_tipo_org, id_org, estatus_tabla)
					                         VALUES ('.dar_formato($id_proyecto).', '.dar_formato($comuna).', '.dar_formato($nomb_comuna).', '.dar_formato($estatus_tabla).');';
			$row_org_comunitarias_sociales_vinculadas=pg_query($sql_v_org_comunitarias_sociales_vinculadas)
			or die("Error actualizando v_org_comunitarias_sociales_vinculadas (las comunas) ".pg_last_error().$sql_v_org_comunitarias_sociales_vinculadas);
		}

		//REGISTRA EN LA TABLA v_org_comunitarias_sociales_vinculadas (los consejos comunales)
		for($i=0;$i<count($_POST['nomb_consejo_comunal']);$i++)
		{
			$nomb_consejo_comunal=$_POST['nomb_consejo_comunal'][$i];
   		$sql_v_org_comunitarias_sociales_vinculadas='INSERT INTO v_org_comunitarias_sociales_vinculadas(id_proyecto, id_tipo_org, id_org, estatus_tabla)
					  VALUES ('.dar_formato($id_proyecto).', '.dar_formato($consejo_comunal).', '.dar_formato($nomb_consejo_comunal).',	'.dar_formato($estatus_tabla).');';
			$row_org_comunitarias_sociales_vinculadas=pg_query($sql_v_org_comunitarias_sociales_vinculadas)
			or die("Error actualizando v_org_comunitarias_sociales_vinculadas (los consejos comunales) ".pg_last_error().$sql_v_org_comunitarias_sociales_vinculadas);
		}

		//REGISTRA EN LA TABLA v_org_comunitarias_sociales_vinculadas (los movimientos)
		for($i=0;$i<count($_POST['nomb_movimiento']);$i++)
		{
			$nomb_movimiento=$_POST['nomb_movimiento'][$i];
			$sql_v_org_comunitarias_sociales_vinculadas='INSERT INTO v_org_comunitarias_sociales_vinculadas(id_proyecto, id_tipo_org, id_org, estatus_tabla)
					VALUES ('.dar_formato($id_proyecto).', '.dar_formato($movimiento).', '.dar_formato($nomb_movimiento).', '.dar_formato($estatus_tabla).');';
			$row_org_comunitarias_sociales_vinculadas=pg_query($sql_v_org_comunitarias_sociales_vinculadas)
			or die("Error actualizando v_org_comunitarias_sociales_vinculadas (los movimientos) ".pg_last_error().$sql_v_org_comunitarias_sociales_vinculadas);
		}
	}//fin Actualizar en v_org_comunitarias_sociales_vinculadas

	//Borra v_financiamiento
	$sql_v_financiamiento='DELETE FROM v_financiamiento WHERE "id_proyecto"='.dar_formato($id_proyecto).';';
	$v_financiamiento=pg_query($sql_v_financiamiento) or die("Error borrando v_financiamiento ".pg_last_error().$sql_v_financiamiento);
	if(!empty($v_financiamiento))
	{ //REGISTRA EN LA TABLA v_financiamiento
		for($i=0;$i<count($_POST['tipo_fin']);$i++)
		{
			$sql_v_financiamiento='INSERT INTO v_financiamiento
			 (id_proyecto,obj_financiamiento,id_ente_financiamiento,id_estatus_financiamiento,monto,monto_aprobado,monto_transferido,monto_pendiente,
			  anio_financiamiento,tipo_financiamiento,estatus_tabla_financiamiento)
					VALUES ('.dar_formato($id_proyecto).', '.dar_formato($nombreProy).', '.dar_formato($_POST['ente_fin'][$i]).', 
	                '.dar_formato($_POST['est_fin'][$i]).', '.dar_formato($_POST['monfin'][$i]).','.dar_formato($_POST['monaprob'][$i]).',
									'.dar_formato($_POST['montrasf'][$i]).', '.dar_formato($_POST['monpendientetrasf'][$i]).', '.dar_formato($_POST['anio_fin'][$i]).',
			            '.dar_formato($_POST['tipo_fin'][$i]).', '.$estatus_tabla.');';
			$row_financiamiento=pg_query($sql_v_financiamiento) or die("Error actualizando v_financiamiento ".pg_last_error().$sql_v_financiamiento);
		}
	}//fin Actualizar en v_financiamiento

	//ACTUALIZA EN LA TABLA v_inversion_fragmentada
	$sql_v_inversion_fragmentada='UPDATE v_inversion_fragmentada SET infraestructura='.dar_formato($pago_0).', maquinaria='.dar_formato($pago_1).', 
	                                                                 insumos='.dar_formato($pago_2).',fuerza_trabajo='.dar_formato($pago_3).', 
																																	 servicios='.dar_formato($pago_4).',inversion='.dar_formato($pago).' 
																																	 WHERE id_proyecto='.dar_formato($id_proyecto).';';
	$result_inversion_fragmentada=pg_query($sql_v_inversion_fragmentada) or die("Error actualizando v_inversion_fragmentada ".pg_last_error().$sql_v_inversion_fragmentada);
			
	//ACTUALIZA EN LA TABLA v_productores
	$sql_v_productores='UPDATE v_productores SET num_pro_directos='.dar_formato($productores_directos).', 
	                                             num_prod_femeninos='.dar_formato($productores_femenino).', 
																							 num_prod_masculinos='.dar_formato($productores_masculino).', 
																							 num_prod_indirectos='.dar_formato($productores_indirectos).' 
																							 WHERE id_proyecto='.dar_formato($id_proyecto).';';
	$result_v_productores=pg_query($sql_v_productores) or die("Error actualizando v_productores ".pg_last_error().$sql_v_productores);
	//fin Actualizar en v_productores

	//ACTUALIZA EN LA TABLA v_produccion_proyecto
	$sql_v_productores='UPDATE v_produccion_proyecto SET estatus_produccion='.dar_formato($estatus_produccion).', 
	                                                     fecha_produccion='.dar_formato($fecha_inicio_produccion).', 
																											 prod_principal='.dar_formato($producto_principal).', 
																											 meta_produccion='.dar_formato($meta_produccion).', 
																											 beneficiarios='.dar_formato($beneficiarios).' 
																											 WHERE id_proyecto='.dar_formato($id_proyecto).';';
	$result_v_productores=pg_query($sql_v_productores) or die("Error actualizando v_produccion_proyecto ".pg_last_error().$sql_v_productores);
	//fin Actualizar en v_produccion_proyecto

	$sql_v_ubicacion_proyecto_georeferencial='UPDATE v_ubicacion_proyecto_georeferencial SET estado='.dar_formato($estado).', 
	                                                                                         municipio='.dar_formato($municipio).', 
																																													 parroquia='.dar_formato($parroquia).', 
																																													 id_circuito='.dar_formato($circuito).', 
																																													 id_eje_parroquial='.dar_formato($eje_parroquial).', 
																																													 latitud='.dar_formato($latitud).', 
																																													 longitud='.dar_formato($longitud).', 
																																													 direccion='.dar_formato($direccion_proyecto).' 
																																													 WHERE id_proyecto='.dar_formato($id_proyecto).';';
	$result_ubicacion=pg_query($sql_v_ubicacion_proyecto_georeferencial)
	or die("Error actualizando v_ubicacion_proyecto_georeferencial ".pg_last_error().$sql_v_ubicacion_proyecto_georeferencial);
	
	if (!empty($result_ubicacion))
	{
		echo "<script>alert('Actualizacion Exitosa'); location.href = 'consultar_proyecto.php';</script>";
	}
	else
	{
		echo "<script>alert('ATENCIÓN: Han ocurrido errores durante la actualización'); location.href = 'consultar_proyecto.php';</script>";
	}
	//FIN ACTUALIZAR


