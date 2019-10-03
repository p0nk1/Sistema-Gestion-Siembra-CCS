/**************************************************************convierte a mayuscula la primera letra de cada palabra ******************************************/

function changeCase(frmObj) {
var index;
var tmpStr;
var tmpChar;
var preString;
var postString;
var strlen;
tmpStr = frmObj.value.toLowerCase();
strLen = tmpStr.length;
if (strLen > 0)  {
for (index = 0; index < strLen; index++)  {
if (index == 0)  {
tmpChar = tmpStr.substring(0,1).toUpperCase();
postString = tmpStr.substring(1,strLen);
tmpStr = tmpChar + postString;
}
else {
tmpChar = tmpStr.substring(index, index+1);
if (tmpChar == " " && index < (strLen-1))  {
tmpChar = tmpStr.substring(index+1, index+2).toUpperCase();
preString = tmpStr.substring(0, index+1);
postString = tmpStr.substring(index+2,strLen);
tmpStr = preString + tmpChar + postString;
         }
      }
   }
}
frmObj.value = tmpStr;
}


/****************************************************************************************************************************************************************/



var car_inva = new Array("!","|","\"","#","$","%","&","/","(",")","=","?","[","]","-",">","<","Â°","Â¬","'",";");

function guardar()
{
	document.balanza.submit();
}

function vp()
{
	if( document.balanza.producto.value=="" )
		document.getElementById('producto_combo').style.display='block';
	if( document.balanza.producto.value!="" )
		document.getElementById('producto_combo').style.display='none';
}


function reportes(tipo) 
{
	pagina="pdf_calc.php?tipo="+tipo;
	var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=850, height=400, top=85, left=140";
	window.open(pagina,"",opciones);
}


//function reportes(tipo) 
//{
//	pagina="pdf_calc.php?tipo="+tipo;
//	var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=850, height=400, top=85, left=140";
//	window.open(pagina,"",opciones);
//}
/****************************************************************************************************************************************/
/********************************************  FUNCION PARA DAR FORMATO  ****************************************************************/
/****************************************************************************************************************************************/
function formato_campo(fld,e,t){
	
    var aux = aux2 = '';
	var i = j = 0;

	if(t==1)
    	var strCheck = '0123456789-" "';
	if(t==2)
    	var strCheck = 'AaBbCcDdEeFfGgHhIiJjKkLlNnÑñMmOoPpQqRrSsTtUuVvWwXxYyZz-" "';
	if(t==3)
    	var strCheck = '0123456789-ext';
	if(t==4)
    	var strCheck = '0123456789';
	
    var whichCode = (window.Event) ? e.which : e.keyCode;
    if (whichCode == 13) return true; // Enter
	if (whichCode == 8) return true; // Enter
	if (whichCode == 0) return true; // Enter
	if(t==4){
		if(fld.value==""){
			aux_old=0;
			aux_old2=0;
		}
		if(fld_old=="0")
			fld_old=fld;
		else{
			if(fld_old==fld){
				if (whichCode == 46 && aux_old==0){
				aux_old=1;
				return true;
				}
				if (whichCode == 45 && aux_old2==0 && fld.value==""){
				aux_old2=1;
				return true;
				}
			}else{
				fld_old=fld;
				aux_old=0;
				aux_old2=0;
				if (whichCode == 46 && aux_old==0){
				aux_old=1;
				return true;
				}
				if (whichCode == 45 && aux_old2==0 && fld.value==""){
				aux_old2=1;
				return true;
				}
			}
		}
	}
    key = String.fromCharCode(whichCode); // Get key value from key code
    if (strCheck.indexOf(key) == -1) return false; // Not a valid key
	fld.value += aux2.charAt(i);
}
/****************************************************************************************************************************************/
/******************************************** FIN FUNCION PARA DAR FORMATO  *************************************************************/
/****************************************************************************************************************************************/

/****************************************************************************************************************************************/
/********************************************  FUNCION PARA CARGAR COMBO DE EMPLEO ******************************************************/
/****************************************************************************************************************************************/
function cargarComboEmpleoSi()
{
	var resp="<select style='width:130' name='id_tipo_trabajo' id='id_tipo_trabajoSi'><option value=''>Seleccione...</option><option value='1'>Sector P&uacute;blico</option><option value='2'>Sector Privado</option></select>";
	document.getElementById('id_trabajo').innerHTML=resp;
	//alert(document.getElementById('id_trabajo').innerHTML=resp);
}


function cargarComboEmpleoNo()
{
	var resp1="<select style='width:130' name='id_tipo_trabajo' id='id_tipo_trabajoNo'><option value=''>Seleccione...</option><option value='1'>Por su Cuenta</option><option value='2'>Pensionado</option></select>";
	document.getElementById('id_trabajo').innerHTML=resp1;
	//alert(document.getElementById('id_trabajo').innerHTML=resp1);
}
/****************************************************************************************************************************************/
/********************************************  FIN FUNCION PARA DAR FORMATO  ************************************************************/
/****************************************************************************************************************************************/

/****************************************************************************************************************************************/
/********************************************  FUNCION PARA BUSCAR CEDULA ONIDEX ********************************************************/
/****************************************************************************************************************************************/
function buscar_por(valor)
{	
	//var valor=valor.value;
	
	if ( parseInt(valor) == 1){
		document.getElementById('id_mostrar_ced').style.display = "block"; //desaparace
	}
	else{
        document.getElementById('id_mostrar_ced').style.display = "none"; //aparace
	}
	if ( parseInt(valor) == 2){
		document.getElementById('id_mostrar_rif').style.display = "block"; //desaparace
	}
	else{
        document.getElementById('id_mostrar_rif').style.display = "none"; //aparace
	}
}
/****************************************************************************************************************************************/
/********************************************  FIN FUNCION PARA BUSCAR CEDULA ONIDEX ****************************************************/
/****************************************************************************************************************************************/

/************************************* NUEVO ECHEVERRIA *****************************************************/

/****************************************************************************************************************************************/
/************************************************  FUNCION PARA VALIDAR *****************************************************************/
/****************************************************************************************************************************************/
	/* VALIDAR AGREGAR ITEMS SOCIOS */
	function validarEmpleo(id_empresa,id_sexo,id_ramo,id_cargo,id_tabla)
	{
		empresa=document.getElementById(id_empresa);
                sexo=document.getElementById(id_sexo);
		ramo=document.getElementById(id_ramo);
		cargo=document.getElementById(id_cargo);
	
		if(empresa.value=='' || sexo.value=='' || ramo.value=='' || cargo.value=='')
		{
			alert('Debe ingresar los campos con (*) !!!');
			return false;
		}else
		{
			agregarEmpleo(id_empresa,id_sexo,id_ramo,id_cargo,id_tabla);
			return true;
		}
	}

	/* VALIDAR AGREGAR ITEMS RESPONSABLES */
	function validarResponsable(nombApeResp,cedulaResp,direccionResp,telefonoResp,respresponsable,expResponsable,id_tabla)
	{
		nombApe=document.getElementById(nombApeResp);
		cedula=document.getElementById(cedulaResp);
		direccion=document.getElementById(direccionResp);
		telefono=document.getElementById(telefonoResp);
		responsabilidad=document.getElementById(respresponsable);
		experiencia=document.getElementById(expResponsable);
	
		if(nombApe.value=='' || cedula.value=='' || direccion.value=='' || telefono.value=='' || responsabilidad.value=='' || experiencia.value=='')
		{
			alert('Debe ingresar los campos con (*) !!!');
			return false;
		}else
		{
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
	function validarProducto(prodServ,InsuProdServ,descProdServ,id_tabla)
	{
		productos=document.getElementById(prodServ);
		insumos=document.getElementById(InsuProdServ);
		descripcion=document.getElementById(descProdServ);
	
		if(productos.value=='' || insumos.value=='' || descripcion.value=='')
		{
			alert('Debe ingresar los campos con (*) !!!');
			return false;
		}else
		{
			agregarProducto(prodServ,InsuProdServ,descProdServ,id_tabla);
			return true;
		}
	}
	/* VALIDAR ITEMS SUBPRODUCTOS */
	function validarSubProducto(subProdServ,descSubProdServ,id_tabla)
	{
		subProducto=document.getElementById(subProdServ);
		descSubProd=document.getElementById(descSubProdServ);
	
		if(subProducto.value=='' || descSubProd.value=='')
		{
			alert('Debe ingresar los campos con (*) !!!');
			return false;
		}else
		{
			agregarSubProducto(subProdServ,descSubProdServ,id_tabla);
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
			agregarProductoComp(ProdComp,descProdComp,id_tabla);
			return true;
		}
	}
	/* VALIDAR ITEMS PROVEEDORES */
	function validarProveedores(NombProveedor,ubicacion,informacion,id_tabla){
		nombProv=document.getElementById(NombProveedor);
		ubicProv=document.getElementById(ubicacion);
		infoProv=document.getElementById(informacion);
		if(nombProv.value=='' || ubicProv.value=='' || infoProv.value==''){
			alert('Debe ingresar los campos con (*) !!!');
			return false;
		}else{
			agregarProveedores(NombProveedor,ubicacion,informacion,id_tabla);
			return true;
		}
	}
	/* VALIDAR ITEMS NECESIDAD DE PRODUCTOS */
	function validarNecesidadProducto(ProductNece,benefPot,cantProd,neceCuant,tiempo,totalNec,id_tabla){
		a=document.getElementById(ProductNece);
		b=document.getElementById(benefPot);
		c=document.getElementById(cantProd);
		d=document.getElementById(neceCuant);
		e=document.getElementById(totalNec);
		f=document.getElementById(totalNec);
		if(a.value=='' || b.value=='' || c.value=='' || d.value=='' || e.value=='' || f.value==''){
			alert('Debe ingresar los campos con (*) !!!');
			return false;
		}else{
			agregarProdNece(ProductNece,benefPot,cantProd,neceCuant,tiempo,totalNec,id_tabla);
			return true;
		}
	}
	/* VALIDAR ITEMS IMPACTO AMBIENTAL */
	function validarImpacto(impactoAmb,descImpacto,posSolucion,id_tabla)
	{
		impacto=document.getElementById(impactoAmb);
		descripcion=document.getElementById(descImpacto);
		solucion=document.getElementById(posSolucion);
	
		if(impacto.value=='' || descripcion.value=='' || solucion.value=='')
		{
			alert('Debe ingresar los campos con (*) !!!');
			return false;
		}else
		{
			agregarImpacto(impactoAmb,descImpacto,posSolucion,id_tabla);
			return true;
		}
	}
	/* VALIDAR ITEMS ROLES */
	function validarRoles(rolResp,modoEleccion,periodoPer,id_tabla)
	{
		rol=document.getElementById(rolResp);
		modo=document.getElementById(modoEleccion);
		periodo=document.getElementById(periodoPer);
	
		if(rol.value=='' || modo.value=='' || periodo.value=='')
		{
			alert('Debe ingresar los campos con (*) !!!');
			return false;
		}else
		{
			agregarRol(rolResp,modoEleccion,periodoPer,id_tabla);
			return true;
		}
	}
	function vaciarTablasDinamicas(idTabla1,idTabla2,idTabla3){
		vaciarNodos(idTabla1,1);
		vaciarNodos(idTabla2,1);
		vaciarNodos(idTabla3,1);
	}
	function vaciarNodos(idElementoAVaciar,cantidadElementosEstaticos){
		elemento=document.getElementById(idElementoAVaciar)
		j=cantidadElementosEstaticos
		for(  i=(elemento.childNodes.length)-1  ;   i>(0+j)    ;  i--  ){
			//alert(elemento.childNodes.item(i))
			elemento.removeChild(elemento.childNodes.item(i))
		}
	}
	/******************************************************************************************************************************************/
	/*****************************************************  FIN FUNCIONES PARA VALIDAR ********************************************************/
	/******************************************************************************************************************************************/
	/******************************************************************************************************************************************/
	/*************************************************  FIN FUNCIONES PARA SUMAR - MULTIPLICAR ************************************************/
	/******************************************************************************************************************************************/

	function sumar( numero ) {
		var total    = document.getElementById('total_ori').value;		//total pagos
		var ttp      = document.getElementById('total_tipos_pagos').value;	//total tipos pagos
		var monto    = 0;
		var total_otros_pagos = 0.0;
		
		for( i=0 ; i<ttp ; i++ )
		{
			if( document.getElementById( 'pago_'+i ).value==",00" )
				document.getElementById( 'pago_'+i ).value="0,00";
			if( document.getElementById( 'pago_'+i ).value=="" )
				document.getElementById( 'pago_'+i ).value="0,00";
			if( document.getElementById( 'pago_'+i ).value=="0" )
				document.getElementById( 'pago_'+i ).value="0,00";
	
			monto = uf_convertir_monto( document.getElementById( 'pago_'+i ).value  );
			total_otros_pagos = parseFloat(total_otros_pagos) + parseFloat(monto);
		}
		var efectivo = parseFloat(total) + parseFloat(total_otros_pagos);
		document.getElementById('total_otros_pagos').value =  total_otros_pagos;
	
		if( total_otros_pagos > total )
		{
			document.getElementById('efectivo').innerHTML = number_format (efectivo, 2, ",", ".");
			document.getElementById('pago').value         = number_format (efectivo, 2, ",", ".");
		}
		else if( total_otros_pagos <= total )
		{
			document.getElementById('efectivo').innerHTML = "0,00";
			document.getElementById('pago').value         = "0,00";
		}
	}

	/******************************************************************************************************************************************/
	/*************************************************  FIN FUNCIONES PARA SUMAR - MULTIPLICAR ************************************************/
	/******************************************************************************************************************************************/

	/******************************************************************************************************************************************/
	/****************************************************** FUNCION PARA AGREGAR ITEMS ********************************************************/
	/******************************************************************************************************************************************/
	var contadorItem=1;
	function agregarEmpleo(idinput1,idinput2,idinput3,idinput4,idTablaAInsertar){
		//valores del select
		input1=document.getElementById(idinput1)
		valorinput1=input1.value
		input2=document.getElementById(idinput2)
		valorinput2=input2.value
		input3=document.getElementById(idinput3)
		valorinput3=input3.value
                input4=document.getElementById(idinput4)
		valorinput4=input4.value
		
		tabla=document.getElementById(idTablaAInsertar)
		//creando Objetos HTML a usar
		var	tr=document.createElement("TR"),
			td1=document.createElement("TD"),
			td2=document.createElement("TD"),
			td3=document.createElement("TD"),
                        td4=document.createElement("TD"),
			tdimagen=document.createElement("TD"),
			img=document.createElement("IMG"),
			inputhidden1=document.createElement("INPUT"),
			inputhidden2=document.createElement("INPUT"),
			inputhidden3=document.createElement("INPUT"),
                        inputhidden4=document.createElement("INPUT");
		
		//asigno atributos (en este caso es recomendable usar css para generar una class y asigar stylos pero com soy tan flojo :D)
		tr.setAttribute("id",idTablaAInsertar+contadorItem);
		tr.setAttribute("align","center");
		
		inputhidden1.setAttribute("type","hidden");
		inputhidden1.setAttribute("name","experienciaLaboralNomEmpresa"+contadorItem);
		inputhidden1.setAttribute("value",valorinput1);
		inputhidden1.setAttribute("id","nombreprimercampo"+contadorItem)
                
                inputhidden2.setAttribute("type","hidden");
		inputhidden2.setAttribute("name","experienciaLaboralSexo"+contadorItem);
		inputhidden2.setAttribute("value",valorinput2);
		inputhidden2.setAttribute("id","nombretersegundocampo"+contadorItem);
	
		inputhidden3.setAttribute("type","hidden");
		inputhidden3.setAttribute("name","experienciaLaboralRamo"+contadorItem);
		inputhidden3.setAttribute("value",valorinput3);
		inputhidden3.setAttribute("id","nombretercercampo"+contadorItem)
		
		inputhidden4.setAttribute("type","hidden");
		inputhidden4.setAttribute("name","experienciaLaboralCargo"+contadorItem);
		inputhidden4.setAttribute("value",valorinput4);
		inputhidden4.setAttribute("id","nombrecuartocampo"+contadorItem);
                
                
		
		img.setAttribute("src","../imagenes/elimSocio.png");
		img.setAttribute("alt","Eliminar");
		img.setAttribute("title","Eliminar Productor");
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
                
                td4.setAttribute("style"," text-align:center;");
		td4.setAttribute("width","15%");
		td4.setAttribute("bgcolor","#FFFFFF");
		td4.setAttribute("class","textoCampo");
		td4.innerHTML=valorinput4;
		
		tdimagen.setAttribute("style","text-align:center;");
		tdimagen.setAttribute("bgcolor","#FFFFFF");
		tdimagen.setAttribute("class","textoCampo");
		
		//Empiezo a organizar la lista
		td1.appendChild(inputhidden1);
		td2.appendChild(inputhidden2);
		td3.appendChild(inputhidden3);
                td4.appendChild(inputhidden4);
		tdimagen.appendChild(img);
		
		tr.appendChild(td1);
		tr.appendChild(td2);
		tr.appendChild(td3);
                tr.appendChild(td4);
		tr.appendChild(tdimagen);
		
		tabla.appendChild(tr);
		
		input1.value=input2.value=input3.value=input4.value="";
		
		contadorItem++;
	}
	function eliminarEmpleo(idAEliminar){
		var elementoAEliminar=document.getElementById(idAEliminar);
		var padreDelElementoAEliminar=elementoAEliminar.parentNode;
		padreDelElementoAEliminar.removeChild(elementoAEliminar);
	}
	/******************************************************************************************************************************************/
	/**************************************************** AGREGAR Y ELIMINAR RESDPONSABLES ****************************************************/
	/******************************************************************************************************************************************/
	function agregarResponsable(idinput1,idinput2,idinput3,idinput4,idinput5,idinput6,idTablaAInsertar){
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
			inputhidden3=document.createElement("INPUT"),
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
	function eliminarResponsable(idAEliminar){
		var elementoAEliminar=document.getElementById(idAEliminar);
		var padreDelElementoAEliminar=elementoAEliminar.parentNode;
		padreDelElementoAEliminar.removeChild(elementoAEliminar);
	}
	/******************************************************************************************************************************************/
	/**************************************************** AGREGAR Y ELIMINAR OBJETIVOS ESP ****************************************************/
	/******************************************************************************************************************************************/
	function agregarObjetivoEspecifico(idinput1,idTablaAInsertar){
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
	function eliminarObjetivo(idAEliminar){
		var elementoAEliminar=document.getElementById(idAEliminar);
		var padreDelElementoAEliminar=elementoAEliminar.parentNode;
		padreDelElementoAEliminar.removeChild(elementoAEliminar);
	}
	/******************************************************************************************************************************************/
	/**************************************************** AGREGAR Y ELIMINAR PRODUCTOS ********************************************************/
	/******************************************************************************************************************************************/
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
	function eliminarProducto(idAEliminar){
		var elementoAEliminar=document.getElementById(idAEliminar);
		var padreDelElementoAEliminar=elementoAEliminar.parentNode;
		padreDelElementoAEliminar.removeChild(elementoAEliminar);
	}
	/******************************************************************************************************************************************/
	/**************************************************** AGREGAR Y ELIMINAR SUB PRODUCTOS ****************************************************/
	/******************************************************************************************************************************************/
	function agregarSubProducto(idinput1,idinput2,idTablaAInsertar){
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
	function eliminarSubProducto(idAEliminar){
		var elementoAEliminar=document.getElementById(idAEliminar);
		var padreDelElementoAEliminar=elementoAEliminar.parentNode;
		padreDelElementoAEliminar.removeChild(elementoAEliminar);
	}
	/******************************************************************************************************************************************/
	/*********************************************** AGREGAR Y ELIMINAR PRODUCTOS COMPLEMENTARIOS *********************************************/
	/******************************************************************************************************************************************/
	function agregarProductoComp(idinput1,idinput2,idTablaAInsertar){
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
		inputhidden1.setAttribute("name","productoCompNombre"+contadorItem);
		inputhidden1.setAttribute("value",valorinput1);
		inputhidden1.setAttribute("id","nombreprimercampo"+contadorItem)
	
		inputhidden2.setAttribute("type","hidden");
		inputhidden2.setAttribute("name","productoCompDesc"+contadorItem);
		inputhidden2.setAttribute("value",valorinput2);
		inputhidden2.setAttribute("id","nombresegundocampo"+contadorItem)
		
		img.setAttribute("src","../../../imagenes/delete.png");
		img.setAttribute("alt","Eliminar");
		img.setAttribute("title","Eliminar Producto Complementario");
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
	function eliminarProductoComp(idAEliminar){
		var elementoAEliminar=document.getElementById(idAEliminar);
		var padreDelElementoAEliminar=elementoAEliminar.parentNode;
		padreDelElementoAEliminar.removeChild(elementoAEliminar);
	}
	/******************************************************************************************************************************************/
	/*********************************************** AGREGAR Y ELIMINAR PROVEEDORES ***********************************************************/
	/******************************************************************************************************************************************/
	function agregarProveedores(idinput1,idinput2,idinput3,idTablaAInsertar){

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
	function eliminarProveedores(idAEliminar){
		var elementoAEliminar=document.getElementById(idAEliminar);
		var padreDelElementoAEliminar=elementoAEliminar.parentNode;
		padreDelElementoAEliminar.removeChild(elementoAEliminar);
	}
	/******************************************************************************************************************************************/
	/*********************************************** AGREGAR Y ELIMINAR PRODUCTOS NECESITADOS *************************************************/
	/******************************************************************************************************************************************/
	function agregarProdNece(idinput1,idinput2,idinput3,idinput4,idinput5,idinput6,idTablaAInsertar){
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
			inputhidden3=document.createElement("INPUT"),
			inputhidden4=document.createElement("INPUT"),
			inputhidden5=document.createElement("INPUT"),
			inputhidden6=document.createElement("INPUT");

		//asigno atributos (en este caso es recomendable usar css para generar una class y asigar stylos pero com soy tan flojo :D)
		tr.setAttribute("id",idTablaAInsertar+contadorItem);
		tr.setAttribute("align","center");
		
		inputhidden1.setAttribute("type","hidden");
		inputhidden1.setAttribute("name","asignaProdNeceNombre"+contadorItem);
		inputhidden1.setAttribute("value",valorinput1);
		inputhidden1.setAttribute("id","nombreprimercampo"+contadorItem)
	
		inputhidden2.setAttribute("type","hidden");
		inputhidden2.setAttribute("name","asignaProdNeceBenPot"+contadorItem);
		inputhidden2.setAttribute("value",valorinput2);
		inputhidden2.setAttribute("id","nombresegundocampo"+contadorItem)
		
		inputhidden3.setAttribute("type","hidden");
		inputhidden3.setAttribute("name","asignaProdNeceCant"+contadorItem);
		inputhidden3.setAttribute("value",valorinput3);
		inputhidden3.setAttribute("id","nombretercercampo"+contadorItem);

		inputhidden4.setAttribute("type","hidden");
		inputhidden4.setAttribute("name","asignaProdNeceNecCuant"+contadorItem);
		inputhidden4.setAttribute("value",valorinput4);
		inputhidden4.setAttribute("id","nombrecuartocampo"+contadorItem)
		
		inputhidden5.setAttribute("type","hidden");
		inputhidden5.setAttribute("name","asignaProdNeceTiempo"+contadorItem);
		inputhidden5.setAttribute("value",valorinput5);
		inputhidden5.setAttribute("id","nombrequintocampo"+contadorItem);

		inputhidden6.setAttribute("type","hidden");
		inputhidden6.setAttribute("name","asignaProdNeceTotal"+contadorItem);
		inputhidden6.setAttribute("value",valorinput5);
		inputhidden6.setAttribute("id","nombresextocampo"+contadorItem);

		img.setAttribute("src","../../../imagenes/remove_socio.png");
		img.setAttribute("alt","Eliminar");
		img.setAttribute("title","Eliminar Necesidad de Producto");
		img.setAttribute("onclick","eliminarProdNece('"+idTablaAInsertar+contadorItem+"')");
		
		td1.setAttribute("style","text-align:center;");
		td1.setAttribute("width","40%");
		td1.setAttribute("bgcolor","#FFFFFF");
		td1.setAttribute("class","textoCampo");
		td1.innerHTML=valorinput1;
		
		td2.setAttribute("style"," text-align:center;");
		td2.setAttribute("width","12%");
		td2.setAttribute("bgcolor","#FFFFFF");
		td2.setAttribute("class","textoCampo");
		td2.innerHTML=valorinput2;
		
		td3.setAttribute("style"," text-align:center;");
		td3.setAttribute("width","12%");
		td3.setAttribute("bgcolor","#FFFFFF");
		td3.setAttribute("class","textoCampo");
		td3.innerHTML=valorinput3;
		
		td4.setAttribute("style","text-align:center;");
		td4.setAttribute("width","12%");
		td4.setAttribute("bgcolor","#FFFFFF");
		td4.setAttribute("class","textoCampo");
		td4.innerHTML=valorinput4;
		
		td5.setAttribute("style"," text-align:center;");
		td5.setAttribute("width","12%");
		td5.setAttribute("bgcolor","#FFFFFF");
		td5.setAttribute("class","textoCampo");
		td5.innerHTML=valorinput5;
		
		td6.setAttribute("style"," text-align:center;");
		td6.setAttribute("width","12%");
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
	function eliminarProdNece(idAEliminar){
		var elementoAEliminar=document.getElementById(idAEliminar);
		var padreDelElementoAEliminar=elementoAEliminar.parentNode;
		padreDelElementoAEliminar.removeChild(elementoAEliminar);
	}
	/******************************************************************************************************************************************/
	/************************************************* AGREGAR Y ELIMINAR IMPACTO AMBIENTAL ***************************************************/
	/******************************************************************************************************************************************/
	function agregarImpacto(idinput1,idinput2,idinput3,idTablaAInsertar){
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
		inputhidden1.setAttribute("name","impacto"+contadorItem);
		inputhidden1.setAttribute("value",valorinput1);
		inputhidden1.setAttribute("id","nombreprimercampo"+contadorItem)
	
		inputhidden2.setAttribute("type","hidden");
		inputhidden2.setAttribute("name","descripcion"+contadorItem);
		inputhidden2.setAttribute("value",valorinput2);
		inputhidden2.setAttribute("id","nombresegundocampo"+contadorItem)
		
		inputhidden3.setAttribute("type","hidden");
		inputhidden3.setAttribute("name","solucion"+contadorItem);
		inputhidden3.setAttribute("value",valorinput3);
		inputhidden3.setAttribute("id","nombretercercampo"+contadorItem);
		
		img.setAttribute("src","../../../imagenes/delete.png");
		img.setAttribute("alt","Eliminar");
		img.setAttribute("title","Eliminar Impacto");
		img.setAttribute("onclick","eliminarImpacto('"+idTablaAInsertar+contadorItem+"')");
		
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
	function eliminarImpacto(idAEliminar){
		var elementoAEliminar=document.getElementById(idAEliminar);
		var padreDelElementoAEliminar=elementoAEliminar.parentNode;
		padreDelElementoAEliminar.removeChild(elementoAEliminar);
	}
	/******************************************************************************************************************************************/
	/************************************************* AGREGAR Y ELIMINAR IMPACTO AMBIENTAL ***************************************************/
	/******************************************************************************************************************************************/
	function agregarRol(idinput1,idinput2,idinput3,idTablaAInsertar){
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
		inputhidden1.setAttribute("name","rol"+contadorItem);
		inputhidden1.setAttribute("value",valorinput1);
		inputhidden1.setAttribute("id","nombreprimercampo"+contadorItem)
	
		inputhidden2.setAttribute("type","hidden");
		inputhidden2.setAttribute("name","modo"+contadorItem);
		inputhidden2.setAttribute("value",valorinput2);
		inputhidden2.setAttribute("id","nombresegundocampo"+contadorItem)
		
		inputhidden3.setAttribute("type","hidden");
		inputhidden3.setAttribute("name","periodo"+contadorItem);
		inputhidden3.setAttribute("value",valorinput3);
		inputhidden3.setAttribute("id","nombretercercampo"+contadorItem);
		
		img.setAttribute("src","../../../imagenes/delete.png");
		img.setAttribute("alt","Eliminar");
		img.setAttribute("title","Eliminar Rol");
		img.setAttribute("onclick","eliminarRol('"+idTablaAInsertar+contadorItem+"')");
		
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
	function eliminarRol(idAEliminar){
		var elementoAEliminar=document.getElementById(idAEliminar);
		var padreDelElementoAEliminar=elementoAEliminar.parentNode;
		padreDelElementoAEliminar.removeChild(elementoAEliminar);
	}

/******************************************************************************************************************************************/
	/************************************************* AGREGAR Y ELIMINAR TAREAS ***************************************************/
	/******************************************************************************************************************************************/
	function agregarTarea(idinput1,idinput2,idinput3,idinput4,idTablaAInsertar){
		//valores del select
		input1=document.getElementById(idinput1)
		valorinput1=input1.value
		input2=document.getElementById(idinput2)
		valorinput2=input2.value
		input3=document.getElementById(idinput3)
		valorinput3=input3.value
		input4=document.getElementById(idinput4)
		valorinput4=input4.value
		
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
		inputhidden1.setAttribute("name","rol"+contadorItem);
		inputhidden1.setAttribute("value",valorinput1);
		inputhidden1.setAttribute("id","nombreprimercampo"+contadorItem)
	
		inputhidden2.setAttribute("type","hidden");
		inputhidden2.setAttribute("name","modo"+contadorItem);
		inputhidden2.setAttribute("value",valorinput2);
		inputhidden2.setAttribute("id","nombresegundocampo"+contadorItem)
		
		inputhidden3.setAttribute("type","hidden");
		inputhidden3.setAttribute("name","periodo"+contadorItem);
		inputhidden3.setAttribute("value",valorinput3);
		inputhidden3.setAttribute("id","nombretercercampo"+contadorItem);

		inputhidden4.setAttribute("type","hidden");
		inputhidden4.setAttribute("name","periodo"+contadorItem);
		inputhidden4.setAttribute("value",valorinput4);
		inputhidden4.setAttribute("id","nombretercercampo"+contadorItem);
		
		img.setAttribute("src","../../../imagenes/delete.png");
		img.setAttribute("alt","Eliminar");
		img.setAttribute("title","Eliminar Rol");
		img.setAttribute("onclick","eliminarRol('"+idTablaAInsertar+contadorItem+"')");
		
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

		td4.setAttribute("style"," text-align:center;");
		td4.setAttribute("width","30%");
		td4.setAttribute("bgcolor","#FFFFFF");
		td4.setAttribute("class","textoCampo");
		td4.innerHTML=valorinput4;
		
		tdimagen.setAttribute("style","text-align:center;");
		tdimagen.setAttribute("bgcolor","#FFFFFF");
		tdimagen.setAttribute("class","textoCampo");
		
		//Empiezo a organizar la lista
		td1.appendChild(inputhidden1);
		td2.appendChild(inputhidden2);
		td3.appendChild(inputhidden3);
		td4.appendChild(inputhidden4);
		tdimagen.appendChild(img);
		
		tr.appendChild(td1);
		tr.appendChild(td2);
		tr.appendChild(td3);
		tr.appendChild(td4);
		tr.appendChild(tdimagen);
		
		tabla.appendChild(tr);
		
		input1.value=input2.value=input3.value=input4.value="";
		
		contadorItem++;
	}
	function eliminarTarea(idAEliminar){
		var elementoAEliminar=document.getElementById(idAEliminar);
		var padreDelElementoAEliminar=elementoAEliminar.parentNode;
		padreDelElementoAEliminar.removeChild(elementoAEliminar);
	}

/* VALIDAR ITEMS ROLES */
	function validarTarea(tarea,f_date1,f_date2,responsable,id_tabla)
	{



		tarea=document.getElementById(tarea);
		inicio=document.getElementById(f_date1);
		fin=document.getElementById(f_date2);
		responsable=document.getElementById(responsable);
	
		if(tarea.value=='' || inicio.value=='' || fin.value==''|| responsable.value=='')
		{
			alert('Debe ingresar los campos con (*) !!!');
			return false;
		}else
		{
			agregarTarea(tarea,f_date1,f_date2,responsable,id_tabla);
			return true;
		}
	}
	function vaciarTablasDinamicas(idTabla1,idTabla2,idTabla3,idTabla4){
		vaciarNodos(idTabla1,1);
		vaciarNodos(idTabla2,1);
		vaciarNodos(idTabla3,1);
		vaciarNodos(idTabla4,1);
	}
	function vaciarNodos(idElementoAVaciar,cantidadElementosEstaticos){
		elemento=document.getElementById(idElementoAVaciar)
		j=cantidadElementosEstaticos
		for(  i=(elemento.childNodes.length)-1  ;   i>(0+j)    ;  i--  ){
			//alert(elemento.childNodes.item(i))
			elemento.removeChild(elemento.childNodes.item(i))
		}
	}
