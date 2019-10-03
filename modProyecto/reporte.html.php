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


echo $rs['id_proyecto'];
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
          //echo $financiamiento;
         $foto = traerFoto($rs['id_proyecto']);
         $n_adicional= contar_financiamiento_adicional($rs['id_proyecto']);
         $fecha_registro = traerRegistrosProyecto($rs['fecha_registro_proyecto']);
        


?>

       
        <link rel="stylesheet" type="text/css" href="../css/css.css">
<page>  
  <page_footer>
    <table style="width: 100%; border: solid 0px black;">
      <tr>
       <!-- <td style="text-align: right; width: 100%">P&aacute;gina [[page_cu]]/[[page_nb]]</td>-->
      </tr>
    </table>
  </page_footer>
</page>
<page>
  <TABLE align="center"  style="width:550px;" cellpadding="0" cellspacing="1" border="0">
    <TR valign="center">
      <TD bgcolor="White" align="center" style="width:15px;"><img src="../imagenes/imgindex/bann_alcaldia.gif" style="width:250px;"></TD>
      <TD bgcolor="White" style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:11px;font-weight:bold;color:black;width:400px;" align="center" valign="middle">
        SISTEMA PARA EL REGISTRO Y CONTROL DE PROYECTOS SOCIOPRODUCTIVOS
      </TD>
      <TD bgcolor="White" align="center" style="width:40px;"><img src="../imagenes/imgindex/logo_peq_alcaldia.png" style="width:50px;"></TD>
    </TR>
  </TABLE>
</page>
<page>
  <hr>
  <table style="width: 100%; border: solid 0px black;">
    <tr>
      <td style="text-align: right; width: 100%"><?=date('d/m/y'); ?></td>
    </tr>
  </table>
</page>
<page>
  <TABLE id="tablaTitulo" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
    <TR><TD style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:11px;font-weight:bold;color:#9F0808;width:700px;" align="center" valign="middle"> REPORTE PROYECTO </TD></TR>
  </TABLE>
</page>

<page>  
  <br>

<TABLE border="0" cellpadding="2" cellspacing="1" align="center" style="width:550px;" bgcolor="#D6D6D6">
  <TR>
      <TD class="subtituloBackground" colspan="2"> Datos Basicos del Proyecto </TD>
  </TR>
  <TR>
      <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Nombre del Proyecto </TD>
      <TD bgcolor="White">
        <div style="text-align:justify" class="textoParrafo"><?=$rs['nombre_proyecto'];?></div>
      </TD>                    
  </TR>
  <TR>
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Descripción del Proyecto </TD>
    <TD bgcolor="White">
      <div style="text-align:justify" class="textoParrafo"><?=$rs['descripcion_proyecto'];?></div>
    </TD>                    
  </TR>
  <TR>
  <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Area de Construcción (m²) </TD>
  <TD bgcolor="White">
    <div style="text-align:justify" class="textoParrafo"><?=$rs['area_construccion'];?></div>
  </TD>                    
  </TR>
  <TR>
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Area de Terreno (m²) </TD>
    <TD bgcolor="White">
      <div style="text-align:justify" class="textoParrafo"><?=$rs['area_terreno'];?></div>
    </TD>                    
  </TR>
  <TR>
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Tiempo de Instalación </TD>
    <TD bgcolor="White">
      <div style="text-align:justify" class="textoParrafo"><?=$rs['tiempo_instalacion'];?></div>
    </TD>                    
  </TR>
  <TR>
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Beneficiarios </TD>
    <TD bgcolor="White">
      <div style="text-align:justify" class="textoParrafo"><?=$rs['beneficiarios'];?></div>
    </TD>                    
  </TR>
  <TR>
    <TD class="tituloTablas" bgcolor="White" style="width:30%">&nbsp;&nbsp;&nbsp; Fecha de Creacion</TD>
    <TD bgcolor="White">
      <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?=$rs['fecha_registro_proyecto'];?></div>
    </TD> 
  </TR>
</TABLE>
</page>
<page>
<br>

<TABLE border="0" cellpadding="2" cellspacing="1" align="center" style="width:550px;" bgcolor="#D6D6D6">
  <TR>
    <TD class="subtituloBackground" colspan="2"> Cadena / Area </TD>
  </TR>
  <TR>
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Cadena </TD>
    <TD bgcolor="White">
      <div style="text-align:justify" class="textoParrafo"><?=$cadena;?></div>
    </TD>                    
  </TR>
  <TR>
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; &Aacute;rea </TD>
    <TD bgcolor="White">
      <div style="text-align:justify" class="textoParrafo">
        <?php 
    
          for($i=0;$i<count($area);$i++){

            echo $area[$i]. ";";
          }
        ?>
      </div>
    </TD>                    
  </TR>
</TABLE>
</page>
<page>
<br>

<TABLE border="0" cellpadding="2" cellspacing="1" align="center" style="width:550px;" bgcolor="#D6D6D6">
  <TR>
    <TD class="subtituloBackground" colspan="2"> Organizaciones Comunitarias </TD>
  </TR>
  <TR>
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Comuna </TD>
    <TD bgcolor="White">
      <div style="text-align:justify" class="textoParrafo">
        <?php 
    
          for($i=0;$i<count($comuna);$i++){

            echo $comuna[$i]. ";";
          }
        ?>
      </div>
    </TD>                    
  </TR>
     <TR>
      <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Consejo Comunal </TD>
      <TD bgcolor="White">
        <div style="text-align:justify" class="textoParrafo">
          <?php 
    
            for($i=0;$i<count($consejo);$i++){

              echo $consejo[$i]. ";";
            }
          ?>
        </div>
      </TD>                    
    </TR>
    <TR>
      <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Movimientos </TD>
      <TD bgcolor="White">
        <div style="text-align:justify" class="textoParrafo">
          <?php 
    
            for($i=0;$i<count($movimiento);$i++){

              echo $movimiento[$i]. ";";
            }
          ?>
        </div>
      </TD>                    
    </TR>
    <TR>
      <TD class="tituloTablas" bgcolor="White" style="width:180px;"><!-- &nbsp; -->&nbsp;&nbsp; Comite de Economia<br>&nbsp;&nbsp;&nbsp;&nbsp;Comunal </TD>
      <TD bgcolor="White">
         <div style="text-align:justify" class="textoParrafo"><?=$rs['comite_eco_comunal'];?></div>
      </TD>                    
    </TR>
</TABLE>
</page>
<page>
<br>

<TABLE border="0" cellpadding="2" cellspacing="1" align="center" style="width:550px;" bgcolor="#D6D6D6">
  <TR>
    <TD class="subtituloBackground" colspan="2"> Figura Juridica </TD>
  </TR>
  <TR>
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Figura Juridica </TD>
    <TD bgcolor="White">
      <div style="text-align:justify" class="textoParrafo"><?=$fig_juridica?></div>
    </TD>                    
  </TR>
  <TR>
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Figura Registrada </TD>
    <TD bgcolor="White">
       <div style="text-align:justify" class="textoParrafo"><?=$rs['figura_jur_reg'];?></div>
    </TD>                    
  </TR>
  <TR>
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Titularidad </TD>
    <TD bgcolor="White">
       <div style="text-align:justify" class="textoParrafo"><?=$rs['titularidad'];?></div>
    </TD>                    
  </TR>
</TABLE>

<br>
</page>
<page>
<TABLE border="0" cellpadding="2" cellspacing="1" align="center" style="width:550px;" bgcolor="#D6D6D6">
  <TR>
    <TD class="subtituloBackground" colspan="4"> Financiamiento </TD>
  </TR>
  <TR>
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Monto Solicitado </TD>
    <TD bgcolor="White" style="width:180px;">
      <div style="text-align:justify" class="textoParrafo"><?php echo $financiamiento[1]['fin']['monto']; ?> Bs.</div>
    </TD>   
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Estatus de Finaciamiento </TD>
    <TD bgcolor="White" style="width:178px;">
      <div style="text-align:justify" class="textoParrafo" >
        <?php echo traerNombreEstatusFin($financiamiento[1]['fin']['estatus']); ?>
      </div>
    </TD>                    
  </TR>
  <TR>
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Ente de Financiamiento </TD>
    <TD bgcolor="White" style="width:180px;">
      <div style="text-align:justify" class="textoParrafo"><?php echo traerNombreEnteFin($financiamiento[1]['fin']['ente']); ?></div>
    </TD>  
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Monto Aprobado </TD>
    <TD bgcolor="White" style="width:178px;">
      <div style="text-align:justify" class="textoParrafo">
        <?php echo $financiamiento[1]['fin']['monto_aprobado']; ?> Bs.
      </div>
    </TD>                    
  </TR>
  <TR>
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Año de Financiamiento </TD>
    <TD bgcolor="White" style="width:180px;">
      <div style="text-align:justify" class="textoParrafo"><?php echo $financiamiento[1]['fin']['anio_financiamiento']; ?></div>
    </TD>  
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Monto Transferido a la Fecha </TD>
    <TD bgcolor="White" style="width:178px;">
      <div style="text-align:justify" class="textoParrafo">
        <?php echo $financiamiento[1]['fin']['monto_transferido']; ?> Bs.
      </div>
    </TD>                    
  </TR>
  <TR>
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Monto Pendiente por<br>&nbsp;&nbsp;&nbsp; Transferir </TD>
    <TD bgcolor="White" style="width:180px;">
      <div style="text-align:justify" class="textoParrafo"><?php echo $financiamiento[1]['fin']['monto_pendiente']; ?> Bs.</div>
    </TD>                
  </TR>
</TABLE>
</page>
<page>
<br>

<?php 

  if ($financiamiento[2]['fin']['tipo_financiamiento']!=""){ 



  $h=2;
  for ($iw=1; $iw<=$n_adicional; $iw++){
    $indice=$h++;

?>
<TABLE border="0" cellpadding="2" cellspacing="1" align="center" style="width:550px;" bgcolor="#D6D6D6">
  <TR>
      <TD class="subtituloBackground" colspan="4"> Financiamiento Adicional <?php echo $iw;?> </TD>
  </TR>
  <TR>
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Monto Solicitado </TD>
    <TD bgcolor="White" style="width:180px;">
       <div style="text-align:justify" class="textoParrafo"><?php echo $financiamiento[$indice]['fin']['monto']; ?> Bs.</div>
    </TD>   
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Estatus de Finaciamiento </TD>
    <TD bgcolor="White" style="width:178px;">
      <div style="text-align:justify" class="textoParrafo" >
      <?php echo traerNombreEstatusFin($financiamiento[$indice]['fin']['estatus']); ?>
      </div>
    </TD>                    
  </TR>
    <TR>
      <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Ente de Financiamiento </TD>
      <TD bgcolor="White" style="width:180px;">
        <div style="text-align:justify" class="textoParrafo"><?php echo traerNombreEnteFin($financiamiento[$indice]['fin']['ente']); ?></div>
      </TD>  
      <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Monto Aprobado </TD>
      <TD bgcolor="White" style="width:178px;">
        <div style="text-align:justify" class="textoParrafo">
          <?php echo $financiamiento[$indice]['fin']['monto_aprobado']; ?> Bs.
        </div>
      </TD>                    
    </TR>
    <TR>
      <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Año de Financiamiento </TD>
      <TD bgcolor="White" style="width:180px;">
        <div style="text-align:justify" class="textoParrafo"><?php echo $financiamiento[$indice]['fin']['anio_financiamiento']; ?></div>
      </TD>  
      <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Monto Transferido a la Fecha </TD>
      <TD bgcolor="White" style="width:178px;">
        <div style="text-align:justify" class="textoParrafo">
          <?php echo $financiamiento[$indice]['fin']['monto_transferido']; ?> Bs.
        </div>
      </TD>                    
    </TR>
    <TR>
      <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Monto Pendiente por<br>&nbsp;&nbsp;&nbsp; Transferir </TD>
      <TD bgcolor="White" style="width:180px;">
        <div style="text-align:justify" class="textoParrafo">
          <?php echo $financiamiento[$indice]['fin']['monto_pendiente']; ?> Bs.
        </div>
      </TD>  
      <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp;  </TD>
      <TD bgcolor="White" style="width:178px;">
        <div style="text-align:justify" class="textoParrafo"></div>
      </TD>
    </TR>              
</TABLE>

<br>
      <?php 


        }


      }


      ?>

</page>

<page>
<page_footer>
    <table style="width: 100%; border: solid 0px black;">
      <tr>
        <td style="text-align: right; width: 100%">P&aacute;gina [[page_cu]]/[[page_nb]]</td>
      </tr>
    </table>
</page_footer>
<TABLE border="0" cellpadding="2" cellspacing="1" align="center" style="width:550px;" bgcolor="#D6D6D6">
    <TR>
        <TD class="subtituloBackground" colspan="6"> Inversi&oacute;n Fragmentada </TD>
    </TR>
    <TR>
      <TD class="tituloTablas"  bgcolor="#F2f2f2" align="center" style="width:143px;">Infraestructura (Bs)</TD>
      <TD class="tituloTablas"  bgcolor="#F2f2f2" align="center" style="width:143px;">Maquinaria, Equipos y <br>Herramientas (Bs)</TD>
      <TD class="tituloTablas"  bgcolor="#F2f2f2" align="center" style="width:143px;">Insumos y Materias Primas (Bs)</TD>
      <TD class="tituloTablas"  bgcolor="#F2f2f2" align="center" style="width:143px;">Fuerza de Trabajo (Bs)</TD>
      <TD class="tituloTablas" bgcolor="#F2f2f2" align="center" style="width:143px;">Servicios (Bs)</TD>
    </TR>
    <TR>
      <TD align="center" bgcolor="White"><?=$rs['infraestructura'];?></TD>
      <TD align="center" bgcolor="White"><?=$rs['maquinaria'];?></TD>
      <TD align="center" bgcolor="White"><?=$rs['insumos'];?></TD>
      <TD align="center" bgcolor="White"><?=$rs['fuerza_trabajo'];?></TD>
      <TD align="center" bgcolor="White"><?=$rs['servicios'];?></TD>
    </TR>
    <TR><TD class="tituloTablas" bgcolor="#F2f2f2" align="center" valign="middle" colspan="5">Inversi&oacute;n Total:</TD></TR>
    <TR>
      <TD class="texto_negro" bgcolor="White" align="center" valign="middle" colspan="5">
        <?=$rs['inversion'];?>
      </TD>
    </TR>
              
</TABLE>
<br><br>
</page>
<page>
<TABLE border="0" cellpadding="2" cellspacing="1" align="center" style="width:550px;" bgcolor="#D6D6D6">
  <TR>
    <TD class="subtituloBackground" colspan="6"> Productores </TD>
  </TR>
  <TR>
    <TD class="tituloTablas" bgcolor="White" style="width:148px;">&nbsp;&nbsp;&nbsp; Directos </TD>
    <TD bgcolor="White">
       <div style="text-align:justify" class="textoParrafo" style="width:90px;"><?=$rs['num_pro_directos'];?></div>
    </TD>                    
    <TD class="tituloTablas" bgcolor="White" style="width:148px;">&nbsp;&nbsp;&nbsp; Masculino </TD>
    <TD bgcolor="White">
       <div style="text-align:justify" class="textoParrafo" style="width:90px;"><?=$rs['num_prod_masculinos'];?></div>
    </TD>  
    <TD class="tituloTablas" bgcolor="White" style="width:148px;">&nbsp;&nbsp;&nbsp; Femenino </TD>
    <TD bgcolor="White">
       <div style="text-align:justify" class="textoParrafo" style="width:90px;"><?=$rs['num_prod_femeninos'];?></div>
    </TD>                     
  </TR>
  <TR>
    <TD class="tituloTablas" bgcolor="White" style="width:148px;">&nbsp;&nbsp;&nbsp; Indirectos </TD>
    <TD bgcolor="White" colspan="5">
       <div style="text-align:justify" class="textoParrafo" style="width:90px;"><?=$rs['num_prod_indirectos'];?></div>
    </TD>                    
  </TR>
</TABLE>

<br>
</page>
<page>
<TABLE border="0" cellpadding="2" cellspacing="1" align="center" style="width:550px;" bgcolor="#D6D6D6">
  <TR>
    <TD class="subtituloBackground" colspan="4"> Datos de Producción </TD>
  </TR>
  <TR>
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Estatus de producción </TD>
    <TD bgcolor="White">
      <div style="text-align:justify" class="textoParrafo" style="width:180px;"><?=$rs['estatus_produccion'];?></div>
    </TD>                    
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Fecha de Inicio <br> &nbsp;&nbsp;&nbsp; de Producción </TD>
    <TD bgcolor="White">
      <div style="text-align:justify" class="textoParrafo" style="width:182px;"><?=$rs['fecha_produccion'];?></div>
    </TD>                    
  </TR>
  <TR>
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Producto Principal </TD>
    <TD bgcolor="White">
      <div style="text-align:justify" class="textoParrafo" style="width:180px;"><?=$rs['prod_principal'];?></div>
    </TD>                    
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Capacidad a Instalar </TD>
    <TD bgcolor="White">
      <div style="text-align:justify" class="textoParrafo" style="width:182px;"><?=$rs['meta_produccion'];?></div>
    </TD>                    
  </TR>
</TABLE>
<br>
</page>
<page>
<TABLE border="0" cellpadding="2" cellspacing="1" align="center" style="width:550px;" bgcolor="#D6D6D6">
  <TR>
      <TD class="subtituloBackground" colspan="2"> Estado de Avance </TD>
  </TR>
  <TR>
      <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Elaboración del Proyecto </TD>
      <TD bgcolor="White">
         <div style="text-align:justify" class="textoParrafo"><?=$rs['elaboracion'];?></div>
      </TD>                    
  </TR>
  <TR>
      <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Proceso Formativo </TD>
      <TD bgcolor="White">
         <div style="text-align:justify" class="textoParrafo"><?=$rs['proceso_formativo'];?></div>
      </TD>                    
  </TR>
  <TR>
      <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Balance Político </TD>
      <TD bgcolor="White">
         <div style="text-align:justify" class="textoParrafo"><?=$rs['balance_politico'];?></div>
      </TD>                    
  </TR>
</TABLE>

<br>
</page>
<page>
<TABLE border="0" cellpadding="2" cellspacing="1" align="center" style="width:550px;" bgcolor="#D6D6D6">
  <TR>
    <TD class="subtituloBackground" colspan="4"> Ubicaci&oacute;n Geogr&aacute;fica </TD>
  </TR>
  <TR>
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Estado </TD>
    <TD bgcolor="White" style="width:180px;">
       <div style="text-align:justify" class="textoParrafo"><?=$estado;?></div>
    </TD>   
  <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Municipio </TD>
    <TD bgcolor="White" style="width:178px;">
       <div style="text-align:justify" class="textoParrafo" > <?=$municipio;?></div>
    </TD>                    
  </TR>
  <TR>
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Circuito </TD>
    <TD bgcolor="White" style="width:180px;">
       <div style="text-align:justify" class="textoParrafo"><?=$circuito;?></div>
    </TD>  
  <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Parroquia </TD>
    <TD bgcolor="White" style="width:178px;">
       <div style="text-align:justify" class="textoParrafo"><?=$parroquia;?></div>
    </TD>                    
  </TR>
  <TR>
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Eje Comunal </TD>
    <TD bgcolor="White" style="width:180px;">
       <div style="text-align:justify" class="textoParrafo"><?=$eje_comunal;?></div>
    </TD>  
  <TD class="tituloTablas" bgcolor="White" style="width:180px;" colspan="2">&nbsp;&nbsp;&nbsp; </TD>
                   
  </TR>
  <TR>
    <TD class="tituloTablas" bgcolor="White" style="width:180px;">&nbsp;&nbsp;&nbsp; Direcci&oacute;n </TD>
    <TD bgcolor="White" colspan="4">
       <div style="text-align:justify" class="textoParrafo"><?=$rs['direccion'];?></div>
    </TD>                    
  </TR>       
</TABLE>
</page>

<page>
<page_footer>
    <table style="width: 100%; border: solid 0px black;">
      <tr>
        <td style="text-align: right; width: 100%">P&aacute;gina [[page_cu]]/[[page_nb]]</td>
      </tr>
    </table>
  </page_footer>
<br>


<TABLE border="0" cellpadding="2" cellspacing="1" align="center" style="width:550px;" bgcolor="#D6D6D6">
  <TR>
    <TD class="subtituloBackground" colspan="2"> Registro Fotográfico </TD>
  </TR>
  <TR>
    <TD class="tituloTablas" bgcolor="White" style="width:180px;text-align:center;">&nbsp;&nbsp;&nbsp; Imagen </TD>
    <TD bgcolor="White">
      <div style="text-align:center" class="textoParrafo">Descripci&oacute;n</div>
    </TD>                    
  </TR>
    <?php
      $num_foto = pg_num_rows($foto);
      if (!empty($num_foto)){

        while ($r=pg_fetch_array($foto)){
          echo "<TR>
                  <TD bgcolor='White'  align='center' class='tituloTablas' style='width:180px;'><img src='../files/". $r['nombre_archivo']."' style='width:100px; heigth:100px;'></TD>
                <TD bgcolor='White'  align='center' class='tituloTablas' style='width:180px;'>". $r['descripcion_archivo'] . "</TD>
                </TR>";  
            
        }
      }else{

        echo "<TR>
                <TD bgcolor='White'  align='center' class='tituloTablas' style='width:180px;'><img src='../imagenes/no_imagen.jpg' style='width:100px; heigth:100px;'></TD>
                <TD bgcolor='White'  align='center' class='tituloTablas' style='width:180px;'> No hay registro fotográfico </TD>
              </TR>";
      }

    ?>
                    
</TABLE>
</page>