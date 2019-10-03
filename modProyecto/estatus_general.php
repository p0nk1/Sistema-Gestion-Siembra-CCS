<?php
error_reporting(0);
session_start();
include_once ("../funciones/funciones_session.php");
comprobarSession($_SESSION['adminProy']);
include_once ("../conexion/conexionpg.php");
include_once ("../funciones/queryProyectos.php");
include_once ("../funciones/funciones.php");
extract($_POST);
extract($_GET);


$id_usuario_registra = $_SESSION['adminProy']['id_usuario'];
$perfil =$_SESSION['adminProy']['id_perfil'];

 if (isset($volver)) {
        header("Location: estatus_general.php");
    }


$rs = buscarRegistro($id_proyecto);
$row = traerEstatus_general($rs['id_proyecto']);
$registro = pg_num_rows($row);
if ($registro==""){
	echo "<head><meta http-equiv='refresh' content='0; url=guardar_estatus_general.php?id_proyecto=$id_proyecto'></head>";
	exit();
}

$r=pg_fetch_array($row);



				$cadena = traerNombreCadena($rs['id_proyecto']);
				$id_cadena = traeridCadena($rs['id_proyecto']);
				$estado = traerNombreEstado($rs['estado']);
				$municipio = traerNombreMunicipio($rs['municipio']);
				$parroquia = traerNombreParroquia($rs['parroquia']);
				$fig_juridica = traerNombreFigura_juridica($rs['id_fig_juridica']);
				$area = traerNombreArea($rs['id_proyecto']);
				//$tipo_org = traerNombreTipo_org($rs['id_proyecto']);
				$comuna = traerNombreOrganizacionComuna($rs['id_proyecto']);
				$consejo = traerNombreOrganizacionConsejo($rs['id_proyecto']);
				$movimiento = traerNombreOrganizacionMovimiento($rs['id_proyecto']);
				$eje_comunal = traerNombreEje_comunal($rs['id_eje_parroquial']);
				$circuito = traerNombreCircuito($rs['id_circuito']);
				$financiamiento = traerFinanciamiento($rs['id_proyecto']);
				$foto = traerFoto($rs['id_proyecto']);
				$n_adicional= contar_financiamiento_adicional($rs['id_proyecto']);
				
/* Inicio de las Validaciones 
include("../clases/validacion/validacion.inc.php");
$v3 = new MCI_validacion("formRegistrarProyecto");


$v3->agregar_validacion("nombreProy", "req", null, "Debe ingresar el Nombre del Proyecto");
$v3->agregar_validacion("descripcionProy", "req", null, "Debe ingresar la Descripci&oacute;n del Proyecto");
//$v3->agregar_validacion("fecha_taller", "req",null,"La Fecha es un campo requerido");

echo $v3->obtener_archivos_js("../clases/validacion/js/");*/

?>

<HTML>
    <HEAD>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../css/css.css">
	
        <link rel="stylesheet" href="../clases/chosen/chosen.css" />
	<style>
            #map_canvas {
                width: 1024px;
                height: 430px;
                float: none;
                margin:auto;
            }
        </style>
	<!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>-->
	<script type='text/javascript' src='../js/google.js' ></script>
        <script type="text/javascript" src="../clases/jquery/jquery-1.6.4.min.js"></script>
        <script type="text/javascript" src="../clases/jquery/jquery.jCombo.min.js"></script>
        <script type="text/javascript" src="../clases/jquery/jquery.textareaCounter.plugin.js"></script>
        <script type="text/javascript" src="../js/general.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){

		$("#credito_adicional").click(function () {
			$("#credito,#credito1,#credito2").slideToggle("fast");

		});
	});
	</script>

        <SCRIPT>
            $(document).ready( function() { 
                var options2 = {
	
                    'maxCharacterSize': 500, 'originalStyle': 'originalTextareaInfo','warningStyle' : 'warningTextareaInfo',
                    'warningNumber': 20, 'displayFormat' : '#input/#max | #words Palabras'
                };
                //                var options3 = {
                //                    'maxCharacterSize': 200, 'originalStyle': 'originalTextareaInfo', 'warningStyle' : 'warningTextareaInfo',
                //                    'warningNumber': 20, 'displayFormat' : '#input/#max | #words Palabras'
                //                };
                $('#nombreProy').textareaCount(options2);
                $('#nombComunidad').textareaCount(options2);
                $('#descripcionProy').textareaCount(options2);
                $('#direccionOrg').textareaCount(options2);
            });
        </SCRIPT>

<!--***************************************-->
<script type="text/javascript">
			

			$(document).ready(function() {
				$("#pb1").progressBar();
				
			});

			
</script>
<script type="text/javascript" src="jquery.progressbar.min.js"></script>
<!--***************************************-->

    </HEAD>
    <BODY>
        <BR>
        <TABLE id="tablaTitulo" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
            <TR><TD class="tituloBackground"> ESTATUS GENERAL </TD></TR>
        </TABLE>
        <BR>
        <FORM action="" id="formRegistrarProyecto" name="formRegistrarProyecto" method="POST" onSubmit="return Validar(this)">

		  <TABLE border="0" width="70%" cellpadding="2" cellspacing="2" align="center">
                <TR>
                    <TD class="tituloTablas" height="20" style="text-align: center;">
			<div id="info" style="color: #FF0000; font-weight: bold;"></div>
                        <?php /*echo $v3->html_error("formRegistrarProyecto"); ?><?php echo $v3->campo_oculto();*/ ?>
                    </TD>
                </TR>
            </TABLE>

            <TABLE border="0" cellpadding="2" cellspacing="1" align="center" width="70%" bgcolor="#D6D6D6">
                <TR>
                    <TD class="subtituloBackground" colspan="6"> Datos Basicos del Proyecto </TD>
                </TR>
                <TR>
                    <TD class="tituloTablas" bgcolor="White" style="width:18%">&nbsp;&nbsp;&nbsp; Nombre</TD>
                    <TD colspan="5" bgcolor="White">
                       <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['nombre_proyecto'];?></div>
                    </TD>                    
                </TR>
                <TR>
                    <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp; Descripci&oacute;n </TD>
                    <TD colspan="5" bgcolor="White">
                        <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['descripcion_proyecto'];?></div>
                    </TD>
                </TR>
                <TR>
                    <TD class="subtituloBackground" colspan="6"> Responsable </TD>
                </TR>
                <TR>
                    <TD bgcolor="White" colspan="6">
		<div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;
		<?php 
		
								
		$resp_proy=buscar_responsables_proyecto($rs['id_proyecto']);
		$b=0;
		foreach ($resp_proy['iu'] as $valueb) {
			$max=count($resp_proy['iu']);
								
			echo $resp=nombres_responsables($resp_proy['iu'][$b]);
				if($max!=$b+1){ echo ',&nbsp;'; }
					$b++;
									
				}
		?>
		</div>
		 </TD>
                                                                              
                </TR> 
                <TR>
                    <TD class="subtituloBackground" colspan="6"> Estado Actual del Proyecto </TD>
                </TR>
                <TR>
                    <TD bgcolor="White" colspan="6">
		<div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $r['estado_actual'];?></div>
		 </TD>
                                                                                 
                </TR> 
		 <TR>
                    <TD class="subtituloBackground" colspan="6"> Problemas Actuales </TD>
                </TR>
                <TR>
                    <TD bgcolor="White" colspan="6">
		<div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $r['problema_actual'];?></div>
		</TD>
                                                                                 
                </TR> 
		 <TR>
                    <TD class="subtituloBackground" colspan="6"> Estrategia </TD>
                </TR>
                <TR>
                    <TD bgcolor="White" colspan="6">
		<div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $r['estrategia'];?></div>
		</TD>
                                                                                 
                </TR>
		 <TR>
                    <TD class="subtituloBackground" colspan="6"> Progreso </TD>
                </TR>
                <TR>
                    <TD bgcolor="White" colspan="6">
		<span class="progressBar" id="pb1"><?php if($r['porcentaje_avance']==""){ echo "0";}elseif ($r['porcentaje_avance']>100){ echo "100";}else{ echo $r['porcentaje_avance'];}?>%</span>

<br><br>
		</TD>
                                                                                 
                </TR> 
            </TABLE>
           



            <!--            <TABLE id="tablaDefProy" border="0" cellpadding="0" cellspacing="0" align="center" width="90%" class="tablaForm">                
                            <TR>
                                <TD>
                                    <BR>
                                    <TABLE border="0" cellpadding="0" cellspacing="2" align="center" width="90%">
                                        <TR><TD class="subtituloBackground"> Nombre del Proyecto </TD></TR>
                                        <TR><TD align="center"><TEXTAREA name="nombreProy" id="nombreProy" rows="2" cols="130"><?php //= $nombreProy   ?></TEXTAREA></TD></TR>
                                    </TABLE>
                                </TD>
                            </TR>
                            <TR>
                                <TD>
                                    <TABLE border="0" cellpadding="0" cellspacing="2" align="center" width="90%">
                                        <TR><TD class="subtituloBackground"> Descripci&oacute;n del Proyecto </TD></TR>
                                        <TR><TD align="center"><TEXTAREA name="descripcionProy" id="descripcionProy" rows="2" cols="130"><?php //= $descripcionProy   ?></TEXTAREA></TD></TR>
                                    </TABLE>
                                </TD>
                            </TR>
                            <TR>
                                <TD>
                                    <TABLE border="0" cellpadding="0" cellspacing="3" align="center" width="90%">
                                        <TR><TD class="subtituloBackground">Cadena / Organizaci&oacute;n / Comunidad / </TD></TR>
                                        <TR>
                                            <TD>
                                                <TABLE border="0" cellpadding="2" cellspacing="1" align="center" width="100%" bgcolor="#D6D6D6">
                                                    <TR>
                                                        <TD class="tituloTablas" align="center" bgcolor="#F2F2F2"> Cadena </TD>
                                                        <TD class="tituloTablas" align="center" bgcolor="#F2F2F2"> &Aacute;rea </TD>                                            
                                                    </TR>
                                                    <TR>
                                                        <TD align="center" bgcolor="White"><?php //= cargarComboConEvento('cadena', $conn, queryComboCadena(), $cadena, "onchange='document.formRegistrarProyecto.submit();'");   ?></TD>
                                                        <TD align="center" bgcolor="White">
            <?php
            /* if (!empty($cadena)) {
              cargarComboDependienteConEvento('area', $conn, queryComboArea($cadena), $area, "onchange='document.formRegistrarProyecto.submit();'");
              } else {
              echo "<div id='id_tipo_org'><select name='area_cadena' id='area_cadena' data-placeholder='Seleccione Area Cadena...' class='chzn-select' style='width:220px;' tabindex='2'><option value=''>Seleccione Area Cadena/option></select></div>";
              } */
            ?>
                                                        </TD>                                            
                                                    </TR>                                        
                                                </TABLE>
                                            </TD>
                                        </TR>
                                        <TR>
                                            <TD>
                                                <TABLE border="0" cellpadding="2" cellspacing="1" align="center" width="100%" bgcolor="#D6D6D6">
                                                    <TR>
                                                        <TD class="tituloTablas" align="center" bgcolor="#F2F2F2"> Tipo de Organizaci&oacute;n </TD>
                                                        <TD class="tituloTablas" align="center" bgcolor="#F2F2F2"> Organizaci&oacute;n </TD>                                            
                                                    </TR>
                                                    <TR>
                                                        <TD align="center" bgcolor="White"><?php //= cargarComboConEvento('tipo_org', $conn, queryComboTipoOrg(), $tipo_org, "onchange='document.formRegistrarProyecto.submit();'");   ?></TD>
                                                        <TD align="center" bgcolor="White">
            <?php
            /* if (!empty($tipo_org)) {
              cargarComboDependienteConEvento('organizacion', $conn, queryComboOrg($tipo_org), $organizacion, "onchange='document.formRegistrarProyecto.submit();'");
              } else {
              echo "<div id='id_tipo_org'><select name='organizacion' id='organizacion' data-placeholder='Seleccione Tipo Organizacion...' class='chzn-select' style='width:220px;' tabindex='2'><option value=''>Seleccione Tipo Organizacion</option></select></div>";
              } */
            ?>
                                                        </TD>                                            
                                                    </TR>                                        
                                                </TABLE>
                                            </TD>
                                        </TR>                            
                                        <TR><TD class="subtituloBackground">Ubicaci&oacute;n Geogr&aacute;fica</TD></TR>
                                        <TR>
                                            <TD>
                                                <TABLE border="0" cellpadding="2" cellspacing="1" align="center" width="100%" bgcolor="#D6D6D6">
                                                    <TR>
                                                        <TD class="tituloTablas" align="center" bgcolor="#F2F2F2">Estado </TD>
                                                        <TD class="tituloTablas" align="center" bgcolor="#F2F2F2">Municipio </TD>
                                                        <TD class="tituloTablas" align="center" bgcolor="#F2F2F2">Parroquia </TD>
                                                    </TR>
                                                    <TR>
                                                        <TD align="center" bgcolor="White"><?php //= cargarComboConEvento('estado', $conn, queryComboEstado(), $estado, "onchange='document.formRegistrarProyecto.submit();'");   ?></TD>
                                                        <TD align="center" bgcolor="White">
            <?php
            /* if (!empty($estado)) {
              cargarComboDependienteConEvento('municipio', $conn, queryComboMunicipio($estado), $municipio, "onchange='document.formRegistrarProyecto.submit();'");
              } else {
              echo "<div id='id_municipio'><select name='municipio' id='municipio' data-placeholder='Seleccione Estado...' class='chzn-select' style='width:220px;' tabindex='2'><option value=''>Seleccione Estado</option></select></div>";
              } */
            ?>
                                                        </TD>
                                                        <TD align="center" bgcolor="White">
            <?php
            /* if (!empty($municipio) AND !empty($estado)) {
              cargarComboParroquia('parroquia', $conn, queryComboParroquia($municipio), $parroquia);
              } else {
              echo "<div id='id_parroquia'><select name='parroquia' id='parroquia' data-placeholder='Seleccione Municipio...' class='chzn-select' style='width:220px;' tabindex='2'><option value=''>Seleccione Municipio</option></select></div>";
              } */
            ?>
                                                    </TR>
                                                    <TR><TD colspan="3" class="tituloTablas" align="center" bgcolor="#F2F2F2">Direcci&oacute;n </TD></TR>
                                                    <TR><TD colspan="3" bgcolor="White" align="center"><TEXTAREA name="direccionOrg" id="direccionOrg" rows="2" cols="130"><?= $direccionOrg ?></TEXTAREA></TD></TR>
                                                </TABLE>
                                            </TD>
                                        </TR>
                                    </TABLE>
                                    <BR>
                                </TD>
                            </TR>
                        </TABLE>-->
            <BR>
	<TABLE id="tablaBoton" border="0" cellpadding="0" cellspacing="0" align="center" >
		<TR>
		<TD align="center">
		<INPUT  name="volver" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VOLVER" class="botonPeq" onclick='history.go(-1);'>
		</TD>
		</FORM>
		<?php

		if ($perfil != 3) {

		?>

		<FORM method="POST" name="registro" action="editar_estatus_general.php" >
		<INPUT type="hidden" name="id_proyecto" value="<?php echo $rs['id_proyecto'];?>">
		<TD ><INPUT id="editar" name="editar" type="submit" value="Editar" class="botonPeq"></TD>
		</FORM>

		<?php

		}

		?>

		<FORM method="POST" name="registro" action="reporte.php" >
		<INPUT type="hidden" name="id_proyecto" value="<?php echo $rs['id_proyecto'];?>">
		<TD ><!--<INPUT id="Imprimir" name="Imprimir" type="submit" value="Imprimir" class="botonPeq">--></TD>
		</TR>
	</TABLE>

        </FORM>
	<?php /*echo $v3->obtener_js();*/ ?>
        <script src="../clases/chosen/chosen.jquery.js" type="text/javascript"></script>
        <script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
       <script type="text/javascript">
//<![CDATA[

var latitud =<?php echo "\"" . $rs['latitud'] . "\""; ?>;
var longitud =<?php echo "\"" . $rs['longitud'] . "\""; ?>;


if ((latitud=="") || (longitud=="")){

latitud= "10.491606770716423" ;
longitud= "-66.90326262963868";

}

var latlng = new google.maps.LatLng(latitud, longitud);
	var myOptions = {
	zoom: 15,
	center: latlng,
	mapTypeId: google.maps.MapTypeId.HYBRID,
	zoomControl: true,
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.LARGE,
			position: google.maps.ControlPosition.LEFT_CENTER
		},
	streetViewControl: false, draggable: false, scrollwheel: false 
	};

	var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

<?php

$latitud=$rs['latitud'];
$longitud=$rs['longitud'];




if(($latitud!="") or ($longitud!="")){



echo "var point = new google.maps.LatLng(" . $latitud . "," . $longitud . ");\n";


?>

<?php

echo "var marker = new google.maps.Marker({position:point, map: map, icon: '../imagenes/" . $id_cadena . ".png', animation: google.maps.Animation.BOUNCE});\n";

echo "\n";

}else{

echo "alert('Por favor Edite la Ubicacion Geografica del Proyecto');\n";

}
?>



//]]>
</script>     
    </BODY>
</HTML>
