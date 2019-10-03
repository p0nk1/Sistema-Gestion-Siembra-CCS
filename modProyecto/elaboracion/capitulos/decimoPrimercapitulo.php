<?php
	session_start();
	include_once ("../../../funciones/funciones_session.php");
	comprobarSession($_SESSION['adminProy']);
	include_once ("../../../conexion/conexionpg.php");
	include_once ("../../../funciones/queryProyectosb.php");
	include_once ("../../../funciones/funciones.php");
	extract($_POST);
	extract($_GET);

	$idProyecto=$id;
	//INICIO REGISTRAR
	if (isset($regDecPrimCap)) {
		$usuarioRegistra=$_SESSION['adminProy']['id_usuario'];
		$fechaRegistro=date('Y-m-d H:i:s');
		$datos=registrarCapituloXI(dar_formato($descCronAct),$idProyecto, $usuarioRegistra, dar_formato($fechaRegistro));
		if (!empty($datos)) {
			$registro_exitoso = "Registro Exitoso!!!";
			mostrar_mensaje($registro_exitoso, '../principal.php');
		}
	}
?>
<HTML>
	<HEAD>
		<TITLE>CAPITULO XI</TITLE>
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
				$('#descCronAct').textareaCount(options2);
			});
		</SCRIPT>
	</HEAD>
	<BODY>
		<TABLE id="tablaTitulo" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
			<TR><TD class="subtituloBackground">CRONOGRAMA DE ACTIVIDADES</TD></TR>
		</TABLE>
		<BR>
		<FORM action="" id="formRegDecimoPrimerCap" name="formRegDecimoPrimerCap" method="POST" onsubmit="">
		<TABLE id="tablaDecimoPrimerCapitulo" border="0" cellpadding="2" cellspacing="2" align="center" width="80%">
		<TR>
			<TD>
			<div id="accordion">
				<div class="section">
					<h2>DESCRIPCION DEL CRONOGRAMA DE ACTIVIDADES</h2>
					<div class="section-content"><BR>
						<TABLE border="0" cellpadding="0" cellspacing="0" align="center" width="95%">
							<TR bgcolor="White"><TD align="center"><TEXTAREA name="descCronAct" id="descCronAct" rows="10" cols="153"><?=$descCronAct?></TEXTAREA><BR></TD></TR>
						</TABLE>
					</div>
				</div>
			</div>
			</TD>
		</TR>
		</TABLE>
		<BR>
		<TABLE id="tablaBoton" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
			<TR><TD align="center"><INPUT id="regDecPrimCap" name="regDecPrimCap" type="submit" value="REGISTRAR CAPITULO" class="botonGrande"></TD></TR>
		</TABLE>
		</FORM>
	</BODY>
</HTML>