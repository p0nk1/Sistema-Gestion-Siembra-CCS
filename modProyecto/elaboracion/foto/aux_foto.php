<?php
session_start();
include_once ("../../funciones/funciones_session.php");comprobarSession($_SESSION['econinfo']);
extract($_FILES);
include_once "../../funciones/funciones.php";



$ancho_predeterminado=120;
$alto_predeterminado=150;
$peso_predeterminado_en_bytes=300000;
//$destino_fotos_en_servidor="../../fotografias_aux/";

# Verificamos que el formulario no ha sido enviado aun
$foto_ha_sido_cargada = (isset($archivo)) ? true : false;
$guardar_foto_en_bd= (isset($guardar_foto)) ? true : false;

$mensaje_error_tipo_no_valido=$mensaje_error_tamano_no_valido=0;

if($foto_ha_sido_cargada){
	# Variables del archivo
	$_SESSION['foto']['mime'] = $_FILES["archivo"]["type"];
	$tmp_name=$_FILES["archivo"]["tmp_name"];
	$_SESSION['foto']['size'] = $_FILES["archivo"]["size"];
	$propiedades_img= getimagesize($tmp_name);
	
	//Validamos el tipo de imagen (solo gif, jpeg, bmp, y png)
	
        $extension=validar_mime($propiedades_img[2]);
        if($extension!=false){
		if($_SESSION['foto']['size']<=$peso_predeterminado_en_bytes){
			//$_SESSION['ingresar_padron']['foto']['tamano']=redimensionar_imagen_vista($propiedades_img[1],$propiedades_img[0],$alto_predeterminado,$ancho_predeterminado);
                        
			$fp = fopen($tmp_name, "rb");
			$buffer = fread($fp, filesize($tmp_name));
			fclose($fp);
			
			$_SESSION['foto']['binario']=pg_escape_bytea($buffer);
			$_SESSION['foto']['bandera']=1;
			
//			if (file_exists($_SESSION['ingresar_padron']['foto']['ruta_temporal']))unlink($_SESSION['ingresar_padron']['foto']['ruta_temporal']);
//                        $_SESSION['ingresar_padron']['foto']['ruta_temporal']=$destino_fotos_en_servidor.$_SESSION['ingresar_padron']['foto']['nombre'];
			//echo "<br />ruta aux: ".$_SESSION['ingresar_padron']['foto']['ruta_temporal'];
			
			
                        //move_uploaded_file($tmp_name,$_SESSION['ingresar_padron']['foto']['ruta_temporal']) or die("Error Moviendo Foto a Temporal");
			
			

			
		}else{
		$mensaje_error_tamano_no_valido=1;
		$_SESSION['foto']['bandera']=0;
		}
		
	}else{
	$mensaje_error_tipo_no_valido=1;
	$_SESSION['foto']['bandera']=0;
	}
} else if ($guardar_foto_en_bd){
	echo "guardando";
}


	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/css.css" rel="stylesheet" type="text/css">
<title>Foto de empadronado</title>
</head>
<body style="background-color:#ffffff">
<form name="foto_formulario" id="foto_formulario" method="POST" enctype="multipart/form-data" action="foto.php">
	<table border="0" cellpadding="5" style="width:100%" >
	<tr>
	<td bgcolor="white" style="text-align:center; width:100%; font-weight:bold; font-size:12px;">
	<?php
	if($mensaje_error_tipo_no_valido==1)
	echo "<span class=\"alerta\" style='color:red'><blink>Este tipo de archivo no es valido</blink></span>";
	else if($mensaje_error_tamano_no_valido==1)
	echo "<span class=\"alerta\" style='color:red'><blink>El tamano de este archivo es muy grande</blink></span>";
	?>
	</td>
	</tr>


	<tr>		
		<td bgcolor="white" class="texto_negro" align="center">
		<?php
		if($_SESSION['foto']['bandera']==1) {
			//$var_imagen_estilos=" style=\"height:".$_SESSION['ingresar_padron']['foto']['tamano'][1]."px; width:".$_SESSION['ingresar_padron']['foto']['tamano'][0]."px ";
			$var_imagen_sauce="mostrar_foto_bytea.php";
		}else {
			$var_imagen_sauce="../../imagenes/foto.gif";
			//$var_imagen_estilos="";
		}
		
		?>
		
		<img  src="../../imagenes/foto.gif" alt="Foto del Empadronado" border="0">
		</td>
	</tr>
	
	<tr>
		<td bgcolor="white" class="texto_negro" align="center">Ingrese la ruta hacia la foto que desea cargar:&nbsp;</td>
	</tr>
	<tr>		
		<td bgcolor="white" class="texto_negro" align="center">
		<input onchange="document.foto_formulario.submit();"  type="file" id="archivo" name="archivo" />
		</td>
		<td bgcolor="white" class="texto_negro" align="center">
		<input type="submit" name="guardar_foto" id="guardar_foto">
		</td>
	</tr>
	<tr>		
		<td bgcolor="white" class="texto_negro" align="center">
		<span>El tama&ntilde;o maximo de la imagen puede ser <?php echo floor($peso_predeterminado_en_bytes/1024)?> kb</span>
		<br />
		<span>solo en formatos gif, jpeg, bmp, y png</span>
		</td>
	</tr>
	</table>
</form>

</body>
</html>
