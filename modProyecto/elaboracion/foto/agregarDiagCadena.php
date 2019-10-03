<?php
	session_start();
	include_once ("../../../funciones/funciones_session.php");comprobarSession($_SESSION['adminProy']);
	extract($_FILES);
	include_once "../../../funciones/funciones.php";


$peso_predeterminado_en_bytes=4000000;



# Verificamos que el formulario no ha sido enviado aun
$foto_ha_sido_cargada = (isset($archivo)) ? true : false;

$mensaje_error_tipo_no_valido=$mensaje_error_tamano_no_valido=0;
if($foto_ha_sido_cargada){
	# Variables del archivo
	$tamano_real=$_FILES["archivo"]["size"];
	$tmp_name=$_FILES["archivo"]["tmp_name"];
	$propiedades_img= getimagesize($tmp_name);
	
	//Validamos el tipo de imagen (solo gif, jpeg, bmp, y png)
        if(validar_mime($propiedades_img[2])){
		//Validamos el tamano no debe ser mayor a la var $peso_predeterminado_en_bytes
		if($tamano_real<=$peso_predeterminado_en_bytes){	
                        //Guardo el archivo en un buffer
			$fp = fopen($tmp_name, "rb");
			$buffer = fread($fp, filesize($tmp_name));
			fclose($fp);
			
			//Guardo el temporal en un temporal semipermanente
			srand (time()); $numero_aleatorio = rand(1,999999999);
                        $rutaAux="../../../diagramasProyectosAux/";
			$rutaAux.=$numero_aleatorio;
			move_uploaded_file($tmp_name,$rutaAux) or die("Error Moviendo Foto a Temporal");
			
			//Guardo Las variables en una variable de session
			$_SESSION['foto']['mime'] = image_type_to_mime_type($propiedades_img[2]);
			$_SESSION['foto']['size'] = $_FILES["archivo"]["size"];
			$_SESSION['foto']['binario']=$buffer;
			$_SESSION['foto']['bandera']=1;
			
			if(isset($_SESSION['foto']['ruta_tmp_semipermanente'])) unlink($_SESSION['foto']['ruta_tmp_semipermanente']);
			$_SESSION['foto']['ruta_tmp_semipermanente']=$rutaAux;
			$_SESSION['foto']['ancho']=$propiedades_img[0];
			$_SESSION['foto']['alto']=$propiedades_img[1];
		}else{
		$mensaje_error_tamano_no_valido=1;
		$_SESSION['foto']['bandera']=0;
		}
		
	}else{
	$mensaje_error_tipo_no_valido=1;
	$_SESSION['foto']['bandera']=0;
	}
} 


	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
	<HEAD>
		<META http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<LINK href="../../../css/css.css" rel="stylesheet" type="text/css">
	</HEAD>
	<BODY style="background-color:#ffffff">
	<FORM name="foto_formulario" id="foto_formulario" method="POST" enctype="multipart/form-data" action="agregarDiagCadena.php">
		<TABLE border="0" cellpadding="2" style="width:100%" >
			<TR>
				<TD bgcolor="White" style="text-align:center; width:100%; font-weight:bold; font-size:12px;">
				<?php
					if($mensaje_error_tipo_no_valido==1)
					echo "<span class=\"alerta\" style='color:red'><blink>Este tipo de archivo no es valido</blink></span>";
					else if($mensaje_error_tamano_no_valido==1)
					echo "<span class=\"alerta\" style='color:red'><blink>El tamano de este archivo es muy grande</blink></span>";
				?>
				</TD>
			</TR>
			<TR>
				<TD bgcolor="white" class="texto_negro" align="center" style="height:250px;">
					<?php
						if($_SESSION['foto']['bandera']==1) {
							$arrayDimensiones=redimensionar_imagen_vista($_SESSION['foto']['ancho'],$_SESSION['foto']['alto'],300,250);
							$var_estilos_imagen="style=\"height:".$arrayDimensiones[1]."px; width:".$arrayDimensiones[0]."px;\"";
							$var_imagen_sauce="mostrar_foto.php";
						}else {
							$var_imagen_sauce="../../../imagenes/AgregarGrafico.gif";
						}
					?>
					<img <?=$var_estilos_imagen?> src="<?=$var_imagen_sauce?>" alt="Foto del Empadronado" border="0">
				</TD>
			</TR>
			<TR><TD bgcolor="white" class="tituloTablas" align="center">Ingrese la ruta hacia la Imagen que desea cargar:&nbsp;</TD></TR>
			<TR><TD bgcolor="white" class="tituloTablas" align="center"><input onchange="document.foto_formulario.submit();" type="file" id="archivo" name="archivo" size="50" /></TD></TR>
			<TR>
				<TD bgcolor="white" class="tituloTablas" align="center">
					<span>El tama&ntilde;o maximo de la imagen puede ser <?php echo floor($peso_predeterminado_en_bytes/1024)?> kb</span>
					<span>solo en formatos gif, jpeg, bmp, y png</span>
				</TD>
			</TR>
		</TABLE>
	</FORM>
</BODY>
</HTML>
