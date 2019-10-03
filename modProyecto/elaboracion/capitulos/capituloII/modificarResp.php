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
	//BUSCA LOS DATOS DEL SOCIO PARA MODIFICAR
	$datosResp=buscarRespComProyecto($idProyecto, $idResponsable);
	//MODIFICANDO DATOS RESPONSABLE COMUNITARIO
	if(isset($modificarResp)){
		modificarResponsableproyecto(
			dar_formato($nombApeResp), $cedulaResp, dar_formato($direccionResp), $idProyecto, $idResponsable,
			$telefonoResp, dar_formato($respresponsable), dar_formato($expResponsable)
		);
		print "<script>window.opener.location.reload();</script>";
		print("<script>window.close();</script>");

	}
	//CANCELANDO MODIFICAR SOCIOS
	if(isset($cancelar)){
		echo "<script language=javascript> window.close(); </script>";
	}
?>
<HTML>
	<HEAD>
		<TITLE>Registrar Responsables Comunitarios de Proyectos</TITLE>
		<link rel="stylesheet" type="text/css" href="../../../../css/css.css">
		<script src="../../../../js/general.js" type="text/javascript"></script>
		<SCRIPT>
			function validarCampoVacio(valorCampo){
				if(valorCampo=="" || valorCampo=="0" || valorCampo==0 || valorCampo==null) return true
				else return false;
			}
			function validacion(){
				banderaVacio=true;

				modNombApeResp =document.getElementById('nombApeResp');
				modCedulaResp =document.getElementById('cedulaResp');
				modDireccionResp =document.getElementById('direccionResp');
				modTelefonoResp =document.getElementById('telefonoResp');
				modRespResponsable =document.getElementById('respresponsable');
				modExpResponsable =document.getElementById('expResponsable');
				//RECOJE LOS VALORES DE LOS CAMPOS
				valorNombre =modNombApeResp.value
				valorCedula =modCedulaResp.value
				valorDireccion = modDireccionResp.value
				valorTelefono =modTelefonoResp.value
				valorResponsabilidad =modRespResponsable.value
				valorExperiencia = modExpResponsable.value
				//VERIFICA QUE LOS CAMPOS NO ESTEN VACIOS
				if (validarCampoVacio(valorNombre)){ banderaVacio=false; }
				if (validarCampoVacio(valorCedula)){ banderaVacio=false; }
				if (validarCampoVacio(valorDireccion)){ banderaVacio=false; }
				if (validarCampoVacio(valorTelefono)){ banderaVacio=false; }
				if (validarCampoVacio(valorResponsabilidad)){ banderaVacio=false; }
				if (validarCampoVacio(valorExperiencia)){ banderaVacio=false; }

				//SI TIENE CAMPOS VACIOS MANDA EL MENSAJE DE ERROR SINO GUARDA LOS DATOS
				if(banderaVacio==false){
					alert("EL FORMULARIO TIENE CAMPOS VACIOS POR FAVOR VERIFIQUE!!!");
				}
				return banderaVacio;
			}
			function campoTlfResp(){
				valorTlfResp = document.getElementById("telefonoResp").value;
				if( !(/^\d{11}$/.test(valorTlfResp)) ) {
					alert("ESTE CAMPO NO DEBE SER MENOR NI MAYOR A 11 DIGITOS!!!");
				  //return false;
				}
			}
		</SCRIPT>
	</HEAD>
	<BODY>
		<BR>
		<TABLE border="0" width="95%" cellpadding="0" cellspacing="0" align="center">
			<TR><TD class="tituloBackground"> AGREGAR RESPONSABLES DE LA ORGANIZACION SOLICITANTE </TD></TR>
		</TABLE>
		<BR>
		<FORM action="" id="formModResp" name="formModResp" method="POST"  onsubmit="return validacion();">
		<TABLE  border="0" cellpadding="1" cellspacing="1" width="90%" bgcolor="#D6D6D6" align="center">
			<TR>
				<TD class="tituloTablas" colspan="5"  bgcolor="#F2F2F2" align="center">DATOS DE LOS RESPONSABLES</TD>
			</TR>
			<TR>
				<TD class="tituloTablas" bgcolor="#F2F2F2" align="center" width="70">Nombres y Apellidos <span class="campo_obligatorio">*&nbsp;</span></TD>
				<TD class="tituloTablas" bgcolor="#F2F2F2" align="center" width="30">C&eacute;dula <span class="campo_obligatorio">*&nbsp;</span></TD>
			</TR>
			<TR>
				<TD bgcolor="White" align="center"><INPUT type="text" id="nombApeResp" name="nombApeResp" size="60" value="<?=$datosResp['nombApeRespon']?>"></TD>
				<TD bgcolor="White" align="center"><INPUT type="text" id="cedulaResp" name="cedulaResp" size="20" value="<?=$datosResp['cedulaRespon']?>" onkeypress="return(formato_campo(this,event,1));"></TD>
			</TR>
			<TR>
				<TD class="tituloTablas" bgcolor="#F2F2F2" align="center">Direcci&oacute;n <span class="campo_obligatorio">*&nbsp;</span></TD>
				<TD class="tituloTablas" bgcolor="#F2F2F2" align="center">Tel&eacute;fono <span class="campo_obligatorio">*&nbsp;</span></TD>
			</TR>
			<TR>
				<TD bgcolor="White" align="center"><INPUT type="text" id="direccionResp" name="direccionResp" size="60" value="<?=$datosResp['direccionRespon']?>"></TD>
				<TD bgcolor="White" align="center"><INPUT type="text" id="telefonoResp" name="telefonoResp" size="20" value="<?=$datosResp['teleRespon']?>"  onchange="campoTlfResp();" onkeypress="return(formato_campo(this,event,1));"></TD>
			</TR>
			<TR>
				<TD class="tituloTablas" bgcolor="#F2F2F2" align="center">Responsabilidad <span class="campo_obligatorio">*&nbsp;</span></TD>
				<TD class="tituloTablas" bgcolor="#F2F2F2" align="center">Experiencia <span class="campo_obligatorio">*&nbsp;</span></TD>
			</TR>
			<TR>
				<TD bgcolor="White" align="center"><INPUT type="text" id="respresponsable" name="respresponsable" size="60" value="<?=$datosResp['responsabilidad']?>"></TD>
				<TD bgcolor="White" align="center"><INPUT type="text" id="expResponsable" name="expResponsable" size="20" value="<?=$datosResp['experiencia']?>"></TD>
			</TR>
		</TABLE>
		<BR>
		<TABLE id="tablaBoton" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
			<TR>
				<TD align="center"><INPUT id="modificarResp" name="modificarResp" type="submit" value="MODIFICAR RESPONSABLE" class="botonGrande"></TD>
				<TD align="center"><INPUT id="cancelar" name="cancelar" type="submit" value="CANCELAR" class="botonGrande"></TD>
			</TR>
		</TABLE>
		</FORM>
	</BODY>
</HTML>