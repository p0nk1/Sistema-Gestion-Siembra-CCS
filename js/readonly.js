function inhabilita(){

var node_est_fin = document.getElementsByName('est_fin[]');
var node_ente_fin = document.getElementsByName('ente_fin[]');
var node_monaprob = document.getElementsByName('monaprob[]');
var node_anio_fin = document.getElementsByName('anio_fin[]');
var node_montrasf = document.getElementsByName('montrasf[]');
var node_monpendientetrasf = document.getElementsByName('monpendientetrasf[]');

for (var y = 0; y < node_est_fin.length; y++) {


var estatus = node_est_fin[y];
var nodo1 = node_ente_fin[y];
var nodo2 = node_monaprob[y];
var nodo3 = node_anio_fin[y];
var nodo4 = node_montrasf[y];
var nodo5 = node_monpendientetrasf[y];


if (estatus.value=="5"){

nodo1.value="";
nodo2.value="";
nodo3.value="";
nodo4.value="";
nodo5.value="";


nodo1.setAttribute("readOnly", "true");
nodo2.setAttribute("readOnly", "true");
nodo3.setAttribute("readOnly", "true");
nodo4.setAttribute("readOnly", "true");
nodo5.setAttribute("readOnly", "true");


}else{

nodo1.removeAttribute("readOnly"); 
nodo2.removeAttribute("readOnly"); 
nodo3.removeAttribute("readOnly"); 
nodo4.removeAttribute("readOnly"); 
nodo5.removeAttribute("readOnly"); 



		}

	}

}
