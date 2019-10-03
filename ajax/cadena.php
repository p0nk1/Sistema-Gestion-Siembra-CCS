<link rel="stylesheet" type="text/css" href="../css_multiselect/jquery.multiselect.css" />
<link rel="stylesheet" type="text/css" href="../assets_multiselect/style.css" />
<link rel="stylesheet" type="text/css" href="../css_multiselect/jquery-ui.css" />
<script type="text/javascript" src="../js_multiselect/jquery.js"></script>
<script type="text/javascript" src="../js_multiselect/jquery-ui.min.js"></script>
<script type="text/javascript" src="../js_multiselect/jquery.multiselect.js"></script>

<script type="text/javascript">

$(function(){
	$("#area_cadena").multiselect(

{ selectedList:26 }

);

$("#area_cadena").multiselect({
   show: ["slide", 200],
   hide: ["drop", 500]
});


});
</script>


<?php
	include("../conexion/conexionpg.php");
	include_once('../funciones/funciones.php');
	$id_cadena  = $_GET['id_cadena'];
	$sql_area = "SELECT id_area, area FROM e_area_cadena WHERE id_cadena = '$id_cadena' and estatus_area='1'";
	echo cargarComboConEventoMultiselect('area_cadena',$conexion,$sql_area,$area_cadena,'','area_cadena');
?>
	

