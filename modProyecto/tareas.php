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
$perfil =$_SESSION['adminProy']['id_perfil'];




$consult=traerLista_actividades($id_proyecto);

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


/* Inicio de las Validaciones */
include("../clases/validacion/validacion.inc.php");
$v3 = new MCI_validacion("agregar_actividad");


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
	<!--<script type='text/javascript' src='../js/google.js' ></script>-->
       <!-- <script type="text/javascript" src="../clases/jquery/jquery-1.6.4.min.js"></script>-->
        <script type="text/javascript" src="../clases/jquery/jquery.jCombo.min.js"></script>
        <script type="text/javascript" src="../clases/jquery/jquery.textareaCounter.plugin.js"></script>
        <script type="text/javascript" src="../js/general.js"></script>
	


	<script type="text/javascript" src="../js/src/js/jscal2.js"></script>
        <script type="text/javascript" src="../js/src/js/lang/es.js"></script>
        <link rel="stylesheet" type="text/css" href="../js/src/css/jscal2.css" />
        <link rel="stylesheet" type="text/css" href="../js/src/css/border-radius.css" />
        <link rel="stylesheet" type="text/css" href="../js/src/css/steel/steel.css" />


        

<!--***************************************-->
 <script language="javascript" type="text/javascript" src="script.js"></script>
 <script src="progressbar.js" type="text/javascript"></script>
<!--***************************************-->
<script language="JavaScript">
		function lanzarSubmenu(ventana){
			ventana_secundaria = window.open(ventana,"_blank","width=800,height=500,scrollbars=yes")
			ventana_secundaria.moveTo(100,100);
		}

		function lanzarSubmenug(ventana){
			ventana_secundaria = window.open(ventana,"_blank","width=1550,height=500,scrollbars=yes")
			ventana_secundaria.moveTo(300,100);
		}


		function lanzarSubmenup(ventana){
			ventana_secundaria = window.open(ventana,"_blank","width=800,height=300,scrollbars=no")
			ventana_secundaria.moveTo(100,100);
		}
	</script>

      <!--<script type="text/javascript" src="jquery.js"></script>-->
        <!--<script type="text/javascript" src="busquedas.js"></script>-->
        <!--<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />-->
        <!--<LINK REL="SHORTCUT ICON" HREF="../imagenes/log32t.ico">-->
        <!--<link rel="stylesheet" href="../css/css.css" type="text/css" />-->
        <!--    <link rel="stylesheet" href="../css/css1.css" type="text/css" />-->
        <!-- lytebox v3.22 -->
        <!--<link href="mod_usuarios/lytebox_v3.22/lytebox.css" rel="stylesheet" type="text/css"  media="screen"/>
        <script type="text/javascript" language="javascript" src="mod_usuarios/lytebox_v3.22/lytebox.js"></script>-->
    
        <script type="application/x-javascript" src="../js/general.js"></script>
        <script type="text/javascript" language="javascript" src="js/general.js"></script>
        <script type="application/x-javascript" src="../js/jquery-1.6.4.min.js"></script>
        <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
        <link type="text/css" href="../css/smoothness/jquery-ui-1.8.15.custom.css" rel="stylesheet" />
        <style type="text/css" media="screen">
            @import "../css/site_jui.ccss";
            @import "../css/demo_table_jui.css";
            .dataTables_info { padding-top: 0; }
            .dataTables_paginate { padding-top: 0; }
            .css_right { float: right; }
            #example_wrapper .fg-toolbar { font-size: 0.8em }
            #theme_links span { float: left; padding: 2px 10px; }
        </style>
        <script type="text/javascript">
            function fnFeaturesInit ()
            {
                /* Not particularly modular this - but does nicely :-) */
                $('ul.limit_length>li').each( function(i) {
                    if ( i > 9 ) {
                        this.style.display = 'none';
                    }
                });
                $('ul.limit_length').append( '<li class="css_link">Show more<\/li>' );
                $('ul.limit_length li.css_link').click( function (){
                    $('ul.limit_length li').each( function(i){
                        if ( i > 5 ){
                            this.style.display = 'list-item';
                        }
                    });
                    $('ul.limit_length li.css_link').css( 'display', 'none' );
                });
            }
            $(document).ready( function()
            {
                fnFeaturesInit();
                $('#example').dataTable
                ({
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers",
                    "oLanguage":
                        {
                        "sProcessing": '<span class="texto_negro_no_size">Procesando...</span>',
                        "sLengthMenu": '<span class="texto_negro_no_size">Mostrar _MENU_ Actividades por P&aacute;gina</span>',
                        "sSearch": '<span class="texto_negro_no_size">Filtrar Ordenes:</span>',
                        "sEmptyTable": '<span class="texto_negro">No hay datos disponibles</span>',
                        "sZeroRecords": '<span class="texto_negro">No se han encontrado registros coincidentes</span>',
                        "sInfo": '<span class="texto_negro">Mostrando del _START_ al _END_ de _TOTAL_ Actividad(es)</span>',
                        "sInfoEmpty": '<span class="texto_negro">Mostrando del 0 al 0 de 0 Actividades</span>',
                        "sInfoFiltered": '<span class="texto_negro">(filtrado de _MAX_ Actividades)</span>',
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sPrevious": "Anterior",
                            "sNext":     "Siguiente",
                            "sLast":     "Ultimo",
                        },
                    },
                    "aaSorting": [[ 0, "asc"]],
                    "aLengthMenu": [[ 10, 25, 50, 100, -1 ], [ 10, 25, 50, 100, 'Todo' ]],
                });
            });
        </script>    
    </HEAD>
    <BODY>
		<?php

		if ($perfil != 3) {

		?>
     <FORM action="javascript: fn_agregar();" id="agregar_actividad" name="agregar_actividad" method="POST" >
        <BR>
        <TABLE id="tablaTitulo" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
            <TR><TD class="tituloBackground"> AGREGAR ACTIVIDADES </TD></TR>
        </TABLE>
        <BR>
   
	<INPUT type="hidden" name="id_proyecto" id="id_proyecto" value="<?php echo $id_proyecto;?>">
 <div class="alerta2" style="text-align:center;"><?php echo $v3->html_error("agregar_actividad"); ?><?php echo $v3->campo_oculto(); ?></div>
<br>
<table border="0" cellpadding="0" cellspacing="1" width="90%" bgcolor="#D6D6D6" align="center">
<tbody><TR><TD class="subtituloBackground" align="center" colspan="6" >Agregar Actividades </TD></TR>
	<tr bgcolor="#F2F2F2">
  <td align="center" class="tituloTablas">Actividad</td>
  <td align="center" class="tituloTablas" style="width:15%;">Fecha inicial</td>
  <td align="center" class="tituloTablas" style="width:15%;">Fecha final</td>
  <td align="center" class="tituloTablas">Asignar a</td>
<TD class="tituloTablas" align="center" style="width:2%;">Acci&oacute;n</TD>
</tr>

<tr>
  <td align="center" valign="top" bgcolor="White"><textarea name="tarea" id="tarea" style="width: 260px; height: 50px"></textarea></td>
  <td align="center" bgcolor="White"><input size="8" id="f_date1" name="fecha_inicio" readonly="true" value="<?php echo $fecha_registro; ?>" onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''"/>
                        <button id="f_btn1">...</button></td>
  <td align="center" bgcolor="White"><input size="8" id="f_date2" name="fecha_fin" readonly="true" value="<?php echo $fecha_registro; ?>" onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''"/>
                        <button id="f_btn2">...</button></td>
  <td align="center" bgcolor="White">
<?php cargar_combo_responsable('id_usuario','id_usuario', $conexion, queryComboresponsable(), $id_usuario, ""); ?></td>
<TD align="center" bgcolor="White">

 <BUTTON   title='Agregar' type='submit'>
<img src='../imagenes/add.png' width='15' height='15' align='top'>
 </BUTTON>


</TD>
</tr>
</table>
 </FORM>
	<?php echo $v3->obtener_js(); ?>
		
<BR><BR>
		<?php

		}

		?>

<div id="respuesta">

        <TABLE border="0" width="90%" cellpadding="0" cellspacing="0" align="center">
            <tr><td>
            <form id="search_form" action="" accept-charset="utf-8" method="post">
                <BR>
                <TABLE border="0" width="100%" cellpadding="0" cellspacing="0" align="center">
                    <TR>
                        <TD class="tituloBackground">Listado de Actividades</TD>
                    </TR>
                </TABLE><BR><BR>
                <table cellpadding="1" cellspacing="1" border="0"  id="example" style="width:100%" class="display">
                    <thead>
                        <tr class="texto_negro">
                            <th>N°</th>
                            <th>Actividad</th>
                            <th>Asignada a</th>
                            <th>Progreso</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>   
		             
                 <?php
	$y=100;
	$n=1;

	$i=pg_num_rows($consult);

		 if ($i>0){
				while ($row=pg_fetch_array($consult)){
				$y++;
				$resp=traerNombreUsuario($row['id_usuario']);
				$porcentaje=porcentaje_avance($row['id_actividad']);
					
				/*$cadena = traerNombreCadena($row['cadena']);
				$estado = traerNombreEstado($row['estado']);
				$municipio = traerNombreMunicipio($row['municipio']);
				$parroquia = traerNombreParroquia($row['parroquia']);
				$fecha_ini=obtenerFechaFormatoLatino($row['fecha_ini']);
				$fecha_fin=obtenerFechaFormatoLatino($row['fecha_fin']);
				$id_evento=$row['id_evento'];
				$estatus=$row['estatus'];*/
				/*echo '<pre>';
					print_r($row);
				echo '</pre>';*/
        //$cadena = traerNombreCadena($row['id_proyecto']);
				//$estado = traerNombreEstado($row['estado']);
				//$municipio = traerNombreMunicipio($row['municipio']);
				//$parroquia = traerNombreParroquia($row['parroquia']);

				//$area = traerNombreArea($row['id_area_cadena']);
				//$tipo_org = traerNombreTipo_org($row['id_tipo_org']);
				//$organizacion = traerNombreOrganizacion($row['id_org']);
				//$fig_juridica = traerNombreFigura_juridica($row['id_fig_juridica']);
				//$eje_comunal = traerNombreEje_comunal($row['id_eje_parroquial']);
			?>
  <tr class="gradeX">
    <td style="width:5%;" align="center" class="texto_campo"><?php echo $n++;?></td>
    <td style="width:28%;" align="left" class="texto_campo"><?php echo $row['tarea'];?></td>
    <td style="width:15%;" align="left" class="texto_campo"><?php echo $resp;?></td>
    
		
		<td style="width:20%;" class="texto_campo" align="center">
			<div style='border: 1px solid #87ABD8; width: 80px; margin-left: 10px; margin-top: 5px; padding: 1px; background: #fff; float: left;' > 
				<div id="<?php echo $y; ?>"  style='text-align: left; height: 10px; font-size: 11px; text-indent: -9000px; width: 5%; '>
				<?php if($porcentaje==""){ echo "0";}elseif ($porcentaje>100){ echo "100";}else{ echo $porcentaje;}?>% 
				</div>
			</div>
			&nbsp;&nbsp;<span id="percentage<?php echo $y; ?>" ></span>
			<script language='javascript'>initialize('<?php echo $y; ?>');</script>
			<div style='text-align: left;' id="progressbar<?php echo $y;?>"></div>			
			<script>
				$("#progressbar<?php echo $y;?>").progressbar({
				value:<?php if($porcentaje==""){ echo "0";}else{ echo $porcentaje;}?>	});
			</script>
		</td>
		
    <td style="width:15%;" align="center" class="texto_campo">
<p>
<img src='../imagenes/search.png' title='Ver Detalles' onClick="lanzarSubmenug('detalles_actividad.php?id_actividad=<?php echo $row['id_actividad']; ?>')" />&nbsp;&nbsp;
		<?php

		if ($perfil != 3) {

		?>
<img src='../imagenes/editar.png' title='Editar Actividad' onClick="lanzarSubmenup('editar_actividad.php?id_actividad=<?php echo $row['id_actividad']; ?>')"/>&nbsp;&nbsp;
		<?php

		}


		if (($perfil == 3) and ($row['id_usuario'] == $id_usuario_registra)) {
				if ($porcentaje<100){
		?>
<img src='../imagenes/editar_empleo.png' title='Agregar Avance' onClick="lanzarSubmenu('agregar_avance_actividad.php?id_actividad=<?php echo $row['id_actividad']; ?>')"/>&nbsp;&nbsp;
		<?php
				}
		}elseif (($perfil == 1) or ($perfil == 2)) {
				if ($porcentaje<100){
		?>
<img src='../imagenes/editar_empleo.png' title='Agregar Avance' onClick="lanzarSubmenu('agregar_avance_actividad.php?id_actividad=<?php echo $row['id_actividad']; ?>')"/>&nbsp;&nbsp;
		<?php
				}
		}

	
		if ($perfil != 3) {

		?>
<img src='../imagenes/eliminar.ico' title='Eliminar Actividad' onclick="elimCamp('<?php echo $row['id_actividad']; ?>');"/>
		<?php

		}

		?>
</p>
					
				</td>
				
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                  </table>
            </form>
            </td></tr>
        </TABLE>
	
</div>
<BR>
<!--<strong>Cantidad:</strong> <span id="span_cantidad"></span>-->
<!-- <BR>
	<TABLE id="tablaBoton" border="0" cellpadding="0" cellspacing="0" align="center" >
		<TR>
		<TD align="center"></TD>
		</FORM>
		<FORM method="POST" name="registro" action="editar_control_y_seguimiento2.php" >
		<INPUT type="hidden" name="id_registro" value="<?php //=$rs['id_proyecto'];?>">
		<TD ><INPUT id="guardar" name="guardar" type="submit" value="Guardar" class="botonPeq"></TD>
		</FORM>
		<FORM method="POST" name="registro" action="reporte.php" >
		<INPUT type="hidden" name="id_proyecto" value="<?php //=$rs['id_proyecto'];?>">
		<TD ><INPUT id="Imprimir" name="Imprimir" type="submit" value="Imprimir" class="botonPeq"></TD>
		</TR>
	</TABLE>-->

       
        <script src="../clases/chosen/chosen.jquery.js" type="text/javascript"></script>
        <script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
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
