<?php
//Tipo de funciones contenidas en este archivo
/*Funciones relacionadas a cargar combos con Postgres*/
/*Funciones relacionadas a variables php*/
/*Funciones relacionadas a el ciente*/
/*Funciones de paginacion*/
/*Funciones relacionadas a JS*/
/*Funciones relacionadas a imagenes*/
/********************************************************************************************************************************************/
/********************************************** FUNCIONES PARA COMBOS ***********************************************************************/
/********************************************************************************************************************************************/


////////////////////////////////funcion para texto//////////////////////////////

function cambiar_a_minusculas($texto) {

$texto = strtolower($texto);
$texto = ucfirst($texto);
return $texto;

} 
/***************************************************************************************************************************************************/

function cargarComboConEventoMultiselect2($id_cadena,$id_area){

$sql_area = "SELECT id_area, area FROM e_area_cadena WHERE id_cadena = '".$id_cadena."' and estatus_area='1'";
$resul=pg_query($sql_area) or die();
while($row=pg_fetch_array($resul)){

		$area[]=$row['id_area'];
		$nombre[]=$row['area'];

}
//print_r ($area); // ID de las areas
//print_r ($id_area);// los que estan en BD
//print_r ($nombre);// nombre de las areas
echo '<SELECT name="area_cadena[]" id="area_cadena2" multiple  style="width:135">';

for ($i=0; $i<count($area); $i++){

$buscar=$area[$i];
echo '<OPTION value="'.$buscar.'"';
  if (in_array($buscar, $id_area)) {
	            echo 'selected';
	        }

echo '>'.utf8_encode(ucwords($nombre[$i])).'</OPTION>';

	}	



}

function cargarComboConEventoMultiselect5($id_org,$id_movimiento){

$sql_org = "SELECT id_org, organizacion FROM e_organizacion where id_tipo_org= '3' and estatus='1'";
$resul=pg_query($sql_org) or die();
while($row=pg_fetch_array($resul)){

		$org[]=$row['id_org'];
		$nombre[]=$row['organizacion'];

}
//print_r ($org); // ID de las areas
//print_r ($id_consejo);// los que estan en BD
//print_r ($nombre);// nombre de las areas
echo '<SELECT name="nomb_movimiento[]"'.' '.$evento.' id="nomb_movimiento" data-placeholder="-- Seleccione --" class="chzn-select" multiple style="width:300px;" tabindex="4">';

for ($i=0; $i<count($org); $i++){

$buscar=$org[$i];
echo '<OPTION value="'.$buscar.'"';
  if (in_array($buscar, $id_movimiento)) {
	            echo 'selected';
	        }

echo '>'.utf8_encode(ucwords($nombre[$i])).'</OPTION>';

	}	



}

function cargarComboConEventoMultiselect3($id_org,$id_comuna){

$sql_org = "SELECT id_org, organizacion FROM e_organizacion where id_tipo_org= '1' and estatus='1'";
$resul=pg_query($sql_org) or die();
while($row=pg_fetch_array($resul)){

		$org[]=$row['id_org'];
		$nombre[]=$row['organizacion'];

}
//print_r ($org); // ID de las areas
//print_r ($id_consejo);// los que estan en BD
//print_r ($nombre);// nombre de las areas
echo '<SELECT name="nomb_consejo_comunal[]"'.' '.$evento.' id="nomb_consejo_comunal" data-placeholder="-- Seleccione --" class="chzn-select" multiple style="width:300px;" tabindex="4">';

for ($i=0; $i<count($org); $i++){

$buscar=$org[$i];
echo '<OPTION value="'.$buscar.'"';
  if (in_array($buscar, $id_comuna)) {
	            echo 'selected';
	        }

echo '>'.utf8_encode(ucwords($nombre[$i])).'</OPTION>';

	}	



}


function cargarComboConEventoMultiselect4($id_org,$id_consejo){

$sql_org = "SELECT id_org, organizacion FROM e_organizacion where id_tipo_org= '2' and estatus='1'";
$resul=pg_query($sql_org) or die();
while($row=pg_fetch_array($resul)){

		$org[]=$row['id_org'];
		$nombre[]=$row['organizacion'];

}
//print_r ($org); // ID de las areas
//print_r ($id_consejo);// los que estan en BD
//print_r ($nombre);// nombre de las areas
echo '<SELECT name="nomb_comuna[]"'.' '.$evento.' id="nomb_comuna" data-placeholder="-- Seleccione --" class="chzn-select" multiple style="width:300px;" tabindex="4">';

for ($i=0; $i<count($org); $i++){

$buscar=$org[$i];
echo '<OPTION value="'.$buscar.'"';
  if (in_array($buscar, $id_consejo)) {
	            echo 'selected';
	        }

echo '>'.utf8_encode(ucwords($nombre[$i])).'</OPTION>';

	}	



}


	
function cargarComboConEventoMultiselect($name,$conn,$sql,$seleccinado,$evento,$id){
		$resul=pg_query($sql) or die();
		echo '<SELECT name="'.$name.'[]"'.' '.$evento.' id="'.$id.'" multiple style="width:135">';
	
			while($campos=pg_fetch_array($resul)){
				if($campos[0]==$seleccinado){
					$var1='selected';
				}
				echo '<OPTION value="'.$campos[0].'"'.$var1.' >'.utf8_encode(ucwords($campos[1])).'</OPTION>';
				$var1='';
			}
		echo "</SELECT>";
	}//fin cargan combo para multiselect



/*	function cargar_combo($name, $conexion, $sql, $seleccionado){
		$resul=pg_query($sql) or die("Error cargando combo $name");
		echo '<SELECT '.$atributos.' id="'.$name.'" name="'.$name.'" data-placeholder="Seleccione Estado..." class="chzn-select" style="width:150px;" tabindex="2">';
		echo '<OPTION value="0">Seleccione..</OPTION>';
		while($campos=pg_fetch_array($resul)){
			if($campos[0]==$seleccionado) $atributoSelected='selected="true"'; else $atributoSelected='';
				echo '<OPTION value="'.$campos[0].'"'.$atributoSelected.' >'.ucwords($campos[1]).'</OPTION>';
		}
		echo "</SELECT>";
	}//fin cargan combo
*/
	function cargar_combo($name, $id, $conexion, $sql, $seleccionado,$evento){
		$resul=pg_query($sql) or die("Error cargando combo $name");
		echo '<SELECT '.$atributos.' id="'.$id.'" name="'.$name.'" '.$evento.' onblur=this.style.backgroundColor="#ffffff" style="width:150px;" >';
		echo '<OPTION value="0">Seleccione..</OPTION>';
		
		while($campos=pg_fetch_array($resul)){
			if($campos[0]==$seleccionado) $atributoSelected='selected="true"'; else $atributoSelected='';
				echo '<OPTION value="'.$campos[0].'"'.$atributoSelected.' >'.ucwords($campos[1]).'</OPTION>';
		}
		echo "</SELECT>";
	}//fin cargan combo


	function cargar_combo_perfil($name, $id, $conexion, $sql, $seleccionado,$evento){
		$resul=pg_query($sql) or die("Error cargando combo $name");
		echo '<SELECT '.$atributos.' id="'.$id.'" name="'.$name.'" '.$evento.' onblur=this.style.backgroundColor="#ffffff" style="width:150px;" >';
		echo '<OPTION value="">Seleccione..</OPTION>';
		
		while($campos=pg_fetch_array($resul)){
			if($campos[0]==$seleccionado) $atributoSelected='selected="true"'; else $atributoSelected='';
				echo '<OPTION value="'.$campos[0].'"'.$atributoSelected.' >'.ucwords($campos[1]).'</OPTION>';
		}
		echo "</SELECT>";
	}//fin cargan combo


function cargar_combo_responsable($name, $id, $conexion, $sql, $seleccionado,$evento){
		$resul=pg_query($sql) or die("Error cargando combo $name");
		echo '<SELECT '.$atributos.' id="'.$id.'" name="'.$name.'" '.$evento.' onblur=this.style.backgroundColor="#ffffff" style="width:150px;" >';
		echo '<OPTION value="">Seleccione..</OPTION>';
		
		while($campos=pg_fetch_array($resul)){
			if($campos[0]==$seleccionado) $atributoSelected='selected="true"'; else $atributoSelected='';
				echo '<OPTION value="'.$campos[0].'"'.$atributoSelected.' >'.ucwords($campos[2]).'</OPTION>';
		}
		echo "</SELECT>";
	}//fin cargan combo




	function cargarComboConEvento($name,$conn,$sql,$seleccinado,$evento){
		$resul=pg_query($sql) or die();
		echo '<SELECT name="'.$name.'"'.' '.$evento.' id="'.$name.'" data-placeholder="Seleccione Estado..." class="chzn-select" style="width:220px;" tabindex="2">';
		echo '<OPTION value="">Seleccione..</OPTION>';
			while($campos=pg_fetch_array($resul)){
				if($campos[0]==$seleccinado){
					$var1='selected';
				}
				echo '<OPTION value="'.$campos[0].'"'.$var1.' >'.utf8_encode(ucwords($campos[1])).'</OPTION>';
				$var1='';
			}
		echo "</SELECT>";
	}//fin cargan combo

	function cargarComboDependienteConEvento($name,$conn,$sql,$seleccinado,$evento){
		$resul=pg_query($sql) or die();
		echo '<SELECT name="'.$name.'"'.' '.$evento.' id="'.$name.'" data-placeholder="Seleccione Estado..." class="chzn-select" style="width:220px;" tabindex="2">';
		echo '<OPTION value="">Seleccione..</OPTION>';
			while($campos=pg_fetch_array($resul)){
				if($campos[0]==$seleccinado){
					$var1='selected';
				}
				echo '<OPTION value="'.$campos[0].'"'.$var1.' >'.utf8_encode(ucwords($campos[2])).'</OPTION>';
				$var1='';
			}
		echo "</SELECT>";
	}//fin cargan combo

	function cargarComboParroquia($name, $conexion, $sql, $seleccionado){
		$resul=pg_query($sql) or die("Error cargando combo $name");
		echo '<SELECT '.$atributos.' id="'.$name.'" name="'.$name.'" data-placeholder="Seleccione Estado..." class="chzn-select" style="width:220px;" tabindex="2">';
		echo '<OPTION value="0">Seleccione..</OPTION>';
		while($campos=pg_fetch_array($resul)){
			if($campos[0]==$seleccionado) $atributoSelected='selected="true"'; else $atributoSelected='';
				echo '<OPTION value="'.$campos[0].'"'.$atributoSelected.'>'.ucfirst($campos[2]).'</OPTION>';
		}
		echo "</SELECT>";
	}//fin cargan combo

	FUNCTION cargarComboSeleccionMultiple ($name, $conexion, $sql, $seleccionado){
		$resul=pg_query($sql) or die("Error cargando combo $name");
		echo '<SELECT '.$atributos.' id="'.$name.'" name="'.$name.'[]" data-placeholder="-- Seleccione --" class="chzn-select" multiple style="width:300px;" tabindex="4">';
		//echo '<OPTION value="0">Seleccione..</OPTION>';
		while($campos=pg_fetch_array($resul)){
			if($campos[0]==$seleccionado) $atributoSelected='selected="true"'; else $atributoSelected='';
				echo '<OPTION value="'.$campos[0].'"'.$atributoSelected.'>'.ucfirst($campos[1]).'</OPTION>';
		}
		echo "</SELECT>";
	}

FUNCTION cargarComboSeleccionSimple ($name, $conexion, $sql, $seleccionado){
		$resul=pg_query($sql) or die("Error cargando combo $name");
		echo '<SELECT '.$atributos.' id="'.$name.'" name="'.$name.'[]" data-placeholder="-- Seleccione --" class="chzn-select"  style="width:300px;" tabindex="4">';
		//echo '<OPTION value="0">Seleccione..</OPTION>';
		while($campos=pg_fetch_array($resul)){
			if($campos[0]==$seleccionado) $atributoSelected='selected="true"'; else $atributoSelected='';
				echo '<OPTION value="'.$campos[0].'"'.$atributoSelected.'>'.ucfirst($campos[1]).'</OPTION>';
		}
		echo "</SELECT>";
	}
/********************************************************************************************************************************************/
/********************************************** FUNCIONES PARA COMBOS ***********************************************************************/
/********************************************************************************************************************************************/


function empty0($valor){
    if(!empty($valor)||$valor==0||$valor=='0')return false;
    else return true;
}

function unifcarNombres($nombre1,$apellido1,$nombre2,$apellido2){
    if(empty($nombre2)) $espacioEntreNombre2Apellido1=""; else $espacioEntreNombre2Apellido1=" ";
    if(empty($apellido1)) $espacioEntreApellido1Apellido2=""; else $espacioEntreApellido1Apellido2=" ";
    $nombreCompleto=$nombre1." ".$nombre2.$espacioEntreNombre2Apellido1.$apellido1.$espacioEntreApellido1Apellido2.$apellido2;
    return trim($nombreCompleto);
}

function devuelveSiConUnoNoConCero($valor){
    if($valor=="1"||$valor==1||$valor=="on"||$valor=="oN"||$valor=="ON"||$valor=="On") return "SI";
    else return "NO";
}

function separarNombres($nombreCompleto){ //Devuelve un vector con los nombres, por ejemplo si son 4 nombres "Luis Alvaro Gaylord Fucker" devuelve un array de count=4 con 4 valores 
    $vectorNombresAux=explode(" ",$nombreCompleto);
    return $vectorNombresAux;
}

function siUnoReturnOn($valor){
    if($valor==1||$valor=="1") return "on";
    else return NULL;
}

function darFormatoOrNull ($campo){
    if($campo==null||empty($campo)||$campo==""||$campo=="undefined") return  "NULL";
    else return $campo="'$campo'";
}

function devolverNumeroOrZero($valor){
    if(empty($valor)||$valor=="0") return 0;
    else return $valor;
}

function ifExistReturnUno($valor){
    if(isset($valor)) return 1 ;
    else return 0;
}

//funcion para darle formato a las variables recogidas dentro del sql
function dar_formato ($campo){ return $campo='\''.$campo.'\''; }

//Imprime una variable solo si tiene valor
function imprimir_var($var){
    if(isset($var)){
        echo $var;
    }
}

function formato_fecha_mysql($fecha){
    $aux = explode(" ",$fecha);
        if(count($aux) > 0){ 
        $fecha = explode("/",$aux[0]); 
         $fecha[0]; //dia
         $fecha[1]; //mes
         $fecha[2]; //año 
        } 
    $fecha= $fecha[2].'-'. $fecha[1].'-'. $fecha[0];
    return $fecha;
}

function obtenerFechaFormatoLatino($fecha){
    $arrayFechaNacimientoAux=explode("-",$fecha);
    if(count($arrayFechaNacimientoAux)==3)$fecha=$arrayFechaNacimientoAux[2]."/".$arrayFechaNacimientoAux[1]."/".$arrayFechaNacimientoAux[0];
    return $fecha;
}

function extraerArrayDeResult($sql,$conexion,$array_a_extraer){
$vector=array();
$i=0;
$result=pg_query($conexion, $sql) or die("Error cargando array desde bd");
while ($array_extraido=pg_fetch_array($result)){
	foreach($array_a_extraer as  $valor){
        $vector[$i][$valor] = $array_extraido[$valor];
	}
	$i++;
}
	
return $vector;
}

//muestra la fecha en formato latino en idioma español de permisos
function fecha_actual_formato_latino(){

// Obtenemos y traducimos el nombre del día
$dia=date("l");
if ($dia=="Monday") $dia="Lunes";
if ($dia=="Tuesday") $dia="Martes";
if ($dia=="Wednesday") $dia="Mi&eacute;rcoles";
if ($dia=="Thursday") $dia="Jueves";
if ($dia=="Friday") $dia="Viernes";
if ($dia=="Saturday") $dia="Sabado";
if ($dia=="Sunday") $dia="Domingo";

// Obtenemos el número del día
$dia2=date("d");

// Obtenemos y traducimos el nombre del mes
$mes=date("F");
if ($mes=="January") $mes="Enero";
if ($mes=="February") $mes="Febrero";
if ($mes=="March") $mes="Marzo";
if ($mes=="April") $mes="Abril";
if ($mes=="May") $mes="Mayo";
if ($mes=="June") $mes="Junio";
if ($mes=="July") $mes="Julio";
if ($mes=="August") $mes="Agosto";
if ($mes=="September") $mes="Setiembre";
if ($mes=="October") $mes="Octubre";
if ($mes=="November") $mes="Noviembre";
if ($mes=="December") $mes="Diciembre";

// Obtenemos el año
$ano=date("Y");

// Imprimimos la fecha completa
return $f= "$dia $dia2 de $mes de $ano";
}//fin fecha_actual()
/////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////Funciones relacionadas a el ciente///////////////////////////////

//Captura la ip de la maquina cliente
function capturar_ip(){
if ($_SERVER) { 
if ($_SERVER['HTTP_X_FORWARDED_FOR'] ) { 
$realip = $_SERVER["HTTP_X_FORWARDED_FOR"]; 
} elseif ( $_SERVER["HTTP_CLIENT_IP"] ) {
 $realip = $_SERVER["HTTP_CLIENT_IP"];
} else { $realip = $_SERVER["REMOTE_ADDR"]; } 
} else { 
if ( getenv( "HTTP_X_FORWARDED_FOR" ) ) { $realip = getenv( "HTTP_X_FORWARDED_FOR" ); 
} elseif ( getenv( "HTTP_CLIENT_IP" ) ) { $realip = getenv( "HTTP_CLIENT_IP" ); } 
else { $realip = getenv( "REMOTE_ADDR" ); } 
} 
return $realip;
}//fin capturar ip

//Captura el nombre de la maquina cliente
function nombre_de_maquina(){
$nombre_maquina=gethostbyaddr($_SERVER['REMOTE_ADDR']);
return $nombre_maquina;
}//fin nombre de maquina

/////////////////////////////////////////////////////////////////////////////////////////


/////////////////////////////////Funciones de paginacion///////////////////////////////

function paginador_usuarios($pagina,$inicio,$final,$numPags){
    if($pagina>1){
        $var= "<a class='link' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina-1)."'>";
        $var=$var."<font face='verdana' size='-2'>Anterior</font>";
        $var=$var."</a> ";
    }
    for($i=$inicio;$i<=$final;$i++){
        if($i==$pagina){
            $var=$var."<font face='verdana' size='-2'><b>".$i."</b> </font>";
        }else{
            $var=$var."<a class='link' href='".$_SERVER["PHP_SELF"]."?pagina=".$i."'>";
            $var=$var."<font face='verdana' size='-2'>".$i."</font></a> ";
        }
    }
    if($pagina<$numPags){
        $var=$var."<a class='link' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina+1)."'>";
        $var=$var."<font face='verdana' size='-2'>Siguiente</font></a>";
        
    }
return $var;
}
/////////////////////////////////////////////////////////////////////////////////////////
        
        
///////////////////////////////Funciones relacionadas a JS///////////////////////////////

//Imprime una confirmacion en javascript.. True para si, False para no
function confirmar_evento($mensaje){
echo '
	<script LANGUAGE="JavaScript">
		function confirmSubmit(){
			var agree=confirm("'.$mensaje.'");
			if (agree)
				return true ;
			else
				return false ;
		}
	</script>';
}


//Imprime alert con parametro mensaje en JS
function mostrar_mensaje($mensaje){
	echo ' <script LANGUAGE="JavaScript"> alert("'.$mensaje.'"); </script>';
}
/////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////Funciones relacionadas a imagenes///////////////////////////////

function redimensiona_imagen($archivo_nuevo, $dir,  $anchura, $altura){
//datos nesesarios para procesar 
//$archivo foto  a redireccionar
//dir - directorio donde se guarda la foto
//$anchura maxima
//$azltura  maxima

//creamos imagen nuevo apartir de cargado
//ruta completa del archivo
$uploadfile=$dir. basename($archivo_nuevo);
$img_fuente=@imagecreatefromjpeg($uploadfile)
or die("No se puede proceder");
//sacamos los datos de altura y anchura del imagen cargado
//anchura
        $img_ancho=imagesx($img_fuente);
         echo($img_ancho);
            
         //altura
        $img_alto=imagesy($img_fuente);
         echo($img_alto);
//sacamos la diferencia para averiguar forma de imagen
$diferencia=$img_ancho/$img_alto;
//si la anchura es superior a la altura ajustamos anchura a establecido
if($img_ancho>$anchura || $img_alto>$altura){

if($diferencia>1){
        // crear imagen nueva
        $img_nueva_anchura=$anchura;
        $img_nueva_altura=$img_alto/($img_ancho/$anchura);}
        
//si altura es superior a la anchura 
if($diferencia<1){
        $img_nueva_altura=$altura;
        $img_nueva_anchura=$img_ancho/($img_alto/$altura);}    
        
        //si el imagen es cuadrado restamos de altura ya anchura lo mismo
        if($diferencia==1){
        $dif=$img_ancho-$anchura;
        $img_nueva_anchura=$anchura;
        $img_nueva_altura=$img_alto-$dif;}
        
// creamos  imagen nueva vacia con dimesiones adecuadas
$thumb = imagecreatetruecolor($img_nueva_anchura,$img_nueva_altura)
or die("No se ha podido ejecutar la función imagecreatetruecolor");

//redimensionamos el imagen
imagecopyresampled ($thumb, $img_fuente, 0,0,0,0, $img_nueva_anchura, $img_nueva_altura, $img_ancho, $img_alto)
        or die("No se ha podido ejecutar la función imagecopyresampled");

// guardar la imagen redimensionada 
//asignamos permisos de escritura a la carpeta donde esta hubicado el archivo
chmod($uploadfile, 0775); 
imagejpeg($thumb ,$uploadfile)
or die("No se ha podido mover el archivo redimensionado a la carpeta.");

                    echo "<b>Redireccionamiento ok!. Datos:</b><br>"; 
            echo "Nombre: <i><a href='".$uploadfile."'>".$uploadfile."</a></i><br>"; 
            echo "Anchura: <i>".$img_nueva_anchura."</i><br>"; 
                    echo "Altura: <i>".$img_nueva_altura." bytes</i><br>"; 
                        echo "<br><hr><br>"; 
        }
        else {echo "<b>Redimensionamiento no procede!</b>. El imagen tiene tamaño adecuado.<br>"; }
}


//Solo redimensina de vista no de archivo
function redimensionar_imagen_vista($ancho,$alto,$ancho_resize,$alto_resize){
	while($alto>$alto_resize||$ancho>$ancho_resize){
		$alto_aux=($alto/100);
		$ancho_aux=($ancho/100);
		$alto=$alto-$alto_aux;
		$ancho=$ancho-$ancho_aux;
	}
	$dimensiones=array($ancho,$alto);
	return $dimensiones; //[0] ancho [1] alto
}


function validar_mime($mime_numerico){
    switch ($mime_numerico) {
        case 1:
            //echo "gif";
            $extension=".gif";
            return $extension;
        case 2:
            //echo "jpge";
            $extension=".jpge";
            return $extension;
        case 3:
            //echo "png";
            $extension=".png";
            return $extension;    
        case 6:
            //echo "bmp";
            $extension=".bmp";
            return $extension;
        default:
            return false;
        }
}

/////////////////////////////////////////////////////////////////////////////////////////



////////////////////////////FUNCIONES RELACIONADAS A ARCHIVOS/////////////////////////////////
/** 
 * Borra el contenido de un directorio recursivamente
 * 
 * @param string $dir Nombre del directorio
 * @param boolean $deleteRootToo especificas con un true o un false si quieres borrar tbm el directorio 
 */ 
function unlinkRecursive($dir, $deleteRootToo) { 
    $flag_check=false;
    if(!$dh = @opendir($dir)) 
    { 
        return; 
    } 
    while (false !== ($obj = readdir($dh))) 
    { 
        if($obj == '.' || $obj == '..') 
        { 
            continue; 
        } 

        if (!@unlink($dir . '/' . $obj)) 
        { 
            unlinkRecursive($dir.'/'.$obj, true); 
        } 
    } 

    closedir($dh); 
    
    if ($deleteRootToo) 
    { 
        @rmdir($dir); 
    } 
    $flag_check=true;
    return $flag_check; 
}

/////////////////////////////////////////////////ARRAY PAPA MAPA////////////////////////////////////////

function query_array_estado() {
    $sql_combo_estado = 'SELECT * FROM e_estado ORDER BY texto ASC';
    $resulBuscarEstado=pg_query($sql_combo_estado) or die();
    $rowEstado=pg_fetch_all($resulBuscarEstado);
    return $rowEstado;
    
}

function query_array_municipio() {
    $sql_combo_municipio = 'SELECT * FROM e_municipio ORDER BY texto ASC';
    $resulBuscarMunicipio=pg_query($sql_combo_municipio) or die();
    $rowMunicipio=pg_fetch_all($resulBuscarMunicipio);
    return $rowMunicipio;
    
}


function query_array_parroquia() {
    $sql_combo_municipio = 'SELECT * FROM e_parroquia ORDER BY texto ASC';
    $resulBuscarMunicipio=pg_query($sql_combo_municipio) or die();
    $rowMunicipio=pg_fetch_all($resulBuscarMunicipio);
    return $rowMunicipio;
    
}

function arrays_js_edo_mun($edo=Array(),$mun=Array(),$parr=Array())
{
	$array_edo_mun_google ="";
	$array_edo_mun_google.= "<script language='javascript' >";
	$array_edo_mun_google.= "edo=new Array ();";
	for($i=0; $i<count($edo); $i++)
	{
		$edo[$i]["latitud" ] = str_replace  ( "," , "." , $edo[$i]["latitud"]  );
		$edo[$i]["longitud"] = str_replace  ( "," , "." , $edo[$i]["longitud"] );
		$array_edo_mun_google.="edo[$i]=new Array('".$edo[$i]["id"]."', '".$edo[$i]["latitud"]."', '".$edo[$i]["longitud"]."'); ";
	}
	$array_edo_mun_google.= "mun=new Array ();";
	for($i=0; $i<count($mun); $i++)
	{
		if( $mun[$i]["latitud"]=="" )
			$mun[$i]["latitud"]="0";
		if( $mun[$i]["longitud"]=="" )
			$mun[$i]["longitud"]="0";   
		
		$mun[$i]["latitud" ] = str_replace  ( "," , "." , $mun[$i]["latitud"]  );
		$mun[$i]["longitud"] = str_replace  ( "," , "." , $mun[$i]["longitud"] );
		$array_edo_mun_google.="mun[$i]=new Array('".$mun[$i]["id"]."', '".$mun[$i]["latitud"]."', '".$mun[$i]["longitud"]."'); ";
	}
        $array_edo_mun_google.= "parr=new Array ();";
	for($i=0; $i<count($parr); $i++)
	{
		if( $parr[$i]["latitud"]=="" )
			$parr[$i]["latitud"]="0";
		if( $parr[$i]["longitud"]=="" )
			$parr[$i]["longitud"]="0";   
		
		$parr[$i]["latitud" ] = str_replace  ( "," , "." , $parr[$i]["latitud"]  );
		$parr[$i]["longitud"] = str_replace  ( "," , "." , $parr[$i]["longitud"] );
		$array_edo_mun_google.="parr[$i]=new Array('".$parr[$i]["id"]."', '".$parr[$i]["latitud"]."', '".$parr[$i]["longitud"]."'); ";
	}
	$array_edo_mun_google.= "</script> ";
	return $array_edo_mun_google;
}

?>
