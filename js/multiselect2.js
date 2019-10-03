$(function(){


$("#cadena").multiselect(

{

 multiple: false,
 header: "Seleccione",
 selectedList:1,
 show: ["slide", 200],
 hide: ["drop", 500]


 }

);



$("#vacio").multiselect(

{ header: "Seleccione la Cadena", height: 2 }

);

$("#vacio").multiselect({
   show: ["slide", 200],
   hide: ["drop", 500]
});


/*
$(function(){
	$("#nomb_comuna").multiselect(

{ selectedList:100 }

);

$("#nomb_comuna").multiselect({
   show: ["slide", 200],
   hide: ["drop", 500]
});

});




$(function(){
	$("#nomb_consejo_comunal").multiselect(

{ selectedList:100 }

);

$("#nomb_consejo_comunal").multiselect({
   show: ["slide", 200],
   hide: ["drop", 500]
});


});



$(function(){
	$("#nomb_movimiento").multiselect(

{ selectedList:100 }

);

$("#nomb_movimiento").multiselect({
   show: ["slide", 200],
   hide: ["drop", 500]
});


});
*/

	

});


$(function(){
	$("#area_cadena").multiselect(

{ selectedList:100 }

);

$("#area_cadena").multiselect({
   show: ["slide", 200],
   hide: ["drop", 500]
});


});


$(function(){
	$("#area_cadena2").multiselect(

{ selectedList:100 }

);

$("#area_cadena2").multiselect({
   show: ["slide", 200],
   hide: ["drop", 500]
});


});

//Cargar area cadena
function cargar(variable){

//alert(variable);

if (variable != ""){

if(document.getElementById('bd')){

document.getElementById('bd').innerHTML = "";
}
document.getElementById('respuesta').style.display = "none";
document.getElementById('o').style.display = "block";

$.get("../ajax/cadena.php",{id_cadena:variable},function(respuesta){
$('#respuesta').html(respuesta);

setTimeout('muestra()', 100);

}
);
	}else{

document.getElementById('respuesta').style.display = "none";
document.getElementById('o').style.display = "block";
	}
}

function muestra(){
document.getElementById('o').style.display = "none";
document.getElementById('respuesta').style.display = "block";
}
//fin Cargar area cadena


