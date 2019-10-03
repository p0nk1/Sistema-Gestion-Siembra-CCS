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
	$idSocio = $idSocio;
	$idProyecto = $idProyecto;
	//BUSCA LOS DATOS DEL SOCIO PARA MODIFICAR
	$datosSocio=buscarSocioProyecto($idProyecto, $idSocio);
	//MODIFICA DATOS DE LOS SOCIOS DEL PROYECTO
	if(isset($modificarSocio)){
		modificarSocioProyecto(dar_formato($nombApeSocio), dar_formato($telefonoSocio), dar_formato($emailSocio), $idProyecto, $idSocio);
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
		<TITLE>Modificar Socio</TITLE>
		<link rel="stylesheet" type="text/css" href="../../../../css/css.css">
		<script src="../../../../js/general.js" type="text/javascript"></script>
		<SCRIPT>
			function validarCampoVacio(valorCampo){
				if(valorCampo=="" || valorCampo=="0" || valorCampo==0 || valorCampo==null) return true
				else return false;
			}
			function validacion(){
				banderaVacio=true;

				modNombreApellido =document.getElementById('nombApeSocio');
				modTelefSocio =document.getElementById('telefonoSocio');
				modEmailSocio =document.getElementById('emailSocio');
				//RECOJE LOS VALORES DE LOS CAMPOS
				valorNombre =modNombreApellido.value
				valorTelefono =modTelefSocio.value
				valorEmail = modEmailSocio.value
				//VERIFICA QUE LOS CAMPOS NO ESTEN VACIOS
				if (validarCampoVacio(valorNombre)){ banderaVacio=false; }
				if (validarCampoVacio(valorTelefono)){ banderaVacio=false; }
				if (validarCampoVacio(valorEmail)){ banderaVacio=false; }

				//SI TIENE CAMPOS VACIOS MANDA EL MENSAJE DE ERROR SINO GUARDA LOS DATOS
				if(banderaVacio==false){
					alert("EL FORMULARIO TIENE CAMPOS VACIOS POR FAVOR VERIFIQUE!!!");
				}
				return banderaVacio;
			}

			function campoTlfSolicitante(){
				valorTlfSolicitante = document.getElementById("telefonoSolicitante").value;
				if( !(/^\d{11}$/.test(valorTlfSolicitante)) ) {
					alert("ESTE CAMPO NO DEBE SER MENOR NI MAYOR A 11 DIGITOS!!!");
				  //return false;
				}
			}
			function campoTlfSocio(){
				valorTlfSocio = document.getElementById("telefonoSocio").value;
				if( !(/^\d{11}$/.test(valorTlfSocio)) ) {
					alert("ESTE CAMPO NO DEBE SER MENOR NI MAYOR A 11 DIGITOS!!!");
				  //return false;
				}
			}
			function validaremail(formModSocios) { 
				if (document.formModSocios.emailSocio.value.indexOf('@') == -1) {
					alert ("DEBE INGRESAR UNA DIRECCION DE CORREO VALIDA!!!"); 
				document.formModSocios.emailSocio.focus() ;
				}
			}
		</SCRIPT>
	</HEAD>
	<BODY>
	<BR>
	<TABLE border="0" width="90%" cellpadding="0" cellspacing="0" align="center">
		<TR><TD class="tituloBackground"> MODIFICAR SOCIO </TD></TR>
	</TABLE>
	<BR>
	<FORM action="" id="formModSocios" name="formModSocios" method="POST" onsubmit="return validacion();">
	<TABLE border="0" cellpadding="1" cellspacing="1" align="center" width="95%" bgcolor="#D6D6D6">
		<TR><TD bgcolor="#F2F2F2" class="tituloTablas" align="center" colspan="4">MODIFICAR SOCIO</TD></TR>
		<TR>
			<TD bgcolor="#F2F2F2" class="tituloTablas" align="center" width="35%">Nombres y Apellidos <span class="campo_obligatorio">*&nbsp;</span></TD>
			<TD bgcolor="#F2F2F2" class="tituloTablas" align="center" width="20%">Tel&eacute;fono <span class="campo_obligatorio">*&nbsp;</span></TD>
			<TD bgcolor="#F2F2F2" class="tituloTablas" align="center" width="35%">Correo Electr&oacute;nico <span class="campo_obligatorio">*&nbsp;</span></TD>
		</TR>
		<TR>
			<TD bgcolor="White" align="center"><INPUT type="text" name="nombApeSocio" id="nombApeSocio" size="30" value="<?=$datosSocio['nombApeSocio']?>"></TD>
			<TD bgcolor="White" align="center"><INPUT onkeypress="return(formato_campo(this,event,1));" onchange="campoTlfSocio();" type="text" name="telefonoSocio" id="telefonoSocio" size="30"  value="<?=$datosSocio['telefonoSocio']?>"></TD>
			<TD bgcolor="White" align="center"><INPUT onchange="validaremail(this,form);" type="text" name="emailSocio" id="emailSocio" size="30" value="<?=$datosSocio['emailSocio']?>"></TD>
		</TR>
	</TABLE>
	<BR>
	<TABLE id="tablaBoton" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
		<TR>
			<TD align="center"><INPUT id="modificarSocio" name="modificarSocio" type="submit" value="MODIFICAR SOCIO" class="botonGrande"></TD>
			<TD align="center"><INPUT id="cancelar" name="cancelar" type="submit" value="CANCELAR" class="botonGrande"></TD>
		</TR>
	</TABLE>
	</FORM>
</HTML>