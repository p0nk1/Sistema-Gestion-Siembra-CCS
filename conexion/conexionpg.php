<?php
//	$host = "localhost";
//	$port = "5432";
//	$user = "postgres";
//	$pass = "postgres";
//	$dbname = "BD_sistema_proyecto";
//
//	$conexion = pg_connect("host=$host port=$port user=$user password=$pass dbname=$dbname")
//	or die('Error en archivo de conexion'. pg_last_error());
// error_reporting(E_ALL); 
// ini_set("display_errors", 1); 

?>

<?php
	$host = "localhost";
	$port = "5432";
	$user = "postgres";
	$pass = "123456";
	$dbname = "sistemagestionsiembraccs";

	$conexion = pg_connect("host=$host port=$port user=$user password=$pass dbname=$dbname") or die('Error en archivo de conexion conexionpg sin forma de saber cual es el error'. pg_last_error($conexion));


	// try {
	// 	$dbuser = 'postgres';
	// 	$dbpass = '123456';
	// 	$host = 'localhost';
	// 	$dbname='siembra_caracas';
	// 	$conexion = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
	// }catch (PDOException $e) {
	// 	echo "capturando el Error : " . $e->getMessage() . "<br/>";
	// 	die();
	// }
	


	// $result = pg_query($conexion, "SELECT * FROM v_usuarios");

	// while ($row = pg_fetch_row($result)) {
 // 		echo "nombre_usuario: $row[2]";
 //  		echo "<br />\n";
	// }

?>
