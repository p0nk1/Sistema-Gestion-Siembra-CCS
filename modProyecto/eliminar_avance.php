<?php
error_reporting(0);
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


//echo $id_proyecto;

//$fecha_registro = date('Y-m-d H:i:s');

$result=eliminarAvance(dar_formato($id_seguimiento),dar_formato($id_usuario_registra),dar_formato(0));
			
			if (!empty($result))
			{
					//echo "<script>alert('Registro Eliminado');</script>";
					print "<script>window.opener.location.reload();</script>";
					
			}//FIN eliminar



$row = traerDetalles_actividad($id_actividad);

	$porcentaje=porcentaje_avance($id_actividad);

	$resp=traerNombreUsuario($row['id_usuario']);
?>

<HTML>
	<HEAD>
		<TITLE></TITLE>
		<link rel="stylesheet" type="text/css" href="../css/css.css">
<!--***************************************-->
 <script language="javascript" type="text/javascript" src="script.js"></script>
 <script src="progressbar.js" type="text/javascript"></script>
<!--***************************************-->

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
                        "sLengthMenu": '<span class="texto_negro_no_size">Mostrar _MENU_ Avances por P&aacute;gina</span>',
                        "sSearch": '<span class="texto_negro_no_size">Filtrar Ordenes:</span>',
                        "sEmptyTable": '<span class="texto_negro">No hay datos disponibles</span>',
                        "sZeroRecords": '<span class="texto_negro">No se han encontrado registros coincidentes</span>',
                        "sInfo": '<span class="texto_negro">Mostrando del _START_ al _END_ de _TOTAL_ Avance(s)</span>',
                        "sInfoEmpty": '<span class="texto_negro">Mostrando del 0 al 0 de 0 Avances</span>',
                        "sInfoFiltered": '<span class="texto_negro">(filtrado de _MAX_ Avances)</span>',
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

<!--***************************************-->
<script type="text/javascript">
			

			$(document).ready(function() {
				$("#pb1").progressBar();
				
			});

			
</script>
<script type="text/javascript" src="jquery.progressbar.min.js"></script>
	<script language="JavaScript">

		function lanzarSubmenup(ventana){
			ventana_secundaria = window.open(ventana,"_blank","width=800,height=500,scrollbars=no")
			ventana_secundaria.moveTo(100,100);
		}
	</script>
	</HEAD>
	<BODY>
	<BR>
	<TABLE border="0" width="90%" cellpadding="0" cellspacing="0" align="center">
		<TR><TD class="tituloBackground"> DETALLES ACTIVIDAD </TD></TR>
	</TABLE>
	<BR>
<INPUT type="hidden" name="id_actividad" id="id_actividad" value="<?php echo $row['id_actividad'];?>">
<TABLE border="0" width="60%" cellpadding="2" cellspacing="1" align="center" bgcolor="#D6D6D6">
<tbody>
<tr>
<td class="subtituloBackground" bgcolor="White" width="5%">Actividad:</td>
<td class="tituloTablas" bgcolor="White"><span style="font-weight: lighter;"><?php echo $row['tarea'];?></span></td>
</tr>
<tr>
<td class="subtituloBackground" bgcolor="White">Progreso:</td>
<td bgcolor="White">
<span class="progressBar" id="pb1"><?php if($porcentaje==""){ echo "0%";}else{ echo $porcentaje."%";} ?></span>
</td>
</tr>
<tr>
<td class="subtituloBackground" valign="bottom" bgcolor="White">Fecha de inicio:</td>
<td class="tituloTablas" bgcolor="White"><span style="font-weight: lighter;"><?php echo $row['fecha_inicio'];?></span></td>
</tr>
<tr>
<td class="subtituloBackground" valign="bottom" bgcolor="White">Fecha de culminaci&oacute;n:</td>
<td class="tituloTablas" bgcolor="White"><span style="font-weight: lighter;"><?php echo $row['fecha_fin'];?></span></td>
</tr>
<tr>
<td class="subtituloBackground" bgcolor="White">Asignada a:</td>
<td class="tituloTablas" bgcolor="White"><span style="font-weight: lighter;"><?php echo $resp;?></span></td>
</tr>
<tr>
<td colspan="2" align="center" bgcolor="White"><br><input name="cerrar" value="Cerrar" style="width: 100px;" onclick="window.close();" type="button" class="botonPeq"></td>
</tr>
</tbody></table>

    
        <BR>
    

        <TABLE border="0" width="90%" cellpadding="0" cellspacing="0" align="center">
            <tr><td>
            <form id="search_form" action="" accept-charset="utf-8" method="post">
                <BR>
                <TABLE border="0" width="100%" cellpadding="0" cellspacing="0" align="center">
                    	<TR>
                    <TD class="tituloBackground">  AVANCES </TD>
                    <td width="15%" bgcolor="White" class="tituloBackground" align="right">AGREGAR AVANCE</td>
                    <td bgcolor="White" width="5%" align="center" class="tituloBackground">
                        <a href="agregar_avance_actividad.php?id_actividad=<?php echo $row['id_actividad']?>&volver=1"><img src="../imagenes/editar_empleo.png" title="Ir a Consultar" /></a>
                    </td>
                </TR>
                </TABLE><BR><BR>

<div id="respuesta">

                <table cellpadding="1" cellspacing="1" border="0"  id="example" style="width:100%" class="display">
                    <thead>
                        <tr class="texto_negro">
                            <th>N°</th>
                            <th>Avance</th>
                            <th>Dificultad</th>
                            <th>Fecha</th>
                            <th>Ponderaci&oacute;n</th>
			    <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>   
		             
                 <?php
	$y=100;
	$n=1;
	$consult=traerLista_avances($id_actividad);
	$i=pg_num_rows($consult);

		 if ($i>0){
				while ($row=pg_fetch_array($consult)){
				$y++;
				//$resp=traerNombreUsuario($row['id_usuario']);
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
                                    <td style="width:2%;" align="center" class="texto_campo"><?php echo $n++;?></td>
                                    <td style="width:30%;" align="left" class="texto_campo"><?php echo $row['avance_actividad'];?></td>
                                    <td style="width:30%;" align="left" class="texto_campo"><?php echo $row['dificultad_actividad'];?></td>
                                    <td style="width:2%;" class="texto_campo">
					<?php echo $row['fecha_avance'];?>
					</td>
                                    <td style="width:20%;" class="texto_campo" align="center">
					<!--<div style='border: 1px solid #87ABD8; width: 100px; margin-left: 10px; margin-top: 5px; padding: 1px; background: #fff; float: left;'> 
<div id="sample<?php //echo $y;?>" style='height: 10px; font-size: 11px; text-indent: -9000px; background-color: rgb(135, 171, 216); width: 5%;'>-->
<?php //if($row['porcentaje_avance_actividad']==""){ echo "0%";}else{ echo $row['porcentaje_avance_actividad']."%";} ?><!--</div>
</div>

&nbsp;&nbsp;<span id="percentagesample<?php // echo $y;?>"></span>
<script language='javascript'>initialize("sample<?php //echo $y;?>");</script>-->	
				</td>
				 <td style="width:10%;" align="center" class="texto_campo">
							<p><a href="editar_avance_actividad.php?id_actividad=<?php echo $row['id_actividad']?>&id_seguimiento=<?php echo $row['id_seguimiento']?>"><img src='../imagenes/editar.png' title="Editar Avance" /></a>&nbsp;&nbsp;
<img src='../imagenes/eliminar.ico' title="Eliminar Avance" onclick="elimAvance('<?php echo $row['id_seguimiento']?>');"/></p>
					
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
		<INPUT type="hidden" name="id_registro" value="<?php //echo $rs['id_proyecto'];?>">
		<TD ><INPUT id="guardar" name="guardar" type="submit" value="Guardar" class="botonPeq"></TD>
		</FORM>
		<FORM method="POST" name="registro" action="reporte.php" >
		<INPUT type="hidden" name="id_proyecto" value="<?php //echo $rs['id_proyecto'];?>">
		<TD ><INPUT id="Imprimir" name="Imprimir" type="submit" value="Imprimir" class="botonPeq"></TD>
		</TR>
	</TABLE>-->

        </FORM>
	<?php /*echo $v3->obtener_js();*/ ?>
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



