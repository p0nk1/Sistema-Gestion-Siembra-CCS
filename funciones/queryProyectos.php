<?php
	/*------------------------------------------------------------------------------------------------------------------------------------*/
	/*----------------------------------------------------- MODULO DE PROYECTOS ----------------------------------------------------------*/
	/*------------------------------------------------------------------------------------------------------------------------------------*/
	
	FUNCTION queryComboEstado(){
		$sql = 'SELECT * FROM e_estado';
		RETURN $sql;
	}
	FUNCTION queryComboMunicipio($estado){
		$sql = 'SELECT * FROM e_municipio WHERE id_geo_estado='.$estado;
		RETURN $sql;
	}

	FUNCTION queryComboParroquia($municipio){
		$sql = 'SELECT * FROM e_parroquia WHERE id_geo_municipio='.$municipio;
		RETURN $sql;
	}
        
        
	FUNCTION queryComboTipoOrg(){
		$sql = 'SELECT * FROM e_tipo_organizacion';
		RETURN $sql;
	}        
        

        FUNCTION queryComboOrg($tipo_org){
		$sql = 'SELECT * FROM e_organizacion WHERE id_tipo_org='.$tipo_org;
		RETURN $sql;
	}
        
        FUNCTION queryComboCadena(){
		$sql = 'SELECT * FROM e_cadena';
		RETURN $sql;
	}

	       
        

        FUNCTION queryComboArea($cadena){
		$sql = 'SELECT * FROM e_area_cadena WHERE id_cadena='.$cadena;
		RETURN $sql;
	}


	FUNCTION queryCombofigura_juridica(){
		$sql = 'SELECT * FROM e_figura_juridica';
		RETURN $sql;

	}

	FUNCTION queryComboresponsable(){
		$sql = "SELECT * FROM v_usuarios WHERE status_usuario='1'";
		RETURN $sql;

	}



	function query_cadena() {
    	$sql_combo_cadena = "SELECT id_cadena, cadena FROM e_cadena where estatus='1'";
    	return $sql_combo_cadena;
	} 


	function query_organizacion($id_tipo_org) {
	    $sql_combo_comuna = "SELECT id_org, organizacion FROM e_organizacion where id_tipo_org= '$id_tipo_org' and estatus='1'";
	    return $sql_combo_comuna;
	}


        function queryComboperfil(){

		$sql = 'SELECT * FROM e_perfil_usuario';
		RETURN $sql;

	}

		/*FUNCTION registrar_nuevo_proyecto(
		$nombreProyecto,$descripProyecto,$nombreOrg,$estado,$municipio,$parroquia,
		$direccionOrg,$usuario_reg,$ip_registra,$fecha_reg){
		$sql='INSERT INTO v_proyectos(
		"nombreProyecto", "descripcionProyecto", "nombreOrganizacion", "idEstado", "idMunicipio", "idParroquia", "direccionOrgCom",
		"usuarioRegistra", "ipRegistra", "fechaRegistra") VALUES (
		'.'\''.$nombreProyecto.'\''.', '.'\''.$descripProyecto.'\''.', '.'\''.$nombreOrg.'\''.', '.$estado.', '.$municipio.',
		'.$parroquia.', '.'\''.$direccionOrg.'\''.', '.$usuario_reg.', '.'\''.$ip_registra.'\''.', '.'\''.$fecha_reg.'\''.');';

		$regnuevoproy=pg_query($sql) or die("Error Registrando Nuevo Proyecto");
		if(!empty($regnuevoproy)){ return $exito=1;}
	}*/
/****************************************************************************************************/
	FUNCTION registrar_nuevo_proyecto($nombreProy, $descripcionProy, $cadena, $area_cadena, $tipo_org, $organizacion, $comite_eco_comunal, $figura_juridica,$figura_registrada, $monfin, $est_fin, $ente_fin, $monaprob, $anio_fin, $montrasf, $monpendientetrasf, $credito_adicional, $monfin_adicional, $est_fin_adicional, $ente_fin_adicional, $monaprob_adicional,$anio_fin_adicional, $montrasf_adicional, $monpendientetrasf_adicional, $productores_directos, $productores_masculino, $productores_femenino, $estatus_produccion, $fecha_inicio_produccion, $producto_principal, $meta_produccion, $estado, $municipio, $circuito, $parroquia, $eje_parroquial, $latitud, $longitud, $direccion_proyecto,  $fecha, $estatus_tabla, $id_user ){

		echo $sql='INSERT INTO v_proyecto(
		"nombre_proyecto", "descripcion_proyecto","comite_eco_comunal", "id_fig_juridica", "figura_jur_reg", 			"fecha_registro_proyecto","estatus_tabla_proyecto","id_usuario_registra") VALUES (
		'.$nombreProy.', '.$descripcionProy.', '.$comite_eco_comunal.', '.$figura_juridica.', '.$figura_registrada.', '.$fecha.', '.$estatus_tabla.', 
		'.$id_user.');';

		$regnuevoproy=pg_query($sql) or die("Error Registrando Nuevo Proyecto");

		if(isset($regnuevoproy)){
		//CONSULTA EL MAXIMO ID EN LA TABLA proyecto
		$sql_maxId = 'SELECT MAX(id_proyecto) FROM v_proyecto';
		$rs_id = pg_query($sql_maxId) or die();
		$row_id=pg_fetch_array($rs_id);
			if(isset($row_id)){
				$id_proyecto=$row_id[0];

				//REGISTRA EN LA TABLA v_tipo_actividad_economica          le falta for

				echo $sql_v_tipo_actividad_economica='INSERT INTO v_tipo_actividad_economica
				 (id_proyecto, id_cadena, id_area_cadena, estatus_tabla)
						VALUES ('.$id_proyecto.', '.$cadena.', '.$area_cadena.', '.$estatus_tabla.');';
				$row_tipo_actividad_economica=pg_query($sql_v_tipo_actividad_economica) or die();

				
				//REGISTRA EN LA TABLA v_org_comunitarias_sociales_vinculadas
				for($i=0;$i<count($_POST['tipo_org']);$i++) {

				echo $sql_v_org_comunitarias_sociales_vinculadas='INSERT INTO v_org_comunitarias_sociales_vinculadas
				 (id_proyecto, id_tipo_org, id_org, estatus_tabla)
						VALUES ('.$id_proyecto.', '.$tipo_org.', '.$organizacion.', '.$estatus_tabla.');';
				$row_org_comunitarias_sociales_vinculadas=pg_query($sql_v_org_comunitarias_sociales_vinculadas) or die();

				}

				//REGISTRA EN LA TABLA v_financiamiento
				for($i=0;$i<count($_POST['tipo_fin']);$i++) {

				$sql_v_financiamiento='INSERT INTO v_financiamiento
				 (id_proyecto, obj_financiamiento , id_ente_financiamiento, id_estatus_financiamiento,  monto, monto_aprobado,   monto_transferido, 				monto_pendiente, anio_financiamiento, tipo_financiamiento, estatus_tabla_financiamiento )
						VALUES ('.$id_proyecto.', '.$nombreProy.', '.$ente_fin.', '.$est_fin.', '.$monfin.', '.$monaprob.', '.$montrasf.',
				 '.$monpendientetrasf.', '.$anio_fin.', '.$tipo_fin.', '.$estatus_tabla.');';
				$row_financiamiento=pg_query($sql_v_financiamiento) or die();
				
				}
		
				//REGISTRA EN LA TABLA v_productores

				$sql_v_productores='INSERT INTO v_productores
				 (id_proyecto, num_pro_directos , num_prod_femeninos , num_prod_masculinos,  estatus_tabla)
						VALUES ('.$id_proyecto.', '.$productores_directos.', '.$productores_masculino.', '.$productores_femenino.', 
							'.$estatus_tabla.');';
				$row_productores=pg_query($sql_v_productores) or die();


				//REGISTRA EN LA TABLA v_produccion_proyecto

				$sql_v_produccion_proyecto='INSERT INTO v_produccion_proyecto
				 (id_proyecto, estatus_produccion , fecha_produccion , prod_principal, meta_produccion,  estatus_tabla_produccion)
						VALUES ('.$id_proyecto.', '.$estatus_produccion.', '.$fecha_inicio_produccion.', '.$producto_principal.', '.$meta_produccion.', 						'.$estatus_tabla.');';
				$row_produccion_proyecto=pg_query($sql_v_produccion_proyecto) or die();


				//REGISTRA EN LA TABLA v_ubicacion_proyecto_georeferencial
				$sql_v_ubicacion='INSERT INTO v_ubicacion_proyecto_georeferencial
				 (id_proyecto, estado, municipio, parroquia, id_circuito, id_eje_parroquial,latitud,longitud,direccion,estatus_tabla)
						VALUES ('.$id_proyecto.', '.$estado.', '.$municipio.', '.$parroquia.', '.$circuito.', 
				'.$eje_parroquial.','.$latitud.','.$longitud.','.$direccion_proyecto.','.$estatus_tabla.');';
				$row_ubicacion=pg_query($sql_v_ubicacion) or die();
				}
			}

		if(!empty($row_ubicacion)){ return $exito=1;}
	}



	FUNCTION actualizarProyecto($id_proyecto,$nombreProy,$descripcionProy,$cadena,$area_cadena,$tipo_org,$organizacion,$comite_eco_comunal,$figura_juridica,$estado,$municipio,$circuito,$parroquia,$eje_parroquial,$latitud,$longitud,$direccion_proyecto,$fecha,$estatus_tabla,$id_user)
	{
		//ACTUALIZA EN LA TABLA EVENTOS
		$sql_v_proyecto='UPDATE v_proyecto SET nombre_proyecto='.$nombreProy.', descripcion_proyecto='.$descripcionProy.', id_cadena='.$cadena.', id_area_cadena='.$area_cadena.', id_tipo_org='.$tipo_org.', id_org='.$organizacion.', comite_eco_comunal='.$comite_eco_comunal.', id_fig_juridica='.$figura_juridica.', direccion_proyecto='.$direccion_proyecto.' WHERE id_proyecto='.$id_proyecto.';';
		
		$result=pg_query($sql_v_proyecto) or die();
	
		$sql_v_ubicacion_proyecto_georeferencial='UPDATE v_ubicacion_proyecto_georeferencial SET estado='.$estado.', municipio='.$municipio.', parroquia='.$parroquia.', id_circuito='.$circuito.',	id_eje_parroquial='.$eje_parroquial.', latitud='.$latitud.', longitud='.$longitud.', direccion='.$direccion_proyecto.' WHERE id_proyecto='.$id_proyecto.';';
		$result_ubicacion=pg_query($sql_v_ubicacion_proyecto_georeferencial) or die();
		return true;
	}

	function traerRegistrosProyecto()
	{
  	$sql="SELECT a.*, b.*, c.*, d.*  FROM v_proyecto as a left JOIN v_productores as b 
					ON b.id_proyecto=a.id_proyecto left JOIN v_produccion_proyecto as c ON c.id_proyecto=a.id_proyecto
					left JOIN v_ubicacion_proyecto_georeferencial as d ON d.id_proyecto=a.id_proyecto 
					WHERE a.estatus_tabla_proyecto='1' ORDER BY fecha_registro_proyecto DESC";
	$result=pg_query($sql);
	//$row=pg_fetch_array($result);
	return $result;
 	}

 	function traerRegistrosProyecto1($id)
	{
  	 $sql="SELECT a.*, b.*, c.*, d.*  FROM v_proyecto as a left JOIN v_productores as b 
					ON b.id_proyecto=a.id_proyecto left JOIN v_produccion_proyecto as c ON c.id_proyecto=a.id_proyecto
					left JOIN v_ubicacion_proyecto_georeferencial as d ON d.id_proyecto=a.id_proyecto 
					WHERE a.estatus_tabla_proyecto='1' and id_usuario_registra = $id ORDER BY fecha_registro_proyecto DESC";
	$result=pg_query($sql);
	//$row=pg_fetch_array($result);
	return $result;
 	}


/*SELECT a.*, b.* FROM v_proyecto as a INNER JOIN v_ubicacion_proyecto_georeferencial as b ON b.id_proyecto=a.id_proyecto 
	WHERE a.id_proyecto='$id_proyecto' ORDER BY fecha_registro_proyecto DESC*/
	
	function buscarRegistro($id_proyecto)
	{
		$sql_datos = "SELECT a.*, b.*, c.*, d.*,e.*  FROM v_proyecto as a left JOIN v_productores as b 
									ON b.id_proyecto=a.id_proyecto left JOIN v_produccion_proyecto as c ON c.id_proyecto=a.id_proyecto
									left JOIN v_ubicacion_proyecto_georeferencial as d ON d.id_proyecto=a.id_proyecto 
									left JOIN v_inversion_fragmentada as e ON e.id_proyecto=a.id_proyecto
									WHERE a.id_proyecto='$id_proyecto' ORDER BY fecha_registro_proyecto DESC";
		$result_datos = pg_query($sql_datos) or die();
		$row_datos = pg_fetch_array($result_datos);
		$datos = $row_datos;
		return $datos;
	}

	function ReporteProyectoProductores()
	{
		// creacion de funcion para el reporte de proyectos con usuarios se debe ir modificando para adaptarla (ChAaGgYy)


		$sql_datos="SELECT a.*, b.*, c.*, d.*, e.texto as estado, f.texto as municipio, g.texto as parroquia 
                	FROM v_proyecto as a 
                	left JOIN v_productores_nuevo as b ON b.id_proyecto=a.id_proyecto 
                	left JOIN v_produccion_proyecto as c ON c.id_proyecto=a.id_proyecto 
                	left JOIN v_ubicacion_proyecto_georeferencial as d ON d.id_proyecto=a.id_proyecto 
                	left JOIN e_estado as e ON e.id=d.estado 
                	left JOIN e_municipio as f ON f.id=d.municipio 
                	left JOIN e_municipio as g ON g.id=d.parroquia 
                	WHERE a.estatus_tabla_proyecto='1' AND b.id_productor>0 AND a.id_proyecto>1
                	ORDER BY a.id_proyecto ASC";

		$datos = pg_query($sql_datos) or die();
		// $row_datos = pg_fetch_row($result_datos);
		// $datos = $row_datos;
		return $datos ;
	}

	function traeridCadena($id_proyecto)
	{
		$sql = "SELECT distinct id_cadena FROM v_tipo_actividad_economica WHERE id_proyecto='$id_proyecto'";
		$result = pg_query($sql) or die();
		$row = pg_fetch_array($result);
		return $row['id_cadena'];
	}
	
	function traerNombreCadena($id)
	{
		$sql = "SELECT distinct id_cadena FROM v_tipo_actividad_economica WHERE id_proyecto='$id'";
		$result = pg_query($sql) or die();
		$row = pg_fetch_array($result);
		$id_cadena=$row['id_cadena'];
		if($id_cadena!="")
		{
			$sqla = "SELECT * FROM e_cadena WHERE id_cadena='$id_cadena'";
			$resulta = pg_query($sqla) or die();
			$rowa = pg_fetch_array($resulta);
			return $rowa['cadena'];
		}
	}

function traerNombreEstado($id) {
	$sql = "SELECT * FROM e_estado WHERE id='$id'";
	$result = pg_query($sql) or die();
	$row = pg_fetch_array($result);
	return $row['texto'];
}

function traerNombreMunicipio($id) {
	$sql = "SELECT * FROM e_municipio WHERE id='$id'";
	$result = pg_query($sql) or die();
	$row = pg_fetch_array($result);
	return $row['texto'];
}

function traerNombreParroquia($id) {
	$sql = "SELECT * FROM e_parroquia WHERE id='$id'";
	$result = pg_query($sql) or die();
	$row = pg_fetch_array($result);
	return $row['texto'];
}

function traerNombrePerfil($id) {
	$sql = "SELECT * FROM e_perfil_usuario WHERE id_perfil='$id'";
	$result = pg_query($sql) or die();
	$row = pg_fetch_array($result);
	return $row['descripcion_perfil'];
}


function traerIdcomuna($id) {
	$sql = "SELECT id_org FROM v_org_comunitarias_sociales_vinculadas WHERE id_proyecto='$id' and id_tipo_org='2'";
	$result = pg_query($sql) or die();


while($row=pg_fetch_array($result)){
		$id_org_consejo[]=$row['id_org'];

}

	return $id_org_consejo;
}



function traerIdconsejo($id) {
	$sql = "SELECT id_org FROM v_org_comunitarias_sociales_vinculadas WHERE id_proyecto='$id' and id_tipo_org='1'";
	$result = pg_query($sql) or die();


while($row=pg_fetch_array($result)){
		$id_org_consejo[]=$row['id_org'];

}

	return $id_org_consejo;
}



function traerIdmovimiento($id) {
	$sql = "SELECT id_org FROM v_org_comunitarias_sociales_vinculadas WHERE id_proyecto='$id' and id_tipo_org='3'";
	$result = pg_query($sql) or die();


while($row=pg_fetch_array($result)){
		$id_org_consejo[]=$row['id_org'];

}

	return $id_org_consejo;
}



function traerIdArea($id) {


	
	$sql = "SELECT distinct id_area_cadena FROM v_tipo_actividad_economica WHERE id_proyecto='$id'";
	$result = pg_query($sql) or die();


while($row=pg_fetch_array($result)){
		$id_area_cadena[]=$row['id_area_cadena'];

}

	return $id_area_cadena;
}



function traerNombreArea($id) {


	
	$sql = "SELECT distinct id_area_cadena FROM v_tipo_actividad_economica WHERE id_proyecto='$id'";
	$result = pg_query($sql) or die();


while($row=pg_fetch_array($result)){
		$id_area_cadena=$row['id_area_cadena'];
	$sql_area = "SELECT * FROM e_area_cadena WHERE id_area='$id_area_cadena'";
	$result_area = pg_query($sql_area) or die();
	$row_area = pg_fetch_array($result_area);


	$arr_area[]=$row_area['area'];
}

	return $arr_area;
}

function traerNombreTipo_org($id) {

	$sql = "SELECT distinct  id_tipo_org FROM v_org_comunitarias_sociales_vinculadas WHERE id_proyecto='$id' order by id_tipo_org";
	$result = pg_query($sql) or die();


while($row=pg_fetch_array($result)){
	$id_tipo_org=$row['id_tipo_org'];

	$sql_tipo_org = "SELECT * FROM e_tipo_organizacion WHERE id_tipo_org='$id_tipo_org'";
	$result_tipo_org = pg_query($sql_tipo_org) or die();
	$row_tipo_org = pg_fetch_array($result_tipo_org);
	$arr_tipo_org[]=$row_tipo_org['tipo_org'];
}

	return $arr_tipo_org;
}

function traerNombreOrganizacionComuna($id) {
	$sql = "SELECT id_org FROM v_org_comunitarias_sociales_vinculadas WHERE id_proyecto='$id' ";
	$result = pg_query($sql) or die();


while($row=pg_fetch_array($result)){
		$id_org=$row['id_org'];
	$sql_org = "SELECT organizacion FROM e_organizacion WHERE id_org='$id_org'";
	$result_org = pg_query($sql_org) or die();
	$row_org = pg_fetch_array($result_org);
	$arr_org[]=$row_org['organizacion'];
}

	return $arr_org;
}

function traerNombreOrganizacionConsejo($id) {
	$sql = "SELECT id_org FROM v_org_comunitarias_sociales_vinculadas WHERE id_proyecto='$id' and id_tipo_org='1'";
	$result = pg_query($sql) or die();


while($row=pg_fetch_array($result)){
		$id_org=$row['id_org'];
	$sql_org = "SELECT organizacion FROM e_organizacion WHERE id_org='$id_org'";
	$result_org = pg_query($sql_org) or die();
	$row_org = pg_fetch_array($result_org);
	$arr_org[]=$row_org['organizacion'];
}

	return $arr_org;
}

function traerNombreOrganizacionMovimiento($id) {
	$sql = "SELECT id_org FROM v_org_comunitarias_sociales_vinculadas WHERE id_proyecto='$id' and id_tipo_org='3'";
	$result = pg_query($sql) or die();


while($row=pg_fetch_array($result)){
		$id_org=$row['id_org'];
	$sql_org = "SELECT organizacion FROM e_organizacion WHERE id_org='$id_org'";
	$result_org = pg_query($sql_org) or die();
	$row_org = pg_fetch_array($result_org);
	$arr_org[]=$row_org['organizacion'];
}

	return $arr_org;
}

function traerNombreFigura_juridica($id) {
	$sql = "SELECT * FROM e_figura_juridica WHERE id_figura='$id'";
	$result = pg_query($sql) or die();
	$row = pg_fetch_array($result);
	return $row['figura_juridica'];
}

function traerNombreEje_comunal($id) {
	$sql = "SELECT * FROM e_eje_parroquial WHERE id_eje='$id'";
	$result = pg_query($sql) or die();
	$row = pg_fetch_array($result);
	return $row['eje'];
}

function traerNombreCircuito($id) {
	$sql = "SELECT * FROM e_circuito WHERE id_circuito='$id'";
	$result = pg_query($sql) or die();
	$row = pg_fetch_array($result);
	return $row['circuito'];
}


function traerNombreUsuario($id) {
	$sql = "SELECT * FROM v_usuarios WHERE id_usuario='$id'";
	$result = pg_query($sql) or die();
	$row = pg_fetch_array($result);
	return $row['nombre_usuario'];
}


function traerFoto($id) {

$sql = "SELECT * FROM  v_fotos_proyecto WHERE id_proyecto='$id'";
	$result = pg_query($sql) or die();
	return $result;

}


function traerFinanciamiento($id) {
	$sql = "SELECT * FROM v_financiamiento WHERE id_proyecto='$id'";
	$result = pg_query($sql);
	echo $result;

$i=0;
while($row = pg_fetch_array($result)){
$i++;
$financiamiento[$i]['fin']=array('monto'=>$row['monto'],'estatus'=>$row['id_estatus_financiamiento'],'ente'=>$row['id_ente_financiamiento'],'monto_aprobado'=>$row['monto_aprobado'],'anio_financiamiento'=>$row['anio_financiamiento'],'monto_transferido'=>$row['monto_transferido'],'monto_pendiente'=>$row['monto_pendiente'],'tipo_financiamiento'=>$row['tipo_financiamiento']);
}
return $financiamiento;
echo $financiamiento;
}

function traerNombreEstatusFin($id) {
	$sql = "SELECT * FROM e_estatus_financiamiento WHERE id_estatus_financiamiento='$id'";
	$result = pg_query($sql) or die();
	$row = pg_fetch_array($result);
	return $row['estatus_financiamiento'];
}

function traerNombreEnteFin($id) {
	$sql = "SELECT * FROM e_ente_financiamiento WHERE id_ente='$id'";
	$result = pg_query($sql) or die();
	$row = pg_fetch_array($result);
	return $row['ente'];
}



function query_estatus() {
    	$sql_combo_estatus = "SELECT id_estatus_financiamiento,estatus_financiamiento FROM e_estatus_financiamiento where estatus_tabla='1'";
    	return $sql_combo_estatus;
	}


function query_ente() {
    	$sql_combo_ente = "SELECT id_ente,ente FROM e_ente_financiamiento where estatus_tabla='1'";
    	return $sql_combo_ente;
	}


function contar_financiamiento_adicional($id) {
	$sql = "SELECT * FROM v_financiamiento WHERE tipo_financiamiento='adicional' and id_proyecto='$id'";
	$result = pg_query($sql) or die();
	$num=pg_num_rows($result);
	return $num;
	
}





/*********************************************** SEGUIMIENTO ******************************************************************/

FUNCTION registrarGeneral($id_proyecto,$estado_actual, $problema_actual, $estrategia,$porcentaje){
	//REGISTRA EN LA TABLA v_general
	 $sql_v_taller='INSERT INTO v_general (id_proyecto,estado_actual, problema_actual,estrategia,porcentaje_avance)VALUES ('.$id_proyecto.', '.$estado_actual.'
			, '.$problema_actual.', '.$estrategia.','.$porcentaje.');';
	$result=pg_query($sql_v_taller) or die();

	return true;
}



function actualizarGeneral($id_proyecto,$estado_actual, $problema_actual, $estrategia,$porcentaje){
	//ACTUALIZA EN LA TABLA General
	$sql_registro='UPDATE v_general SET estado_actual='.$estado_actual.', problema_actual='.$problema_actual.', estrategia='.$estrategia.', 
	porcentaje_avance='.$porcentaje.' WHERE id_proyecto='.$id_proyecto.';';
	$result=pg_query($sql_registro) or die();

	return true;
}



FUNCTION registrarActividad($id_proyecto,$tarea,$fecha_inicio,$fecha_fin,$id_usuario,$fecha_registro,$id_usuario_registra,$id_estatus){
	//REGISTRA EN LA TABLA v_actividades
	 $sql_v_actividad='INSERT INTO v_actividades (id_proyecto,tarea,fecha_inicio,fecha_fin,id_usuario,fecha_registro,id_usuario_registra,id_estatus)VALUES ('.$id_proyecto.', '.$tarea.'
			, '.$fecha_inicio.', '.$fecha_fin.','.$id_usuario.','.$fecha_registro.','.$id_usuario_registra.','.$id_estatus.');';
	$result=pg_query($sql_v_actividad) or die();

	return true;
}


function actualizarActividad($id_actividad,$tarea,$fecha_inicio,$fecha_fin,$id_usuario,$fecha_registro,$id_usuario_registra){
	//ACTUALIZA EN LA TABLA v_actividades
	$sql_registro='UPDATE v_actividades SET tarea='.$tarea.', fecha_inicio='.$fecha_inicio.', fecha_fin='.$fecha_fin.', 
	id_usuario='.$id_usuario.', fecha_registro='.$fecha_registro.', id_usuario_registra='.$id_usuario_registra.' WHERE id_actividad='.$id_actividad.';';
	$result=pg_query($sql_registro) or die();

	return true;
}

function eliminarActividad($id_actividad,$id_usuario,$fecha_registro,$id_estatus,$id_usuario_registra,$estatus_tabla){
	//ACTUALIZA EN LA TABLA v_actividades
	$sql_registro='UPDATE v_actividades SET id_usuario='.$id_usuario.', fecha_registro='.$fecha_registro.',id_usuario_registra='.$id_usuario_registra.', 			id_estatus='.$id_estatus.', estatus_tabla='.$estatus_tabla.' WHERE id_actividad='.$id_actividad.';';
	$result=pg_query($sql_registro) or die();

	return true;
}


FUNCTION registrarAvance($id_actividad,$avance_actividad,$dificultad_actividad,$fecha_avance,$porcentaje_avance_actividad, $id_usuario, $id_estatus){
	//REGISTRA EN LA TABLA v_seguimiento_actividades
	 $sql_v_actividad='INSERT INTO v_seguimiento_actividades (id_actividad,avance_actividad,dificultad_actividad,fecha_avance,porcentaje_avance_actividad,id_usuario_registra,id_estatus)VALUES ('.$id_actividad.', '.$avance_actividad.', '.$dificultad_actividad.', '.$fecha_avance.','.$porcentaje_avance_actividad.' ,'.$id_usuario.','.$id_estatus.');';
	$result=pg_query($sql_v_actividad) or die();

	return true;
}


function actualizarAvance($id_seguimiento,$avance_actividad,$dificultad_actividad,$fecha_avance,$porcentaje_avance_actividad, $id_usuario, $id_estatus){
	//ACTUALIZA EN LA TABLA v_seguimiento_actividades
	$sql_registro='UPDATE v_seguimiento_actividades SET avance_actividad='.$avance_actividad.', dificultad_actividad='.$dificultad_actividad.', 
	fecha_avance='.$fecha_avance.', porcentaje_avance_actividad='.$porcentaje_avance_actividad.', id_usuario_registra='.$id_usuario.', id_estatus='.$id_estatus.' 
	WHERE id_seguimiento='.$id_seguimiento.';';
	$result=pg_query($sql_registro) or die();

	return true;
}

function eliminarAvance($id_seguimiento,$id_usuario,$estatus_tabla){
	//ACTUALIZA EN LA TABLA v_seguimiento_actividades
	$sql_registro='UPDATE v_seguimiento_actividades SET id_usuario_registra='.$id_usuario.',estatus_tabla='.$estatus_tabla.'
	  WHERE id_seguimiento='.$id_seguimiento.';';
	$result=pg_query($sql_registro) or die();

	return true;
}

function eliminarAvance2($id_actividad,$id_usuario,$estatus_tabla){
	//ACTUALIZA EN LA TABLA v_seguimiento_actividades
	$sql_registro='UPDATE v_seguimiento_actividades SET id_usuario_registra='.$id_usuario.',estatus_tabla='.$estatus_tabla.'
	  WHERE id_actividad='.$id_actividad.';';
	$result=pg_query($sql_registro) or die();

	return true;
}


function traerEstatus_general($id_proyecto) {
	$sql_datos = "SELECT *  FROM v_general WHERE id_proyecto='$id_proyecto'";
	$result_datos = pg_query($sql_datos) or die();
	//$row_datos = pg_fetch_array($result_datos);
	//$datos = $row_datos;
	return $result_datos;
	}

function traerLista_actividades($id_proyecto) {
	$sql_datos = "SELECT * from v_actividades where id_proyecto='$id_proyecto' and estatus_tabla='1' ORDER BY id_actividad DESC";
	$result_datos = pg_query($sql_datos) or die();
	//$row_datos = pg_fetch_array($result_datos);
	//$datos = $row_datos;
	return $result_datos;
	}

function traerLista_avances($id_actividad) {
	$sql_datos = "SELECT * from v_seguimiento_actividades where id_actividad='$id_actividad' and estatus_tabla='1' ORDER BY id_seguimiento DESC";
	$result_datos = pg_query($sql_datos) or die();
	//$row_datos = pg_fetch_array($result_datos);
	//$datos = $row_datos;
	return $result_datos;
	}

function traerDetalles_actividad($id_actividad) {
	$sql_datos = "SELECT *  FROM v_actividades 
	WHERE id_actividad='$id_actividad'";
	$result_datos = pg_query($sql_datos) or die();
	$row_datos = pg_fetch_array($result_datos);
	$datos = $row_datos;
	return $datos;
	}


function traerAvance($id_seguimiento) {
	$sql_datos = "SELECT *  FROM v_seguimiento_actividades 
	WHERE id_seguimiento='$id_seguimiento'";
	$result_datos = pg_query($sql_datos) or die();
	$row_datos = pg_fetch_array($result_datos);
	$datos = $row_datos;
	return $datos;
	}


function porcentaje_avance($id_actividad) {
	$sql = "select sum(porcentaje_avance_actividad) from v_seguimiento_actividades where id_actividad='$id_actividad' and estatus_tabla='1'";
	$result = pg_query($sql) or die();
	$row = pg_fetch_array($result);
	return $row[0];
}


function porcentaje_avance_proy($id_proyecto) {
	$sql = "select * from v_general where id_proyecto='$id_proyecto'";
	$result = pg_query($sql) or die();
	$row = pg_fetch_array($result);
	return $row;
}

/*****************************************************************************************************************/
/*****************************************************************************************************************//*****************************************************************************************************************//*****************************************************************************************************************//*****************************************************************************************************************/

	FUNCTION buscar_proyectos_sin_asignar(){
		$general=array();
		$f=0;
		// $sql='SELECT * FROM v_proyecto WHERE "id_proyecto" NOT IN ( SELECT "idProyecto" FROM v_responsables_proyectos) ORDER BY "id_proyecto"';
		$sql='SELECT * FROM v_proyecto WHERE "id_proyecto" = 1 ORDER BY "id_proyecto"';
		$proy=pg_query($sql) or die("Error Buscando Proyectos");
		while ($row_proy=pg_fetch_array($proy)){
			$general['id'][$f]= $row_proy['id_proyecto'];
			$general['np'][$f]= $row_proy['nombre_proyecto'];
			$general['dp'][$f]= $row_proy['descripcion_proyecto'];
			$f++;
		}
		return $general;
	}
	FUNCTION buscar_proyectos_asignados(){
		$general=array();
		$f=0;
		// $sql='SELECT * FROM v_proyecto WHERE "id_proyecto" IN (SELECT "idProyecto" FROM v_responsables_proyectos) ORDER BY "id_proyecto"';
		$sql = 'SELECT * FROM v_proyecto WHERE "id_proyecto" IN (SELECT id_proyecto FROM v_productores_nuevo) ORDER BY "id_proyecto"';
		$proy=pg_query($sql) or die("Error Buscando Proyectos");
		while ($row_proy=pg_fetch_array($proy)){
			$general['id'][$f]= $row_proy['id_proyecto'];
			$general['np'][$f]= $row_proy['nombre_proyecto'];
			$general['ep'][$f]= $row_proy['descripcion_proyecto'];
			$f++;
		}
		return $general;
	}
	FUNCTION buscar_proyectos_seguimiento(){
		$general=array();
		$f=0;
		$sql='SELECT * FROM v_proyecto ORDER BY "id_proyecto" desc';
		$proy=pg_query($sql) or die("Error Buscando Proyectos");
		while ($row_proy=pg_fetch_array($proy)){
			$general['id'][$f]= $row_proy['id_proyecto'];
			$general['np'][$f]= $row_proy['nombre_proyecto'];
			$general['ep'][$f]= $row_proy['descripcion_proyecto'];
			$f++;
		}
		return $general;
	}
	
	/* creada para perfil analista de proyecto*/
	/*luego quitada*/
	FUNCTION buscar_proyectos_seguimiento_analista($id_usuario){
		$general=array();
		$f=0;
		$sql='SELECT * FROM v_proyecto WHERE "id_proyecto" IN (SELECT "id_proyecto" FROM v_actividades where id_usuario='.$id_usuario.') ORDER BY "id_proyecto"';
		$proy=pg_query($sql) or die("Error Buscando Proyectos");
		while ($row_proy=pg_fetch_array($proy)){
			$general['id'][$f]= $row_proy['id_proyecto'];
			$general['np'][$f]= $row_proy['nombre_proyecto'];
			$general['ep'][$f]= $row_proy['descripcion_proyecto'];
			$f++;
		}
		return $general;
	}



	/********/ 


	FUNCTION buscar_responsables_proyecto($id){
		$responsables=array();
		$f=0;
		// $sql='SELECT "idProyecto", "idUsuario" FROM v_responsables_proyectos WHERE "idProyecto"='.$id;
		$sql='SELECT "idProyecto", "nombre_apellido" FROM v_productores WHERE "idProyecto"='.$id;
		$resp=pg_query($sql) or die("Error Buscando Proyectos");
		while ($row_resp=pg_fetch_array($resp)){
			$responsables['ip'][$f]= $row_resp['idProyecto'];
			$responsables['iu'][$f]= $row_resp['idUsuario'];
			$f++;
		}
		return $responsables;
	}
	FUNCTION nombres_responsables($id){
		$sql='SELECT nombre_usuario FROM v_usuarios WHERE id_usuario='.$id; //and id_perfil=2;';// quitar el and si se quieren varios responsables
		$r=pg_query($sql) or die("Error");
		$row=pg_fetch_array($r);
		$nomb_resp=$row[0].' '.$row[1];
		return $nomb_resp;
	}
	FUNCTION usuarios_por_asignar(){
		// $sql='SELECT id_usuario, nombre_usuario FROM v_usuarios where status_usuario=1 and id_perfil = 3;';
		$sql='SELECT id_productor, nombre_apellido FROM v_productores_nuevo WHERE id_proyecto = 1;';
		return $sql;
	}
	FUNCTION Productores_por_asignar(){
		$sql='';
		return $sql;
	}
	FUNCTION verificar_resp_proy($resp_proy, $id_proy){
		// $sql='SELECT "idRespproyecto" FROM v_responsables_proyectos WHERE "idUsuario" = '.$resp_proy.' AND "idProyecto"= '.$id_proy.';';
		$sql='SELECT id_productor from v_productores_nuevo where id_productor > 1;';
		$resp=pg_query($sql) or die("Error VERIFICANDO");
		$row=pg_fetch_array($resp);
		if(!empty($row[0])){ return $existe=1; }else{ return $existe=0; }
	}
	FUNCTION borrar_resp_old ($id_proyecto){
		$sql='DELETE FROM v_responsables_proyectos WHERE "idProyecto"='.$id_proyecto.';';
		$resp=pg_query($sql) or die("Error BORRANDO RESPONSABLES ANTERIORES");
		if(!empty($resp)){ return $exito=1; }else{ return $exito=0; }
	}
	FUNCTION asignar_responsable_proyecto($id_proy, $id_user){
		// $sql='INSERT INTO v_responsables_proyectos("idProyecto", "idUsuario", "fechaAsignacion", "usuarioAsigna")
		// 	VALUES ('.$id_proy.', '.$resp_proy.', '.'\''.$fecha.'\''.','.$id_user.');';
		$sql='UPDATE v_proyecto SET id_productor = '.$id_iuser.' where id_proyecto = '.$id_proy.';';
			echo $sql;
		$resp=pg_query($sql) or die("Error Registrando");
		return $exito=1;
	}
	FUNCTION buscar_proyectos_por_responsable($usuario){
		$proyectosResponsable=array();
		$f=0;
		$sql='SELECT * FROM v_proyecto WHERE "id_proyecto" IN (SELECT "idProyecto" FROM v_responsables_proyectos WHERE "idUsuario"='.$usuario.') ORDER BY "id_proyecto"';
		$proy=pg_query($sql) or die("Error Buscando Proyectos");
		while ($row_proy=pg_fetch_array($proy)){
			$proyectosResponsable['id'][$f]= $row_proy['id_proyecto'];
			$proyectosResponsable['np'][$f]= $row_proy['nombre_proyecto'];
			$proyectosResponsable['iu'][$f]= $row_proy['idUsuario'];
			$f++;
		}
		return $proyectosResponsable;
	}


/*SELECT * FROM v_proyecto WHERE "id_proyecto" IN (SELECT "idProyecto" FROM v_responsables_proyectos WHERE "idUsuario"='1' and "idProyecto"='9') ORDER BY "id_proyecto"*/

	function verificar_responsable($id_usuario,$id_proyecto){

	$sql='SELECT * FROM v_proyecto WHERE "id_proyecto" IN (SELECT "idProyecto" FROM v_responsables_proyectos WHERE "idUsuario"='.$id_usuario.' and "idProyecto"='.$id_proyecto.') ORDER BY "id_proyecto"';
	$result=pg_query($sql);
	//$row=pg_fetch_array($result);
	return $result;
 	}



	function buscar_nombre_proyecto($proyecto){
		$sql='SELECT "nombre_proyecto" FROM v_proyecto WHERE "id_proyecto" ='.$proyecto.';';
		$proy=pg_query($sql) or die("Error Buscando Proyectos");
		$row_proy=pg_fetch_array($proy);
		return $row_proy[0];
	}
	/*----------------------------------------------- FUNCIONES EXISTENTES SISTEMA VIEJO -------------------------------------------------*/
	function buscar_proveedores_proyecto (){
	$proveedores=array();
	$i=0;

	$sql_proveedores_proyecto = 'SELECT * FROM v_proveedores WHERE "estatusProveedor"= 1 ORDER BY "idProveedor"';
	$resul_proveedores_proyecto=pg_query($sql_proveedores_proyecto) or die();
		while ($row_prov=pg_fetch_array($resul_proveedores_proyecto)){
			$proveedores['id_prov'][$i] = $row_prov['id_proveedor'];
			$proveedores['rif_prov'][$i] = $row_prov['rif_proveedor'];
			$proveedores['nomb_prov'][$i] = $row_prov['nomb_proveedo'];
			$proveedores['telefono'][$i] = $row_prov['telef_principal'];
			$i++;
		}
		return $proveedores;
	}
	function query_combo_sector(){
		$sql_combo = "SELECT * FROM e_sector where estatus=1 order by sector ASC";
		return $sql_combo;
	}

	//***************************************************************************************************************************************
	//***************************************************** ELABORACION DE PROYECTOS ********************************************************
	//***************************************************************************************************************************************
	//***************************************************************************************************************************************
	//************************************************************ CAPITULO I ***************************************************************
	//***************************************************************************************************************************************
	FUNCTION buscarSociosProyecto($idProyecto){
		$socios=array();
		$i=0;
		$sql='SELECT "idSocio", "idProyecto", "nombApeSocio", "telefonoSocio", "emailSocio", estatus
  			FROM "v_socios_unidad_producccion_capituloI" WHERE "idProyecto"= '.$idProyecto.';';
			$resulSocios=pg_query($sql) or die();
		while ($row_prov=pg_fetch_array($resulSocios)){
			$socios['idSocio'][$i] = $row_prov['idSocio'];
			$socios['idProyecto'][$i] = $row_prov['idProyecto'];
			$socios['nombApeSocio'][$i] = $row_prov['nombApeSocio'];
			$socios['telefonoSocio'][$i] = $row_prov['telefonoSocio'];
			$socios['emailSocio'][$i] = $row_prov['emailSocio'];
			$i++;
		}
		return $socios;
	}
	FUNCTION eliminarSocioProyecto($idProyecto, $idSocio){
		$sql='DELETE FROM "v_socios_unidad_producccion_capituloI" WHERE "idSocio" = '.$idSocio.' AND "idProyecto" = '.$idProyecto.';';
		$resulElimSocios=pg_query($sql) or die();
		return $exito = 1;
	}
	FUNCTION buscarSocioProyecto($idProyecto, $idSocio){
		$sql='SELECT "nombApeSocio", "telefonoSocio", "emailSocio" FROM "v_socios_unidad_producccion_capituloI" WHERE "idSocio" = '.$idSocio.' AND "idProyecto" = '.$idProyecto.';';
		$resulBuscarSocios=pg_query($sql) or die();
		$rowSocio=pg_fetch_array($resulBuscarSocios);
		return $rowSocio;
	}
	FUNCTION modificarSocioProyecto($nombApeSocio, $telefonoSocio, $emailSocio, $idProyecto, $idSocio){
		$sql='UPDATE "v_socios_unidad_producccion_capituloI"
			SET  "nombApeSocio"='.$nombApeSocio.', "telefonoSocio"='.$telefonoSocio.', "emailSocio"='.$emailSocio.'
			WHERE "idSocio"='.$idSocio.' AND "idProyecto"='.$idProyecto.';';
		$resulModificarSocios=pg_query($sql) or die();
		return $exito=1;
	}
	FUNCTION registrarCapituloI(
			$idProyecto, $nombRazonSocial, $cedulaRif, $domicilioLegal, $direccionSolicitante, $actividadSolicitante,
			$telefonoSolicitante, $emailSolicitante, $usuarioRegistra, $fechaRegistro, $idCapituloI){
		$sql_capitulo_I='INSERT INTO "v_capitulo_I"("idProyecto", "nombRazonSocial", "cedulaRif", "domicilioLegalSolicitante", 
			"direccionSolicitante", "actividadSolicitante", "telefonoSolicitante", "emailSolicitante", "usuarioRegistra", "fechaRegistro")
			VALUES ('.$idProyecto.', '.$nombRazonSocial.', '.$cedulaRif.', '.$domicilioLegal.', '.$direccionSolicitante.',
			'.$actividadSolicitante.', '.$telefonoSolicitante.', '.$emailSolicitante.', '.$usuarioRegistra.', '.$fechaRegistro.');';
		$rs_capitulo_I=pg_query($sql_capitulo_I) or die("Error Registrando Nuevo - Capitulo I");
		return $exito=1;
	}
	FUNCTION registrarSociosProyecto($experienciasLaborales, $idProyecto){
		foreach($experienciasLaborales as $index => $value){
			$ql_socios_produccion = 'INSERT INTO "v_socios_unidad_producccion_capituloI" ("idProyecto", 
				"nombApeSocio", "telefonoSocio", "emailSocio") VALUES ('.$idProyecto.',
				\''.$value['experienciaLaboralNomEmpresa'].'\', \''.$value['experienciaLaboralRamo'].'\',
				\''.$value['experienciaLaboralCargo'].'\')';
			$rs_socios_produccion=pg_query($ql_socios_produccion) or die("Error Registrando Nuevo Socios - Capitulo I");
		}
		return $exito=1;
	}
	//***************************************************************************************************************************************
	//************************************************************ CAPITULO II **************************************************************
	//***************************************************************************************************************************************
	FUNCTION registrarCapituloII(
		$idProyecto, $nombreProySC, $estado, $municipio, $parroquia, $comunidadSC, $tipoProyecSC, $aporteSC,$cadenaProdSC,
		$nombreProdSC, $planNaciSBsc, $planDesaCoSC, $planMuniDesaSC, $planEstaDesaSC, $inteDisDesaSC, $resHisCoSC, $idProPoSC,
		$diagSiAcSC, $imporImpacProSC, $diLimiProSC, $usuarioRegistra, $fechaRegistro, $datosResponsablesCapituloII){
		/* REGISTRAR CAPITULO II */
		$sql_capitulo_II='INSERT INTO "v_capitulo_II"(
			"idProyecto", "nombProyecto", "idEstado", "idMunicipio", "idParroquia", "comunidad",
			"tipoProyecto", "aporteSolicitado", "cadenaProductiva", "nombProduPrincipal", "planNacionalSB", "planDesaComunidad", 
			"planMuniDesa",	"planEstatalDesa", "integraDistDesa", "resenaHistoComu", "identiProblema", "diagnosSitu", "importanciaProyec", 
			"dificultLimita", "usuarioRegistra", "fechaRegistro") VALUES (
			'.$idProyecto.', '.$nombreProySC.', '.$estado.', '.$municipio.',
			'.$parroquia.', '.$comunidadSC.', '.$tipoProyecSC.', '.$aporteSC.', '.$cadenaProdSC.', '.$nombreProdSC.',
			'.$planNaciSBsc.', '.$planDesaCoSC.', '.$planMuniDesaSC.', '.$planEstaDesaSC.', '.$inteDisDesaSC.', '.$resHisCoSC.',
			'.$idProPoSC.', '.$diagSiAcSC.', '.$imporImpacProSC.', '.$diLimiProSC.', '.$usuarioRegistra.', '.$fechaRegistro.');';
		$rs_capitulo_II=pg_query($sql_capitulo_II) or die("Error Registrando Nuevo - Capitulo II");
		return $exito=1;
	}
	FUNCTION registrarResponsablesComunitariosProy($datosResponsablesCapituloII, $idProyecto){
		/* FOREACH PARA RESGISTRAR RESPONSABLES COMUNIDAD */
		foreach($datosResponsablesCapituloII as $datosRespon => $valorDatosRespon){
			$ql_datos_respon = 'INSERT INTO "v_datos_responsable_capituloII"(
				"idProyecto", "nombApeRespon", "cedulaRespon", "direccionRespon", "teleRespon", "responsabilidad", "experiencia")
				VALUES ('.$idProyecto.', \''.$valorDatosRespon['asignaResponsablesNombresApe'].'\',
				'.$valorDatosRespon['asignaResponsablesCedula'].', \''.$valorDatosRespon['asignaResponsablesDireccion'].'\',
				\''.$valorDatosRespon['asignaResponsablesTelefono'].'\',
				\''.$valorDatosRespon['asignaResponsablesResponsabilidad'].'\',
				\''.$valorDatosRespon['asignaResponsablesExperiencia'].'\')';
			$rs_datos_respon=pg_query($ql_datos_respon) or die("Error Registrando Datos Responsables - Capitulo II");
		}
		return $exito=1;
	}
	FUNCTION buscarResponsablesComProyecto ($idProyecto){
		$responsablesCom=array();
		$i=0;
		$sql='SELECT "idResponsable", "idProyecto", "nombApeRespon", "cedulaRespon", "direccionRespon",
				"teleRespon", responsabilidad, experiencia, estatus  FROM "v_datos_responsable_capituloII"
				WHERE "idProyecto" = '.$idProyecto.';';
		$resulResp=pg_query($sql) or die();
		while ($row_resp=pg_fetch_array($resulResp)){
			$responsablesCom['idResponsable'][$i] = $row_resp['idResponsable'];
			$responsablesCom['idProyecto'][$i] = $row_resp['idProyecto'];
			$responsablesCom['nombApeRespon'][$i] = $row_resp['nombApeRespon'];
			$responsablesCom['cedulaRespon'][$i] = $row_resp['cedulaRespon'];
			$responsablesCom['direccionRespon'][$i] = $row_resp['direccionRespon'];
			$responsablesCom['teleRespon'][$i] = $row_resp['teleRespon'];
			$responsablesCom['responsabilidad'][$i] = $row_resp['responsabilidad'];
			$responsablesCom['experiencia'][$i] = $row_resp['experiencia'];
			$i++;
		}
		return $responsablesCom;
	}
	FUNCTION eliminarRespComProyecto($idProyecto, $idResponsable){
		$sql='DELETE FROM "v_datos_responsable_capituloII" WHERE "idProyecto" = '.$idProyecto.' AND "idResponsable" = '.$idResponsable.';';
		$resulElimResp=pg_query($sql) or die();
		return $exito = 1;
	}
	FUNCTION buscarRespComProyecto($idProyecto, $idResponsable){
		$sql='SELECT "idResponsable", "idProyecto", "nombApeRespon", "cedulaRespon", "direccionRespon",
			"teleRespon", responsabilidad, experiencia, estatus  FROM "v_datos_responsable_capituloII" 
			WHERE "idProyecto" = '.$idProyecto.' AND "idResponsable"='.$idResponsable.';';
		$resulBuscarResp=pg_query($sql) or die();
		$rowResp=pg_fetch_array($resulBuscarResp);
		return $rowResp;
	}
	FUNCTION modificarResponsableproyecto( $nombApeResp, $cedulaResp, $direccionResp, $idProyecto, $idResponsable, $telefonoResp, $respresponsable, $expResponsable ){
		$sql='UPDATE "v_datos_responsable_capituloII"
			SET "nombApeRespon"='.$nombApeResp.', "cedulaRespon"='.$cedulaResp.', "direccionRespon"='.$direccionResp.',
			    "teleRespon"='.$telefonoResp.', responsabilidad='.$respresponsable.', experiencia='.$expResponsable.'
			WHERE "idResponsable"='.$idResponsable.' AND "idProyecto"='.$idProyecto.';';
		$resulModificarSResp=pg_query($sql) or die();
		return $exito=1;
	}
	//***************************************************************************************************************************************
	//************************************************************ CAPITULO III *************************************************************
	//***************************************************************************************************************************************
	FUNCTION registrarCapituloXIII($costoMaqEquipos, $capitalTrabajo, $gastosvariables, $aporteComunitario,
					$idProyecto, $inversionInicial, $usuarioRegistra, $fechaRegistro){
		$sql='INSERT INTO "v_capitulo_XIII"(
				"idProyecto", "costoMaquinarias", "capitalTrabajo", "gastosVariables", "aportesComunitarios",
				"inversionInicial", "usuarioRegistra", "fechaRegistro")
			VALUES (
				'.$idProyecto.', '.$costoMaqEquipos.', '.$capitalTrabajo.',
				'.$gastosvariables.', '.$aporteComunitario.', '.$inversionInicial.',
				'.$usuarioRegistra.', '.$fechaRegistro.');';
		$result=pg_query($sql) or die("Error Registrando Nuevo - Capitulo XIII");
		return $exito=1;
	}
	//***************************************************************************************************************************************
	//************************************************************ CAPITULO IV **************************************************************
	//***************************************************************************************************************************************
?>
