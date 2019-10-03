<?php
	session_start();
	extract($_POST);
	extract($_GET);
	include_once ("../../../../funciones/funciones_session.php");
	comprobarSession($_SESSION['adminProy']);
	include_once ("../../../../conexion/conexionpg.php");
	include_once ("../../../../funciones/queryProyectos.php");
	include_once ("../../../../funciones/funciones.php");
	//ID DEL PROYECTO
	$idProyecto=$id;
	if(isset($regrespComProy)){
		//REGISTRAR RESPONSABLES COMUNITARIOS DEL PROYECTO
		$datosResponsablesCapituloII = array();
		$contadorResponsablesCapituloII = 0;
		$banderaDatosResponsablesNombApe = $banderaDatosResponsablesCedula = $banderaDatosResponsablesDireccion = $banderaDatosResponsablesTelefono = 	$banderaDatosResponsablesResponsabilidad = $banderaDatosResponsablesExperiencia = false;
		foreach ($_POST as $datos_post => $valor_post) {
			$auxiliar_post_SC = substr($datos_post, 0, 28);
			if ($auxiliar_post_SC == 'asignaResponsablesNombresApe') {
				$datosResponsablesCapituloII[$contadorResponsablesCapituloII]['asignaResponsablesNombresApe'] = $valor_post;
				$banderaDatosResponsablesNombApe = true;
			}
			$auxiliar_post_SC = substr($datos_post, 0, 24);
			if ($auxiliar_post_SC == 'asignaResponsablesCedula') {
				$datosResponsablesCapituloII[$contadorResponsablesCapituloII]['asignaResponsablesCedula'] = $valor_post;
				$banderaDatosResponsablesCedula = true;
			}
			$auxiliar_post_SC = substr($datos_post, 0, 27);
			if ($auxiliar_post_SC == 'asignaResponsablesDireccion') {
				$datosResponsablesCapituloII[$contadorResponsablesCapituloII]['asignaResponsablesDireccion'] = $valor_post;
				$banderaDatosResponsablesDireccion = true;
			}
			$auxiliar_post_SC = substr($datos_post, 0, 26);
			if ($auxiliar_post_SC == 'asignaResponsablesTelefono') {
				$datosResponsablesCapituloII[$contadorResponsablesCapituloII]['asignaResponsablesTelefono'] = $valor_post;
				$banderaDatosResponsablesTelefono = true;
			}
			$auxiliar_post_SC = substr($datos_post, 0, 33);
			if ($auxiliar_post_SC == 'asignaResponsablesResponsabilidad') {
				$datosResponsablesCapituloII[$contadorResponsablesCapituloII]['asignaResponsablesResponsabilidad'] = $valor_post;
				$banderaDatosResponsablesResponsabilidad = true;
			}
			$auxiliar_post_SC = substr($datos_post, 0, 29);
			if ($auxiliar_post_SC == 'asignaResponsablesExperiencia') {
				$datosResponsablesCapituloII[$contadorResponsablesCapituloII]['asignaResponsablesExperiencia'] = $valor_post;
				$banderaDatosResponsablesExperiencia = true;
			}
			if ( $banderaDatosResponsablesNombApe && $banderaDatosResponsablesCedula && $banderaDatosResponsablesDireccion &&
				$banderaDatosResponsablesTelefono && $banderaDatosResponsablesResponsabilidad && $banderaDatosResponsablesExperiencia) {
				$contadorResponsablesCapituloII++;
				$banderaDatosResponsablesNombApe = $banderaDatosResponsablesCedula = $banderaDatosResponsablesDireccion = $banderaDatosResponsablesTelefono = $banderaDatosResponsablesResponsabilidad = $banderaDatosResponsablesExperiencia = false;
			}
		}
		if(empty($datosResponsablesCapituloII)){
			$sms= "Debe ingresar al menos un (1) Responsable!!!";
			mostrar_mensaje($sms);
		}else{
			//RECOGE DATOS PARA LA AUDITORIA
			$usuarioRegistra=$_SESSION['adminProy']['id_usuario'];
			$fechaRegistro=date('Y-m-d H:i:s');
			$reg=registrarResponsablesComunitariosProy($datosResponsablesCapituloII, $idProyecto);
			print "<script>window.opener.location.reload();</script>";
			print("<script>window.close();</script>");
		}
	}
	//CANCELANDO AGREGAR RESPONSABLES PROYECTO
	if(isset($cancelar)){
		echo "<script language=javascript> window.close(); </script>";
	}
?>
<HTML>
	<HEAD>
		<TITLE>Registrar Responsables Comunitarios de Proyectos</TITLE>
		<link rel="stylesheet" type="text/css" href="../../../../css/css.css">
		<script src="../../../../js/general.js" type="text/javascript"></script>
	</HEAD>
	<BODY>
		<BR>
		<TABLE border="0" width="95%" cellpadding="0" cellspacing="0" align="center">
			<TR><TD class="tituloBackground"> AGREGAR RESPONSABLES DE LA ORGANIZACION SOLICITANTE </TD></TR>
		</TABLE>
		<BR>
		<FORM action="" id="formRegResp" name="formRegResp" method="POST" onsubmit="return validacion();">
		<TABLE  border="0" cellpadding="1" cellspacing="1" width="90%" bgcolor="#D6D6D6" align="center">
			<TR>
				<TD class="tituloTablas" colspan="5"  bgcolor="#F2F2F2" align="center">DATOS DE LOS RESPONSABLES</TD>
			</TR>
			<TR>
				<TD class="tituloTablas" bgcolor="#F2F2F2" align="center" width="70">Nombres y Apellidos <span class="campo_obligatorio">*&nbsp;</span></TD>
				<TD class="tituloTablas" bgcolor="#F2F2F2" align="center" width="30">C&eacute;dula <span class="campo_obligatorio">*&nbsp;</span></TD>
			</TR>
			<TR>
				<TD bgcolor="White" align="center"><INPUT onkeypress="return(formato_campo(this,event,2));" type="text" id="nombApeResp" name="nombApeResp" size="60"></TD>
				<TD bgcolor="White" align="center"><INPUT onkeypress="return(formato_campo(this,event,1));" type="text" id="cedulaResp" name="cedulaResp" size="20"></TD>
			</TR>
			<TR>
				<TD class="tituloTablas" bgcolor="#F2F2F2" align="center">Direcci&oacute;n <span class="campo_obligatorio">*&nbsp;</span></TD>
				<TD class="tituloTablas" bgcolor="#F2F2F2" align="center">Tel&eacute;fono <span class="campo_obligatorio">*&nbsp;</span></TD>
			</TR>
			<TR>
				<TD bgcolor="White" align="center"><INPUT type="text" id="direccionResp" name="direccionResp" size="60"></TD>
				<TD bgcolor="White" align="center"><INPUT onkeypress="return(formato_campo(this,event,1));" type="text" id="telefonoResp" name="telefonoResp" size="20"></TD>
			</TR>
			<TR>
				<TD class="tituloTablas" bgcolor="#F2F2F2" align="center">Responsabilidad <span class="campo_obligatorio">*&nbsp;</span></TD>
				<TD class="tituloTablas" bgcolor="#F2F2F2" align="center">Experiencia <span class="campo_obligatorio">*&nbsp;</span></TD>
			</TR>
			<TR>
				<TD bgcolor="White" align="center"><INPUT onkeypress="return(formato_campo(this,event,2));" type="text" id="respresponsable" name="respresponsable" size="60"></TD>
				<TD bgcolor="White" align="center"><INPUT type="text" id="expResponsable" name="expResponsable" size="20"></TD>
			</TR>
			<TR>
				<TD class="tituloTablas" bgcolor="White" align="center" colspan="2"><IMG id="agregar" onclick="validarResponsable('nombApeResp','cedulaResp','direccionResp','telefonoResp','respresponsable','expResponsable','tablaResponsables')" src="../../../../imagenes/add_socio.png" title="Agregar"></TD>
			</TR>
		</TABLE>
		<BR>
		<TABLE  id="tablaResponsables" border="0" cellpadding="3" cellspacing="1" align="center" width="95%" bgcolor="#D6D6D6">
			<TR><TD bgcolor="#F2F2F2" class="tituloTablas" align="center" colspan="7">RESPONSABLES</TD></TR>
			<TR>
				<TD bgcolor="#F2F2F2" class="tituloTablas" align="center">Nombres y Apellidos</TD>
				<TD bgcolor="#F2F2F2" class="tituloTablas" align="center">C&eacute;dula</TD>
				<TD bgcolor="#F2F2F2" class="tituloTablas" align="center">Direcci&oacute;n</TD>
				<TD bgcolor="#F2F2F2" class="tituloTablas" align="center">Tel&eacute;fono</TD>
				<TD bgcolor="#F2F2F2" class="tituloTablas" align="center">Responsabilidad</TD>
				<TD bgcolor="#F2F2F2" class="tituloTablas" align="center">Experiencia</TD>
				<TD bgcolor="#F2F2F2" class="tituloTablas" align="center">Eliminar</TD>
			</TR>
		</TABLE>
		<BR><BR>
		<TABLE id="tablaBoton" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
			<TR>
				<TD align="center"><INPUT id="regSocios" name="regrespComProy" type="submit" value="REGISTRAR" class="botonGrande"></TD>
				<TD align="center"><INPUT id="cancelar" name="cancelar" type="submit" value="CANCELAR" class="botonGrande"></TD>
			</TR>
		</TABLE>
		</FORM>
	</BODY>
</HTML>