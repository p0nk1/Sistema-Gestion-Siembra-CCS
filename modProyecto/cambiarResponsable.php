<?php
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
	
	/*------------- GUARDAR SELECCION DE RESPONSABLES ----------------*/
	if(isset($enviar)){
		$seleccionados = array_values(array_diff($responsables, array('')));
		$totalSeleccionado=count($seleccionados);
		if($totalSeleccionado<1){
			mostrar_mensaje(' Debe Seleccionar Uno o Mas Responsables !!!...');
		}else{
			if(!empty($seleccionados)){
				$resp=borrar_resp_old($id_proy);
				if($resp==1){
					for($i=0;$i<count($seleccionados);$i++){
						$reg=asignar_responsable_proyecto($id_proy, $seleccionados[$i], $id_user, $fecha);
					}
					print "<script>".mostrar_mensaje('El Cambio se Realizo con Exito!!!...')."</script>";
					print "<script>window.opener.location.reload();</script>";
					print ("<script>window.close();</script>");
				}
			}
		}
	}
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
		<TR><TD class="tituloBackground"> CAMBIAR RESPONSABLE </TD></TR>
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
