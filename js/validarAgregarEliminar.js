/****************************************************************************************************************************************/
/************************************************  FUNCION PARA VALIDAR ITEMS ***********************************************************/
/****************************************************************************************************************************************/
	/* VALIDAR AGREGAR ITEMS SOCIOS */
	function validarEmpleo(id_empresa,id_ramo,id_cargo,id_tabla){
		empresa=document.getElementById(id_empresa);
		ramo=document.getElementById(id_ramo);
		cargo=document.getElementById(id_cargo);
	
		if(empresa.value=='' || ramo.value=='' || cargo.value==''){
			alert('Debe ingresar los campos con (*) !!!');
			return false;
		}else{
			agregarEmpleo(id_empresa,id_ramo,id_cargo,id_tabla);
			return true;
		}
	}
	/* VALIDAR AGREGAR ITEMS RESPONSABLES */
	function validarResponsable(nombApeResp,cedulaResp,direccionResp,telefonoResp,respresponsable,expResponsable,id_tabla){
		nombApe=document.getElementById(nombApeResp);
		cedula=document.getElementById(cedulaResp);
		direccion=document.getElementById(direccionResp);
		telefono=document.getElementById(telefonoResp);
		responsabilidad=document.getElementById(respresponsable);
		experiencia=document.getElementById(expResponsable);
		if(nombApe.value=='' || cedula.value=='' || direccion.value=='' || telefono.value=='' || responsabilidad.value=='' || experiencia.value==''){
			alert('Debe ingresar los campos con (*) !!!');
			return false;
		}else{
			agregarResponsable(nombApeResp,cedulaResp,direccionResp,telefonoResp,respresponsable,expResponsable,id_tabla);
			return true;
		}
	}
	/* VALIDAR ITEMS OBJETIVOS */
	function validarObjetivo(objetivoEspecifico,id_tabla){
		objetivo=document.getElementById(objetivoEspecifico);
		if(objetivo.value==''){ 
			alert('Debe ingresar los campos con (*) !!!');
			return false;
		} else {
			agregarObjetivoEspecifico(objetivoEspecifico,id_tabla);
			return true;
		}
	}
	/* VALIDAR ITEMS PRODUCTOS */
	function validarProducto(prodServ,InsuProdServ,descProdServ,id_tabla){
		productos=document.getElementById(prodServ);
		insumos=document.getElementById(InsuProdServ);
		descripcion=document.getElementById(descProdServ);
		if(productos.value=='' || insumos.value=='' || descripcion.value==''){
			alert('Debe ingresar los campos con (*) !!!');
			return false;
		}else{
			agregarProducto(prodServ,InsuProdServ,descProdServ,id_tabla);
			return true;
		}
	}
	/* VALIDAR ITEMS SUBPRODUCTOS */
	function validarSubProducto(subProdServ,descSubProdServ,id_tabla){
		subProducto=document.getElementById(subProdServ);
		descSubProd=document.getElementById(descSubProdServ);
		if(subProducto.value=='' || descSubProd.value==''){
			alert('Debe ingresar los campos con (*) !!!');
			return false;
		}else{
			agregarSubProducto(subProducto,descSubProd,id_tabla);
			return true;
		}
	}
	/* VALIDAR ITEMS PRODUCTOS COMPLEMENTARIOS*/
	function validarProductoComp(ProdComp,descProdComp,id_tabla){
		prodComple=document.getElementById(ProdComp);
		descrip=document.getElementById(descProdComp);
		if(prodComple.value=='' || descrip.value==''){
			alert('Debe ingresar los campos con (*) !!!');
			return false;
		}else{
			agregarProductoComp(prodComple,descrip,id_tabla);
			return true;
		}
	}
	function validarProveedores(NombProveedor,ubicacion,informacion,id_tabla){
		nombProv=document.getElementById(NombProveedor);
		ubicProv=document.getElementById(ubicacion);
		infoProv=document.getElementById(informacion);
		if(nombProv.value=='' || ubicProv.value=='' || infoProv.value==''){
			alert('Debe ingresar los campos con (*) !!!');
			return false;
		}else{
			agregarProveedores(nombProv,ubicProv,infoProv,id_tabla);
			return true;
		}
	}
/****************************************************************************************************************************************/
/**************************************************  FIN FUNCIONES PARA VALIDAR ITEMS ***************************************************/
/****************************************************************************************************************************************/
/****************************************************************************************************************************************/
/****************************************************** AGREGAR Y ELIMINAR SOCIOS *******************************************************/
/****************************************************************************************************************************************/
	var contadorItem=1;
/*	function agregarEmpleo(idinput1,idinput2,idinput3,idTablaAInsertar){
		//valores del select
		input1=document.getElementById(idinput1)
		valorinput1=input1.value
		input2=document.getElementById(idinput2)
		valorinput2=input2.value
		input3=document.getElementById(idinput3)
		valorinput3=input3.value
		
		tabla=document.getElementById(idTablaAInsertar)
		//creando Objetos HTML a usar
		var	tr=document.createElement("TR"),
			td1=document.createElement("TD"),
			td2=document.createElement("TD"),
			td3=document.createElement("TD"),
			tdimagen=document.createElement("TD"),
			img=document.createElement("IMG"),
			inputhidden1=document.createElement("INPUT"),
			inputhidden2=document.createElement("INPUT"),
			inputhidden3=document.createElement("INPUT");
		
		//asigno atributos (en este caso es recomendable usar css para generar una class y asigar stylos pero com soy tan flojo :D)
		tr.setAttribute("id",idTablaAInsertar+contadorItem);
		tr.setAttribute("align","center");
		
		inputhidden1.setAttribute("type","hidden");
		inputhidden1.setAttribute("name","experienciaLaboralNomEmpresa"+contadorItem);
		inputhidden1.setAttribute("value",valorinput1);
		inputhidden1.setAttribute("id","nombreprimercampo"+contadorItem)
	
		inputhidden2.setAttribute("type","hidden");
		inputhidden2.setAttribute("name","experienciaLaboralRamo"+contadorItem);
		inputhidden2.setAttribute("value",valorinput2);
		inputhidden2.setAttribute("id","nombresegundocampo"+contadorItem)
		
		inputhidden3.setAttribute("type","hidden");
		inputhidden3.setAttribute("name","experienciaLaboralCargo"+contadorItem);
		inputhidden3.setAttribute("value",valorinput3);
		inputhidden3.setAttribute("id","nombretercercampo"+contadorItem);
		
		img.setAttribute("src","../../../imagenes/remove_socio.png");
		img.setAttribute("alt","Eliminar");
		img.setAttribute("title","Eliminar Empleo");
		img.setAttribute("onclick","eliminarEmpleo('"+idTablaAInsertar+contadorItem+"')");
		
		td1.setAttribute("style","text-align:center;");
		td1.setAttribute("width","15%");
		td1.setAttribute("bgcolor","#FFFFFF");
		td1.setAttribute("class","textoCampo");
		td1.innerHTML=valorinput1;
		
		td2.setAttribute("style"," text-align:center;");
		td2.setAttribute("width","15%");
		td2.setAttribute("bgcolor","#FFFFFF");
		td2.setAttribute("class","textoCampo");
		td2.innerHTML=valorinput2;
		
		td3.setAttribute("style"," text-align:center;");
		td3.setAttribute("width","15%");
		td3.setAttribute("bgcolor","#FFFFFF");
		td3.setAttribute("class","textoCampo");
		td3.innerHTML=valorinput3;
		
		tdimagen.setAttribute("style","text-align:center;");
		tdimagen.setAttribute("bgcolor","#FFFFFF");
		tdimagen.setAttribute("class","textoCampo");
		
		//Empiezo a organizar la lista
		td1.appendChild(inputhidden1);
		td2.appendChild(inputhidden2);
		td3.appendChild(inputhidden3);
		tdimagen.appendChild(img);
		
		tr.appendChild(td1);
		tr.appendChild(td2);
		tr.appendChild(td3);
		tr.appendChild(tdimagen);
		
		tabla.appendChild(tr);
		
		input1.value=input2.value=input3.value="";
		
		contadorItem++;
	}
*/
/*	function eliminarEmpleo(idAEliminar){
		var elementoAEliminar=document.getElementById(idAEliminar);
		var padreDelElementoAEliminar=elementoAEliminar.parentNode;
		padreDelElementoAEliminar.removeChild(elementoAEliminar);
	}
*/
/******************************************************************************************************************************************/
/**************************************************** AGREGAR Y ELIMINAR RESPONSABLES *****************************************************/
/******************************************************************************************************************************************/
/*	function agregarResponsable(idinput1,idinput2,idinput3,idinput4,idinput5,idinput6,idTablaAInsertar){
		//VALORES DE LOS INPUT
		input1=document.getElementById(idinput1)
		valorinput1=input1.value
		input2=document.getElementById(idinput2)
		valorinput2=input2.value
		input3=document.getElementById(idinput3)
		valorinput3=input3.value
		input4=document.getElementById(idinput4)
		valorinput4=input4.value
		input5=document.getElementById(idinput5)
		valorinput5=input5.value
		input6=document.getElementById(idinput6)
		valorinput6=input6.value

		tabla=document.getElementById(idTablaAInsertar)
		//creando Objetos HTML a usar
		var	tr=document.createElement("TR"),
			td1=document.createElement("TD"),
			td2=document.createElement("TD"),
			td3=document.createElement("TD"),
			td4=document.createElement("TD"),
			td5=document.createElement("TD"),
			td6=document.createElement("TD"),
			tdimagen=document.createElement("TD"),
			img=document.createElement("IMG"),
			inputhidden1=document.createElement("INPUT"),
			inputhidden2=document.createElement("INPUT"),
			inputhidden3=document.createElement("INPUT");
			inputhidden4=document.createElement("INPUT"),
			inputhidden5=document.createElement("INPUT"),
			inputhidden6=document.createElement("INPUT");

		//asigno atributos (en este caso es recomendable usar css para generar una class y asigar stylos pero com soy tan flojo :D)
		tr.setAttribute("id",idTablaAInsertar+contadorItem);
		tr.setAttribute("align","center");
		
		inputhidden1.setAttribute("type","hidden");
		inputhidden1.setAttribute("name","asignaResponsablesNombresApe"+contadorItem);
		inputhidden1.setAttribute("value",valorinput1);
		inputhidden1.setAttribute("id","nombreprimercampo"+contadorItem)
	
		inputhidden2.setAttribute("type","hidden");
		inputhidden2.setAttribute("name","asignaResponsablesCedula"+contadorItem);
		inputhidden2.setAttribute("value",valorinput2);
		inputhidden2.setAttribute("id","nombresegundocampo"+contadorItem)
		
		inputhidden3.setAttribute("type","hidden");
		inputhidden3.setAttribute("name","asignaResponsablesDireccion"+contadorItem);
		inputhidden3.setAttribute("value",valorinput3);
		inputhidden3.setAttribute("id","nombretercercampo"+contadorItem);

		inputhidden4.setAttribute("type","hidden");
		inputhidden4.setAttribute("name","asignaResponsablesTelefono"+contadorItem);
		inputhidden4.setAttribute("value",valorinput4);
		inputhidden4.setAttribute("id","nombrecuartocampo"+contadorItem)
		
		inputhidden5.setAttribute("type","hidden");
		inputhidden5.setAttribute("name","asignaResponsablesResponsabilidad"+contadorItem);
		inputhidden5.setAttribute("value",valorinput5);
		inputhidden5.setAttribute("id","nombrequintocampo"+contadorItem);

		inputhidden6.setAttribute("type","hidden");
		inputhidden6.setAttribute("name","asignaResponsablesExperiencia"+contadorItem);
		inputhidden6.setAttribute("value",valorinput6);
		inputhidden6.setAttribute("id","nombresextocampo"+contadorItem);

		img.setAttribute("src","../../../imagenes/remove_socio.png");
		img.setAttribute("alt","Eliminar");
		img.setAttribute("title","Eliminar Responsable");
		img.setAttribute("onclick","eliminarResponsable('"+idTablaAInsertar+contadorItem+"')");
		
		td1.setAttribute("style","text-align:center;");
		td1.setAttribute("width","15%");
		td1.setAttribute("bgcolor","#FFFFFF");
		td1.setAttribute("class","textoCampo");
		td1.innerHTML=valorinput1;
		
		td2.setAttribute("style"," text-align:center;");
		td2.setAttribute("width","15%");
		td2.setAttribute("bgcolor","#FFFFFF");
		td2.setAttribute("class","textoCampo");
		td2.innerHTML=valorinput2;
		
		td3.setAttribute("style"," text-align:center;");
		td3.setAttribute("width","15%");
		td3.setAttribute("bgcolor","#FFFFFF");
		td3.setAttribute("class","textoCampo");
		td3.innerHTML=valorinput3;
		
		td4.setAttribute("style","text-align:center;");
		td4.setAttribute("width","15%");
		td4.setAttribute("bgcolor","#FFFFFF");
		td4.setAttribute("class","textoCampo");
		td4.innerHTML=valorinput4;
		
		td5.setAttribute("style"," text-align:center;");
		td5.setAttribute("width","15%");
		td5.setAttribute("bgcolor","#FFFFFF");
		td5.setAttribute("class","textoCampo");
		td5.innerHTML=valorinput5;
		
		td6.setAttribute("style"," text-align:center;");
		td6.setAttribute("width","15%");
		td6.setAttribute("bgcolor","#FFFFFF");
		td6.setAttribute("class","textoCampo");
		td6.innerHTML=valorinput6;

		tdimagen.setAttribute("style","text-align:center;");
		tdimagen.setAttribute("bgcolor","#FFFFFF");
		tdimagen.setAttribute("class","textoCampo");

		//Empiezo a organizar la lista
		td1.appendChild(inputhidden1);
		td2.appendChild(inputhidden2);
		td3.appendChild(inputhidden3);
		td4.appendChild(inputhidden4);
		td5.appendChild(inputhidden5);
		td6.appendChild(inputhidden6);
		tdimagen.appendChild(img);
		
		tr.appendChild(td1);
		tr.appendChild(td2);
		tr.appendChild(td3);
		tr.appendChild(td4);
		tr.appendChild(td5);
		tr.appendChild(td6);
		tr.appendChild(tdimagen);
		
		tabla.appendChild(tr);
		
		input1.value=input2.value=input3.value=input4.value=input5.value=input6.value="";
		
		contadorItem++;
	}
*/
/*	function eliminarResponsable(idAEliminar){
		var elementoAEliminar=document.getElementById(idAEliminar);
		var padreDelElementoAEliminar=elementoAEliminar.parentNode;
		padreDelElementoAEliminar.removeChild(elementoAEliminar);
	}
*/
/******************************************************************************************************************************************/
/**************************************************** AGREGAR Y ELIMINAR OBJETIVOS ESP ****************************************************/
/******************************************************************************************************************************************/
/*	function agregarObjetivoEspecifico(idinput1,idTablaAInsertar){
		//valores del select
		input1=document.getElementById(idinput1)
		valorinput1=input1.value

		tabla=document.getElementById(idTablaAInsertar)
		//creando Objetos HTML a usar
		var	tr=document.createElement("TR"),
			td1=document.createElement("TD"),
			tdimagen=document.createElement("TD"),
			img=document.createElement("IMG"),
			inputhidden1=document.createElement("INPUT");
		//asigno atributos (en este caso es recomendable usar css para generar una class y asigar stylos pero com soy tan flojo :D)
		tr.setAttribute("id",idTablaAInsertar+contadorItem);
		tr.setAttribute("align","center");

		inputhidden1.setAttribute("type","hidden");
		inputhidden1.setAttribute("name","asignaObjetivoEspecifico"+contadorItem);
		inputhidden1.setAttribute("value",valorinput1);
		inputhidden1.setAttribute("id","nombreprimercampo"+contadorItem)

		img.setAttribute("src","../../../imagenes/remove_socio.png");
		img.setAttribute("alt","Eliminar");
		img.setAttribute("title","Eliminar Objetivo");
		img.setAttribute("onclick","eliminarObjetivo('"+idTablaAInsertar+contadorItem+"')");
		
		td1.setAttribute("style","text-align:justify;");
		td1.setAttribute("width","90%");
		td1.setAttribute("bgcolor","#FFFFFF");
		td1.setAttribute("class","textoCampo");
		td1.innerHTML=valorinput1;

		tdimagen.setAttribute("style","text-align:center;");
		tdimagen.setAttribute("bgcolor","#FFFFFF");
		tdimagen.setAttribute("class","textoCampo");

		//Empiezo a organizar la lista
		td1.appendChild(inputhidden1);
		tdimagen.appendChild(img);

		tr.appendChild(td1);
		tr.appendChild(tdimagen);

		tabla.appendChild(tr);
		
		input1.value="";
		
		contadorItem++;
	}
*/
/*	function eliminarObjetivo(idAEliminar){
		var elementoAEliminar=document.getElementById(idAEliminar);
		var padreDelElementoAEliminar=elementoAEliminar.parentNode;
		padreDelElementoAEliminar.removeChild(elementoAEliminar);
	}
*/	
/******************************************************************************************************************************************/
/**************************************************** AGREGAR Y ELIMINAR PRODUCTOS ********************************************************/
/******************************************************************************************************************************************/
/*
	function agregarProducto(idinput1,idinput2,idinput3,idTablaAInsertar){
		//valores del select
		input1=document.getElementById(idinput1)
		valorinput1=input1.value
		input2=document.getElementById(idinput2)
		valorinput2=input2.value
		input3=document.getElementById(idinput3)
		valorinput3=input3.value
		
		tabla=document.getElementById(idTablaAInsertar)
		//creando Objetos HTML a usar
		var	tr=document.createElement("TR"),
			td1=document.createElement("TD"),
			td2=document.createElement("TD"),
			td3=document.createElement("TD"),
			tdimagen=document.createElement("TD"),
			img=document.createElement("IMG"),
			inputhidden1=document.createElement("INPUT"),
			inputhidden2=document.createElement("INPUT"),
			inputhidden3=document.createElement("INPUT");
		
		//asigno atributos (en este caso es recomendable usar css para generar una class y asigar stylos pero com soy tan flojo :D)
		tr.setAttribute("id",idTablaAInsertar+contadorItem);
		tr.setAttribute("align","center");
		
		inputhidden1.setAttribute("type","hidden");
		inputhidden1.setAttribute("name","productoNombre"+contadorItem);
		inputhidden1.setAttribute("value",valorinput1);
		inputhidden1.setAttribute("id","nombreprimercampo"+contadorItem)
	
		inputhidden2.setAttribute("type","hidden");
		inputhidden2.setAttribute("name","productoInsumo"+contadorItem);
		inputhidden2.setAttribute("value",valorinput2);
		inputhidden2.setAttribute("id","nombresegundocampo"+contadorItem)
		
		inputhidden3.setAttribute("type","hidden");
		inputhidden3.setAttribute("name","productoDescripcion"+contadorItem);
		inputhidden3.setAttribute("value",valorinput3);
		inputhidden3.setAttribute("id","nombretercercampo"+contadorItem);
		
		img.setAttribute("src","../../../imagenes/delete.png");
		img.setAttribute("alt","Eliminar");
		img.setAttribute("title","Eliminar Empleo");
		img.setAttribute("onclick","eliminarProducto('"+idTablaAInsertar+contadorItem+"')");
		
		td1.setAttribute("style","text-align:center;");
		td1.setAttribute("width","30%");
		td1.setAttribute("bgcolor","#FFFFFF");
		td1.setAttribute("class","textoCampo");
		td1.innerHTML=valorinput1;
		
		td2.setAttribute("style"," text-align:center;");
		td2.setAttribute("width","30%");
		td2.setAttribute("bgcolor","#FFFFFF");
		td2.setAttribute("class","textoCampo");
		td2.innerHTML=valorinput2;
		
		td3.setAttribute("style"," text-align:center;");
		td3.setAttribute("width","30%");
		td3.setAttribute("bgcolor","#FFFFFF");
		td3.setAttribute("class","textoCampo");
		td3.innerHTML=valorinput3;
		
		tdimagen.setAttribute("style","text-align:center;");
		tdimagen.setAttribute("bgcolor","#FFFFFF");
		tdimagen.setAttribute("class","textoCampo");
		
		//Empiezo a organizar la lista
		td1.appendChild(inputhidden1);
		td2.appendChild(inputhidden2);
		td3.appendChild(inputhidden3);
		tdimagen.appendChild(img);
		
		tr.appendChild(td1);
		tr.appendChild(td2);
		tr.appendChild(td3);
		tr.appendChild(tdimagen);
		
		tabla.appendChild(tr);
		
		input1.value=input2.value=input3.value="";
		
		contadorItem++;
	}
*/
/*	function eliminarProducto(idAEliminar){
		var elementoAEliminar=document.getElementById(idAEliminar);
		var padreDelElementoAEliminar=elementoAEliminar.parentNode;
		padreDelElementoAEliminar.removeChild(elementoAEliminar);
	}
*/
/******************************************************************************************************************************************/
/**************************************************** AGREGAR Y ELIMINAR SUB PRODUCTOS ****************************************************/
/******************************************************************************************************************************************/
/*	function agregarSubProducto(idinput1,idinput2,idTablaAInsertar){
		//valores del select
		input1=document.getElementById(idinput1)
		valorinput1=input1.value
		input2=document.getElementById(idinput2)
		valorinput2=input2.value
		
		tabla=document.getElementById(idTablaAInsertar)
		//creando Objetos HTML a usar
		var	tr=document.createElement("TR"),
			td1=document.createElement("TD"),
			td2=document.createElement("TD"),
			tdimagen=document.createElement("TD"),
			img=document.createElement("IMG"),
			inputhidden1=document.createElement("INPUT"),
			inputhidden2=document.createElement("INPUT");
		
		//asigno atributos (en este caso es recomendable usar css para generar una class y asigar stylos pero com soy tan flojo :D)
		tr.setAttribute("id",idTablaAInsertar+contadorItem);
		tr.setAttribute("align","center");
		
		inputhidden1.setAttribute("type","hidden");
		inputhidden1.setAttribute("name","productoNombre"+contadorItem);
		inputhidden1.setAttribute("value",valorinput1);
		inputhidden1.setAttribute("id","nombreprimercampo"+contadorItem)
	
		inputhidden2.setAttribute("type","hidden");
		inputhidden2.setAttribute("name","productoInsumo"+contadorItem);
		inputhidden2.setAttribute("value",valorinput2);
		inputhidden2.setAttribute("id","nombresegundocampo"+contadorItem)
		
		img.setAttribute("src","../../../imagenes/delete.png");
		img.setAttribute("alt","Eliminar");
		img.setAttribute("title","Eliminar SubProducto");
		img.setAttribute("onclick","eliminarSubProducto('"+idTablaAInsertar+contadorItem+"')");
		
		td1.setAttribute("style","text-align:center;");
		td1.setAttribute("width","30%");
		td1.setAttribute("bgcolor","#FFFFFF");
		td1.setAttribute("class","textoCampo");
		td1.innerHTML=valorinput1;
		
		td2.setAttribute("style"," text-align:center;");
		td2.setAttribute("width","30%");
		td2.setAttribute("bgcolor","#FFFFFF");
		td2.setAttribute("class","textoCampo");
		td2.innerHTML=valorinput2;
		
		tdimagen.setAttribute("style","text-align:center;");
		tdimagen.setAttribute("bgcolor","#FFFFFF");
		tdimagen.setAttribute("class","textoCampo");
		
		//Empiezo a organizar la lista
		td1.appendChild(inputhidden1);
		td2.appendChild(inputhidden2);
		tdimagen.appendChild(img);
		
		tr.appendChild(td1);
		tr.appendChild(td2);
		tr.appendChild(tdimagen);
		
		tabla.appendChild(tr);
		
		input1.value=input2.value="";
		
		contadorItem++;
	}
*/
/*	function eliminarSubProducto(idAEliminar){
		var elementoAEliminar=document.getElementById(idAEliminar);
		var padreDelElementoAEliminar=elementoAEliminar.parentNode;
		padreDelElementoAEliminar.removeChild(elementoAEliminar);
	}
*/
/******************************************************************************************************************************************/
/*********************************************** AGREGAR Y ELIMINAR PRODUCTOS COMPLEMENTARIOS *********************************************/
/******************************************************************************************************************************************/
/*	function agregarProductoComp(idinput1,idinput2,idTablaAInsertar){
		//valores del select
		input1=document.getElementById(idinput1)
		valorinput1=input1.value
		input2=document.getElementById(idinput2)
		valorinput2=input2.value
		
		tabla=document.getElementById(idTablaAInsertar)
		//creando Objetos HTML a usar
		var	tr=document.createElement("TR"),
			td1=document.createElement("TD"),
			td2=document.createElement("TD"),
			tdimagen=document.createElement("TD"),
			img=document.createElement("IMG"),
			inputhidden1=document.createElement("INPUT"),
			inputhidden2=document.createElement("INPUT");
		
		//asigno atributos (en este caso es recomendable usar css para generar una class y asigar stylos pero com soy tan flojo :D)
		tr.setAttribute("id",idTablaAInsertar+contadorItem);
		tr.setAttribute("align","center");
		
		inputhidden1.setAttribute("type","hidden");
		inputhidden1.setAttribute("name","productoNombre"+contadorItem);
		inputhidden1.setAttribute("value",valorinput1);
		inputhidden1.setAttribute("id","nombreprimercampo"+contadorItem)
	
		inputhidden2.setAttribute("type","hidden");
		inputhidden2.setAttribute("name","productoInsumo"+contadorItem);
		inputhidden2.setAttribute("value",valorinput2);
		inputhidden2.setAttribute("id","nombresegundocampo"+contadorItem)
		
		img.setAttribute("src","../../../imagenes/delete.png");
		img.setAttribute("alt","Eliminar");
		img.setAttribute("title","Eliminar Empleo");
		img.setAttribute("onclick","eliminarProducto('"+idTablaAInsertar+contadorItem+"')");
		
		td1.setAttribute("style","text-align:center;");
		td1.setAttribute("width","30%");
		td1.setAttribute("bgcolor","#FFFFFF");
		td1.setAttribute("class","textoCampo");
		td1.innerHTML=valorinput1;
		
		td2.setAttribute("style"," text-align:center;");
		td2.setAttribute("width","30%");
		td2.setAttribute("bgcolor","#FFFFFF");
		td2.setAttribute("class","textoCampo");
		td2.innerHTML=valorinput2;
		
		tdimagen.setAttribute("style","text-align:center;");
		tdimagen.setAttribute("bgcolor","#FFFFFF");
		tdimagen.setAttribute("class","textoCampo");
		
		td1.appendChild(inputhidden1);
		td2.appendChild(inputhidden2);
		tdimagen.appendChild(img);
		
		tr.appendChild(td1);
		tr.appendChild(td2);
		tr.appendChild(tdimagen);
		
		tabla.appendChild(tr);
		
		input1.value=input2.value="";
		
		contadorItem++;
	}
*/
/*	function eliminarProductoComp(idAEliminar){
		var elementoAEliminar=document.getElementById(idAEliminar);
		var padreDelElementoAEliminar=elementoAEliminar.parentNode;
		padreDelElementoAEliminar.removeChild(elementoAEliminar);
	}
*/
/******************************************************************************************************************************************/
/*********************************************** AGREGAR Y ELIMINAR PROVEEDORES ***********************************************************/
/******************************************************************************************************************************************/
/*	function agregarProveedores(idinput1,idinput2,idinput3,idTablaAInsertar){
		//valores del select
		input1=document.getElementById(idinput1)
		valorinput1=input1.value
		input2=document.getElementById(idinput2)
		valorinput2=input2.value
		input3=document.getElementById(idinput3)
		valorinput3=input3.value
		
		tabla=document.getElementById(idTablaAInsertar)
		//creando Objetos HTML a usar
		var	tr=document.createElement("TR"),
			td1=document.createElement("TD"),
			td2=document.createElement("TD"),
			td3=document.createElement("TD"),
			tdimagen=document.createElement("TD"),
			img=document.createElement("IMG"),
			inputhidden1=document.createElement("INPUT"),
			inputhidden2=document.createElement("INPUT"),
			inputhidden3=document.createElement("INPUT");
		
		//asigno atributos (en este caso es recomendable usar css para generar una class y asigar stylos pero com soy tan flojo :D)
		tr.setAttribute("id",idTablaAInsertar+contadorItem);
		tr.setAttribute("align","center");
		
		inputhidden1.setAttribute("type","hidden");
		inputhidden1.setAttribute("name","proveedorNombre"+contadorItem);
		inputhidden1.setAttribute("value",valorinput1);
		inputhidden1.setAttribute("id","nombreprimercampo"+contadorItem)
	
		inputhidden2.setAttribute("type","hidden");
		inputhidden2.setAttribute("name","ubicacionProveedor"+contadorItem);
		inputhidden2.setAttribute("value",valorinput2);
		inputhidden2.setAttribute("id","nombresegundocampo"+contadorItem)
		
		inputhidden3.setAttribute("type","hidden");
		inputhidden3.setAttribute("name","informacionProveedor"+contadorItem);
		inputhidden3.setAttribute("value",valorinput3);
		inputhidden3.setAttribute("id","nombretercercampo"+contadorItem);
		
		img.setAttribute("src","../../../imagenes/delete.png");
		img.setAttribute("alt","Eliminar");
		img.setAttribute("title","Eliminar Proveedor");
		img.setAttribute("onclick","eliminarProveedores('"+idTablaAInsertar+contadorItem+"')");
		
		td1.setAttribute("style","text-align:center;");
		td1.setAttribute("width","30%");
		td1.setAttribute("bgcolor","#FFFFFF");
		td1.setAttribute("class","textoCampo");
		td1.innerHTML=valorinput1;
		
		td2.setAttribute("style"," text-align:center;");
		td2.setAttribute("width","30%");
		td2.setAttribute("bgcolor","#FFFFFF");
		td2.setAttribute("class","textoCampo");
		td2.innerHTML=valorinput2;
		
		td3.setAttribute("style"," text-align:center;");
		td3.setAttribute("width","30%");
		td3.setAttribute("bgcolor","#FFFFFF");
		td3.setAttribute("class","textoCampo");
		td3.innerHTML=valorinput3;
		
		tdimagen.setAttribute("style","text-align:center;");
		tdimagen.setAttribute("bgcolor","#FFFFFF");
		tdimagen.setAttribute("class","textoCampo");
		
		//Empiezo a organizar la lista
		td1.appendChild(inputhidden1);
		td2.appendChild(inputhidden2);
		td3.appendChild(inputhidden3);
		tdimagen.appendChild(img);
		
		tr.appendChild(td1);
		tr.appendChild(td2);
		tr.appendChild(td3);
		tr.appendChild(tdimagen);
		
		tabla.appendChild(tr);
		
		input1.value=input2.value=input3.value="";
		
		contadorItem++;
	}
*/
/*	function eliminarProveedores(idAEliminar){
		var elementoAEliminar=document.getElementById(idAEliminar);
		var padreDelElementoAEliminar=elementoAEliminar.parentNode;
		padreDelElementoAEliminar.removeChild(elementoAEliminar);
	}