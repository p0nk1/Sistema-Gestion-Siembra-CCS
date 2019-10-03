<?php
//error_reporting(0);
session_start();

extract($_POST);
extract($_GET);

include_once ("../funciones/funciones_session.php");
include("../conexion/conexionpg.php");
require_once("../funciones/queryUsuarios.php");
include_once ("../funciones/queryProyectos.php");
require_once("../funciones/funciones.php");

$rs = buscar_usuarios_con_proyecto();

if (!empty($rs)) {
    $row_usuario = pg_num_rows($rs);
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
                        "sLengthMenu": '<span class="texto_negro_no_size">Mostrar _MENU_ Usuarios por P&aacute;gina</span>',
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
                    "aaSorting": [[ 0, "asc"]],
                    "aLengthMenu": [[ 10, 25, 50, 100, -1 ], [ 10, 25, 50, 100, 'Todo' ]],
                });
            });
        </script>    
    </head>
    <body>
        
        <TABLE border="0" width="80%" cellpadding="0" cellspacing="0" align="center">
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
                        <tr class="texto_negro">
                            <th>ID</th>
                            <th>C&eacute;dula</th>
                            <th>Usuario</th>
                            <th>ID Proyecto</th>
                            <th>Nombre Proyecto</th>
<!--                             <th>Correo</th>
                            <th>Perfil</th> -->
                            <th>Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <tbody>                
                        <?php
                        

                        

                        if ($row_usuario > 0) {
                            while ($row = pg_fetch_array($rs)) {
                                /* echo '<pre>';
                                  print_r($row);
                                  echo '</pre>';*/
                                //traer datos del usuario
                            $id_usuario = $row['usuarioid'];
                            $cedula = $row['cedula'];
                            $nombre_usuario = $row['nombreu'];
                            $correo_electronico = $row['idproyecto'];
                            $telefono_1 = $row['nombreproyecto'];

				
                        ?>
                <tr class="gradeX">
                    <td style="width:6%;" align="center" class="texto_negro"><?php echo $id_usuario; ?></td>
                    <td style="width:11%;" align="right" class="texto_campo"><?php echo $cedula; ?></td>
                    <td style="width:30%;" align="left" class="texto_campo"><?php echo $nombre_usuario; ?></td>
                    <td style="width:11%;" align="center" class="texto_campo"><?php echo $correo_electronico; ?></td>
                    <td style="width:11%;" align="center" class="texto_campo"><?php echo $telefono_1; ?></td>

                    <td style="width:10%;" align="center" class="texto_campo">
                      <a class="link" href="editar_usuario.php?id_usuario=<?php echo $row['id_usuario'];?>">
                        <img src="../imagenes/editSocio.png" width="24" height="24" title="Editar usuario">
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
