function validarCampoVacio(valorCampo){
	if(valorCampo=="" || valorCampo=="0" || valorCampo==0 || valorCampo==null) return true
	else return false;
}
function validacion(){
	banderaVacio=true;

	nombreRazonSocial =document.getElementById('nombRazonSocial');
	cedulaRifSolicitante =document.getElementById('cedulaRif');
	domicilioLegalSolicitante =document.getElementById('domicilioLegal');
	direccionPymiSolicitante=document.getElementById('direccionSolicitante');
	actividadSectorSolicitante=document.getElementById('actividadSolicitante');
	telefonoOrgSolicitante=document.getElementById('telefonoSolicitante');
	correoSolicitante=document.getElementById('emailSolicitante');
	
	//RECOJE LOS VALORES DE LOS CAMPOS
	valorNombreRazonSocial =nombreRazonSocial.value
	valorCedulaRifSolicitante =cedulaRifSolicitante.value
	valorDomicilioLegalSolicitante = domicilioLegalSolicitante.value
	valorDireccionPymiSolicitante = direccionPymiSolicitante.value
	valorActividadSectorSolicitante = actividadSectorSolicitante.value
	valorTelefonoOrgSolicitante = telefonoOrgSolicitante.value
	valorCorreoSolicitante = correoSolicitante.value

	//VERIFICA QUE LOS CAMPOS NO ESTEN VACIOS
	if (validarCampoVacio(valorNombreRazonSocial)){ banderaVacio=false; }
	if (validarCampoVacio(valorCedulaRifSolicitante)){ banderaVacio=false; }
	if (validarCampoVacio(valorDomicilioLegalSolicitante)){ banderaVacio=false; }
	if (validarCampoVacio(valorDireccionPymiSolicitante)){ banderaVacio=false; }
	if (validarCampoVacio(valorActividadSectorSolicitante)){ banderaVacio=false; }
	if (validarCampoVacio(valorTelefonoOrgSolicitante)){ banderaVacio=false; }
	if (validarCampoVacio(valorCorreoSolicitante)){ banderaVacio=false; }

	//SI TIENE CAMPOS VACIOS MANDA EL MENSAJE DE ERROR SINO GUARDA LOS DATOS
	if(banderaVacio==false){
		alert("EL FORMULARIO TIENE CAMPOS VACIOS POR FAVOR VERIFIQUE!!!");
	}
	return banderaVacio;
}
function campoTlfSolicitante(){
	valorTlfSolicitante = document.getElementById("telefonoSolicitante").value;
	if( !(/^\d{11}$/.test(valorTlfSolicitante)) ) {
		alert("ESTE CAMPO NO DEBE SER MENOR NI MAYOR A 11 DIGITOS!!!");
	  //return false;
	}
}


function validaremail(formRegPrimerCap) { 
	if (document.formRegPrimerCap.emailSolicitante.value.indexOf('@') == -1) {
		alert ("DEBE INGRESAR UNA DIRECCION DE CORREO VALIDA!!!"); 
	document.formRegPrimerCap.emailSolicitante.focus() ;
	}else { 
		document.formRegPrimerCap.submit(); 
	} 
} 


/*function Validate_Email_Address(email_address)
{
       //Assumes that valid email addresses consist of user_name@domain.tld
       at = email_address.indexOf('@');
       dot = email_address.indexOf('.');
       
       if(at == -1 || dot == -1 || dot <= at + 1 || dot == 0 ||  dot == email_address.length - 1)
               return(false);
       
       user_name = email_address.substr(0, at);
       domain_name = email_address.substr(at + 1, email_address.length);
       
       if(Validate_String(user_name) === false || Validate_String(domain_name) === false)
               return(false);
       return(true);
}
function campoEmailSolicitante(){
	valorEmailSolicitante = document.getElementById("emailSolicitante").value;
	alert(valorEmailSolicitante);
	if( !(/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/.test(valorEmailSolicitante)) ) {
		alert("DEBE INGRESAR UNA DIRECCION DE CORREO VALIDA!!!");
	  //return false;
	}
}
function validarEmail() {
	valorEmailSolicitante = document.getElementById("emailSolicitante").value;
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(valorEmailSolicitante)){
		alert("La dirección de email " + valorEmailSolicitante + " es correcta.");
	} else {
		alert("La dirección de email es incorrecta.");
	}
}
*/
