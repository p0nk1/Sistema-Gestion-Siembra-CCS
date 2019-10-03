function Validar(theForm)
{

if (theForm.nombreProy.value == "")
  {
    info.innerHTML ="Por favor introduzca el Nombre del Proyecto";
    theForm.nombreProy.focus();
    theForm.nombreProy.style.background='#ffffcc';
	theForm.nombreProy.style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
	theForm.nombreProy.style.backgroundPosition = 'right';
	theForm.nombreProy.style.backgroundRepeat =  'no-repeat';
    return (false);
  }

if (theForm.descripcionProy.value == "")
  {
    info.innerHTML ="Por favor introduzca la Descripcion del Proyecto";
    theForm.descripcionProy.focus();
    theForm.descripcionProy.style.background='#ffffcc';
	theForm.descripcionProy.style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
	theForm.descripcionProy.style.backgroundPosition = 'right';
	theForm.descripcionProy.style.backgroundRepeat =  'no-repeat';
    return (false);
  }

///////////////////////////
if (theForm.area_cons.value == "")
  {
    info.innerHTML ="Por favor introduzca el Area de Construcción";
    theForm.area_cons.focus();
    theForm.area_cons.style.background='#ffffcc';
	theForm.area_cons.style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
	theForm.area_cons.style.backgroundPosition = 'right';
	theForm.area_cons.style.backgroundRepeat =  'no-repeat';
    return (false);
  }


if (isNaN(theForm.area_cons.value)) {

   info.innerHTML ="El campo Area de Construcción debe tener sólo números.";
    theForm.area_cons.focus();
    theForm.area_cons.style.background='#ffffcc';
return false;
}
///////////////////////////////

if (theForm.area_terreno.value == "")
  {
    info.innerHTML ="Por favor introduzca el Area de Terreno";
    theForm.area_terreno.focus();
    theForm.area_terreno.style.background='#ffffcc';
	theForm.area_terreno.style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
	theForm.area_terreno.style.backgroundPosition = 'right';
	theForm.area_terreno.style.backgroundRepeat =  'no-repeat';
    return (false);
  }


if (isNaN(theForm.area_terreno.value)) {

   info.innerHTML ="El campo Area de Terreno debe tener sólo números.";
    theForm.area_terreno.focus();
    theForm.area_terreno.style.background='#ffffcc';
return false;
}

//////////////////////////////////
if (theForm.tiempo_instalacion.value == "")
  {
    info.innerHTML ="Por favor introduzca el Tiempo de Instalación";
    theForm.tiempo_instalacion.focus();
    theForm.tiempo_instalacion.style.background='#ffffcc';
	theForm.tiempo_instalacion.style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
	theForm.tiempo_instalacion.style.backgroundPosition = 'right';
	theForm.tiempo_instalacion.style.backgroundRepeat =  'no-repeat';
    return (false);
  }

////////////////////////////////////
if (theForm.beneficiarios.value == "")
  {
    info.innerHTML ="Por favor introduzca el Número de Beneficiarios";
    theForm.beneficiarios.focus();
    theForm.beneficiarios.style.background='#ffffcc';
	theForm.beneficiarios.style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
	theForm.beneficiarios.style.backgroundPosition = 'right';
	theForm.beneficiarios.style.backgroundRepeat =  'no-repeat';
    return (false);
  }

if (isNaN(theForm.beneficiarios.value)) {

   info.innerHTML ="El campo Beneficiarios debe tener sólo números.";
    theForm.beneficiarios.focus();
    theForm.beneficiarios.style.background='#ffffcc';
return false;
}
////////////////////////////////////
if (theForm.cadena.value == "")
  {
    info.innerHTML ="Por favor introduzca la Cadena";
    document.location.href="#info";
    //theForm.can.focus();
    //theForm.cadena.style.background='#ffffcc';

    return (false);
  }


if (document.formRegistrarProyecto.area_cadena2)
  {

  if (theForm.area_cadena2.value == "")
  {
    info.innerHTML ="Por favor introduzca el Area de la cadena";
    document.location.href="#info";
    //theForm.area_cadena.focus();
    //theForm.area_cadena.style.background='#ffffcc';

    return (false);
  }

  }else{

if (theForm.area_cadena.value == "")
  {
    info.innerHTML ="Por favor introduzca el Area de la cadena";
    document.location.href="#info";
    //theForm.area_cadena.focus();
    //theForm.area_cadena.style.background='#ffffcc';

    return (false);
  }

}

if (theForm.comuna.checked == false && theForm.consejo_comunal.checked == false && theForm.movimiento.checked == false )
  {
    info.innerHTML ="Por favor introduzca el Tipo de Organizacion";
	
   theForm.comuna.focus();
    /* theForm.tipo_org.style.background='#ffffcc';*/

    return (false);
  }
///////////////////

if (theForm.comuna.checked == true )
  {
   
if (theForm.nomb_comuna.value == "")
  {
    info.innerHTML ="Por favor introduzca los nombres de las Comunas ";
       theForm.comuna.focus();
    //theForm.can.focus();
    //theForm.cadena.style.background='#ffffcc';

    return (false);
  }



  }
////////////////////

if (theForm.consejo_comunal.checked == true )
  {
   
if (theForm.nomb_consejo_comunal.value == "")
  {
    info.innerHTML ="Por favor introduzca los nombres de los consejos comunales ";
       theForm.consejo_comunal.focus();
    //theForm.can.focus();
    //theForm.cadena.style.background='#ffffcc';

    return (false);
  }



  }

//////////////////////

if (theForm.movimiento.checked == true )
  {
   
if (theForm.nomb_movimiento.value == "")
  {
    info.innerHTML ="Por favor introduzca los nombres de los Movimientos ";
       theForm.movimiento.focus();
    //theForm.can.focus();
    //theForm.cadena.style.background='#ffffcc';

    return (false);
  }



  }

/////////////////////
if (theForm.comite_eco_comunal.checked == "")
  {
    info.innerHTML ="Por favor indique si existe Comite de Economia Comunal";
    theForm.comite_eco_comunal.focus();
    theForm.comite_eco_comunal.style.background='#ffffcc';

    return (false);
  }

if (theForm.figura_juridica.value == "0")
  {
    info.innerHTML ="Por favor introduzca la Figura Juridica";
    theForm.figura_juridica.focus();
    theForm.figura_juridica.style.background='#ffffcc';

    return (false);
  }

if (theForm.figura_registrada.value == "0")
  {
    info.innerHTML ="Por favor indique si la Figura Juridica esta registrada";
    theForm.figura_registrada.focus();
    theForm.figura_registrada.style.background='#ffffcc';

    return (false);
  }

if (theForm.titularidad.value == "0")
  {
    info.innerHTML ="Por favor introduzca la Titularidad";
    theForm.titularidad.focus();
    theForm.titularidad.style.background='#ffffcc';
	theForm.titularidad.style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
	theForm.titularidad.style.backgroundPosition = 'right';
	theForm.titularidad.style.backgroundRepeat =  'no-repeat';
    return (false);
  }


///////////////////////////financiamiento
var node_monfin = document.getElementsByName('monfin[]');
var node_est_fin = document.getElementsByName('est_fin[]');
var node_ente_fin = document.getElementsByName('ente_fin[]');
var node_monaprob = document.getElementsByName('monaprob[]');
var node_anio_fin = document.getElementsByName('anio_fin[]');
var node_montrasf = document.getElementsByName('montrasf[]');
var node_monpendientetrasf = document.getElementsByName('monpendientetrasf[]');

for (var y = 0; y < node_monfin.length; y++) {

var node1 = node_monfin[y];
var node2 = node_est_fin[y];
var node3 = node_ente_fin[y];
var node4 = node_monaprob[y];
var node5 = node_anio_fin[y];
var node6 = node_montrasf[y];
var node7 = node_monpendientetrasf[y];



if (node1.value == '') {
var e=node1.getAttribute('id');
info.innerHTML ="Por favor indique el Monto del financiamiento";
document.getElementById(e).focus();
document.getElementById(e).style.background='#ffffcc';
document.getElementById(e).style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
document.getElementById(e).style.backgroundPosition = 'right';
document.getElementById(e).style.backgroundRepeat =  'no-repeat';
return false;

}

/*if (isNaN(node1.value)) {
var e=node1.getAttribute('id');
info.innerHTML ="El campo Monto del financiamiento debe tener sólo números.";
document.getElementById(e).focus();
document.getElementById(e).style.background='#ffffcc';
document.getElementById(e).style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
document.getElementById(e).style.backgroundPosition = 'right';
document.getElementById(e).style.backgroundRepeat =  'no-repeat';
return false;
 }*/

/////////////////////////
if (node2.value == '0') {
var e=node2.getAttribute('id');
info.innerHTML ="Por favor indique el Estatus de Finaciamiento";
document.getElementById(e).focus();
document.getElementById(e).style.background='#ffffcc';

return false;


}

/////////////////////////////
if (node2.value == '2') {

if (node3.value == '0') {
var e=node3.getAttribute('id');
info.innerHTML ="Por favor indique el Ente de Financiamiento";
document.getElementById(e).focus();
document.getElementById(e).style.background='#ffffcc';

return false;


}
/////////////////////////
if (node4.value == "") {
var e=node4.getAttribute('id');
info.innerHTML ="Por favor indique el Monto Aprobado";
document.getElementById(e).focus();
document.getElementById(e).style.background='#ffffcc';
document.getElementById(e).style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
document.getElementById(e).style.backgroundPosition = 'right';
document.getElementById(e).style.backgroundRepeat =  'no-repeat';
return false;


}

/*if (isNaN(node4.value)) {
var e=node4.getAttribute('id');
info.innerHTML ="El campo Monto Aprobado debe tener sólo números.";
document.getElementById(e).focus();
document.getElementById(e).style.background='#ffffcc';
document.getElementById(e).style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
document.getElementById(e).style.backgroundPosition = 'right';
document.getElementById(e).style.backgroundRepeat =  'no-repeat';
return false;
 }*/
/////////////////////////
if (node5.value == "") {
var e=node5.getAttribute('id');
info.innerHTML ="Por favor indique el Año de Financiamiento";
document.getElementById(e).focus();
document.getElementById(e).style.background='#ffffcc';

return false;


}
/////////////////////////
if (node6.value == '') {
var e=node6.getAttribute('id');
info.innerHTML ="Por favor indique el Monto Transferido a la Fecha";
document.getElementById(e).focus();
document.getElementById(e).style.background='#ffffcc';

return false;


}

/*if (isNaN(node6.value)) {
var e=node6.getAttribute('id');
info.innerHTML ="El campo Monto Transferido a la Fecha debe tener sólo números.";
document.getElementById(e).focus();
document.getElementById(e).style.background='#ffffcc';
document.getElementById(e).style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
document.getElementById(e).style.backgroundPosition = 'right';
document.getElementById(e).style.backgroundRepeat =  'no-repeat';
return false;
 }*/
/////////////////////////
if (node7.value == '') {
var e=node7.getAttribute('id');
info.innerHTML ="Por favor indique el  Monto Pendiente por Transferir";
document.getElementById(e).focus();
document.getElementById(e).style.background='#ffffcc';

return false;


}

/*if (isNaN(node7.value)) {
var e=node7.getAttribute('id');
info.innerHTML ="El campo Monto Pendiente por Transferir debe tener sólo números.";
document.getElementById(e).focus();
document.getElementById(e).style.background='#ffffcc';
document.getElementById(e).style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
document.getElementById(e).style.backgroundPosition = 'right';
document.getElementById(e).style.backgroundRepeat =  'no-repeat';
return false;
 }*/
/////////////////////////



	}
}

///////////fin financiamiento////////////////////////////

///////////////////

/***************************************Inversion fragmentada*********************************************************/

if (theForm.pago_0.value == "")
  {
    info.innerHTML ="Por favor introduzca la Cantidad Invertida en Infraestructura";
    theForm.pago_0.focus();
    theForm.pago_0.style.background='#ffffcc';
	theForm.pago_0.style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
	theForm.pago_0.style.backgroundPosition = 'right';
	theForm.pago_0.style.backgroundRepeat =  'no-repeat';
    return (false);
  }

if (theForm.pago_1.value == "")
  {
    info.innerHTML ="Por favor introduzca la Cantidad Invertida en Maquinaria, Equipos y Herramientas";
    theForm.pago_1.focus();
    theForm.pago_1.style.background='#ffffcc';
	theForm.pago_1.style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
	theForm.pago_1.style.backgroundPosition = 'right';
	theForm.pago_1.style.backgroundRepeat =  'no-repeat';
    return (false);
  }

if (theForm.pago_2.value == "")
  {
    info.innerHTML ="Por favor introduzca la Cantidad Invertida en Insumos y Materias Primas";
    theForm.pago_2.focus();
    theForm.pago_2.style.background='#ffffcc';
	theForm.pago_2.style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
	theForm.pago_2.style.backgroundPosition = 'right';
	theForm.pago_2.style.backgroundRepeat =  'no-repeat';
    return (false);
  }

if (theForm.pago_3.value == "")
  {
    info.innerHTML ="Por favor introduzca la Cantidad Invertida en Fuerza de Trabajo";
    theForm.pago_3.focus();
    theForm.pago_3.style.background='#ffffcc';
	theForm.pago_3.style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
	theForm.pago_3.style.backgroundPosition = 'right';
	theForm.pago_3.style.backgroundRepeat =  'no-repeat';
    return (false);
  }

if (theForm.pago_4.value == "")
  {
    info.innerHTML ="Por favor introduzca la Cantidad Invertida en Servicios";
    theForm.pago_4.focus();
    theForm.pago_4.style.background='#ffffcc';
	theForm.pago_4.style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
	theForm.pago_4.style.backgroundPosition = 'right';
	theForm.pago_4.style.backgroundRepeat =  'no-repeat';
    return (false);
  }



/************************************************************************************************/
  
if (theForm.productores_directos.value == "")
  {
    info.innerHTML ="Por favor introduzca el Numero de Productores";
    theForm.productores_directos.focus();
    theForm.productores_directos.style.background='#ffffcc';

    return (false);
  }


if (isNaN(theForm.productores_directos.value)) {

   info.innerHTML ="El campo Numero de Productores debe tener sólo números.";
    theForm.productores_directos.focus();
    theForm.productores_directos.style.background='#ffffcc';
return false;
}

///////////////////////

if (theForm.productores_masculino.value == "")
  {
    info.innerHTML ="Por favor introduzca el Numero de Productores masculino";
    theForm.productores_masculino.focus();
    theForm.productores_masculino.style.background='#ffffcc';

    return (false);
  }


if (isNaN(theForm.productores_masculino.value)) {

   info.innerHTML ="El campo Numero de Productores masculino debe tener sólo números.";
    theForm.productores_masculino.focus();
    theForm.productores_masculino.style.background='#ffffcc';
return false;
}

///////////////////////

if (theForm.productores_femenino.value == "")
  {
    info.innerHTML ="Por favor introduzca el Numero de Productores femenino";
    theForm.productores_femenino.focus();
    theForm.productores_femenino.style.background='#ffffcc';

    return (false);
  }


if (isNaN(theForm.productores_femenino.value)) {

   info.innerHTML ="El campo Numero de Productores femenino debe tener sólo números.";
    theForm.productores_femenino.focus();
    theForm.productores_femenino.style.background='#ffffcc';
return false;
}

///////////////////////

if (theForm.productores_indirectos.value == "")
  {
    info.innerHTML ="Por favor introduzca el Numero de Productores Indirectos";
    theForm.productores_indirectos.focus();
    theForm.productores_indirectos.style.background='#ffffcc';

    return (false);
  }


if (isNaN(theForm.productores_indirectos.value)) {

   info.innerHTML ="El campo Numero de Productores Indirectos debe tener sólo números.";
    theForm.productores_indirectos.focus();
    theForm.productores_indirectos.style.background='#ffffcc';
return false;
}


///////////////////////

if (theForm.fecha_inicio_produccion.value == "")
  {
    info.innerHTML ="Por favor introduzca el Numero de Productores femenino";
    theForm.fecha_inicio_produccion.focus();
    theForm.fecha_inicio_produccion.style.background='#ffffcc';
    	theForm.fecha_inicio_produccion.style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
	theForm.fecha_inicio_produccion.style.backgroundPosition = 'right';
	theForm.fecha_inicio_produccion.style.backgroundRepeat =  'no-repeat';
    return (false);
  }

///////////////////////

if (theForm.producto_principal.value == "")
  {
    info.innerHTML ="Por favor introduzca el Producto Principal";
    theForm.producto_principal.focus();
    theForm.producto_principal.style.background='#ffffcc';
    	theForm.producto_principal.style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
	theForm.producto_principal.style.backgroundPosition = 'right';
	theForm.producto_principal.style.backgroundRepeat =  'no-repeat';
    return (false);
  }

///////////////////////

if (theForm.unidades_produccion.value == "")
  {
    info.innerHTML ="Por favor introduzca el Número de Unidades de Producción";
    theForm.unidades_produccion.focus();
    theForm.unidades_produccion.style.background='#ffffcc';
    	theForm.unidades_produccion.style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
	theForm.unidades_produccion.style.backgroundPosition = 'right';
	theForm.unidades_produccion.style.backgroundRepeat =  'no-repeat';
    return (false);
  }


if (isNaN(theForm.unidades_produccion.value)) {

   info.innerHTML ="El campo Unidades de Producción debe tener sólo números.";
    theForm.unidades_produccion.focus();
    theForm.unidades_produccion.style.background='#ffffcc';
return false;
}

//////////////////////

if (theForm.meta_produccion.value == "")
  {
    info.innerHTML ="Por favor introduzca la Capacidad a Instalar";
    theForm.meta_produccion.focus();
    theForm.meta_produccion.style.background='#ffffcc';
    	theForm.meta_produccion.style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
	theForm.meta_produccion.style.backgroundPosition = 'right';
	theForm.meta_produccion.style.backgroundRepeat =  'no-repeat';
    return (false);
  }

///////////////////////


if (theForm.elaboracion.value == "0")
  {
    info.innerHTML ="El campo Elaboración del Proyecto no puede ser Vacio";
    theForm.elaboracion.focus();
    theForm.elaboracion.style.background='#ffffcc';
	theForm.elaboracion.style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
	theForm.elaboracion.style.backgroundPosition = 'right';
	theForm.elaboracion.style.backgroundRepeat =  'no-repeat';
    return (false);
  }


if (theForm.formacion.value == "0")
  {
    info.innerHTML ="El campo Proceso Formativo no puede ser Vacio";
    theForm.formacion.focus();
    theForm.formacion.style.background='#ffffcc';
	theForm.formacion.style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
	theForm.formacion.style.backgroundPosition = 'right';
	theForm.formacion.style.backgroundRepeat =  'no-repeat';
    return (false);
  }


if (theForm.balance.value == "")
  {
    info.innerHTML ="Por favor introduzca el Balance Político del Proyecto";
    theForm.balance.focus();
    theForm.balance.style.background='#ffffcc';
	theForm.balance.style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
	theForm.balance.style.backgroundPosition = 'right';
	theForm.balance.style.backgroundRepeat =  'no-repeat';
    return (false);
  }


///////////////////////


  
if (theForm.estado.value == "0")
  {
    info.innerHTML ="Por favor introduzca el Estado";
    theForm.estado.focus();
    theForm.estado.style.background='#ffffcc';

    return (false);
  }

if (theForm.municipio.value == "0")
  {
    info.innerHTML ="Por favor introduzca el Municipio";
    theForm.municipio.focus();
    theForm.municipio.style.background='#ffffcc';

    return (false);
  }

if (theForm.circuito.value == "0")
  {
    info.innerHTML ="Por favor introduzca el Circuito";
    theForm.circuito.focus();
    theForm.circuito.style.background='#ffffcc';

    return (false);
  }

if (theForm.parroquia.value == "0")
  {
    info.innerHTML ="Por favor introduzca la Parroquia";
    theForm.parroquia.focus();
    theForm.parroquia.style.background='#ffffcc';

    return (false);
  }

if (theForm.eje_parroquial.value == "0")
  {
    info.innerHTML ="Por favor introduzca el Eje Parroquial";
    theForm.eje_parroquial.focus();
    theForm.eje_parroquial.style.background='#ffffcc';

    return (false);
  }

if ((theForm.latitud.value == "") || (theForm.longitud.value == "")) 
  {
    info.innerHTML ="Por favor Haga click en el mapa y mueva el marcador para llenar los campos Latitud y Longitud";
        document.location.href="#info";
    theForm.latitud.style.background='#ffffcc';
    theForm.longitud.style.background='#ffffcc';

    return (false);
  }

if (theForm.direccion_proyecto.value == "")
  {
    info.innerHTML ="Por favor introduzca La Direccion del Proyecto";
    theForm.direccion_proyecto.focus();
    theForm.direccion_proyecto.style.background='#ffffcc';
	theForm.direccion_proyecto.style.backgroundImage = 'url(../imagenes/warning_obj.gif)';
	theForm.direccion_proyecto.style.backgroundPosition = 'right';
	theForm.direccion_proyecto.style.backgroundRepeat =  'no-repeat';
    return (false);
  }

///////////////////////////////////////////////////////////////////
var node_list = document.getElementsByTagName('input');
for (var i = 0; i < node_list.length; i++) {
//alert(i);
var node = node_list[i];
if (node.getAttribute('type') == 'file') {
if (node.value == '') {
alert("Por favor seleccione la imagen a subir");
return false;
}
}
}
var node_lista = document.getElementsByName('descripcion[]');
for (var y = 0; y < node_lista.length; y++) {

//alert(y);
var node = node_lista[y];


if (node.value == "") {
var e=node.getAttribute('id');
alert("Debe colocar una descripcion a las imagenes");

document.getElementById(e).focus();
document.getElementById(e).style.background='#ffffcc';
return false;
}

}
///////////////////////////////////////////////////////////////
}
