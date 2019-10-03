<?php
session_start();
include_once ("../funciones/funciones_session.php");
comprobarSession($_SESSION['adminProy']);
include_once ("../conexion/conexionpg.php");
include_once ("../funciones/queryProyectos.php");
include_once ("../funciones/funciones.php");
extract($_POST);
extract($_GET);


$estados = query_array_estado();
$municipio = query_array_municipio();
$parroquia = query_array_parroquia();
$result = arrays_js_edo_mun($estados, $municipio, $parroquia);
echo $result;






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


    <!--Multiselect-->
    <link rel="stylesheet" type="text/css" href="../css_multiselect/jquery.multiselect.css" />
    <link rel="stylesheet" type="text/css" href="../assets_multiselect/style.css" />
    <link rel="stylesheet" type="text/css" href="../css_multiselect/jquery-ui.css" />
    <script type="text/javascript" src='../clases/jquery/jquery-1.5.1.min.js'></script>
    <script type="text/javascript" src="../js_multiselect/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../js_multiselect/jquery.multiselect.js"></script>
    <script type="text/javascript" src="../js/multiselect1.js"></script>

    <!--fin Multiselect-->

    <script type="text/javascript">
        $(document).ready(function(){

        $("#credito_adicional").click(function () {
            $("#credito,#adicional,#credito1").slideToggle("fast");

        });
    });
    </script>

    
    <script type="text/javascript" src="../js/src/js/jscal2.js"></script>
        <script type="text/javascript" src="../js/src/js/lang/es.js"></script>
        <link rel="stylesheet" type="text/css" href="../js/src/css/jscal2.css" />
        <link rel="stylesheet" type="text/css" href="../js/src/css/border-radius.css" />
        <link rel="stylesheet" type="text/css" href="../js/src/css/steel/steel.css" />


    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type='text/javascript' src='../js/google.js' ></script>
       <!-- <script type="text/javascript" src="../clases/jquery/jquery-1.6.4.min.js"></script>-->
        <script type="text/javascript" src="../clases/jquery/jquery.jCombo.min.js"></script>
        <script type="text/javascript" src="../clases/jquery/jquery.textareaCounter.plugin.js"></script>
        <script type="text/javascript" src="../js/general.js"></script>
        <SCRIPT>
            $(document).ready( function() { 
                var options2 = {
    
                    'maxCharacterSize': 1500, 'originalStyle': 'originalTextareaInfo','warningStyle' : 'warningTextareaInfo',
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
        $('#balance').textareaCount(options2);
            });
        </SCRIPT>
<!--crear campos dinamicos para subir fotos -->
<script type="text/javascript" src="../js/crear_campo.js"></script>
<!--Fin crear campos dinamicos -->

<script type="text/javascript" src="../js/validacion_proyecto.js"></script>

<script type="text/javascript" src="../js/readonly.js"></script>




<script type="text/javascript">
function enumerar(){



var node_lista = document.getElementsByName('numero');
for (var y =0; y < node_lista.length; y++) {

//alert(y);
var node = node_lista[y];



var e=node.getAttribute('id');
//alert("numero "+e);
node.value = y+1;
//document.getElementById(e).focus();
//document.getElementById(e).style.background='#ffffcc';



}


}


var id= 1;

function nueva_linea2() {
    ++id;
    //alert(++id);

/*r=id%2;

if (r==0){
p="#eaeaea";
}else{
p="#ffffff";
}*/
/*bgcolor="'+ p +'"  background:'+ p +';*/

$("#adicional").append('<TABLE border="0" cellpadding="2" cellspacing="1" align="center" width="90%" bgcolor="#D6D6D6" id="'+id+'"><TR ><TD class="subtituloBackground" colspan="5"> Financiamiento Adicional <input type="text" name="numero" value="1" id="num1" style="border:none;background-color:transparent;" size="2" readonly></TD><TD> <a onclick="elimCampo('+id+')" style="color: #cc3300;text-align:left">Eliminar</a></TD></TR><TR><TD class="tituloTablas" bgcolor="White" style="width:18%">&nbsp;&nbsp;&nbsp; Monto Solicitado <span class="campo_obligatorio">*&nbsp;</span></TD><TD bgcolor="White" class="tituloTablas" style="width:22%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="text-transform:uppercase;" value="0" maxlength="105" name="monfin[]" id="monfin_adicional'+id+'"  type="text" size="16" onfocus="if (this.value == \'0\') {this.value = \'\';}"  onblur="this.style.backgroundColor=\'#ffffff\';this.style.backgroundImage=\'\';if (this.value == \'\') {this.value = \'0\';};money(this);" onkeyup="validar(this,this.value.charAt(this.value.length-1))"> Bs.</TD><TD class="tituloTablas" bgcolor="White">Estatus de Finaciamiento<span class="campo_obligatorio">*&nbsp;</span></TD><TD align="center" bgcolor="White"><?php cargar_Combo("est_fin[]", "est_fin'+id+'", $conn, query_estatus(), $financiamiento[$indice]["fin"]["estatus"],"onchange=\"inhabilita();\""); ?></TD><TD class="tituloTablas" align="center" bgcolor="White"> Ente de Financiamiento<span class="campo_obligatorio">*&nbsp;</span></TD><TD align="center" bgcolor="White"><?php cargar_Combo("ente_fin[]", "ente_fin'+id+'" , $conn, query_ente(), $financiamiento[$indice]["fin"]["ente"],""); ?></TD></TR><tr><TD class="tituloTablas" bgcolor="White" style="width:18%">&nbsp;&nbsp;&nbsp; Monto Aprobado <span class="campo_obligatorio">*&nbsp;</span></TD><TD bgcolor="White" class="tituloTablas">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="text-transform:uppercase;" maxlength="105" value="0" name="monaprob[]" id="monaprob_adicional'+id+'" type="text" size="16" onfocus="if (this.value == \'0\') {this.value = \'\';}"  onblur="this.style.backgroundColor=\'#ffffff\';this.style.backgroundImage=\'\';if (this.value == \'\') {this.value = \'0\';};money(this);" onkeyup="validar(this,this.value.charAt(this.value.length-1))"> Bs.</TD><TD class="tituloTablas" align="center" bgcolor="White"> Año de Financiamiento<span class="campo_obligatorio">*&nbsp;</span></TD><TD align="center" bgcolor="White"><select name="anio_fin[]" id="anio_fin_adicional'+id+'" style="width:150px" onblur="this.style.backgroundColor=\'#ffffff\'"><option value="">--Seleccione--</option> <?php $i=0; for($i=1999;$i<=2014;$i++){  ?><option value="<?php echo $i?>"><?php echo $i?></option>";<?php } ?></select></TD> <TD class="tituloTablas" bgcolor="White" style="width:18%">&nbsp;&nbsp;&nbsp; Monto Transferido a la Fecha<span class="campo_obligatorio">*&nbsp;</span></TD><TD bgcolor="White" class="tituloTablas"><input style="text-transform:uppercase;" maxlength="105" name="montrasf[]" id="montrasf_adicional'+id+'" value="0"  type="text" size="16" onfocus="if (this.value == \'0\') {this.value = \'\';}"  onblur="this.style.backgroundColor=\'#ffffff\';this.style.backgroundImage=\'\';if (this.value == \'\') {this.value = \'0\';};money(this);" onkeyup="validar(this,this.value.charAt(this.value.length-1))"> Bs.</TD></tr><tr><TD class="tituloTablas" bgcolor="White" style="width:18%" colspan="">&nbsp;&nbsp;&nbsp; Monto Pendiente por<br>&nbsp;&nbsp;&nbsp; Transferir<span class="campo_obligatorio">*</span></TD><TD bgcolor="White" colspan="5" class="tituloTablas">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="text-transform:uppercase;" maxlength="105" value="0" name="monpendientetrasf[]" id="monpendientetrasf_adicional'+id+'"  type="text" size="16" onfocus="if (this.value == \'0\') {this.value = \'\';}"  onblur="this.style.backgroundColor=\'#ffffff\';this.style.backgroundImage=\'\';if (this.value == \'\') {this.value = \'0\';};money(this);" onkeyup="validar(this,this.value.charAt(this.value.length-1))"> Bs.<input  maxlength="105" name="tipo_fin[]" type="hidden" value="adicional" size="20"></TD> <!--fin financiamiento adicional--></TR></TABLE>');

enumerar();
}


function elimCampo (evt){
  // evt = evento(evt);


   document.getElementById(evt).style.background='#ffffcc';
var agree=confirm("Se borrara los campos del Financiamiento seleccionado!\n ¿Esta seguro que desea continuar?"); 
if (agree) {
   div = document.getElementById(evt);
   div.parentNode.removeChild(div);
    
enumerar(); 
}else{
document.getElementById(evt).style.background='#D6D6D6'; 
return false ; 

}


  // nCampo = rObj(evt);

}
</script>
<script type="text/javascript" src="../js/jquery.formatCurrency-1.4.0.js"></script> 
<script type="text/javascript" src="../js/moneda.js"></script>


<!-- inversion-->
<script type='text/javascript' src="../clases/js/javascript.js"></script>
<script type="text/javascript" src="../clases/js/number_format.js"></script>
<!-- VARIABLES OCULTAS DE SCRIPT SUMA -->
<input name="total_ori" id="total_ori" value="0.0" size="5" type="hidden">
<input name="total_tipos_pagos" id="total_tipos_pagos" value="5" size="5" type="hidden">
<input name="total_otros_pagos" id="total_otros_pagos" value="" size="15" type="hidden">
<!-- FIN VARIABLES OCULTAS DE SCRIPT SUMA -->
    </HEAD>
    <BODY onload="initialize('10.491606770716423',' -66.90326262963868',13 , ''); ">
        <BR>
        <TABLE id="tablaTitulo" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
            <TR><TD class="tituloBackground"> NUEVO PROYECTO </TD></TR>
        </TABLE>
        <BR>
        <FORM action="registrarProyecto.php" id="formRegistrarProyecto" name="formRegistrarProyecto" method="POST" onSubmit="return Validar(this)" enctype="multipart/form-data">

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
                    <TD class="subtituloBackground" colspan="6"> Datos Basicos del Proyecto <span class="campo_obligatorio">*&nbsp;</span></TD>
                </TR>
                <TR>
                    <TD class="tituloTablas" bgcolor="White" style="width:18%">&nbsp;&nbsp;&nbsp; Nombre del Proyecto <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD colspan="6" bgcolor="White">
                        &nbsp;&nbsp;&nbsp;<input onkeypress='return(formato_campo(this,event,2))' onpaste='return(formato_campo(this,event,2))'  maxlength="105" name="nombreProy"  type="text" size="130" onblur="changeCase(this);this.style.backgroundColor='#ffffff';this.style.backgroundImage=''">
                    </TD>                    
                </TR>
                <TR>
                    <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp; Descripci&oacute;n del Proyecto <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD colspan="6" bgcolor="White">
                        &nbsp;&nbsp;&nbsp;<TEXTAREA name="descripcionProy" id="descripcionProy" rows="1" cols="127" onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''"><?php echo $descripcionProy ?></TEXTAREA>
                    </TD>
                </TR>
        <TR>
                    <TD class="tituloTablas" bgcolor="White" style="width:18%">&nbsp;&nbsp;&nbsp; Area de Construcción (m²) <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD align="center" bgcolor="White">
                       <input  maxlength="10" name="area_cons"  type="text" size="22" onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''">
                    </TD>                    
                
                    <TD class="tituloTablas" bgcolor="White">&nbsp; Area de Terreno (m²) <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD align="center" bgcolor="White">
                        <input maxlength="10" name="area_terreno"  type="text" size="22"                                   onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''">
                    </TD>
                                       
                    <TD class="tituloTablas" align="center" bgcolor="White"> Tiempo de Instalación <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD align="center" bgcolor="White">
                         <input style='text-transform:uppercase;' maxlength="100" name="tiempo_instalacion"  type="text" size="22"                                 onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''">

                    </TD> 
                  </TR>
          <tr><TD class="tituloTablas" bgcolor="White" style="width:18%" colspan="">&nbsp;&nbsp;&nbsp; Beneficiarios <span class="campo_obligatorio">*</span></TD>
                    <TD bgcolor="White" colspan="5">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input style='text-transform:uppercase;' maxlength="10" name="beneficiarios"  type="text" size="3"                      onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''">
                    </TD> 
            </TR>
                <TR>
                    <TD class="subtituloBackground" colspan="6"> Cadena / Area <span class="campo_obligatorio">*&nbsp;</span></TD>
                </TR>
                <TR>
                    <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp; Cadena <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD align="center" bgcolor="White" >
            <?php cargarComboConEventoMultiselect('cadena', $conn, query_cadena(), $cadena, "onchange='cargar(cadena.value)'",'cadena');?>
            
                       <!-- <select name="cadena" id="cadena" style="width:150px"  onblur="this.style.backgroundColor='#ffffff'"></select>-->
                    </TD>
                    <TD class="tituloTablas" align="center" bgcolor="White"> &Aacute;rea <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD align="left" bgcolor="White" colspan="6">
            <div id="o" style="display:block"><select name="" id="vacio"></select></div> 
            <div id="respuesta" style="display:none"></div>
                       <!-- &nbsp;<select name="area_cadena" id="area_cadena" style="width:150px"onblur="this.style.backgroundColor='#ffffff'"><select> -->                    
                    </TD>                                                                                    
                </TR> 
                <TR>
                    <TD class="subtituloBackground" colspan="6"> Organizaciones Comunitarias <span class="campo_obligatorio">*&nbsp;</span></TD>
                </TR>
                <TR>
                    <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp; Tipo de Organizaci&oacute;n <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD align="center" bgcolor="White" colspan="5">
                     


<table  border="0" cellpadding="0" cellspacing="0" bgcolor="#D6D6D6" align="left" width="80%">
  <tbody>
    <tr>
      <td class="tituloTablas"  bgcolor="White" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="comuna">Comuna:</label></td><td bgcolor="White"> <input name="comuna" id="comuna" type="checkbox" value="2" onClick="document.getElementById('c').style. display = (this.checked) ? 'block' : 'none' "  /><br></td>
      <td bgcolor="White">



<table  border="0" cellpadding="1" cellspacing="1" id="c" style="display:none" >
  <tbody>
    <tr>
      <td class="tituloTablas" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre: </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;

<?php cargarComboSeleccionMultiple('nomb_comuna',$conn,query_organizacion(2), '');?>
</td>
     <!-- <td class="tituloTablas">&nbsp;&nbsp;Cantidad:</td>
      <td><input type="text" name="cant_comuna" size="3"></td>-->
</table>


</td>
    </tr>


    <tr>
      <td class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="consejo_comunal">Consejo Comunal:</label></td><td bgcolor="White"> <input name="consejo_comunal" id="consejo_comunal" type="checkbox" value="1" onClick="document.getElementById('cc').style. display = (this.checked) ? 'block' : 'none' "  /><br></td>
      <td bgcolor="White">



<table  border="0" cellpadding="1" cellspacing="1" id="cc" style="display:none" >
  <tbody>
    <tr>
      <td class="tituloTablas">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre: </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;

<?php cargarComboSeleccionMultiple('nomb_consejo_comunal',$conn,query_organizacion(1), '');?>
</td>
      <!--<td class="tituloTablas">&nbsp;&nbsp;Cantidad:</td>
      <td><input type="text" name="cant_consejo_comunal" size="3"></td>-->
</table>


</td>
    </tr>

   <tr>
      <td class="tituloTablas" bgcolor="White" width="5%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="movimiento">Movimientos Sociales:</label></td><td bgcolor="White" width="1%"> <input name="movimiento" id="movimiento" type="checkbox" value="3" onClick="document.getElementById('m').style. display = (this.checked) ? 'block' : 'none' "  /><br></td>
      <td bgcolor="White" width="15%">



<table  border="0" cellpadding="1" cellspacing="1" id="m" style="display:none">
  <tbody>
    <tr>
      <td class="tituloTablas">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre: </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;

<?php cargarComboSeleccionMultiple('nomb_movimiento',$conn,query_organizacion(3), '');?>

</td>
      <!--<td class="tituloTablas">&nbsp;&nbsp;Cantidad:</td>
      <td><input type="text" name="cant_movimiento" size="3"></td>-->
</table>


</td>
    </tr>
  </tbody>
</table>


<br><br><br>






                    </TD> 
        <TR>
                  <TD class="tituloTablas" align="center" bgcolor="White">Comite de Economia Comunal<span class="campo_obligatorio">*</span></TD>
                    <TD class="tituloTablas" bgcolor="White" colspan="6">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SI <input value="Si" name="comite_eco_comunal"  type="radio" >
            &nbsp;&nbsp;&nbsp;&nbsp;NO <input value="No" name="comite_eco_comunal"  type="radio" checked>
                    </TD> 
        </TR>
                </TR>
         <TR>
                    <TD class="subtituloBackground" colspan="5"> Figura Juridica <span class="campo_obligatorio">*&nbsp;</span></TD>
                </TR> 
         <TR>
                    <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp; Figura Juridica <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD bgcolor="White">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php cargar_combo('figura_juridica','figura_juridica', $conexion, queryCombofigura_juridica(), $figura_juridica, ""); ?>
                    </TD>
                         <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp; Figura Registrada <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD bgcolor="White">
                    <select name="figura_registrada" style="width:150px;" onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''">
                    <option value="0">--Seleccione--</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                    <option value="en_proceso">En Proceso</option>
                    </select>
                    </TD> 
              <TD class="tituloTablas" align="center" bgcolor="White"> Titularidad <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD align="center" bgcolor="White">
                                <select name="titularidad" style="width:150px;" onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''">
                    <option value="0">--Seleccione--</option>
                    <option value="Posee">Posee</option>
                    <option value="No Posee">No Posee</option>
                    </select>

                    </TD>                                                              
                </TR> 
                <!--<TR>
                    <TD class="subtituloBackground" colspan="6"> Productores <span class="campo_obligatorio">*&nbsp;</span></TD>
                </TR> comentado-->
                <!--                <TR>
                                    <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp; Directos <span class="campo_obligatorio">*&nbsp;</span></TD>
                                    <TD align="center" bgcolor="White">
                                        <input onkeyup="compUsuario(event)" onkeypress='return(formato_campo(this,event,1))' onpaste='return(formato_campo(this,event,1))' style='text-transform:uppercase;' maxlength="3" name="productores_directos"  type="text" size="2">
                                    </TD>
                                    <TD class="tituloTablas" align="center" bgcolor="White"> Hombres <span class="campo_obligatorio">*&nbsp;</span></TD>
                                    <TD align="center" bgcolor="White">
                                        <input onkeyup="compUsuario(event)" onkeypress='return(formato_campo(this,event,1))' onpaste='return(formato_campo(this,event,1))' style='text-transform:uppercase;' maxlength="3" name="productores_masculino"  type="text" size="2">
                                     
                                    </TD> 
                                    <TD class="tituloTablas" align="center" bgcolor="White"> Mujeres <span class="campo_obligatorio">*&nbsp;</span></TD>
                                    <TD align="center" bgcolor="White">
                                        <input onkeyup="compUsuario(event)" onkeypress='return(formato_campo(this,event,1))' onpaste='return(formato_campo(this,event,1))' style='text-transform:uppercase;' maxlength="3" name="productores_femenino"  type="text" size="2">
                                     
                                    </TD> 
                                </TR>-->
               <!-- <TR>
                    <TD class="tituloTablas" bgcolor="White" colspan="6"> comentado-->
                        <!--                            <FORM action="" id="formRegSocios" name="formRegSocios" method="POST" onsubmit="return validacion();">-->
                        <!--<TABLE border="0" cellpadding="1" cellspacing="1" align="center" width="95%" bgcolor="#D6D6D6">
                            <TR>
                                <TD bgcolor="White" class="tituloTablas" align="center" width="30%">Nombres y Apellidos <span class="campo_obligatorio">*&nbsp;</span></TD>
                                <TD bgcolor="White" class="tituloTablas" align="center" width="15%">Sexo <span class="campo_obligatorio">*&nbsp;</span></TD>
                                <TD bgcolor="White" class="tituloTablas" align="center" width="15%">Tel&eacute;fono <span class="campo_obligatorio">*&nbsp;</span></TD>
                                <TD bgcolor="White" class="tituloTablas" align="center" width="30%">Correo Electr&oacute;nico <span class="campo_obligatorio">*&nbsp;</span></TD>
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
                <TR>
                    <TD class="subtituloBackground" colspan="6"> Financiamiento <span class="campo_obligatorio">*&nbsp;</span></TD>
                </TR>
                  <TR>
                    <TD class="tituloTablas" bgcolor="White" style="width:18%">&nbsp;&nbsp;&nbsp; Monto Solicitado <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD bgcolor="White" class="tituloTablas">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style='text-transform:uppercase;' value="0" maxlength="105" name="monfin[]" id="monfin" type="text" size="16" onfocus="if (this.value == '0') {this.value = '';}"  onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage='';if (this.value == '') {this.value = '0';};money(this);" onkeyup="validar(this,this.value.charAt(this.value.length-1))" > Bs.
                    </TD>                    
                
                    <TD class="tituloTablas" bgcolor="White">&nbsp;Estatus de Finaciamiento<span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD align="center" bgcolor="White">
                        <select name="est_fin[]" id="est_fin" style="width:150px" onblur="this.style.backgroundColor='#ffffff'" onchange="inhabilita();"></select>
                    </TD>
                                       
                    <TD class="tituloTablas" align="center" bgcolor="White"> Ente de Financiamiento<span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD align="center" bgcolor="White">
                        <select name="ente_fin[]" id="ente_fin" style="width:150px" onblur="this.style.backgroundColor='#ffffff'"></select>

                    </TD> 
                  </TR>
                  <TR><TD class="tituloTablas" bgcolor="White" style="width:18%">&nbsp;&nbsp;&nbsp; Monto Aprobado <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD bgcolor="White" class="tituloTablas">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style='text-transform:uppercase;' value="0" maxlength="105" name="monaprob[]" id="monaprob"  type="text" size="16" onfocus="if (this.value == '0') {this.value = '';}"  onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage='';if (this.value == '') {this.value = '0';};money(this);" onkeyup="validar(this,this.value.charAt(this.value.length-1))" > Bs.
                    </TD>
                            <TD class="tituloTablas" align="center" bgcolor="White"> Año de Financiamiento<span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD align="center" bgcolor="White">
                    <select name="anio_fin[]" id="anio_fin" style="width:150px" onblur="this.style.backgroundColor='#ffffff'">
                        <option value="">--Seleccione--</option>
                       <?php
                                $i=0;                     
                        for($i=1999;$i<=2014;$i++){  ?>
                            <option value="<?php echo $i?>"><?php echo $i?></option>";
                            
            <?php
                }                                                               
                            ?></select>

                    </TD> 
                    <TD class="tituloTablas" bgcolor="White" style="width:18%">&nbsp;&nbsp;&nbsp; Monto Transferido a la Fecha<span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD bgcolor="White" class="tituloTablas">
                      <input style='text-transform:uppercase;' maxlength="105" name="montrasf[]" id="montrasf" value="0"  type="text" size="16" onfocus="if (this.value == '0') {this.value = '';}"  onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage='';if (this.value == '') {this.value = '0';};money(this);" onkeyup="validar(this,this.value.charAt(this.value.length-1))" > Bs.
                    </TD>                   
                    </tr>
                    <tr><TD class="tituloTablas" bgcolor="White" style="width:18%" colspan="">&nbsp;&nbsp;&nbsp; Monto Pendiente por<br>&nbsp;&nbsp;&nbsp; Transferir<span class="campo_obligatorio">*</span></TD>
                    <TD bgcolor="White" colspan="5" class="tituloTablas">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style='text-transform:uppercase;' value="0" maxlength="105" name="monpendientetrasf[]" id="monpendientetrasf"  type="text" size="16" onfocus="if (this.value == '0') {this.value = '';}"  onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage='';if (this.value == '') {this.value = '0';};money(this);" onkeyup="validar(this,this.value.charAt(this.value.length-1))" > Bs.
<input  maxlength="105" name="tipo_fin[]"  type="hidden" value="principal" size="20">
                    </TD> 
            </TR>
                    <!--<TR>
                    <TD class="subtituloBackground" colspan="6"> Financiamiento Adicional <span class="campo_obligatorio">*&nbsp;</span></TD>
                </TR>-->
         <!--<TR>
                    <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp;Posee Financiamiento<br>&nbsp;&nbsp;&nbsp;adicional <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD bgcolor="White" colspan="7">
   
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="credito_adicional[]" value="1" id="credito_adicional">
                    </TD></TR>--><!--financiamiento adicional--> 
            </TABLE>

<div id="adicional"></div>
<TABLE border="0" cellpadding="2" cellspacing="1" align="center" width="90%" id="credito1">
 <TR>
                    <TD class="subtituloBackground" colspan="6" align="center">  <input type="button" name="Agregar Financiamiento Adicional" value="Agregar Financiamiento Adicional" onclick="nueva_linea2()"></TD>
                </TR>
</TABLE>


                    <!--fin financiamiento adicional-->   

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
            <TD align="center" bgcolor="White"><input type="text" id="pago_0" onblur="javascript:uf_format(this);" onkeypress="return(currencyFormat(this,'.',',',event));sumar(0)" onchange="sumar(0)" onkeyup="sumar(0)" onpaste="sumar(0)"  name="pago_0" style="text-align: right;" size="10" value="<?php echo $ver_proyecto[0]['infraest_bsf'];?>" onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''"></TD>
            <TD align="center" bgcolor="White"><input type="text" id="pago_1" onblur="javascript:uf_format(this);" onkeypress="return(currencyFormat(this,'.',',',event));sumar(1)" onchange="sumar(1)" onkeyup="sumar(1)" onpaste="sumar(1)" name="pago_1" style="text-align: right;" size="10" value="<?php echo $ver_proyecto[0]['maq_eq_bsf'];?>" onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''"></TD>
            <TD align="center" bgcolor="White"><input type="text"  id="pago_2" onblur="javascript:uf_format(this);" onkeypress="return(currencyFormat(this,'.',',',event));sumar(2)" onchange="sumar(2)" onkeyup="sumar(2)" onpaste="sumar(2)" name="pago_2" style="text-align: right;" size="10" value="<?php echo $ver_proyecto[0]['cap_trab_bsf'];?>" onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''"></TD>
            <TD align="center" bgcolor="White"><input type="text"  id="pago_3" onblur="javascript:uf_format(this);" onkeypress="return(currencyFormat(this,'.',',',event));sumar(3)" onchange="sumar(3)" onkeyup="sumar(3)" onpaste="sumar(3)" name="pago_3" style="text-align: right;" size="10" value="<?php echo $ver_proyecto[0]['trans_tec'];?>" onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''"></TD>
            <TD align="center" bgcolor="White"><input type="text"  id="pago_4" onblur="javascript:uf_format(this);" onkeypress="return(currencyFormat(this,'.',',',event));sumar(4)" onchange="sumar(4)" onkeyup="sumar(4)" onpaste="sumar(4)" name="pago_4" style="text-align: right;" size="10" value="<?php echo $ver_proyecto[0]['camiones'];?>" onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''"></TD>
        </TR>
        <TR><TD class="tituloTablas" bgcolor="#F2f2f2" align="center" valign="middle" colspan="5">Inversi&oacute;n Total:</TD></TR>
        <TR>
            <TD class="texto_negro" bgcolor="White" align="center" valign="middle" colspan="5">
                <div id="efectivo" style="border: 0px solid ; font-family: verdana,arial; font-size: 0.8em; text-align: center; color: #cc3300; font-weight:bold;">
                <?php if(!isset($ver_proyecto[0]['inv_total']))
                {
                        echo "0,00";
                        $valor="0,00";
                }
                else
                {
                        echo $ver_proyecto[0]['inv_total'];
                        $valor=$ver_proyecto[0]['inv_total'];
                }
                ?>
                </div>
                <input name="pago" id="pago" value="<?php echo $valor; ?>" size="15" type="hidden">
            </TD>
        </TR>
    </TABLE><!-- ************************************ -->                                                              
           <TABLE border="0" cellpadding="2" cellspacing="1" align="center" width="90%" bgcolor="#D6D6D6" >
        <TR>
                    <TD class="subtituloBackground" colspan="6"> Productores <span class="campo_obligatorio">*&nbsp;</span></TD>
                </TR>
                  <TR>
                    <TD class="tituloTablas" bgcolor="White" style="width:18%">&nbsp;&nbsp;&nbsp; Directos <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD align="center" bgcolor="White">
                       <input style='text-transform:uppercase;' maxlength="3" name="productores_directos"  type="text" size="3" onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''">
                    </TD>                    
                
                    <TD class="tituloTablas" bgcolor="White">&nbsp; Masculino <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD align="center" bgcolor="White">
                        <input style='text-transform:uppercase;' maxlength="3" name="productores_masculino"  type="text" size="3"                                  onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''">
                    </TD>
                                       
                    <TD class="tituloTablas" align="center" bgcolor="White"> Femenino <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD align="center" bgcolor="White">
                         <input style='text-transform:uppercase;' maxlength="3" name="productores_femenino"  type="text" size="3"                                  onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''">

                    </TD> 
                  </TR>
           <tr><TD class="tituloTablas" bgcolor="White" style="width:18%" colspan="">&nbsp;&nbsp;&nbsp; Indirectos <span class="campo_obligatorio">*</span></TD>
                    <TD bgcolor="White" colspan="5">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input style='text-transform:uppercase;' maxlength="3" name="productores_indirectos"  type="text" size="3"                      onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''">
                    </TD> 
            </TR>
        <TR>
                    <TD class="subtituloBackground" colspan="6"> Datos de Producción <span class="campo_obligatorio">*&nbsp;</span></TD>
                </TR>
        <TR><TD class="tituloTablas" bgcolor="White" style="width:18%">&nbsp;&nbsp;&nbsp; Estatus de producción <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD class="tituloTablas" bgcolor="White">
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SI <input value="Si" name="estatus_produccion"  type="radio" >
            &nbsp;&nbsp;&nbsp;&nbsp;NO <input value="No" name="estatus_produccion" checked  type="radio" >
                    </TD>
                            <TD class="tituloTablas" align="center" bgcolor="White"> Fecha de Inicio de Producción<span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD align="center" bgcolor="White"><input size="10" id="f_date1" name="fecha_inicio_produccion" readonly="true" value="<?php echo $fecha_registro; ?>" onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''"/>
                        <button id="f_btn1">...</button>

                    </TD> 
                    <TD class="tituloTablas" bgcolor="White" style="width:18%">&nbsp;&nbsp;&nbsp; Producto Principal <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD bgcolor="White">
                      <input style='text-transform:uppercase;' maxlength="800" name="producto_principal"  type="text" size="20" onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''">
                    </TD>                   
                    </tr>
                    <tr><TD class="tituloTablas" bgcolor="White" style="width:18%" colspan="">&nbsp;&nbsp;&nbsp; Unidades de<br>&nbsp;&nbsp;&nbsp; Producci&oacute;n <span class="campo_obligatorio">*</span></TD>
                    <TD bgcolor="White">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                   
<input style='text-transform:uppercase;' maxlength="3" name="unidades_produccion"  type="text" size="3" onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''">
                    </TD> <TD class="tituloTablas" bgcolor="White" style="width:18%" colspan="">&nbsp;&nbsp;&nbsp; Capacidad a Instalar<br>&nbsp;&nbsp;&nbsp; (Unid/Año) <span class="campo_obligatorio">*</span></TD>
                    <TD bgcolor="White" colspan="5">
                        <input style='text-transform:uppercase;' maxlength="105" name="meta_produccion"  type="text" size="20" onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''">
                    </TD> 
            </TR>
            <TR>
                    <TD class="subtituloBackground" colspan="6"> Estado de Avance <span class="campo_obligatorio">*&nbsp;</span></TD>
                </TR>
                  <TR>
                    <TD class="tituloTablas" bgcolor="White" style="width:18%">&nbsp;&nbsp;&nbsp; Elaboración del Proyecto <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD align="center" bgcolor="White">
                                <select name="elaboracion" style="width:150px;" onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''">
                    <option value="0">--Seleccione--</option>
                    <option value="Idea de Proyecto">Idea de Proyecto</option>
                    <option value="Proyecto Formulado">Proyecto Formulado</option>
                    <option value="Proyecto NO Formulado">Proyecto NO Formulado</option>
                    </select>
                    </TD>                    
                
                    <TD class="tituloTablas" bgcolor="White">&nbsp; Proceso Formativo <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD  bgcolor="White" colspan="3">
                                <select name="formacion" style="width:150px;" onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''">
                    <option value="0">--Seleccione--</option>
                    <option value="Por Iniciar">Por Iniciar</option>
                    <option value="Iniciado">Iniciado</option>
                    <option value="Concluido">Concluido</option>
                    </select>
                    </TD> 
                  </TR>
         <TR>
                    <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp; Balance Político <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD colspan="5" bgcolor="White">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<TEXTAREA name="balance" id="balance" rows="1" cols="127" onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''"><?php echo $descripcionProy; ?></TEXTAREA>
                    </TD>
                </TR>
        <TR>
                    <TD class="subtituloBackground" colspan="6"> Ubicaci&oacute;n Geogr&aacute;fica <span class="campo_obligatorio">*&nbsp;</span></TD>
                </TR>
                <TR>
                    <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp; Estado <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD align="center" bgcolor="White">
                        <select name="estado" id="estado" style="width:150px" onblur="this.style.backgroundColor='#ffffff'"></select>
                    </TD>
                    <TD class="tituloTablas" align="center" bgcolor="White"> Municipio <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD align="center" bgcolor="White">
                        <select name="municipio" id="municipio" style="width:150px" onblur="this.style.backgroundColor='#ffffff'"></select>

                    </TD> 
                    <TD class="tituloTablas" align="center" bgcolor="White"> Circuito <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD align="center" bgcolor="White">
                        <select name="circuito" id="circuito" style="width:150px" onblur="this.style.backgroundColor='#ffffff'"></select> 

                    </TD> 
                </TR> 
                <TR>
                    <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp; Parroquia <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD align="center" bgcolor="White">
                        <select name="parroquia" id="parroquia" style="width:150px" onchange="buscar_latitud_longitud(0,0,parroquia.value,'');"             onblur="this.style.backgroundColor='#ffffff'"></select>
                 </TD>
                    <TD class="tituloTablas" align="center" bgcolor="White"> Eje Comunal <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD bgcolor="White" align="center">
                         <select name="eje_parroquial" id="eje_parroquial" style="width:150px" onblur="this.style.backgroundColor='#ffffff'">
            </select>                   
                    </TD>
            <TD class="tituloTablas" align="center" bgcolor="White" colspan="2"></TD>
                                                                                                  
                </TR> 
        <TR>
                    <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp; Latitud <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD align="center" bgcolor="White">
                        <input type="text" id="lat" name='latitud' size="22" onclick="alert(' Haz Click en el Mapa y mueve el marcador');" readonly 
                onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''">

                    </TD> 
                    <TD class="tituloTablas" align="center" bgcolor="White"> Longitud <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD bgcolor="White" align="center">
                     <input type="text" id="lng" name='longitud' size="22" onclick="alert(' Haz Click en el Mapa y mueve el marcador');" readonly
                onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''"> 

                    </TD> 
            <TD class="tituloTablas" align="center" bgcolor="White" colspan="2"></TD>
                </TR> 
                <TR>
                    <TD class="tituloTablas" bgcolor="White">&nbsp;&nbsp;&nbsp; Direcci&oacute;n <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD align="center" bgcolor="White" colspan="2">
                       &nbsp;<input type="text" id="address" name='direccion_proyecto' size="50"                                            onblur="this.style.backgroundColor='#ffffff';this.style.backgroundImage=''">
                    </TD>
                    
            <TD class="tituloTablas"  align="center" bgcolor="White"> Estatus <span class="campo_obligatorio">*&nbsp;</span></TD>
                    <TD align="center" bgcolor="White" colspan="2">
                        <div id="markerStatus" style="color: #cc3300;">&nbsp;<i>Haz Click y mueve el marcador.</i></div>
                    </TD>                                                                                   
                </TR> 
        <TR>
                    <TD bgcolor="White" colspan="6"> <div id="map_canvas"></div> </TD>
                </TR>
            </TABLE>
        <br>
        <TABLE border="0" cellpadding="2" cellspacing="1" align="center" width="90%" bgcolor="#D6D6D6" id="adjuntos">
                <TR>
                    <TD class="subtituloBackground" colspan="6"> Registro Fotográfico</TD>
                </TR>
        <tr bgcolor="White">
        <td class="tituloTablas" colspan="3" style="font-size:10px;">Extensiones permitidas: jpeg, jpg, png</td>        
        </tr>
        <tr bgcolor="White">
        <td class="tituloTablas" align="center">Archivo</td>
        <td class="tituloTablas" align="center">Descripci&oacute;n</td>
        <td class="tituloTablas" align="center">Eliminar</td>
        </tr>           
        </TABLE>
        <TABLE border="0" cellpadding="2" cellspacing="1" align="center" width="90%">
                <TR>
                    <TD  colspan="6" ><div id="s" style="color: blue;font-size:10px;"><a onClick='addCampo()'>Haga click aqui si desea subir Fotos</a></div> </TD>
                </TR>
        </TABLE>
            <br>




            <!--            <TABLE id="tablaDefProy" border="0" cellpadding="0" cellspacing="0" align="center" width="90%" class="tablaForm">                
                            <TR>
                                <TD>
                                    <BR>
                                    <TABLE border="0" cellpadding="0" cellspacing="2" align="center" width="90%">
                                        <TR><TD class="subtituloBackground"> Nombre del Proyecto <span class="campo_obligatorio">*&nbsp;</span></TD></TR>
                                        <TR><TD align="center"><TEXTAREA name="nombreProy" id="nombreProy" rows="2" cols="130"><?php //= $nombreProy   ?></TEXTAREA></TD></TR>
                                    </TABLE>
                                </TD>
                            </TR>
                            <TR>
                                <TD>
                                    <TABLE border="0" cellpadding="0" cellspacing="2" align="center" width="90%">
                                        <TR><TD class="subtituloBackground"> Descripci&oacute;n del Proyecto <span class="campo_obligatorio">*&nbsp;</span></TD></TR>
                                        <TR><TD align="center"><TEXTAREA name="descripcionProy" id="descripcionProy" rows="2" cols="130"><?php //= $descripcionProy   ?></TEXTAREA></TD></TR>
                                    </TABLE>
                                </TD>
                            </TR>
                            <TR>
                                <TD>
                                    <TABLE border="0" cellpadding="0" cellspacing="3" align="center" width="90%">
                                        <TR><TD class="subtituloBackground">Cadena / Organizaci&oacute;n / Comunidad / <span class="campo_obligatorio">*&nbsp;</span></TD></TR>
                                        <TR>
                                            <TD>
                                                <TABLE border="0" cellpadding="2" cellspacing="1" align="center" width="100%" bgcolor="#D6D6D6">
                                                    <TR>
                                                        <TD class="tituloTablas" align="center" bgcolor="#F2F2F2"> Cadena <span class="campo_obligatorio">*&nbsp;</span></TD>
                                                        <TD class="tituloTablas" align="center" bgcolor="#F2F2F2"> &Aacute;rea <span class="campo_obligatorio">*&nbsp;</span></TD>                                            
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
                                                        <TD class="tituloTablas" align="center" bgcolor="#F2F2F2"> Tipo de Organizaci&oacute;n <span class="campo_obligatorio">*&nbsp;</span></TD>
                                                        <TD class="tituloTablas" align="center" bgcolor="#F2F2F2"> Organizaci&oacute;n <span class="campo_obligatorio">*&nbsp;</span></TD>                                            
                                                    </TR>
                                                    <TR>
                                                        <TD align="center" bgcolor="White"><?php //= cargarComboConEvento('tipo_org', $conn, queryComboTipoOrg(), $tipo_org, "onchange='document.formRegistrarProyecto.submit();'");   ?></TD>
                                                        <TD align="center" bgcolor="White">
            <?php
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
                                                        <TD class="tituloTablas" align="center" bgcolor="#F2F2F2">Estado <span class="campo_obligatorio">*&nbsp;</span></TD>
                                                        <TD class="tituloTablas" align="center" bgcolor="#F2F2F2">Municipio <span class="campo_obligatorio">*&nbsp;</span></TD>
                                                        <TD class="tituloTablas" align="center" bgcolor="#F2F2F2">Parroquia <span class="campo_obligatorio">*&nbsp;</span></TD>
                                                    </TR>
                                                    <TR>
                                                        <TD align="center" bgcolor="White"><?php //= cargarComboConEvento('estado', $conn, queryComboEstado(), $estado, "onchange='document.formRegistrarProyecto.submit();'");   ?></TD>
                                                        <TD align="center" bgcolor="White">
            <?php
            /* if (!empty($estado)) {
              cargarComboDependienteConEvento('municipio', $conn, queryComboMunicipio($estado), $municipio, "onchange='document.formRegistrarProyecto.submit();'");
              } else {
              echo "<div id='id_municipio'><select name='municipio' id='municipio' data-placeholder='Seleccione Estado...' class='chzn-select' style='width:220px;' tabindex='2'><option value=''>Seleccione Estado</option></select></div>";
              } */
            ?>
                                                        </TD>
                                                        <TD align="center" bgcolor="White">
            <?php
            /* if (!empty($municipio) AND !empty($estado)) {
              cargarComboParroquia('parroquia', $conn, queryComboParroquia($municipio), $parroquia);
              } else {
              echo "<div id='id_parroquia'><select name='parroquia' id='parroquia' data-placeholder='Seleccione Municipio...' class='chzn-select' style='width:220px;' tabindex='2'><option value=''>Seleccione Municipio</option></select></div>";
              } */
            ?>
                                                    </TR>
                                                    <TR><TD colspan="3" class="tituloTablas" align="center" bgcolor="#F2F2F2">Direcci&oacute;n <span class="campo_obligatorio">*&nbsp;</span></TD></TR>
                                                    <TR><TD colspan="3" bgcolor="White" align="center"><TEXTAREA name="direccionOrg" id="direccionOrg" rows="2" cols="130"><?php // echo $direccionOrg ;?></TEXTAREA></TD></TR>
                                                </TABLE>
                                            </TD>
                                        </TR>
                                    </TABLE>
                                    <BR>
                                </TD>
                            </TR>
                        </TABLE>-->
            <BR>
            <TABLE id="tablaBoton" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
                <TR><TD align="center"><INPUT id="regProyecto" name="regProyecto" type="submit" value="REGISTRAR" class="botonPeq"></TD></TR>
            </TABLE>
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
         <script src="../js/jcombo1.js" type="text/javascript"></script>
    </BODY>
</HTML>
