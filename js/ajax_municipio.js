//Variable General para el trabajo XmlHttpObject
var http_mun = getXmlHttpObject_municipio();

var url_estado   = "../ajax/municipio_ajax.php?id_estado=";

function respuesta_ajax_mun()
{
	if (http_mun.readyState == 4)
	{
		results_mun = http_mun.responseText;
		document.getElementById('id_municipio').innerHTML = results_mun;
	}
}

function cargarEstado()
{
	var valor_id=document.getElementById('estado').value;
	id_estado=valor_id;
	document.getElementById('id_municipio').innerHTML = "<select id='municipio' name='municipio' data-placeholder='Seleccione Estado...' class='chzn-select' style='width:150px;' tabindex='2'><option value=''>Seleccione...</option></select>";
	document.getElementById('id_parroquia').innerHTML = "<select id='parroquia' name='parroquia' data-placeholder='Seleccione Estado...' class='chzn-select' style='width:150px;' tabindex='2'><option value=''>Seleccione Municipio</option></select>";
	if(valor_id>0)
	{
		http_mun.open("GET", url_estado+id_estado, true);
		http_mun.onreadystatechange = respuesta_ajax_mun;
		http_mun.send(null);
	}
}

/************** Funciones Generales para metodo GET **************/
function getXmlHttpObject_municipio()
{
	var xmlhttp;
	if (!xmlhttp && typeof XMLHttpRequest != 'undefined')
	{
		try
		{
			xmlhttp = new XMLHttpRequest();
		}
		catch (e)
		{
			xmlhttp = false;
		}
	}
	return xmlhttp;
}



