<?php
//	$host = "localhost";
//	$port = "5432";
//	$dbname = "BD_adminProyectos";
//	$user = "postgres";
//	$password = "postgres";
//	
//	pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password") or die("Error conectandose a la BD");
?>

<?php
	$host = "localhost";
	$port = "5432";
	$user = "postgres";
	$pass = "123456";
	$dbname = "sistemagestionsiembraccs";
	
	pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password") or die("Error conectandose a la BD");
?>
