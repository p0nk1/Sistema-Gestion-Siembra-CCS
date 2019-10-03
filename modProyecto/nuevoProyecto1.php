<?php

include_once ("../funciones/funciones_session.php");
include_once ("../conexion/conexionpg.php");
include_once ("../funciones/queryProyectos.php");
include_once ("../funciones/funciones.php");
require_once("../funciones/queryUsuarios.php");

extract($_POST);
extract($_GET);
$id_usuario_registra = 1;

if (isset($guardar_registro)) {
    $mensaje = validar_usuario($cedula);
    if ($mensaje == 'error') {
        echo "<script type='text/javascript' languaje='javascript'> alert('Esta Cedula ya Ha Sido Registrada!!!'); </script>";
    } else {
        $ip_maquina_registra = capturar_ip();
        $fecha_registro = date('Y-m-d H:i:s');
        registrar_usuario(dar_formato($cedula), dar_formato($nombres_usuario),
         dar_formato($email), dar_formato($login), dar_formato(md5($clave)), dar_formato($telefono_1), dar_formato($telefono_2), 
         dar_formato($fecha_registro), dar_formato($id_usuario_registra), dar_formato($ip_maquina_registra), 4,$parroquia);

        $exito_registro = 1;
        if ($exito_registro == 1) {
            echo "<script type='text/javascript' languaje='javascript'>alert('El Usuario Fue Registrado con Exito !!!'); document.location.href='index.php' </script>";
        }
    }
}

/* Inicio de las Validaciones */
include("../clases/validacion/validacion.inc.php");
$v3 = new MCI_validacion("registrar_nuevo_usuario");

$v3->agregar_validacion("cedula", "req", null, "Debe ingresar el N&uacute;mero de C&eacute;dula");
$v3->agregar_validacion("cedula", "maxlon", 11, "La c&eacute;dula del Usuario no debe ser mayor de 11 d&iacute;gitos");
$v3->agregar_validacion("cedula", "minlon", 4, "La c&eacute;dula del Usuario no debe ser menor a 4 d&iacute;gitos");
$v3->agregar_validacion("cedula", "noespacio", null, "El N&uacute;mero de C&eacute;dula no debe contener espacios");
$v3->agregar_validacion("nombres_usuario", "req", null, "Debe ingresar los Nombres y Apellidos del Usuario");
$v3->agregar_validacion("nombres_usuario", "maxlon", 50, "Los Nombres y Apellidos del Usuario no deben ser mayor de 50 caracteres");
$v3->agregar_validacion("nombres_usuario", "minlon", 3, "Los Nombres y Apellidos del Usuario no deben ser menor de 3 caracteres");
$v3->agregar_validacion("telefono_1", "maxlon", 11, "El N&uacute;mero de Tel&eacute;fono 1 no debe ser mayor de 11 d&iacute;gitos");
$v3->agregar_validacion("telefono_1", "minlon", 11, "El N&uacute;mero de Tel&eacute;fono 1 no debe ser menor de 11 d&iacute;gitos");
$v3->agregar_validacion("telefono_1", "noespacio", null, "El N&uacute;mero de Tel&eacute;fono 1 no debe contener espacios");
$v3->agregar_validacion("telefono_2", "maxlon", 11, "El N&uacute;mero de Tel&eacute;fono 2 no debe ser mayor de 11 d&iacute;gitos");
$v3->agregar_validacion("telefono_2", "minlon", 11, "El N&uacute;mero de Tel&eacute;fono 2 no debe ser menor de 11 d&iacute;gitos");
$v3->agregar_validacion("telefono_2", "noespacio", null, "El N&uacute;mero Tel&eacute;fono 2 no debe contener espacios");
$v3->agregar_validacion("email", "req", null, "Debe ingresar la direcci&oacute;n de Correo Electr&oacute;nico");
$v3->agregar_validacion("email", "email", null, "La direcci&oacute;n de Correo Electr&oacute;nico debe ser valida");
$v3->agregar_validacion("email", "noespacio", null, "El Correo Electr&oacute;nico no debe contener espacios");
$v3->agregar_validacion("email_confirm", "req", null, "Es necesario confirmar el Correo Electr&oacute;nico");
$v3->agregar_validacion("email_confirm", "camposiguales", "email", "El Correo Electr&oacute;nico no coincide");
//$v3->agregar_validacion("login", "alnumguion", null, "La Clave del Usuario no debe contener caracteres especiales");
$v3->agregar_validacion("login", "req", null, "El login del Usuario es obligatorio");
$v3->agregar_validacion("login", "noespacio", null, "El login del Usuario no debe contener espacios");
$v3->agregar_validacion("login", "maxlon", 11, "El login del Usuario no debe ser mayor de 11 d&iacute;gitos");
$v3->agregar_validacion("login", "minlon", 2, "El login del Usuario no debe ser menor a 2 d&iacute;gitos");
$v3->agregar_validacion("clave", "alnumguion", null, "La Clave del Usuario no debe contener caracteres especiales");
$v3->agregar_validacion("clave", "req", null, "La Clave del Usuario es obligatoria");
$v3->agregar_validacion("clave", "noespacio", null, "La Clave del Usuario no debe contener espacios");
$v3->agregar_validacion("clave", "maxlon", 11, "La Clave del Usuario no debe ser mayor de 11 d&iacute;gitos");
$v3->agregar_validacion("clave", "minlon", 4, "La Clave del Usuario no debe ser menor a 4 d&iacute;gitos");
$v3->agregar_validacion("clave_confirm", "req", null, "Es necesario confirmar la Clave");
$v3->agregar_validacion("clave_confirm", "camposiguales", "clave", "La Clave no coincide");
$v3->agregar_validacion("id_perfil", "req",null,"Por favor seleccione el Perfil del Usuario");
//$v3->agregar_validacion("tmptxt", "req", null, "La verificaci&oacute;n es un campo obligatorio");
echo $v3->obtener_archivos_js("../clases/validacion/js/");

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
<!-- ************************************ -->  
            <TABLE border="0" cellpadding="0" cellspacing="0" width="90%" align="center" height="10%">
                    <TR>
                        <TD width="30%"><img src="imagenes/imgindex/bann_alcaldia.gif"></TD>
                        <TD><h1>REGISTRO DE PROYECTOS SOCIOPRODUCTIVOS</h1></TD>
                        <TD width="20%" align="right"><img src="imagenes/imgindex/logo_peq_alcaldia.png" width="55" height="55"></TD>
                    </TR>
                    <TR><TD colspan="3"><HR></TD></TR>
                </TABLE>
                <!-- INICIO CUERPO-->
                <FORM method="POST" name="registrar_nuevo_usuario" action="" enctype="multipart/form-data">
                    <BR>
                    <TABLE border="0" width="70%" cellpadding="0" cellspacing="0" align="center">
                        <TR>
                            <TD class="tituloForm">REGISTRO NUEVOS USUARIOS</TD>
                        </TR>
                        <TR><TD><HR></TD></TR>
                    </TABLE>
                    <TABLE border="0" width="70%" cellpadding="2" cellspacing="2" align="center">
                        <TR>
                            <TD class="alerta2" height="40">
                                <?php echo $v3->html_error("registrar_nuevo_usuario"); ?><?php echo $v3->campo_oculto(); ?>
                            </TD>
                        </TR>
           </TABLE> 
              <TABLE border="0" width="70%" cellpadding="5" cellspacing="1" bgcolor="#D6D6D6" align="center">

                <!-- ***************************  NUEVA BUSQUEDA 2 ONIDEX / SENIAT *********************************************-->
                <TR>
                    <TD class="tituloTablas" width="13%" bgcolor="White">&nbsp;C&eacute;dula:&nbsp; <span class="texto_rojo">*</span></TD>
                    <TD class="texto_campo" width="20%" bgcolor="White">
<!--                        <input id="por_donde_buscar" name="por_donde_buscar" type="hidden" value='1'>-->
                        <input  onkeypress='return(formato_campo(this,event,1))' onpaste='return(formato_campo(this,event,1))' style='text-transform:uppercase;' maxlength="12" name="cedula"  type="text" size="30">
                    </TD>
                </TR>
                <TR>
                    <TD class="tituloTablas"  bgcolor="White">&nbsp;Nombres y Apellidos:&nbsp;<span class="texto_rojo">*</span></TD>
                    <TD class="texto_campo"  bgcolor="White">
<!--                        <input id="oculto_id_nombre" name="oculto_id_nombre" type="hidden">-->
                        <input onkeypress='return(formato_campo(this,event,2))' onpaste='return(formato_campo(this,event,2))' name="nombres_usuario" maxlength="51" type="text" size="30" onkeyup="this.value = this.value.toUpperCase();">
                    </TD>
                </TR>
                <!-- ************************** FIN NUEVA BUSQUEDA 2 ONIDEX / SENIAT ************************************-->

<!--    <input name="p_nombre" id="p_nombre_a" type="hidden" value="<? //=$p_nombre   ?>">
        <input name="s_nombre" id="s_nombre_a" type="hidden" value="<? //=$s_nombre   ?>">
        <input name="p_apellido" id="p_apellido_a" type="hidden" value="<? //=$p_apellido   ?>">
        <input name="s_apellido" id="s_apellido_a" type="hidden"  value="<? //=$s_apellido   ?>">
        <INPUT type="hidden" name="fecha_nacimiento" id="fecha_nacimiento" value="<? //=$fecha_nacimiento   ?>">-->

                <TR>
                    <TD class="tituloTablas" width="20%" bgcolor="White">&nbsp;Tel&eacute;fono 1:</TD>
                    <TD class="texto_campo" bgcolor="White">
                        <input onkeypress='return(formato_campo(this,event,1))' onpaste='return(formato_campo(this,event,1))' name="telefono_1" type="text" maxlength="12" size="30">
                    </TD>
                </tr>
                <tr>
                    <TD class="tituloTablas" width="20%" bgcolor="White">&nbsp;Tel&eacute;fono 2:</TD>
                    <TD class="texto_campo" bgcolor="White">
                        <input onkeypress='return(formato_campo(this,event,1))' onpaste='return(formato_campo(this,event,1))' name="telefono_2" type="text" maxlength="12" size="30">
                    </TD>
                </TR>
                <!-- ******************************************* VALIDA EMAIL COINCIDAN  ************************************************-->
                <TR class="textoCampo">
                    <TD bgcolor="White" class="tituloTablas">&nbsp;Ingresar E-mail:<a class="campo_obligatorio" >&nbsp;*</a></TD>
                    <TD bgcolor="White"><input name="email" type="text" size="30"></TD>
                </TR>
                <TR class="textoCampo">
                    <TD bgcolor="White"><span class="tituloTablas">&nbsp;Confirmar E-mail:<a class="campo_obligatorio" >&nbsp;*</a></span></TD>
                    <TD bgcolor="White"><input name="email_confirm" type="text" size="30"></TD>
                </TR>
                <!-- ******************************************* FIN VALIDA EMAIL COINCIDAN  ************************************************-->
                <!-- ******************************************* login y password  ************************************************-->
                <TD bgcolor="White" class="tituloTablas">&nbsp;Usuario:<a class="campo_obligatorio" >&nbsp;*</a></TD>
                <TD bgcolor="White"><input name="login" type="text" size="30" maxlength="15"></TD>
                </TR>
                <TR class="textoCampo">
                    <TD bgcolor="White"><span class="tituloTablas">&nbsp;Contrase&ntilde;a:<a class="campo_obligatorio" >&nbsp;*</a></span></TD>
                    <TD bgcolor="White"><input name="clave" type="password" size="30" maxlength="15"></TD>
                </TR>
                <TR class="textoCampo">
                    <TD bgcolor="White"><span class="tituloTablas">&nbsp;Confirmar Contrase&ntilde;a:<a class="campo_obligatorio" >&nbsp;*</a></span></TD>
                    <TD bgcolor="White"><input name="clave_confirm" type="password" size="30" maxlength="15"></TD>
                </TR>
                <TR class="textoCampo">
                    <TD bgcolor="White"><span class="tituloTablas">&nbsp;Estado<a class="campo_obligatorio" >&nbsp;*</a></span></TD>
                    <TD bgcolor="White">
                     <select name="estado" id="estado" style="width:150px" onblur="this.style.backgroundColor='#ffffff'"></select>
                    </TD>
                </TR>
                <TR class="textoCampo">
                    <TD bgcolor="White"><span class="tituloTablas">&nbsp;Municipio<a class="campo_obligatorio" >&nbsp;*</a></span></TD>
                    <TD bgcolor="White">
                     <select name="municipio" id="municipio" style="width:150px" onblur="this.style.backgroundColor='#ffffff'"></select>
                    </TD>
                </TR>
                <TR class="textoCampo">
                    <TD bgcolor="White"><span class="tituloTablas">&nbsp;Circuito<a class="campo_obligatorio" >&nbsp;*</a></span></TD>
                    <TD bgcolor="White">
                    <select name="circuito" id="circuito" style="width:150px" onblur="this.style.backgroundColor='#ffffff'"></select> 
                    </TD>
                </TR>
                <TR class="textoCampo">
                    <TD bgcolor="White"><span class="tituloTablas">&nbsp;Parroquia<a class="campo_obligatorio" >&nbsp;*</a></span></TD>
                    <TD bgcolor="White">
                     <select name="parroquia" id="parroquia" style="width:150px" onchange="buscar_latitud_longitud(0,0,parroquia.value,'');" onblur="this.style.backgroundColor='#ffffff'"></select>
                    </TD>
                </TR>
                <TR class="textoCampo">
                    <TD bgcolor="White"><span class="tituloTablas">&nbsp;Eje Comunal<a class="campo_obligatorio" >&nbsp;*</a></span></TD>
                    <TD bgcolor="White">
                     <select name="eje_parroquial" id="eje_parroquial" style="width:150px" onblur="this.style.backgroundColor='#ffffff'">
                    </TD>
                </TR>
         
                <!-- ******************************************* fin login y password  ************************************************-->
                <!--<TR>
                    <TD bgcolor="White" class="tituloTablas" rowspan="2">&nbsp;Verificacion:<a class="campo_obligatorio" >&nbsp;*</a></TD>
                    <TD bgcolor="White" class="textoCampo">
                        <img src="../clases/captcha/captcha.php" style="border:0px solid" width="200" height="45" >
                    </TD>
                </TR>
                <TR>
                    <TD bgcolor="White" class="tituloTablas">
                        <input name="tmptxt" type="text" id="tmptxt" size="30">
                        <input name="action" type="hidden" value="checkdata">
                    </TD>
                </TR>-->
            </TABLE>

            <BR><BR>
            <TABLE border="0" width="80%" cellpadding="5" cellspacing="1" align="center">
                <TR>
                    <TD bgcolor="White" colspan="4" align="center">
                        <input type="submit" class="botonPeq" name="guardar_registro" value="GUARDAR">
                        <input type="submit" class="botonPeq" name="guardar_registro" value="REGRESAR" onclick="document.location.href ='index.php'">
                        
                    </TD>
                </TR>
            </TABLE>

            <!-- FIN CUERPO-->

        </FORM>
        <?php echo $v3->obtener_js(); ?>                                                           
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
