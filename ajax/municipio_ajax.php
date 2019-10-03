<?php
	include("../conexion/conexionpg.php");
	include_once('../funciones/funciones.php');

	$id_estado      = $_GET['id_estado'];
	$sql_municipio = 'SELECT id_municipio, desc_municipio FROM e_municipio WHERE id_estado='.$id_estado;
	echo cargarComboConEvento('municipio',$conn,$sql_municipio,$municipio,'onchange="cargarParroquia();"');

?>
	

