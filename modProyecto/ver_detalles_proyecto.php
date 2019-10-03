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

  $rs = buscarRegistro($id_proyecto);

  /*echo "<pre>";
  print_r($rs);
  echo "</pre>";*/
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
                                 $fecha_registro = traerRegistrosProyecto($rs['fecha_registro_proyecto']);
                                 
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
  	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
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

      </HEAD>
<BODY>
  <BR>
  <TABLE id="tablaTitulo" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
  <TR><TD class="tituloBackground"> DETALLES PROYECTO </TD></TR>
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

<TABLE border="0" cellpadding="2" cellspacing="1" align="center" width="90%" bgcolor="#D6D6D6">
  <TR>
      <TD class="subtituloBackground" colspan="6"> Datos Basicos del Proyecto </TD>
  </TR>
  <TR>
      <TD class="tituloTablas" bgcolor="White" style="width:18%">&nbsp;&nbsp;&nbsp; Nombre del Proyecto </TD>
      <TD colspan="5" bgcolor="White">
         <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['nombre_proyecto'];?></div>
      </TD>                    
  </TR>
  <TR>
      <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp; Descripci&oacute;n del Proyecto </TD>
      <TD colspan="5" bgcolor="White">
          <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['descripcion_proyecto'];?></div>
      </TD>
  </TR>
  <TR>
      <TD class="tituloTablas" bgcolor="White" style="width:18%">&nbsp;&nbsp;&nbsp; Area de Construcción (m²) <span class="campo_obligatorio">*&nbsp;</span></TD>
      <TD align="center" bgcolor="White">
        <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['area_construccion'];?></div>
      </TD>                    

      <TD class="tituloTablas" bgcolor="White">&nbsp; Area de Terreno (m²) <span class="campo_obligatorio">*&nbsp;</span>
      </TD>
      <TD align="center" bgcolor="White">
          <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['area_terreno'];?></div>
      </TD>
                         
      <TD class="tituloTablas" align="center" bgcolor="White"> Tiempo de Instalación <span class="campo_obligatorio">*&nbsp;</span></TD>
      <TD align="center" bgcolor="White">
           <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['tiempo_instalacion'];?></div>
      </TD> 
    </TR>
    <tr>
      <TD class="tituloTablas" bgcolor="White" style="width:18%">&nbsp;&nbsp;&nbsp; Beneficiarios <span class="campo_obligatorio">*</span></TD>
      <TD bgcolor="White" colspan="2">
         <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['beneficiarios'];?></div>
      </TD> 
      

      <TD class="tituloTablas" align="center" bgcolor="White" style="width:18%">&nbsp;&nbsp;&nbsp; Fecha de Creacion <span class="campo_obligatorio">*&nbsp;</span></TD>
      <TD bgcolor="White" colspan="5">
           <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['fecha_registro_proyecto'];?></div>
      </TD> 
      
  </TR>
  <TR>
      <TD class="subtituloBackground" colspan="6"> Cadena / Area </TD>
  </TR>
  <TR>
      <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp; Cadena </TD>
      <TD align="center" bgcolor="White">
          <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $cadena;?></div>
      </TD>
      <TD class="tituloTablas" align="center" bgcolor="White"> &Aacute;rea </TD>
      <TD align="left" bgcolor="White" colspan="6">
          <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;
        		<?php 
        		
        		for($i=0;$i<count($area);$i++){

        		echo "&nbsp;".$area[$i]. ";";
        		}
        		?>                
        </div>
      </TD>                                                                                    
  </TR> 
  <TR>
      <TD class="subtituloBackground" colspan="6"> Organizaciones Comunitarias </TD>
  </TR>
  <TR>
      <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp; Tipo de Organizaci&oacute;n  </TD>
      <TD align="center" bgcolor="White" colspan="5">

  <table  border="0" cellpadding="0" cellspacing="0" bgcolor="#D6D6D6" align="left" width="800px">
    <tbody>
      <tr>
        <td class="tituloTablas"  bgcolor="White" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="comuna">Comuna:</label></td><td bgcolor="White"> <input disabled name="comuna"  id="comuna" type="checkbox" value="2" onClick="document.getElementById('1').style. display = (this.checked) ? 'block' : 'none' " 
  		<?php 
  		
  		if (!empty($comuna)){ echo "checked"; }

  		?> /><br></td>
        <td bgcolor="White">



  <table  border="0" width="550px" cellpadding="1" cellspacing="1" id="1"  
  		<?php 

  		if (!empty($comuna)){ echo "style='display:block'"; }else{ echo "style='display:none'"; }
  		?> >
    <tbody>
      <tr>
        <td class="tituloTablas" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre: </td>
        <td style="text-align:justify" class="textoParrafo" width="850px">
  		<?php 
  		
  		for($i=0;$i<count($comuna);$i++){

  		echo "<b>*</b>".$comuna[$i]. "<br>";
  		}
  		?></td>
        <td class="tituloTablas">&nbsp;&nbsp;Cantidad:</td>
        <td style="text-align:justify" class="textoParrafo"><?php echo count($comuna); ?></td>
  </table>
  <br>

  </td>
      </tr>


      <tr>
        <td class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="consejo_comunal">Consejo Comunal:</label></td><td bgcolor="White"> <input disabled name="consejo_comunal" id="consejo_comunal" type="checkbox" value="1" onClick="document.getElementById('2').style. display = (this.checked) ? 'block' : 'none' " 
  		 <?php 
  		
  		if (!empty($consejo)){ echo "checked"; }
  		?>
   /><br></td>
        <td bgcolor="White">



  <table  border="0" width="550px" cellpadding="1" cellspacing="1" id="2" 
  		
  		<?php 
  		if (!empty($consejo)){ echo "style='display:block'"; }else{ echo "style='display:none'"; }

  		?>
   >
    <tbody>
      <tr>
        <td class="tituloTablas">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre: </td>
        <td style="text-align:justify" class="textoParrafo" width="850px">
  <?php 
  		
  		for($i=0;$i<count($consejo);$i++){

  		echo "<b>*</b>".$consejo[$i]. "<br>";
  		}
  		?>
  </td>
        <td class="tituloTablas">&nbsp;&nbsp;Cantidad:</td>
        <td style="text-align:justify" class="textoParrafo"><?php echo count($consejo); ?></td>
  </table>
  <br>

  </td>
      </tr>

     <tr>
        <td class="tituloTablas" bgcolor="White" width="5%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="movimiento">Movimientos<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sociales:</label></td><td bgcolor="White" width="1%"> <input disabled name="movimiento" id="movimiento" type="checkbox" value="3" onClick="document.getElementById('3').style. display = (this.checked) ? 'block' : 'none' "  
  		<?php 
  				if (!empty($movimiento)){ echo "checked"; }
  		
  		?>
  	
  /><br></td>
        <td bgcolor="White" width="15%">



  <table  border="0" width="550px" cellpadding="1" cellspacing="1" id="3" 
  		<?php 
  		if (!empty($movimiento)){ echo "style='display:block'"; }else{ echo "style='display:none'"; }
  		
  		?>


  >
    <tbody>
      <tr>
        <td class="tituloTablas">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre: </td>
        <td style="text-align:justify" class="textoParrafo" width="850px">
  <?php 
  		
  		for($i=0;$i<count($movimiento);$i++){

  		echo "<b>*</b>".$movimiento[$i]. "<br>";
  		}
  		?>

  </td>
        <td class="tituloTablas">&nbsp;&nbsp;Cantidad:</td>
        <td style="text-align:justify" class="textoParrafo"><?php echo count($movimiento); ?></td>
  </table>
  <br>

  </td>
      </tr>
    </tbody>
  </table>


  <br><br><br>



                      </TD> 
  		<TR>
                    <TD class="tituloTablas" align="center" bgcolor="White"> &nbsp;&nbsp;Comite de Economia Comunal  </TD>
                      <TD bgcolor="White" colspan="6">
                        <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['comite_eco_comunal'];?></div>
                      </TD> 
  		</TR>
                  </TR>
  		 <TR>
                      <TD class="subtituloBackground" colspan="6"> Figura Juridica </TD>
                  </TR> 
  		 <TR>
                      <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp; Figura Juridica </TD>
  		<TD bgcolor="White">
                          <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $fig_juridica ;?></div>
                      </TD>
                           <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp; Figura Registrada  </TD>
                      <TD bgcolor="White">
  				<div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['figura_jur_reg'];?></div>
                      </TD> 
  		     <TD class="tituloTablas" align="center" bgcolor="White"> Titularidad <span class="campo_obligatorio">*&nbsp;</span></TD>
                      <TD align="center" bgcolor="White">
                           		<div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['titularidad'];?></div>

                      </TD>                                                                     
                  </TR>
                  <!--<TR>
                      <TD class="subtituloBackground" colspan="6"> Productores </TD>
                  </TR> comentado-->
                  <!--                <TR>
                                      <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp; Directos </TD>
                                      <TD align="center" bgcolor="White">
                                          <input onkeyup="compUsuario(event)" onkeypress='return(formato_campo(this,event,1))' onpaste='return(formato_campo(this,event,1))' style='text-transform:uppercase;' maxlength="3" name="productores_directos"  type="text" size="2">
                                      </TD>
                                      <TD class="tituloTablas" align="center" bgcolor="White"> Hombres </TD>
                                      <TD align="center" bgcolor="White">
                                          <input onkeyup="compUsuario(event)" onkeypress='return(formato_campo(this,event,1))' onpaste='return(formato_campo(this,event,1))' style='text-transform:uppercase;' maxlength="3" name="productores_masculino"  type="text" size="2">
                                       
                                      </TD> 
                                      <TD class="tituloTablas" align="center" bgcolor="White"> Mujeres </TD>
                                      <TD align="center" bgcolor="White">
                                          <input onkeyup="compUsuario(event)" onkeypress='return(formato_campo(this,event,1))' onpaste='return(formato_campo(this,event,1))' style='text-transform:uppercase;' maxlength="3" name="productores_femenino"  type="text" size="2">
                                       
                                      </TD> 
                                  </TR>-->
                 <!-- <TR>
                      <TD class="tituloTablas" bgcolor="White" colspan="6"> comentado-->
                          <!--                            <FORM action="" id="formRegSocios" name="formRegSocios" method="POST" onsubmit="return validacion();">-->
                          <!--<TABLE border="0" cellpadding="1" cellspacing="1" align="center" width="95%" bgcolor="#D6D6D6">
                              <TR>
                                  <TD bgcolor="White" class="tituloTablas" align="center" width="30%">Nombres y Apellidos </TD>
                                  <TD bgcolor="White" class="tituloTablas" align="center" width="15%">Sexo </TD>
                                  <TD bgcolor="White" class="tituloTablas" align="center" width="15%">Tel&eacute;fono </TD>
                                  <TD bgcolor="White" class="tituloTablas" align="center" width="30%">Correo Electr&oacute;nico </TD>
                                  <TD bgcolor="White" class="tituloTablas" align="center" width="10%">Agregar</TD>
                              </TR>
                              <TR>
                                  <TD bgcolor="White" align="center"><INPUT type="text" name="nombApeSocio" id="nombApeSocio" size="30"></TD>
                                  <TD bgcolor="White" align="center"><INPUT type="text" name="sexoSocio" id="sexoSocio" size="30"></TD>
                                  <TD bgcolor="White" align="center"><INPUT onkeypress="return(formato_campo(this,event,1));" onchange="campoTlfSocio();" type="text" name="telefonoSocio" id="telefonoSocio" size="30" ></TD>
                                  <TD bgcolor="White" align="center"><INPUT onchange="validaremail(this,form);" type="text" name="emailSocio" id="emailSocio" size="30"></TD>
                                  <TD bgcolor="White" align="center"><IMG id="agregar" onclick="validarEmpleo('nombApeSocio', 'sexoSocio', 'telefonoSocio','emailSocio','tablaSocios')" src="../imagenes/add_socio.png" title="Agregar"></TD>
                              </TR>
                          </TABLE>                        
                          <TABLE  id="tablaSocios" border="0" cellpadding="3" cellspacing="1" align="center" width="95%" bgcolor="#D6D6D6">
                              <TR>
                                  <TD bgcolor="#D6D6D6" class="tituloTablas" align="center" colspan="6">Datos Productores</TD>
                              </TR>
                              <TR>
                                  <TD bgcolor="#F2F2F2" class="tituloTablas" align="center" width="30%">Nombres y Apellidos</TD>
                                  <TD bgcolor="#F2F2F2" class="tituloTablas" align="center" width="15%">Sexo</TD>
                                  <TD bgcolor="#F2F2F2" class="tituloTablas" align="center" width="15%">Telefono</TD>
                                  <TD bgcolor="#F2F2F2" class="tituloTablas" align="center" width="30%">Correo Electr&oacute;nico</TD>
                                  <TD bgcolor="#F2F2F2" class="tituloTablas" align="center" width="10%">Acci&oacute;n</TD>
                              </TR>
                          </TABLE><BR> comentado-->                               
                          <!--                               <BR><TABLE id="tablaBoton" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
                                                                  <TR>
                                                                          <TD align="center"><INPUT id="regSocios" name="regSocios" type="submit" value="AGREGAR SOCIOS" class="botonGrande"></TD>
                                                                          <TD align="center"><INPUT id="cancelar" name="cancelar" type="submit" value="CANCELAR" class="botonGrande"></TD>
                                                                  </TR>
                                                          </TABLE>-->
                          <!--                                </FORM>-->
                      <!--</TD>
                  </TR> comentado-->

  <!-- ************************************ -->
  	<TABLE border="0" width="90%" cellpadding="2" cellspacing="1" align="center" bgcolor="#D6D6D6">
  		<TR>
                      <TD class="subtituloBackground" colspan="6"> Inversi&oacute;n Fragmentada <span class="campo_obligatorio">*&nbsp;</span></TD>
                  </TR>
  		
  		<!--<TR><TD bgcolor="White" colspan="10"><HR class="hr_a"></TD></TR>-->
  		<TR>
  			<TD class="tituloTablas"  bgcolor="#F2f2f2" align="center">Infraestructura (Bs)<span class="campo_obligatorio">*&nbsp;</span></TD>
  			<TD class="tituloTablas"  bgcolor="#F2f2f2" align="center">Maquinaria, Equipos y <br>Herramientas (Bs)<span class="campo_obligatorio">*&nbsp;</span></TD>
  			<TD class="tituloTablas"  bgcolor="#F2f2f2" align="center">Insumos y Materias Primas (Bs)<span class="campo_obligatorio">*&nbsp;</span></TD>
  			<TD class="tituloTablas"  bgcolor="#F2f2f2" align="center">Fuerza de Trabajo (Bs)<span class="campo_obligatorio">*&nbsp;</span></TD>
  			<TD class="tituloTablas" bgcolor="#F2f2f2" align="center">Servicios (Bs)<span class="campo_obligatorio">*&nbsp;</span></TD>
  		</TR>
  		<TR>
  			<TD align="center" bgcolor="White"><div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['infraestructura'];?></div></TD>
  			<TD align="center" bgcolor="White"><div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['maquinaria'];?></div></TD>
  			<TD align="center" bgcolor="White"><div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['insumos'];?></div></TD>
  			<TD align="center" bgcolor="White"><div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['fuerza_trabajo'];?></div></TD>
  			<TD align="center" bgcolor="White"><div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['servicios'];?></div></TD>
  		</TR>
  		<TR><TD class="tituloTablas" bgcolor="#F2f2f2" align="center" valign="middle" colspan="5">Inversi&oacute;n Total:</TD></TR>
  		<TR>
  			<TD class="texto_negro" bgcolor="White" align="center" valign="middle" colspan="5">
  				<div id="efectivo" style="border: 0px solid ; font-family: verdana,arial; font-size: 0.8em; text-align: center; color: #cc3300; font-weight:bold;">
  				<?php echo $rs['inversion'];?>
  				</div>
  				
  			</TD>
  		</TR>
  	</TABLE><!-- ************************************ -->   
  <TABLE border="0" cellpadding="2" cellspacing="1" align="center" width="90%" bgcolor="#D6D6D6" >
  		<TR>
                      <TD class="subtituloBackground" colspan="6"> Productores  </TD>
                  </TR>
  		          <TR>
                      <TD class="tituloTablas" bgcolor="White" style="width:18%">&nbsp;&nbsp;&nbsp; Directos  </TD>
                      <TD align="center" bgcolor="White">
                         <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['num_pro_directos'];?></div>
                      </TD>                    
                  
                      <TD class="tituloTablas" bgcolor="White">&nbsp; Masculino  </TD>
                      <TD align="center" bgcolor="White">
                          <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['num_prod_masculinos'];?></div>
                      </TD>
                                         
                      <TD class="tituloTablas" align="center" bgcolor="White"> Femenino  </TD>
                      <TD align="center" bgcolor="White">
                           <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['num_prod_femeninos'];?></div>

                      </TD> 
                    </TR>
  		<tr><TD class="tituloTablas" bgcolor="White" style="width:18%" colspan="">&nbsp;&nbsp;&nbsp; Indirectos <span class="campo_obligatorio">*</span></TD>
                      <TD bgcolor="White" colspan="5">
                          <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['num_prod_indirectos'];?></div>
                      </TD> 
  			</TR>
  		<TR>
                      <TD class="subtituloBackground" colspan="6"> Datos de Producción  </TD>
                  </TR>
  		<TR><TD class="tituloTablas" bgcolor="White" style="width:18%">&nbsp;&nbsp;&nbsp; Estatus de producción  </TD>
                      <TD bgcolor="White">
                     <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['estatus_produccion'];?></div>
                      </TD>
  							<TD class="tituloTablas" align="center" bgcolor="White"> Fecha de Inicio de Producción </TD>
                      <TD align="center" bgcolor="White">
  		<div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['fecha_produccion'];?></div>
                      </TD> 
                      <TD class="tituloTablas" bgcolor="White" style="width:18%">&nbsp;&nbsp;&nbsp; Producto Principal  </TD>
                      <TD bgcolor="White">
                        <div style="text-align:justify" class="textoParrafo"><?php echo $rs['prod_principal'];?></div>
                      </TD>                   
                      </tr>
                      <tr><TD class="tituloTablas" bgcolor="White" style="width:18%" colspan="">&nbsp;&nbsp;&nbsp; Unidades de<br>&nbsp;&nbsp;&nbsp; Producci&oacute;n <span class="campo_obligatorio">*</span></TD>
                      <TD bgcolor="White"> <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['unidades_produccion'];?></div>

                      </TD> <TD class="tituloTablas" bgcolor="White" style="width:18%" colspan="">&nbsp;&nbsp;&nbsp; Capacidad a Instalar <span class="campo_obligatorio">*</span></TD>
                      <TD bgcolor="White" colspan="5">
                         <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['meta_produccion'];?></div>
                      </TD> 
  			</TR>
  			<TR>
                      <TD class="subtituloBackground" colspan="6"> Estado de Avance <span class="campo_obligatorio">*&nbsp;</span></TD>
                  </TR>
  		          <TR>
                      <TD class="tituloTablas" bgcolor="White" style="width:18%">&nbsp;&nbsp;&nbsp; Elaboración del Proyecto <span class="campo_obligatorio">*&nbsp;</span></TD>
                      <TD align="center" bgcolor="White">
                         			<div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['elaboracion'];?></div>
                      </TD>                    
                  
                      <TD class="tituloTablas" bgcolor="White">&nbsp; Proceso Formativo <span class="campo_obligatorio">*&nbsp;</span></TD>
                      <TD  bgcolor="White" colspan="3">
                          		<div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['proceso_formativo'];?></div>
                      </TD> 
                    </TR>
  		 <TR>
                      <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp; Balance Político <span class="campo_obligatorio">*&nbsp;</span></TD>
                      <TD colspan="5" bgcolor="White">
                          <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['balance_politico'];?></div>
                      </TD>
                  </TR>
                  <TR>
                      <TD class="subtituloBackground" colspan="6"> Ubicaci&oacute;n Geogr&aacute;fica </TD>
                  </TR>
                  <TR>
                      <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp; Estado </TD>
                      <TD align="center" bgcolor="White">
                          <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $estado;?></div>
                      </TD>
                      <TD class="tituloTablas" align="center" bgcolor="White"> Municipio </TD>
                      <TD align="center" bgcolor="White">
                         <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $municipio;?></div>

                      </TD> 
                      <TD class="tituloTablas" align="center" bgcolor="White"> Circuito </TD>
                      <TD align="center" bgcolor="White">
                          <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $circuito;?></div>

                      </TD> 
                  </TR> 
                  <TR>
                      <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp; Parroquia </TD>
                      <TD align="center" bgcolor="White">
                          <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $parroquia;?></div>
                      </TD>
                      <TD class="tituloTablas" align="center" bgcolor="White"> Eje Comunal </TD>
                      <TD bgcolor="White" align="center">
                           <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $eje_comunal;?></div>                
                      </TD>
  		    <TD class="tituloTablas" align="center" bgcolor="White" colspan="2"></TD>
                                                                                                    
                  </TR> 
  		<TR>
                      <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp; Latitud </TD>
                      <TD align="center" bgcolor="White">
                         <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['latitud'];?></div>

                      </TD> 
                      <TD class="tituloTablas" align="center" bgcolor="White"> Longitud </TD>
                      <TD bgcolor="White" align="center">
                     	<div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['longitud'];?></div>

                      </TD> 
  		    <TD class="tituloTablas" align="center" bgcolor="White" colspan="2"></TD>
                  </TR> 
                  <TR>
                      <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp; Direcci&oacute;n </TD>
                      <TD align="center" bgcolor="White" colspan="5">
                       <div style="text-align:justify" class="textoParrafo">&nbsp;&nbsp;<?php echo $rs['direccion'];?></div>
                      </TD>
                                                                                              
                  </TR> 
  		<TR>
                      <TD class="subtituloBackground" colspan="6"> <div id="map_canvas"></div> </TD>
                  </TR>
              </TABLE>
              <br>
  		<TABLE border="0" cellpadding="2" cellspacing="1" align="center" width="90%" bgcolor="#D6D6D6" id="adjuntos">
                  <TR>
                      <TD class="subtituloBackground" colspan="6"> Registro Fotográfico</TD>
                  </TR>
  		<TR><TD bgcolor='White'  align="center" width='45%' class="tituloTablas">Imagen</TD>
  		<TD bgcolor='White'  align="center" class="tituloTablas">Descripci&oacute;n</TD></TR>
  <?php
  $num_foto = pg_num_rows($foto);
  if (!empty($num_foto)){

  while ($r=pg_fetch_array($foto)){

  echo "<TR><TD bgcolor='White'  align='center' class='tituloTablas'><img src='../files/". $r['nombre_archivo'] . "' width='150px' heigth='150px'></TD>
  <TD bgcolor='White'  align='center' class='tituloTablas'>". $r['descripcion_archivo'] . "</TD></TR>";  
  		
  }


  }else{

  echo "<TR><TD bgcolor='White'  align='center' class='tituloTablas'><img src='../imagenes/no_imagen.jpg' width='150px' heigth='150px'></TD>
  <TD bgcolor='White'  align='center' class='tituloTablas'> No hay registro fotográfico </TD></TR>";


  }




  ?>

  		
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
              <?
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
              <?
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
              <?
              /* if (!empty($estado)) {
                cargarComboDependienteConEvento('municipio', $conn, queryComboMunicipio($estado), $municipio, "onchange='document.formRegistrarProyecto.submit();'");
                } else {
                echo "<div id='id_municipio'><select name='municipio' id='municipio' data-placeholder='Seleccione Estado...' class='chzn-select' style='width:220px;' tabindex='2'><option value=''>Seleccione Estado</option></select></div>";
                } */
              ?>
                                                          </TD>
                                                          <TD align="center" bgcolor="White">
              <?
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
  		<TD align="center"><INPUT id="regProyecto" name="volver" type="submit" value="VOLVER" class="botonPeq"></TD>
  		</FORM>
  		<?php
  			$resp =	verificar_responsable($id_usuario_registra,$rs['id_proyecto']);
  			$registros = pg_num_rows($resp);
  			if ($perfil == 2)
  			{
  			if ($registros > 0)
  			{
  		?>
  		<FORM method="POST" name="registro" action="editar_proyecto.php" >
  		<INPUT type="hidden" name="id_registro" value="<?php echo $rs['id_proyecto'];?>">
  		<TD ><INPUT id="editar" name="editar" type="submit" value="Editar" class="botonPeq"></TD>
  		</FORM>
  		<?php
  			}
  		}elseif ($perfil == 1) {
  		?>
  		<FORM method="POST" name="registro" action="editar_proyecto.php" >
  		<INPUT type="hidden" name="id_registro" value="<?php echo $rs['id_proyecto'];?>">
  		<TD ><INPUT id="editar" name="editar" type="submit" value="Editar" class="botonPeq"></TD>
  		</FORM>
  		<?php
  		}
  		?>
  		


  		<FORM method="POST" name="registro" action="reporte.php" >
  		<INPUT type="hidden" name="id_proyecto" value="<?php echo $rs['id_proyecto'];?>">
  		<TD ><INPUT id="Imprimir" name="Imprimir" type="submit" value="Imprimir" class="botonPeq"></TD>
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
