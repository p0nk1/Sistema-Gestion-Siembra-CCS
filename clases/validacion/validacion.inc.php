<?php 
/**
* Validaci�n de Formularios
* 
* Valida formularios v�a JavaScript y PHP. 
* 
* Instrucciones:
* Para validar un formulario mediante JavaScript y PHP se debe cumplir unos pasos:
* 1) Incluir el archivo que contiene la clase:
* ej. include "validacion/validacion.inc.php";
* 
* 2) Inicializar el objeto. Se le pasa como par�metro el nombre del formulario a validar. Tambi�n se le puede
* enviar la acci�n, es decir el url que procesar� el formulario. Por defecto se apunta a si mismo:
* $validar = new MCI_validacion("login");
* 
* 3) Agregar un campo a la clase. El primer par�metro es el nombre del campo de formulario,
* el segundo es el tipo de campo (text, textarea, select, radio, etc.), y el tercero es el T�tulo
* del campo (el cual se utiliza para hacerle referencia en el momento de tener que mostrar un error):
* $validar->agregar_campo("user", "text", "Nombre de Usuario");
* 
* 4) Agregar uno o varios tipos de validaci�n para el campo. El primer par�metro es el nombre del campo,
* el segundo es el tipo de validaci�n (la lista de todos los tipos de validaci�n posibles est� guardado
* en la variable $this->lista_validacion). El tercer par�metro son las opciones o par�metros que se le
* pasa al tipo de validaci�n, como por ejemplo un valor en KB mayor el cual ser� el l�mite para una 
* validaci�n de tama�o de archivo. El �ltimo par�metro es un mensaje de error que suplantar� al predeteminado.
* Los par�metros 2 y 3 son opcionales.
* $validar->agregar_validacion("user", "req", NULL, "No metiste datos al campo Usuario");
* $validar->agregar_validacion("user", "a1");
* $validar->agregar_validacion("user", "! ");
* 
* 5) Se repiten los pasos 3 y 4 tantas veces como sea necesario para agregar todos los campos y sus validaciones.
* 
* 6) Procesar el formulario en caso de que haya sido enviado. Devuelve verdadero si todos los campos son v�lidos
* por JavaScript y PHP. Este es el m�todo clave, se le puede utilizar para pasar al proximo paso en el 
* procesado de datos, como por ejemplo su carga a una base de datos.
* if($validar->procesar()){die("Formulario completado exitosamente!!");}
* 
* Los pr�ximos pasos son de construcci�n del html y c�digo JavaScript necesarios para la validaci�n por JavaScript
* 
* 7) Incluir  los archivos javascript con las clases de validaci�n. En el caso de no encontrarse en la ubicaci�n 
* predeterminada, se le puede pasar la nueva ubicaci�n como par�metro. Estos archivos se deben inclu�r antes del 
* formulario, preferiblemente en la secci�n HEAD del html.
* <? echo $validar->obtener_archivos_js(); ?>
* 
* 8) Inclu�r el texto de error. Este texto cambiar� din�micamente de acuerdo al error en la validaci�n que se presente.
* En el caso de haber varios formularios y que se quiera tener igual n�mero de mensajes de error, se puede pasar
* el nombre del formulario al cual estar� asociado como par�metro.
* <?php echo  $validar->html_error("login"); ?>
* 
* 9) Inclu�r el campo oculto. Se utiliza este m�todo para crear un campo oculto que le indica al m�todo procesar si el 
* formulario ha sido enviado por el usuario o no, para as� determinar si debe realizar la validaci�n por PHP.
* Se debe llamar este m�todo desde adentro del formulario. Es decir, entre los campos <form> y </form>.
* <?php echo  $validar->campo_oculto(); ?>
* 
* 10) Inclu�r JavaScript de validaci�n. Es importante que se coloque este llamado despu�s del formulario, es decir
* despu�s del tag </form> para que funcione correctamente. Esto se debe a que el JavaScript de validaci�n trabaja 
* con objetos y debe estar completo el objeto del formulario antes de poderle hacer referencia.
* <?php echo $validar->obtener_js(); ?>
*
* @Autor Thomas Woodard
*/
class MCI_validacion{
var $validar = false; // Si validar. Para evitar mostrar el javascript si no se requiere
var $nom_form = NULL;
var $metodo_form = NULL;
var $accion_form = NULL;
var $enctype_form = "application/x-www-form-urlencoded";
var $archi = NULL; // contiene el objeto de manejo de archivos si es requerido
var $validacion_paso = NULL;
var $validacion_error = NULL;
var $campos = NULL;
var $valido_php = NULL;
var $codigo_javascript = NULL;
var $archivos_js = array();
var $codigo_js = NULL;
var $url_archivo_js = NULL;
var $js_incluido = false;
var $espacio_error = false;
var $validacion_campo_error = NULL;
var $unir_botones = false;
var $botones = array();
var $campos_ocultos = array();
var $directorio_upload = "archivos/"; // Directorio predeterminado donde se cargar�n los archivos
var $usar_campos_md5 = false; // encriptar los campos para que no se sepa el nombre de las columnas de la tabla
var $lista_md5 = array(); // contiene un array del nombre de cada columna en md5 si $usar_campos_md5 es true.
var $lista_validacion = array( // listar ac� cualquier nueva funci�n de validaci�n. Los alias de una validaci�n van en la m�sma l�nea
"req", "requerido", // campo requerido
"maxlongitud", "maxlon", // longitud m�xima
"minlongitud", "minlon", // longitud m�nima
"a1", "alnum", "alfanumerico", // n�meros y letras solamente
"1", "num", "numerico", // n�meros solamente
"a", "alfabetico", "alfa", // letras solamente
"a1-_", "a1-", "alnumguion", // n�meros, letras, gui�n y underscore
"email", // validar email
"<", "menorque", // que el valor sea menor que cierto n�mero
">", "mayorque", // que un valor sea mayor que cierto n�mero
"regexp", // comparar con una expresi�n regular provista como argumento
"noseleccionar", "lista", "!=",// verificar que el valor de un item de select no est� en su valor predeterminado
"a==b","camposiguales","=",// que un campo tenga el mismo valor que otro
"a!=b","camposdesiguales",// que un campo no tenga el mismo valor que otro
"fechaformato", "ff", // que la fecha observe el formato dd/mm/aaaa o dd-mm-aaaa
"f>", "fecha >", // que la fecha sea posterior a otra, ya sea pasada por par�metro u otro campo
"f<", "fecha <", // que la fecha sea posterior a otra, ya sea pasada por par�metro u otro campo
"noespacio", "! ", // que no posea espacios en blanco
".?","extensionarchivo", // que el archivo a subir sea de cierta extensi�n... im�genes por defecto... 
						// para probar otros tipos de archivo se pasa en el par�metro una lista de las extensiones, 
						// separadas por una coma ej. gif,jpg,jpeg,bmp,png
"KB","tama�oarchivo", // verifica el que el tama�o del archivo sea el correcto. No hay equivalente de JavaScript
"forzar" // forzar un error. Se debe especificar un mensaje de error
);
	/**
	* Constructor
	* 
	* Constructor. Recibe como par�metros el nombre del formulario y el m�todo de env�o del formulario. Tambi�n recibe<br>
	* la acci�n del formulario.
	* @Autor Thomas Woodard
	*/
	/*function MCI_validacion($nom_form, $metodo_form = "post", $accion_form = NULL){ 
		$reldir = $this->_obtener_reldir();
		$this->url_archivo_js = $reldir."js/";
		
		$this->nom_form = $nom_form;
		$this->metodo_form = $metodo_form;
		if ($accion_form == NULL){
			$accion_form = $_SERVER['PHP_SELF'] . (isset($_SERVER['QUERY_STRING']) ? "?" . $_SERVER['QUERY_STRING'] : "");
		}
		$this->accion_form = $accion_form;
	}*/
	/**
	* Agregar un campo
	* 
	* Agregar un nuevo campo al formulario. El id_campo define el id y el nombre cuando se crea
	* la tabla. El tipo_campo es el nombre del tipo de campo (text, textarea, button, checkbox, radio, etc). 
	* El t�tulo es para efecto de mensajes de error y los argumentos son para el formateo del campo.
	* @Autor Thomas Woodard
	*/
	function agregar_campo($id_campo, $tipo_campo, $titulo = NULL, $argumentos = NULL){
		$this->campos[$id_campo]["tipo"] = $tipo_campo;
		$this->campos[$id_campo]["args"] = $argumentos;
		$this->campos[$id_campo]["titulo"] = $titulo;
		if($tipo_campo=="file"){$this->enctype_form="multipart/form-data";}
	}
	/**
	* Agregar una validaci�n
	* 
	* Agregar una validaci�n a cierto campo. El primer par�metro es el nombre del campo,
	* el segundo es el tipo de validaci�n (la lista de todos los tipos de validaci�n posibles est� guardado
	* en la variable $this->lista_validacion). El tercer par�metro son las opciones o par�metros que se le
	* pasa al tipo de validaci�n, como por ejemplo un valor en KB mayor el cual ser� el l�mite para una 
	* validaci�n de tama�o de archivo. El �ltimo par�metro es un mensaje de error que suplantar� al predeteminado.
	* @Autor Thomas Woodard
	*/
	function agregar_validacion($id_campo, $tipo_validacion, $argumentos = NULL, $texto_error = NULL){
		if(in_array($tipo_validacion, $this->lista_validacion)){
			$this->campos[$id_campo]["val"][] = $tipo_validacion;
			$this->campos[$id_campo]["val_args"][] = $argumentos;
			$this->campos[$id_campo]["error"][] = $texto_error;
			$this->archivos_js["mci_validacion.js"] = NULL;
		} else {
		    $this->validacion_campo_error = $id_campo;
			$this->validacion_error = "DEPURAR: El tipo de validaci�n $tipo_validacion no existe.";
		}
		$this->validar=true;
	}
	/**
	* Agregar Datos
	* 
	* Agregar datos a un campo del formulario. Recibe como par�metros el id del campo, y los datos que
	* se desea que muestre de manera predeterminada en el formulario. Si se trata de un list o radio,
	* el par�metro debe ser un array.
	* @Autor Thomas Woodard
	*/
	function agregar_datos($id_campo, $datos){
		if(!is_array($datos)){
			$this->campos[$id_campo]["valor"] = $datos;
		}else{
			$this->campos[$id_campo]["valores"] = $datos;
		}
		
	}
	/**
	* Procesar
	* 
	* Se llama esta funci�n para determinar si ya se recibieron los datos enviados por el usuario y 
	* si cumple con todos los par�metros de validaci�n. De ser cierto, devuelve true.
	* @Autor Thomas Woodard
	*/
	function procesar($campos_validar="")
	{
		return $this->_validar_php($campos_validar);
		
	}
	function _validar_php($campos_validar=""){
		if($this->usar_campos_md5){
			foreach($this->campos as $campo => $valor){$this->lista_md5["c_".md5($campo)]=$campo;}
		} else {
			foreach($this->campos as $campo => $valor){$this->lista_md5[$campo]=$campo;}
		}
		switch($this->metodo_form){
			case "post":
				if (isset($_POST["MCI_validar"]) && $_POST["MCI_validar"] == $this->nom_form){
					foreach($_POST as $campo => $valor){
						//$valor = (!get_magic_quotes_gpc()) ? addslashes($valor) : $valor;
						$campo = (isset($this->lista_md5[$campo])) ? $this->lista_md5[$campo] : $campo; 
						$this->campos[$campo]["valor"] = trim($valor);
						$this->validacion_paso = 2;
					}
				}
				break;
			case "get":
				if (isset($_GET["MCI_validar"]) && $_GET["MCI_validar"]==$this->nom_form){
					foreach($_GET as $campo => $valor){
						//$valor = (!get_magic_quotes_gpc()) ? addslashes($valor) : $valor;
						$campo = (isset($this->lista_md5[$campo])) ? $this->lista_md5[$campo] : $campo; 
						$this->campos[$campo]["valor"] = trim($valor);
						$this->validacion_paso = 2;
					}
				}
				break;
		}
		if (isset($_POST["MCI_validar"]) && $_POST["MCI_validar"] == $this->nom_form){
					foreach($_FILES as $campo => $campo_datos_archivo){
						$campo = (isset($this->lista_md5[$campo])) ? $this->lista_md5[$campo] : $campo; 
						$this->campos[$campo]["valor"] = trim($campo_datos_archivo['name']);
						$this->campos[$campo]["archivo"] = $campo_datos_archivo;
						$this->validacion_paso = 2;
						if(class_exists('fileHand')){$this->archi = new fileHand();}
					}
		}
	
		if($this->validacion_paso == 2){return $this->_validacion_php($campos_validar);}
		if($this->validacion_paso != 2){return NULL;}
	}	
	/**
	* Agregar archivo js
	* 
	* Agregar un archivo js a la lista para luego inclu�r
	* @Autor Thomas Woodard
	*/
	function agregar_archivo_js($nom_archivo,$ruta = NULL){
		$this->archivos_js[$nom_archivo] = $ruta;
	}
	/**
	* Incluir Archivo JS
	* 
	* Obtener el Javascript necesario para la validaci�n.  En el caso de no encontrarse en la ubicaci�n 
	* predeterminada, se le puede pasar la nueva ubicaci�n como par�metro. Estos archivos se deben inclu�r antes del 
	* formulario, preferiblemente en la secci�n HEAD del html.
	* @Autor Thomas Woodard
	*/
	function obtener_archivos_js(){
		$retorno = ""; 
		foreach ($this->archivos_js as $archivo => $ruta){
			if($ruta==NULL){$ruta = $this->url_archivo_js;}
			$retorno .= "<script language='JavaScript' src='$ruta$archivo' type='text/javascript'></script>\n";
		}
		$this->js_incluido = true; 
		$this->archivos_js = array();
		return $retorno;
	}
	/**
	* Construir Javascript
	* 
	* Obtener el Javascript necesario para la validaci�n. Este texto cambiar� din�micamente de acuerdo al error 
	* en la validaci�n que se presente.
	* En el caso de haber varios formularios y que se quiera tener igual n�mero de mensajes de error, se puede pasar
	* el nombre del formulario al cual estar� asociado como par�metro.
	* @Autor Thomas Woodard
	*/
	function obtener_js(){
		if($this->validar){// Si se ha agregado una validaci�n
			if(count($this->lista_md5) < 1){
				if($this->usar_campos_md5){
					foreach($this->campos as $campo => $valor){$this->lista_md5["c_".md5($campo)]=$campo;}
				} else {
					foreach($this->campos as $campo => $valor){$this->lista_md5[$campo]=$campo;}
				}
			}
			$lista_md5_inv = array_flip($this->lista_md5);
			foreach ($this->campos as $clave_campo => $campo){
				foreach($campo["val"] as $clave => $val){    
					$nom_campo = $lista_md5_inv[$clave_campo]; 
					$this->codigo_js .= "frmvalidator.addValidation('$nom_campo','$val";
					if ($campo["val_args"][$clave]||$campo["val_args"][$clave]==='0'){
						$this->codigo_js .="=".$campo["val_args"][$clave];				
					}
					$this->codigo_js .= "'"; 
					if ($campo["error"][$clave]){
						$this->codigo_js .=" ,'".$campo["error"][$clave]."'";
					}
					$this->codigo_js .= ");\n";				
				}
			}
			$retornar = "
			<script language='JavaScript' type='text/javascript'>
			  var frmvalidator  = new Validator('".$this->nom_form."');\n";
			$retornar .= $this->codigo_js;
			$retornar .= "document.".$this->nom_form.".urlImgWar= '".$this->url_archivo_js."img/'\n";
			if($this->validacion_error){
				$nom_campo = ($this->usar_campos_md5 == true) ? "c_".md5($this->validacion_campo_error) : $this->validacion_campo_error;
				$nom_objeto = (isset($nom_campo))? "document.".$this->nom_form.".".$nom_campo : "document.".$this->nom_form;
				$retornar .= "mostrar_error('".$this->validacion_error."', '".$this->nom_form."'); 
				if($nom_objeto.type != undefined){
					obj_error = $nom_objeto;
				}else{
					obj_error = ".$nom_objeto."[0];
				}"
				."	
					obj_error.focus();
					obj_error.oldStyle = obj_error.style;
					obj_error.style.backgroundColor = '#FFFCE2';
					obj_error.style.borderColor = 'red';
					obj_error.style.backgroundImage = 'url('+document.".$this->nom_form.".urlImgWar+'warning_obj.gif)';
					obj_error.style.backgroundPosition = 'right';
					obj_error.style.backgroundRepeat =  'no-repeat';
				";
			}
			$retornar .="
			</script>
			";
			return $retornar;
		}
	}
	/**
	* Construir HTML
	* 
	* Construir el formulario din�micamente utilizando un objeto de creaci�n de html el cual se le pasa como par�metro.
	* Este objeto se crea a partir de la clase MCI_html
	* @Autor Thomas Woodard
	*/
	function obtener_html(&$obj_html, $arg_tabla = NULL){
		$this->lista_md5_inv = array_flip($this->lista_md5);
		$retornar = "";
		$pre_retorno= "";
		if($this->js_incluido == false){$pre_retorno = $this->obtener_archivos_js();}
		if($arg_tabla == NULL){
			$arg_tabla = array('width' => 300, 'align' => 'default', 'border' => 0, 'cellpadding' => 5, 'bgcolor' => '#FFFFFF');
		}
		 
		$retornar .= $obj_html->comenzar_formulario(
				array(
					'name' 		=> $this->nom_form,
					'action'	=> $this->accion_form,
					'enctype'	=> $this->enctype_form
				)
			);
		$filas[0]["cel"] = array($this->html_error($this->nom_form));
		$filas[0]["arg"][0]=array('colspan' => '2');
		$filas[0]["usespan"][0]=false;
		$i=1;
		foreach ($this->campos as $id_campo => $campo){ // cada campo
			$campo_args = (isset($this->campos[$id_campo]["args"]))?$this->campos[$id_campo]["args"]:NULL;
			$campo_args["title"] = (isset($campo["titulo"]))?$campo["titulo"]:NULL;
			if($campo_fila = $this->obtener_campo($obj_html, $id_campo, $campo, $campo_args)){
				$filas[$i]["cel"] = $campo_fila;
				if(isset($campo["fila"]["pre"])){$filas[$i]["arg"]["fila"]["prepend"]=$campo["fila"]["pre"];} // Funcionalidad para agregar c�digo html antes o despu�s de un campo
				if(isset($campo["fila"]["post"])){$filas[$i]["arg"]["fila"]["append"]=$campo["fila"]["post"];} // $form->campos["id_subsubobjetivo"]["fila"]["post"] = "C�digo Arbitrario";
				$i++;
			}
		}
		if($this->unir_botones && count($this->botones)>0){
			$botones = implode(" ",$this->botones);
			$filas[$i]["cel"]=array($obj_html->div("c_botones",$botones,array("align"=>"center")));
			$filas[$i]["arg"][0]=array('colspan' => '2');
		}
		$retornar .= $obj_html->autotabla($filas, $arg_tabla);
		foreach($this->campos_ocultos as $campo){
			$retornar .= $campo;
		}
		$retornar .= $this->campo_oculto(); 
		$retornar .= $obj_html->terminar_formulario();
		$retornar .= $this->obtener_js();
		$pre_retorno .= $obj_html->obtener_archivos_js();
		return $pre_retorno.$retornar;
	}	
	/**
	* Obtener Campo
	* 
	* Retorna un campo a la vez. Sirve tambi�n para crear formularios costumizados.
	*/
	function obtener_campo(&$obj_html, $id_campo, $campo, $campo_args=NULL){
		if(!isset($this->lista_md5_inv)){$this->lista_md5_inv = array_flip($this->lista_md5);}
		if(!isset($campo["tipo"])) return NULL;
		$campo["valor"] = (isset($campo["valor"]))?$campo["valor"]:NULL;
		switch ($campo["tipo"]){
				case "text":
					if($campo["valor"] != NULL){$campo_args["value"] = $campo["valor"];} 
					@$htmlcampo = $obj_html->textfield($this->lista_md5_inv[$id_campo], $campo_args);
					$fila=array($this->campos[$id_campo]["titulo"], $htmlcampo);
				break;
				case "hidden":
					if($campo["valor"] != NULL){$campo_args["value"] = $campo["valor"];} 
					@$htmlcampo = $obj_html->hidden($this->lista_md5_inv[$id_campo], $campo_args);
					$this->campos_ocultos[] = $htmlcampo;
				break;
				case "password":
					$campo_args["value"] = "";
					@$htmlcampo = $obj_html->password_field($this->lista_md5_inv[$id_campo], $campo_args);
					$fila=array($this->campos[$id_campo]["titulo"], $htmlcampo);
				break;
				case "file":
					$htmlcampo = "";
					if($campo["valor"] != NULL){$campo_args["value"] = $campo["valor"];} 
					$htmlcampo .= $obj_html->filefield($this->lista_md5_inv[$id_campo], $campo_args, $this->directorio_upload);
					$fila=array($this->campos[$id_campo]["titulo"], $htmlcampo);
				break;
				case "textarea":
					if($campo["valor"] != NULL){$campo_args["value"] = $campo["valor"];} 
					@$htmlcampo = $obj_html->textarea($this->lista_md5_inv[$id_campo], $campo_args);
					$fila=array($this->campos[$id_campo]["titulo"], $htmlcampo);
				break;
				case "wysiwyg":
					if($campo["valor"] != NULL){$campo_args["value"] = $campo["valor"];} 
					@$htmlcampo = $obj_html->wysiwyg($this->lista_md5_inv[$id_campo], $campo_args);//pasar $name y args: value, css, xml, width, height, barra 
					$fila=array($this->campos[$id_campo]["titulo"], $htmlcampo);
				break;
				case "list":
				case "select":		
					$campo["valor"] = trim($campo["valor"]);
					@$htmlcampo = $obj_html->popup_menu($this->lista_md5_inv[$id_campo], $campo["valores"], $campo["valor"], $campo_args);
					$fila=array($this->campos[$id_campo]["titulo"], $htmlcampo);
				break;
				case "checkbox":
					if($campo["valor"] != NULL){$campo_args["value"] = $campo["valor"];} 
					@$htmlcampo = $obj_html->checkbox($this->lista_md5_inv[$id_campo], $campo_args);
					$fila=array($this->campos[$id_campo]["titulo"], $htmlcampo);
				break;
				case "radio":
					if($campo["valor"] != NULL){$campo_args["value"] = $campo["valor"];} 
					@$htmlcampo = $obj_html->radiobutton_set($this->lista_md5_inv[$id_campo], $campo["valores"], $campo["valor"], $campo_args);
					$fila=array($this->campos[$id_campo]["titulo"], $htmlcampo);
				break;
				case "submit":
					@$htmlcampo = $obj_html->submit($this->lista_md5_inv[$id_campo], $campo["titulo"], $campo_args);
					if($this->unir_botones){$this->botones[]=$htmlcampo;return NULL;}else{$fila=array(NULL, $htmlcampo);}
				break;
				case "reset":
					@$htmlcampo = $obj_html->reset($campo["titulo"], $campo_args);
					if($this->unir_botones){$this->botones[]=$htmlcampo;return NULL;}else{$fila=array(NULL, $htmlcampo);}
				break;
				case "button":
					@$htmlcampo = $obj_html->button($this->lista_md5_inv[$id_campo], $campo["titulo"], $campo_args);
					if($this->unir_botones){$this->botones[]=$htmlcampo;return NULL;}else{$fila=array(NULL, $htmlcampo);}
				break;
				case "fecha":
				case "date":
					if(isset($campo["valor"]) && $campo["valor"] != NULL){$campo_args["value"] = $campo["valor"];} 
					@$htmlcampo = $obj_html->datefield($this->lista_md5_inv[$id_campo], $campo_args);
					$fila=array($this->campos[$id_campo]["titulo"], $htmlcampo);
				break;
				default:
					if($campo["tipo"] != NULL || $campo["tipo"] != ""){
						$this->validacion_error = "El Tipo de Campo ".$campo["tipo"]." No Existe";
					}
				break;
			}// switch
		$fila = (isset($fila))?$fila:NULL;
		return $fila;
		}
	/**
	* _HTML Error
	* 
	* Devuelve el texto con formato rojo y bold
	* @Autor Thomas Woodard
	*/	
	function _html_error($texto, $style = "color: #FF0000; font-weight: bold;"){
		return '<span style="'.$style.'">'.$texto.'</span>';
	}
	/**
	* HTML Error
	* 
	* Devuelve el div que se requiere para mostrar el mensaje de error si se elige
	* mostrar el error en este formato.  EL texto cambiar� din�micamente de acuerdo al error en la validaci�n que se presente.
	* En el caso de haber varios formularios y que se quiera tener igual n�mero de mensajes de error, se puede pasar
	* el nombre del formulario al cual estar� asociado como par�metro.
	* @Autor Thomas Woodard
	*/
	function html_error($nom_form = NULL){
		$display = ($this->espacio_error)?"block":"none";
		if($nom_form){
			$retorno = '<div id="dcontent_'.$nom_form.'" style="width:100%;display:'.$display.'"></div>';
			if($this->validacion_error){
				$retorno .= "
				<noscript>".$this->validacion_error."</noscript><br>
				";
			}
		}else{
			$retorno = '<div id="dcontent" style="width:100%;"></div>';
			if($this->validacion_error){
				$retorno .= "
				<noscript>".$this->validacion_error."</noscript>
				";
			}
		}
		return $retorno;
	}
	/**
	* Campo Oculto
	* 
	* Se utiliza este m�todo para crear un campo oculto que le indica al m�todo procesar si el 
	* formulario ha sido enviado por el usuario o no, para as� determinar si debe realizar la 
	* validaci�n por PHP.
	* @Autor Thomas Woodard
	*/	
	function campo_oculto(){
		return "<input type='hidden' id='MCI_validar' name='MCI_validar' value='".$this->nom_form."' />";
	}	
	/**
	* Validar un campo
	* 
	* Devuelve verdadero si se valida correctamente los datos enviados por el formulario
	* @Autor Thomas Woodard
	*/	
	function _validar_campo($id_campo, $campo){
		foreach($campo["val"] as $clave => $val){ // cada validaci�n del campo
			if($campo["titulo"]!=NULL){$nombre = $campo["titulo"];}else{$nombre = $id_campo;}
			switch ($val){
				case "r":
				case "req":
					if(!isset($campo["valor"]) || trim($campo["valor"]) == ""){
						if($campo["tipo"]=="file" && isset($this->campos["hc_".md5($id_campo)]) && trim($this->campos["hc_".md5($id_campo)]["valor"] != "")){ 
							break;
						}
						if($campo["error"][$clave]){
							$this->validacion_error = $campo["error"][$clave];
						} else $this->validacion_error = $nombre. " es un Campo Requerido"; 
						$this->validacion_campo_error = $id_campo;
						return false;
					}
					break;
				case "maxl": 
				case "maxlon": 
					if(isset($campo["valor"]) && $campo["valor"] != ""){ // se verifica que se haya ingresado un valor para evitar errores
						if(strlen($campo["valor"]) > $campo["val_args"][$clave]){ 
							if($campo["error"][$clave]){
								$this->validacion_error = $campo["error"][$clave];
							} else $this->validacion_error = $nombre. " Debe Tener no M&aacute;s de ".$campo["val_args"][$clave]." Caracteres "; 
							$this->validacion_campo_error = $id_campo;
							return false;
						}
					}						
					break;
				case "minl":
				case "minlon":
					if(isset($campo["valor"]) && $campo["valor"] != ""){
						if(strlen($campo["valor"]) < $campo["val_args"][$clave]){ 
							if($campo["error"][$clave]){
								$this->validacion_error = $campo["error"][$clave];
							} else $this->validacion_error = $nombre. " Debe tener almenos ".$campo["val_args"][$clave]." Caracteres "; 
							$this->validacion_campo_error = $id_campo;
							$this->validacion_campo_error = $id_campo;
							return false;
						}
					}
					break;
				case "noespacio": 
				case "! ":
					if(isset($campo["valor"]) && $campo["valor"] != ""){
						if(ereg_replace(" ", "", $campo["valor"]) != $campo["valor"]){//[^ \f\n\r\t\v]
							if($campo["error"][$clave]){
								$this->validacion_error = $campo["error"][$clave];
							} else $this->validacion_error = $nombre. " No debe poseer Espacios en Blanco "; 
							$this->validacion_campo_error = $id_campo;
							return false;
						}
					}
					break;
				case "a1":
				case "alfanumerico":
					if(isset($campo["valor"]) && $campo["valor"] != ""){
						if(ereg_replace("[^a-zA-z0-9������������][ \f\n\r\t\v]", "", $campo["valor"]) != $campo["valor"]){
							if($campo["error"][$clave]){
								$this->validacion_error = $campo["error"][$clave];
							} else $this->validacion_error = $nombre. " Solamente debe Tener Caracteres Alfa-Num&ecute;ricos "; 
							$this->validacion_campo_error = $id_campo;
							return false;
						}
					}
					break;
				case "1":
				case "num":
				case "numerico": 
					if(isset($campo["valor"]) && $campo["valor"] != ""){
						if(ereg_replace("[^0-9.][ \f\n\r\t\v]", "", $campo["valor"]) != $campo["valor"]){
							if($campo["error"][$clave]){
								$this->validacion_error = $campo["error"][$clave];
							} else $this->validacion_error = $nombre. " Solamente debe tener Caracteres Num&eacute;ricos "; 
							$this->validacion_campo_error = $id_campo;
							return false;
						}
					}
					break;
				case "a":
				case "alfa":
				case "alfabetico":
					if(isset($campo["valor"]) && $campo["valor"] != ""){
						if(ereg_replace("[^a-zA-z������������][ \f\n\r\t\v]", "", $campo["valor"]) != $campo["valor"]){
							if($campo["error"][$clave]){
								$this->validacion_error = $campo["error"][$clave];
							} else $this->validacion_error = $nombre. " Solamente debe tener Caracteres Alfab&eacute;ticos "; 
							$this->validacion_campo_error = $id_campo;
							return false;
						}
					}
					break;
				case "a1-":
				case "a1-_":
				case "alnumguion":
					if(isset($campo["valor"]) && $campo["valor"] != ""){//die($campo["valor"]);
						if(ereg_replace("[^a-zA-z0-9._-][ \f\n\r\t\v]", "", $campo["valor"]) != $campo["valor"]){
							if($campo["error"][$clave]){
								$this->validacion_error = $campo["error"][$clave];
							} else $this->validacion_error = $nombre. " Debe Incluir Solamente los Caracteres A-Z,a-z,0-9,- y _"; 
							$this->validacion_campo_error = $id_campo;
							return false;
						}
					}
					break;
				case "email": 
					if(isset($campo["valor"]) && $campo["valor"] != ""){
						$pattern = "/^[A-z0-9_\-]+\@(A-z0-9_-]+\.)+[A-z]{2,4}$/";
						if(!preg_match($pattern,$campo["valor"])){
							if($campo["error"][$clave]){
								$this->validacion_error = $campo["error"][$clave];
							} else $this->validacion_error = "Debe Ingresar Un Email V&acute;lido ";
						}
						if (strlen($this->email)>100){
							if($campo["error"][$clave]){
								$this->validacion_error = $campo["error"][$clave];
							} else $this->validacion_error = "El Correo Electr&ocute;nico es Demasiado Largo";
						}
						
					}
					break;
				case "<":
				case "menorque":
					if(isset($campo["valor"]) && $campo["valor"] != ""){
						if(ereg_replace("[^0-9]", "", $campo["valor"]) != $campo["valor"]){
							if($campo["error"][$clave]){
								$this->validacion_error = $campo["error"][$clave];
							} else $this->validacion_error = $nombre. " solamente debe tener caracteres num&eacute;ricos "; 
							$this->validacion_campo_error = $id_campo;
							return false;
						}
						if($campo["valor"] > $campo["val_args"][$clave]){
							if($campo["error"][$clave]){
								$this->validacion_error = $campo["error"][$clave];
							} else $this->validacion_error = "El valor de ". $nombre ." debe ser menor que ". $campo["val_args"][$clave];
							$this->validacion_campo_error = $id_campo;
							return false;
						}
					}
					break;
				case ">":
				case "mayorque":
					if(isset($campo["valor"]) && $campo["valor"] != ""){
						if(ereg_replace("[^0-9]", "", $campo["valor"]) != $campo["valor"]){
							if($campo["error"][$clave]){
								$this->validacion_error = $campo["error"][$clave];
							} else $this->validacion_error = $nombre. " Solamente Debe Tener Caracteres Num&eacute;ricos "; 
							$this->validacion_campo_error = $id_campo;
							return false;
						}
						if($campo["valor"] < $campo["val_args"][$clave]){
							if($campo["error"][$clave]){
								$this->validacion_error = $campo["error"][$clave];
							} else $this->validacion_error = "El Valor de ". $nombre ." Debe Ser Mayor Que ". $campo["val_args"][$clave];
							$this->validacion_campo_error = $id_campo;
							return false;
						}
					}
					break;
				case "regexp":
					if(isset($campo["valor"]) && $campo["valor"] != ""){
						if(!preg_match("/".$campo["val_args"][$clave]."/",$campo["valor"])){
							if($campo["error"][$clave]){
								$this->validacion_error = $campo["error"][$clave];
							} else $this->validacion_error = "El Formato de ". $nombre ." No Es El Correcto ";
							$this->validacion_campo_error = $id_campo;
							return false;
						}
					}
					break;
				case "lista":
				case "!=":
				case "noseleccionar":
					if(isset($campo["valor"]) && $campo["valor"] != ""){
						if($campo["val_args"][$clave]){$noseleccion = $campo["val_args"][$clave];}else{$noseleccion = '0';}
						if($campo["valor"]==$noseleccion){
							if($campo["error"][$clave]){
								$this->validacion_error = $campo["error"][$clave];
							} else $this->validacion_error = "Debe Seleccionar una Opci&oacute;n de ". $nombre ;
							$this->validacion_campo_error = $id_campo;
							return false;
						}
					}
					break;
				case "=":
				case "a==b":
				case "camposiguales":
					if(isset($campo["valor"]) && $campo["valor"] != ""){
						$campo_comp_temp = $campo["val_args"][$clave];
						$campo_comparacion = (isset($this->lista_md5[$campo_comp_temp])) ? $this->lista_md5[$campo_comp_temp] : $campo_comp_temp; //$campo["val_args"][$clave];
						//if ($this->usar_campos_md5 == true){$campo = "c_".md5($campo);}else{$campo_comparacion = $campo["val_args"][$clave];}
						if(!$this->campos[$campo_comparacion]["valor"]){
							if($campo["error"][$clave]){
								$this->validacion_error = $campo["error"][$clave];
							} else $this->validacion_error = "Depurar: El Campo $campo_comparacion No Existe ";
							$this->validacion_campo_error = $id_campo;
							return false;
						}
						if($this->campos[$campo_comparacion]["titulo"]!=NULL){
							$nombre_comparacion = $this->campos[$campo_comparacion]["titulo"];
						}else{
							$nombre_comparacion = $campo_comparacion;
						}
						if($campo["valor"] != $this->campos[$campo_comparacion]["valor"]){
							if($campo["error"][$clave]){
								$this->validacion_error = $campo["error"][$clave];
							} else $this->validacion_error = "El Campo ". $nombre. " Debe ser Igual al Campo ".$campo_comparacion ;
							$this->validacion_campo_error = $id_campo;
							return false;
						}
					}
					break;
				case "a!=b":
				case "camposdesiguales":
					if(isset($campo["valor"]) && $campo["valor"] != ""){
						$campo_comp_temp = $campo["val_args"][$clave];
						$campo_comparacion = (isset($this->lista_md5[$campo_comp_temp])) ? $this->lista_md5[$campo_comp_temp] : $campo_comp_temp; 
						if(!$this->campos[$campo_comparacion]["valor"]){
							if($campo["error"][$clave]){
								$this->validacion_error = $campo["error"][$clave];
							} else $this->validacion_error = "Depurar: el Campo $campo_comparacion No Existe ";
							$this->validacion_campo_error = $id_campo;
							return false;
						}
						if($this->campos[$campo_comparacion]["titulo"]!=NULL){
							$nombre_comparacion = $this->campos[$campo_comparacion]["titulo"];
						}else{
							$nombre_comparacion = $campo_comparacion;
						}
						if($campo["valor"] == $this->campos[$campo_comparacion]["valor"]){
							if($campo["error"][$clave]){
								$this->validacion_error = $campo["error"][$clave];
							} else $this->validacion_error = "El Campo ". $nombre. " No Puede ser Igual al Campo ".$campo_comparacion ;
							$this->validacion_campo_error = $id_campo;
							return false;
						}
					}
					break;
				case "forzar":
					if($campo["error"][$clave]){
						$this->validacion_error = $campo["error"][$clave];
					} else $this->validacion_error = "DEPURAR: Debe Especificar un Mensaje de Error Para ".$nombre;
						$this->validacion_campo_error = $id_campo;
							return false;
					break;
				case "fechaformato":
				case "ff":
					if(isset($campo["valor"]) && $campo["valor"] != ""){
						$tipoDelimitador = false;
						if(strstr($campo["valor"],"/")) $tipoDelimitador="/";
						if(strstr($campo["valor"],"-")) $tipoDelimitador="-";
						if($tipoDelimitador){
							$fecha_array = explode($tipoDelimitador,$campo["valor"]);
							$dteDate = strtotime($fecha_array[2]."-".$fecha_array[1]."-".$fecha_array[0]);
							if(
								(date("d", $dteDate) == $fecha_array[0] || date("j", $dteDate) == $fecha_array[0]) &&
								(date("m", $dteDate) == $fecha_array[1] || date("n", $dteDate) == $fecha_array[1]) &&
								 date("Y", $dteDate) == $fecha_array[2]
							   )
							{
								$this->campos[$id_campo]["valor"] = date("d", $dteDate)."/".date("m", $dteDate)."/".date("Y", $dteDate);
							} else {
								if($campo["error"][$clave]){
									$this->validacion_error = $campo["error"][$clave];
								} else $this->validacion_error = "El Campo ".$nombre." Debe Estar en el Formato dd/mm/aaaa (d�a/mes/a�o) ";
								$this->validacion_campo_error = $id_campo;
								return false;
							}
						} else {
							if($campo["error"][$clave]){
								$this->validacion_error = $campo["error"][$clave];
							} else $this->validacion_error = "El campo ".$nombre." Debe Estar en el Formato dd/mm/aaaa (d�a/mes/a�o) ";
							$this->validacion_campo_error = $id_campo;
							return false;
						}
					}
					break;
				case "f>":
				case "fecha >":
					if(isset($campo["valor"]) && $campo["valor"] != ""){
						$tipoDelimitador = false;
						if(strstr($campo["valor"],"/")) $tipoDelimitador="/";
						if(strstr($campo["valor"],"-")) $tipoDelimitador="-";
						$fecha_array = explode($tipoDelimitador,$campo["valor"]);
						$faValidar = strtotime($fecha_array[2]."-".$fecha_array[1]."-".$fecha_array[0]);
						// parsear el par�metro pasado a la funci�n
						$tipoDelimitador = false;
						if(strstr($campo["val_args"][$clave],"/")) $tipoDelimitador="/";
						if(strstr($campo["val_args"][$clave],"-")) $tipoDelimitador="-";
						
						if($tipoDelimitador){// Si el par�metro es una fecha
							$fecha_array = explode($tipoDelimitador,$campo["val_args"][$clave]);
							$faComparar = strtotime($fecha_array[2]."-".$fecha_array[1]."-".$fecha_array[0]);
							if($faValidar < $faComparar){
								if($campo["error"][$clave]){
									$this->validacion_error = $campo["error"][$clave];
								} else $this->validacion_error = "El Campo ".$nombre." Debe Ser una Fecha Posterior a ".$campo["val_args"][$clave];
								$this->validacion_campo_error = $id_campo;
								return false;
							}
							
						} else {// ** Si el par�metro es un campo al que se le comparar�
						
							$campo_comp_temp = $campo["val_args"][$clave];
							$campo_comparacion = (isset($this->lista_md5[$campo_comp_temp])) ? $this->lista_md5[$campo_comp_temp] : $campo_comp_temp; //$campo["val_args"][$clave];

							if(!$this->campos[$campo_comparacion]["valor"]){ // verificar que sea un campo que exista
								if($campo["error"][$clave]){
									$this->validacion_error = $campo["error"][$clave];
								} else $this->validacion_error = "Depurar: el Campo $campo_comparacion No Existe ";
								$this->validacion_campo_error = $id_campo;
								return false;
							}
							// Preparar para el error
							if($this->campos[$campo_comparacion]["titulo"]!=NULL){
								$nombre_comparacion = $this->campos[$campo_comparacion]["titulo"];
							}else{
								$nombre_comparacion = $campo_comparacion;
							}
							// parsear el campo de formulario al que se comparar�
							$valorComparar = $this->campos[$campo_comparacion]["valor"];
							$tipoDelimitador = false;
							if(strstr($valorComparar,"/")) $tipoDelimitador="/";
							if(strstr($valorComparar,"-")) $tipoDelimitador="-";
							
							if($tipoDelimitador){// Si el campo es una fecha
								$fecha_array = explode($tipoDelimitador, $valorComparar);
								$faComparar = strtotime($fecha_array[2]."-".$fecha_array[1]."-".$fecha_array[0]);
								if($faValidar < $faComparar){
									if($campo["error"][$clave]){
										$this->validacion_error = $campo["error"][$clave];
									} else $this->validacion_error = "El Campo ".$nombre." Debe ser una Fecha Posterior a la del Campo ".$nombre_comparacion;
									$this->validacion_campo_error = $id_campo;
									return false;
								}
							} 
						}
					}
					break;
				case "f<":
				case "fecha <":
					if(isset($campo["valor"]) && $campo["valor"] != ""){
						$tipoDelimitador = false;
						if(strstr($campo["valor"],"/")) $tipoDelimitador="/";
						if(strstr($campo["valor"],"-")) $tipoDelimitador="-";
						$fecha_array = explode($tipoDelimitador,$campo["valor"]);
						$faValidar = strtotime($fecha_array[2]."-".$fecha_array[1]."-".$fecha_array[0]);
						// parsear el par�metro pasado a la funci�n
						$tipoDelimitador = false;
						if(strstr($campo["val_args"][$clave],"/")) $tipoDelimitador="/";
						if(strstr($campo["val_args"][$clave],"-")) $tipoDelimitador="-";
						
						if($tipoDelimitador){// Si el par�metro es una fecha
							$fecha_array = explode($tipoDelimitador,$campo["val_args"][$clave]);
							$faComparar = strtotime($fecha_array[2]."-".$fecha_array[1]."-".$fecha_array[0]);
							if($faValidar > $faComparar){
								if($campo["error"][$clave]){
									$this->validacion_error = $campo["error"][$clave];
								} else $this->validacion_error = "El campo ".$nombre." Debe ser una Fecha Anterior a ".$campo["val_args"][$clave];
								$this->validacion_campo_error = $id_campo;
								return false;
							}
							
						} else {// ** Si el par�metro es un campo al que se le comparar�
						
							$campo_comp_temp = $campo["val_args"][$clave];
							$campo_comparacion = (isset($this->lista_md5[$campo_comp_temp])) ? $this->lista_md5[$campo_comp_temp] : $campo_comp_temp; //$campo["val_args"][$clave];

							if(!$this->campos[$campo_comparacion]["valor"]){ // verificar que sea un campo que exista
								if($campo["error"][$clave]){
									$this->validacion_error = $campo["error"][$clave];
								} else $this->validacion_error = "Depurar: el Campo $campo_comparacion no Existe ";
								$this->validacion_campo_error = $id_campo;
								return false;
							}
							// Preparar para el error
							if($this->campos[$campo_comparacion]["titulo"]!=NULL){
								$nombre_comparacion = $this->campos[$campo_comparacion]["titulo"];
							}else{
								$nombre_comparacion = $campo_comparacion;
							}
							// parsear el campo de formulario al que se comparar�
							$valorComparar = $this->campos[$campo_comparacion]["valor"];
							$tipoDelimitador = false;
							if(strstr($valorComparar,"/")) $tipoDelimitador="/";
							if(strstr($valorComparar,"-")) $tipoDelimitador="-";

							if($tipoDelimitador){// Si el campo es una fecha
								$fecha_array = explode($tipoDelimitador, $valorComparar);
								$faComparar = strtotime($fecha_array[2]."-".$fecha_array[1]."-".$fecha_array[0]);
								if($faValidar > $faComparar){
									if($campo["error"][$clave]){
										$this->validacion_error = $campo["error"][$clave];
									} else $this->validacion_error = "El Campo ".$nombre." Debe ser una Fecha Anterior a la del Campo ".$nombre_comparacion;
									$this->validacion_campo_error = $id_campo;
									return false;
								}
							} 
						}
					}
					break;
				case ".?":
				case "extensionarchivo":
					if(isset($campo["valor"]) && $campo["valor"] != ""){
						if(!$campo["val_args"][$clave]) {
							$campo["val_args"][$clave] = "gif|jpg|jpeg|bmp|png";
						} else {
								$campo["val_args"][$clave] = str_replace(",","|",$campo["val_args"][$clave]);
						}
						if(!eregi("(\.(".$campo["val_args"][$clave]."))$",$campo["valor"])){
							if($campo["error"][$clave]){
								$this->validacion_error = $campo["error"][$clave];
							} else{ 
								$ext_val = str_replace("|",", ",$campo["val_args"][$clave]);
								$this->validacion_error = "En el Campo ". $nombre .", Solamente se Permiten Archivos Cuya Extensi�n Sea ".$ext_val;
							}
							$this->validacion_campo_error = $id_campo;
							return false;
						}
					} else if (isset($campos["h".$id_campo]["valor"]) && $campos["h".$id_campo]["valor"] != ""){ // si hay un campo para update de archivos
						if(!$campo["val_args"][$clave]) {
							$campo["val_args"][$clave] = "gif|jpg|jpeg|bmp|png";
						} else {
								$campo["val_args"][$clave] = str_replace(",","|",$campo["val_args"][$clave]);
						}
						if(!eregi("(\.(".$campo["val_args"][$clave]."))$",$campos["f".$id_campo]["valor"])){
							if($campo["error"][$clave]){
								$this->validacion_error = $campo["error"][$clave];
							} else{ 
								$ext_val = str_replace("|",", ",$campo["val_args"][$clave]);
								$this->validacion_error = "En el Campo ". $nombre .", Solamente se Permiten Archivos cuya extensi�n sea ".$ext_val;
							}
							$this->validacion_campo_error = $id_campo;
							return false;
						}
					}
					break;
				case "KB"://["archivo"]['size']
				case "tama�oarchivo":
					if(isset($campo["valor"]) && $campo["valor"] != ""){
						if(!$campo["val_args"][$clave]){$campo["val_args"][$clave] = 1000;}
						if($campo["archivo"]['size'] > ($campo["val_args"][$clave]*1024)){
							if($campo["error"][$clave]){
								$this->validacion_error = $campo["error"][$clave];
							} else $this->validacion_error = "El archivo en el campo ".$nombre." debe ser de M�ximo ".$campo["val_args"][$clave]." KB (".round($campo["val_args"][$clave]/1024, 2)." MB)";
							$this->validacion_campo_error = $id_campo;
							return false;
						}
					}
					break;
				case "xxx":
					if(isset($campo["valor"]) && $campo["valor"] != ""){
						if(!preg_match($campo["val_args"][$clave],$campo["valor"])){
							if($campo["error"][$clave]){
								$this->validacion_error = $campo["error"][$clave];
							} else $this->validacion_error = "El Formato de ". $nombre ." No es el Correcto ";
							$this->validacion_campo_error = $id_campo;
							return false;
						}
					}
					break;
				default:
					$this->validacion_error = "Depurar: El tipo de validaci�n ".$val." no existe";
					return false;
					break;
				
			}//case
		}
		return true;
	}
	/**
	* Validar formulario mediante PHP
	* 
	* Devuelve verdadero si se valida correctamente los datos enviados por el formulario
	* @Autor Thomas Woodard
	*/	
	function _validacion_php($campos_validar=""){
		if($campos_validar==""){
			foreach ($this->campos as $id_campo => $campo){ // cada campo 
				if(!$this->_validar_campo($id_campo, $campo)){return false;}
			}
		}else if(is_array($campos_validar)){
			foreach ($campos_validar as $campo_validar){
				if(!$this->_validar_campo($campo_validar, $this->campos[$campo_validar])){return false;}
			}
		}
	return true;
	}
	/**
	* Encriptar Campos
	* 
	* Activa la opci�n mediante la cual el id de los campos que se crean en obtener_HTML 
	* se encripta mediante un Hash MD5. Esto es �til si se est� usando como referencia
	* el nombre de las columnas de la base de datos y no se desea que el usuario final
	* descifre los nombres de los mismos.
	* @Autor Thomas Woodard
	*/	
	function encriptar_campos(){
		return $this->usar_campos_md5 = true;
	}
	/**
	* Referenciar Campo
	* 
	* Ya que existe la posibilidad de que un campo est� o no encriptado, cuando se agrega una
	* validaci�n que haga referencia a otro campo, a veces no se sabe si este est� encriptado o no
	* y, por ende, no se sabe que valor pasarle al m�todo. Este m�todo asegura que el campo 
	* retorne el id real del campo en el formulario, ya sea que est�n encriptados o no los ids de
	* los mismos.
	* @Autor Thomas Woodard
	*/	
	function referenciar_campo($campo){
		if ($this->usar_campos_md5 == true){$campo = "c_".md5($campo);}
		return $campo;
	}
	
	/** 
	* Obtener direcci�n absoluta del archivo incluido 
	*/
	/*function _obtener_reldir(){
		global $_SERVER; $reldir = "";
		$thisdir_a = (strstr(dirname(__FILE__), "\\")) ? explode("\\", dirname(__FILE__)) : explode("/", dirname(__FILE__));
		$thisurl_a = explode("/", dirname($_SERVER["PHP_SELF"])); 
		$rel_indx = array_search($thisurl_a[1], $thisdir_a);
		for ($i=$rel_indx; $i <= count($thisdir_a); $i++){$reldir .= (isset($thisdir_a[$i]))?"/".$thisdir_a[$i]:"/";}// Pura magia <-
		return $reldir;
	}*/
}
?>
