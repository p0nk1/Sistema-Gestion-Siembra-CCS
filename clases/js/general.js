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


function reportes(tipo) 
{
	pagina="pdf_calc.php?tipo="+tipo;
	var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=850, height=400, top=85, left=140";
	window.open(pagina,"",opciones);
}

function formato_campo(fld,e,t)
{
	
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

function cargarEspecificacion()
{
	var resp="<INPUT tipe='text' style='size:30' maxlength='30' width='20%' name='otro_org' id='id_tipo_org_otro'>";
	document.getElementById('id_otro').innerHTML=resp;
}

function cargarCondicion()
{
	var resp="<INPUT tipe='text' style='size:30' maxlength='20' width='20%' name='otro_cond' id='id_tipo_cond_otro'>";
	document.getElementById('id_otro_cond').innerHTML=resp;
}

function cargarTerreno()
{
	var resp="<TD align='center' width='13%'><INPUT type='radio' value='produccion' name='condicion_terreno' <?php if ($condicion_terreno=='produccion'){ echo 'checked';}?></TD><TD class='texto_negro'>Propia</TD><TD align='center' width='8%'><INPUT type='radio' value='distribucion' name='condicion_terreno' <?php if ($condicion_terreno=='distribucion'){ echo 'checked';}?></TD><TD class='texto_negro'>Alquilada</TD>";
	document.getElementById('id_terreno_si').innerHTML=resp;
						

}


function cargarTerrenoNo()
{
	var resp="<TD align='center' width='13%'><INPUT type='hidden' value='no' name='condicion_terreno' onchange='document.datos_familiares.submit();'></TD>";
	document.getElementById('id_terreno_si').innerHTML=resp;
						

}


// function cargarTerreno()
// {
// 	var resp="<TD align='center'><INPUT type='radio' value='produccion' name='condicion_terreno' <?php if ($condicion_terreno=='produccion'){ echo 'checked';}?></TD><TD class='texto_negro' width='15%'>Propia</TD><TD  width='5%' align='center'><INPUT type='radio' value='distribucion' name='condicion_terreno' <?php if ($condicion_terreno=='distribucion'){ echo 'checked';}?></TD><TD class='texto_negro' width='15%'>Alquilada</TD><TD  width='5%' align='center'><INPUT type='radio' value='otro_cond' name='condicion_terreno' onchange='cargarCondicion();' <?php if ($condicion_terreno=='otro_cond'){ echo 'checked';}?></TD><TD class='texto_negro'>Otro</TD><TD width='50%'><div id='id_otro_cond'></div></TD>";
// 	document.getElementById('id_terreno_si').innerHTML=resp;
// 						
// 
// }
