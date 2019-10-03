<?php
// session_start();
extract($_POST);
extract($_GET);

include_once ("../funciones/funciones_session.php");
//comprobarSession($_SESSION['adminProy']);
include("../conexion/conexionpg.php");
require_once("../funciones/queryUsuarios.php");
include_once ("../funciones/queryProyectos.php");
require_once("../funciones/funciones.php");

$id_usuario_registra = 1;
// $id_usuario_registra = $_SESSION['adminProy']['id_usuario'];

if (isset($guardar_registro)) {
    $mensaje = validar_usuario($cedula);
    if ($mensaje == 'error') {
        echo "<script type='text/javascript' languaje='javascript'> alert('Esta Cedula ya Ha Sido Registrada!!!'); </script>";
    } else {
        $ip_maquina_registra = capturar_ip();
        $fecha_registro = date('Y-m-d H:i:s');
        registrar_usuario(dar_formato($cedula), dar_formato($nombres_usuario), dar_formato($email), dar_formato($login), dar_formato(md5($clave)), dar_formato($telefono_1), dar_formato($telefono_2), dar_formato($fecha_registro), dar_formato($id_usuario_registra), dar_formato($ip_maquina_registra), dar_formato($id_perfil));

        $exito_registro = 1;
        if ($exito_registro == 1) {
            echo "<script type='text/javascript' languaje='javascript'>alert('El Usuario Fue Registrado con Exito !!!'); </script>";
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
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="../css/css1.css" type="text/css" />

        <script language="JavaScript"> </script>

        <script type='text/javascript' src="../ajax/ajax_busca/js/js_ajax_busca.js"></script>
        <script type='text/javascript' src="../js/general.js"></script>

        <link rel="stylesheet" href="slimbox-1.71a/css/slimbox.css" type="text/css" media="screen" />
        <style type="text/css">
            body {
                background-color: #fff;
                font-family: arial, helvetica, sans-serif;
                color: #000;
            }
            h1, p {
                text-align: center;
            }
            p {
                margin-top: 100px;
            }
            a {
                font-weight: bold;
                color: #f00;
            }
        </style>
    </head>

    <body>
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

<!--	<input name="p_nombre" id="p_nombre_a" type="hidden" value="<? //=$p_nombre   ?>">
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
                <TD bgcolor="White" class="tituloTablas">&nbsp;Login:<a class="campo_obligatorio" >&nbsp;*</a></TD>
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
                    <TD bgcolor="White"><span class="tituloTablas">&nbsp;Perfil de Usuario:<a class="campo_obligatorio" >&nbsp;*</a></span></TD>
                    <TD bgcolor="White"><?php cargar_combo_perfil('id_perfil','id_perfil', $conexion, queryComboperfil(), "", ""); ?></TD>
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
                    </TD>
                </TR>
            </TABLE>

            <!-- FIN CUERPO-->
        </FORM>
        <?php echo $v3->obtener_js(); ?>
    </body>
</html>
