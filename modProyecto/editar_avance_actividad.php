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


if (isset($actualizar)) {

//print_r($_POST);


			$result = actualizarAvance(dar_formato($id_seguimiento),dar_formato($avance_actividad), dar_formato($dificultad_actividad), dar_formato($fecha_avance), dar_formato($porcentaje_avance_actividad), dar_formato($id_usuario_registra) , dar_formato(1));
			
			if (!empty($result))
			{
					echo "<script>alert('Actualizacion Exitosa');</script>";
					print "<script>window.opener.location.reload();</script>";
					print "<script>location.href = 'detalles_actividad.php?id_actividad=$id_actividad';</script>";
					//print ("<script>window.close();</script>");
			}//FIN ACTUALIZAR


}






$row = traerDetalles_actividad($id_actividad);
$porcentaje=porcentaje_avance($id_actividad);
$resp=traerNombreUsuario($row['id_usuario']);

$avance=traerAvance($id_seguimiento);


/* Inicio de las Validaciones */
include("../clases/validacion/validacion.inc.php");
$v3 = new MCI_validacion("editar_avance");


$v3->agregar_validacion("avance_actividad", "req", null, "Por favor introduzca el Avance de la Actividad");
$v3->agregar_validacion("dificultad_actividad", "req",null,"Por favor introduzca la Dificultad de la Actividad");
$v3->agregar_validacion("fecha_avance", "req",null,"Por favor introduzca la Fecha del Avance");
$v3->agregar_validacion("porcentaje_avance_actividad", "req",null,"Por favor introduzca la ponderacion del Avance para esta Actividad");
//$v3->agregar_validacion("nombre_taller", "maxlon", 80, "El Nombre del Taller no debe ser mayor de 80 caracteres");

echo $v3->obtener_archivos_js("../clases/validacion/js/");
?>
<HTML>
	<HEAD>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<TITLE></TITLE>
		<link rel="stylesheet" type="text/css" href="../css/css.css">
		<script type="application/x-javascript" src="../js/jquery-1.6.4.min.js"></script>
<!--***************************************-->

 <script type="text/javascript">
			

			$(document).ready(function() {
				$("#pb1").progressBar();
				
			});

	
function validar(donde,caracter) {


 var checkOK = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz!\"#$%&/()=?¡¿'|¬°´+*~{}[]`:;-_<>.\\@ẃéŕýúíóṕáśǵḱĺźćǘńḿẂÉŔÝÚÍÓṔÁŚǴḰĹŹĆǗŃḾ";
 var valor = donde.value;


for (i = 0;  i < valor.length;  i++) {

    ch = valor.charAt(i);

for (j = 0;  j < checkOK.length;  j++) {
     
	if (ch == checkOK.charAt(j)) {
        
	valor = valor.replace(ch,"")
	donde.value = valor;
	donde.focus();
	return false;
			}

		}

	}

var restante = document.getElementById('restante').value;
//alert( valor + restante);
if (parseInt(valor) > parseInt(restante)){

info.innerHTML ="<b>La Ponderación no puede ser mayor </b>";
//alert("La Ponderación no debe ser mayor al Porcentaje Restante");

//valor = valor.replace(ch,"")
	valor = "";
	donde.value = valor;
	donde.focus();
	return false;
	}else{info.innerHTML ="";}
} 		
</script>
<script type="text/javascript" src="jquery.progressbar.min.js"></script>
<!--***************************************-->



	<script type="text/javascript" src="../js/src/js/jscal2.js"></script>
        <script type="text/javascript" src="../js/src/js/lang/es.js"></script>
        <link rel="stylesheet" type="text/css" href="../js/src/css/jscal22.css" />
        <link rel="stylesheet" type="text/css" href="../js/src/css/border-radius.css" />
        <link rel="stylesheet" type="text/css" href="../js/src/css/steel/steel.css" />

</HEAD>
	<BODY>
<BR>
<FORM action="" id="editar_avance" name="editar_avance" method="POST" >
	<TABLE border="0" width="90%" cellpadding="0" cellspacing="0" align="center">
		<TR><TD class="tituloBackground"> EDITAR AVANCE </TD></TR>
	</TABLE>
<BR>
<div class="alerta2" style="text-align:center;"><?php echo $v3->html_error("editar_avance"); ?><?php echo $v3->campo_oculto(); ?></div>
<div id="info" class="alerta2" style="text-align:center;"></div>
<BR>
<INPUT type="hidden" name="id_seguimiento" id="id_seguimiento" value="<?php echo $avance['id_seguimiento'];?>">
<INPUT type="hidden" name="id_actividad" id="id_actividad" value="<?php echo $avance['id_actividad'];?>">
<TABLE border="0" width="60%" cellpadding="2" cellspacing="1" align="center" bgcolor="#D6D6D6">
<tr>
<td bgcolor="White" class="subtituloBackground" width="35%">Actividad:</td>
<td bgcolor="White" colspan="3" class="tituloTablas"><span style="font-weight: lighter;"><?php echo $row['tarea']; ?></span></td>
</tr>
<!--<tr>
<td class="tdright">Valoracion:</td>
<td class="tdleft"><span style="font-weight: lighter;"><?php echo $r_tr['valoracion']; ?></span></td>
</tr>-->
<tr>
<td bgcolor="White" class="subtituloBackground" >Fecha inicial:</td>
<td bgcolor="White" class="tituloTablas" ><span style="font-weight: lighter;"><?php echo $row['fecha_inicio'];?></span></td>
<td bgcolor="White" class="subtituloBackground" align="center">Fecha final:</td>
<td bgcolor="White" class="tituloTablas" width="35%"><span style="font-weight: lighter;"><?php echo $row['fecha_fin'];?></span></td>
</tr>
<tr>
<td bgcolor="White" class="subtituloBackground">Asignada a:</td>
<td bgcolor="White" colspan="3" class="tituloTablas">
<span style="font-weight: lighter;"><?php echo $resp; ?></span>
</td>
</tr>
<tr>
<td bgcolor="White" class="subtituloBackground">Porcentaje de avance en la Actividad:</td>
<td bgcolor="White" colspan="3" class="tituloTablas">
<span class="progressBar" id="pb1"><?php if($porcentaje==""){ echo "0";}elseif ($porcentaje>100){ echo "100";}else{ echo $porcentaje;} ?>%</span>

&nbsp;&nbsp;<span id='percentagesample2' class='textoParrafo'></span>
<script language='javascript'>initialize('sample2');</script>



<span style="font-weight: lighter;"> de 100%</span></td>
</tr>
<tr>
<td bgcolor="White" class="subtituloBackground">Avance:</td>
<td bgcolor="White" colspan="3" class="tituloTablas">
<textarea name="avance_actividad" id="avance_actividad" style="width: 260px; height: 50px"><?php echo $avance['avance_actividad'];?></textarea>
</td>
</tr>
<tr>
<td bgcolor="White" class="subtituloBackground">Dificultad:</td>
<td bgcolor="White" colspan="3" class="tituloTablas">
<textarea name="dificultad_actividad" id="dificultad_actividad" style="width: 260px; height: 50px"><?php echo $avance['dificultad_actividad'];?></textarea>
</td>
</tr>
<tr>
<td bgcolor="White" class="subtituloBackground">Fecha:</td>
<td bgcolor="White" colspan="3" class="tituloTablas">
<input size="10" id="f_date1" name="fecha_avance" readonly="true" value="<?php echo $avance['fecha_avance'];?>" onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''"/>
                        <button id="f_btn1">...</button>
</td>
</tr>
<tr>
<td bgcolor="White" class="subtituloBackground">Ponderacion:</td>
<td bgcolor="White" colspan="3" class="tituloTablas"><input style='text-transform:uppercase;' value="<?php echo $avance['porcentaje_avance_actividad'];?>" maxlength="3" name="porcentaje_avance_actividad" id="porcentaje_avance_actividad"  type="text" size="16" onfocus="if (this.value == '0') {this.value = '';}"  onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage='';if (this.value == '') {this.value = '0';};"onkeyup="validar(this,this.value.charAt(this.value.length-1))"><span style="font-weight: lighter;">
<?php 

 $resto=100-$porcentaje;

?>% </span>
<input type="hidden" name="restante" id="restante" value="<?php echo $avance['porcentaje_avance_actividad']+$resto;?>">
</td>
</tr>
</table>
<BR>
           <TABLE id="tablaBoton" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
                    <TR>
                        <td bgcolor="White" align="right">
                          <INPUT id="actualizar" name="actualizar" type="submit" value="ACTUALIZAR" class="botonPeq">
                        </td>
                        <TD align="left" width="2%">
				 <INPUT  name="volver" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VOLVER" class="botonPeq" onclick='history.go(-1);'>
			</TD>
			<td bgcolor="White">
				<input name="cerrar" value="Cerrar" style="width: 100px;" onclick="self.close();" class="botonPeq" type="button">
                        </td>
                    </TR>
                </TABLE>
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

