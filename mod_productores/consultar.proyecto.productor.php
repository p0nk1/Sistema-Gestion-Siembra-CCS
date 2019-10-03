<?php
//error_reporting(0);
session_start();

extract($_POST);
extract($_GET);

include_once ("../funciones/funciones_session.php");
include_once("../conexion/conexionpg.php");
require_once("../funciones/queryUsuarios.php");
include_once ("../funciones/queryProyectos.php");
require_once("../funciones/funciones.php");

$rs = ReporteProyectoProductores();


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
                        "sLengthMenu": '<span class="texto_negro_no_size">Mostrar _MENU_ Productores por P&aacute;gina</span>',
                        "sSearch": '<span class="texto_negro_no_size">Filtrar Usuarios:</span>',
                        "sEmptyTable": '<span class="texto_negro">No hay datos disponibles</span>',
                        "sZeroRecords": '<span class="texto_negro">No se han encontrado registros coincidentes</span>',
                        "sInfo": '<span class="texto_negro">Mostrando del _START_ al _END_ de _TOTAL_ Usuarios</span>',
                        "sInfoEmpty": '<span class="texto_negro">Mostrando del 0 al 0 de 0 Usuarios</span>',
                        "sInfoFiltered": '<span class="texto_negro">(filtrado de _MAX_ Usuarios)</span>',
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sPrevious": "Anterior",
                            "sNext":     "Siguiente",
                            "sLast":     "Ultimo",
                        },
                    },
                    "aaSorting": [[ 10, "asc"]],
                    "aLengthMenu": [[ 10, 25, 50, 100, -1 ], [ 10, 25, 50, 100, 'Todo' ]],
                });
            });
        </script>    
    </head>
    <body>
        
        <TABLE id="tablaTitulo" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
            <tr><td>
            <form id="search_form" action="" accept-charset="utf-8" method="post">
                <BR>
                <TABLE border="0" width="100%" cellpadding="0" cellspacing="0" align="center">
                    <TR>
                        <TD class="tituloBackground">LISTADO DE USUARIO</TD>
                    </TR>
                </TABLE><BR>
                <table cellpadding="1" cellspacing="1" border="0"  id="example" style="width:100%" class="display">
                    <thead>
                        <tr style="width:100%" class="titulo_tabla">
                            <th class="tituloForm" width="11%">Cédula</th>
                            <th class="tituloForm" width="11%">Nombre Apellido</th>
                            <th class="tituloForm" width="11%">Correo</th>
                            <th class="tituloForm" width="11%">Telefono1</th>
                            <th class="tituloForm" width="11%">Nombre Proyecto</th>
                            <th class="tituloForm" width="11%">Estado</th>
                            <th class="tituloForm" width="11%">Minicipio</th>
                            <th class="tituloForm" width="11%">Parroquia</th>
                        </tr>
                    </thead>
                    <tbody>                
                       <?php 
                            if( $rs ){
                                    // Obtener el número de filas:
                                 if( pg_num_rows($rs) > 0 )
                                {
                                    // Recorrer el resource y mostrar los datos:
                                     while( $obj = pg_fetch_array($rs) ){
                        ?>
                <tr class="gradeX">
                    
                            <td style="width:20%;" align="left" class="textoCampo"><?php echo $obj['cedula']; ?></td>
                            <td style="width:30%;" align="center" class="textoCampo"><?php echo $obj['nombre_apellido']; ?></td>
                            <td style="width:15%;" align="center" class="textoCampo"><?php echo $obj['correo_electronico']; ?></td>
                            <td style="width:15%;" align="center" class="textoCampo"><?php echo $obj['telefono_1']; ?></td>
                            <td style="width:15%;" align="center" class="textoCampo"><?php echo $obj['nombre_proyecto']; ?></td>
                            <td style="width:15%;" align="center" class="textoCampo"><?php echo $obj['estado']; ?></td>
                            <td style="width:15%;" align="center" class="textoCampo"><?php echo $obj['municipio']; ?></td>
                            <td style="width:15%;" align="center" class="textoCampo"><?php echo $obj['parroquia']; ?></td>
                </tr>
                    </tbody>
                        <?php 
                                    }
                                }
                                    else
                                        echo "<p>No se encontraron personas</p>";
                            }
                                

                        ?>
                </table>
            </form>
            </td></tr>
        </TABLE>
    </body>
</html>

<!--actualizar pagina cada 15 seg-->
<!--<meta http-equiv="Refresh" content="15;URL=principalSeguimiento.php">-->
