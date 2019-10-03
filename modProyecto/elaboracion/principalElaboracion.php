<?php
	session_start();
	include_once ("../../funciones/funciones_session.php");
	include_once ("../../conexion/conexionpg.php");
	include_once ("../../funciones/queryProyectos.php");
	include_once ("../../funciones/funciones.php");
	comprobarSession($_SESSION['adminProy']);
	extract($_POST);
	extract($_GET);
	
	
	$nombreProyecto=buscar_nombre_proyecto($id);
?>
<html>
<head>
	<TITLE>DESARROLLO DEL PROYECTO: <?=$nombreProyecto?></TITLE>
	<link rel="stylesheet" type="text/css" href="standalone.css" />
	<link rel="stylesheet" type="text/css" href="tabs.css" />
	<LINK href="../../css/css.css" rel="stylesheet" type="text/css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="jquery.tools.min.js" type="text/javascript"></script>
	<!-- This JavaScript snippet activates those tabs -->
	<script>
		// perform JavaScript after the document is scriptable.
		$(function() { $("ul.tabs").tabs("> .pane"); });
	</script>
	<style>
		div.wrap {
			width:1220px;
			margin-bottom:0px;
			margin-left:1.5em;
		}
		.wrap .pane {	
			background:#FAFFFa;
			display:none;
			padding:20px;
			border:1px solid #999;
			border-top:0;
			font-size:11px;
			color:#456;
			margin: 0 0 5px 0;	
			_background-image:none;
		}
		.wrap .pane p {
			font-family:Arial,Verdana,Bitstream Vera Sans, Sans,Sans-serif;
			font-size:12px;
			font-weight:bold;
			color:#9f0707;
			margin: 20px 0 10px 0;	
			text-align:right;
		}
	</style>
</head>
<BODY>
	<BR>
	<TABLE id="tablaTitulo" border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
		<TR><TD class="tituloBackground">  DESARROLLO DEL PROYECTO: <?=$nombreProyecto?> </TD></TR>
	</TABLE>
	<BR>
	<div class="wrap">
		<!-- the tabs -->
		<ul class="tabs">
			<li><a>CAPITULO I</a></li>
			<li><a>CAPITULO II</a></li>
			<li><a>CAPITULO III</a></li>
			<li><a>CAPITULO IV</a></li>
			<li><a>CAPITULO V</a></li>
			<li><a>CAPITULO VI</a></li>
			<li><a>CAPITULO VII</a></li>
			<li><a>CAPITULO VIII</a></li>
			<li><a>CAPITULO IX</a></li>
			<li><a>CAPITULO X</a></li>
			<li><a>CAPITULO XI</a></li>
			<li><a>CAPITULO XII</a></li>
			<li><a>CAPITULO XIII</a></li>
		</ul>
		<!-- PESTAÑA DEL CAPITULO I -->
		<div class="pane">
			<p>CAPITULO I</p>
			<BR>
			<TABLE border="0" style="width:100%; height:77%;" bgcolor="#E3E3E3" cellspacing="0" cellpadding="0">
				<TR>
					<TD valign="top" bgcolor="White" >
						<iframe name="iframeb" src="capitulos/capituloI/primerCapitulo.php?id=<?=$id?>" width="100%" height="100%" align="top"  scrolling="auto" style="border:0px solid green"></iframe>
					</TD>
				</TR>
			</TABLE>
		</div>
		<!-- PESTAÑA DEL CAPITULO II -->
		<div class="pane">
			<p>CAPITULO II</p>
			<BR>
			<TABLE border="0" style="width:100%; height:77%;" bgcolor="#E3E3E3" cellspacing="0" cellpadding="0">
				<TR>
					<TD valign="top" bgcolor="White" >
						<iframe name="iframec" src="capitulos/capituloII/segundoCapitulo.php?id=<?=$id?>" width="100%" height="100%" align="top"  scrolling="auto" style="border:0px solid green"></iframe>
					</TD>
				</TR>
			</TABLE>
		</div>
		<!-- PESTAÑA DEL CAPITULO III -->
		<div class="pane">
			<p>CAPITULO III</p>
			<BR>
			<TABLE border="0" style="width:100%; height:77%;" bgcolor="#E3E3E3" cellspacing="0" cellpadding="0">
				<TR>
					<TD valign="top" bgcolor="White" >
						<iframe name="iframed" src="capitulos/capituloIII/tercerCapitulo.php?id=<?=$id?>" width="100%" height="100%" align="top"  scrolling="auto" style="border:0px solid green"></iframe>
					</TD>
				</TR>
			</TABLE>
		</div>
		<!-- PESTAÑA DEL CAPITULO IV -->
		<div class="pane">
			<p>CAPITULO IV</p>
			<BR>
			<TABLE border="0" style="width:100%; height:77%;" bgcolor="#E3E3E3" cellspacing="0" cellpadding="0">
				<TR>
					<TD valign="top" bgcolor="White" >
						<iframe name="iframee" src="capitulos/capituloIV/cuartoCapitulo.php?id=<?=$id?>" width="100%" height="100%" align="top"  scrolling="auto" style="border:0px solid green"></iframe>
					</TD>
				</TR>
			</TABLE>
		</div>
		<!-- PESTAÑA DEL CAPITULO V -->
		<div class="pane">
			<p>CAPITULO V</p>
			<BR>
			<TABLE border="0" style="width:100%; height:77%;" bgcolor="#E3E3E3" cellspacing="0" cellpadding="0">
				<TR>
					<TD valign="top" bgcolor="White" >
						<iframe name="iframef" src="capitulos/quintoCapitulo.php?id=<?=$id?>" width="100%" height="100%" align="top"  scrolling="auto" style="border:0px solid green"></iframe>
					</TD>
				</TR>
			</TABLE>
		</div>
		<!-- PESTAÑA DEL CAPITULO VI -->
		<div class="pane">
			<p>CAPITULO VI</p>
			<BR>
			<TABLE border="0" style="width:100%; height:77%;" bgcolor="#E3E3E3" cellspacing="0" cellpadding="0">
				<TR>
					<TD valign="top" bgcolor="White" >
						<iframe name="iframeg" src="capitulos/sextoCapitulo.php?id=<?=$id?>" width="100%" height="100%" align="top"  scrolling="auto" style="border:0px solid green"></iframe>
					</TD>
				</TR>
			</TABLE>
		</div>
		<!-- PESTAÑA DEL CAPITULO VII -->
		<div class="pane">
			<p>CAPITULO VII</p>
			<BR>
			<TABLE border="0" style="width:100%; height:77%;" bgcolor="#E3E3E3" cellspacing="0" cellpadding="0">
				<TR>
					<TD valign="top" bgcolor="White" >
						<iframe name="iframeh" src="capitulos/septimoCapitulo.php?id=<?=$id?>" width="100%" height="100%" align="top"  scrolling="auto" style="border:0px solid green"></iframe>
					</TD>
				</TR>
			</TABLE>
		</div>
		<!-- PESTAÑA DEL CAPITULO VIII -->
		<div class="pane">
			<p>CAPITULO VIII</p>
			<BR>
			<TABLE border="0" style="width:100%; height:77%;" bgcolor="#E3E3E3" cellspacing="0" cellpadding="0">
				<TR>
					<TD valign="top" bgcolor="White" >
						<iframe name="iframei" src="capitulos/octavoCapitulo.php?id=<?=$id?>" width="100%" height="100%" align="top"  scrolling="auto" style="border:0px solid green"></iframe>
					</TD>
				</TR>
			</TABLE>
		</div>
		<!-- PESTAÑA DEL CAPITULO IX -->
		<div class="pane">
			<p>CAPITULO IX</p>
			<BR>
			<TABLE border="0" style="width:100%; height:77%;" bgcolor="#E3E3E3" cellspacing="0" cellpadding="0">
				<TR>
					<TD valign="top" bgcolor="White" >
						<iframe name="iframej" src="capitulos/novenoCapitulo.php?id=<?=$id?>" width="100%" height="100%" align="top"  scrolling="auto" style="border:0px solid green"></iframe>
					</TD>
				</TR>
			</TABLE>
		</div>
		<!-- PESTAÑA DEL CAPITULO X -->
		<div class="pane">
			<p>CAPITULO X</p>
			<BR>
			<TABLE border="0" style="width:100%; height:77%;" bgcolor="#E3E3E3" cellspacing="0" cellpadding="0">
				<TR>
					<TD valign="top" bgcolor="White" >
						<iframe name="iframek" src="capitulos/decimoCapitulo.php?id=<?=$id?>" width="100%" height="100%" align="top"  scrolling="auto" style="border:0px solid green"></iframe>
					</TD>
				</TR>
			</TABLE>
		</div>
		<!-- PESTAÑA DEL CAPITULO XI -->
		<div class="pane">
			<p>CAPITULO XI</p>
			<BR>
			<TABLE border="0" style="width:100%; height:77%;" bgcolor="#E3E3E3" cellspacing="0" cellpadding="0">
				<TR>
					<TD valign="top" bgcolor="White" >
						<iframe name="iframel" src="capitulos/decimoPrimercapitulo.php?id=<?=$id?>" width="100%" height="100%" align="top"  scrolling="auto" style="border:0px solid green"></iframe>
					</TD>
				</TR>
			</TABLE>
		</div>
		<!-- PESTAÑA DEL CAPITULO XII -->
		<div class="pane">
			<p>CAPITULO XII</p>
			<BR>
			<TABLE border="0" style="width:100%; height:77%;" bgcolor="#E3E3E3" cellspacing="0" cellpadding="0">
				<TR>
					<TD valign="top" bgcolor="White" >
						<iframe name="iframem" src="capitulos/decimoSegundoCapitulo.php?id=<?=$id?>" width="100%" height="100%" align="top"  scrolling="auto" style="border:0px solid green"></iframe>
					</TD>
				</TR>
			</TABLE>
		</div>
		<!-- PESTAÑA DEL CAPITULO XIII -->
		<div class="pane">
			<p>CAPITULO XIII</p>
			<BR>
			<TABLE border="0" style="width:100%; height:77%;" bgcolor="#E3E3E3" cellspacing="0" cellpadding="0">
				<TR>
					<TD valign="top" bgcolor="White" >
						<iframe name="iframen" src="capitulos/decimoTercerCapitulo.php?id=<?=$id?>" width="100%" height="100%" align="top"  scrolling="auto" style="border:0px solid green"></iframe>
					</TD>
				</TR>
			</TABLE>
		</div>
	</div>
</BODY>
</html>
