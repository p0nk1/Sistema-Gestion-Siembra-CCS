<?php
	session_start();
	include_once ("funciones/funciones_session.php");
	comprobarSession($_SESSION['adminProy']);
	extract($_POST);
	extract($_GET);
?>
<HTML>
	<HEAD>
		<TITLE>Sistema Para el registro y control de Proyectos socioproductivos</TITLE>
		 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<LINK REL="SHORTCUT ICON" HREF="imagenes/imgindex/log32t.png">
		<LINK href="css/css1.css" rel="stylesheet" type="text/css" />
		<!-- Beginning of compulsory code below -->
		<link href="css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="css/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
 <script language="JavaScript">
            function lanzarVentana(ventana){
                ventana_secundaria = window.open(ventana,'_blank','width=550,height=250,location=no,toolbar=no,menubar=no,scrollbars=no')
                ventana_secundaria.moveTo(400,250);
            }

        </script>
	</HEAD>
	<BODY>
		<!-- HEADER -->
		<TABLE border="0" cellpadding="0" cellspacing="0" width="90%" align="center" height="10%" >
			<TR>
				<TD width="10%"><img src="imagenes/imgindex/bann_alcaldia.gif"></TD>
				<TD style="background: url(imagenes/01_waves.png) no-repeat right 10px;"><h1>SISTEMA PARA EL REGISTRO Y CONTROL DE PROYECTOS SOCIOPRODUCTIVOS</h1></TD>
				<TD width="20%" align="right"><img src="imagenes/imgindex/logo_peq_alcaldia.png" width="55" height="55"></TD>
			</TR>
			<TR><TD colspan="3"><br></TD></TR>
		</TABLE>
	<!--  		<table align="center" border="0" cellpadding="0"
 cellspacing="0" height="24%" width="90%">
  <tbody>
    <tr>
      <td style="background-image: url('imagenes/tope_original2.png'); background-position : center; background-repeat : no-repeat;">&nbsp;</td>
    </tr>
  </tbody>
</table>-->
		<!-- BODY -->
		<TABLE border="0" cellpadding="0" cellspacing="0" width="90%" align="center" height="82%">
			<TR>
				<TD align="left" style="width:50%">
					<span class="texto_negro_no_size">Bienvenido:</span>&nbsp;&nbsp;
					<span class="texto_campo_no_size"><?=$_SESSION['adminProy']['nombre_usuario'];?></span>
				</TD>
				<TD align="right" class="texto_negro_no_size" style="width:50%">
					<a href="#" class="link" onClick="lanzarVentana('mod_usuario/cambio_pass.php?cerrar=S')">Cambiar Contrase&ntilde;a</a>&nbsp;&nbsp;&nbsp;
					<a href="cerrar_sesion.php" target="_parent" class="link">Cerrar Sesi&oacute;n</a>
				</TD>
			</TR>
			<TR style="height:30px;">
				<TD colspan="2">
					<TABLE border="0" style="width:100%; height:100%;"  cellspacing="1" cellpadding="0">
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
					por la Unidad de Informaci&oacute;n Econ&oacute;mica de la Direcci&oacute;n de Desarrollo Econ&oacute;mico<br>
					Alcaldia del Municipio Bolivariano Libertador<br>
				</TD>
			</TR>
		</TABLE>
	</BODY>
</HTML>
