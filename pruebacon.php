<?php
	// $host = "localhost";
	// $port = "5432";
	// $user = "postgres";
	// $pass = "123456";
	// $dbname = "siembra_caracas";

	// // $conexion = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
	// // $conexion = new PDO('pgsql:host=localhost;dbname=DBNAME', 'postgres', '123456');

	// $conexion = pg_connect("host=$host port=$port user=$user password=$pass dbname=$dbname") or die('falla la conexion'. pg_last_error($conexion));


	try {
		$dbuser = 'postgres';
		$dbpass = '123456';
		$host = 'localhost';
		$dbname='siembra_caracas';
		$conexion = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
	}catch (PDOException $e) {
		echo "Error : " . $e->getMessage() . "<br/>";
		die();
	}

	 //  $stat = pg_connection_status($conexion);
  // if ($stat === PGSQL_CONNECTION_OK) {
  //     echo 'Estado de la conexión ok';
  //     echo "<br />\n";
  // } else {
  //     echo 'No se ha podido conectar';
  //     echo "<br />\n";
  // }    


	$result = pg_query($conexion, "SELECT * FROM v_usuarios");


	while ($row = pg_fetch_row($result)) {
 		echo "ID usuario: $row[0] -> nombre usuario: $row[2] -> Login: $row[6] -> Password: $row[7] ";
  		echo "<br />\n";
	}


	// echo $result;

	// echo 'probando la conexion de php';

	// if ($conexion) {
	// 	# code...		
	// 	print "Conectado correctamente al puerto: " . pg_port($conexion) . "<br/>\n";
	// }else{
	// 	print pg_last_error($conexion);
 //   		exit;
	// }

?>