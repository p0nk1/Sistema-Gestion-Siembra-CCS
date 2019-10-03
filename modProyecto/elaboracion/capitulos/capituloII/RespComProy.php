<?php
	session_start();
	include_once ("../../../../funciones/funciones_session.php");
	comprobarSession($_SESSION['adminProy']);
	include_once ("../../../../conexion/conexionpg.php");
	include_once ("../../../../funciones/queryProyectos.php");
	include_once ("../../../../funciones/funciones.php");
	extract($_POST);
	extract($_GET);
	//ID DEL PROYECTO
	$idProyecto=$id;
	//BUSCA SI EL PROYECTO TIENE SOCIOS REGISTRADOS
	$arrayResp = array();
	$arrayResp = buscarResponsablesComProyecto($idProyecto);
?>
<HTML>
	<HEAD>
		<link rel="stylesheet" type="text/css" href="../../../../css/css.css">
		<SCRIPT language="JavaScript">
			function lanzarSubmenu(ventana){
				ventana_secundaria = window.open(ventana,"_blank","width=1250,height=800,scrollbars=0,location=0")
				ventana_secundaria.moveTo(400,300);
			}
			function lanzarSubmenuPequeno(ventana){
				ventana_secundaria = window.open(ventana,"_blank","width=400,height=300,scrollbars=0,location=0")
				ventana_secundaria.moveTo(400,300);
			}
		</SCRIPT>
	</HEAD>
	<BODY>
		<FORM action="" id="RegSocios" name="RegSocios" method="POST">
		<BR>
		<!-- AQUI VA EL ENLACE PARA AGREGAR SOCIOS DEL PROYECTO -->
		<?php if(empty($arrayResp)){ ?>
			<TABLE id="tablaEnlace" border="0" cellpadding="3" cellspacing="1" align="center" width="95%" height="80%">
				<TR>
					<TD align="center"><a href="#" class="link" onClick="lanzarSubmenu('registrarRespComProyecto.php?id=<?=$idProyecto?>')"><img src="../../../../imagenes/agregarResp.jpg" border="0"></a></TD>
				</TR>
			</TABLE>
		<?php } else if (!empty($arrayResp)){ ?>
			<TABLE  id="tablaSocios" border="0" cellpadding="3" cellspacing="1" align="center" width="95%" bgcolor="#D6D6D6">
				<TR><TD bgcolor="#F2F2F2" class="tituloTablas" align="center" colspan="6">RESPONSABLES COMUNITARIOS</TD></TR>
				<TR>
					<TD bgcolor="#F2F2F2" class="tituloTablas" align="center" width="35%">Nombres y Apellidos</TD>
					<TD bgcolor="#F2F2F2" class="tituloTablas" align="center" width="35%">C&eacute;dula de Identidad</TD>
					<TD bgcolor="#F2F2F2" class="tituloTablas" align="center" width="20%">Tel&eacute;fono</TD>
					<TD bgcolor="#F2F2F2" class="tituloTablas" align="center" width="35%">Responsabilidad</TD>
					<TD bgcolor="#F2F2F2" class="tituloTablas" align="center" width="10%" colspan="2">Acci&oacute;n</TD>
				</TR>
				<?php
				$a=0;
				foreach ($arrayResp['idResponsable'] as $value) {
					if($value!=''){
				?>
				<TR>
					<TD bgcolor="White" class="textoCampo"><?=$arrayResp['nombApeRespon'][$a]?></TD>
					<TD bgcolor="White" class="textoCampo"><?=$arrayResp['cedulaRespon'][$a]?></TD>
					<TD bgcolor="White" class="textoCampo"><?=$arrayResp['teleRespon'][$a]?></TD>
					<TD bgcolor="White" class="textoCampo"><?=$arrayResp['responsabilidad'][$a]?></TD>
					<TD bgcolor="White" align="center"><a href="#" class="link" onClick="lanzarSubmenuPequeno('eliminarResp.php?idResp=<?=$arrayResp['idResponsable'][$a]?>&idProyecto=<?=$idProyecto?>')"><img src="../../../../imagenes/elimSocio.png" border="0" title="Eliminar"></a></TD>
					<TD bgcolor="White" align="center"><a href="#" class="link" onClick="lanzarSubmenu('modificarResp.php?idResp=<?=$arrayResp['idResponsable'][$a]?>&idProyecto=<?=$idProyecto?>')"><img src="../../../../imagenes/editSocio.png" border="0" title="Modificar"></a></TD>
				</TR>
				<?
					}
					$a++;
				}
				?>
				<TR><TD bgcolor="White" align="center" colspan="6"><a href="#" class="link" onClick="lanzarSubmenu('registrarRespComProyecto.php?id=<?=$idProyecto?>')"><img src="../../../../imagenes/add_socio.png" border="0" height="24" width="24" title="Agregar Otro"></a></TD></TR>
			</TABLE>
		<?php } ?>
		</FORM>
	</BODY>






</HTML>