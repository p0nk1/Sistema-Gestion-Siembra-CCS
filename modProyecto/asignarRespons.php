<?php
	error_reporting(0);
	session_start();
	include_once ("../funciones/funciones_session.php");
	include_once ("../conexion/conexionpg.php");
	include_once ("../funciones/queryProyectos.php");
	include_once ("../funciones/funciones.php");
	comprobarSession($_SESSION['adminProy']);
	extract($_POST);
	extract($_GET);

	$id_proy=$_GET['id'];
	$id_user=$_SESSION['adminProy']['id_usuario'];
	$fecha=date('Y-m-d H:i:s');
// acutalizar productor asignado proyecto UPDATE v_productores_nuevo SET id_proyecto = where id_proyecto = 1 and id_productor
// buscar productor sin proyecto SELECT id_proyecto, nombre_apellido FROM v_productores_nuevo where id_proyecto = 1
// ($id_proy, $resp_proy, $id_user, $fecha)
	/*------------- GUARDAR SELECCION DE RESPONSABLES ----------------*/
	if(isset($enviar)){
		$seleccionados = array_values(array_diff($responsables, array('')));
		echo $seleccionados.'mmmm';
		$totalSeleccionado=count($seleccionados);
		echo $totalSeleccionado."string";
		if($totalSeleccionado<1){
			mostrar_mensaje(' Debe Seleccionar Uno o Mas Responsables !!!...');
		}else{
			if(!empty($seleccionados)){
				for($i=0;$i<count($seleccionados);$i++){
					$ver=verificar_resp_proy($seleccionados[$i], $id_proy);
					if($ver==1){
						print "<script>".mostrar_mensaje('El Usuario '.$seleccionados[$i].' Ya es Responsable de Este Proyecto!!!....')."</script>";
						print("<script>window.location.replace('../asignar_responsable.php');</script>");
					}else{
						$reg=asignar_responsable_proyecto($id_proy, $seleccionados[$i], $id_user, $fecha);
						echo $reg;
						print "<script>".mostrar_mensaje('La Asignacion se Realizo con Exito!!!...')."</script>";
						print "<script>window.opener.location.reload();</script>";
						print("<script>window.close();</script>");
					}
				}
			}
		}
	}
	// if(isset($enviar)){
	// 	//escribir la funcion para asiganar el responsable( hacer un update a la tabla v_proyecto cambiando el id del productor que sera asignado al proycto).
	// 	asignar_responsable_proyecto($id_proy, $id_user,);


	// }
	
	/*------------- CANCELAR ----------------*/
	if(isset($cancelar)){
		echo "<script language=javascript> window.close(); </script>";
	}
?>
<HTML>
	<HEAD>
		<TITLE></TITLE>
		<link rel="stylesheet" type="text/css" href="../css/css.css"> 
		<link rel="stylesheet" href="../clases/chosen/chosen.css" />
		<script type="text/javascript" src='../clases/jquery/jquery-1.5.1.min.js'></script>
	</HEAD>
	<BODY>
	<BR>
	<TABLE border="0" width="90%" cellpadding="0" cellspacing="0" align="center">
		<TR><TD class="tituloBackground"> ASIGNAR RESPONSABLE </TD></TR>
	</TABLE>
	<BR>
	<FORM action="" method="POST" name="select_resp">
		<TABLE border="0" width="60%" cellpadding="0" cellspacing="0" align="center">
		<TR><TD bgcolor="White" class="subtituloBackground">Seleccionar Responsable</TD></TR>
		<TR><TD bgcolor="White"><BR><BR></TD></TR>
		<TR><TD><?php cargarComboSeleccionSimple('responsables',$conn,usuarios_por_asignar(), '');?></TD></TR>
		<TR><TD bgcolor="White"><BR><BR></TD></TR>
	</TABLE>
	<BR>
	<TABLE align="center" cellpadding="0" cellspacing="1" width="80%">

		<TR>
			<TD bgcolor="White" align="center" colspan="2">
				<INPUT type="submit" name="enviar" value="ENVIAR" class="botonPeq">
				<INPUT type="submit" name="cancelar" value="CANCELAR" class="botonPeq">
			</TD>
		</TR>
	</TABLE>
	</FORM>
	<script src="../clases/chosen/chosen.jquery.js" type="text/javascript"></script>
	<script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
	</BODY>
</HTML>
