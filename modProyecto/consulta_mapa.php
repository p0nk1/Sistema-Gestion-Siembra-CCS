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
$perfil =$_SESSION['adminProy']['id_perfil'];

/*echo "<pre>";
	print_r($_POST);
echo "</pre>";die();*/


if (isset($buscar)) {

if($cadena!=""){

$sql_buscar="SELECT a.*, b.*, d.* FROM v_proyecto as a left JOIN v_tipo_actividad_economica as b 
ON b.id_proyecto=a.id_proyecto left JOIN v_ubicacion_proyecto_georeferencial as d ON d.id_proyecto=a.id_proyecto 
WHERE b.id_cadena='$cadena' ORDER BY id_cadena DESC";
}else{
echo "seleccione cadena";
	}
 }else{

 $sql_buscar="SELECT a.*, b.*, c.*, d.*  FROM v_proyecto as a left JOIN v_productores as b 
ON b.id_proyecto=a.id_proyecto left JOIN v_produccion_proyecto as c ON c.id_proyecto=a.id_proyecto
left JOIN v_ubicacion_proyecto_georeferencial as d ON d.id_proyecto=a.id_proyecto 
	WHERE a.estatus_tabla_proyecto='1' ORDER BY fecha_registro_proyecto DESC";
}


$estados = query_array_estado();
$municipio = query_array_municipio();
$parroquia = query_array_parroquia();
$result = arrays_js_edo_mun($estados, $municipio, $parroquia);
echo $result;


?>

<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

	        <link rel="stylesheet" type="text/css" href="../css/css.css">
 <style>
     
        a.back{
            width:256px;
            height:73px;
            position:fixed;
            bottom:15px;
            right:15px;
            background:#fff url(codrops_back.png) no-repeat top left;
            z-index:1;
            cursor:pointer;
        }
        a.activator{
            width:153px;
            height:150px;
            position:absolute;
            top:0px;
            left:0px;
            background:#fff url(clickme.png) no-repeat top left;
            z-index:1;
            cursor:pointer;
        }
        /* Style for overlay and box */
        .overlay{
            background:transparent url(../imagenes/overlay.png) repeat top left;
            position:fixed;
            top:0px;
            bottom:0px;
            left:0px;
            right:0px;
            z-index:100;
        }
        .box{
            position:fixed;
	    width: 700px;
            top:10px;
            left:18%;
            right:17%;
            background-color:#fff;
            color:#030101;
            padding:16px;
            border:2px solid #ccc;
           -moz-border-radius: 30px;
	   -webkit-border-radius: 30px;
	    border-radius: 30px;

-moz-box-shadow: 10px 10px 20px #000000;
-webkit-box-shadow: 10px 10px 20px #000000;
box-shadow: 10px 10px 20px #000000;
filter: progid:DXImageTransform.Microsoft.Shadow(strength = 10, direction = 135, color = '#000000');
-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(strength = 10, Direction = 135, Color = '#000000')";

            z-index:101;
        }
        .box h1{
            border-bottom: 1px dashed #7F7F7F;
            margin:-20px -20px 0px -20px;
            padding:0px;
            background-color:#B8B8B8;
            color:#030101;
            -moz-border-radius:20px 20px 0px 0px;
            -webkit-border-top-left-radius: 20px;
            -webkit-border-top-right-radius: 20px;
            -khtml-border-top-left-radius: 20px;
            -khtml-border-top-right-radius: 20px;
        }
        a.boxclose{
            float:right;
            width:26px;
            height:26px;
            background:transparent url(../imagenes/cancel.png) repeat top left;
            margin-top:-22px;
            margin-right:-24px;
            cursor:pointer;
        }


	#cdr {

	padding:5px;
	background:gray;
	width:260px;
	border-radius:10px 0px 0px 10px;

	

	}

#contenedora { 
	position:absolute;
	left:900px;
	bottom:35px;

	border: 1px solid black;
 }
    </style>

        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
       <!-- <script type='text/javascript' src='../js/google.js' ></script>-->
         <script type="text/javascript" src="../clases/jquery/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="../clases/jquery/jquery.jCombo.min.js"></script>
<script Language="JavaScript">

function Validar(theForm)
{

if (theForm.cadena.value == 0)
  {
    info.innerHTML ="&nbsp;Por favor Seleccione el Nombre de la Cadena Productiva";
    theForm.cadena.focus();
    return (false);
  }
}
</script>

	<script type="text/javascript">
		$(document).ready(function(){
		$("#arrow-up").css("display","none");

		$("#arrow-up,#arrow-down,#titulo").click(function () {
			$("#leyenda").slideToggle("slow");
			$("#texto").css("font-weight","bold")

			if($("#arrow-up").css("display") == "block") 
			{
				$("#arrow-up").css("display","none");
				$("#arrow-down").css("display","block");
				$("#texto").css("font-weight","normal")
			}
			else
			{
				$("#arrow-up").css("display","block");
				$("#arrow-down").css("display","none");
			}
		});
	});
	</script>
    </head>
    <body>

        <style>
            #map_canvas {
                width: 1110px;
                height: 430px;
                float: none;
                margin:auto;
            }
        </style>

        <FORM method="POST" name="registro" action="" onSubmit="return Validar(this)" >
			   <BR>
        <TABLE id="tablaTitulo" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
            <TR><TD class="tituloBackground"> MAPA ECONOMICO </TD></TR>
        </TABLE>
        <BR>
                       <TABLE border="0" cellpadding="2" cellspacing="2" align="center" bgcolor="#F2F2F2">

<tr>
	<TD class="tituloTablas" bgcolor="White" width="20%">&nbsp;&nbsp;&nbsp;Cadena:<a class="campo_obligatorio" >&nbsp;*</a></TD>
                    <TD class="textoCampo" bgcolor="White" >
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php cargar_Combo('cadena','cadena', $conn, query_cadena(), $cadena,""); ?>
			
                      
                    </TD>
			<TD  bgcolor="White">
			<INPUT id="buscar" name="buscar" type="submit" value="BUSCAR" class="botonPeq">
			</TD>
			<TD colspan="3" bgcolor="White">
<div id="info" style="color: #FF0000; font-weight: bold;font-size:12px;">

<?php 

$result = pg_query($sql_buscar);


$num=pg_num_rows($result);


if ($num =="0")
{

echo "&nbsp;No hay Resultados";

}else{

echo  "<div style='color:black ;font-weight: bold;'>&nbsp;".$num." Resultado(s)</div>";

}

while($row = pg_fetch_array($result))
{

if(($row['latitud']=="") or ($row['longitud']=="")){

if (($perfil == 1) or ($perfil == 2)) {
echo "<script>";
echo "alert('Por favor Edite la Ubicacion Geografica de los Proyectos para que puedan ser visualizados');\n";
echo "</script>";
break;

	}
}


}

?>
		</div></TD>
			</TD>

</tr>  
       <TR>
                    <TD class="subtituloBackground"  colspan="6">&nbsp;&nbsp;&nbsp;Navegar entre Parroquias</TD>
                     
                </TR>             

<TR>
                    <!--******************************************************************************************************************************** 
                    **********     COMBOS ANIDADOS Y DINAMICOS CON AJAX PARA SELECCIONAR ESTADO, MUNICIPIO, PARROQUIA     ************************** 
                    ******************************************************************************************************************************** -->
                    <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp; Estado  </TD>
                    <TD align="center" bgcolor="White">
                        <select name="estado" id="estado" style="width:150px" onblur="this.style.backgroundColor='#ffffff'"></select>
                    </TD>
                    <TD class="tituloTablas" align="center" bgcolor="White"> Municipio  </TD>
                    <TD align="center" bgcolor="White">
                        <select name="municipio" id="municipio" style="width:150px" onblur="this.style.backgroundColor='#ffffff'"></select>

                    </TD> 
                    <TD class="tituloTablas" align="center" bgcolor="White"> Circuito  </TD>
                    <TD align="center" bgcolor="White">
                        <select name="circuito" id="circuito" style="width:150px" onblur="this.style.backgroundColor='#ffffff'"></select> 

                    </TD> 
                </TR> 
                <TR>
                    <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp; Parroquia  </TD>
                    <TD align="center" bgcolor="White">
                        <select name="parroquia" id="parroquia" style="width:150px" onchange="mover_parroquia(parroquia.value);" 			onblur="this.style.backgroundColor='#ffffff'"></select>
                    </TD>
                   
		    <TD class="tituloTablas" align="center" bgcolor="White" colspan="4"></TD>
                                                                                                  
                </TR> 
                <!--******************************************************************************************************************************** 
                **********     COMBOS ANIDADOS Y DINAMICOS CON AJAX PARA SELECCIONAR ESTADO, MUNICIPIO, PARROQUIA     ************************** 
                ********************************************************************************************************************************-->
                <TR>
                    <TD class="textoCampo" bgcolor="White" colspan="6">
                        <div id="map_canvas"></div>
   
<!--* CONTENEDOR DE LA LEYENDA *-->

<div id="contenedora">
          <table width="200" height="10" border="0" bgcolor="#FFFFFF">
  <tbody>
   <tr>
      <td id="titulo" class="textoCampo" title="Leyenda"><div align="center" id="texto">Leyenda</div></td>
      <td width="10">
<img src="../imagenes/arrow_down.png" id="arrow-up" class="imgcolexp" title="Ocultar"/>
<img src="../imagenes/arriba.png" id="arrow-down" class="imgcolexp" title="Mostrar"/></td>
    </tr>
  </tbody>
</table>

<div id="leyenda" style="display:none">
    <table width="200" height="200" border="1" cellpadding="0" cellspacing="1" bgcolor='#f7f7f7'>
  <tbody>
    <tr>
      <td width="35" valign="top" height="25"><img src="../imagenes/azul.png" width="35" height="25" title="Azul"/></td>
      <td class="tituloTablas"  style="width:180%">&nbsp;&nbsp;&nbsp;Alimentaci&oacute;n</td>
    </tr>
    <tr>
      <td valign="top" height="25"><img src="../imagenes/verde.png" width="35" height="25" title="Verde"/></td>
      <td class="tituloTablas">&nbsp;&nbsp;&nbsp;Construcci&oacute;n</td>
    </tr>
    <tr>
      <td valign="top" height="25"><img src="../imagenes/morado.png" width="35" height="25" title="Morado"/></td>
      <td class="tituloTablas">&nbsp;&nbsp;&nbsp;Agricultura Urbana</td>
    </tr>
    <tr>
      <td valign="top" height="25"><img src="../imagenes/anaranjado.png" width="35" height="25" title="Anaranjado"/></td>
      <td class="tituloTablas">&nbsp;&nbsp;&nbsp;Quimica</td>
    </tr>
    <tr>
      <td valign="top" height="25"><img src="../imagenes/rojo.png" width="35" height="25" title="Rojo"/></td>
      <td class="tituloTablas">&nbsp;&nbsp;&nbsp;Artesania</td>
    </tr>
    <tr>
      <td valign="top" height="25"><img src="../imagenes/amarillo.png" width="35" height="25" title="Amarillo"/></td>
      <td class="tituloTablas">&nbsp;&nbsp;&nbsp;Manufactura Textil,<br> &nbsp;&nbsp;&nbsp;Calzados y Afines</td>
    </tr>
    <tr>
      <td valign="top" height="25"><img src="../imagenes/marron.png" width="35" height="25" title="Marron"/></td>
      <td class="tituloTablas">&nbsp;&nbsp;&nbsp;Servicios</td>
    </tr>
</div>
  </tbody>
</table>
     </div>

<!--* FIN CONTENEDOR DE LA LEYENDA *-->
                    </TD>
                </TR>
            </TABLE><br>
	 <TABLE id="tablaBoton" border="0" cellpadding="0" cellspacing="0" align="center" >
                    <TR>
                        <TD ></TD>
			</FORM>
			<FORM method="POST" name="registro" action="kml.php" >
			<INPUT type="hidden" name="cadena_kml" value="<?php echo $cadena;?>">
			<!--<TD ><INPUT id="kml" name="kml" type="submit" value="Kml" class="botonPeq"></TD>-->
                    </TR>
                </TABLE>
        </FORM>
<script type="text/javascript">
//<![CDATA[

//variable crosshair
var crosshairShape = {coords:[0,0,0,0],type:'rect'};

var map;


  /* Devuelve al usuario al inicio. Este constructor toma
  * El control DIV como argumento.*/


function HomeControl(controlDiv, map) {

 // Define estilos CSS para el DIV que contiene el control

  controlDiv.style.padding = '5px';
  controlDiv.style.paddingRight = '0px';

  //CSS para el borde
  var controlUI = document.createElement('DIV');
  controlUI.style.backgroundColor = 'white';
  controlUI.style.borderStyle = 'solid';
  controlUI.style.borderWidth = '1px';
  controlUI.style.cursor = 'pointer';
  controlUI.style.textAlign = 'center';
  controlUI.title = 'Inicio';
  controlDiv.appendChild(controlUI);

  //CSS for el interior
  var controlText = document.createElement('DIV');
  controlText.style.fontFamily = 'Arial,sans-serif';
  controlText.style.fontSize = '14px';
  controlText.style.paddingLeft = '10px';
  controlText.style.paddingRight = '10px';
  controlText.innerHTML = 'Inicio';
  controlUI.appendChild(controlText);



  // Configuración de los detectores de eventos clic: devuelve al inicio del mapa
  google.maps.event.addDomListener(controlUI, 'click', function() {
    map.setCenter(latlng)
    map.setZoom(12);
  });
}

var latlng = new google.maps.LatLng(10.510004493839597, -66.91665221704102);

	var myOptions = {
	zoom: 12,
	center: latlng,
	mapTypeId: google.maps.MapTypeId.HYBRID,
	zoomControl: true,
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.LARGE,
			position: google.maps.ControlPosition.LEFT_CENTER
		},
	mapTypeControl: true, scrollwheel: false,
    mapTypeControlOptions: {
      style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
    }
	};

	var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);


// Crea el DIV para mantener el control y llama al HomeControl () constructor
// Pasado en este DIV.
  var homeControlDiv = document.createElement('DIV');
  var homeControl = new HomeControl(homeControlDiv, map);

  homeControlDiv.index = 1;
  map.controls[google.maps.ControlPosition.TOP_RIGHT].push(homeControlDiv);


//crosshair
var marker = new google.maps.Marker({
	map: map,
	icon: '../imagenes/cross-hairs.gif',
	shape: crosshairShape
});
marker.bindTo('position', map, 'center'); 
//fin crosshair

<?php


 $result = pg_query($sql_buscar);
if (!$result)
{
echo "No hay resultados";
}


while($row = pg_fetch_array($result))
{
$latitud=$row['latitud'];
$longitud=$row['longitud'];
$id_cadena = traeridCadena($row['id_proyecto']);



if(($latitud!="") or ($longitud!="")){



echo "var point = new google.maps.LatLng(" . $latitud . "," . $longitud . ");\n";
?>
var id_registro =<?php echo "\"" . $row['id_proyecto'] . "\""; ?>;
var latitud =<?php echo "\"" . $latitud . "\""; ?>;
var longitud =<?php echo "\"" . $longitud . "\""; ?>;

<?php

echo "var marker = new google.maps.Marker({position:point, map: map, title: '".$row['nombre_proyecto']."' , icon: '../imagenes/" . $id_cadena . ".png', animation: google.maps.Animation.DROP,});\n";
echo "mensaje(latitud,longitud,id_registro);\n";
echo "\n";
}
}

?>

function mensaje(latitud,longitud,id_registro) {

  google.maps.event.addListener(marker, 'click', function() {

//mover mapa
var movido = new google.maps.LatLng(latitud,longitud);
map.setCenter(movido);
//map.setZoom(17);
//fin mover mapa


//peticion ajax
$.post("fichaProyecto.php",{id_proyecto:id_registro},function(respuesta){
$('#respuesta').html(respuesta);

//setTimeout('ventana ()', 1000);

	$('#overlay').fadeIn('fast',function(){
                        $('#box').fadeIn('550');
                    });
                
                $('#boxclose').click(function(){

		$('#box').fadeOut('500');
		$('#overlay').fadeOut('500');

                    
                });
	

	}
);
//fin peticion

  });
}


// Funcion para moverse entre parroquias
function mover_parroquia(parroquia) {


for(i=0 ; i< parr.length ; i++)
        {   
            if(parr[i][0]==parroquia)
            {
                var movido = new google.maps.LatLng(parr[i][1],parr[i][2]);
  		map.setCenter(movido);
		map.setZoom(14);
                break;
            }
        }

}
//]]>
</script>    
 <script type="text/javascript">

                          

		
            $("#estado").jCombo("../ajax/estados.php", { selected_value : '6' } );

            $("#municipio").jCombo("../ajax/municipio.php?id=", { 
					parent: "#estado", 
					parent_value: '6', 
					selected_value: '104'
				});
	
	    $("#circuito").jCombo("../ajax/circuito.php?id=", { 
					parent: '#municipio',
					
				});

            $("#parroquia").jCombo("../ajax/parroquia.php?id=", { 
					parent: "#circuito",
					
				
				});

 

        </script>  
<!-- La caja de la ficha (overlay) -->
        <div class="overlay" id="overlay" style="display:none;"></div>
        <div class="box" id="box" style="display:none;">
            <a class="boxclose" id="boxclose"></a>
        <!--div donde se imprime la respuesta del ajax-->   
<div id='respuesta' style='text-align:center;'> </div>
	       <!--fin div donde se imprime la respuesta del ajax-->

        </div>
<!--fin caja de la ficha (overlay) -->

</body>
</html>
