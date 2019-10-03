<?php
	session_start();
	include_once ("../../../funciones/funciones_session.php");
	comprobarSession($_SESSION['adminProy']);
	include_once ("../../../conexion/conexionpg.php");
	include_once ("../../../funciones/queryProyectos.php");
	include_once ("../../../funciones/funciones.php");
	extract($_POST);
	extract($_GET);

	$idProyecto=$id;
	//INICIO REGISTRAR
	if (isset($regPrimerCap)) {
		$usuarioRegistra=$_SESSION['adminProy']['id_usuario'];
		$fechaRegistro=date('Y-m-d H:i:s');
		$datos=registrarCapituloXIII(
			dar_formato($costoMaqEquipos), dar_formato($capitalTrabajo), dar_formato($gastosvariables), dar_formato($aporteComunitario),
			$idProyecto, dar_formato($inversionInicial), $usuarioRegistra, dar_formato($fechaRegistro));
		if (!empty($datos)) {
			$registro_exitoso = "Registro Exitoso!!!";
			mostrar_mensaje($registro_exitoso, '../principal.php');
		}
	}

?>
<HTML>
	<HEAD>
		<TITLE>CAPITULO XIII</TITLE>
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
				$('#costoMaqEquipos').textareaCount(options2);
				$('#capitalTrabajo').textareaCount(options2);
				$('#gastosvariables').textareaCount(options2);
				$('#aporteComunitario').textareaCount(options2);
				$('#inversionInicial').textareaCount(options2);
			});
		</SCRIPT>
	</HEAD>
	<BODY>
		<TABLE id="tablaTitulo" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
			<TR><TD class="subtituloBackground">PRESUPUESTO DE INVERSI&Oacute;N Y COSTOS OPERATIVOS</TD></TR>
		</TABLE>
		<BR>
		<FORM action="" id="formRegDecimoTercerCap" name="formRegDecimoTercerCap" method="POST" onsubmit="">
		<TABLE id="tablaDecimoTercerCapitulo" border="0" cellpadding="2" cellspacing="2" align="center" width="80%">
		<TR>
			<TD>
			<div id="accordion">
				<div class="section">
					<h2>COSTO DE MAQUINARIAS Y EQUIPOS</h2>
					<div class="section-content"><BR>
						<TABLE border="0" cellpadding="0" cellspacing="0" align="center" width="95%">
							<TR bgcolor="White"><TD><TEXTAREA name="costoMaqEquipos" id="costoMaqEquipos" rows="10" cols="150"><?=$costoMaqEquipos?></TEXTAREA><BR></TD></TR>
						</TABLE>
					</div>
				</div>
				<div class="section">
					<h2>CAPITAL DE TRABAJO (COSTO DE MATERIAS PRIMAS E INSUMOS)</h2>
					<div class="section-content"><BR>
						<TABLE border="0" cellpadding="0" cellspacing="0" align="center" width="95%">
							<TR bgcolor="White"><TD><TEXTAREA name="capitalTrabajo" id="capitalTrabajo" rows="10" cols="150"><?=$capitalTrabajo?></TEXTAREA><BR></TD></TR>
						</TABLE>
					</div>
				</div>
				<div class="section">
					<h2>GASTOS VARIABLES (ALQUILER, SERVICIOS, MANO DE OBRA, INFRAESTRUCTURA)</h2>
					<div class="section-content"><BR>
						<TABLE border="0" cellpadding="0" cellspacing="0" align="center" width="95%">
							<TR bgcolor="White"><TD><TEXTAREA name="gastosvariables" id="gastosvariables" rows="10" cols="150"><?=$gastosvariables?></TEXTAREA><BR></TD></TR>
						</TABLE>
					</div>
				</div>
				<div class="section">
					<h2>APORTES COMUNITARIOS</h2>
					<div class="section-content"><BR>
						<TABLE border="0" cellpadding="0" cellspacing="0" align="center" width="95%">
							<TR bgcolor="White"><TD><TEXTAREA name="aporteComunitario" id="aporteComunitario" rows="10" cols="150"><?=$aporteComunitario?></TEXTAREA><BR></TD></TR>
						</TABLE>
					</div>
				</div>
				<div class="section">
					<h2>INVERSION INICIAL</h2>
					<div class="section-content"><BR>
						<TABLE border="0" cellpadding="0" cellspacing="0" align="center" width="95%">
							<TR bgcolor="White"><TD><TEXTAREA name="inversionInicial" id="inversionInicial" rows="10" cols="150"><?=$inversionInicial?></TEXTAREA><BR></TD></TR>
						</TABLE>
					</div>
				</div>
			</div>
			</TD>
		</TR>
		</TABLE>
		<BR>
		<TABLE id="tablaBoton" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
			<TR><TD align="center"><INPUT id="regPrimerCap" name="regPrimerCap" type="submit" value="REGISTRAR CAPITULO" class="botonGrande"></TD></TR>
		</TABLE>
		</FORM>
	</BODY>
</HTML>