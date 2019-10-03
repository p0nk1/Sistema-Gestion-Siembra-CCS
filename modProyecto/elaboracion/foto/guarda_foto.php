<?php
session_start();
move_uploaded_file($_SESSION['foto']['binario'],"../../fotografias/asdasd.png") or die("Error Moviendo Foto a Temporal");

?>