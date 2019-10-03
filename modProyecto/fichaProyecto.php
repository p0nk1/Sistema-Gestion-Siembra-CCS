<?php
session_start();
extract($_POST);
extract($_GET);

include_once ("../funciones/funciones_session.php");
comprobarSession($_SESSION['adminProy']);
include("../conexion/conexionpg.php");
require_once("../funciones/queryUsuarios.php");
require_once("../funciones/queryProyectos.php");
require_once("../funciones/funciones.php");

$id_usuario_registra = $_SESSION['adminProy']['id_usuario'];
?>

<style type=text/css>
 /*Make sure your page contains a valid doctype at the top*/ 
#simplegallery1{ //CSS for Simple Gallery Example 1 

position: relative; /*keep this intact*/ 

visibility: hidden; /*keep this intact*/ 

border: 1px solid black; } 

#simplegallery1 .gallerydesctext{ //CSS for description DIV of Example 1 (if defined) 
text-align: left; font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;
font-size:12px; padding: 10px 0px 80px 1px; } 
</style>
<script type="text/javascript" src="../clases/jquery/jquery-1.6.4.min.js"></script>
<!--<script type=text/javascript src="../js/jquery-1.6.4.min.js"> </script> -->

<style type=text/css> 
/ * Hacer Asegúrese de que su página contiene un doctype válido en la parte superior * /

 # simplegallery1 {/ / CSS para el ejemplo sencillo Galería 1 position: relative; / * mantener intacto este * / 
visibility: hidden; / * este * mantener intacto / frontera: 10px sólido darkred ;}

 # simplegallery1 gallerydesctext {/ / CSS para el DIV descripción del ejemplo 1 (si está definida) 
text-align: left; padding:. 2px 5px;} 
</style>

<script type=text/javascript src="../js/simplegallery.js">

/***********************************************
* Simple Controls Gallery- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>

<script type='text/javascript'>
	$(document).ready(function(){
	
	$('.accordion h3:first').addClass('active');
	$('.accordion p:not(:first)').hide();

	$('.accordion h3').click(function(){
		$(this).next('p').slideToggle('fast')// efecto rapido... para que sea lento:slow
		.siblings('p:visible').slideUp('fast');
		$(this).toggleClass('active');
		$(this).siblings('h3').removeClass('active');
	});

});
</script>
<style type='text/css'>

.accordion {
	width: 345px;
	border-bottom: solid 1px #c4c4c4;
	font: 95%/120% Arial, Helvetica, sans-serif;
 
}
.accordion h3 {
	background: #e9e7e7 url(../imagenes/arrow-square.gif) no-repeat right -51px;
	padding: 7px 15px;
	margin: 0;
	font: bold 90%/100% Arial, Helvetica, sans-serif;
	border: solid 1px #c4c4c4;

	border-bottom: none;
	cursor: pointer;
}
.accordion h3:hover {
	background-color: #AAAAAA;

}
.accordion h3.active {
	background-position: right 5px;
}
.accordion p {
	background: #f7f7f7;
	margin: 0;
	padding: 10px 15px 20px;
	border-left: solid 1px #c4c4c4;
	border-right: solid 1px #c4c4c4;
}
</style>

<?php

$rs=traerFoto($id_proyecto);




$sql_buscar="SELECT a.*, b.*, c.*, d.*  FROM v_proyecto as a LEFT JOIN v_productores as b 
ON b.id_proyecto=a.id_proyecto LEFT JOIN v_produccion_proyecto as c ON c.id_proyecto=a.id_proyecto
LEFT JOIN v_ubicacion_proyecto_georeferencial as d ON d.id_proyecto=a.id_proyecto
	WHERE a.id_proyecto='$id_proyecto' ORDER BY fecha_registro_proyecto DESC";

$result = pg_query($sql_buscar);

while($row = pg_fetch_array($result))
{



				$cadena = traerNombreCadena($row['id_proyecto']);
				$id_cadena = traeridCadena($row['id_proyecto']);
				$estado = traerNombreEstado($row['estado']);
				$municipio = traerNombreMunicipio($row['municipio']);
				$parroquia = traerNombreParroquia($row['parroquia']);
				$fig_juridica = traerNombreFigura_juridica($row['id_fig_juridica']);
				$area = traerNombreArea($row['id_proyecto']);
				$tipo_org = traerNombreTipo_org($row['id_proyecto']);
				$comuna = traerNombreOrganizacionComuna($row['id_proyecto']);
				$consejo = traerNombreOrganizacionConsejo($row['id_proyecto']);
				$movimiento = traerNombreOrganizacionMovimiento($row['id_proyecto']);
				$eje_comunal = traerNombreEje_comunal($row['id_eje_parroquial']);
				$circuito = traerNombreCircuito($row['id_circuito']);
				$financiamiento = traerFinanciamiento($row['id_proyecto']);

				$foto = traerFoto($row['id_proyecto']);
                              /*  $cadena = traerNombreCadena($row['cadena']);
				$estado = traerNombreEstado($row['estado']);
				$municipio = traerNombreMunicipio($row['municipio']);
				$parroquia = traerNombreParroquia($row['parroquia']);*/

$url = "http://maps.google.com/maps/api/staticmap?center=".$row['latitud'].",".$row['longitud']."&zoom=17&size=347x80&maptype=hybrid";
$url.= "&markers=color:";
    switch ($id_cadena){
    case "1": $url.= "blue"; break;
    case "2": $url.= "green"; break;
    case "8": $url.= "purple"; break; 
    case "11": $url.= "orange"; break;
    case "9": $url.= "red"; break;
    case "10": $url.= "yellow"; break; 
    case "7": $url.= "brown"; break; 
    } 
$url.= "|".$row['latitud'].",".$row['longitud'];
$url.= "&sensor=false&format:png";



?>


<script type=text/javascript>




var mygallery=new simpleGallery({
	wrapperid: "simplegallery1", //ID of main gallery container,
	dimensions: [342, 250], //width/height of gallery in pixels. Should reflect dimensions of the images exactly
	imagearray: [

<?php
$num_foto = pg_num_rows($foto);
if (!empty($num_foto)){
while ($r=pg_fetch_array($foto)){
?>

<?php
echo "[". "\"../files/". $r['nombre_archivo'] . "\"" . ", \"\"". ", \"\" ,". "\"". $r['descripcion_archivo'] . "\"" ."],"  
?>

<?php		
}}else{

echo "[". "\"../imagenes/no_imagen.jpg\"" . ", \"\"". ", \"\" ,". "\" No hay Registro Fotográfico\"" ."]," ;

}


?>
	],
	autoplay: [true, 2500, 2], //[auto_play_boolean, delay_btw_slide_millisec, cycles_before_stopping_int]
	persist: false, //remember last viewed slide and recall within same session?
	fadeduration: 500, //transition duration (milliseconds)
	oninit:function(){ //event that fires when gallery has initialized/ ready to run
		//Keyword "this": references current gallery instance (ie: try this.navigate("play/pause"))
	},
	onslide:function(curslide, i){ //event that fires after each slide is shown
		//Keyword "this": references current gallery instance
		//curslide: returns DOM reference to current slide's DIV (ie: try alert(curslide.LEFTHTML)
		//i: integer reflecting current image within collection being shown (0=1st image, 1=2nd etc)
	}
})

</script>


<?php

echo "<table border='0' width='600' height='500'>
  <tbody>
    <tr>
      <td colspan='2' height='10'><img style='width: 700px; height: 65px;' alt='' src='../imagenes/banner_ficha.png'>
</td>
    </tr>
    <tr>
      <td height='10'   BACKGROUND='../imagenes/imagen.jpg' ><font color='white' style='text-align:justify'>&nbsp;".$row['nombre_proyecto']."</font></td>
      <td   BACKGROUND='../imagenes/imagen.jpg' ><font color='white'>&nbsp;Galeria fotografica</font></td>
    </tr>
    <tr>
      <td height='10' style='background-image: url(../imagenes/cargandoo.gif); background-position : center; background-repeat : no-repeat;'><img src='".$url."'></td>
      <td rowspan='2' valign='top'>

<table border='0' width='350' height='5'>
  <tbody>
 <tr>
      <td height='250' style='background-image: url(../imagenes/cargandoo.gif); background-position : center; background-repeat : no-repeat;'> 	<div id='simplegallery1'> </ div></td>
    </tr>
 <tr>
      <td height='10' BACKGROUND='../imagenes/imagen.jpg'><font color='white'>&nbsp;Descripci&oacute;n del Proyecto</font></td>
    </tr>
 <tr>
      <td height='140'   valign='top'>
<div style='text-align:justify; OVERFLOW: auto;WIDTH: 325px; TOP: 48px; HEIGHT: 130px;padding: 5px 5px 5px 5px;' class='textoParrafo'>".$row['descripcion_proyecto']."</div>
</td>
    </tr>
 </tbody>
</table>


     </td>
    </tr>
    
    <tr>
      <td valign='top' bgcolor='#D9D9D9'>

<div class='accordion'>
	<h3>Ubicaci&oacute;n</h3>
	<p>	
		<b>Estado</b>: ".cambiar_a_minusculas($estado)."<br>
           	<b>Municipio:</b> ".cambiar_a_minusculas($municipio)."<br>
		<b>Parroquia:</b> ".cambiar_a_minusculas($parroquia)."<br>
		<b>Circuito:</b> ".cambiar_a_minusculas($circuito)."<br>
		<b>Eje Parroquial:</b> ".cambiar_a_minusculas($eje_comunal)."<br>
		<b>Direcci&oacute;n:</b> ".$row['direccion']."<br>
	</p>
	<h3>Cadena / Area</h3>
	<p style='display:none'>	
		<b>Cadena:</b> ".$cadena."<br>
		<b>Area:</b> ";

for($i=0;$i<count($area);$i++){

		echo "&nbsp;".$area[$i]. ";";
		}



echo "<br>
	</p>
	<h3>Datos de Financiamiento</h3>
	<p style='display:none'>	
		<b>Concepto:</b> ".$row['nombre_proyecto']."<br>
		<b>Monto:</b> ".$financiamiento[1]['fin']['monto']." &nbsp;Bs. <br>
		<b>Estatus:</b> ".traerNombreEstatusFin($financiamiento[1]['fin']['estatus'])."<br>
		<b>Ente:</b> ".traerNombreEnteFin($financiamiento[1]['fin']['ente'])." <br>
	</p>
	<h3>Organizaciones Comunitarias</h3>
	<p style='display:none'>
		<b>Comuna:</b> ";
for($i=0;$i<count($comuna);$i++){

		echo $comuna[$i].";";
		}


echo	"<br>
		<b>Consejo Comunal:</b> ";
for($i=0;$i<count($consejo);$i++){

		echo $consejo[$i].";";
		}


echo	"<br>
		<b>Movimiento:</b> ";
for($i=0;$i<count($movimiento);$i++){

		echo $movimiento[$i].";";
		}


echo	" <br>
	</p>
	<h3>Productores</h3>
	<p style='display:none'>	
		<b>Directos:</b> ".$row['num_pro_directos']."<br>
		<b>Indirectos:</b> ".$row['num_prod_indirectos']."<br>
		<b>Masculinos:</b> ".$row['num_prod_masculinos']." <br>
		<b>Femeninos:</b> ".$row['num_prod_femeninos']."<br>
	</p>
	<h3> Datos de Producción</h3>
	<p style='display:none'>
		<b>Estatus de producción:</b> ".$row['estatus_produccion']." <br>
		<b>Fecha de Inicio de Producción:</b> ".$row['fecha_produccion']."<br>
		<b>Producto Principal:</b> ".$row['prod_principal']."<br>
		<b>Capacidad a Instalar (Unid/Año):</b> ".$row['meta_produccion']."<br>
	</p>

      </td>
  
    </tr>
     </tbody>
</table>";

}
?>
