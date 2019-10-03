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

//$id_proyecto=1;

$rs = buscarRegistro($id_proyecto);
  if (isset($volver)) {
        header("Location: consultar_proyecto.php");
    }



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
                $('#responsable').textareaCount(options2);
                $('#estado_actual').textareaCount(options2);
                $('#problemas_actuales').textareaCount(options2);
                $('#estrategia').textareaCount(options2);
            });
        </SCRIPT>
<!--************************************************************-->
	<link rel="stylesheet" type="text/css" href="elaboracion/standalone.css" />
	<link rel="stylesheet" type="text/css" href="elaboracion/tabs.css" />

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="elaboracion/jquery.tools.min.js" type="text/javascript"></script>
	<!-- This JavaScript snippet activates those tabs -->
	<script>
		// perform JavaScript after the document is scriptable.
		$(function() { $("ul.tabs").tabs("> .pane"); });
	</script>
	<style>
		div.wrap {
			width:85%;
			margin-bottom:0px;
			margin-left:5em;/* 7 */
		}
		.wrap .pane {	
			background:#FAFFFa;
			display:none;
			padding:20px;
			border:1px solid #999;
			border-top:0;
			font-size:11px;
			color:#456;
			margin: 0 0 5px 0;	
			_background-image:none;
		}
		.wrap .pane p {
			font-family:Arial,Verdana,Bitstream Vera Sans, Sans,Sans-serif;
			font-size:12px;
			font-weight:bold;
			color:#9f0707;
			margin: 20px 0 10px 0;	
			text-align:right;
		}
	</style>



<!--************************************************************-->
    </HEAD>
    <BODY>
        <BR>
      <TABLE id="tablaTitulo" border="0" cellpadding="0" cellspacing="0" align="center" width="85%">
            <TR><TD class="tituloBackground"> <?php echo $rs['nombre_proyecto'];?> </TD></TR>
        </TABLE>
        <BR>


<div class="wrap">
		<!-- the tabs -->
		<ul class="tabs">
			<li><a>ESTATUS GENERAL</a></li>
			<li><a>ACTIVIDADES</a></li>
			
		</ul>
		<!-- PESTAÑA  I -->
		<div class="pane">
			<!--<p>CAPITULO I</p>
			<BR>-->
			<TABLE border="0" style="width:100%; height:90%;" bgcolor="#E3E3E3" cellspacing="0" cellpadding="0">
				<TR>
					<TD valign="top" bgcolor="White" >
						<iframe name="iframeb" src="estatus_general.php?id_proyecto=<?php echo $id_proyecto; ?>" width="100%" height="100%" align="top"  scrolling="auto" style="border:0px solid green"></iframe>
					</TD>
				</TR>
			</TABLE>
		</div>
		<!-- PESTAÑA  II -->
		<div class="pane">
			<!--<p>CAPITULO I</p>
			<BR>-->
			<TABLE border="0" style="width:100%; height:150%;" bgcolor="#E3E3E3" cellspacing="0" cellpadding="0">
				<TR>
					<TD valign="top" bgcolor="White" >
						<iframe name="iframec" src="tareas.php?id_proyecto=<?php echo $id_proyecto; ?>" width="100%" height="100%" align="top"  scrolling="auto" style="border:0px solid green"></iframe>
					</TD>
				</TR>
			</TABLE>
		</div>
	</div>
    </BODY>
</HTML>
