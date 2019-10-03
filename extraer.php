 <?php //Ejemplo aprenderaprogramar.com

// $texto = file_get_contents("http://sistemas.caracas.gob.ve/sis/modProyecto/reporte.php");

// echo $texto;


// $url = fopen("http://sistemas.caracas.gob.ve/sis/mod_usuario/consultar_usuario.php", "r");
// if ($url) {
// 	# code...
// 	$texto = "";
// 	while (!feof($url)) {
// 		# code...
// 		$texto .= fgets($url,512);
// 	}
// echo $texto;
// }

    // Definimos la función cURL
    // function curl($url) {
    //     $ch = curl_init($url); // Inicia sesión cURL
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // Configura cURL para devolver el resultado como cadena
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Configura cURL para que no verifique el peer del certificado dado que nuestra URL utiliza el protocolo HTTPS
    //     $info = curl_exec($ch); // Establece una sesión cURL y asigna la información a la variable $info
    //     curl_close($ch); // Cierra sesión cURL
    //     return $info; // Devuelve la información de la función
    // }

    // $sitioweb = curl("http://sistemas.caracas.gob.ve/sis/mod_usuario/consultar_usuario.php");  // Ejecuta la función curl escrapeando el sitio web https://devcode.la and regresa el valor a la variable $sitioweb
    // echo $sitioweb;


function validar_dni($dni){
	$numeros = substr($dni, -8);
	$letra = substr($dni, 0, -8);

	// echo $letra.'<br>';
	// echo $numeros.'<br>';

	// echo ' '.substr("TRWAGMYVPDXBNJZSQFHLCKE", $numeros%23, 1).'<br>';


	if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
		echo $dni.' valido'.'<br>';
	}else{
		echo $dni.' no valido'.'<br>';
	}
}
 
validar_dni('V15238565'); // no válido arreglar funcion


// funcion original
// function validar_dni($dni){
// 	$letra = substr($dni, -1);
// 	$numeros = substr($dni, 0, -1);
// 	if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
// 		echo 'valido';
// 	}else{
// 		echo 'no valido';
// 	}
// }
 
// validar_dni('73547889F'); // válido
// validar_dni('73547889M'); // no válido
// validar_dni('73547889'); // no válido


     

// PHP: primer & último día del mes
// Sebcillo método para obtener el primer o último día de un determinado mes usando DateTime.

// Obtener el primer día del mes actual:
	
$fecha = new DateTime();
$fecha->modify('first day of this month');
echo $fecha->format('d/m/Y'); // imprime por ejemplo: 01/12/2012

// Obtener el último día del mes actual:
	
$fecha = new DateTime();
$fecha->modify('last day of this month');
echo $fecha->format('d/m/Y'); // imprime por ejemplo: 31/12/2012

// Para averiguar el día de otro mes de un determinado año solo tenemos que pasarle la fecha como parámeto a DateTime, por ejemplo:
	
$fecha = new DateTime('2010-01-10');



// PHP: calcular la diferencia entre 2 fechas
// Ejemplo de como calcular la diferencia de años, meses, días, horas, minutos, segundos entre 2 fechas diferentes utilizando la función DateTime::diff() de php5.

// Un ejemplo de uso:
$fecha1 = new DateTime("2010-07-28 01:15:52");
$fecha2 = new DateTime("2012-11-30 02:33:45");
$fecha = $fecha1->diff($fecha2);
printf('%d años, %d meses, %d días, %d horas, %d minutos', $fecha->y, $fecha->m, $fecha->d, $fecha->h, $fecha->i);
// imprime: 2 años, 4 meses, 2 días, 1 horas, 17 minutos


// PHP: Obtener dirección IP

// Esta primera es muy básica, utiliza solo la variable REMOTE_ADDR para obtener la dirección IP desde la cual está viendo la página actual el usuario:
	
function verIP(){
    $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
    return $ip;
}

// Esta segunda función es más completa y nos será de utilidad si el usuario llega desde un servidor con PROXY:
	
function verIP(){   
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}



// PHP: sumar/restar horas minutos segundos a una fecha
// Ejemplo para añadir o sumar un número determinado de hora/s, minuto/s, segundo/s a una fecha en php. Muy fácil haciendo uso de la función strtotime de php.

// En el siguiente ejemplo vamos a sumar 1 hora, 13 minutos y 30 segundos a la fecha actual:
	
$fecha = date('Y-m-j');
$nuevafecha = strtotime ( '+1 hour' , strtotime ( $fecha ) ) ;
$nuevafecha = strtotime ( '+13 minute' , strtotime ( $fecha ) ) ;
$nuevafecha = strtotime ( '+30 second' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
 
echo $nuevafecha;

// * Para restar hora/s, minuto/s, segundo/s a una fecha seguimos el mismo proceso…, solo que cambiando el operador ‘+’ por el ‘-‘.


// PHP: sumar/restar años a una fecha
// Ejemplo para añadir o sumar un número determinado de años a una fecha en php. Muy fácil haciendo uso de la función strtotime de php.
// En el siguiente ejemplo vamos a sumar 1 año a la fecha actual:
	
$fecha = date('Y-m-j');
$nuevafecha = strtotime ( '+1 year' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
 
echo $nuevafecha;

// * Para restar año/s a una fecha seguimos el mismo proceso…, solo que cambiando el operador ‘+’ por el ‘-‘.


// PHP: sumar/restar meses a una fecha
// Ejemplo para añadir o sumar un número determinado de meses a una fecha en php. Muy fácil haciendo uso de la función strtotime de php.

// En el siguiente ejemplo vamos a sumar 3 meses a la fecha actual:
	
$fecha = date('Y-m-j');
$nuevafecha = strtotime ( '+3 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
 
echo $nuevafecha;

// * Para restar meses a una fecha seguimos el mismo proceso…, solo que cambiando el operador ‘+’ por el ‘-‘.



// PHP: sumar/restar días a una fecha
// Ejemplo para añadir o sumar un número determinado de días a una fecha en php. Muy fácil haciendo uso de la función strtotime de php.
// En el siguiente ejemplo vamos a sumar 2 días a la fecha actual:
$fecha = date('Y-m-j');
$nuevafecha = strtotime ( '+2 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
 
echo $nuevafecha;

// * Para restar días a una fecha seguimos el mismo proceso…, solo que cambiando el operador ‘+’ por el ‘-‘.


// PHP: convertir a mayúsculas
// Convertir una cadena de texto a mayúsculas en php es realmente sencillo utilizando la función strtoupper(). A continuación un ejemplo de uso para transformar a MAYÚSCULAS:
$cadena = 'Antes que Castilla leyes, León tuvo 24 reyes';
echo strtoupper($cadena); // Imprime: ANTES QUE CASTILLA LEYES, LEóN TUVO 24 REYES

     

// PHP: convertir a minúsculas
// Convertir una cadena de texto a minúsculas en php es realmente sencillo utilizando la función strtolower(). A continuación un ejemplo de uso para transformar a MINÚSCULAS:	
$cadena = 'Antes que Castilla leyes, León tuvo 24 reyes';
echo strtolower($cadena); // Imprime: antes que castilla leyes, león tuvo 24 reyes



// PHP: calcular edad a partir de fecha de nacimiento
// A continuación una función php para calcular la edad a partir de la fecha de nacimiento.
	
function calcular_edad($fecha){
    $dias = explode("-", $fecha, 3);
    $dias = mktime(0,0,0,$dias[1],$dias[0],$dias[2]);
    $edad = (int)((time()-$dias)/31556926 );
    return $edad;
}
// Formato: dd-mm-yy
echo calcular_edad("01-10-1989"); // Resultado: 21



// PHP: comprobar si existen registros de una consulta MySql
// Condicional muy sencilla en PHP para comprobar si existen registros y capturar el número total de una determinada consulta en la base de datos MySql. Utilizaremos la función mysql_num_rows para contabilizar el número de filas de un query.
// En ese caso vamos a comprobar si existe algún usuario de la ciudad de “León” dentro de la tabla usuarios:
	
$total = mysql_num_rows(mysql_query("SELECT id FROM usuarios WHERE ciudad='León'"));
if($total==0){
    echo 'No hay usuarios';
}else{
    echo 'Hay un total de '.$total.' usuarios';
}


     

// PHP: extraer números de una cadena
// Un simple código php para sacar o extraer solo los números de una determinada cadena. Utilizamos ereg_replace y una simple expresión regular [^0-9] para extraer solo los números enteros de la cadena:
	
$cadena = "El 10 y el número 20 con menores que el 30"; 
 
$resultado = intval(preg_replace('/[^0-9]+/', '', $cadena), 10); 
 
echo $resultado; // resultado: 102030


// PHP: Redondear decimales
// 2 métodos en php para redondear los decimales un determinado número.
// Utilizando la función round():
	
function redondear_decimales($valor) { 
   $resultado=round($valor * 100) / 100; 
   return $resultado; 
}
// Modo de uso
echo redondear_decimales('53.1236432345'); // 53.12

// Utilizando la función number_format():
// Modos de uso
echo number_format('53.1236432345', 2, '.', ''); // 53.12
echo number_format('22.5', 2, '.', ''); // 22.50




// PHP: Calcular edad a partir de la fecha nacimiento
// A continuación una función en php que nos servirá para calcular cuantos años tiene una determinada persona (por ejemplo) pasándole como parámetro la fecha de nacimiento en formato DATE (aaaa-mm-dd) de mysql.
	
function calculaedad($fechanacimiento){
	list($ano,$mes,$dia) = explode("-",$fechanacimiento);
	$ano_diferencia  = date("Y") - $ano;
	$mes_diferencia = date("m") - $mes;
	$dia_diferencia   = date("d") - $dia;
	if ($dia_diferencia < 0 || $mes_diferencia < 0)
		$ano_diferencia--;
	return $ano_diferencia;
}
 
// Modo de uso
echo calculaedad ('1979-10-15'); // Imprimirá: 30



?>