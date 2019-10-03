<?php
function crearSession($session,$id,$cedula,$login,$nombre_usuario,$id_perfil){
    /*$_SESSION[$proyecto]*/$session['id_usuario']=$id;
    $session['cedula']=$cedula;
    $session['nombre_usuario']=$nombre_usuario;
    $session['login']=$login;
    $session['id_perfil']=$id_perfil;
    $session['ing']=1; //Esta variable es la que comprueba el acceso en todas las paginas y comprueba que la session se creo por aqui
    return $session;
}
/*function crearSession($session,$id,$cedula,$login,$primerNombre,$segundoNombre,$primerApellido,$segundoApellido){
    if(empty($segundoNombre)) $espacio_entre_sn_pa=''; else $espacio_entre_sn_pa=' ';
    if(empty($segundoApellido)) $espacio_entre_pa_sa=''; else $espacio_entre_pa_sa=' ';
    $nombre=$primerNombre.' '.$segundoNombre.$espacio_entre_sn_pa.$primerApellido.$espacio_entre_pa_sa.$segundoApellido;

    /*$_SESSION[$proyecto]*//*$session['id_usuario']=$id;
    $session['cedula']=$cedula;
    $session['primer_nombre']=$primerNombre;
    $session['segundo_nombre']=$segundoNombre;
    $session['primer_apellido']=$primerApellido;
    $session['segundo_apellido']=$segundoApellido;
    $session['login']=$login;
    $session['nombre']=$nombre;
    $session['ing']=1; //Esta variable es la que comprueba el acceso en todas las paginas y comprueba que la session se creo por aqui
    return $session;
}*/

function eliminarSession(){
    //Destruyo todo rastro de esta session
    //Para que funciones la pagina donde es llamada esta funcion debe tener un session_star() para empezar una funcioon o reanudar una anterior
    //session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
    return true;
    
}

function comprobarSession($session){
    if($session['ing']==1) return true;
    
    else {
        $posicionProyecto=explode("/sistema_proyecto",$_SERVER["PHP_SELF"]);
        $cantidadFicheros=explode("/",$posicionProyecto[1]);
        $auxPosicion=count($cantidadFicheros)-2; //El menos 2 resta el archivo de posicion, el primer /
        
            if($auxPosicion=!1){
            $pathProyecto="..";
            while ($auxPosicion>1){
                $pathProyecto.="/..";
                $auxPosicion=$auxPosicion-1;
            }
            }else{
                $pathProyecto=$posicionProyecto[0]."/sistema_proyecto";
            }
        echo '<script type="text/javascript">top.location.href = "'.$pathProyecto.'";</script>';
        return false;
        }
}

?>
