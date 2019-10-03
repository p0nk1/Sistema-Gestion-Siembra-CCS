<?php
session_start();
extract($_POST);
include_once ("funciones/queryUsuarios.php");
include_once ("funciones/funciones.php");
include_once ("funciones/funciones_session.php");


if($ingresarSistema){
	include("conexion/conexionpg.php");
	$row_usuario=buscar_datos_usuarios($userName);
	
	if((trim($row_usuario['password'])==md5($password)) && (trim($row_usuario['login'])==$userName)){
		if($row_usuario['status_usuario']==1){
			$_SESSION['adminProy']=crearSession($_SESSION['adminProy'],$row_usuario['id_usuario'],$row_usuario['cedula'],$row_usuario['login'],$row_usuario['nombre_usuario'],$row_usuario['id_perfil']);
			
			if (comprobarSession($_SESSION['adminProy'])){
			/**************************** Guarda en Base de Datos el Historial del Logeo  ************************************/
			registrar_logeo_exitoso($_SESSION['adminProy']['id_usuario'],$userName, nombre_de_maquina(), capturar_ip());
			header("Location: inicio.php");
			}
		}else{
			mostrar_mensaje('Usuario Invalido, Consulte al Administrador del Sistema');
		}
	}else{
		mostrar_mensaje('Revise sus datos, autenticacion fallida');
		registrar_logeo_fallido($userName, nombre_de_maquina(), capturar_ip());
	}
}//FIN INGRESAR AL SISTEMA


/************************ VALIDACION DEL FORMULARIO *******************************/
include("clases/validacion/validacion.inc.php");
$validacion_index = new MCI_validacion("ingreso_sistema");
$validacion_index->agregar_validacion("nombre_usuario", "req",null,"El nombre del usuario es un campo requerido");
$validacion_index->agregar_validacion("password_form", "req",null,"La clave es un campo requerido");
echo $validacion_index->obtener_archivos_js("../clases/validacion/js/");
?>
<HTML>
	<HEAD>
		<title>REGISTRO DE PROYECTOS SOCIOPRODUCTIVOS</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<LINK REL="SHORTCUT ICON" HREF="imagenes/imgindex/log32t.png">
		<link href="css/css.css" rel="stylesheet" type="text/css" />
	</HEAD>
	<BODY>
		<!-- TOP-->
		<TABLE border="0" cellpadding="0" cellspacing="0" width="90%" align="center">
			<TR>
				<TD width="30%"><img src="imagenes/imgindex/bann_alcaldia.gif"></TD>
				<TD><h1>REGISTRO DE PROYECTOS SOCIOPRODUCTIVOS</h1></TD>
				<TD width="20%" align="right"><img src="imagenes/imgindex/logo_peq_alcaldia.png" width="60" height="60"></TD>
			</TR>
		</TABLE>
		<TABLE border="0" cellpadding="0" cellspacing="0" width="90%" align="center">
			<TR><TD><HR></TD></TR>
		</TABLE>
		<!-- END TOP-->
		<TABLE width="100%" border="0" cellspacing="0" cellpadding="0" height="82%">
		<TR valign="middle">
			<TD>
			<TABLE width="50%" border="0" align="center" cellpadding="0" cellspacing="0">
				<TR>
					<TD width="3%" align="left" background="top_centro.jpg"><img src="imagenes/imgindex/top_izq.jpg"  /></TD>
					<TD width="93%" background="imagenes/imgindex/top_centro.jpg"><img src="imagenes/imgindex/top_centro.jpg" width="1" height="30" /></TD>
					<TD width="4%" align="right" ><img src="imagenes/imgindex/top_der.jpg" /></TD>
				</TR>
				<TR>
					<TD align="left" background="imagenes/imgindex/lat_izq.jpg"><img src="imagenes/imgindex/lat_izq.jpg" width="100%" height="4" /></TD>
					<TD height="200" background="imagenes/imgindex/fondo.jpg">
						<FORM name="ingresarSistema" method="POST" action="">
						<TABLE width="65%" border="0" align="center" cellpadding="2" cellspacing="4" height="60%">
							<TR><TD class="alerta2" colspan="2"><?php echo $validacion_index->html_error("ingresarSistema");?><?php echo  $validacion_index->campo_oculto();?></TD></TR>	
							<TR>
								<TD width="40%" align="center"><span class="tituloTablas">Usuario:</span></TD>
								<TD width="60%"><input name="userName" type="text" size="20"></TD>
							</TR>
							<TR>
								<TD align="center"><span class="tituloTablas">Contrase&ntilde;a:&nbsp;</span></TD>
								<TD><input name="password" type="password" size="20"></TD>
							</TR>
							<TR><TD height="35" colspan="2" align="center"><input type="submit" class="boton" value="Ingresar" name="ingresarSistema"> <!-- - <input type="button" class="boton" value="Registrar" onclick="document.location.href ='mod_usuario/registrar_usuario_productor.php'" name="ingresarSistema"> --> </TD>

							</TR>
						</TABLE>
						</FORM>
						<?php echo $validacion_index->obtener_js(); ?>
					</TD>
					<TD align="right" background="imagenes/imgindex/lat_der2.jpg"></TD>
				</TR>
				<TR>
					<TD align="left"><img src="imagenes/imgindex/down_izq.jpg" width="41" height="30" /></TD>
					<TD background="imagenes/imgindex/down_centro.jpg"><img src="imagenes/imgindex/down_centro.jpg" width="6" height="30" /></TD>
					<TD><img src="imagenes/imgindex/down_der.jpg" width="40" height="30" /></TD>
				</TR>
			</TABLE>
			</TD>
		</TR>
		</TABLE>
		<!--FOOTER-->
		<TABLE border="0" cellpadding="0" cellspacing="0" width="90%" align="center">
			<TR><TD><HR></TD></TR>
		</TABLE>
		<TABLE border="0" cellpadding="0" cellspacing="0" width="100%" >
		<TR>
			<TD class="texto_campo_no_size" align="center">
				
				Gran Misi&oacute;n Saber y Trabajo<br>
			</TD>
		</TR>
		</TABLE>
		<!--END FOOTER-->
	</BODY>
</HTML>
