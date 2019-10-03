<?php
	include("../conexion/conexionpg.php");
	include_once('../funciones/funciones.php');
	$id_municipio  = $_GET['id_municipio'];
	$sql_parroquia = 'SELECT id_parroquia, desc_parroquia FROM e_parroquia WHERE id_municipio='.$id_municipio;
	echo cargar_combo('parroquia',$conexion,$sql_parroquia,$parroquia);
?>