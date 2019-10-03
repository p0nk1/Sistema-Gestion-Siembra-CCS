<?php
	session_start();
	include_once ("../../../../funciones/funciones_session.php");
	comprobarSession($_SESSION['adminProy']);
	include_once ("../../../../conexion/conexionpg.php");
	include_once ("../../../../funciones/queryProyectos.php");
	include_once ("../../../../funciones/funciones.php");
	extract($_POST);
	extract($_GET);
	//IDENTIFICADOR DEL SOCIO
	$idResponsable = $idResp;
	$idProyecto = $idProyecto;
	//ELIMINAR SOCIO
	if($eliminar){
		$resultado=eliminarRespComProyecto($idProyecto, $idResponsable);
		print "<script>window.opener.location.reload();</script>";
		print("<script>window.close();</script>");
	}
	//CANCELANDO ELIMINAR SOCIOS
	if(isset($cancelar)){
		echo "<script language=javascript> window.close(); </script>";
	}
?>
<HTML>
	<HEAD>
		<TITLE>Eliminar Socio</TITLE>
		<link rel="stylesheet" type="text/css" href="../../../../css/css.css">
		<script src="../../../../js/general.js" type="text/javascript"></script>
	</HEAD>
	<BODY>
		<BR>
		<FORM action="" id="formElimResp" name="formElimResp" method="POST">
		<TABLE border="0" width="90%" cellpadding="0" cellspacing="0" align="center">
			<TR><TD class="tituloBackground"> ELIMINAR RESPONSABLE </TD></TR>
			<TR><TD class="texto_rojo" height="100" align="center"> Esta seguro de eliminar a este Responsable? </TD></TR>
		</TABLE>
		<BR>
		<TABLE id="tablaBoton" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
			<TR>
				<TD align="center"><INPUT id="regSocios" name="eliminar" type="submit" value="ELIMINAR" class="botonPeq"></TD>
				<TD align="center"><INPUT id="cancelar" name="cancelar" type="submit" value="CANCELAR" class="botonPeq"></TD>
			</TR>
		</TABLE>
		</FORM>
	</BODY>
</HTML>