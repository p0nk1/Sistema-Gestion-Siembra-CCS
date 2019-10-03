<?php
	session_start();
	include_once ("funciones/funciones_session.php");
	comprobarSession($_SESSION['adminProy']);
	extract($_POST);
	extract($_GET);
?>
<HTML>
	<HEAD>
		<TITLE>Sistema Para la Administraci&oacute;n de Proyectos</TITLE>
		<META http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<LINK REL="SHORTCUT ICON" HREF="imagenes/imgindex/log32t.png">
		<LINK href="css/css.css" rel="stylesheet" type="text/css" />
		<!-- Beginning of compulsory code below -->
		<link href="css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="css/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
	</HEAD>
	<BODY>
		<!-- HEADER -->
		<TABLE border="0" cellpadding="0" cellspacing="0" width="90%" align="center" height="10%">
			<TR>
				<TD width="15%"><img src="imagenes/imgindex/bann_alcaldia.gif"></TD>
				<TD><h1>SISTEMA PARA LA ELABORACION Y CONTROL DE PROYECTOS</h1></TD>
				<TD width="5%" align="right"><img src="imagenes/imgindex/logo_peq_alcaldia.png" width="55" height="55"></TD>
			</TR>
			<TR><TD colspan="3"><HR></TD></TR>
		</TABLE>
		<!-- BODY -->
		<TABLE border="0" cellpadding="0" cellspacing="0" width="90%" align="center" height="82%">
			<TR>
				<TD align="left" style="width:50%">
					<span class="texto_negro_no_size">Bienvenido:</span>&nbsp;&nbsp;
					<span class="texto_campo_no_size"><?=$_SESSION['adminProy']['nombre'];?></span>
				</TD>
				<TD align="right" class="texto_negro_no_size" style="width:50%">
					<a href="#" class="link" onClick="lanzarSubmenu('mod_usuarios/cambio_pass.php?cerrar=S')">Cambiar Contrase&ntilde;a</a>&nbsp;&nbsp;&nbsp;
					<a href="cerrar_sesion.php" target="_parent" class="link">Cerrar Sesi&oacute;n</a>
				</TD>
			</TR>
			<TR style="height:30px;">
				<TD colspan="2">
					<TABLE border="0" style="width:100%; height:100%;" bgcolor="#cc3300" cellspacing="1" cellpadding="0">
						<TR><TD valign="top" bgcolor="#F2F2F2">
						<!-- ****************** Inclusion del Menu *************************-->
						<?php include('menu/menu.php');?>
						<!--****************** Fin Inclusion del Menu *************************-->
						</TD></TR>
					</TABLE>
				</TD>
			</TR>
			<TR style="height:620px;">
				<TD colspan="2">
					<TABLE border="0" style="width:100%; height:100%;" bgcolor="#E3E3E3" cellspacing="1" cellpadding="0">
						<!--<TR><TD valign="top" bgcolor="White">-->
						<!-- ****************** Inclusion del Menu *************************-->
						<?php //include('menu/menu.php');?>
						<!--****************** Fin Inclusion del Menu *************************-->
						<!--</TD></TR>-->
						<TR>
							<TD valign="top" bgcolor="White" >
								<iframe name="iframe" src="principal.php" width="100%" height="100%" align="top"  scrolling="auto" style="border:0px solid green"></iframe>
							</TD>
						</TR>
					</TABLE>
				</TD>
			</TR>
		</TABLE>
		<!-- FOOTER -->
		<TABLE border="0" cellpadding="0" cellspacing="0" width="90%" align="center" height="3%">
			<TR><TD><HR></TD></TR>
			<TR>
				<TD class="texto_campo_no_size" align="center">
					Herramienta Desarrollada en Software Libre<br>
					por la Unidad de Informaci&oacute;n Econ&oacute;mica de la Direcci&oacute;n de Gabinete Econ&oacute;mico<br>
					Alcaldia del Municipio Bolivariano Libertador<br>
				</TD>
			</TR>
		</TABLE>
	</BODY>
</HTML>
