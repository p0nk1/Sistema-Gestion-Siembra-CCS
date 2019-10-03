<?php
	session_start();
	include_once ("../../../funciones/funciones_session.php");
	comprobarSession($_SESSION['adminProy']);
	include_once ("../../../conexion/conexionpg.php");
	include_once ("../../../funciones/queryProyectos.php");
	include_once ("../../../funciones/queryProyectosb.php");
	include_once ("../../../funciones/funciones.php");
	extract($_POST);
	extract($_GET);


	$idProyecto=$id;
	//INICIO REGISTRAR CAPITULO X
	if (isset($regDecCap)) {
		$usuarioRegistra=$_SESSION['adminProy']['id_usuario'];
		$fechaRegistro=date('Y-m-d H:i:s');
		$datosDC=registrarCapituloX(
			$idProyecto, dar_formato($descripcionManoObra), dar_formato($clasificacionManoObra), $usuarioRegistra, dar_formato($fechaRegistro));
		if ($datosDC == TRUE) {
			$registro_exitoso = "Registro Exitoso!!!";
			mostrar_mensaje($registro_exitoso, '../principal.php');
		}
	}
	//FIN REGISTRAR CAPITULO X
?>
<HTML>
	<HEAD>
		<TITLE>CAPITULO X</TITLE>
		<link rel="stylesheet" type="text/css" href="../../../css/css.css">
		<link rel="stylesheet" type="text/css" href="../../../js/accordeon/accordion.css">
		<script src="../../../js/general.js" type="text/javascript"></script>
		<script src="../../../js/accordeon/jquery.js" type="text/javascript"></script>
		<script src="../../../js/accordeon/jquery-ui.js" type="text/javascript"></script>
		<script src="../../../js/accordeon/cory-accordion-noConflict.js" type="text/javascript"></script>
		<script type="text/javascript" src='../../../clases/jquery/jquery-1.5.1.min.js'></script>
		<script type="text/javascript" src="../../../clases/jquery/jquery.textareaCounter.plugin.js"></script>
		<SCRIPT>
			$(document).ready( function() { 
				var options2 = {
					'maxCharacterSize': 2000, 'originalStyle': 'originalTextareaInfo','warningStyle' : 'warningTextareaInfo',
					'warningNumber': 20, 'displayFormat' : '#input/#max | #words Palabras'
				};
				$('#descripcionManoObra').textareaCount(options2);
				$('#clasificacionManoObra').textareaCount(options2);
			});
		</SCRIPT>
		<SCRIPT>

			function validarCampoVacio(valorCampo){
				if(valorCampo=="" || valorCampo=="0" || valorCampo==0 || valorCampo==null) return false
				else return true;
			}

			function validacion(){
				banderaVacio=true;

				manoObraDirecta=document.getElementById('manoObraDir');
				manoObraIndirecta =document.getElementById('manoObraIn');
				empleoDirecto =document.getElementById('empleoDir');
				empleoIndirecto=document.getElementById('empleoIn');
				perfilManoObraDirecta=document.getElementById('perfilManoObraDir');
				areaProDesemDirecta =document.getElementById('areaProDesemDir');
				perfilManoObraIndirecto =document.getElementById('perfilManoObraIn');
				areaProDesemIndirecto=document.getElementById('areaProDesemIn');

				//RECOJE LOS VALORES DE LOS CAMPOS
				valorManoObraDirecta =manoObraDirecta.value
				valorManoObraIndirecta =manoObraIndirecta.value
				valorEmpleoDirecto =empleoDirecto.value
				valorEmpleoIndirecto = empleoIndirecto.value
				valorPerfilManoObraDirecta =perfilManoObraDirecta.value
				valorAreaProDesemDirecta =areaProDesemDirecta.value
				valorPerfilManoObraIndirecto =perfilManoObraIndirecto.value
				valorAreaProDesemIndirecto = areaProDesemIndirecto.value

				//VERIFICA QUE LOS CAMPOS NO ESTEN VACIOS
				if (validarCampoVacio(valorManoObraDirecta)){ banderaVacio=false; }
				if (validarCampoVacio(valorManoObraIndirecta)){ banderaVacio=false; }
				if (validarCampoVacio(valorEmpleoDirecto)){ banderaVacio=false; }
				if (validarCampoVacio(valorEmpleoIndirecto)){ banderaVacio=false; }
				if (validarCampoVacio(valorPerfilManoObraDirecta)){ banderaVacio=false; }
				if (validarCampoVacio(valorAreaProDesemDirecta)){ banderaVacio=false; }
				if (validarCampoVacio(valorPerfilManoObraIndirecto)){ banderaVacio=false; }
				if (validarCampoVacio(valorAreaProDesemIndirecto)){ banderaVacio=false; }

				//SI TIENE CAMPOS VACIOS MANDA EL MENSAJE DE ERROR SINO GUARDA LOS DATOS
				if(banderaVacio==false){
					alert("EL FORMULARIO TIENE CAMPOS VACIOS POR FAVOR VERIFIQUE");
				} else {
					alert("EL FORMULARIO NO TIENE CAMPOS VACIOS");
				}
				return banderaVacio;
			}
		</SCRIPT>
	</HEAD>
	<BODY>
		<TABLE id="tablaTitulo" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
			<TR><TD class="subtituloBackground">MANO DE OBRA</TD></TR>
		</TABLE>
		<BR>
		<FORM action="" id="formRegDecimoCap" name="formRegDecimoCap" method="POST" onsubmit="return validacion();">
		<TABLE id="tablaDecimoCapitulo" border="0" cellpadding="2" cellspacing="2" align="center" width="80%">
		<TR>
			<TD>
			<div id="accordion">
				<div class="section">
					<h2>DESCRIPCION DE LA MANO DE OBRA</h2>
					<div class="section-content"><BR>
						<TABLE border="0" cellpadding="0" cellspacing="0" align="center" width="95%">
							<TR bgcolor="White"><TD align="center"><TEXTAREA name="descripcionManoObra" id="descripcionManoObra" rows="10" cols="153"><?$descripcionManoObra?></TEXTAREA><BR></TD></TR>
						</TABLE>
					</div>
				</div>
				<div class="section">
					<h2>CLASIFICACION DE LA MANO DE OBRA</h2>
					<div class="section-content"><BR>
						<TABLE border="0" cellpadding="0" cellspacing="0" align="center" width="95%">
							<TR bgcolor="White"><TD align="center"><TEXTAREA name="clasificacionManoObra" id="clasificacionManoObra" rows="10" cols="153"><?$clasificacionManoObra?></TEXTAREA><BR></TD></TR>
							<TR>
								<TD align="center">
								<BR>
								<TABLE  border="0" cellpadding="2" cellspacing="1" align="center" width="100%" bgcolor="#D6D6D6">
									<TR><TD class="tituloTablas" align="center" colspan="4" bgcolor="#F2F2F2">CUADRO DESCRIPTIVO DE LA CLASIFICACION DE LA MANO DE OBRA</TD></TR>
									<TR>
										<TD class="tituloTablas" align="center" bgcolor="#F2F2F2"></TD>
										<TD class="tituloTablas" align="center" bgcolor="#F2F2F2">N&deg; TRABAJADORES</TD>
										<TD class="tituloTablas" align="center" bgcolor="#F2F2F2">PERFIL</TD>
										<TD class="tituloTablas" align="center" bgcolor="#F2F2F2">AREA PRODUCTIVA A DESEMPE&Ntilde;AR</TD>
									</TR>
									<TR>
										<TD class="tituloTablas" align="center" bgcolor="#F2F2F2">MANO DE OBRA DIRECTA</TD>
										<TD class="tituloTablas" align="center" bgcolor="White"><INPUT type="text" name="manoObraDir" id="manoObraDir" value="<?=$manoObraDir?>" size="15"></TD>
										<TD class="tituloTablas" align="center" bgcolor="White"><TEXTAREA onkeyup="this.value = this.value.toUpperCase();" name="perfilManoObraDir" id="perfilManoObraDir" rows="1" cols="25"><?=$perfilManoObraDir?></TEXTAREA></TD>
										<TD class="tituloTablas" align="center" bgcolor="White"><TEXTAREA onkeyup="this.value = this.value.toUpperCase();" name="areaProDesemDir" id="areaProDesemDir" rows="1" cols="25"><?=$areaProDesemDir?></TEXTAREA></TD>
									</TR>
									<TR>
										<TD class="tituloTablas" align="center" bgcolor="#F2F2F2">MANO DE OBRA INDIRECTA</TD>
										<TD class="tituloTablas" align="center" bgcolor="White"><INPUT type="text" name="manoObraIn" id="manoObraIn" value="<?=$manoObraIn?>" size="15"></TD>
										<TD class="tituloTablas" align="center" bgcolor="White"><TEXTAREA onkeyup="this.value = this.value.toUpperCase();" name="perfilManoObraIn" id="perfilManoObraIn" rows="1" cols="25"><?=$perfilManoObraIn?></TEXTAREA></TD>
										<TD class="tituloTablas" align="center" bgcolor="White"><TEXTAREA onkeyup="this.value = this.value.toUpperCase();" name="areaProDesemIn" id="areaProDesemIn" rows="1" cols="25"><?=$areaProDesemIn?></TEXTAREA></TD>
									</TR>
									<TR>
										<TD class="tituloTablas" align="center" bgcolor="#F2F2F2">N&deg; EMPLEOS DIRECTOS</TD>
										<TD class="tituloTablas" align="center" bgcolor="White"><INPUT type="text" name="empleoDir" id="empleoDir" value="<?=$empleoDir?>" size="15"></TD>
										<TD class="tituloTablas" align="center" bgcolor="#F2F2F2">N&deg; EMPLEOS INDIRECTOS</TD>
										<TD class="tituloTablas" align="center" bgcolor="White"><INPUT type="text" name="empleoIn" id="empleoIn" value="<?=$empleoIn?>" size="15"></TD>
									</TR>
								</TABLE>
								<BR>
								</TD>
							</TR>
						</TABLE>
					</div>
				</div>
			</div>
			</TD>
		</TR>
		</TABLE>
		<BR>
		<TABLE id="tablaBoton" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
			<TR><TD align="center"><INPUT id="regDecCap" name="regDecCap" type="submit" value="REGISTRAR CAPITULO" class="botonGrande"></TD></TR>
		</TABLE>
		</FORM>
	</BODY>
</HTML>
