<?php
session_start();

include_once ("../conexion/conexionpg.php");
include_once ("../funciones/queryProyectos.php");
include_once ("../funciones/funciones.php");
extract($_POST);
extract($_GET);


$id_usuario_registra = $_SESSION['adminProy']['id_usuario'];

//$id_proyecto=52;
$rs = buscarRegistro($id_proyecto);
  


				$cadena = traerNombreCadena($rs['id_proyecto']);
				$id_cadena = traeridCadena($rs['id_proyecto']);
				$estado = traerNombreEstado($rs['estado']);
				$municipio = traerNombreMunicipio($rs['municipio']);
				$parroquia = traerNombreParroquia($rs['parroquia']);
				$fig_juridica = traerNombreFigura_juridica($rs['id_fig_juridica']);
				$area = traerNombreArea($rs['id_proyecto']);
				$tipo_org = traerNombreTipo_org($rs['id_proyecto']);
				$comuna = traerNombreOrganizacionComuna($rs['id_proyecto']);
				$consejo = traerNombreOrganizacionConsejo($rs['id_proyecto']);
				$movimiento = traerNombreOrganizacionMovimiento($rs['id_proyecto']);
				$eje_comunal = traerNombreEje_comunal($rs['id_eje_parroquial']);
				$circuito = traerNombreCircuito($rs['id_circuito']);
				$financiamiento = traerFinanciamiento($rs['id_proyecto']);
				$foto = traerFoto($rs['id_proyecto']);
				$n_adicional= contar_financiamiento_adicional($rs['id_proyecto']);
				$foto = traerFoto($rs['id_proyecto']);

$num_foto = pg_num_rows($foto);
if (!empty($num_foto)){
while ($r=pg_fetch_array($foto)){
$f[]=$r['nombre_archivo'];

}}
?>
<style type='text/css'>

td {

font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;
font-size:12px;


}

</style>
<PAGE  orientation="paysage" backtop="15mm" backbottom="10mm">
<page_header>
<TABLE align="center"  style="width:950px;" cellpadding="0" cellspacing="1" border="0">
			<TR valign="center">
				<TD bgcolor="White" align="center" style="width:15px;"><img src="../imagenes/imgindex/bann_alcaldia.gif" style="width:250px;"></TD>
				<TD bgcolor="White" style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:11px;font-weight:bold;color:black;width:650px;" align="center" valign="middle">
					SISTEMA PARA EL REGISTRO Y CONTROL DE PROYECTOS SOCIOPRODUCTIVOS
				</TD>
				<TD bgcolor="White" align="center" style="width:40px;"><img src="../imagenes/imgindex/logo_peq_alcaldia.png" style="width:50px;"></TD>
			</TR>
		</TABLE>


</page_header>
	<page_footer>
		<table style="width: 100%; border: solid 0px black;">
			<tr>
				<td style="text-align: right;	width: 100%"><?=date('d/m/y'); ?></td>
			</tr>
		</table>
	</page_footer>

<br><br>
<table style=" width:950px;" border="1" cellpadding="0" cellspacing="0" align="center">


    <tr>

      <td rowspan="2">
<img style="width: 150px; height: 90px;" alt=""
 src="../imagenes/imgindex/logo_nombre.png"><br>
      <!--<small><small><span
 style="font-weight: bold; font-family: Arial;text-align: center; ">imagen</span></small></small>-->
      </td>

      <td style="background-color: rgb(214, 214, 214); text-align: center; font-weight: bold;"  class="subtituloBackground">Nombre
del Proyecto</td>

      <td style="background-color: rgb(214, 214, 214); text-align: center; width: 600px;" colspan="4" class="tituloTablas"><?=$rs['nombre_proyecto'];?></td>

    </tr>

    <tr>

      <td style="text-align: center; font-weight: bold;" class="subtituloBackground">Proponente</td>

      <td style="text-align: center;" colspan="2" class="subtituloBackground"><span style="font-weight: bold;">Gran Misi&oacute;n Saber y Trabajo</span>
      </td>

      <td style="text-align: center;background-color: rgb(214, 214, 214);" height="10" colspan="2" >
<? if($f[0]==""){
echo "<img style='width: 313px; height: 135px;' alt='' src='../imagenes/images.jpeg'>";
}else{
echo "<img style='width: 313px; height: 135px;' alt='' src='/imagenes/images.jpeg'>"; //../files/$f[0]'
}
?>
</td>

    </tr>

    <tr>

      <td style="text-align: center; font-weight: bold;" class="subtituloBackground">Productos</td>

      <td colspan="5" class="tituloTablas">
<div style=" width: 800px;padding: 2px 2px;" class="textoParrafo"><?=$rs['prod_principal'];?></div></td>

    </tr>

    <tr>

      <td style="text-align: center; font-weight: bold;" class="subtituloBackground">Ubicaci&oacute;n</td>

      <td style="text-align: center; font-weight: bold;" class="subtituloBackground">Area
de <br>

Construcci&oacute;n (m2)</td>

      <td style="text-align: center; font-weight: bold;" class="subtituloBackground">Area
de Terreno (m2)</td>

      <td style="text-align: center; font-weight: bold;" class="subtituloBackground">Unidades
de Producci&oacute;n</td>

      <td style="text-align: center; font-weight: bold;" class="subtituloBackground">Tiempo
de Instalaci&oacute;n</td>

      <td style="text-align: center; font-weight: bold;" class="subtituloBackground">Fecha
de Arranque</td>

    </tr>

    <tr>

      <td style="text-align: center;" class="tituloTablas">Parroquia: <?=$parroquia;?><br>

<?=$circuito;?></td>

      <td style="text-align: center;" class="tituloTablas"><?=$rs['area_construccion'];?></td>

      <td style="text-align: center;" class="tituloTablas"><?=$rs['area_terreno'];?></td>

      <td style="text-align: center;" class="tituloTablas"><?=$rs['unidades_produccion'];?></td>

      <td style="text-align: center;" class="tituloTablas"><?=$rs['tiempo_instalacion'];?></td>

      <td style="text-align: center;" class="tituloTablas"><?=$rs['fecha_produccion'];?></td>

    </tr>

    <tr>

      <td style="text-align: center; font-weight: bold;" rowspan="2" class="subtituloBackground">Producci&oacute;n</td>

      <td style="text-align: center; font-weight: bold;" class="subtituloBackground">Cadena
Productiva y <br>

Tipo de Proyecto</td>

      <td style="text-align: center; font-weight: bold;" class="subtituloBackground">Capacidad
a Instalar </td>

      <td style="text-align: center; font-weight: bold;" class="subtituloBackground">Beneficiarios</td>

      <td style="text-align: center; font-weight: bold;" class="subtituloBackground">Empleos Directos</td>

      <td style="text-align: center; font-weight: bold;" class="subtituloBackground">Empleos Indirectos</td>

    </tr>

    <tr>

      <td style="text-align:left;width: 100px; padding: 2px 2px;" class="tituloTablas">
<b>Cadena:</b> <?=$cadena;?>; <br> <b>Area:</b> 
		<?php 
		
		for($i=0;$i<count($area);$i++){

		echo "&nbsp;".$area[$i]. ";";
		}
		?></td>

      <td style="text-align: center;" class="tituloTablas"><?=$rs['meta_produccion'];?></td>

      <td style="text-align: center;" class="tituloTablas">
<? if ($rs['beneficiarios']=="" or $rs['beneficiarios']=="0"){ echo "Por Definir";}else{ echo $rs['beneficiarios'];}?></td>

      <td style="text-align: center;" class="tituloTablas"><?=$rs['num_pro_directos'];?></td>

      <td style="text-align: center;" class="tituloTablas"><?=$rs['num_prod_indirectos'];?></td>

    </tr>

    <tr>

      <td style="background-color: rgb(214, 214, 214); text-align: center; font-weight: bold;" class="subtituloBackground">Inversi&oacute;n</td>

      <td style="text-align: center; font-weight: bold;" class="subtituloBackground">Infraestructura
(Bs)</td>

      <td style="text-align: center; font-weight: bold;" class="subtituloBackground">Maquinaria,
equipos y <br>

herramientas (Bs)</td>

      <td style="text-align: center; font-weight: bold;" class="subtituloBackground">Insumos
y Materias <br>

Primas (Bs)</td>

      <td style="text-align: center; font-weight: bold;" class="subtituloBackground">Fuerza
de Trabajo (Bs)</td>

      <td style="text-align: center; font-weight: bold;" class="subtituloBackground">Servicios
(Bs)</td>

    </tr>

    <tr>

      <td style="background-color: rgb(214, 214, 214); text-align: center;" class="tituloTablas"><?=$rs['inversion'];?></td>

      <td style="text-align: center;" class="tituloTablas"><?=$rs['infraestructura'];?></td>

      <td style="text-align: center;" class="tituloTablas"><?=$rs['maquinaria'];?></td>

      <td style="text-align: center;" class="tituloTablas"><?=$rs['insumos'];?></td>

      <td style="text-align: center;" class="tituloTablas"><?=$rs['fuerza_trabajo'];?></td>

      <td style="text-align: center;" class="tituloTablas"><?=$rs['servicios'];?></td>

    </tr>

    <tr>

      <td style="text-align: center; font-weight: bold;" rowspan="2" class="subtituloBackground">Estado de Avance</td>

      <td style="text-align: center; font-weight: bold;" class="subtituloBackground">Elaboraci&oacute;n
del Proyecto</td>

      <td style="text-align: center; font-weight: bold;" class="subtituloBackground">Financiamiento</td>

      <td style="text-align: center; font-weight: bold;" class="subtituloBackground">Titularidad</td>

      <td style="text-align: center; font-weight: bold;" class="subtituloBackground">Creaci&oacute;n
de Empresa</td>

      <td style="text-align: center; font-weight: bold;" class="subtituloBackground">Proceso
Formativo</td>

    </tr>

    <tr>

      <td style="text-align: center;" class="tituloTablas"><?=$rs['elaboracion'];?></td>

      <td style="text-align: center;" class="tituloTablas"><?php echo traerNombreEstatusFin($financiamiento[1]['fin']['estatus']); ?></td>

      <td style="text-align: center;" class="tituloTablas"><?=$rs['titularidad'];?></td>

      <td style="text-align: center;" class="tituloTablas"><?=$fig_juridica?> <br> <? if ($rs['figura_jur_reg']=="si"){ echo"Registrada"; }else{ echo"No Registrada"; }?></td>

      <td style="text-align: center;" class="tituloTablas"><?=$rs['proceso_formativo'];?></td>

    </tr>

    <tr>

      <td style="text-align: center; font-weight: bold;" class="subtituloBackground">Balance
Pol&iacute;tico</td>

      <td colspan="5" class="tituloTablas"><div style="text-align:justify; width: 850px;" class="textoParrafo"><?=$rs['balance_politico'];?></div></td>

    </tr>

</table>
</PAGE>

