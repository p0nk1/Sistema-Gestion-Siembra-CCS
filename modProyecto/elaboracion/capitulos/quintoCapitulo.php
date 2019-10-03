<?php
	session_start();
	include_once ("../../../funciones/funciones_session.php");
	comprobarSession($_SESSION['adminProy']);
	include_once ("../../../conexion/conexionpg.php");
	include_once ("../../../funciones/queryProyectos.php");
	include_once ("../../../funciones/funciones.php");
	extract($_POST);
	extract($_GET);

?>
<HTML>
	<HEAD>
		<TITLE>CAPITULO V</TITLE>
		<link rel="stylesheet" type="text/css" href="../../../css/css.css">
		<link rel="stylesheet" type="text/css" href="../../../js/accordeon/accordion.css">
		<script src="../../../js/general.js" type="text/javascript"></script>
		<script src="../../../js/accordeon/jquery.js" type="text/javascript"></script>
		<script src="../../../js/accordeon/jquery-ui.js" type="text/javascript"></script>
		<script src="../../../js/accordeon/cory-accordion-noConflict.js" type="text/javascript"></script>
	</HEAD>
	<BODY>
		<TABLE id="tablaTitulo" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
			<TR><TD class="subtituloBackground"> ASPECTOS ESPECIFICOS A DESARROLLAR EN LAS PROPUESTAS TECNICAS DE PROYECTOS SOCIO-PRODUCTIVOS </TD></TR>
		</TABLE>
		<BR>
		<FORM action="" id="formRegQuintoCap" name="formRegQuintoCap" method="POST" onsubmit="">
		<TABLE id="tablaQuintoCapitulo" border="0" cellpadding="2" cellspacing="2" align="center" width="90%">
		<TR>
			<TD>
			<div id="accordion">
				<div class="section">
					<h2>CADENA SOCIO-PRODUCTIVA</h2>
					<div class="section-content">
					<BR>
					<TABLE border="0" cellpadding="2" cellspacing="0" align="center" width="80%" bgcolor="#D6D6D6">
						<TR bgcolor="White"><TD align="center"><TEXTAREA name="" id="" rows="6" cols="153"><??></TEXTAREA></TD></TR>
					</TABLE>
					<BR>
					<TABLE border="0" cellpadding="0" cellspacing="1" align="center" width="95%" bgcolor="#D6D6D6">

						<TR><TD class="tituloTablas" align="center" colspan="4" bgcolor="#F2F2F2">DIAGRAMA DE CADENA SOCIO-PRODUCTIVA</TD></TR>
						<TR>
							<TD>
							<div id="divPasoCero" class="acc_container">
								<div class="block">
									<iframe name="iframe" src="../foto/agregarDiagCadena.php" width="100%" height="350px" align="top" scrolling="no" style="border:0px solid green"></iframe>
								</div>
							</div>
							</TD>
						</TR>
					</TABLE>
					<BR>
					</div>
				</div>
				<div class="section">
					<h2>DIAGRAMA DE PROCESOS</h2>
					<div class="section-content">
					<BR>
					<TABLE border="0" cellpadding="2" cellspacing="0" align="center" width="80%" bgcolor="#D6D6D6">
						<TR bgcolor="White"><TD align="center"><TEXTAREA name="" id="" rows="6" cols="153"><??></TEXTAREA></TD></TR>
					</TABLE>
					<BR>
					<TABLE border="0" cellpadding="0" cellspacing="1" align="center" width="95%" bgcolor="#D6D6D6">

						<TR><TD class="tituloTablas" align="center" colspan="4" bgcolor="#F2F2F2">DIAGRAMA DEL PROCESO PRODUCTIVO</TD></TR>
						<TR>
							<TD>
							<div id="divPasoCero" class="acc_container">
								<div class="block">
									<iframe name="iframe" src="../foto/agregarDiagProc.php" width="100%" height="350px" align="top" scrolling="no" style="border:0px solid green"></iframe>
								</div>
							</div>
							</TD>
						</TR>
					</TABLE>
					<BR>
					</div>
				</div>
				<div class="section">
					<h2>PERIODO OPERACIONAL ESTIMADO</h2>
					<div class="section-content">
					<TABLE border="0" cellpadding="2" cellspacing="2" align="center" width="80%">
						<TR><TD align="center"><TEXTAREA name="" id="" rows="10" cols="153"><??></TEXTAREA></TD></TR>
					</TABLE>
					</div>
				</div>
				<div class="section">
					<h2>BALANCE DE MATERIALES / DESPERDICIOS DEL PROCESO PRODUCTIVO </h2>
					<div class="section-content">
					<TABLE border="0" cellpadding="2" cellspacing="2" align="center" width="80%">
						<TR><TD align="center"><TEXTAREA name="" id="" rows="10" cols="153"><??></TEXTAREA></TD></TR>
					</TABLE>
					</div>
				</div>
			</div>
			</TD>
		</TR>
		</TABLE>
		</FORM>
	</BODY>
</HTML>