<?php

function registrar_productor($cedula, $nombres_usuario, $email, $serial, $codigo, $telefono_1, $telefono_2, $fecha_registro, $direccion,$id) {

		$sql_registra_usuario = 'INSERT INTO v_productores_nuevo (cedula, nombre_apellido, telefono_1, telefono_2, correo_electronico, status_productor, serial_carnet,  codigo_carnet, direccion, fecha_registro, id_usuario_registro, id_proyecto) VALUES (' .$cedula. ', ' .$nombres_usuario. ', ' .$telefono_1. ', ' .$telefono_2. ',' .$email. ', 1 , '.$serial.', '.$codigo.',	'.$direccion.',' .$fecha_registro. ', '.$id.', '.'1'.' );';
		// echo $sql_registra_usuario;
		pg_query($sql_registra_usuario) or die();
	}



?>