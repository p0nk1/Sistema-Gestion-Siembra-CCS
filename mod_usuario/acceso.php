<?php
	session_start();
	include_once ("../funciones/funciones_session.php");
	comprobarSession($_SESSION['adminProy']);
	
	extract($_POST);
	extract($_GET);

	include("../conexion/conexionpg.php");
	/********************************************/
	$user=isset($_POST['user'])?$_POST['user']:'';
	$pass=isset($_POST['pass'])?$_POST['pass']:'';
	$pass=md5($pass);

	if($_POST['cambio'] == ""){
		$sql_session="SELECT * FROM v_usuarios WHERE login='$user' AND password='$pass' AND status_usuario=1";
		$query_session=pg_query($sql_session);
		$row=pg_fetch_array($query_session);
	}
	if( $_POST['cambio'] == "1"){
		$sql_session2="SELECT * FROM v_usuarios WHERE status_usuario=1 AND login='".$_SESSION['adminProy']['login']."'";
		$query_session2= pg_query($sql_session2);
		$row=pg_fetch_array($query_session2);
	}

	if(count($row)>0 && !empty($row["login"])){
		//si trae info, es porque existe
		if($_POST['cambio'] == ""){
			//cambio de contrasena
			$_SESSION['usuario']=$row['nombre_usuario'];
			$_SESSION['login']  =$row['login'];
			$_SESSION['pass']   =$row['password'];
			echo "<script language=javascript>window.parent.location.href='cambio_pass.php'</script>";
		}else if( $_POST['cambio'] == "1"){
			$nuevo_pass = md5( $_POST['clave1'] );
		        $sql_update="UPDATE v_usuarios SET password='".$nuevo_pass."' WHERE login='".$_SESSION['adminProy']['login']."'";
			$query_update=pg_query($sql_update);
			
			echo "<script language=javascript> alert('La actualización se realizó exitosamente..!'); </script>";
			if( $_POST['cambio'] == "1" && $_POST['cerrar'] == "2" )
				echo "<script language=javascript> window.close() </script>";
			else if( $_POST['cambio'] == "1" )
				echo "<script language=javascript> window.parent.location.href='principal.php' </script>";
		}
	}
?>
