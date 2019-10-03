<?php
	session_start();
	include_once ("../../../../funciones/funciones_session.php");
	comprobarSession($_SESSION['adminProy']);
	include_once ("../../../../conexion/conexionpg.php");
	include_once ("../../../../funciones/queryProyectos.php");
	include_once ("../../../../funciones/funciones.php");
	extract($_POST);
	extract($_GET);

?>
<HTML>
	<HEAD>
		<TITLE>CAPITULO I</TITLE>
		<link rel="stylesheet" type="text/css" href="../../../../css/css.css">
		<link rel="stylesheet" type="text/css" href="../../../../js/accordeon/accordion.css">
		<script src="../../../../js/general.js" type="text/javascript"></script>
		<script src="../../../../js/accordeon/jquery.js" type="text/javascript"></script>
		<script src="../../../../js/accordeon/jquery-ui.js" type="text/javascript"></script>
		<script src="../../../../js/accordeon/cory-accordion-noConflict.js" type="text/javascript"></script>
		<link rel="stylesheet" href="../../../../clases/chosen/chosen.css" />
		<script type="text/javascript" src='../../../../clases/jquery/jquery-1.5.1.min.js'></script>
	</HEAD>
	<BODY>
		<TABLE id="tablaTitulo" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
			<TR><TD class="subtituloBackground"> ESTUDIO DE VIABILIDAD Y FACTIBILIDAD </TD></TR>
		</TABLE>
		<BR>
		<FORM action="" id="formRegCuartoCap" name="formRegCuartoCap" method="POST" onsubmit="">
		<TABLE id="tablaCuartoCapitulo" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
		<TR>
			<TD>
			<div id="accordion">
				<div class="section">
					<h2>DESCRIPCION GENERAL DE LA PRODUCCION</h2>
					<div class="section-content">
					<TABLE  border="0" cellpadding="2" cellspacing="2" align="center" width="100%">
						<TR><TD class="tituloTablas">Descripcion del Producto Principal</TD></TR>
						<TR><TD align="center"><TEXTAREA name="" id="" rows="6" cols="153"><??></TEXTAREA></TD></TR>
						<TR>
							<TD>
							<TABLE  border="0" cellpadding="2" cellspacing="1" align="center" width="95%" bgcolor="#D6D6D6">
								<TR><TD class="tituloTablas" align="center" colspan="4" bgcolor="#F2F2F2">AGREGAR PRODUCTOS/SERVICIOS PRINCIPALES</TD></TR>
								<TR>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30%">Producto/Servicio</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30%">Insumos</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30%">Descripci&oacute;n</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="10%">Acci&oacute;n</TD>
								</TR>
								<TR>
									<TD align="center" bgcolor="White"><TEXTAREA onkeyup="this.value = this.value.toUpperCase();" name="prodServ" id="prodServ" rows="1" cols="30"></TEXTAREA></TD>
									<TD align="center" bgcolor="White"><TEXTAREA onkeyup="this.value = this.value.toUpperCase();" name="InsuProdServ" id="InsuProdServ" rows="1" cols="30"></TEXTAREA></TD>
									<TD align="center" bgcolor="White"><TEXTAREA onkeyup="this.value = this.value.toUpperCase();" name="descProdServ" id="descProdServ" rows="1" cols="30"></TEXTAREA></TD>
									<TD align="center" bgcolor="White"><IMG id="agregar" onclick="validarProducto('prodServ','InsuProdServ','descProdServ','tablaProductos')" src="../../../../imagenes/add.png" title="Agregar"></TD>
								</TR>
							</TABLE>
							</TD>
						</TR>
						<TR>
							<TD>
							<TABLE  border="0" cellpadding="2" cellspacing="1" align="center" width="95%" bgcolor="#D6D6D6" id="tablaProductos">
							<TR><TD class="tituloTablas" align="center" colspan="6" bgcolor="#F2F2F2">CUADRO DESCRIPTIVO DE PRODUCTOS/SERVICIOS PRINCIPALES</TD></TR>
							</TABLE>
							</TD>
						</TR>
						<TR><TD class="tituloTablas">Descripcion de los SubProductos</TD></TR>
						<TR><TD align="center"><TEXTAREA name="" id="" rows="6" cols="153"><??></TEXTAREA></TD></TR>
						<TR>
							<TD>
							<TABLE  border="0" cellpadding="2" cellspacing="1" align="center" width="95%" bgcolor="#D6D6D6">
								<TR><TD class="tituloTablas" align="center" colspan="4" bgcolor="#F2F2F2">AGREGAR SUBPRODUCTOS</TD></TR>
								<TR>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30%">SubProducto</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30%">Descripci&oacute;n</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="10%">Acci&oacute;n</TD>
								</TR>
								<TR>
									<TD align="center" bgcolor="White"><TEXTAREA onkeyup="this.value = this.value.toUpperCase();" name="subProdServ" id="subProdServ" rows="1" cols="30"></TEXTAREA></TD>
									<TD align="center" bgcolor="White"><TEXTAREA onkeyup="this.value = this.value.toUpperCase();" name="descSubProdServ" id="descSubProdServ" rows="1" cols="30"></TEXTAREA></TD>
									<TD align="center" bgcolor="White"><IMG id="agregar" onclick="validarSubProducto('subProdServ','descSubProdServ','tablaSubProductos')" src="../../../../imagenes/add.png" title="Agregar"></TD>
								</TR>
							</TABLE>
							</TD>
						</TR>
						<TR>
							<TD>
							<TABLE  border="0" cellpadding="2" cellspacing="1" align="center" width="95%" bgcolor="#D6D6D6" id="tablaSubProductos">
							<TR><TD class="tituloTablas" align="center" colspan="4" bgcolor="#F2F2F2">CUADRO DESCRIPTIVO DE SUBPRODUCTOS</TD></TR>
							</TABLE>
							</TD>
						</TR>
						<TR><TD class="tituloTablas">Descripcion de los Productos Complementarios</TD></TR>
						<TR><TD align="center"><TEXTAREA name="" id="" rows="6" cols="153"><??></TEXTAREA></TD></TR>
						<TR>
							<TD>
							<TABLE  border="0" cellpadding="2" cellspacing="1" align="center" width="95%" bgcolor="#D6D6D6">
								<TR><TD class="tituloTablas" align="center" colspan="4" bgcolor="#F2F2F2">AGREGAR PRODUCTOS COMPLEMENTARIOS</TD></TR>
								<TR>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30%">Producto Complementario</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30%">Descripci&oacute;n</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="10%">Acci&oacute;n</TD>
								</TR>
								<TR>
									<TD align="center" bgcolor="White"><TEXTAREA onkeyup="this.value = this.value.toUpperCase();" name="ProdComp" id="ProdComp" rows="1" cols="30"></TEXTAREA></TD>
									<TD align="center" bgcolor="White"><TEXTAREA onkeyup="this.value = this.value.toUpperCase();" name="descProdComp" id="descProdComp" rows="1" cols="30"></TEXTAREA></TD>
									<TD align="center" bgcolor="White"><IMG id="agregar" onclick="validarProductoComp('ProdComp','descProdComp','tablaProductosComp')" src="../../../../imagenes/add.png" title="Agregar"></TD>
								</TR>
							</TABLE>
							</TD>
						</TR>
						<TR>
							<TD>
							<TABLE  border="0" cellpadding="2" cellspacing="1" align="center" width="95%" bgcolor="#D6D6D6" id="tablaProductosComp">
							<TR><TD class="tituloTablas" align="center" colspan="4" bgcolor="#F2F2F2">CUADRO DESCRIPTIVO DE PRODUCTOS COMPLEMENTARIOS</TD></TR>
							</TABLE>
							</TD>
						</TR>
					</TABLE>
					</div>
				</div>
				<div class="section">
					<h2>MATERIA PRIMA E INSUMOS Y POSIBLES PROVEEDORES</h2>
					<div class="section-content">
					<TABLE  border="0" cellpadding="2" cellspacing="2" align="center" width="100%">
						<TR><TD class="tituloTablas">Descripci&oacute;n de la Materia Prima y los Insumos</TD></TR>
						<TR><TD align="center"><TEXTAREA name="" id="" rows="6" cols="153"><??></TEXTAREA></TD></TR>
						<TR><TD class="tituloTablas">Proveedores</TD></TR>
						<TR><TD align="center"><TEXTAREA name="" id="" rows="6" cols="153"><??></TEXTAREA></TD></TR>
						<TR>
							<TD>
							<TABLE  border="0" cellpadding="2" cellspacing="1" align="center" width="95%" bgcolor="#D6D6D6">
								<TR><TD class="tituloTablas" align="center" colspan="4" bgcolor="#F2F2F2">AGREGAR PROVEEDORES</TD></TR>
								<TR>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30%">Nombre del Proveedor</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30%">Localizacion</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30%">Informacion</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="10%">Acci&oacute;n</TD>
								</TR>
								<TR>
									<TD align="center" bgcolor="White"><TEXTAREA onkeyup="this.value = this.value.toUpperCase();" name="NombProveedor" id="NombProveedor" rows="1" cols="30"></TEXTAREA></TD>
									<TD align="center" bgcolor="White">
										<SELECT name="ubicacion" id="ubicacion" data-placeholder="Seleccione Ubicacion..." class="chzn-select" style="width:224px;" tabindex="2">
											<OPTION></OPTION><OPTION value="1">Nacional</OPTION><OPTION value="2">Internacional</OPTION>
										</SELECT>
									</TD>
									<TD align="center" bgcolor="White"><TEXTAREA onkeyup="this.value = this.value.toUpperCase();" name="informacion" id="informacion" rows="1" cols="30"></TEXTAREA></TD>
									<TD align="center" bgcolor="White"><IMG id="agregar" onclick="validarProveedores('NombProveedor','ubicacion','informacion','tablaProveedores')" src="../../../../imagenes/add.png" title="Agregar"></TD>
								</TR>
							</TABLE>
							</TD>
						</TR>
						<TR>
							<TD>
							<TABLE  border="0" cellpadding="2" cellspacing="1" align="center" width="95%" bgcolor="#D6D6D6" id="tablaProveedores">
							<TR><TD class="tituloTablas" align="center" colspan="4" bgcolor="#F2F2F2">POSIBLES PROVEEDORES NACIONALES E INTERNACIONALES</TD></TR>
							</TABLE>
							</TD>
						</TR>
					</TABLE>
					</div>
				</div>
				<div class="section">
					<h2>NECESIDAD DEL PRODUCTO</h2>
					<div class="section-content">
					<TABLE  border="0" cellpadding="2" cellspacing="2" align="center" width="95%">
						<TR><TD class="tituloTablas">C&aacute;lculo de la Necesidad del Producto</TD></TR>
						<TR><TD align="center"><TEXTAREA name="" id="" rows="6" cols="154"><??></TEXTAREA></TD></TR>
						<TR>
							<TD><BR>
							<TABLE border="0" cellpadding="2" cellspacing="1" align="center" width="100%" bgcolor="#D6D6D6">
								<TR><TD class="tituloTablas" align="center" colspan="7" bgcolor="#F2F2F2">NECESIDAD DEL PRODUCTO</TD></TR>
								<TR>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30">Producto</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="15%">Benef. Potenciales (1)</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="20%">Cant. de Producto, Bienes o Servicios Necesitados (2)</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="20%">Necesidad Cuantificada (1*2=3)</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="15%">Tiempo(4)</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="15%">Total (3*4)</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="10%">Acci&oacute;n</TD>
								</TR>
								<TR>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30"><TEXTAREA onkeyup="this.value = this.value.toUpperCase();" name="ProductNece" id="ProductNece" rows="1" cols="25"></TEXTAREA></TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="15%"><INPUT type="text" name="prod_0" id="prod_0" value="" size="15"></TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="20%"><INPUT type="text" name="prod_1" id="prod_1" value="" size="15"></TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="20%"><INPUT type="text" name="prod_2" id="prod_2" value="" size="15"></TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="20%"><INPUT type="text" name="prod_3" id="prod_3" value="" size="15"></TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="15%"><INPUT type="text" name="totalNec" id="totalNec" value="" size="15"></TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="10%"><IMG id="agregar" onclick="validarNecesidadProducto('ProductNece','benefPot','cantProd','neceCuant','tiempo','totalNec','tablaNecesidad')" src="../../../../imagenes/add.png" title="Agregar"></TD>
								</TR>
							</TABLE>
							</TD>
						</TR>
						<TR>
							<TD><BR>
							<TABLE  border="0" cellpadding="2" cellspacing="1" align="center" width="100%" bgcolor="#D6D6D6" id="tablaNecesidad">
							<TR><TD class="tituloTablas" align="center" colspan="7" bgcolor="#F2F2F2">CUADRO DE CALCULO DE LA NECESIDAD DEL PRODUCTO</TD></TR>
							</TABLE>
							</TD>
						</TR>
					</TABLE>
					</div>
				</div>
				<div class="section">
					<h2>DISTRIBUCI&Oacute;N GEOGR&Aacute;FICA DE LOS BANEFICIARIOS POTENCIALES</h2>
					<div class="section-content">
					<TABLE  border="0" cellpadding="2" cellspacing="2" align="center" width="95%">
						<TR><TD class="tituloTablas">Descripci&oacute;n de la Distribuci&oacute;n Geogr&aacute;fica de los Beneficiarios Potenciales</TD></TR>
						<TR><TD><TEXTAREA name="" id="" rows="6" cols="154"><??></TEXTAREA></TD></TR>
						<TR>
							<TD><BR>
							<TABLE  border="0" cellpadding="2" cellspacing="1" align="center" width="100%" bgcolor="#D6D6D6">
								<TR><TD class="tituloTablas" align="center" colspan="6" bgcolor="#F2F2F2">DISTRIBUCION GEOGRAFICA DE LOS BENEFICIARIOS</TD></TR>
								<TR>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30%">Comunal</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30%">Parroquial</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30%">Municipal</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="10%">Estadal</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30%">Nacional</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="10%">Internacional</TD>
								</TR>
								<TR>
									<TD align="center" bgcolor="White"><INPUT type="checkbox" name="" id="" value=""></TD>
									<TD align="center" bgcolor="White"><INPUT type="checkbox" name="" id="" value=""></TD>
									<TD align="center" bgcolor="White"><INPUT type="checkbox" name="" id="" value=""></TD>
									<TD align="center" bgcolor="White"><INPUT type="checkbox" name="" id="" value=""></TD>
									<TD align="center" bgcolor="White"><INPUT type="checkbox" name="" id="" value=""></TD>
									<TD align="center" bgcolor="White"><INPUT type="checkbox" name="" id="" value=""></TD>
								</TR>
							</TABLE>
							</TD>
						</TR>
					</TABLE>
					</div>
				</div>
				<div class="section">
					<h2>CANTIDAD DE COMPETIDORES Y EXISTENCIA ACTUAL DEL PRODUCTO EN EL ENTORNO</h2>
					<div class="section-content">
					<TABLE  border="0" cellpadding="2" cellspacing="2" align="center" width="95%">
						<TR><TD class="tituloTablas">Descripci&oacute;n de la Cantidad de Competidores y Existencia Actual del Producto</TD></TR>
						<TR><TD align="center"><TEXTAREA name="" id="" rows="6" cols="154"><??></TEXTAREA></TD></TR>
						<TR>
							<TD><BR>
							<TABLE border="0" cellpadding="2" cellspacing="1" align="center" width="100%" bgcolor="#D6D6D6">
								<TR><TD class="tituloTablas" align="center" colspan="8" bgcolor="#F2F2F2">ESTUDIO DE MERCADO</TD></TR>
								<TR>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30%">Productores Cercanos</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="15%">Productos que Ofrecen</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="20%">Estimado Clientes (1)</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="20%">Cantidades Adquiridas Clientes (2)</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="15%">Producci&oacute;n Entregada (1*2)</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="15%">Localizacion</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="15%">Precios</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="10%">Acci&oacute;n</TD>
								</TR>
								<TR>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30%"></TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="15%"></TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="20%"></TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="20%"></TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="20%"></TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="15%"></TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="15%"></TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="10%"><IMG id="agregar" onclick="validarEstudioMercado('','','','','','','','tablaEstudioMercado')" src="../../../../imagenes/add.png" title="Agregar"></TD>
								</TR>
							</TABLE>
							</TD>
						</TR>
					</TABLE>
					</div>
				</div>
				<div class="section">
					<h2>COLOCACI&Oacute;N</h2>
					<div class="section-content">
					<TABLE  border="0" cellpadding="2" cellspacing="2" align="center" width="90%">
						<TR><TD class="tituloTablas">Descripci&oacute;n del Proceso de Colocaci&oacute;n del Producto</TD></TR>
						<TR><TD><TEXTAREA name="" id="" rows="8" cols="153"><??></TEXTAREA></TD></TR>
						<TR>
							<TD><BR>
							<TABLE border="0" cellpadding="2" cellspacing="1" align="center" width="100%" bgcolor="#D6D6D6">
								<TR><TD class="tituloTablas" align="center" colspan="8" bgcolor="#F2F2F2">CUADRO DESCRIPTIVO DE COLOCACION Y DISTRIBUCION DEL PRODUCTO</TD></TR>
								<TR>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30%"> </TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="15%"> BENEFICIARIO </TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="20%"> MINORISTA </TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="20%"> MAYORISTA </TD>
								</TR>
								<TR>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30%">COLOCACION</TD>
									<TD class="tituloTablas" align="center" bgcolor="White" width="15%"><INPUT type="checkbox" name="" id="" value=""></TD>
									<TD class="tituloTablas" align="center" bgcolor="White" width="20%"><INPUT type="checkbox" name="" id="" value=""></TD>
									<TD class="tituloTablas" align="center" bgcolor="White" width="20%"><INPUT type="checkbox" name="" id="" value=""></TD>
								</TR>
								<TR>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30%">DISTIBUCION COMERCIAL</TD>
									<TD class="tituloTablas" align="center" bgcolor="White" width="15%"><INPUT type="checkbox" name="" id="" value=""></TD>
									<TD class="tituloTablas" align="center" bgcolor="White" width="20%"><INPUT type="checkbox" name="" id="" value=""></TD>
									<TD class="tituloTablas" align="center" bgcolor="White" width="20%"><INPUT type="checkbox" name="" id="" value=""></TD>
								</TR>
								<TR>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30%"></TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="15%">CREDITO</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="20%">CONTADO</TD>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="20%">TRUEQUE</TD>
								</TR>
								<TR>
									<TD class="tituloTablas" align="center" bgcolor="#F2F2F2" width="30%">CONDICIONES DE INTERCAMBIO</TD>
									<TD class="tituloTablas" align="center" bgcolor="White" width="15%"><INPUT type="checkbox" name="" id="" value=""></TD>
									<TD class="tituloTablas" align="center" bgcolor="White" width="20%"><INPUT type="checkbox" name="" id="" value=""></TD>
									<TD class="tituloTablas" align="center" bgcolor="White" width="20%"><INPUT type="checkbox" name="" id="" value=""></TD>
								</TR>
							</TABLE>
							</TD>
						</TR>
					</TABLE>
					</div>
				</div>
				<div class="section">
					<h2>CONDICIONES DE VENTA O INTERCAMBIO</h2>
					<div class="section-content">
					<TABLE  border="0" cellpadding="2" cellspacing="2" align="center" width="90%">
						<TR><TD class="tituloTablas">Descripci&oacute;n de las Condiciones de Venta o Intercambio del Producto</TD></TR>
						<TR><TD><TEXTAREA name="" id="" rows="8" cols="153"><??></TEXTAREA></TD></TR>
					</TABLE>
					</div>
				</div>
				<div class="section">
					<h2>DISTRIBUCI&Oacute;N COMERCIAL</h2>
					<div class="section-content">
					<TABLE  border="0" cellpadding="2" cellspacing="2" align="center" width="90%">
						<TR><TD class="tituloTablas">Descripci&oacute;n de la Distribuci&oacute;n Comercial</TD></TR>
						<TR><TD><TEXTAREA name="" id="" rows="8" cols="153"><??></TEXTAREA></TD></TR>
					</TABLE>
					</div>
				</div>
			</div>
			</TD>
		</TR>
		</TABLE>
		</FORM>
		<script src="../../../../clases/chosen/chosen.jquery.js" type="text/javascript"></script>
		<script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
	</BODY>
</HTML>