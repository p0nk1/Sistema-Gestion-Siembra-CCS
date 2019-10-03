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
		<TITLE>CAPITULO IX</TITLE>
		<link rel="stylesheet" type="text/css" href="../../../css/css.css">
		<link rel="stylesheet" type="text/css" href="../../../js/accordeon/accordion.css">
		<script src="../../../js/general.js" type="text/javascript"></script>
		<script src="../../../js/accordeon/jquery.js" type="text/javascript"></script>
		<script src="../../../js/accordeon/jquery-ui.js" type="text/javascript"></script>
		<script src="../../../js/accordeon/cory-accordion-noConflict.js" type="text/javascript"></script>
	</HEAD>
	<BODY>
		<TABLE id="tablaTitulo" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
			<TR><TD class="subtituloBackground"> RELACI&Oacute;N SOCIALISTA DE LA PROPIEDAD</TD></TR>
		</TABLE>
		<BR>
		<FORM action="" id="formRegNovenoCap" name="formRegNovenoCap" method="POST" onsubmit="">
		<TABLE id="tablaNovenoCapitulo" border="0" cellpadding="2" cellspacing="2" align="center" width="90%">
		<TR>
			<TD>
			<div id="accordion">
				<div class="section">
					<h2>PROPIEDAD DE LOS MEDIOS DE PRODUCCION</h2>
					<div class="section-content">
						<TABLE border="0" cellpadding="0" cellspacing="0" align="center" width="95%">
							<TR bgcolor="White"><TD align="center"><BR><TEXTAREA name="" id="" rows="10" cols="153"><??></TEXTAREA><BR><BR></TD></TR>
						</TABLE>
					</div>
				</div>
				<div class="section">
					<h2>ESTRUCTURA ORGANIZACIONAL</h2>
					<div class="section-content">
						<TABLE border="0" cellpadding="0" cellspacing="0" align="center" width="95%">
							<TR bgcolor="White"><TD align="center"><BR><TEXTAREA name="" id="" rows="10" cols="153"><??></TEXTAREA><BR><BR></TD></TR>
						</TABLE>
					</div>
				</div>
				<div class="section">
					<h2>ELECCION Y ROTACION DE LOS ROLES DE RESPONSABILIDAD</h2>
					<div class="section-content">
					<TABLE border="0" cellpadding="0" cellspacing="0" align="center" width="95%">
						<TR bgcolor="White">
							<TD align="center">
							<BR>
							<TABLE  border="0" cellpadding="0" cellspacing="1" align="center" width="100%" bgcolor="#D6D6D6">
								<TR><TD class="tituloTablas" align="center" colspan="4" bgcolor="#F2F2F2">AGREGAR DISTRIBUCION DE ROLES</TD></TR>
								<TR>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30%">Rol de Responsabilidad</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30%">Modo de Elecci&oacute;n</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="32%">Periodo de Permanencia</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="8%">Acci&oacute;n</TD>
								</TR>
								<TR>
									<TD align="center" bgcolor="White"><TEXTAREA onkeyup="this.value = this.value.toUpperCase();" name="rolResp" id="rolResp" rows="1" cols="30"></TEXTAREA></TD>
									<TD align="center" bgcolor="White"><TEXTAREA onkeyup="this.value = this.value.toUpperCase();" name="modoEleccion" id="modoEleccion" rows="1" cols="30"></TEXTAREA></TD>
									<TD align="center" bgcolor="White"><TEXTAREA onkeyup="this.value = this.value.toUpperCase();" name="periodoPer" id="periodoPer" rows="1" cols="30"></TEXTAREA></TD>
									<TD align="center" bgcolor="White"><IMG id="agregar" onclick="validarRoles('rolResp','modoEleccion','periodoPer','tablaRoles')" src="../../../imagenes/add.png" title="Agregar"></TD>
								</TR>
							</TABLE>
							<BR>
							</TD>
						</TR>
						<TR bgcolor="White">
							<TD>
							<BR>
							<TABLE  border="0" cellpadding="0" cellspacing="1" align="center" width="100%" bgcolor="#D6D6D6" id="tablaRoles">
								<TR><TD class="tituloTablas" align="center" colspan="6" bgcolor="#F2F2F2">CUADRO DESCRIPTIVO DE DISTRIBUCION DE ROLES </TD></TR>
							</TABLE>
							<BR>
							</TD>
						</TR>
					</TABLE>
					</div>
				</div>
				<div class="section">
					<h2>CONTRAL DE LA GESTION, RENDICION DE CUENTAS PUBLICAS</h2>
					<div class="section-content">
						<TABLE border="0" cellpadding="0" cellspacing="0" align="center" width="95%" bgcolor="#D6D6D6">
							<TR bgcolor="White"><TD align="center"><BR><TEXTAREA name="" id="" rows="10" cols="153"><??></TEXTAREA><BR><BR></TD></TR>
						</TABLE>
					</div>
				</div>
				<div class="section">
					<h2>DEMOCRATIZACION DEL SABER</h2>
					<div class="section-content">
						<TABLE border="0" cellpadding="2" cellspacing="0" align="center" width="95%" bgcolor="#D6D6D6">
							<TR bgcolor="White"><TD align="center"><BR><TEXTAREA name="" id="" rows="10" cols="153"><??></TEXTAREA><BR><BR></TD></TR>
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