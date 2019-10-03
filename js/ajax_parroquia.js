//Variable General para el trabajo XmlHttpObject
var http_parroquia = getXmlHttpObject_parroquia();

var url_parroquia   = "../ajax/parroquia_ajax.php?id_municipio=";
function respuesta_ajax_parroquia()
{
	if (http_parroquia.readyState == 4)
	{
		results_parroquia = http_parroquia.responseText;
		document.getElementById('id_parroquia').innerHTML = results_parroquia;
	}
}

function cargarParroquia()
{
	var valor_id=document.getElementById('municipio').value;
	id_municipio=valor_id;
	document.getElementById('id_parroquia').innerHTML = "<select data-placeholder='Seleccione Estado...' class='chzn-select' style='width:150px;' tabindex='2' id='parroquia' name='parroquia'><option value=''>Seleccione...</option></select>";
	if(valor_id>0)
	{
		http_parroquia.open("GET", url_parroquia+id_municipio, true);
		http_parroquia.onreadystatechange = respuesta_ajax_parroquia;
		http_parroquia.send(null);
	}
}

/************** Funciones Generales para metodo GET **************/
function getXmlHttpObject_parroquia()
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