<?php
	session_start();
	include_once ("../funciones/funciones_session.php");
	comprobarSession($_SESSION['adminProy']);
	
	extract($_POST);
	extract($_GET);

	if ($_GET['msg']==1){
 		echo "<script language=javascript>alert('Usuario NO Existe...!');</script>";
	}

	require_once("../conexion/conexionpg.php");
	require_once("../funciones/queryUsuarios.php");
	require_once("../funciones/funciones.php");

	if($cambiar){
		echo 'sasf '.$clave1.'<br>';
		echo 'sfsd '.$clave2;
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-TRansitional.dTD">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<TITLE>SISTEMA DE ADMINISTRADOR DE PROYECTOS</TITLE>
<script  language="javascript">
//Lista de caracteres incorrectos a la hora de insertar un nombre de usuario o contrasena
var car_inva = new Array(" ","!","|","\"","#","$","%","&","/","(",")","=","?","[","]","-",">","<","°","¬");
var img_mal  = "<img src='../imagenes/invalido.png'>";
var img_bien = "<img src='../imagenes/valido.png'>";


function borrar_contrasena2()
{
	document.registro.clave2.value="";
	document.getElementById("id_clave2").innerHTML="";
	document.getElementById("res_clave2").innerHTML="";
}

//Valida si una contrasena esta bien insertado
// valor            :  valor a evaluar
// id_mensaje_val   :  id donde se mostrara un mensaje de la validacion
// input_validacion :  nombre del input que servira como bandera
function validar_contrasena(valor,id_mensaje_val,input_validacion,comparar_contrasena,valor2)
{	
        var msg="";
	var user=valor.value;
	if( user.length==0 )
        {
		msg="<input type='hidden'  name='"+input_validacion+"' value='1'>";
		document.getElementById(id_mensaje_val).innerHTML=msg;
        }
	if( user.length>0 )
        {
                band=false;
                for( i=0; i<user.length ; i++ )
                {
                        for (j=0;j<car_inva.length;j++)
                        {
                                if( car_inva[j]==user[i] )
                                {
                                        band=true;
                                        break;
                                }
                        }
                        if( band==true )
                                break;
                }
                if( user.length==0 )
                {
        		msg="<input type='hidden'  name='"+input_validacion+"' value='0'>";
                        msg=msg+"&nbsp;<font color='#FF0000'><b>"+img_mal+" Debes colocar la contrase&ntilde;a</b></font>";
                        document.getElementById(id_mensaje_val).innerHTML=msg;
                }else
                if( band==true )
                {
        		msg="<input type='hidden'  name='"+input_validacion+"' value='0'>";
                        msg=msg+"&nbsp;<font color='#FF0000'><b>"+img_mal+" Tiene caracteres inv&aacute;lidos</b></font>";
                        document.getElementById(id_mensaje_val).innerHTML=msg;
                }else
                {
			band=true;
			if( comparar_contrasena==true )
			{
				//alert( document.getElementById(valor2).value +" == "+valor.value )
				if( document.getElementById(valor2).value!=valor.value )
				{
					msg="<input type='hidden'  name='"+input_validacion+"' value='0'>";
					msg=msg+"&nbsp;<font color='#FF0000'><b>"+img_mal+"No coinciden los campos</b></font>";
					document.getElementById(id_mensaje_val).innerHTML=msg;
					band=false;
				}
			}
			if( band==true )
			{
				var resto_msg="<font color='#FF0000'><b>(Contrase&ntilde;a d&eacute;bil)</b></font>";
				if( user.length>=4 &&  user.length<=7 )
					resto_msg="<font color='#FF9900'><b>(Contrase&ntilde;a media)</b></font>";
				if( user.length>=8  )
					resto_msg="<font color='#009900'><b>(Contrase&ntilde;a fuerte)</b></font>";
				msg="<input type='hidden'  name='"+input_validacion+"' value='1'>";
				msg=msg+"&nbsp;<font color='#009900'><b>"+img_bien+" V&aacute;lida "+resto_msg+" </b></font>";
				document.getElementById(id_mensaje_val).innerHTML=msg;
			}
                }
        }
}


function validar_campos(valor,id_mensaje_val,input_validacion)
{	
        var msg="";
	var user=valor.value;
 	if( user.length==0 )
         {
 		msg="<input type='hidden'  name='"+input_validacion+"' value='1'>";
 		document.getElementById(id_mensaje_val).innerHTML=msg;
         }
}



function validar_formulario()
{
	cont=0;
		
	if( document.registro.clave_validacion1.value==0 )
	{
        	document.getElementById("res_clave1").innerHTML="&nbsp;<font color='#FF0000'><b>"+img_mal+" Debes colocar la contrase&ntilde;a</b></font>";
		cont++;
	}
	if( document.registro.clave_validacion2.value==0 )
	{
        	document.getElementById("res_clave2").innerHTML="&nbsp;<font color='#FF0000'><b>"+img_mal+" Debes colocar la contrase&ntilde;a de confirmaci&oacute;n</b></font>";
		cont++;
	}
	if(document.registro.cambio.value==2 ){
		if( document.registro.clave_validacion3.value==0 && document.registro.clave_validacion3.value==2)
		{
			document.getElementById("res_login1").innerHTML="&nbsp;<font color='#FF0000'><b>"+img_mal+" Debes colocar el Usuario</b></font>";
			cont++;
			
		}
	}
	if(cont==0)
		document.registro.submit();
}
</script>
</HEAD>

<link href="../css/css.css" rel="stylesheet" type="text/css" />
<link href="../css/css1.css" rel="stylesheet" type="text/css" />
<BODY>
<TABLE width="100%" border="0" cellspacing="0" cellpadding="0" align="center" >
<TR>
	<TD height="250">
		<form name="registro" method="post" action="acceso.php">
			<TABLE width="100%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#D6D6D6">
			<TR>
				<TD colspan="5" align="center" class="titulo">CAMBIAR CONTRASEÑA</TD>
			</TR>
			<TR class="texto_negro">
				<TD colspan="5" align="center" bgcolor="#ffffff">&nbsp;</TD>
			</TR>
			<TR>
				<TD class="texto_negro_no_size" colspan="5" align="center" bgcolor="#fff">
					Bienvenido <strong><?php echo $_SESSION['adminProy']['nombre_usuario'];?></strong>
				</TD>
			</TR>
			<TR class="texto_negro">
				<TD colspan="5" align="center" bgcolor="#ffffff">Login Actual: <sTRong><?php echo $_SESSION['adminProy']['login']; ?></sTRong></TD>
			</TR>
			<TR class="texto_negro_no_size">
				<TD bgcolor="#F2f2f2"><span class="texto_negro">Nueva Contraseña:</span></TD>
				<TD bgcolor="#ffffff" colspan="3">
					<div id='clave1' >
					<input type='password' onchange="borrar_contrasena2(), validar_contrasena(this,'res_clave1','clave_validacion1',false,'')" onkeypress="borrar_contrasena2(), validar_contrasena(this,'res_clave1','clave_validacion1',false,'')" onkeyup="borrar_contrasena2(), validar_contrasena(this,'res_clave1','clave_validacion1',false,'')" onpaste="borrar_contrasena2(), validar_contrasena(this,'res_clave1','clave_validacion1',false,'')" id='id_clave1' name='clave1'>
				</div>				
				</TD>
<TD bgcolor="#ffffff">
	<div style="width:200px;font-family:Arial, Helvetica, sans-serif;font-size:0.9em; float:left;" id='res_clave1'>
	<input type='hidden' id='id_clave_validacion1' name='clave_validacion1' value='0'>
	</div>
</TD>
			</TR>
			<TR class="texto_negro_no_size">
				<TD bgcolor="#F2f2f2"><span class="texto_negro">Confirmar Contraseña:</span></TD>
				<TD bgcolor="#ffffff" colspan="3">
					<div id='clave2' >
						<input type='password' onchange="validar_contrasena(this,'res_clave2','clave_validacion2',true,'id_clave1')" 	onkeypress="validar_contrasena(this,'res_clave2','clave_validacion2',true,'id_clave1')" onkeyup="validar_contrasena(this,'res_clave2','clave_validacion2',true,'id_clave1')" onpaste="validar_contrasena(this,'res_clave2','clave_validacion2',true,'id_clave1')" id='id_clave2' name='clave2'>
					</div>
				</TD>
<TD bgcolor="#ffffff">
	<div style="width:200px;font-family:Arial, Helvetica, sans-serif;font-size:0.9em; float:left;" id='res_clave2'>
		<input type='hidden' id='id_clave_validacion2' name='clave_validacion2' value='0'>
	</div>
</TD>
			</TR>
			<TR>
				<TD height="35" colspan="5" align="center" bgcolor="#ffffff">
					<?php
						if ($_GET['cerrar']=="S")
						echo "<input type='hidden' name='cerrar' value='2' />";
					?>
					<input type="hidden" name="cambio" value="1" />
					<input type="button" class="boton" value="Cambiar" onclick="validar_formulario()">
				</TD>
			</TR>
			</TABLE>
		</form>
	</TD>
</TR>
</TABLE>
</BODY>
</tml>
