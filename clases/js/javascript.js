///////////////////////////////////////solo permite escribir en un campo números//////////////////////////
function validar(e) {
    tecla = (document.all)?e.keyCode:e.which;
    if (tecla==8) return true;
    patron = /\d/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
} 

/////////////////////////////////////////solo permite escribir en un campo letras////////////////////////
function soloLetras(evt){
	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));
	if (charCode > 33 && (charCode < 48 || charCode > 57) && (charCode < 64 || charCode > 90) && (charCode < 97 || charCode > 122) && (charCode < 160 || charCode > 166))
	{
		alert("Solo se permiten letras en este campo.");
		return false;
	}
	return true;
}
////////////////////////////////////////////////////suma cantidades en bsf//////////////////////////////////
function sumar( numero )
{
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

////////////////////////////////////////////////calcula porcentaje/////////////////////////////////////////
function porcentaje(valor)
{
	var porcentaje= 0;
	var mercado =0;
	var propuestos=0;
	for( i=1 ; i<=20; i++ )
	{	
		mercado		=document.getElementById('mercado_bsf'+i).value;
		propuestos 	=document.getElementById('propuestos_bsf'+i).value;
		if (mercado!='' && propuestos!='')
		{
			porcentaje= 100-((parseInt(propuestos)*100)/parseInt(mercado))
			document.getElementById('ahorro_bsf'+i).value = porcentaje+'%';
		}
	}
}

function indirectos(valor)
{
	
	var total_empl_indirectos = 0;
	var empl_directos = document.getElementById('empl_directos').value;
	total_empl_indirectos = parseInt(empl_directos)*3;
	document.getElementById('empl_indirectos').value = total_empl_indirectos;
}

/////////////////////////////////////////////inicio de adjuntar archivo///////////////////////////////////////
var numero = 0;
// Funciones comunes
c= function (tag) { // Crea un elemento
	return document.createElement(tag);
}
d = function (id) { // Retorna un elemento en base al id
   	return document.getElementById(id);
}
e = function (evt) { // Retorna el evento
   	return (!evt) ? event : evt;
}
f = function (evt) { // Retorna el objeto que genera el evento
   	return evt.srcElement ?  evt.srcElement : evt.target ;
}
	
addField = function () {
	container = d('files');
	cambiame(0)
	span = c('SPAN');
	span.className = 'file';
	span.id = 'file' + (++numero);
	
	field = c('INPUT');   
	field.name = 'archivos[]';
	field.type = 'file';
	//field.class = 'field';
	field.size = '50';
	
	a = c('A');
	a.name = span.id;
	a.href = '#';
	a.onclick = removeField;
	a.innerHTML = 'Eliminar';
	a.class= 'link';

	span.appendChild(field);
	span.appendChild(a);
	container.appendChild(span);
}
	removeField = function (evt) {
	lnk = f(e(evt));
	span = d(lnk.name);
	span.parentNode.removeChild(span);
	--numero;
	if(numero==0)
	{
	cambiame(1);
	}
}
function cambiame(b)
{
if(b!=1)
	{
	document.getElementById('url_adj').innerHTML='<a href="#" class="texto_link1" accesskey="5" onClick="addField()">Adjuntar otro archivo</a>';
	}
else
	{
	document.getElementById('url_adj').innerHTML='<a href="#" class="texto_link1" accesskey="5" onClick="addField()">Adjuntar  archivo</a>';
	}
}
	
function objetoAjax(){
		var xmlhttp=false;
		try {
			   xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			   try {
				  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			   } catch (E) {
					   xmlhttp = false;
			   }
		}
		if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
				   xmlhttp = new XMLHttpRequest();
		}
		return xmlhttp;
}
	
function consulta(fuente,div)
{     
	eval("var contenedor_"+div+"=document.getElementById('"+div+"');");                
	eval("var objeto_"+div+"=objetoAjax();");                
	eval('objeto_'+div+'.open("GET", "'+fuente+'");');
	eval('objeto_'+div+'.onreadystatechange=function(){ if (objeto_'+div+'.readyState!=4) { contenedor_'+div+'.innerHTML = "<img src=images/espera.gif>"; } if (objeto_'+div+'.readyState==4) { contenedor_'+div+'.innerHTML = objeto_'+div+'.responseText; }} ');
	eval('objeto_'+div+'.send(null)');
}
		
function check_tipo(id)
{
	consulta('items_caso.php?tipo='+id,'datos_tipo_caso');
}

///////////////////////////////////////////////fin adjuntar archivo///////////////////////////////////

// funcion agregar materiales
function mas(){
	var total = document.getElementById("total").value;
	total = parseInt(total) + 1;
	div = "div"+eval(total);
	document.getElementById( div ).style.display = "block";
	document.getElementById("total").value = total ;
}// fin funcion mas()

// funcion quitar materiales
function menos(){
	var total = document.getElementById("total").value;
	div = "div"+eval(total);
	document.getElementById( div ).style.display = "none";
	total = parseInt(total) -1;
	document.getElementById("total").value = total ;
}// fin funcion menos()

// funcion agregar equipos
function mas2(){
	var total2 = document.getElementById("total2").value;
	total2 = parseInt(total2) + 1;
	div2 = "div2"+eval(total2);
	document.getElementById( div2 ).style.display = "block";
	document.getElementById("total2").value = total2 ;
}// fin funcion mas()

// funcion quitar equipos
function menos2(){
	var total2 = document.getElementById("total2").value;
	div2 = "div2"+eval(total2);
	document.getElementById( div2 ).style.display = "none";
	total2 = parseInt(total2) -1;
	document.getElementById("total2").value = total2 ;
}// fin funcion menos()

// funcion agregar equipos
function mas3(){
	var total3 = document.getElementById("total3").value;
	total3 = parseInt(total3) + 1;
	div3 = "div3"+eval(total3);
	document.getElementById( div3 ).style.display = "block";
	document.getElementById("total3").value = total3 ;
}// fin funcion mas()

// funcion quitar equipos
function menos3(){
	var total3 = document.getElementById("total3").value;
	div3 = "div3"+eval(total3);
	document.getElementById( div3 ).style.display = "none";
	total3 = parseInt(total3) -1;
	document.getElementById("total3").value = total3 ;
}// fin funcion menos()

/***************************************************************************************************************************************/
function mas4(){
	var total4 = document.getElementById("total4").value;
	total4 = parseInt(total4) + 1;
	div4 = "div4"+eval(total4);
	document.getElementById( div4 ).style.display = "block";
	document.getElementById("total4").value = total4 ;
}// fin funcion mas()

// funcion quitar equipos
function menos4(){
	var total4 = document.getElementById("total4").value;
	div4 = "div4"+eval(total4);
	document.getElementById( div4 ).style.display = "none";
	total4 = parseInt(total4) -1;
	document.getElementById("total4").value = total4 ;
}
/***************************************************************************************************************************************/

/***************************************************************************************************************************************/

// Variables para setear
onload = function(){
	cAyuda=document.getElementById("mensajesAyuda");
	cNombre=document.getElementById("ayudaTitulo");
	cTex=document.getElementById("ayudaTexto");
	divTransparente=document.getElementById("transparencia");
	divMensaje=document.getElementById("transparenciaMensaje");
	form=document.getElementById("formulario");
	urlDestino="mail.php";
	
	claseNormal="input";
	claseError="inputError";
	
	ayuda=new Array();
	ayuda["Productos"]="Ingrese los Productos que dispone el Proveedor. Minimo 1 Producto. OBLIGATORIO";
	ayuda["Insumos"]="Ingrese los Insumos que dispone el Proveedor. Minimo 1 Insumo. OBLIGATORIO";
	
	preCarga("ok.gif", "loading.gif", "error.gif");
}// fin onload= function

function preCarga(){

	imagenes=new Array();
	for(i=0; i<arguments.length; i++){
		imagenes[i]=document.createElement("img");
		imagenes[i].src=arguments[i];
	}
}// fin preCarga


/*	ayuda	  */
// Mensajes de ayuda

if(navigator.userAgent.indexOf("MSIE")>=0) navegador=0;
else navegador=1;

function colocaAyuda(event){

	if(navegador==0){
		var corX=window.event.clientX+document.documentElement.scrollLeft;
		var corY=window.event.clientY+document.documentElement.scrollTop;
	}
	else{
		var corX=event.clientX+window.scrollX;
		var corY=event.clientY+window.scrollY;
	}

	cAyuda.style.top=corY+20+"px";
	cAyuda.style.left=corX+15+"px";
}// fin colocaAyuda

function ocultaAyuda(){

	cAyuda.style.display="none";
	if(navegador==0){
		document.detachEvent("onmousemove", colocaAyuda);
		document.detachEvent("onmouseout", ocultaAyuda);
	}
	else{
		document.removeEventListener("mousemove", colocaAyuda, true);
		document.removeEventListener("mouseout", ocultaAyuda, true);
	}
}// fin ocultaAyuda

function muestraAyuda(event, campo){

	colocaAyuda(event);
	if(navegador==0){
		document.attachEvent("onmousemove", colocaAyuda);
		document.attachEvent("onmouseout", ocultaAyuda);
	}
	else{
		document.addEventListener("mousemove", colocaAyuda, true);
		document.addEventListener("mouseout", ocultaAyuda, true);
	}
	
	cNombre.innerHTML=campo;
	cTex.innerHTML=ayuda[campo];
	cAyuda.style.display="block";
}// fin muestraAyuda
/***************************************************************************************************************************************/

