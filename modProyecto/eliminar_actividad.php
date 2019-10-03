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


//echo $id_proyecto;

 $fecha_registro = date('Y-m-d H:i:s');

$result=eliminarActividad(dar_formato($id_actividad),dar_formato($id_usuario_registra), dar_formato($fecha_registro), dar_formato(5), 
			dar_formato($id_usuario_registra), dar_formato(0));
			
			if (!empty($result))
			{

$result=eliminarAvance2(dar_formato($id_actividad),dar_formato($id_usuario_registra),dar_formato(0));
					//echo "<script>alert('Registro Eliminado');</script>";
					
			}//FIN eliminar




?>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../css/css.css">
	
        <link rel="stylesheet" href="../clases/chosen/chosen.css" />
	
	<!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>-->
	<!--<script type='text/javascript' src='../js/google.js' ></script>-->
       <!-- <script type="text/javascript" src="../clases/jquery/jquery-1.6.4.min.js"></script>-->
        <script type="text/javascript" src="../clases/jquery/jquery.jCombo.min.js"></script>
        <script type="text/javascript" src="../clases/jquery/jquery.textareaCounter.plugin.js"></script>
        <script type="text/javascript" src="../js/general.js"></script>
	


	<script type="text/javascript" src="../js/src/js/jscal2.js"></script>
        <script type="text/javascript" src="../js/src/js/lang/es.js"></script>
        <link rel="stylesheet" type="text/css" href="../js/src/css/jscal22.css" />
        <link rel="stylesheet" type="text/css" href="../js/src/css/border-radius.css" />
        <link rel="stylesheet" type="text/css" href="../js/src/css/steel/steel.css" />


        

<!--***************************************-->
 <script language="javascript" type="text/javascript" src="script.js"></script>
 <script src="progressbar.js" type="text/javascript"></script>
<!--***************************************-->


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
	$consult=traerLista_actividades($id_proyecto);
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
<!--<div style='border: 1px solid #87ABD8; width: 80px; margin-left: 10px; margin-top: 5px; padding: 1px; background: #fff; float: left;' > 
<div id="<?php //echo $y; ?>"  style='height: 10px; font-size: 11px; text-indent: -9000px; width: 5%; '>--><?php //if($porcentaje==""){ echo "0";}else{ echo $porcentaje;}?>% 
<!--</div>
</div>
&nbsp;&nbsp;<span id="percentage<?php //echo $y; ?>" ></span>
<script language='javascript'>initialize('<?php //echo $y; ?>');</script>-->
		</td>
	  
		<td style="width:15%;" align="center" class="texto_campo">
			<p><img src='../imagenes/search.png' title='Ver Detalles' onClick="lanzarSubmenug('detalles_actividad.php?id_actividad=<?php echo $row['id_actividad'];?>')" />&nbsp;&nbsp;<img src='../imagenes/editar.png' title='Editar Actividad' onClick="lanzarSubmenup('editar_actividad.php?id_actividad=<?php echo $row['id_actividad'];?>')"/>&nbsp;&nbsp;
			<img src='../imagenes/editar_empleo.png' title='Agregar Avance' onClick="lanzarSubmenu('agregar_avance_actividad.php?id_actividad=<?php echo $row['id_actividad']; ?>')"/>&nbsp;&nbsp;
			<img src='../imagenes/eliminar.ico' title='Eliminar Actividad' onclick="elimCamp('<?php echo $row['id_actividad']; ?>');"/></p>
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
