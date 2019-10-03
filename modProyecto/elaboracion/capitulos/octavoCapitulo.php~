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
		<TITLE>CAPITULO VIII</TITLE>
		<link rel="stylesheet" type="text/css" href="../../../css/css.css">
		<link rel="stylesheet" type="text/css" href="../../../js/accordeon/accordion.css">
		<script src="../../../js/general.js" type="text/javascript"></script>
		<script src="../../../js/accordeon/jquery.js" type="text/javascript"></script>
		<script src="../../../js/accordeon/jquery-ui.js" type="text/javascript"></script>
		<script src="../../../js/accordeon/cory-accordion-noConflict.js" type="text/javascript"></script>
	</HEAD>
	<BODY>
		<TABLE id="tablaTitulo" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
			<TR><TD class="subtituloBackground">ESTUDIO DE IMPACTO AMBIENTAL</TD></TR>
		</TABLE>
		<BR>
		<FORM action="" id="formRegOctavoCap" name="formRegOctavoCap" method="POST" onsubmit="">
		<TABLE id="tablaOctavoCapitulo" border="0" cellpadding="2" cellspacing="2" align="center" width="80%">
		<TR>
			<TD>
			<div id="accordion">
				<div class="section">
					<h2>Descripci&oacute;n del Estudio de Impacto Ambiental</h2>
					<div class="section-content">
						<TABLE border="0" cellpadding="0" cellspacing="0" align="center" width="95%">
							<TR><TD align="center"><TEXTAREA name="" id="" rows="10" cols="153"><??></TEXTAREA></TD></TR>
							<TR><TD align="center"><BR></TD></TR>
							<TR>
								<TD align="center">
								<TABLE  border="0" cellpadding="2" cellspacing="1" align="center" width="100%" bgcolor="#D6D6D6">
									<TR><TD class="tituloTablas" align="center" colspan="4" bgcolor="#F2F2F2">AGREGAR ESTUDIO DE IMPACTO AMBIENTAL</TD></TR>
									<TR>
										<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30%">Impacto Ambiental</TD>
										<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30%">Descripcion</TD>
										<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="32%">Posible Soluci&oacute;n</TD>
										<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="8%">Acci&oacute;n</TD>
									</TR>
									<TR>
										<TD align="center" bgcolor="White"><TEXTAREA onkeyup="this.value = this.value.toUpperCase();" name="impactoAmb" id="impactoAmb" rows="1" cols="30"></TEXTAREA></TD>
										<TD align="center" bgcolor="White"><TEXTAREA onkeyup="this.value = this.value.toUpperCase();" name="descImpacto" id="descImpacto" rows="1" cols="30"></TEXTAREA></TD>
										<TD align="center" bgcolor="White"><TEXTAREA onkeyup="this.value = this.value.toUpperCase();" name="posSolucion" id="posSolucion" rows="1" cols="30"></TEXTAREA></TD>
										<TD align="center" bgcolor="White"><IMG id="agregar" onclick="validarImpacto('impactoAmb','descImpacto','posSolucion','tablaImpacto')" src="../../../imagenes/add.png" title="Agregar"></TD>
									</TR>
								</TABLE>
								</TD>
							</TR>
							<TR><TD align="center"><BR></TD></TR>
							<TR>
								<TD>
								<TABLE  border="0" cellpadding="2" cellspacing="1" align="center" width="100%" bgcolor="#D6D6D6" id="tablaImpacto">
									<TR><TD class="tituloTablas" align="center" colspan="6" bgcolor="#F2F2F2">CUADRO DESCRIPTIVO DEL ESTUDIO DE IMPACTO AMBIENTAL</TD></TR>
								</TABLE>
								</TD>
							</TR>
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