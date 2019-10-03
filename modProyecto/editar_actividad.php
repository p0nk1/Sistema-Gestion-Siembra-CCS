<?php
session_start();
include_once ("../funciones/funciones_session.php");
comprobarSession($_SESSION['adminProy']);
include_once ("../conexion/conexionpg.php");
include_once ("../funciones/queryProyectos.php");
include_once ("../funciones/funciones.php");
extract($_POST);
extract($_GET);


$id_usuario_registra = $_SESSION['adminProy']['id_usuario'];
 $fecha_registro = date('Y-m-d H:i:s');

if (isset($actualizar)) {


			$result=actualizarActividad(dar_formato($id_actividad),dar_formato($tarea), dar_formato($fecha_inicio), dar_formato($fecha_fin), 
				dar_formato($id_usuario), dar_formato($fecha_registro), dar_formato($id_usuario_registra));
			
			if (!empty($result))
			{
					echo "<script>alert('Actualizacion Exitosa');</script>";
					print "<script>window.opener.location.reload();</script>";
					print ("<script>window.close();</script>");
			}//FIN ACTUALIZAR


}






$row = traerDetalles_actividad($id_actividad);
	//$resp=traerNombreUsuario($row['id_usuario']);



/* Inicio de las Validaciones */
include("../clases/validacion/validacion.inc.php");
$v3 = new MCI_validacion("editar_actividad");


$v3->agregar_validacion("tarea", "req", null, "Por favor introduzca la Descripción de la Actividad");
$v3->agregar_validacion("fecha_inicio", "req",null,"Por favor introduzca la Fecha inicial de la Actividad");
$v3->agregar_validacion("fecha_fin", "req",null,"Por favor introduzca la Fecha Final de la Actividad");
$v3->agregar_validacion("fecha_fin", "f>","fecha_inicio","La Fecha final no puede ser menor a la Fecha de Inicio");
$v3->agregar_validacion("id_usuario", "req",null,"Por favor seleccione el responsable de la Actividad");
//$v3->agregar_validacion("nombre_taller", "maxlon", 80, "El Nombre del Taller no debe ser mayor de 80 caracteres");

echo $v3->obtener_archivos_js("../clases/validacion/js/");
?>

<HTML>
	<HEAD>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<TITLE></TITLE>
		<link rel="stylesheet" type="text/css" href="../css/css.css">
<!--***************************************-->

 <script src="progressbar.js" type="text/javascript"></script>
<!--***************************************-->


	<script type="text/javascript" src="../js/src/js/jscal2.js"></script>
        <script type="text/javascript" src="../js/src/js/lang/es.js"></script>
        <link rel="stylesheet" type="text/css" href="../js/src/css/jscal22.css" />
        <link rel="stylesheet" type="text/css" href="../js/src/css/border-radius.css" />
        <link rel="stylesheet" type="text/css" href="../js/src/css/steel/steel.css" />


</HEAD>
	<BODY>
<FORM action="" id="editar_actividad" name="editar_actividad" method="POST">
	<BR>
	<TABLE border="0" width="90%" cellpadding="0" cellspacing="0" align="center">
		<TR><TD class="tituloBackground"> EDITAR ACTIVIDAD </TD></TR>
	</TABLE>
	<BR>
<div class="alerta2" style="text-align:center;"><?php echo $v3->html_error("editar_actividad"); ?><?php echo $v3->campo_oculto(); ?></div>

            <BR>

<INPUT type="hidden" name="id_actividad" id="id_actividad" value="<?php echo $row['id_actividad'];?>">
<TABLE border="0" width="60%" cellpadding="2" cellspacing="1" align="center" bgcolor="#D6D6D6">
<tbody>
<tr>
<td class="subtituloBackground" bgcolor="White" width="5%">Actividad:</td>
<td class="tituloTablas" bgcolor="White">
<textarea name="tarea" id="tarea" style="width: 260px; height: 50px" ><?php echo $row['tarea'];?></textarea>
</td>
</tr>
<!--<tr>
<td class="subtituloBackground" bgcolor="White">Progreso:</td>
<td bgcolor="White">
<div style='border: 1px solid #87ABD8; width: 100px; margin-left: 10px; margin-top: 5px; padding: 1px; background: #fff; float: left;'> 
<div id='sample2' style='height: 10px; font-size: 11px; text-indent: -9000px; background-color: rgb(135, 171, 216); width: 5%;'>50%</div>
</div>

&nbsp;&nbsp;<span id='percentagesample2' class='textoParrafo'></span>
<script language='javascript'>initialize('sample2');</script>
</td>
</tr>-->
<tr>
<td class="subtituloBackground" valign="bottom" bgcolor="White">Fecha inicial:</td>
<td class="tituloTablas" bgcolor="White">
<input size="10" id="f_date1" name="fecha_inicio" readonly="true" value="<?php echo $row['fecha_inicio'];?>" onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''"/>
                        <button id="f_btn1">...</button>
</td>
</tr>
<tr>
<td class="subtituloBackground" valign="bottom" bgcolor="White">Fecha final:</td>
<td class="tituloTablas" bgcolor="White">
<input size="10" id="f_date2" name="fecha_fin" readonly="true" value="<?php echo $row['fecha_fin'];?>" onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''"/>
                        <button id="f_btn2">...</button>
</td>
</tr>
<tr>
<td class="subtituloBackground" bgcolor="White">Asignar a:</td>
<td class="tituloTablas" bgcolor="White">
<?php cargar_combo_responsable('id_usuario','id_usuario', $conexion, queryComboresponsable(), $row['id_usuario'], ""); ?>
</td>
</tr>
<tr>
<td colspan="2" align="center" bgcolor="White"><br>

<INPUT id="actualizar" name="actualizar" type="submit" value="ACTUALIZAR" class="botonPeq">
<input name="cerrar" value="Cerrar" style="width: 100px;" onclick="self.close();" class="botonPeq" type="button">

</td>
</tr>
</tbody></table>
</FORM>
  <?php echo $v3->obtener_js(); ?>   
        <BR>

 <script type="text/javascript">//<![CDATA[
            var cal = Calendar.setup({
                onSelect: function(cal) { cal.hide() },
                showTime: true
            });
            cal.manageFields("f_btn1", "f_date1", "%Y-%m-%d");
            cal.manageFields("f_btn2", "f_date2", "%Y-%m-%d");
            cal.manageFields("f_btn3", "f_date3", "%e %B %Y");
            cal.manageFields("f_btn4", "f_date4", "%A, %e %B");
        </script> 
</BODY>
</HTML>

