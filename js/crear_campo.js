

var numero1 = 0; 
var numero2 = 0;
var numero3 = 0;//Esta es una variable de control para mantener nombres
            //diferentes de cada campo creado dinamicamente.
evento = function (evt) { //esta funcion nos devuelve el tipo de evento disparado
   return (!evt) ? event : evt;
}


var num_arch=0;


//Aqui se hace lamagia... jejeje, esta funcion crea dinamicamente los nuevos campos file
addCampo = function () { 


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





num_arch++;

if (num_arch > 0){

 s.innerHTML = "<a onClick='addCampo()'>Subir otro archivo</a>";
//alert(num_arch);

}

if (num_arch >= 4){

 s.innerHTML = "";
//alert(num_arch);

}


// Creamos los encabezados de las columnas

var trCabeza = document.createElement( 'tr' );
trCabeza.setAttribute("bgcolor", 'White');
var thArtista = document.createElement( 'th' );
//thArtista.innerHTML = 'Artista';

var thAlbum = document.createElement( 'th' );
//thAlbum.innerHTML = 'Album';

var thEliminar = document.createElement( 'th' );

// Insertamos los elementos de la fila

trCabeza.appendChild( thArtista );

trCabeza.appendChild( thAlbum );

trCabeza.appendChild( thEliminar );

// Insertamos la fila al cuerpo de la tabla

adjuntos.appendChild( trCabeza );


//con esto se establece la clase de la div
   trCabeza.className = 'archivo';
//este es el id de la div, aqui la utilidad de la variable numero
//nos permite darle un id unico
  trCabeza.id = 'file' + (++numero1);


//creamos el input para el formulario:
   nCampo = document.createElement('input');
//le damos un nombre, es importante que lo nombren como vector, pues todos los campos
//compartiran el nombre en un arreglo, asi es mas facil procesar posteriormente con php
   nCampo.name = 'archivos[]';
//Establecemos el tipo de campo
   nCampo.type = 'file';
	nCampo.setAttribute("id", 'fil' + (++numero2));
	nCampo.setAttribute("onchange","nombre_ar(this.id);");

//creamos el input descripcion para el formulario:
texto = document.createElement('input');
//le damos un nombre, es importante que lo nombren como vector, pues todos los campos
//compartiran el nombre en un arreglo, asi es mas facil procesar posteriormente con php
  texto.name = 'descripcion[]';
//Establecemos el tipo de campo
 texto.type = 'text';
	texto.setAttribute("id", 'des' + (++numero3));
	texto.setAttribute("maxlength", "150");
	texto.setAttribute("onblur","this.style.backgroundColor='#ffffff'");

img=document.createElement("IMG");


		img.setAttribute("src","../imagenes/cancel.png");
		img.setAttribute("alt","Eliminar");
		img.setAttribute("title","Eliminar");
		img.setAttribute("onclick","elimCamp('"+trCabeza.id+"')");



//Bien es el momento de integrar lo que hemos creado al documento,
//primero usamos la función appendChild para adicionar el campo file nuevo

  thArtista.appendChild(nCampo);
	
   thAlbum.appendChild(texto);

//Adicionamos el Link
    thEliminar.appendChild(img);
//Ahora si recuerdan, en el html hay una div cuyo id es 'adjuntos', bien
//con esta función obtenemos una referencia a ella para usar de nuevo appendChild
//y adicionar la div que hemos creado, la cual contiene el campo file con su link de eliminación:
   container = document.getElementById('adjuntos');
   container.appendChild(trCabeza);
}
//con esta función eliminamos el campo cuyo link de eliminación sea presionado
elimCamp = function (evt){
   evt = evento(evt);
  // nCampo = rObj(evt);
   div = document.getElementById(evt);
   div.parentNode.removeChild(div);
	
   num_arch--;

if (num_arch < 4){

s.innerHTML = "<a onClick='addCampo()'>Subir otro archivo</a>";
//alert(num_arch);

}
if (num_arch < 1){

s.innerHTML = "<a onClick='addCampo()'>Haga click aqui si desea subir Fotos</a>";
//alert(num_arch);

}

}
//con esta función recuperamos una instancia del objeto que disparo el evento
rObj = function (evt) { 
   return evt.srcElement ?  evt.srcElement : evt.target;
}







function nombre_ar(id_archivo){

//alert(id_archivo);

var archivo = document.getElementById(id_archivo).value;


if(navigator.userAgent.indexOf('Linux') != -1){
var SO = "Linux"; }
else if((navigator.userAgent.indexOf('Win') != -1) &&(navigator.userAgent.indexOf('95') != -1)){
var SO = "Win"; }
else if((navigator.userAgent.indexOf('Win') != -1) &&(navigator.userAgent.indexOf('NT') != -1)){
var SO = "Win"; }
else if(navigator.userAgent.indexOf('Win') != -1){
var SO = "Win"; }
else if(navigator.userAgent.indexOf('Mac') != -1){
var SO = "Mac"; }
else { var SO = "no definido";
}

if(SO = "Win"){
var arr_ruta = archivo.split("\\");
}else{
var arr_ruta = archivo.split("/");
}


var nombre_archivo = (arr_ruta[arr_ruta.length-1]);
var ext_validas = /\.(jpeg|jpg|png)$/i.test(nombre_archivo);
if (!ext_validas){
borrar(id_archivo);
alert("Archivo con extensión no válida\nExtensiones Permitidas: jpeg, jpg, png\n\nSu archivo: " + nombre_archivo);
return false;
}

//document.getElementById("valor").innerHTML = "su archivo: <b>" + nombre_archivo + "<\/b>";
}



function borrar(id){
//document.getElementById('valor').innerHTML = "";
var vacio = document.getElementById(id).value = "";
}


