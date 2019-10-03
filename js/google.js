function initialize_data( lat , lon, nombre )
{
    if (GBrowserIsCompatible())
    {
        var map = new GMap2(document.getElementById("map_canvas"));

        var center = new GLatLng(lat,lon);
        map.setCenter(center, 15);

        map.addControl(new GLargeMapControl()); //Añade el control para el desplazamiento
        map.addControl(new GMapTypeControl()); //vista de satelite,mapa e hibrido

        //Definiendo valores para la Imagen y la sombra de esta
        var baseIcon              = new GIcon();
        baseIcon.image            = "../imgs/fabrica.png";
        //baseIcon.shadow           = "modulo_desarrollo/googlemap/shadow-casa.png";
        baseIcon.iconSize         = new GSize (26.0, 25.0);
        baseIcon.shadowSize       = new GSize (43.0, 28.0);
        baseIcon.iconAnchor       = new GPoint(14.0, 14.0);
        baseIcon.infoWindowAnchor = new GPoint(14.0, 14.0);
        var icon;
        icon = new GIcon(baseIcon);

        var punto = new GLatLng(parseFloat(lat),parseFloat(lon));
        var marca = createMarker_data( punto , nombre ,icon ); // llama a la funcion que esta abajo cuando se hace clic en el globo
        map.addOverlay(marca);
    }
}

function createMarker_data(punto , nombre , icon) 
{
    //var marker = new GMarker(punto,icon);
    var marker = new GMarker(punto);
    GEvent.addListener(marker, 'click', function()
    {
        var html = "<b>Nombre:</b> "+nombre+"<br><b>Latitud:</b> "+punto.x+"<br>"+"<b>Longitud: </b>"+punto.y;
        marker.openInfoWindowHtml(html);
    });
    return marker;
}


/*function initialize()
{
	//if (GBrowserIsCompatible())
	//{
		var map = new GMap2(document.getElementById("map_canvas"));
		var center = new GLatLng(8.53, -66.75);map.setCenter(center, 5);

		//Definiendo valores para la Imagen y la sombra de esta
		var baseIcon              = new GIcon();
		baseIcon.image            = "casa.png";
		baseIcon.shadow           = "shadow-casa.png";
		baseIcon.iconSize         = new GSize (28.0, 28.0);
		baseIcon.shadowSize       = new GSize (43.0, 28.0);
		baseIcon.iconAnchor       = new GPoint(14.0, 14.0);
		baseIcon.infoWindowAnchor = new GPoint(14.0, 14.0);

		var icon;
		icon = new GIcon(baseIcon);

		map.addControl(new GLargeMapControl()); //A�ade el control para el desplazamiento
		map.addControl(new GMapTypeControl()); //vista de satelite,mapa e hibrido

		//editar
		map.addControl(new GMapTypeControl());
		var marker = new GMarker(center,{draggable: true});
		
		GEvent.addListener(marker, icon,"dragstart", function() 
		{	
			map.closeInfoWindow();
		
		});
		GEvent.addListener(marker, "dragend", function(latlng) 
		{	
			marker.openInfoWindowHtml("Ubicaci&oacute;n:<br>Latitud: "+latlng.lat()+"<br>Longitud:"+latlng.lng());
			document.getElementById("latitud").value=latlng.lat();
			document.getElementById("longitud").value=latlng.lng();
		});
		map.addOverlay(marker);
	//}
}*/
/*
function cargarIcono(icon)
{
//alert(icon);
icono="../imagenes/"+icon+".png";
//alert(icono);
initialize('10.491606770716423',' -66.90326262963868',13,icono);
}
*/
function initialize(lat,lon,grado,icono)
{


if (icono == ""){
var icon = "../imagenes/marker_black.png";

}else{
var icon = "../imagenes/"+icono+".png";

}

//variable crosshair
    var crosshairShape = {coords:[0,0,0,0],type:'rect'};
var map;
  /* Devuelve al usuario al inicio. Este constructor toma
  * El control DIV como argumento.*/


function HomeControl(controlDiv, map) {

 // Define estilos CSS para el DIV que contiene el control

  controlDiv.style.padding = '5px';
  controlDiv.style.paddingRight = '0px';

  //CSS para el borde
  var controlUI = document.createElement('DIV');
  controlUI.style.backgroundColor = 'white';
  controlUI.style.borderStyle = 'solid';
  controlUI.style.borderWidth = '1px';
  controlUI.style.cursor = 'pointer';
  controlUI.style.textAlign = 'center';
  controlUI.title = 'Inicio';
  controlDiv.appendChild(controlUI);

  //CSS for el interior
  var controlText = document.createElement('DIV');
  controlText.style.fontFamily = 'Arial,sans-serif';
  controlText.style.fontSize = '14px';
  controlText.style.paddingLeft = '10px';
  controlText.style.paddingRight = '10px';
  controlText.innerHTML = 'Inicio';
  controlUI.appendChild(controlText);



  // Configuración de los detectores de eventos clic: devuelve al inicio del mapa
  google.maps.event.addDomListener(controlUI, 'click', function() {

		document.formRegistrarProyecto.lat.value="";// para vaciar campo
		document.formRegistrarProyecto.lng.value="";
		document.formRegistrarProyecto.address.value="";
	initialize('10.491606770716423',' -66.90326262963868',13 , '');
	
  });
}


    //var map = new GMap2(document.getElementById("map_canvas"));
    var latlng = new google.maps.LatLng(lat, lon);
    var myOptions = {
        zoom: grado,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.HYBRID,
        zoomControl: true,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.LARGE,
            position: google.maps.ControlPosition.LEFT_CENTER
        },
        streetViewControl: false, scrollwheel: false
    };

    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);


// Crea el DIV para mantener el control y llama al HomeControl () constructor
// Pasado en este DIV.
  var homeControlDiv = document.createElement('DIV');
  var homeControl = new HomeControl(homeControlDiv, map);

  homeControlDiv.index = 1;
  map.controls[google.maps.ControlPosition.TOP_RIGHT].push(homeControlDiv);

//crosshair
var marker = new google.maps.Marker({
	map: map,
	icon: '../imagenes/cross-hairs.gif',
	shape: crosshairShape
});
marker.bindTo('position', map, 'center'); 
//fin crosshair

    //var marker = new Marker(latlng, {draggable: true});
    var marker = new google.maps.Marker({
        position: latlng,
        draggable: true,
	icon: icon
    });

    // Add dragging event listeners.
    google.maps.event.addListener(marker, 'dragstart', function(mEvent) {
        updateMarkerAddress('Moviendo...');
        datos = mEvent.latLng.toString(); 
        datos = datos.split('(');
        datos = datos[1];
        datos = datos.split(')');
        datos = datos[0];
        datos = datos.split(',');
        document.getElementById("lat").value  = datos[0];
        document.getElementById("lng").value = datos[1];
    });

    google.maps.event.addListener(marker, 'drag', function(mEvent) {
        updateMarkerAddress('Moviendo...');
        updateMarkerStatus('Moviendo...');
        datos = mEvent.latLng.toString(); 
        datos = datos.split('(');
        datos = datos[1];
        datos = datos.split(')');
        datos = datos[0];
        datos = datos.split(',');
        document.getElementById("lat").value  = datos[0];
        document.getElementById("lng").value = datos[1];
    });
  
    google.maps.event.addListener(marker, "dragend", function (mEvent) 
    { 
        updateMarkerStatus('Estatico');
        geocodePosition(marker.getPosition());
        datos = mEvent.latLng.toString(); 
        datos = datos.split('(');
        datos = datos[1];
        datos = datos.split(')');
        datos = datos[0];
        datos = datos.split(',');
        document.getElementById("lat").value  = datos[0];
        document.getElementById("lng").value = datos[1];
            
		
    });
    marker.setMap(map);
	
}

function createMarker(punto,icon) 
{
    var marker = new GMarker(punto,icon);

    GEvent.addListener(marker, 'click', function() {
        var html = "Latitud: "+punto.x+"<br>"+"Longitud: "+punto.y;

        marker.openInfoWindowHtml(html);
    });
    return marker;
}


function buscar_latitud_longitud(estado,municipio,parroquia,icono)
{
	
    if( estado>0 && municipio==0 && parroquia==0 )
    {   
        for(i=0 ; i< edo.length ; i++)
        {   
            if(edo[i][0]==estado)
            {

		document.formRegistrarProyecto.lat.value="";// para vaciar campo
		document.formRegistrarProyecto.lng.value="";
		//document.formRegistrarProyecto.address.value="";
                document.getElementById('map_canvas').innerHTML = "";
                initialize(edo[i][1],edo[i][2],8,icono)
                break;
            }
        }
    }
    if( estado==0 && municipio>0 && parroquia==0 )
    {   
        for(i=0 ; i< mun.length ; i++)
        {   
            if(mun[i][0]==municipio)
            {
		document.formRegistrarProyecto.lat.value="";// para vaciar campo
		document.formRegistrarProyecto.lng.value="";
		//document.formRegistrarProyecto.address.value="";
                document.getElementById('map_canvas').innerHTML = "";
                initialize(mun[i][1],mun[i][2],12,icono)
                break;
            }
        }
    }
        
    if( estado==0 && municipio == 0 && parroquia > 0 )
    {   
        for(i=0 ; i< parr.length ; i++)
        {   
            if(parr[i][0]==parroquia)
            {
		document.formRegistrarProyecto.lat.value="";// para vaciar campo
		document.formRegistrarProyecto.lng.value="";
		//document.formRegistrarProyecto.address.value="";
                document.getElementById('map_canvas').innerHTML = "";
                initialize(parr[i][1],parr[i][2],14,icono)
                break;
            }
        }
    }
}


function buscar_latitud_longitud2(estado,municipio,parroquia,icono,bd)
{
	
    if( estado>0 && municipio==0 && parroquia==0 )
    {   
        for(i=0 ; i< edo.length ; i++)
        {   
            if(edo[i][0]==estado)
            {

	
                document.getElementById('map_canvas').innerHTML = "";
                initialize(edo[i][1],edo[i][2],8,icono)
                break;
            }
        }
    }
    if( estado==0 && municipio>0 && parroquia==0 )
    {   
        for(i=0 ; i< mun.length ; i++)
        {   
            if(mun[i][0]==municipio)
            {
	
                document.getElementById('map_canvas').innerHTML = "";
                initialize(mun[i][1],mun[i][2],12,icono)
                break;
            }
        }
    }
        
    if( estado==0 && municipio == 0 && parroquia > 0 )
    {   
        for(i=0 ; i< parr.length ; i++)
        {   
            if(parr[i][0]==parroquia)
            {
		 if(parroquia!=bd)
            		{ 

		document.formRegistrarProyecto.lat.value="";// para vaciar campo
		document.formRegistrarProyecto.lng.value="";
		document.formRegistrarProyecto.address.value="";	

		}
                document.getElementById('map_canvas').innerHTML = "";
                initialize(parr[i][1],parr[i][2],14,icono)
                break;
            }
        }
    }
}


function cargarCoordenadaParroquia()
{
    var id_parroquia=document.getElementById('parroquia').value;
    //document.getElementById('id_parroquia').innerHTML = "<select id='parroquia' name='parroquia'><option value=''>Seleccione...</option></select>";
    if(id_parroquia>0)
    {
        //activar con el mapa
        buscar_latitud_longitud(0,0,id_parroquia);

		
    }
}

function updateMarkerAddress(str) {
   document.getElementById('address').value = str;
}

function updateMarkerStatus(str) {
    document.getElementById('markerStatus').innerHTML = str;
}

var geocoder = new google.maps.Geocoder();


function geocodePosition(pos) {
    geocoder.geocode({
        latLng: pos
    }, function(responses) {
        if (responses && responses.length > 0) {
            updateMarkerAddress(responses[0].formatted_address);
        } else {
            updateMarkerAddress('No se puede determinar la direcci'+String.fromCharCode(243)+'n en esta ubicaci'+String.fromCharCode(243)+'n.');
        }
    });
}
