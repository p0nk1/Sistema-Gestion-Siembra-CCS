<?php
session_start();
extract($_POST);
extract($_GET);
comprobarSession($_SESSION['adminProy']);
$id_usuario_registra = $_SESSION['adminProy']['id_usuario'];

//echo $_SESSION['adminProy']['id_perfil'];
$perfil =$_SESSION['adminProy']['id_perfil'];
?>
<ul id="nav" class="dropdown dropdown-horizontal">
	<li><a href="principal.php" target="iframe">INICIO</a></li>
		<?php if ($perfil == 1) { ?>
	<li><a class="dir" target="iframe">USUARIOS</a>
		<ul>
			<li><a href="mod_usuario/registrar_usuario_productor.php" target="iframe">Registrar</a></li>
			<li><a href="mod_usuario/consultar_usuario.php" target="iframe">Consultar</a></li>
			<!--<li><a href="modUsuarios/asignarPermisos.php" target="iframe">Permisos</a></li> -->
		</ul>
	</li>
		<?php }?>
	<li><a class="dir" target="iframe">PROYECTOS</a>
		<ul>
		<?php if (($perfil == 1) or ($perfil == 2) or ($perfil == 4)) { ?>
			<li><a href="modProyecto/nuevoProyecto.php" target="iframe">NUEVO PROYECTO</a></li>
		<?php }?>
			<li><a href="modProyecto/consultar_proyecto.php" target="iframe">CONSULTAR PROYECTO</a></li>
		</ul>
	</li>
	<li><a class="dir" target="iframe">PRODUCTORES</a>
		<ul>
		<?php if (($perfil == 1) or ($perfil == 2) or ($perfil == 4)) { ?>
			<li><a href="mod_productores/registrar_productor.php" target="iframe">NUEVO PRODUCTOR</a></li>
			<li><a href="mod_productores/consultar.proyecto.productor.php" target="iframe">PRODUCTORES CON PROYECTOS</a></li>
		<?php }?>
		<!--
			<li><a href="modProyecto/consultar_proyecto.php" target="iframe">CONSULTAR PROYECTO</a></li>
		-->
		</ul>
	</li>
	<!--<li><a href="modProyecto/nuevoProyecto.php" target="iframe">NUEVO PROYECTO</a></li>
	<li><a href="modProyecto/consultar_proyecto.php" target="iframe">CONSULTAR PROYECTO</a></li>-->
	
		<?php if (($perfil == 1) or ($perfil == 2) ) { ?>
			<li><a href="modProyecto/consulta_mapa.php" target="iframe">MAPA ECONOMICO</a></li>
		<?php }?>

	
		<?php if ($perfil == 1) { ?>
	<li><a class="dir" target="iframe">RESPONSABLES</a>
		<ul>
			<li><a href="modProyecto/asignarProyecto.php" target="iframe">ASIGNAR PROYECTO</a></li>
			<li><a href="modProyecto/proyectosAsignados.php" target="iframe">PROYECTOS ASIGNADOS</a></li>
		</ul>
	</li>
		<?php }?>
	
  <!-- antes era asi if (($perfil == 1) or ($perfil == 3)) -->
		<?php if ($perfil == 1) { ?>
	<li><a href="modProyecto/seguimientoProyecto.php" target="iframe">SEGUIMIENTO</a></li>
		<?php }?>

		<?php if (($perfil == 1) or ($perfil == 2)or ($perfil == 3)) { ?>
	<li><a href="modProyecto/misProyectos.php" target="iframe">MIS PROYECTOS</a></li>
		<?php }?>	

</ul>

