<?php 
session_start();

extract($_POST);
extract($_GET);

include_once ("../funciones/funciones_session.php");
include_once("../conexion/conexionpg.php");
require_once("../funciones/queryUsuarios.php");
include_once ("../funciones/queryProyectos.php");
require_once("../funciones/funciones.php");

// $rs = ReporteProyectoProductores();
// $rs = pg_query("SELECT a.*, b.*, c.*, d.*  FROM v_proyecto as a left JOIN v_productores_nuevo as b 
//                     ON b.id_proyecto=a.id_proyecto left JOIN v_produccion_proyecto as c ON c.id_proyecto=a.id_proyecto
//                     left JOIN v_ubicacion_proyecto_georeferencial as d ON d.id_proyecto=a.id_proyecto 
//                     WHERE a.estatus_tabla_proyecto='1' ORDER BY fecha_registro_proyecto ASC");

// echo $rs;

$rs = pg_query("SELECT a.*, b.*, c.*, d.*, e.texto as estado, f.texto as municipio, g.texto as parroquia 
                FROM v_proyecto as a 
                left JOIN v_productores_nuevo as b ON b.id_proyecto=a.id_proyecto 
                left JOIN v_produccion_proyecto as c ON c.id_proyecto=a.id_proyecto 
                left JOIN v_ubicacion_proyecto_georeferencial as d ON d.id_proyecto=a.id_proyecto 
                left JOIN e_estado as e ON e.id=d.estado 
                left JOIN e_municipio as f ON f.id=d.municipio 
                left JOIN e_municipio as g ON g.id=d.parroquia 
                WHERE a.estatus_tabla_proyecto='1' 
                ORDER BY a.id_proyecto ASC");


?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <link rel="stylesheet" href="">
    </head>
    <body>
                                      
        <table border="0" width="80%" cellpadding="0" cellspacing="0" align="center">
            <tr><td>
            <form id="search_form" action="" accept-charset="utf-8" method="post">
                <br>
                <table border="0" width="100%"  cellpadding="0" cellspacing="0" align="center">
                    <tr>
                        <td align="center" class="tituloBackground">LISTADO DE USUARIO</td>
                    </tr>
                </table><br>
                <table cellpadding="1" cellspacing="1" border="1"  id="example" style="width:100%" class="display">
                    <thead>
                        <tr class="texto_negro">
                            <th>Cédula</th>
                            <th>Nombre Apellido</th>
                            <th>Correo</th>
                            <th>Telefono1</th>
                            <th>Nombre Proyecto</th>
                            <th>Estado</th>
                            <th>Minicipio</th>
                            <th>Parroquia</th>
                        </tr>
                    </thead>
                       <?php 

                            if( $rs ){
                                // echo pg_num_rows($rs);
                                    // Obtener el número de filas:
                                 if( pg_num_rows($rs) > 0 )
                                {
                                    // Recorrer el resource y mostrar los datos:
                                     while( $obj = pg_fetch_array($rs) ){

                                         // echo $obj['id_proyecto']." - ".$obj['nombre_proyecto']." - ".$obj['cedula']." - ".$obj['nombre_apellido']." - ".$obj['correo_electronico']." - ".$obj['telefono_1']." - ".$obj['telefono2']." - ".$obj['estado']." - ".$obj['municipio']." - ".$obj['parroquia']." - ".$obj['circuito']."<br />";
                        ?>       
                    <tbody>

                        <tr >
                            <td  align="center" class="texto_campo"><?php echo $obj['cedula']; ?></td>
                            <td  align="center" class="texto_campo"><?php echo $obj['nombre_apellido']; ?></td>
                            <td  align="center" class="texto_campo"><?php echo $obj['correo_electronico']; ?></td>
                            <td  align="center" class="texto_campo"><?php echo $obj['telefono_1']; ?></td>
                            <td  align="center" class="texto_campo"><?php echo $obj['nombre_proyecto']; ?></td>
                            <td  align="center" class="texto_campo"><?php echo $obj['estado']; ?></td>
                            <td  align="center" class="texto_campo"><?php echo $obj['municipio']; ?></td>
                            <td  align="center" class="texto_campo"><?php echo $obj['parroquia']; ?></td>
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
        </table>
    </body>
</html>
