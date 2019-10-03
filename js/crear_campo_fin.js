function enumerar(){



var node_lista = document.getElementsByName('numero');
for (var y =0; y < node_lista.length; y++) {

//alert(y);
var node = node_lista[y];



var e=node.getAttribute('id');
//alert("numero "+e);
node.value = y+1;
//document.getElementById(e).focus();
//document.getElementById(e).style.background='#ffffcc';



}


}


var id= 1;

function nueva_linea2() {
	++id;
	//alert(++id);

/*r=id%2;

if (r==0){
p="#eaeaea";
}else{
p="#ffffff";
}*/
/*bgcolor="'+ p +'"  background:'+ p +';*/

$("#adicional").append('<TABLE border="0" cellpadding="2" cellspacing="1" align="center" width="90%" bgcolor="#D6D6D6" id="'+id+'"><TR ><TD class="subtituloBackground" colspan="5"> Financiamiento Adicional <input type="text" name="numero" value="1" id="num1" style="border:none;background-color:transparent;" size="2" readonly></TD><TD> <a onclick="elimCampo('+id+')" style="color: #cc3300;text-align:left">Eliminar</a></TD></TR><TR><TD class="tituloTablas" bgcolor="White" style="width:18%">&nbsp;&nbsp;&nbsp; Monto Solicitado <span class="campo_obligatorio">*&nbsp;</span></TD><TD bgcolor="White" class="tituloTablas" style="width:22%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="text-transform:uppercase;" value="0" maxlength="105" name="monfin[]" id="monfin_adicional"  type="text" size="16" onfocus="if (this.value == \'0\') {this.value = \'\';}"  onblur="this.style.backgroundColor=\'#ffffff\';this.style.backgroundImage=\'\';if (this.value == \'\') {this.value = \'0\';}" onkeyup="puntitos(this,this.value.charAt(this.value.length-1))"> Bs.</TD><TD class="tituloTablas" bgcolor="White">&nbsp; Estatus de Finaciamiento <span class="campo_obligatorio">*&nbsp;</span></TD><TD align="center" bgcolor="White"><?php cargar_Combo("est_fin[]", "est_fin'+id+'", $conn, query_estatus(), $financiamiento[$indice]["fin"]["estatus"],"onchange=\"inhabilita();\""); ?></TD><TD class="tituloTablas" align="center" bgcolor="White"> Ente de Financiamiento<span class="campo_obligatorio">*&nbsp;</span></TD><TD align="center" bgcolor="White"><?php cargar_Combo("ente_fin[]", "ente_fin'+id+'" , $conn, query_ente(), $financiamiento[$indice]["fin"]["ente"],""); ?></TD></TR><tr><TD class="tituloTablas" bgcolor="White" style="width:18%">&nbsp;&nbsp;&nbsp; Monto Aprobado <span class="campo_obligatorio">*&nbsp;</span></TD><TD bgcolor="White" class="tituloTablas">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="text-transform:uppercase;" maxlength="105" value="0" name="monaprob[]" id="monaprob_adicional'+id+'" type="text" size="16" onfocus="if (this.value == \'0\') {this.value = \'\';}"  onblur="this.style.backgroundColor=\'#ffffff\';this.style.backgroundImage=\'\';if (this.value == \'\') {this.value = \'0\';}" onkeyup="puntitos(this,this.value.charAt(this.value.length-1))"> Bs.</TD><TD class="tituloTablas" align="center" bgcolor="White"> Año de Financiamiento<span class="campo_obligatorio">*&nbsp;</span></TD><TD align="center" bgcolor="White"><select name="anio_fin[]" id="anio_fin_adicional'+id+'" style="width:150px" onblur="this.style.backgroundColor=\'#ffffff\'"><option value="">--Seleccione--</option> <?php $i=0; for($i=1999;$i<=2013;$i++){  ?><option value="<? echo $i?>"><? echo $i?></option>";<?php }	?></select></TD> <TD class="tituloTablas" bgcolor="White" style="width:18%">&nbsp;&nbsp;&nbsp; Monto Transferido a la Fecha <span class="campo_obligatorio">*&nbsp;</span></TD><TD bgcolor="White" class="tituloTablas"><input style="text-transform:uppercase;" maxlength="105" name="montrasf[]" id="montrasf_adicional'+id+'" value="0"  type="text" size="16" onfocus="if (this.value == \'0\') {this.value = \'\';}"  onblur="this.style.backgroundColor=\'#ffffff\';this.style.backgroundImage=\'\';if (this.value == \'\') {this.value = \'0\';}" onkeyup="puntitos(this,this.value.charAt(this.value.length-1))"> Bs.</TD></tr><tr><TD class="tituloTablas" bgcolor="White" style="width:18%" colspan="">&nbsp;&nbsp;&nbsp; Monto Pendiente por<br>&nbsp;&nbsp;&nbsp; Transferir<span class="campo_obligatorio">*</span></TD><TD bgcolor="White" colspan="5" class="tituloTablas">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="text-transform:uppercase;" maxlength="105" value="0" name="monpendientetrasf[]" id="monpendientetrasf_adicional'+id+'"  type="text" size="16" onfocus="if (this.value == \'0\') {this.value = \'\';}"  onblur="this.style.backgroundColor=\'#ffffff\';this.style.backgroundImage=\'\';if (this.value == \'\') {this.value = \'0\';}" onkeyup="puntitos(this,this.value.charAt(this.value.length-1))"> Bs.<input  maxlength="105" name="tipo_fin[]" type="hidden" value="adicional" size="20"></TD> <!--fin financiamiento adicional--></TR></TABLE>');

enumerar();
}


function elimCampo (evt){
  // evt = evento(evt);

document.getElementById(evt).style.background='#ffffcc';
var agree=confirm("Se borrara los campos del Financiamiento seleccionado!\n ¿Esta seguro que desea continuar?"); 
if (agree) {
   div = document.getElementById(evt);
   div.parentNode.removeChild(div);
	
enumerar(); 
}else{
document.getElementById(evt).style.background='#D6D6D6'; 
return false ; 

}


  // nCampo = rObj(evt);

}
