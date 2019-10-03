function Validator(frmname)
{
  this.formobj=document.forms[frmname]; 
	if(!this.formobj)
	{
	  mostrar_error("DEPURAR: no se pudo encontrar el objeto "+frmname, this.formobj.name);
		return;
	}
	if(this.formobj.onsubmit)
	{
	 this.formobj.old_onsubmit = this.formobj.onsubmit;
	 this.formobj.onsubmit=null;
	}
	else
	{
	 this.formobj.old_onsubmit = null;
	}
	this.currentBlurItem= null;
	this.formobj.onsubmit=form_submit_handler;
	this.doBlurValidation = form_blur_handler;
	this.addValidation = add_validation;
	this.addValCondition = add_condition;
	this.setAddnlValidationFunction=set_addnl_vfunction;
	this.clearAllValidations = clear_all_validations;
	this.clearValidations	= clear_validations;
	this.mostrarError = mostrar_error;
}

function set_addnl_vfunction(functionname)
{
  this.formobj.addnlvalidation = functionname;
}

function clear_all_validations()
{
	for(var itr=0;itr < this.formobj.elements.length;itr++)
	{
		this.formobj.elements[itr].validationset = null;
	}
}

function clear_validations(itemname)
{
		this.formobj[itemname].validationset = null;
}

function form_submit_handler()
{
	//alert(this.elements.length);
	for(var itr=0;itr < this.elements.length;itr++)
	{
		//alert(this.elements[itr].name);
		if (this.elements[itr].conditionset) 
		{
			if (this.elements[itr].conditionset.check())
			{			
				if(this.elements[itr].validationset && !this.elements[itr].validationset.validate())
				{
				  return false;
				}
			}		
		}
		else
		{			
			if(this.elements[itr].validationset && !this.elements[itr].validationset.validate())
			{
			  return false;
			}
		}
	}
	if(this.addnlvalidation)
	{
	  str =" var ret = "+this.addnlvalidation+"()";
	  eval(str);
    if(!ret) return ret;
	}
	return true;
}
function add_validation(itemname,descriptor,errstr)
{
  if(!this.formobj)
	{
	  mostrar_error("DEPURAR: el objeto del formulario no está inicializado correctamente", this.formobj.name);
		return;
	}//if
	if(this.formobj[itemname].type == undefined){
		var itemobj = this.formobj[itemname][0];//procurar que sea distinto para objetos tipo radio: select-one 
  	}else{
		var itemobj = this.formobj[itemname];
	}
	//alert(itemobj.type);
  if(!itemobj)
	{
	  mostrar_error("DEPURAR: No se pudo obtener el objeto de ingreso de data llamado: "+itemname, this.formobj.name);
		return;
	}
	if(!itemobj.validationset)
	{
	  itemobj.validationset = new ValidationSet(itemobj);
	}//alert(errstr);
  itemobj.validationset.add(descriptor,errstr);
  this.currentBlurItem = itemname;
  itemobj.onblur = this.doBlurValidation;
  itemobj.onBlur = form_submit_handler;
  itemobj.parentFormName = this.formobj.name;
  ///tom: xxx
}
function ValidationDesc(inputitem,desc,error)
{
    this.desc=desc;
	this.error=error; //alert(inputitem.validationset);
	this.itemobj = inputitem;
	this.validate = vdesc_validate;
}
function vdesc_validate()
{//alert(this.itemobj.type);
 if(!V2validateData(this.desc,this.itemobj,this.error))
 {
    if(this.itemobj.blurcommand === undefined){
		
		this.itemobj.focus();
		/*
		if(this.itemobj.type == undefined){
			//this.itemobj[0].focus();
		}else{
			//this.itemobj.focus();
		}
		*/
	}
	this.itemobj.oldStyle = this.itemobj.style;
	this.itemobj.style.backgroundColor = '#FFFCE2';
	this.itemobj.style.borderColor = 'red';
	this.itemobj.style.backgroundImage = 'url('+this.itemobj.form.urlImgWar+'warning_obj.gif)';
	this.itemobj.style.backgroundPosition = 'right';
	this.itemobj.style.backgroundRepeat =  'no-repeat';
	this.itemobj.blurcommand = undefined;
		return false;
 }
 if(this.itemobj.oldStyle!=undefined){
	this.itemobj.style.backgroundColor = "";
	this.itemobj.style.borderColor = "";
	this.itemobj.style.backgroundImage = "";
	this.itemobj.style.backgroundPosition = "";
	this.itemobj.style.backgroundRepeat =  "";
	mostrar_error("", this.itemobj.parentFormName);
 }
 if(this.itemobj.blurcommand === undefined){mostrar_error("", this.itemobj.parentFormName);}
 return true;
}
function ValidationSet(inputitem)
{
    this.vSet=new Array();
	this.add= add_validationdesc;
	this.validate= vset_validate;
	this.itemobj = inputitem;
}
function add_validationdesc(desc,error)
{
  this.vSet[this.vSet.length]= 
	  new ValidationDesc(this.itemobj,desc,error);
}
function vset_validate()
{
   for(var itr=0;itr<this.vSet.length;itr++)
	 {
	   if(!this.vSet[itr].validate())
		 {
		   return false;
		 }
	 }
	 return true;
}
function validateEmailv2(email)
{
// a very simple email validation checking. 
// you can add more complex email checking if it helps 
    if(email.length <= 0)
	{
	  return true;
	}
    var splitted = email.match("^(.+)@(.+)$");
    if(splitted == null) return false;
    if(splitted[1] != null )
    {
      var regexp_user=/^\"?[\w-_\.]*\"?$/;
      if(splitted[1].match(regexp_user) == null) return false;
    }
    if(splitted[2] != null)
    {
      var regexp_domain=/^[\w-\.]*\.[A-Za-z]{2,4}$/;
      if(splitted[2].match(regexp_domain) == null) 
      {
	    var regexp_ip =/^\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\]$/;
	    if(splitted[2].match(regexp_ip) == null) return false;
      }// if
      return true;
    }
return false;
}
function V2validateData(strValidateStr,objValue,strError) 
{ 
	if ((objValue.style.visibility=='hidden')||(objValue.disabled==true))
		{return true}; 
	var epos = strValidateStr.lastIndexOf("="); 
    var  command  = ""; 
    var  cmdvalue = ""; 
	if(objValue.title.length == 0){
		strItemRef = objValue.name;
	} else {
		strItemRef = objValue.title;
	}
    if(epos >= 0) 
    { 
     command  = strValidateStr.substring(0,epos); 
     cmdvalue = strValidateStr.substr(epos+1); 
    } 
    else 
    { 
     command = strValidateStr; 
    } 
    switch(command) 
    { 
        case "req": 
        case "r": 
         { 
           value = objValue.value.replace( /^\s+/g, "" );// strip leading
		   value = value.replace( /\s+$/g, "" );// strip trailing
		   if(objValue.type == "radio"){
			  	var cnt = -1;
				for (var i=0; i < objValue.form.elements[objValue.name].length; i++) {
				   if (objValue.form.elements[objValue.name][i].checked) {cnt = 1; i = objValue.form.elements[objValue.name].length;}
				   }
				
				if (cnt < 0){//alert("miercoles, como entraste??");
				//alert( objValue.form.elements["sexo"][cnt].value);
					if(!strError || strError.length ==0) 
				  	{ 
						strError = strItemRef + " es un campo requerido";
				 	}//if 
				  	mostrar_error(strError, objValue.parentFormName); 
				  	return false; 
				}
				
		   }
		   // meter soporte para tipo file
		   if(objValue.type == "file"){
			  if( fvalue = eval("objValue.form.h"+objValue.name+"")){
				  if(eval(value.length) == 0 && eval(fvalue.value.length) == 0 ) 
				   { 
					  if(!strError || strError.length ==0) 
					  { 
						strError = strItemRef + " es un campo requerido";
					  }//if 
					  mostrar_error(strError, objValue.parentFormName); 
					  return false; 
				   }//if 
				   break;  
			  }
			    
		   }
		   if(eval(value.length) == 0 
				   || (objValue.type == "checkbox" && !objValue.checked)
				   ) 
           { 
              if(!strError || strError.length ==0) 
              { 
                strError = strItemRef + " es un campo requerido";
              }//if 
              mostrar_error(strError, objValue.parentFormName); 
              return false; 
           }//if 
           break;             
         }//case required 
        case "maxl": 
        case "maxlon":  
          { 
             if(eval(objValue.value.length) >  eval(cmdvalue)) 
             { 
               if(!strError || strError.length ==0) 
               { 
                 strError = strItemRef + " debe tener no más de "+cmdvalue+" caracteres "; 
				 strError = strError + "\n(Longitud actual = " + objValue.value.length + " )"; 
               }//if 
			   mostrar_error(strError, objValue.parentFormName);
               return false; 
             }//if 
             break; 
          }//case maxlen 
        case "minl": 
        case "minlon": 
           { 
		   	  if(eval(objValue.value.length) != 0){
				 if(eval(objValue.value.length) <  eval(cmdvalue)) 
				 { 
				   if(!strError || strError.length ==0) 
				   { 
					 strError = strItemRef + " debe tener almenos " + cmdvalue + " caracteres  "; 
					 strError = strError + "\n(Longitud actual = " + objValue.value.length + " )";
				   }//if     
				   mostrar_error(strError, objValue.parentFormName);
				   return false;                 
				 }//if 
		      }
             break; 
            }//case minlen 
		case "noespacio": 
		case "! ":
			{ 
              var charpos = objValue.value.search(" "); 
              if(objValue.value.length > 0 &&  charpos >= 0) 
              { 
               if(!strError || strError.length ==0) 
                { 
                  strError = strItemRef+" no debe poseer espacios en blanco "; 
				  strError = strError + "\n (Posición del caracter erróneo " + eval(charpos+1)+")";
                }//if  
				mostrar_error(strError, objValue.parentFormName);
                return false; 
              }//if 
              break; 
           }//case alphanumeric 
        case "a1":
        case "alfanumerico": 
           { 
              var charpos = objValue.value.search("[^A-Za-z0-9ÁÉÍÓÚáéíóúñÑ ]"); 
              if(objValue.value.length > 0 &&  charpos >= 0) 
              { 
               if(!strError || strError.length ==0) 
                { 
                  strError = strItemRef+" solamente debe tener caracteres alfa-numéricos "; 
				  strError = strError + "\n (Posición del caracter erróneo " + eval(charpos+1)+")";
                }//if  
				mostrar_error(strError, objValue.parentFormName);
                return false; 
              }//if 
              break; 
           }//case alphanumeric 
        case "1":
		case "num": 
        case "numerico": 
           { 
              var charpos = objValue.value.search("[^0-9. ]"); 
              if(objValue.value.length > 0 &&  charpos >= 0) 
              { 
                if(!strError || strError.length ==0) 
                { 
                  strError = strItemRef+" solamente debe tener caracteres numéricos "; 
				  strError = strError + "\n (Posición del caracter erróneo " + eval(charpos+1)+")";
                }//if     
				mostrar_error(strError, objValue.parentFormName);
                return false; 
              }//if 
              break;               
           }//numeric 
        case "decimal": 
           { 
              var charpos = objValue.value.search("//"); 
              if(objValue.value.length > 0 &&  charpos >= 0) 
              { 
                if(!strError || strError.length ==0) 
                { 
                  strError = strItemRef+" solamente debe tener caracteres numéricos. Ej: 0.12"; 
				  strError = strError + "\n (Posición del caracter erróneo " + eval(charpos+1)+")";
                }//if     
				mostrar_error(strError, objValue.parentFormName);
                return false; 
              }//if 
              break;               
           }//decimal 		   
        case "a":
		case "alfabetico": 
        case "alfa": 
           { 
              var charpos = objValue.value.search("[^A-Za-zÁÉÍÓÚáéíóúñÑ ]"); 
              if(objValue.value.length > 0 &&  charpos >= 0) 
              { 
                  if(!strError || strError.length ==0) 
                { 
                  strError = strItemRef+" solamente debe tener caracteres alfabéticos "; 
				  strError = strError + "\n (Posición del caracter erróneo " + eval(charpos+1)+")"; 
                }//if    
				mostrar_error(strError, objValue.parentFormName);
                return false; 
              }//if 
              break; 
           }//alpha 
		case "a1-_":
		case "a1-":
		case "alnumguion":
			{
              var charpos = objValue.value.search("[^A-Za-z0-9\-_ ]"); 
              if(objValue.value.length > 0 &&  charpos >= 0) 
              { 
                  if(!strError || strError.length ==0) 
                { 
                  strError = strItemRef+" debe incluir solamente los caracteres A-Z,a-z,0-9,- y _"; 
				  strError = strError + "\n (Posición del caracter erróneo " + eval(charpos+1)+")"; 
                }//if          
				mostrar_error(strError, objValue.parentFormName);
                return false; 
              }//if 			
			break;
			}
        case "email": 
          { 
               if(!validateEmailv2(objValue.value)) 
               { 
                 if(!strError || strError.length ==0) 
                 { 
                    strError = "Debe ingresar un email válido "; 
                 }//if                                               
                 mostrar_error(strError, objValue.parentFormName); 
                 return false; 
               }//if 
           break; 
          }//case email 
        case "<": 
        case "menorque": 
         { 
            if(isNaN(objValue.value)) 
            { 
              mostrar_error(strItemRef+" solamente debe tener caracteres numéricos ", objValue.parentFormName); 
              return false; 
            }//if 
            if(eval(objValue.value) >=  eval(cmdvalue)) 
            { 
              if(!strError || strError.length ==0) 
              { 
                strError = "El valor de "+ strItemRef + " debe ser menor que "+ cmdvalue; 
              }//if               
              mostrar_error(strError, objValue.parentFormName); 
              return false;                 
             }//if             
            break; 
         }//case lessthan 
        case ">": 
        case "mayorque": 
         { 
            if(isNaN(objValue.value)) 
            { 
              mostrar_error(strItemRef+" solamente debe tener caracteres numéricos ", objValue.parentFormName); 
              return false; 
            }//if 
             if(eval(objValue.value) <=  eval(cmdvalue)) 
             { 
               if(!strError || strError.length ==0) 
               { 
                 strError = "El valor de "+ strItemRef + " : debe ser mayor que "+ cmdvalue; 
               }//if               
               mostrar_error(strError, objValue.parentFormName); 
               return false;                 
             }//if             
            break; 
         }//case greaterthan 
        case "regexp": 
         { 
		 	if(objValue.value.length > 0)
			{
	            if(!objValue.value.match(cmdvalue)) 
	            { 
	              if(!strError || strError.length ==0) 
	              { 
	                strError = "El formato de "+strItemRef+" no es el correcto "; 
	              }//if                                                               
	              mostrar_error(strError, objValue.parentFormName); 
	              return false;                   
	            }//if 
			}
           break; 
         }//case regexp
		case "!=":
    	case "lista":
        case "noseleccionar": 
         { 
            if(objValue.selectedIndex == null) 
            { 
              mostrar_error("DEPURAR: el comando noseleccionar está configurado para un elemento que no es de selección", objValue.parentFormName); 
              return false; 
            } 
            if(objValue.selectedIndex == eval(cmdvalue)) 
            { 
             if(!strError || strError.length ==0) 
              { 
              strError = "Debe seleccionar una opción de "+strItemRef; 
              }//if                                                               
              mostrar_error(strError, objValue.parentFormName); 
              return false;                                   
             } 
             break; 
         }//case dontselect 
		case "=":
		case "a==b":
		case "camposiguales":
		 {
		   if(objValue.value != objValue.form.elements[cmdvalue].value)
		   {
			if(!strError || strError.length ==0) 
			  { 
			  if(objValue.form.elements[cmdvalue].title.length > 0)
			  {
				  strNewItemRef = objValue.form.elements[cmdvalue].title;
			  }else{
				  strNewItemRef = objValue.form.elements[cmdvalue].name;
			  }
			  strError = "Los campos "+strItemRef+" y "+strNewItemRef+" deben ser iguales"; 
			  }//if                                                               
			  mostrar_error(strError, objValue.parentFormName); 
			  return false;  
		   }
		 } 
		 	break; 
		case "a!=b":
		case "camposdesiguales":
		 {
		   if(objValue.value == objValue.form.elements[cmdvalue].value)
		   {
			if(!strError || strError.length ==0) 
			  { 
			  if(objValue.form.elements[cmdvalue].title.length > 0)
			  {
				  strNewItemRef = objValue.form.elements[cmdvalue].title;
			  }else{
				  strNewItemRef = objValue.form.elements[cmdvalue].name;
			  }
			  strError = "Los campos "+strItemRef+" y "+strNewItemRef+" deben ser distintos"; 
			  }//if                                                               
			  mostrar_error(strError, objValue.parentFormName); 
			  return false;  
		   }
		 } 
		 	break; 
		case "forzarx"://Parece que no se necesita
		 {
			if(!strError || strError.length ==0) 
			  { 
			  strError = "DEPURAR: Debe especificar un mensaje de error para "+strItemRef; 
			  }//if                                                               
			  mostrar_error(strError, objValue.parentFormName); 
			  return false;                                   
		 } 
		 	break; 
		case "fechaformato": 
		case "ff":
         { 
		 	if(eval(objValue.value.length) == 0){break;}
			tipoDelimitador = false;
			if(objValue.value.indexOf("/")!=-1){tipoDelimitador = "/";}
			if(objValue.value.indexOf("-")!=-1){tipoDelimitador = "-";}
			if(!tipoDelimitador){
				if(!objValue.value.match(cmdvalue)) 
	            { 
	              if(!strError || strError.length ==0) 
	              { 
	                strError = "El campo "+strItemRef+" debe estar en el formato dd/mm/aaaa (día/mes/año) "; 
	              }//if                                                               
	              mostrar_error(strError, objValue.parentFormName); 
	              return false;                   
	            }//if 
			}
			fecha_array = objValue.value.split(tipoDelimitador);
			var dteDate;
			dteDate=new Date(fecha_array[2],fecha_array[1]-1,fecha_array[0]);
			fechaValidada = ((fecha_array[0]==dteDate.getDate()) && (fecha_array[1]-1==dteDate.getMonth()) && (fecha_array[2]==dteDate.getFullYear()));
			//alert(fechaValidada);
			//revisar este código
			if(fechaValidada===false)
			{
			  if(!strError || strError.length ==0) 
			  { 
				strError = "El campo "+strItemRef+" debe estar en el formato dd/mm/aaaa (día/mes/año) "; 
			  }//if                                                               
			  mostrar_error(strError, objValue.parentFormName); 
			  return false;                   
			}
           break; 
		}
	  case "fecha >":
	  case "f>":
	   {
	   		// crear fecha a partir del texto que ingresó el usuario
			if(eval(objValue.value.length) == 0){break;}
			tipoDelimitador = false;
			if(objValue.value.indexOf("/")!=-1){tipoDelimitador = "/";}
			if(objValue.value.indexOf("-")!=-1){tipoDelimitador = "-";}
			fecha_array = objValue.value.split(tipoDelimitador);
			var faValidar;
			faValidar = new Date(fecha_array[2],fecha_array[1]-1,fecha_array[0]);
			// crear fecha a partir del parámetro de validación o en su defecto, un campo especifico 
			tipoDelimitador = false;
			if(cmdvalue.indexOf("/")!=-1){tipoDelimitador = "/";}
			if(cmdvalue.indexOf("-")!=-1){tipoDelimitador = "-";}
			if(!tipoDelimitador){ // verificar si el parámetro es una fecha o una referencia a un campo
				campoComparar = objValue.form.elements[cmdvalue].value;
				if(objValue.form.elements[cmdvalue].title.length > 0){strCompRef = objValue.form.elements[cmdvalue].title}else{strCompRef = objValue.form.elements[cmdvalue].name}
				tipoDelimitador = false;
				if(campoComparar.indexOf("/")!=-1){tipoDelimitador = "/";}
				if(campoComparar.indexOf("-")!=-1){tipoDelimitador = "-";}
				if(!tipoDelimitador){
					strError = "El campo "+strItemRef+" debe estar en el formato dd/mm/aaaa (día/mes/año) ";
					mostrar_error(strError, objValue.parentFormName); 
			  		return false;
				} else { // si el campo es una fecha válida, crear un array
					fecha_array = campoComparar.split(tipoDelimitador);
				}
			} else { // si el parámetro es una fecha válida, crear un array
				fecha_array = cmdvalue.split(tipoDelimitador);
			}
			faComparar = new Date(fecha_array[2],fecha_array[1]-1,fecha_array[0]);
			if(faValidar<faComparar)
			{
			  if(!strError || strError.length ==0) 
			  { 
				strError = "El campo "+strItemRef+" debe ser una fecha posterior a la del campo "+strCompRef; 
			  }//if                                                               
			  mostrar_error(strError, objValue.parentFormName); 
			  return false;                   
			}
	   break;
	   }
	  case "fecha <":
	  case "f<":
	   {
	   		// crear fecha a partir del texto que ingresó el usuario
			if(eval(objValue.value.length) == 0){break;}
			tipoDelimitador = false;
			if(objValue.value.indexOf("/")!=-1){tipoDelimitador = "/";}
			if(objValue.value.indexOf("-")!=-1){tipoDelimitador = "-";}
			fecha_array = objValue.value.split(tipoDelimitador);
			var faValidar;
			faValidar = new Date(fecha_array[2],fecha_array[1]-1,fecha_array[0]);
			// crear fecha a partir del parámetro de validación o en su defecto, un campo especifico 
			tipoDelimitador = false;
			if(cmdvalue.indexOf("/")!=-1){tipoDelimitador = "/";}
			if(cmdvalue.indexOf("-")!=-1){tipoDelimitador = "-";}
			if(!tipoDelimitador){ // verificar si el parámetro es una fecha o una referencia a un campo
				campoComparar = objValue.form.elements[cmdvalue].value;
				if(objValue.form.elements[cmdvalue].title.length > 0){strCompRef = objValue.form.elements[cmdvalue].title}else{strCompRef = objValue.form.elements[cmdvalue].name}
				tipoDelimitador = false;
				if(campoComparar.indexOf("/")!=-1){tipoDelimitador = "/";}
				if(campoComparar.indexOf("-")!=-1){tipoDelimitador = "-";}
				if(!tipoDelimitador){
					strError = "El campo "+objValue.form.elements[cmdvalue].name+" debe estar en el formato dd/mm/aaaa (día/mes/año) ";
					mostrar_error(strError, objValue.parentFormName); 
			  		return false;
				} else { // si el campo es una fecha válida, crear un array
					fecha_array = campoComparar.split(tipoDelimitador);
				}
			} else { // si el parámetro es una fecha válida, crear un array
				fecha_array = cmdvalue.split(tipoDelimitador);
			}
			faComparar = new Date(fecha_array[2],fecha_array[1]-1,fecha_array[0]);
			if(faValidar>faComparar)
			{
			  if(!strError || strError.length ==0) 
			  { 
				strError = "El campo "+strItemRef+" debe ser una fecha anterior a la del campo "+strCompRef; 
			  }//if                                                               
			  mostrar_error(strError, objValue.parentFormName); 
			  return false;                   
			}
	   break;
	   }
	  case ".?": 
	  case "extensionarchivo":
         { 
		 	if(objValue.value.length > 0)
			{
				if(cmdvalue.length < 1) {
					cmdvalue = "gif|jpg|jpeg|bmp|png";
				} else {
					for(i=0;cmdvalue.indexOf(",")>-1;i++) {
						cmdvalue=cmdvalue.replace(",","|");	
					}
				}
				value = objValue.value.toLowerCase();
				if (value.search("(\.("+cmdvalue+"))$")<0) //if (!/(\.(gif|jpg|jpeg|bmp|png))$/i.test(objValue.value))
	            { 
	              if(!strError || strError.length ==0) 
	              { 
	                for(i=0;cmdvalue.indexOf("|")>-1;i++) {
						cmdvalue=cmdvalue.replace("|",", ");	
					}
					strError = "En el campo "+strItemRef+", solamente se permiten archivos cuya extensión sea "+cmdvalue; 
	              }//if                                                               
	              mostrar_error(strError, objValue.parentFormName); 
	              return false;                   
	            }//if 
			}
           break; 
         }//case .?
    }//switch 
    return true; 
} 

function mostrar_error(texto_error, nom_form, estilo_error, tipo_error){
	if(nom_form == undefined){alert("DEPURAR: no se puede mostrar el error, ya que el formulario no está especificado");return false;}
	if(estilo_error===undefined){estilo_error = 'color: #FF0000; font-weight: bold;'}
	if(tipo_error=="alerta"){
		alert(texto_error);
	}else{
		texto_error = '<span style="'+estilo_error+'">'+texto_error+'</span>';
		 if (document.getElementById){
			//rng = document.createRange();
			if(document.getElementById("dcontent_"+nom_form)) {
				document.getElementById("dcontent_"+nom_form).innerHTML=texto_error;
				document.getElementById("dcontent_"+nom_form).style.display = "block";
			}else{
				document.getElementById("dcontent").innerHTML=texto_error;
				document.getElementById("dcontent").style.display = "block";
			}
		 } else {alert(texto_error);}
	}
}
function form_blur_handler()
{
	this.blurcommand=true;
	if (this.conditionset!=undefined) 
	{ 
		if (this.conditionset.check())
			{formobj = this.validationset.validate();}
	}		
	else
		{formobj = this.validationset.validate();}	
}


function add_condition(itemname,itemcheck,operator,condition)
{
	if(this.formobj[itemname].type == undefined){
		var itemobj = this.formobj[itemname][0];//procurar que sea distinto para objetos tipo radio: select-one 
  	}else{
		var itemobj = this.formobj[itemname];
	}
	if(!itemobj)
	{
	  mostrar_error("DEPURAR: No se pudo obtener el objeto de ingreso de data llamado: "+itemname, this.formobj.name);
		return;
	}
	//alert(errstr);
	if(this.formobj[itemcheck].type == undefined){
		var itemcond = this.formobj[itemcheck][0];//procurar que sea distinto para objetos tipo radio: select-one 
  	}else{
		var itemcond = this.formobj[itemcheck];
	}
	if(!itemcond)
	{
	  mostrar_error("DEPURAR: No se pudo obtener el objeto de verificacion de condicion llamado: "+itemcheck, this.formobj.name);
		return;
	}
	if(!itemobj.conditionset)
	{
		itemobj.conditionset = new ConditionSet(itemobj);
	}
		itemobj.conditionset.add(itemcond,operator,condition);
}

function ConditionSet(inputitem)
{
    this.cSet=new Array();
	this.add= add_conditiondesc;
	this.check = vset_condition;
	this.itemobj = inputitem;
	
}

function add_conditiondesc(itemcheck,operator,condition)
{
  this.cSet[this.cSet.length]= 
	  new ConditionDesc(itemcheck,operator,condition);
}
function ConditionDesc(itemcheck,operator,condition)
{
    this.operator = operator;
	this.condition=condition; //alert(inputitem.validationset);
	this.itemcheck = itemcheck;
	this.validate = vdesc_condition;
}

function vset_condition()
{
   for(var itr=0;itr<this.cSet.length;itr++)
	 {
	    if(!this.cSet[itr].validate(this.cSet[itr].itemcheck,this.cSet[itr].operator,this.cSet[itr].condition))
		 {
		    return false;
		 }
	 }
	 return true;
}

function vdesc_condition(objValue,Operator,Valor) 
{ 
	if(objValue.type == "radio")
	{
		for (var i=0; i < objValue.form.elements[objValue.name].length; i++) 
		{
			if ((objValue.form.elements[objValue.name][i].checked) &&
			(objValue.form.elements[objValue.name][i].value == Valor)) 
			{
				return true;
			}
		}
	}
	else if(objValue.type == "checkbox")
	{
		var evaluar = objValue.checked + Operator +Valor;
		if(eval(evaluar)) {return true;}  
	}
	else
	{	
	var evaluar = objValue.value + Operator +"'"+Valor+"'";
	if(eval(evaluar)) {return true;} 
	}
}		   
