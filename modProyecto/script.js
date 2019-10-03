// JavaScript Document

            $(document).ready(function(){
                fn_dar_eliminar();
				fn_cantidad();
                $("#frm_usu").validate();
            });
			
			function fn_cantidad(){
				cantidad = $("#grilla tbody").find("tr").length;
				var n= cantidad -2;
				$("#span_cantidad").html(n);
				return cantidad;
			};
            
            function fn_agregar(){


//var p=$("#tarea").val();
		
//alert($("#tarea").val());


		/*if ($("#tarea").val()==""){

		alert('Por favor introduzca la Descripción de la Actividad');
		$("#tarea").focus();
    
		exit();
		}

		if ($("#f_date1").val()==""){

		alert('Por favor introduzca la Fecha inicial de la Actividad');
		$("#f_date1").focus();
		exit();
		}

		if ($("#f_date2").val()==""){

		alert('Por favor introduzca la Fecha Final de la Actividad');
		$("#f_date2").focus();
		exit();
		}

		if ($("#id_usuario").val()=="0"){

		alert('Por favor seleccione el responsable de la Actividad');
		$("#id_usuario").focus();
		exit();
		}*/

		/*var n= fn_cantidad() - 1;
                cadena = "<tr bgcolor='White'>";
		cadena = cadena + "<td><div style='text-align:center' class='textoParrafo'>" + n + "</div></td>";
                cadena = cadena + "<td><div style='text-align:justify' class='textoParrafo'>" + $("#tarea").val() +"</div></td>";
                cadena = cadena + "<td><div style='text-align:center' class='textoParrafo'>" + $("#f_date1").val() + "</div></td>";
                cadena = cadena + "<td><div style='text-align:center' class='textoParrafo'>" + $("#f_date2").val() + "</div></td>";
                cadena = cadena + "<td><div style='text-align:justify' class='textoParrafo'>" + $("#responsable").val() + "</div></td>";
                cadena = cadena + "<td align='center'><a class='elimina'><img src='../imagenes/delete.png' /></a></td>";
                $("#grilla tbody").append(cadena);*/
               
                    //aqui puedes enviar un conunto de tados ajax para agregar al usuairo
                    $.post("agregar_actividad.php", {id_proyecto: $("#id_proyecto").val(),tarea: $("#tarea").val(), fecha_inicio: $("#f_date1").val(), 
			fecha_fin: $("#f_date2").val(), id_usuario: $("#id_usuario").val()},function(respuesta){
									$('#respuesta').html(respuesta);});
               
               /* fn_dar_eliminar();
				fn_cantidad();*/
                alert("Actividad Agregada");

//vaciar campos
	$("#tarea").val("");
	$("#f_date1").val("");
	$("#f_date2").val("");
	$("#id_usuario").val("");

            };
            
            function fn_dar_eliminar(){
                $("a.elimina").click(function(){
                    id = $(this).parents("tr").find("td").eq(0).html();
                    respuesta = confirm("Desea eliminar la Tarea: " + id);
                    if (respuesta){
                        $(this).parents("tr").fadeOut("normal", function(){
                            $(this).remove();
				fn_cantidad();

                           // alert("Usuario " + id + " eliminado")
                          
                                //aqui puedes enviar un conjunto de datos por ajax
                                $.post("eliminar_actividad.php", {id_actividad: $("#id_actividad").val()},function(respuesta){
									$('#respuesta').html(respuesta);})
                            
                        })
                    }
                });
            };




function elimCamp (evt){
  // evt = evento(evt);

//alert(evt);
var agree=confirm(" ¡Se Borraran los Datos de la Actividad!\n ¿Esta seguro que desea continuar?"); 
if (agree) {

//aqui puedes enviar un conjunto de datos por ajax
                                $.post("eliminar_actividad.php", {id_proyecto: $("#id_proyecto").val(),id_actividad: evt},function(respuesta){
									$('#respuesta').html(respuesta);});
 alert("Actividad Eliminada");
}else {
return false ; 
}

			

		
}


function elimAvance (evt){
  // evt = evento(evt);

//alert(evt);
var agree=confirm(" ¡Se Borraran los Datos del Avance!\n ¿Esta seguro que desea continuar?"); 
if (agree) {

//aqui puedes enviar un conjunto de datos por ajax
                                $.post("eliminar_avance.php", {id_actividad: $("#id_actividad").val(),id_seguimiento: evt},function(respuesta){
									$('#respuesta').html(respuesta);});
 alert("Avance Eliminado");
}else {
return false ; 
}
			

		
}















