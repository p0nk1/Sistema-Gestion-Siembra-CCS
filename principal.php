<?
	session_start();
	include ("funciones/funciones_session.php");
	comprobarSession($_SESSION['adminProy']);
?>
<HTML>
	<HEAD>
		<link rel="stylesheet" href="css/css.css" type="text/css" />
		<!--codigo de transparencia style="opacity:0.1;filter:alpha(opacity=10)"-->
			<!-- inicio efecto de cuadros -->
			<script src="js/jquery/js/jquery-1.3.2.js"></script>
			<script src="js/jquery/js/effects.core.js"></script>
			<script src="js/jquery/js/effects.explode.js"></script>
			<script>
			$(document).ready(function(){
				$("#alba1").show("explode", { pieces: 16 }, 1500);
			});
			</script>
			<!-- fin efecto de cuadro -->
	</HEAD>
	<BODY>
<br>
		<TABLE border="0" align="center">
			<TR><TD><img src="imagenes/imgPrincipal/nuevo_logo_alcaldia_3.gif"  id="alba1" height="300" width="350"></TD></TR>
		</TABLE>
	
	</BODY>
</HTML>
