    <?php
    session_start();

    include_once ("../funciones/funciones_session.php");
    comprobarSession($_SESSION['adminProy']);
    extract($_POST);
    extract($_GET);

    require_once("../funciones/queryProyectos.php");
    require_once("../funciones/funciones.php");
    require_once("../conexion/conexionpg.php");

    $id_user = $_SESSION['adminProy']['id_usuario'];

    $perfil =$_SESSION['adminProy']['id_perfil'];

     if ($perfil == 4){
        $rs=traerRegistrosProyecto1($id_user);
     }else {
        $rs=traerRegistrosProyecto();

     }
    if (!empty($rs)){
    	$registros_asignados = pg_num_rows($rs);
    }


    ?>

    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
    <html>
        <head>
            <script type="text/javascript" src="jquery.js"></script>
            <script type="text/javascript" src="busquedas.js"></script>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <LINK REL="SHORTCUT ICON" HREF="../imagenes/log32t.png">
            <link rel="stylesheet" href="../css/css.css" type="text/css" />
            <!--    <link rel="stylesheet" href="../css/css1.css" type="text/css" />-->
            <!-- lytebox v3.22 -->
            <link href="mod_usuarios/lytebox_v3.22/lytebox.css" rel="stylesheet" type="text/css"  media="screen"/>
            <script type="text/javascript" language="javascript" src="mod_usuarios/lytebox_v3.22/lytebox.js"></script>
        
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
                            "sLengthMenu": '<span class="texto_negro_no_size">Mostrar _MENU_ Proyectos por P&aacute;gina</span>',
                            "sSearch": '<span class="texto_negro_no_size">Filtrar Ordenes:</span>',
                            "sEmptyTable": '<span class="texto_negro">No hay datos disponibles</span>',
                            "sZeroRecords": '<span class="texto_negro">No se han encontrado registros coincidentes</span>',
                            "sInfo": '<span class="texto_negro">Mostrando del _START_ al _END_ de _TOTAL_ Proyecto(s)</span>',
                            "sInfoEmpty": '<span class="texto_negro">Mostrando del 0 al 0 de 0 Proyectos</span>',
                            "sInfoFiltered": '<span class="texto_negro">(filtrado de _MAX_ Proyectos)</span>',
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
        </head>
        <body>
            <TABLE border="0" width="90%" cellpadding="0" cellspacing="0" align="center">
                <tr><td>
                <form id="search_form" action="" accept-charset="utf-8" method="post">
                    <BR>
                    <TABLE border="0" width="100%" cellpadding="0" cellspacing="0" align="center">
                        <TR>
                            <TD class="tituloBackground">CONSULTA DE PROYECTOS</TD>
                        </TR>
                    </TABLE><BR>
                    <table cellpadding="1" cellspacing="1" border="0"  id="example" style="width:100%" class="display">
                        <thead>
                            <tr class="texto_negro">
                                <th class="tituloForm">N°</th>
                                <th class="tituloForm">Nombre del Proyecto</th>
                                <th class="tituloForm">Fecha de Registro</th>
                                <th class="tituloForm">Cadena</th>
                                <th class="tituloForm">Parroquia</th>
                                <th class="tituloForm">Detalle</th>
                                <th class="tituloForm">Imprimir</th> 
                            </tr>
                        </thead>
                        <tbody>                
                     <?php if ($registros_asignados>0){
    				while ($row=pg_fetch_array($rs)){

    				$cadena = traerNombreCadena($row['id_proyecto']);
    				
    				$parroquia = traerNombreParroquia($row['parroquia']);

                    
    			?>
    <tr class="gradeX">
        <td style="width:5%;" align="center" class="texto_campo"><?php echo $row['id_proyecto'];?></td>
        <td style="width:20%;" align="left" class="texto_campo"><?php echo $row['nombre_proyecto'];?></td>
        <td style="width:10%;" align="center" class="texto_campo"><?php echo $row['fecha_registro_proyecto'];?></td>
        <td style="width:30%;" align="left" class="texto_campo"><?php echo $cadena;?></td>
        <td style="width:10%;" align="center" class="texto_campo"><?php echo $parroquia;?></td>
        <td style="width:10%;" align="center" class="texto_campo">
            <a class="link" href="ver_detalles_proyecto.php?id_proyecto=<?php echo $row['id_proyecto'];?>">
            <img src="../imagenes/event_info.png" width="24" height="24" title="Ver Detalles">
            </a>
        </td>
        <td style="width:15%;" align="center" class="texto_campo">
            <a class="link" href="reporte.php?id_proyecto=<?php echo $row['id_proyecto'];?>">
            <img src="../imagenes/icono-pdf.gif" width="24" height="24" title="Reporte Completo">
            </a>&nbsp;
            <a class="link" href="reporte_ficha.php?id_proyecto=<?php echo $row['id_proyecto'];?>">
            <img src="../imagenes/full_page.png" width="24" height="24" title="Ficha Tecnica">
            </a>
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
        </body>
    </html>

    <!--actualizar pagina cada 15 seg-->
    <!--<meta http-equiv="Refresh" content="15;URL=principalSeguimiento.php">-->
