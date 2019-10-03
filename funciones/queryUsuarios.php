<?php
	ini_set( "memory_limit" ,  "1024M");

	/******************************************** Inicio de Querys SQL Modulo Usuarios *************************************/

	FUNCTION query_buscar_data_usuario($cedula){
		$sql="select * from v_usuarios where cedula='$cedula';";
		$result=pg_query($sql);
		return $usuario=pg_fetch_array($result);
	}
	
	FUNCTION query_buscar_existencia_usuario($cedula){
		$sql="select * from v_usuarios where cedula='$cedula';";
		$result=pg_query($sql);
		$usuario=pg_fetch_array($result);
		if($usuario['cedula']==$cedula) return true; else return false;
		
	}
	
	FUNCTION query_comprobar_permiso_modulo($idUsuario,$idModulo){
		$sql="SELECT * FROM v_modulos_usuarios WHERE id_usuario='$idUsuario' AND id_modulo='$idModulo';";
		$result=pg_query($sql);
		$permiso=pg_fetch_array($result);
		if($permiso['id_modulo']==$idModulo) return true; else return false;
	}
	
	FUNCTION query_comprobar_nivel_i($idUsuario,$idBoton){
		$sql="SELECT * FROM v_botones_usuarios_nivel_i WHERE id_usuario='$idUsuario' AND id_boton_nivel_i='$idBoton';";
		$result=pg_query($sql);
		$permiso=pg_fetch_array($result);
		if($permiso['id_boton_nivel_i']==$idBoton) return true; else return false;
	}
	
	FUNCTION query_comprobar_nivel_ii($idUsuario,$idBoton){
		$sql="SELECT * FROM v_botones_usuarios_nivel_ii WHERE id_usuario='$idUsuario' AND id_boton_nivel_ii='$idBoton';";
		//echo "****".$sql."*****"; 
		$result=pg_query($sql);
		$permiso=pg_fetch_array($result);
		if($permiso['id_boton_nivel_ii']==$idBoton) return true; else return false;
	}
	
	FUNCTION query_buscar_id_usuario_con_cedula($cedula){
		$sql="SELECT cedula,id_usuario from v_usuarios where cedula='$cedula';";
		$result=pg_query($sql);
		$usuario=pg_fetch_array($result);
		return $usuario['id_usuario'];
	}
	
	FUNCTION query_insertar_permiso_modulo($idUsuario,$idModulo){
		$sql="INSERT into v_modulos_usuarios (id_usuario,id_modulo) VALUES ('$idUsuario','$idModulo');";
		$se_ejecuto_sin_errores=pg_query($sql);
		return $se_ejecuto_sin_errores;
	}
	
	FUNCTION query_insertar_permiso_nivel_i($idUsuario,$idBoton){
		$sql="INSERT into v_botones_usuarios_nivel_i (id_usuario,id_boton_nivel_i) VALUES ('$idUsuario','$idBoton');";
		$se_ejecuto_sin_errores=pg_query($sql);
		return $se_ejecuto_sin_errores;
	}
	
	FUNCTION query_insertar_permiso_nivel_ii($idUsuario,$idBoton){
		$sql="INSERT into v_botones_usuarios_nivel_ii (id_usuario,id_boton_nivel_ii) VALUES ('$idUsuario','$idBoton');";
		//echo "****".$sql."*****"; 
		$se_ejecuto_sin_errores=pg_query($sql);
		return $se_ejecuto_sin_errores;
	}
	
	FUNCTION query_eliminar_permiso_modulo($idUsuario,$idModulo){
		$sql="DELETE FROM v_modulos_usuarios WHERE id_modulo='$idModulo' AND id_usuario='$idUsuario';";
		$se_ejecuto_sin_errores=pg_query($sql);
		return $se_ejecuto_sin_errores;
	}
	
	FUNCTION query_eliminar_permiso_nivel_i($idUsuario,$idBoton){
		$sql="DELETE FROM v_botones_usuarios_nivel_i WHERE id_boton_nivel_i='$idBoton' AND id_usuario='$idUsuario';";
		$se_ejecuto_sin_errores=pg_query($sql);
		return $se_ejecuto_sin_errores;
	}
	
	FUNCTION query_eliminar_permiso_nivel_ii($idUsuario,$idBoton){
		$sql="DELETE FROM v_botones_usuarios_nivel_ii WHERE id_boton_nivel_ii='$idBoton' AND id_usuario='$idUsuario';";
		$se_ejecuto_sin_errores=pg_query($sql);
		return $se_ejecuto_sin_errores;
	}
	
	FUNCTION obtenerNombreUsuarioMedianteIdUsuario($id_user){
		$sql="select primer_nombre, primer_apellido from v_usuarios where id_usuario='$id_user';";
		$result=pg_query($sql);
		$nombres=pg_fetch_array($result);
		return $nombres;
	}

	FUNCTION query_insertar_usuario($cedula,$login,$primer_nombre,$segundo_nombre,$primer_apellido,$segundo_apellido,
					$password,$email,$telefono_celular,$telefono_habitacion,$sexo,$cargo,
					$fecha_registro,$id_usuario_registra,$ip_maquina_registra,$conexion){
		
		$sql_registra_usuario = "INSERT INTO v_usuarios (cedula, login, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido,
		password, correo_electronico, telefono_celular, telefono_habitacion, sexo, cargo,
		fecha_registro, id_usuario_registra, ip_maquina_registra)";
		
		$sql_registra_usuario .= " VALUES ($cedula,$login,$primer_nombre,$segundo_nombre,$primer_apellido,$segundo_apellido,
		$password,$email,$telefono_celular,$telefono_habitacion,$sexo,$cargo,
		$fecha_registro,$id_usuario_registra,$ip_maquina_registra);";
		
		return pg_query($conexion,$sql_registra_usuario) or die("Error ingrensando Nuevo Usuario ".pg_last_error($conexion));
	}
	
	FUNCTION query_buscar_cedula_usuario($cedula){
		$sql= "select cedula from v_usuarios where cedula='$cedula';";
		$result=pg_query($sql) or die("Error buscando cedula ".pg_last_error());
		$cedula_encontrada=pg_fetch_array($result);
		if($cedula_encontrada['cedula']==$cedula) return true;
		else return false;
	}
	
	FUNCTION query_buscar_login_usuario($login){
		$sql= "select login from v_usuarios where login='$login';";
		$result=pg_query($sql) or die("Error buscando login ".pg_last_error());
		$login_encontrado=pg_fetch_array($result);
		if($login_encontrado['login']==$login) return true;
		else return false;
	}
	
	
	FUNCTION query_cantidad_usuarios(){
			$sql_num_usuarios = 'SELECT * FROM v_usuarios where status_usuario=1';
			$resul_num_usuarios=pg_query($sql_num_usuarios) or die("Error buscando la cantidad de usuarios ".pg_last_error());
			return pg_num_rows($resul_num_usuarios);
	}
	
	//Este query ya no se usa pero lo dejare aqui para futura referencia
	FUNCTION query_buscar_datos_usuarios_paginador($limitInf,$tamPag){
			$usuarios=array();
			$sql_buscar_datos_usuarios = 'SELECT * FROM v_usuarios where status_usuario=1 ORDER BY cedula LIMIT ' .$tamPag.' Offset '.$limitInf;
			$resul=pg_query($sql_buscar_datos_usuarios) or die("Error consultado datos por usuario ".pg_last_error());
			while ($aux=pg_fetch_array($resul)) $usuarios[]=$aux;
			return $usuarios;
	}
	
	FUNCTION query_eliminar_usuario($id_usuario){
			$sql_desactivar="UPDATE v_usuarios SET status_usuario=0 WHERE id_usuario = $id_usuario";
			$resul=pg_query($sql_desactivar) or die("Error Desactivando el Usuario ".pg_last_error());
			return $resul;
	}
	
	
	FUNCTION query_buscar_datos_usuario($id_usuario){
			$sql_buscar_datos_usuario = "SELECT * FROM v_usuarios where id_usuario='".$id_usuario."'";
			$resul=pg_query($sql_buscar_datos_usuario) or die("Error consultado datos por usuario ".pg_last_error());
			return pg_fetch_array($resul);
	}
	
	FUNCTION modificar_datos_usuarios($primer_nombre,$segundo_nombre,$primer_apellido,$segundo_apellido,
						$correo_electronico,$telefono_habitacion,$telefono_celular,$login,$cedula,$cargo,$sexo,$reiniciar){
			
			$sql = 'UPDATE v_usuarios SET
				primer_nombre='.$primer_nombre.',segundo_nombre='.$segundo_nombre.',
				primer_apellido='.$primer_apellido.', segundo_apellido='.$segundo_apellido.',
				correo_electronico='.$correo_electronico.', telefono_habitacion='.$telefono_habitacion.',
				telefono_celular='.$telefono_celular.', sexo='.$sexo.', cargo='.$cargo;
			
			if($reiniciar==1){
				$sql.=", status_clave = '1' ";
			}
			$sql.=' WHERE cedula='.$cedula.';';
			
			$exito_en_modificacion=pg_query($sql) or die("Error Modificando ".pg_last_error());
	
			return $exito_en_modificacion;
	}
	
	FUNCTION validar_usuario($cedula){
		$sql = 'SELECT * FROM v_usuarios WHERE cedula ='.'\''.$cedula.'\'';
		$resul=pg_query($sql) or die("Error consultando");
		if(pg_fetch_array($resul)){
		$mensaje="error";
		return $mensaje;
		}
	}
	
	
	FUNCTION validar_login($login){
		$sql = 'SELECT * FROM v_usuarios WHERE login ='.'\''.$login.'\'';
		$resul=pg_query($sql) or die("Error: consultando");
		if(pg_fetch_array($resul)){
		$mensaje=1;
		return $mensaje;
		}
	}
	/*
	FUNCTION buscar_usuarios(){
		echo $sql_buscar_usuarios = 'SELECT * FROM v_usuarios where status_usuario=1 ORDER BY cedula';
		return $sql_buscar_usuarios;
	}
	*/

		FUNCTION buscar_usuarios(){
		$sql_buscar_usuarios = 'SELECT * FROM v_usuarios where status_usuario=1';
		$result=pg_query($sql_buscar_usuarios);
		return $result;
	}

	FUNCTION buscar_modulos(){
		$sql_buscar_modulos = 'SELECT * FROM e_modulos_sistema';
		return $sql_buscar_modulos;
	}

	FUNCTION buscar_usuarios_con_proyecto(){
		$sql_buscar_usuarios_con_proyecto = 'SELECT u.id_usuario as usuarioid, u.id_usuario_registra as usuarior, u.cedula as cedula, u.nombre_usuario as nombreu, p.id_proyecto as idproyecto, p.nombre_proyecto as nombreproyecto, p.id_usuario_registra as usuarior2 FROM  v_usuarios u JOIN  v_proyecto p on u.id_usuario = p.id_usuario_registra ORDER BY u.id_usuario ASC';
		$result=pg_query($sql_buscar_usuarios_con_proyecto);
		return $result;
	}

		
	FUNCTION buscar_nombre_modulo($id_modulo){
		$sql_buscar_nombre_modulo = 'SELECT modulo_sistema FROM e_modulos_sistema WHERE id_modulo='.$id_modulo;
		return $sql_buscar_nombre_modulo;
	}
	
	FUNCTION buscar_modulos_usuario($usuario){
		$modulos=array();
		$i=0;

		$sql_modulos_usuario = 'SELECT * FROM v_modulos_usuarios WHERE id_usuario ='.$usuario;
		$resul_modulos_usuario=pg_query($sql_modulos_usuario) or die("Error consultado modulos por usuario");

		while ($row_modulos_usuario=pg_fetch_array($resul_modulos_usuario)){
			$modulos[$i]['id_modulo_usuario'] = $row_modulos_usuario['id_modulo_usuario'];
			$modulos[$i]['id_usuario'] = $row_modulos_usuario['id_usuario'];
			$modulos[$i]['id_modulo'] = $row_modulos_usuario['id_modulo'];
			$i++;
		}
		return $modulos;
	}
	
	FUNCTION buscar_botones($agregar_boton){
		$sql_buscar_botones = "SELECT id_boton_nivel_i, nombre_boton FROM e_botones_menu_nivel_i 
					WHERE id_modulo_sistema=".$agregar_boton;
		return $sql_buscar_botones;
	}
	
	FUNCTION buscar_botones_nivel_ii($agregar_boton_nivel_ii, $modulo){
		$sql_buscar_botones = 'SELECT * FROM e_botones_menu_nivel_ii WHERE id_modulo_sistema = '.$modulo.' AND id_boton_nivel_i ='.$agregar_boton_nivel_ii;
		return $sql_buscar_botones;
	}

	FUNCTION buscar_nombre_boton($id_boton){
		$sql_nombre_botones = 'SELECT nombre_boton FROM e_botones_menu_nivel_i
					WHERE id_boton_nivel_i ='.$id_boton;
		return $sql_nombre_botones;
	}
	
	FUNCTION buscar_nombre_boton_nivel_ii($id_boton_nivel_ii){
		$sql_nombre_boton = 'SELECT nombre_boton FROM e_botones_menu_nivel_ii
					WHERE id_boton_nivel_ii = '.$id_boton_nivel_ii;
		return $sql_nombre_boton;
	}

	FUNCTION buscar_botones_usuario($id_usuario){
		$botones=array();
		$i=0;
		$sql_select="SELECT * FROM v_botones_usuarios WHERE id_usuario = '$id_usuario'";
		$resul_botones_usuario=pg_query($sql_select);
		while ($row_modulos_usuario=pg_fetch_array($resul_botones_usuario)){
			$botones[$i]['id_boton']= $row_modulos_usuario['id_boton'];
			$i++;
		}
		return $botones;
	}

	FUNCTION buscar_botones_nivel_ii_usuario($usuario, $agregar_boton, $boton_nivel_i){
		$botones_nivel_ii=array();
		$i=0;

		$sql_botones_nivel_ii_usuario = 'SELECT * FROM v_botones_usuario_nivel_ii WHERE id_boton_nivel_i = '.$boton_nivel_i.' 
						AND id_modulo_sistema = '.$agregar_boton.' AND id_usuario = '.$usuario;

		$resul_botones_nivel_ii_usuario =mysql_query($sql_botones_nivel_ii_usuario) or die("Error consultado Botones por Usuario");

		while ($row_botones_nivel_ii_usuario=mysql_fetch_array($resul_botones_nivel_ii_usuario)){
			$botones_nivel_ii[$i]['id_boton_nivel_ii'] = $row_botones_nivel_ii_usuario['id_boton_nivel_ii'];
			$botones_nivel_ii[$i]['nombre_boton'] = $row_botones_nivel_ii_usuario['nombre_boton'];
			$i++;
		}
		return $botones_nivel_ii;
	}
	
	FUNCTION guardar_modulo($user, $mod){
		$sql_modulo_validar = 'SELECT * FROM v_modulos_usuarios WHERE id_usuario = '.$user.' AND id_modulo = '.$mod;
		$resul_modulo_validar=mysql_query($sql_modulo_validar) or die("Error Buscando El Modulo para Validar");
		$row_modulo_validar=mysql_fetch_array($resul_modulo_validar);

		if($row_modulo_validar){
			$modulo_existe=1;
			return $modulo_existe;
		}else{
			$sql1 = 'INSERT INTO v_modulos_usuarios (id_usuario, id_modulo) VALUES ('.$user.','.$mod.');';
			$resul=mysql_query($sql1) or die("Error ingresando modulo para un Director");
			$modulo_guardo=2;
			return $modulo_guardo;
		}
	}

	FUNCTION eliminar_modulo($user, $elim_mod){
		$sql_ver_botones_director = 'SELECT * FROM v_botones_usuario_nivel_i WHERE id_usuario = '.$user.' 
						AND id_modulo_sistema = '.$elim_mod;
		$resul_ver_botones_director=mysql_query($sql_ver_botones_director) or die("Error Buscando el Botones para Eliminar Modulo");
		$row_ver_botones_director=mysql_fetch_array($resul_ver_botones_director);

		if($row_ver_botones_director != NULL){
			$error_borrar_mod=1;
			return $error_borrar_mod;
		}else{
			$sql_eliminar_modulo='DELETE FROM v_modulos_usuarios WHERE id_modulo ='.$elim_mod;
			$resul_elimino=mysql_query($sql_eliminar_modulo) or die("Error Eliminando Modulo al Usuario");
		}
	}

	FUNCTION guardar_boton($user, $boton_id, $id_mod){
		$sql_guardar_botones_director = 'SELECT * FROM v_botones_usuario_nivel_i
						WHERE id_usuario = '.$user.' AND id_boton_menu_nivel_i = '.$boton_id; 
		$resul_guardar_botones_director=mysql_query($sql_guardar_botones_director) or die("Error buscando el Boton para validar");
		$row_guardar_botones_director=mysql_fetch_array($resul_guardar_botones_director);
	
		if($row_guardar_botones_director){
			$bandera2=1;
			return $bandera2;
		}else{
			$sql_nom="select nombre_boton from e_botones_menu_nivel_i where id_boton_nivel_i=".$boton_id;
			$resul_nombre_boton=mysql_query($sql_nom) or die("Error buscando nombre del boton");
			$row_nombre_boton=mysql_fetch_array($resul_nombre_boton);
			$nom_boton=$row_nombre_boton[0];
		
			$sql2 = 'INSERT INTO  v_botones_usuario_nivel_i (id_boton_menu_nivel_i, id_modulo_sistema, id_usuario, nombre_boton) 
				VALUES ('.$boton_id.','.$id_mod.',' .$user.','.'\''.$nom_boton.'\''.');';
			$resul=mysql_query($sql2) or die("Error ingresando Boton para un Director");
			$bandera2=2;
		}
	}
	
	FUNCTION guardar_boton_nivel_ii($user, $boton_id, $boton_nivel_ii, $id_mod){
		$sql_validar_boton = 'SELECT * FROM v_botones_usuario_nivel_ii
					WHERE id_boton_nivel_ii = '.$boton_nivel_ii.' AND id_usuario = '.$user ;
		$resul_validar_boton_niv_ii=mysql_query($sql_validar_boton) or die("Error buscando el Boton para validar");
		$row_validar_boton_niv_ii=mysql_fetch_array($resul_validar_boton_niv_ii);
	
		if($row_validar_boton_niv_ii){
			$boton_nivel_ii_result=1;
			return $boton_nivel_ii_result;
		}else{
			$sql_nom="select nombre_boton from e_botones_menu_nivel_ii where id_boton_nivel_ii=".$boton_nivel_ii;
			$resul_nombre_boton=mysql_query($sql_nom) or die("Error buscando nombre del boton");
			$row_nombre_boton=mysql_fetch_array($resul_nombre_boton);
			$nom_boton=$row_nombre_boton[0];
		
			$sql_guardar_botones_nivel_ii_usuario = 'INSERT INTO v_botones_usuario_nivel_ii (
								id_boton_nivel_i,
								id_boton_nivel_ii,
								id_modulo_sistema,
								id_usuario,
								nombre_boton)
								VALUES ('.$boton_id.',
									'.$boton_nivel_ii.',
									'.$id_mod.',
									'.$user.',
									'.'\''.$nom_boton.'\''.');';
			$resul=mysql_query($sql_guardar_botones_nivel_ii_usuario) or die("Error ingresando Boton de Nivel II Para Usuario");
			return $boton_nivel_ii_result=2;
		}
	}
	
	FUNCTION eliminar_boton($elim_boton, $user){
		$sql_eliminar_boton='DELETE FROM v_botones_usuario_nivel_i WHERE id_boton_menu_nivel_i ='.$elim_boton.' AND id_usuario ='.$user;
		$resul_elimino_boton=mysql_query($sql_eliminar_boton) or die("Error eliminando boton a un Usuario");
	}
	
	FUNCTION eliminar_boton_nivel_ii($elim_boton, $user){
		$sql_eliminar_boton_nivel_ii='DELETE FROM v_botones_usuario_nivel_ii WHERE id_boton_nivel_ii ='.$elim_boton.' AND id_usuario ='.$user;
		$resul_elimino_boton=mysql_query($sql_eliminar_boton_nivel_ii) or die("Error eliminando boton a un Usuario");
	}

	FUNCTION cambiar_contraseña($nueva_contraseña, $id_user){
		$password=md5($nueva_contraseña);
		$sql_cambiar_contraseña = 'UPDATE permisos_usuarios.usuarios SET clave = '.'\''.$password.'\''.' WHERE id_usuario = '.$id_user;
		$cambio_contraseña=pg_query($sql_cambiar_contraseña) or die(pg_last_error());
		return $cambio_contraseña;
	}

	FUNCTION buscar_datos_usuarios($nombre_usuario){
		$buscar_user = "SELECT * FROM v_usuarios where login = '$nombre_usuario'";
		$result_buscar_usuario=pg_query($buscar_user) or die("aqui da Error Consultando Datos del Usuario");
		$row_usuario=pg_fetch_array($result_buscar_usuario);
		//var_dump($row_usuario);
		return $row_usuario;
	}

	FUNCTION registrar_logeo_exitoso($nombre_usuario, $nombre_maquina, $direccion_ip){
		$fecha=date('Y-m-d');
		$hora=date('H:i:s');
		$sql_hist_exitoso = "INSERT INTO v_historico_ingreso_exitoso ( usuario, direccion_ip, nombre_maquina, fecha, hora) 
				VALUES ( '$nombre_usuario','$direccion_ip','$nombre_maquina','$fecha','$hora')";
		$resul2=pg_query($sql_hist_exitoso) or die("Error registrando el historico de ingreso exitoso");
		return $exito=1;
	}
	FUNCTION registrar_logeo_fallido($nombre_usuario, $nombre_maquina, $direccion_ip){
		$fecha=date('Y-m-d');
		$hora=date('H:i:s');
		$sql_hist_fallido = "INSERT INTO v_historico_ingreso_fallido ( usuario, direccion_ip, nombre_maquina, fecha, hora)
				VALUES ( '$nombre_usuario', '$direccion_ip', '$nombre_maquina', '$fecha','$hora')";
		$resul3=pg_query($sql_hist_fallido) or die("Error registrando el historico de ingreso fallido");
		return $exito=1;
	}
	/******************************************** FIN de Querys SQL Modulo Usuarios *****************************************/

/******************************************* FIN de Querys SQL Modulo Usuarios ECHE *************************************/
	function registrar_usuario($cedula, $nombres_usuario, $telefono_1, $telefono_2, $email, $login, $clave, $fecha_registro, $id_usuario_registra, $ip_maquina_registra, $id_perfil) {

		// echo $cedula.''.$nombres_usuario.''.$email.''.$login.''.$clave.''.$fecha_registro;

		$sql_registra_usuario = 'INSERT INTO v_usuarios (cedula, nombre_usuario, telefono_1, telefono_2, correo_electronico, login, password, fecha_registro, id_usuario_registra, ip_maquina_registra, id_perfil) VALUES (
		' .$cedula. ', ' .$nombres_usuario. ', ' .$telefono_1. ', ' .$telefono_2. ', ' .$email. ', ' .$login. ', '.$clave.', ' .$fecha_registro. ', ' .$id_usuario_registra. ', ' .$ip_maquina_registra. ', ' .$id_perfil. '  );';
		// echo $sql_registra_usuario;
		pg_query($sql_registra_usuario) or die('error al registrar usuarios');
	}
	
	function editar_usuario($id_usuario, $nombres_usuario, $email, $login, $telefono_1, $telefono_2, $fecha_registro, 	
		                      $id_usuario_registra, $ip_maquina_registra, $id_perfil)
	{
		$sql_edita_usuario='UPDATE v_usuarios SET 
		                    nombre_usuario='.$nombres_usuario.',correo_electronico='.$email.',
												login='.$login.',telefono_1='.$telefono_1.',
												telefono_2='.$telefono_2.',fecha_registro='.$fecha_registro.',
												id_usuario_registra='.$id_usuario_registra.',ip_maquina_registra='.$ip_maquina_registra.',
												id_perfil='.$id_perfil.'
												WHERE id_usuario ='.$id_usuario.';';
	//echo " sql_edita_usuario ".$sql_edita_usuario;
	//exit();
		
		pg_query($sql_edita_usuario) or die("Error actualizando el Usuario ".pg_last_error());
	}

?>
