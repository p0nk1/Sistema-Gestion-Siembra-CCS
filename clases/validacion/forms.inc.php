<?php 
/**
* Validación de Formularios
* 
* Valida formularios vía JavaScript y PHP. 
* 
* Instrucciones:
* Para validar un formulario mediante JavaScript y PHP se debe cumplir unos pasos:
* 1) Incluir el archivo que contiene la clase:
* ej. include "validacion/forms.inc.php";
* 
* 2) Inicializar el objeto. Se le pasa como parámetro el nombre del formulario a validar. También se le puede
* enviar la acción, es decir el url que procesará el formulario. Por defecto se apunta a si mismo:
* $validar = new forms("login");
* 
* 3) Agregar un objeto a la clase. El primer parámetro es el nombre del objeto de formulario,
* el segundo es el tipo de objeto (div,text, textarea, select, radio, etc.), y el tercero es el Título
* del campo (el cual se utiliza para hacerle referencia en el momento de tener que mostrar un error):
* $validar->agregar_objeto("user", "text", "Nombre de Usuario");
* 
* 4) Agregar uno o varios tipos de validación para el objeto. Estas validaciones debenser para objetos de
* tipo input. El primer parámetro es el nombre del campo, el segundo es el tipo de validación (la lista de
* todos los tipos de validación posibles está guardado en la variable $this->lista_validacion). El 
* tercer parámetro son las opciones o parámetros que se le pasa al tipo de validación, como por ejemplo 
* un valor en KB mayor el cual será el límite para una validación de tamaño de archivo. El último 
* parámetro es un mensaje de error que suplantará al predeteminado.
* Los parámetros 2 y 3 son opcionales.
* $validar->agregar_validacion("user", "req", NULL, "No metiste datos al campo Usuario");
* $validar->agregar_validacion("user", "a1");
* $validar->agregar_validacion("user", "! ");
* 
* 5) Se repiten los pasos 3 y 4 tantas veces como sea necesario para agregar todos los campos y sus validaciones.
* 
* 6) Procesar el formulario en caso de que haya sido enviado. Devuelve verdadero si todos los campos son válidos
* por JavaScript y PHP. Este es el método clave, se le puede utilizar para pasar al proximo paso en el 
* procesado de datos, como por ejemplo su carga a una base de datos.
* if($validar->procesar()){die("Formulario completado exitosamente!!");}
* 
* Los próximos pasos son de construcción del html y código JavaScript necesarios para la validación por JavaScript
* 
* 7) Incluir  los archivos javascript con las clases de validación. En el caso de no encontrarse en la ubicación 
* predeterminada, se le puede pasar la nueva ubicación como parámetro. Estos archivos se deben incluír antes del 
* formulario, preferiblemente en la sección HEAD del html.
* <? echo $validar->obtener_archivos_js(); ?>
* 
* 8) Incluír el texto de error. Este texto cambiará dinámicamente de acuerdo al error en la validación que se presente.
* En el caso de haber varios formularios y que se quiera tener igual número de mensajes de error, se puede pasar
* el nombre del formulario al cual estará asociado como parámetro.
* <?php echo  $validar->html_error("login"); ?>
* 
* 9) Incluír el campo oculto. Se utiliza este método para crear un campo oculto que le indica al método procesar si el 
* formulario ha sido enviado por el usuario o no, para así determinar si debe realizar la validación por PHP.
* Se debe llamar este método desde adentro del formulario. Es decir, entre los campos <form> y </form>.
* <?php echo  $validar->campo_oculto(); ?>
* 
* 10) Incluír JavaScript de validación. Es importante que se coloque este llamado después del formulario, es decir
* después del tag </form> para que funcione correctamente. Esto se debe a que el JavaScript de validación trabaja 
* con objetos y debe estar completo el objeto del formulario antes de poderle hacer referencia.
* <?php echo $validar->obtener_js(); ?>
*
* @Autor Thomas Woodard
*/
class forms{
var $validar 		= false;
var $nom_form 		= NULL;
var $metodo_form 	= NULL;
var $accion_form 	= NULL;
var $enctype_form 	= "application/x-www-form-urlencoded";
var $validacion_paso = NULL;
var $validacion_error = NULL;
var $objetos = NULL;
var $valido_php = NULL;
var $archivos_js = array();
var $codigo_js = NULL;
var $url_archivo_js = NULL;
var $js_incluido = false;
var $espacio_error = false;
var $validacion_campo_error = NULL;
var $estilos = array(
					"label"		=>	"label",
					"row"		=>	"row",
					"text"		=>	"text",
					"textarea"	=>	"textarea",
					"opendiv"	=>	"div",
					"div"		=>	"div",
					"openspan"	=>	"span",
					"file"		=>	"file",
					"wysiwyg"	=>	"wysiwyg",
					"span"		=>	"span",
					"button"	=>	"button",
					"submit"	=>	"submit",
					"password"	=>	"password",
					"list"		=>	"select",
					"select"	=>	"select",
					"radio"		=>	"radio",
					"form_error"=>	"form_error",
					"checkbox"	=>	"checkbox",
					"date"		=>	"date",
					"fecha"		=>	"date",
					"reset"		=>	"reset"
					);
var $tabs		= NULL;
var $id_menutab	= "menutab_form";					
var $tab_abierto = false;
var $objetos_ocultos = array();
var $directorio_upload = "archivos/"; // Directorio predeterminado donde se cargarán los archivos
var $usar_campos_md5 = false; // encriptar los campos para que no se sepa el nombre de las columnas de la tabla
var $lista_md5 = array(); // contiene un array del nombre de cada columna en md5 si $usar_campos_md5 es true.
var $lista_validacion = array( // listar acá cualquier nueva función de validación. Los alias de una validación van en la mísma línea
					"req", "requerido", // campo requerido
					"maxlongitud", "maxlon", // longitud máxima
					"minlongitud", "minlon", // longitud mínima
					"a1", "alnum", "alfanumerico", // números y letras solamente
					"1", "num", "numerico", // números solamente
					"a", "alfabetico", "alfa", // letras solamente
					"a1-_", "a1-", "alnumguion", // números, letras, guión y underscore
					"email", // validar email
					"<", "menorque", // que el valor sea menor que cierto número
					">", "mayorque", // que un valor sea mayor que cierto número
					"regexp", // comparar con una expresión regular provista como argumento
					"noseleccionar", "lista", "!=",// verificar que el valor de un item de select no esté en su valor predeterminado
					"=", "camposiguales", // que un campo tenga el mismo valor que otro
					"fechaformato", "ff", // que la fecha observe el formato dd/mm/aaaa o dd-mm-aaaa
					"f>", "fecha >", // que la fecha sea posterior a otra, ya sea pasada por parámetro u otro campo
					"f<", "fecha <", // que la fecha sea posterior a otra, ya sea pasada por parámetro u otro campo
					"noespacio", "! ", // que no posea espacios en blanco
					".?","extensionarchivo", // que el archivo a subir sea de cierta extensión... imágenes por defecto... 
						// para probar otros tipos de archivo se pasa en el parámetro una lista de las extensiones, 
						// separadas por una coma ej. gif,jpg,jpeg,bmp,png
					"KB","tamañoarchivo", // verifica el que el tamaño del archivo sea el correcto. No hay equivalente de JavaScript
					"forzar" // forzar un error. Se debe especificar un mensaje de error
);
	/**
	* Constructor
	* 
	* Constructor. Recibe como parámetros el nombre del formulario y el método de envío del formulario. También recibe<br>
	* la acción del formulario.
	* @Autor Thomas Woodard
	*/
	function forms($nom_form, $metodo_form = "post", $accion_form = NULL){ 
		$reldir = $this->_obtener_reldir();
		$this->url_archivo_js = $reldir."js/";
		
		$this->nom_form = $nom_form;
		$this->metodo_form = $metodo_form;
		if ($accion_form == NULL){
			$accion_form = $_SERVER['PHP_SELF'] . (isset($_SERVER['QUERY_STRING']) ? "?" . $_SERVER['QUERY_STRING'] : "");
		}
		$this->accion_form = $accion_form;
	}
	
	/**
	* Agregar un objeto
	* 
	* Agregar un nuevo objeto al formulario. El id_objeto define el id y el nombre cuando se crea
	* la tabla. El tipo_campo es el nombre del tipo de campo (text, textarea, button, checkbox, radio, etc). 
	* El título es para efecto de mensajes de error y los argumentos son para el formateo del campo.
	* @Autor Thomas Woodard
	*/
	function agregar_objeto($id_objeto, $tipo_objeto, $titulo = NULL, $argumentos = NULL){
		$this->objetos[$id_objeto]["tipo"] = $tipo_objeto;
		$this->objetos[$id_objeto]["args"] = $argumentos;
		$this->objetos[$id_objeto]["titulo"] = $titulo;
		if($tipo_objeto=="file"){$this->enctype_form="multipart/form-data";}
		if($tipo_objeto=="wysiwyg")
		{
			if (!class_exists('FCKeditor')) 
			{
   				require_once dirname(__FILE__)."/../html/wysiwyg.inc.php";
			}	
		}
	}
	/**
	* Abrir Div: Crear el un objeto DIV y lo deja abierto para agregarle componentes
	*/
	function abrir_div($id_div, $argumentos = NULL)
	{
		$this->agregar_objeto($id_div, "opendiv", "", $argumentos);
	}
	/**
	* Cerrar Div:Cierra un objeto DIV previamente abierto
	*/
	function cerrar_div($id_div)
	{
		$this->agregar_objeto($id_div."close", "closediv");
	}
	/**
	* Abrir SPAN: Crear el un objeto SPAN y lo deja abierto para agregarle componentes
	*/
	function abrir_span($id_span, $argumentos = NULL)
	{
		$this->agregar_objeto($id_span, "openspan", "", $argumentos);
	}
	/**
	* Cerrar SPAN: Cierra un objeto SPAN previamente abierto
	*/
	function cerrar_span($id_span)
	{
		$this->agregar_objeto($id_span."close", "closespan");
	}
	/**
	* Cerrar Tab:Cierra un objeto Tab previamente abierto
	*/
	function cerrar_menutab($id_tab)
	{
		$this->agregar_objeto($id_tab."close", "closediv");
		$this->tab_abierto = false;
	}
	/**
	* menutab:Agrega un Tab para un formulario que deba ser manejado a traves de Tabs
	*/
	function menutab($tab, $titulo, $argumentos = NULL)
	{	
		if (!isset($this->tabs))
		{	
			if (!class_exists('menutab')) 
			{
   				require_once("mci/menutab/menutab.inc.php");
			}	
			$this->tabs = new menutab($this->id_menutab);
			if (isset($argumentos["class"]))
				$this->tabs->set_style("showtab", $argumentos["class"]);
		}	
		if ($this->tab_abierto)
			$this->cerrar_div("p_".$tab);
		$this->abrir_div($tab, $argumentos);
		$this->tabs->add_tab("tab_".$tab, $tab, $titulo);
		$this->tab_abierto = true;
	}
	/**
	* Establecer Estilo:Cambia un estilo de los predefinidos en el arreglo Estilos.
	* Si el estilo no esta definido en el arreglo, y se ha definido un Menu de TABs,
	* verifica si el estilo que se esta tratando de cambiar pertenece a dicho Menu.
	*/
	
	function establecer_estilo($nombre, $clase)
	{
		if (isset($this->estilos[$nombre]))
			$this->estilos[$nombre] = $clase;
		else
			if (isset($this->tabs))
				$this->tabs->set_style($nombre, $clase); 	
	}
	/**
	* Agregar una validación
	* 
	* Agregar una validación a cierto campo. El primer parámetro es el nombre del campo,
	* el segundo es el tipo de validación (la lista de todos los tipos de validación posibles está guardado
	* en la variable $this->lista_validacion). El tercer parámetro son las opciones o parámetros que se le
	* pasa al tipo de validación, como por ejemplo un valor en KB mayor el cual será el límite para una 
	* validación de tamaño de archivo. El último parámetro es un mensaje de error que suplantará al predeteminado.
	* @Autor Thomas Woodard
	*/
	function agregar_validacion($id_objeto, $tipo_validacion, $argumentos = NULL, $texto_error = NULL){
		if(in_array($tipo_validacion, $this->lista_validacion)){
			$this->objetos[$id_objeto]["val"][] = $tipo_validacion;
			$this->objetos[$id_objeto]["val_args"][] = $argumentos;
			$this->objetos[$id_objeto]["error"][] = $texto_error;
		} else {
		    $this->validacion_campo_error = $id_objeto;
			$this->validacion_error = "DEPURAR: El tipo de validación $tipo_validacion no existe.";
		}
		$this->validar=true;
	}
	
	/**
	* Agregar condicion a una  validación
	* 
	* Agregar una condicion para que una validacion ocurra. Recibe como parametro el objeto al que se condiciona la 
	* la validación, el objeto que se chequeará, el operador a aplicar y la condicion a cumplir 
	* @Autor Thomas Woodard
	*/
	function agregar_condicion_validacion($id_objeto,$objeto_chequear,$operador,$condicion)
	{
		$this->objetos[$id_objeto]["cond"][$objeto_chequear]["operador"] = $operador;
		$this->objetos[$id_objeto]["cond"][$objeto_chequear]["condicion"] = $condicion;
	}	 
	/**
	* Agregar Datos
	* 
	* Agregar datos a un campo del formulario. Recibe como parámetros el id del campo, y los datos que
	* se desea que muestre de manera predeterminada en el formulario. Si se trata de un list o radio,
	* el parámetro debe ser un array.
	* @Autor Thomas Woodard
	*/
	function agregar_datos($id_objeto, $datos){
		if(!is_array($datos)){
			$this->objetos[$id_objeto]["valor"] = $datos;
		}else{
			$this->objetos[$id_objeto]["valores"] = $datos;
		}
		
	}
	
	/** function agregar_fila: 
	Crea una fila al tipico estilo de una tabla, para eso crea una división <DIV> en donde incluye 
	el $titulo en un <LABEL> formateado con <SPAN> y posteriormente el objeto definido el $objeto. Funciona correctamente si se 
	utiliza una hoja de estilos, ya uqe son necesarias las clases div.row y span.label. Acá un ejemplo en donde los LABEL quedan 
	en el DIV del lado izquierdo y el texto del LABEL queda orientado al lado derecho. Si desea más información de como crear 
	páginas basadas en CCS sin tablas visite la Web de Eric Meyer (http://www.meyerweb.com)
			div.row 
			{
 				clear: both;
  			}

			div.row span.label 
			{
  				float: left;
  				width: 35%;
  				text-align: right;
  			}
	Para crear la fila se procede asi:
		Se abrer un objeto DIV (opendiv), posteriormente se abre un objeto SPAN (openspan)
		se agrega el campo LABEL y se le agrega como valor el $titulo del campo. Se cierra 
		el objeto SPAN (closespan), Se agrega el objeto del formulario especificado en 
		$tipo_objeto y se cierra el objeto DIV. El efecto es practicamente igual al una tabla
		cuando se colocan varios campos en consecutivo con este metodo. Si se desea alguna 
		fila con un formato especifico (Una división entre los campos por ejemplo) se puede 
		hacer con una función personalizada con la función agregar_objetos utilizando DIV y
		SPAN personalizados 		
	**/
	function agregar_fila_abierta($id_objeto, $tipo_objeto, $titulo = NULL, $argumentos = NULL, $args_div = NULL)
	{
		$args_div["class"] = $this->estilos["row"];
		$args_span1["class"] = $this->estilos["label"];
		$this->abrir_div('div_'.$id_objeto,$args_div);
		$this->agregar_objeto('span_label_'.$id_objeto,'span',$titulo,$args_span1);
		$this->agregar_objeto($id_objeto, $tipo_objeto, $titulo, $argumentos);
	}
	
	function agregar_fila($id_objeto, $tipo_objeto, $titulo = NULL, $argumentos = NULL, $args_div = NULL)
	{
		$this->agregar_fila_abierta($id_objeto, $tipo_objeto, $titulo, $argumentos, $args_div);
		$this->cerrar_div('div_'.$id_objeto);
	}
	
	
	/**
	* Procesar
	* 
	* Se llama esta función para determinar si ya se recibieron los datos enviados por el usuario y 
	* si cumple con todos los parámetros de validación. De ser cierto, devuelve true.
	* @Autor Thomas Woodard
	*/
	function procesar()
	{
		return $this->_validar_php();
		
	}
	
	
	function _validar_php(){
		if($this->usar_campos_md5){
			foreach($this->objetos as $objeto => $valor){$this->lista_md5["c_".md5($objeto)]=$objeto;}
		} else {
			foreach($this->objetos as $objeto => $valor){$this->lista_md5[$objeto]=$objeto;}
		}
		switch($this->metodo_form){
			case "post":
				if (isset($_POST["MCI_validar"]) && $_POST["MCI_validar"] == $this->nom_form){
					foreach($_POST as $objeto => $valor){
						//$valor = (!get_magic_quotes_gpc()) ? addslashes($valor) : $valor;
						$objeto = (isset($this->lista_md5[$objeto])) ? $this->lista_md5[$objeto] : $objeto; 
						$this->objetos[$objeto]["valor"] = trim($valor);
						$this->validacion_paso = 2;
					}
				}
				break;
			case "get":
				if (isset($_GET["MCI_validar"]) && $_GET["MCI_validar"]==$this->nom_form){
					foreach($_GET as $objeto => $valor){
						//$valor = (!get_magic_quotes_gpc()) ? addslashes($valor) : $valor;
						$objeto = (isset($this->lista_md5[$objeto])) ? $this->lista_md5[$objeto] : $objeto; 
						$this->objetos[$objeto]["valor"] = trim($valor);
						$this->validacion_paso = 2;
					}
				}
				break;
		}
		if (isset($_POST["MCI_validar"]) && $_POST["MCI_validar"] == $this->nom_form){
					foreach($_FILES as $objeto => $objeto_datos_archivo){
						$objeto = (isset($this->lista_md5[$objeto])) ? $this->lista_md5[$objeto] : $objeto; 
						$this->objetos[$objeto]["valor"] = trim($objeto_datos_archivo['name']);
						$this->objetos[$objeto]["archivo"] = $objeto_datos_archivo;
						$this->validacion_paso = 2;
						if(class_exists('fileHand')){$this->archi = new fileHand();}
					}
		}
		if($this->validacion_paso == 2){return $this->_validacion_php();}
		if($this->validacion_paso != 2){return NULL;}
	}	
	/**
	* Agregar archivo js
	* 
	* Agregar un archivo js a la lista para luego incluír
	* @Autor Thomas Woodard
	*/
	function agregar_archivo_js($nom_archivo,$ruta = NULL){
		$this->archivos_js[$nom_archivo] = $ruta;
	}
	/**
	* Incluir Archivo JS
	* 
	* Obtener el Javascript necesario para la validación.  En el caso de no encontrarse en la ubicación 
	* predeterminada, se le puede pasar la nueva ubicación como parámetro. Estos archivos se deben incluír antes del 
	* formulario, preferiblemente en la sección HEAD del html.
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
	* Obtener el Javascript necesario para la validación. Este texto cambiará dinámicamente de acuerdo al error 
	* en la validación que se presente.
	* En el caso de haber varios formularios y que se quiera tener igual número de mensajes de error, se puede pasar
	* el nombre del formulario al cual estará asociado como parámetro.
	* @Autor Thomas Woodard
	*/
	function obtener_js(){
		if(count($this->lista_md5) < 1){
			if($this->usar_campos_md5){
				foreach($this->objetos as $objeto => $valor){$this->lista_md5["c_".md5($objeto)]=$objeto;}
			} else {
				foreach($this->objetos as $objeto => $valor){$this->lista_md5[$objeto]=$objeto;}
			}
		}
		$lista_md5_inv = array_flip($this->lista_md5);
		foreach ($this->objetos as $clave_campo => $objeto)
		{
			 
			
			if (isset($objeto["val"]))
			{
				$nom_campo = $lista_md5_inv[$clave_campo];
				foreach($objeto["val"] as $clave => $val)
				{    
					
					$this->codigo_js .= "frmvalidator.addValidation('$nom_campo','$val";
					if ($objeto["val_args"][$clave]||$objeto["val_args"][$clave]==='0'){
						$this->codigo_js .="=".$objeto["val_args"][$clave];				
					}
					$this->codigo_js .= "'"; 
					if ($objeto["error"][$clave]){
						$this->codigo_js .=" ,'".$objeto["error"][$clave]."'";
					}
					$this->codigo_js .= ");\n";				
				}
			}
			if (isset($objeto["cond"]))
			{
				$nom_campo = $lista_md5_inv[$clave_campo];
				foreach($objeto["cond"] as $campo => $condicion)
				{
					$this->codigo_js 	.= 	"frmvalidator.addValCondition('$nom_campo',";
					$this->codigo_js 	.= 	"'$campo',";
					$this->codigo_js	.=	"'".$condicion["operador"]."',";
					$this->codigo_js	.=	"'".$condicion["condicion"]."');\n";
				}
			}	
		}
		$retornar = chr(13)."<script language='JavaScript' type='text/javascript'>".chr(13);
		$retornar .= "var frmvalidator  = new Validator('".$this->nom_form."');".chr(13);
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
		if (isset($this->tabs))
			$retornar .= $this->tabs->script;
		return $retornar;
	}
	/**
	* Construir HTML
	* 
	* Construir el formulario dinámicamente utilizando un objeto de creación de html el cual se le pasa como parámetro.
	* Este objeto se crea a partir de la clase MCI_html
	* @Autor Thomas Woodard
	*/
	function obtener_html(&$obj_html)
	{
		if (!isset($this->archivos_js["mci_validacion.js"]))
			$this->archivos_js["mci_validacion.js"] = NULL;
		
		$this->lista_md5_inv = array_flip($this->lista_md5);
		$retornar = "";
		$pre_retorno= "";
		if($this->js_incluido == false){$pre_retorno = $this->obtener_archivos_js();}
		$args_form["name"] 		= $this->nom_form;
		$args_form["action"] 	= $this->accion_form;
		$args_form["enctype"] 	= $this->enctype_form;
		$args_form["method"] 	= $this->metodo_form;
		$retornar .= $obj_html->comenzar_formulario($args_form);
		
		$i=1;
		$retornar .= $this->html_error($this->nom_form);
		if (isset($this->tabs))
		{	
			$this->tabs->generate_code();
			$retornar .= $this->tabs->html;  
		}
		
		foreach ($this->objetos as $id_objeto => $objeto)
		{
			$objeto_args = (isset($this->objetos[$id_objeto]["args"]))?$this->objetos[$id_objeto]["args"]:NULL;
			if($objeto = $this->obtener_objeto($obj_html, $id_objeto, $objeto, $objeto_args))
			{
				$retornar .= $objeto.chr(13); 
				$i++;
			}
		}
		if ($this->tab_abierto)
			$retornar .= "</div>";
		foreach($this->objetos_ocultos as $objeto)
			$retornar .= $objeto;
		$retornar .= $this->campo_oculto(); 
		$retornar .= $obj_html->terminar_formulario();
		$retornar .= $this->obtener_js();
		$pre_retorno .= $obj_html->obtener_archivos_js();
		return $pre_retorno.$retornar;
	}
	
	
	/**
	* Obtener Campo
	* 
	* Retorna un campo a la vez. Sirve también para crear formularios costumizados.
	*/
	function obtener_objeto(&$obj_html, $id_objeto, $objeto, $objeto_args=NULL)
	{
		if(!isset($this->lista_md5_inv)){$this->lista_md5_inv = array_flip($this->lista_md5);}
		if(!isset($objeto["tipo"])) return NULL;
		if ((!isset($objeto_args["class"]))&&(isset($this->estilos[$objeto["tipo"]])))
			$objeto_args["class"] = $this->estilos[$objeto["tipo"]];
		$objeto["valor"] = (isset($objeto["valor"]))?$objeto["valor"]:NULL;
		switch ($objeto["tipo"])
		{
			case "text":
				$objeto_args["title"] = (isset($objeto["titulo"]))?$objeto["titulo"]:NULL;
				if($objeto["valor"] != NULL){$objeto_args["value"] = $objeto["valor"];} 
				@$htmlcampo = $obj_html->textfield($this->lista_md5_inv[$id_objeto], $objeto_args);
			break;
			case "hidden":
				if($objeto["valor"] != NULL){$objeto_args["value"] = $objeto["valor"];} 
				@$htmlcampo = $obj_html->hidden($this->lista_md5_inv[$id_objeto], $objeto_args);
				$this->objetos_ocultos[] = $htmlcampo;
			break;
			case "password":
				$objeto_args["value"] = "";
				@$htmlcampo = $obj_html->password_field($this->lista_md5_inv[$id_objeto], $objeto_args);
			break;
			case "file":
				$htmlcampo = "";
				if($objeto["valor"] != NULL){$objeto_args["value"] = $objeto["valor"];} 
				$htmlcampo .= $obj_html->filefield($this->lista_md5_inv[$id_objeto], $objeto_args, $this->directorio_upload);
			break;
			case "textarea":
				$objeto_args["title"] = (isset($objeto["titulo"]))?$objeto["titulo"]:NULL;
				if($objeto["valor"] != NULL){$objeto_args["value"] = $objeto["valor"];} 
				@$htmlcampo = $obj_html->textarea($this->lista_md5_inv[$id_objeto], $objeto_args);
			break;
			case "wysiwyg":
				if($objeto["valor"] != NULL){$objeto_args["value"] = $objeto["valor"];} 
				@$htmlcampo = $obj_html->wysiwyg($this->lista_md5_inv[$id_objeto], $objeto_args);//pasar $name y args: value, css, xml, width, height, barra 
			break;
			case "list":
			case "select":		
				$objeto["valor"] = trim($objeto["valor"]);
				@$htmlcampo = $obj_html->popup_menu($this->lista_md5_inv[$id_objeto], $objeto["valores"], $objeto["valor"], $objeto_args);
			break;
			case "checkbox":
				@$htmlcampo = $obj_html->checkbox($this->lista_md5_inv[$id_objeto], $objeto_args);
			break;
			case "radio":
				$objeto_args["title"] = (isset($objeto["titulo"]))?$objeto["titulo"]:NULL;
				if($objeto["valor"] != NULL){$objeto_args["value"] = $objeto["valor"];} 
				@$htmlcampo = $obj_html->radiobutton_set($this->lista_md5_inv[$id_objeto], $objeto["valores"], $objeto["valor"], $objeto_args);
			break;
			case "submit":
				@$htmlcampo = $obj_html->submit($this->lista_md5_inv[$id_objeto], $objeto["titulo"], $objeto_args);
			break;
			case "reset":
				@$htmlcampo = $obj_html->reset($objeto["titulo"], $objeto_args);
			break;
			case "button":
				@$htmlcampo = $obj_html->button($this->lista_md5_inv[$id_objeto], $objeto["titulo"], $objeto_args);
			break;
			case "fecha":
			case "date":
				$objeto_args["title"] = (isset($objeto["titulo"]))?$objeto["titulo"]:NULL;
				if(isset($objeto["valor"]) && $objeto["valor"] != NULL){$objeto_args["value"] = $objeto["valor"];} 
				@$htmlcampo = $obj_html->datefield($this->lista_md5_inv[$id_objeto], $objeto_args);
			break;
			case "label":
				@$htmlcampo = $obj_html->label($this->lista_md5_inv[$id_objeto],'',$objeto["valor"], $objeto_args);
				$fila	=	$htmlcampo;
			break;
			case "opendiv":
				@$htmlcampo = $obj_html->open_div($this->lista_md5_inv[$id_objeto], $objeto_args);
			break;
			case "closediv":
				@$htmlcampo = "</div>";
			break;
			case "openspan":
				@$htmlcampo = $obj_html->open_span($objeto_args);
			break;
			case "closespan":
				@$htmlcampo = "</span>";
			break;
			case "span":
				@$htmlcampo = $obj_html->span($objeto["titulo"],$objeto_args);
			break;
			case "div":
				@$htmlcampo = $obj_html->div($this->lista_md5_inv[$id_objeto],$objeto["titulo"],$objeto_args);
			break;
			case "html":
				@$htmlcampo = $objeto["titulo"];
			break;
			default:
				if($objeto["tipo"] != NULL || $objeto["tipo"] != "")
				{
					$this->validacion_error = "tipo de objeto ".$objeto["tipo"]." no definido";
				}
			break;
		}// switch
		$htmlcampo = (isset($htmlcampo))?$htmlcampo:NULL;
		return $htmlcampo;
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
	* mostrar el error en este formato.  EL texto cambiará dinámicamente de acuerdo al error en la validación que se presente.
	* En el caso de haber varios formularios y que se quiera tener igual número de mensajes de error, se puede pasar
	* el nombre del formulario al cual estará asociado como parámetro.
	* @Autor Thomas Woodard
	*/
	function html_error($nom_form = NULL){
		$display = ($this->espacio_error)?"block":"none";
		if($nom_form){
			$retorno = '<div id="dcontent_'.$nom_form.'" class="'.$this->estilos["form_error"].'" style=display:'.$display.'"></div>';
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
	* Se utiliza este método para crear un campo oculto que le indica al método procesar si el 
	* formulario ha sido enviado por el usuario o no, para así determinar si debe realizar la 
	* validación por PHP.
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
	function _validar_campo($id_objeto, $objeto)
	{
		
		if (isset($objeto["val"]))
		{
			foreach($objeto["val"] as $clave => $val){ // cada validación del campo
				
				if($objeto["titulo"]!=NULL){$nombre = $objeto["titulo"];}else{$nombre = $id_objeto;}
				switch ($val){
					case "r":
					case "req":
						if(!isset($objeto["valor"]) || trim($objeto["valor"]) == ""){
							
							if($objeto["tipo"]=="file" && isset($this->objetos["hc_".md5($id_objeto)]) && trim($this->objetos["hc_".md5($id_objeto)]["valor"] != "")){ 
								break;
							}
							
							if($objeto["error"][$clave]){
								$this->validacion_error = $objeto["error"][$clave];
							} else $this->validacion_error = $nombre. " es un campo requerido"; 
							$this->validacion_campo_error = $id_objeto;
							return false;
						}
						break;
					case "maxl": 
					case "maxlon": 
						if(isset($objeto["valor"]) && $objeto["valor"] != ""){ // se verifica que se haya ingresado un valor para evitar errores
							if(strlen($objeto["valor"]) > $objeto["val_args"][$clave]){ 
								if($objeto["error"][$clave]){
									$this->validacion_error = $objeto["error"][$clave];
								} else $this->validacion_error = $nombre. " debe tener no más de ".$objeto["val_args"][$clave]." caracteres "; 
								$this->validacion_campo_error = $id_objeto;
								return false;
							}
						}						
						break;
					case "minl":
					case "minlon":
						if(isset($objeto["valor"]) && $objeto["valor"] != ""){
							if(strlen($objeto["valor"]) < $objeto["val_args"][$clave]){ 
								if($objeto["error"][$clave]){
									$this->validacion_error = $objeto["error"][$clave];
								} else $this->validacion_error = $nombre. " debe tener almenos ".$objeto["val_args"][$clave]." caracteres "; 
								$this->validacion_campo_error = $id_objeto;
								$this->validacion_campo_error = $id_objeto;
								return false;
							}
						}
						break;
					case "noespacio": 
					case "! ":
						if(isset($objeto["valor"]) && $objeto["valor"] != ""){
							if(ereg_replace(" ", "", $objeto["valor"]) != $objeto["valor"]){//[^ \f\n\r\t\v]
								if($objeto["error"][$clave]){
									$this->validacion_error = $objeto["error"][$clave];
								} else $this->validacion_error = $nombre. " no debe poseer espacios en blanco "; 
								$this->validacion_campo_error = $id_objeto;
								return false;
							}
						}
						break;
					case "a1":
					case "alfanumerico":
						if(isset($objeto["valor"]) && $objeto["valor"] != ""){
							if(ereg_replace("[^a-zA-z0-9ÁÉÍÓÚáéíóúñÑ][ \f\n\r\t\v]", "", $objeto["valor"]) != $objeto["valor"]){
								if($objeto["error"][$clave]){
									$this->validacion_error = $objeto["error"][$clave];
								} else $this->validacion_error = $nombre. " solamente debe tener caracteres alfa-numéricos "; 
								$this->validacion_campo_error = $id_objeto;
								return false;
							}
						}
						break;
					case "1":
					case "num":
					case "numerico": 
						if(isset($objeto["valor"]) && $objeto["valor"] != ""){
							if(ereg_replace("[^0-9][ \f\n\r\t\v]", "", $objeto["valor"]) != $objeto["valor"]){
								if($objeto["error"][$clave]){
									$this->validacion_error = $objeto["error"][$clave];
								} else $this->validacion_error = $nombre. " solamente debe tener caracteres numéricos "; 
								$this->validacion_campo_error = $id_objeto;
								return false;
							}
						}
						break;
					case "a":
					case "alfa":
					case "alfabetico":
						if(isset($objeto["valor"]) && $objeto["valor"] != ""){
							if(ereg_replace("[^a-zA-zÁÉÍÓÚáéíóúñÑ][ \f\n\r\t\v]", "", $objeto["valor"]) != $objeto["valor"]){
								if($objeto["error"][$clave]){
									$this->validacion_error = $objeto["error"][$clave];
								} else $this->validacion_error = $nombre. " solamente debe tener caracteres alfabéticos "; 
								$this->validacion_campo_error = $id_objeto;
								return false;
							}
						}
						break;
					case "a1-":
					case "a1-_":
					case "alnumguion":
						if(isset($objeto["valor"]) && $objeto["valor"] != ""){//die($objeto["valor"]);
							if(ereg_replace("[^a-zA-z0-9._-][ \f\n\r\t\v]", "", $objeto["valor"]) != $objeto["valor"]){
								if($objeto["error"][$clave]){
									$this->validacion_error = $objeto["error"][$clave];
								} else $this->validacion_error = $nombre. " debe incluir solamente los caracteres A-Z,a-z,0-9,- y _"; 
								$this->validacion_campo_error = $id_objeto;
								return false;
							}
						}
						break;
					case "email": 
						if(isset($objeto["valor"]) && $objeto["valor"] != ""){
							$pattern = "/^[A-z0-9_\-]+\@(A-z0-9_-]+\.)+[A-z]{2,4}$/";
							if(!preg_match($pattern,$objeto["valor"])){
								if($objeto["error"][$clave]){
									$this->validacion_error = $objeto["error"][$clave];
								} else $this->validacion_error = "Debe ingresar un email válido ";
							}
							if (strlen($this->email)>100){
								if($objeto["error"][$clave]){
									$this->validacion_error = $objeto["error"][$clave];
								} else $this->validacion_error = "El correo electrónico es demasiado largo";
							}
							
						}
						break;
					case "<":
					case "menorque":
						if(isset($objeto["valor"]) && $objeto["valor"] != ""){
							if(ereg_replace("[^0-9]", "", $objeto["valor"]) != $objeto["valor"]){
								if($objeto["error"][$clave]){
									$this->validacion_error = $objeto["error"][$clave];
								} else $this->validacion_error = $nombre. " solamente debe tener caracteres numéricos "; 
								$this->validacion_campo_error = $id_objeto;
								return false;
							}
							if($objeto["valor"] > $objeto["val_args"][$clave]){
								if($objeto["error"][$clave]){
									$this->validacion_error = $objeto["error"][$clave];
								} else $this->validacion_error = "El valor de ". $nombre ." debe ser menor que ". $objeto["val_args"][$clave];
								$this->validacion_campo_error = $id_objeto;
								return false;
							}
						}
						break;
					case ">":
					case "mayorque":
						if(isset($objeto["valor"]) && $objeto["valor"] != ""){
							if(ereg_replace("[^0-9]", "", $objeto["valor"]) != $objeto["valor"]){
								if($objeto["error"][$clave]){
									$this->validacion_error = $objeto["error"][$clave];
								} else $this->validacion_error = $nombre. " solamente debe tener caracteres numéricos "; 
								$this->validacion_campo_error = $id_objeto;
								return false;
							}
							if($objeto["valor"] < $objeto["val_args"][$clave]){
								if($objeto["error"][$clave]){
									$this->validacion_error = $objeto["error"][$clave];
								} else $this->validacion_error = "El valor de ". $nombre ." debe ser mayor que ". $objeto["val_args"][$clave];
								$this->validacion_campo_error = $id_objeto;
								return false;
							}
						}
						break;
					case "regexp":
						if(isset($objeto["valor"]) && $objeto["valor"] != ""){
							if(!preg_match("/".$campo["val_args"][$clave]."/",$campo["valor"])){
								if($objeto["error"][$clave]){
									$this->validacion_error = $objeto["error"][$clave];
								} else $this->validacion_error = "El formato de ". $nombre ." no es el correcto ";
								$this->validacion_campo_error = $id_objeto;
								return false;
							}
						}
						break;
					case "lista":
					case "!=":
					case "noseleccionar":
						if(isset($objeto["valor"]) && $objeto["valor"] != ""){
							if($objeto["val_args"][$clave]){$noseleccion = $objeto["val_args"][$clave];}else{$noseleccion = '0';}
							if($objeto["valor"]==$noseleccion){
								if($objeto["error"][$clave]){
									$this->validacion_error = $objeto["error"][$clave];
								} else $this->validacion_error = "Debe seleccionar una opción de ". $nombre ;
								$this->validacion_campo_error = $id_objeto;
								return false;
							}
						}
						break;
					case "=":
					case "camposiguales":
						if(isset($objeto["valor"]) && $objeto["valor"] != ""){
							$objeto_comp_temp = $objeto["val_args"][$clave];
							$objeto_comparacion = (isset($this->lista_md5[$objeto_comp_temp])) ? $this->lista_md5[$objeto_comp_temp] : $objeto_comp_temp; //$objeto["val_args"][$clave];
							//if ($this->usar_campos_md5 == true){$objeto = "c_".md5($objeto);}else{$objeto_comparacion = $objeto["val_args"][$clave];}
							if(!$this->objetos[$objeto_comparacion]["valor"]){
								if($objeto["error"][$clave]){
									$this->validacion_error = $objeto["error"][$clave];
								} else $this->validacion_error = "Depurar: el campo $objeto_comparacion no existe ";
								$this->validacion_campo_error = $id_objeto;
								return false;
							}
							if($this->objetos[$objeto_comparacion]["titulo"]!=NULL){
								$nombre_comparacion = $this->objetos[$objeto_comparacion]["titulo"];
							}else{
								$nombre_comparacion = $objeto_comparacion;
							}
							if($objeto["valor"] != $this->objetos[$objeto_comparacion]["valor"]){
								if($objeto["error"][$clave]){
									$this->validacion_error = $objeto["error"][$clave];
								} else $this->validacion_error = "El campo ". $nombre. " debe ser igual al campo ".$objeto_comparacion ;
								$this->validacion_campo_error = $id_objeto;
								return false;
							}
						}
						break;
					case "forzar":
						if($objeto["error"][$clave]){
							$this->validacion_error = $objeto["error"][$clave];
						} else $this->validacion_error = "DEPURAR: debe especificar un mensaje de error para ".$nombre;
							$this->validacion_campo_error = $id_objeto;
								return false;
						break;
					case "fechaformato":
					case "ff":
						if(isset($objeto["valor"]) && $objeto["valor"] != ""){
							$tipoDelimitador = false;
							if(strstr($objeto["valor"],"/")) $tipoDelimitador="/";
							if(strstr($objeto["valor"],"-")) $tipoDelimitador="-";
							if($tipoDelimitador){
								$fecha_array = explode($tipoDelimitador,$objeto["valor"]);
								$dteDate = strtotime($fecha_array[2]."-".$fecha_array[1]."-".$fecha_array[0]);
								if(
									(date("d", $dteDate) == $fecha_array[0] || date("j", $dteDate) == $fecha_array[0]) &&
									(date("m", $dteDate) == $fecha_array[1] || date("n", $dteDate) == $fecha_array[1]) &&
									 date("Y", $dteDate) == $fecha_array[2]
								   )
								{
									$this->objetos[$id_objeto]["valor"] = date("d", $dteDate)."/".date("m", $dteDate)."/".date("Y", $dteDate);
								} else {
									if($objeto["error"][$clave]){
										$this->validacion_error = $objeto["error"][$clave];
									} else $this->validacion_error = "El campo ".$nombre." debe estar en el formato dd/mm/aaaa (día/mes/año) ";
									$this->validacion_campo_error = $id_objeto;
									return false;
								}
							} else {
								if($objeto["error"][$clave]){
									$this->validacion_error = $objeto["error"][$clave];
								} else $this->validacion_error = "El campo ".$nombre." debe estar en el formato dd/mm/aaaa (día/mes/año) ";
								$this->validacion_campo_error = $id_objeto;
								return false;
							}
						}
						break;
					case "f>":
					case "fecha >":
						if(isset($objeto["valor"]) && $objeto["valor"] != ""){
							$tipoDelimitador = false;
							if(strstr($objeto["valor"],"/")) $tipoDelimitador="/";
							if(strstr($objeto["valor"],"-")) $tipoDelimitador="-";
							$fecha_array = explode($tipoDelimitador,$objeto["valor"]);
							$faValidar = strtotime($fecha_array[2]."-".$fecha_array[1]."-".$fecha_array[0]);
							// parsear el parámetro pasado a la función
							$tipoDelimitador = false;
							if(strstr($objeto["val_args"][$clave],"/")) $tipoDelimitador="/";
							if(strstr($objeto["val_args"][$clave],"-")) $tipoDelimitador="-";
							
							if($tipoDelimitador){// Si el parámetro es una fecha
								$fecha_array = explode($tipoDelimitador,$objeto["val_args"][$clave]);
								$faComparar = strtotime($fecha_array[2]."-".$fecha_array[1]."-".$fecha_array[0]);
								if($faValidar < $faComparar){
									if($objeto["error"][$clave]){
										$this->validacion_error = $objeto["error"][$clave];
									} else $this->validacion_error = "El campo ".$nombre." debe ser una fecha posterior a ".$objeto["val_args"][$clave];
									$this->validacion_campo_error = $id_objeto;
									return false;
								}
								
							} else {// ** Si el parámetro es un campo al que se le comparará
							
								$objeto_comp_temp = $objeto["val_args"][$clave];
								$objeto_comparacion = (isset($this->lista_md5[$objeto_comp_temp])) ? $this->lista_md5[$objeto_comp_temp] : $objeto_comp_temp; //$objeto["val_args"][$clave];
	
								if(!$this->objetos[$objeto_comparacion]["valor"]){ // verificar que sea un campo que exista
									if($objeto["error"][$clave]){
										$this->validacion_error = $objeto["error"][$clave];
									} else $this->validacion_error = "Depurar: el campo $objeto_comparacion no existe ";
									$this->validacion_campo_error = $id_objeto;
									return false;
								}
								// Preparar para el error
								if($this->objetos[$objeto_comparacion]["titulo"]!=NULL){
									$nombre_comparacion = $this->objetos[$objeto_comparacion]["titulo"];
								}else{
									$nombre_comparacion = $objeto_comparacion;
								}
								// parsear el campo de formulario al que se comparará
								$valorComparar = $this->objetos[$objeto_comparacion]["valor"];
								$tipoDelimitador = false;
								if(strstr($valorComparar,"/")) $tipoDelimitador="/";
								if(strstr($valorComparar,"-")) $tipoDelimitador="-";
								
								if($tipoDelimitador){// Si el campo es una fecha
									$fecha_array = explode($tipoDelimitador, $valorComparar);
									$faComparar = strtotime($fecha_array[2]."-".$fecha_array[1]."-".$fecha_array[0]);
									if($faValidar < $faComparar){
										if($objeto["error"][$clave]){
											$this->validacion_error = $objeto["error"][$clave];
										} else $this->validacion_error = "El campo ".$nombre." debe ser una fecha posterior a la del campo ".$nombre_comparacion;
										$this->validacion_campo_error = $id_objeto;
										return false;
									}
								} 
							}
						}
						break;
					case "f<":
					case "fecha <":
						if(isset($objeto["valor"]) && $objeto["valor"] != ""){
							$tipoDelimitador = false;
							if(strstr($objeto["valor"],"/")) $tipoDelimitador="/";
							if(strstr($objeto["valor"],"-")) $tipoDelimitador="-";
							$fecha_array = explode($tipoDelimitador,$objeto["valor"]);
							$faValidar = strtotime($fecha_array[2]."-".$fecha_array[1]."-".$fecha_array[0]);
							// parsear el parámetro pasado a la función
							$tipoDelimitador = false;
							if(strstr($objeto["val_args"][$clave],"/")) $tipoDelimitador="/";
							if(strstr($objeto["val_args"][$clave],"-")) $tipoDelimitador="-";
							
							if($tipoDelimitador){// Si el parámetro es una fecha
								$fecha_array = explode($tipoDelimitador,$objeto["val_args"][$clave]);
								$faComparar = strtotime($fecha_array[2]."-".$fecha_array[1]."-".$fecha_array[0]);
								if($faValidar > $faComparar){
									if($objeto["error"][$clave]){
										$this->validacion_error = $objeto["error"][$clave];
									} else $this->validacion_error = "El campo ".$nombre." debe ser una fecha anterior a ".$objeto["val_args"][$clave];
									$this->validacion_campo_error = $id_objeto;
									return false;
								}
								
							} else {// ** Si el parámetro es un campo al que se le comparará
							
								$objeto_comp_temp = $objeto["val_args"][$clave];
								$objeto_comparacion = (isset($this->lista_md5[$objeto_comp_temp])) ? $this->lista_md5[$objeto_comp_temp] : $objeto_comp_temp; //$objeto["val_args"][$clave];
	
								if(!$this->objetos[$objeto_comparacion]["valor"]){ // verificar que sea un campo que exista
									if($objeto["error"][$clave]){
										$this->validacion_error = $objeto["error"][$clave];
									} else $this->validacion_error = "Depurar: el campo $objeto_comparacion no existe ";
									$this->validacion_campo_error = $id_objeto;
									return false;
								}
								// Preparar para el error
								if($this->objetos[$objeto_comparacion]["titulo"]!=NULL){
									$nombre_comparacion = $this->objetos[$objeto_comparacion]["titulo"];
								}else{
									$nombre_comparacion = $objeto_comparacion;
								}
								// parsear el campo de formulario al que se comparará
								$valorComparar = $this->objetos[$objeto_comparacion]["valor"];
								$tipoDelimitador = false;
								if(strstr($valorComparar,"/")) $tipoDelimitador="/";
								if(strstr($valorComparar,"-")) $tipoDelimitador="-";
	
								if($tipoDelimitador){// Si el campo es una fecha
									$fecha_array = explode($tipoDelimitador, $valorComparar);
									$faComparar = strtotime($fecha_array[2]."-".$fecha_array[1]."-".$fecha_array[0]);
									if($faValidar > $faComparar){
										if($objeto["error"][$clave]){
											$this->validacion_error = $objeto["error"][$clave];
										} else $this->validacion_error = "El campo ".$nombre." debe ser una fecha anterior a la del campo ".$nombre_comparacion;
										$this->validacion_campo_error = $id_objeto;
										return false;
									}
								} 
							}
						}
						break;
					case ".?":
					case "extensionarchivo":
						if(isset($objeto["valor"]) && $objeto["valor"] != ""){
							if(!$objeto["val_args"][$clave]) {
								$objeto["val_args"][$clave] = "gif|jpg|jpeg|bmp|png";
							} else {
									$objeto["val_args"][$clave] = str_replace(",","|",$objeto["val_args"][$clave]);
							}
							if(!eregi("(\.(".$objeto["val_args"][$clave]."))$",$objeto["valor"])){
								if($objeto["error"][$clave]){
									$this->validacion_error = $objeto["error"][$clave];
								} else{ 
									$ext_val = str_replace("|",", ",$objeto["val_args"][$clave]);
									$this->validacion_error = "En el campo ". $nombre .", solamente se permiten archivos cuya extensión sea ".$ext_val;
								}
								$this->validacion_campo_error = $id_objeto;
								return false;
							}
						} else if (isset($objetos["h".$id_objeto]["valor"]) && $objetos["h".$id_objeto]["valor"] != ""){ // si hay un campo para update de archivos
							if(!$objeto["val_args"][$clave]) {
								$objeto["val_args"][$clave] = "gif|jpg|jpeg|bmp|png";
							} else {
									$objeto["val_args"][$clave] = str_replace(",","|",$objeto["val_args"][$clave]);
							}
							if(!eregi("(\.(".$objeto["val_args"][$clave]."))$",$objetos["f".$id_objeto]["valor"])){
								if($objeto["error"][$clave]){
									$this->validacion_error = $objeto["error"][$clave];
								} else{ 
									$ext_val = str_replace("|",", ",$objeto["val_args"][$clave]);
									$this->validacion_error = "En el campo ". $nombre .", solamente se permiten archivos cuya extensión sea ".$ext_val;
								}
								$this->validacion_campo_error = $id_objeto;
								return false;
							}
						}
						break;
					case "KB"://["archivo"]['size']
					case "tamañoarchivo":
						if(isset($objeto["valor"]) && $objeto["valor"] != ""){
							if(!$objeto["val_args"][$clave]){$objeto["val_args"][$clave] = 1000;}
							if($objeto["archivo"]['size'] > ($objeto["val_args"][$clave]*1024)){
								if($objeto["error"][$clave]){
									$this->validacion_error = $objeto["error"][$clave];
								} else $this->validacion_error = "El archivo en el campo ".$nombre." debe ser de máximo ".$objeto["val_args"][$clave]." KB (".round($objeto["val_args"][$clave]/1024, 2)." MB)";
								$this->validacion_campo_error = $id_objeto;
								return false;
							}
						}
						break;
					case "xxx":
						if(isset($objeto["valor"]) && $objeto["valor"] != ""){
							if(!preg_match($objeto["val_args"][$clave],$objeto["valor"])){
								if($objeto["error"][$clave]){
									$this->validacion_error = $objeto["error"][$clave];
								} else $this->validacion_error = "El formato de ". $nombre ." no es el correcto ";
								$this->validacion_campo_error = $id_objeto;
								return false;
							}
						}
						break;
					default:
						$this->validacion_error = "Depurar: El tipo de validación ".$val." no existe";
						return false;
						break;
					
				}//case
			}
		}
		else return true;
	}
	
	function _tiene_condiciones_validacion($id_objeto,$objeto)
	{
		if (isset($objeto["cond"]))
		{	
			foreach($objeto["cond"] as $obj_condicion=> $condicion)
			{
				if (isset($this->objetos[$obj_condicion]["valor"]))
				{	
					
					if (($this->objetos[$obj_condicion]["tipo"]=='checkbox') && ($condicion["condicion"]=="true"))
						 $condicion["condicion"]= 'on';
					$cond= $condicion["condicion"];		 
					$valor = $this->objetos[$obj_condicion]["valor"];
					$result = false;
					$operator = $condicion["operador"];
					$expresion  = "if(\$valor".$operator."\$cond) \$result=true;";
					eval($expresion);
					if (!$result)
						return false;
				}
				else
					return false;
			}
			return true;
		}	
	}
	
	/**
	* Validar formulario mediante PHP
	* 
	* Devuelve verdadero si se valida correctamente los datos enviados por el formulario
	* @Autor Thomas Woodard
	*/	
	function _validacion_php(){
		foreach ($this->objetos as $id_objeto => $objeto)
		{ // cada campo 
			if ($this->_tiene_condiciones_validacion($id_objeto,$objeto))
				if(!$this->_validar_campo($id_objeto, $objeto)){return false;}
		}
	return true;
	}
	/**
	* Encriptar objetos
	* 
	* Activa la opción mediante la cual el id de los campos que se crean en obtener_HTML 
	* se encripta mediante un Hash MD5. Esto es útil si se está usando como referencia
	* el nombre de las columnas de la base de datos y no se desea que el usuario final
	* descifre los nombres de los mismos.
	* @Autor Thomas Woodard
	*/	
	function encriptar_objetos(){
		return $this->usar_campos_md5 = true;
	}
	/**
	* Referenciar objeto
	* 
	* Ya que existe la posibilidad de que un campo esté o no encriptado, cuando se agrega una
	* validación que haga referencia a otro campo, a veces no se sabe si este está encriptado o no
	* y, por ende, no se sabe que valor pasarle al método. Este método asegura que el campo 
	* retorne el id real del campo en el formulario, ya sea que estén encriptados o no los ids de
	* los mismos.
	* @Autor Thomas Woodard
	*/	
	function referenciar_objeto($objeto){
		if ($this->usar_campos_md5 == true){$objeto = "c_".md5($objeto);}
		return $objeto;
	}
	
	/** 
	* Obtener dirección absoluta del archivo incluido 
	*/
	function _obtener_reldir(){
		global $_SERVER; $reldir = "";
		$thisdir_a = (strstr(dirname(__FILE__), "\\")) ? explode("\\", dirname(__FILE__)) : explode("/", dirname(__FILE__));
		$thisurl_a = explode("/", dirname($_SERVER["PHP_SELF"])); 
		$rel_indx = array_search($thisurl_a[1], $thisdir_a);
		for ($i=$rel_indx; $i <= count($thisdir_a); $i++){$reldir .= (isset($thisdir_a[$i]))?"/".$thisdir_a[$i]:"/";}// Pura magia <-
		return $reldir;
	}
	function unset_values()
	{
		foreach ($this->objetos as $id_objeto=>$objeto)
		{
			$this->objetos[$id_objeto]["valor"] = NULL;
		}
	//var_dump($this->objetos);
	}
	
}
?>