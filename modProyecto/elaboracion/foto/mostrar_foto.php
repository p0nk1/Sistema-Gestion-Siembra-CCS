<?php
	session_start();

	# Hace el proceso inverso a pg_escape_bytea, para que el archivo esté en su estado original
	$file=$_SESSION['foto']['binario'];
        
        # Envío de cabeceras
        header("Cache-control: private");
	header("Content-type: ".$_SESSION['foto']['mime']);
        header("Content-length: ".$_SESSION['foto']['size']);
        header("Expires: ".gmdate("D, d M Y H:i:s", mktime(date("H")+2, date("i"), date("s"), date("m"), date("d"), date("Y")))." GMT");
        header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
       
        
	# Imprime el contenido del archivo
	print $file;  
?>