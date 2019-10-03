function uf_convertir(obj)
{
	var valor=new String(obj);

	if(valor<0)
	{
		li_temp="-";
		valor=Math.abs(valor);
		valor=valor+".00";

	}
	else
	{
		li_temp="";			
	}

	li_coma=valor.indexOf(',');
	if(li_coma>0)
	{
		while(valor.indexOf('.')>0)
		{
			valor=valor.replace(".","");
		}
		valor=valor.replace(",",".");
	}
	li_punto=valor.indexOf('.');	
	li_longitud=valor.length;	
	if(li_punto>=0)
	{
		ls_new=valor.substr(0,li_punto);
		ldec_monto=roundNumber(valor);
		var aux=new String(ldec_monto);
		ls_dec=aux.substr(li_punto+1,li_longitud-li_punto);
	}
	else
	{
		ls_new=valor;
		ls_dec="00";
	}
	li_long_new=ls_new.length;
	if(li_long_new>3)
	{	
		ls_new_int=uf_convertir_entero(ls_new);
	}
	else
	{
		ls_new_int=ls_new;
	}
	if(ls_dec.length<2)
	{
		while(ls_dec.length<2)
		{
			ls_dec=ls_dec+"0";
		}
	}
	else
	{
		ls_dec=ls_dec.substr(0,2);
	}
	
	return li_temp+ls_new_int+","+ls_dec;
	
}

function roundNumber(obj)
{ 
	//var numberField = obj; // Field where the number appears 
	var rnum = obj;
	var rlength = 2; // The number of decimal places to round to 
	if (rnum > 8191 && rnum < 10485) 
	{ 
		rnum = rnum-5000; 
		var newnumber = Math.round(rnum*Math.pow(10,rlength))/Math.pow(10,rlength);
		newnumber = newnumber+5000; 
	}
	else 
	{ 
		var newnumber = Math.round(rnum*Math.pow(10,rlength))/Math.pow(10,rlength); 
	}
	return newnumber;
}

function uf_convertir_entero(valor)
{
	li_long=valor.length;
	if((li_long>3)&&(li_long<=6))
	{
		ls_algo=valor.substr(li_long-3,3);
		ls_new_str=valor.substr(0,li_long-3)+"."+ls_algo;		
	}
	
	if((li_long>6)&&(li_long<=9))
	{
		ls_ultimo=valor.substr(li_long-3,3);
		ls_penultimo=valor.substr(li_long-6,3);
		ls_new_str=valor.substr(0,li_long-6)+"."+ls_penultimo+"."+ls_ultimo;		
	}
	if((li_long>9)&&(li_long<=12))
	{
		ls_ultimo=valor.substr(li_long-3,3);
		ls_penultimo=valor.substr(li_long-6,3);
		ls_antepenultimo=valor.substr(li_long-9,3);
		ls_new_str=valor.substr(0,li_long-9)+"."+ls_antepenultimo+"."+ls_penultimo+"."+ls_ultimo;
		
	}
	if((li_long>12)&&(li_long<=15))
	{
		ls_ultimo=valor.substr(li_long-3,3);
		ls_penultimo=valor.substr(li_long-6,3);
		ls_antepenultimo=valor.substr(li_long-9,3);
		ls_segundo=valor.substr(li_long-12,3);
		ls_new_str=valor.substr(0,li_long-12)+"."+ls_segundo+"."+ls_antepenultimo+"."+ls_penultimo+"."+ls_ultimo;
	}
	if((li_long>15)&&(li_long<=18))
	{
		ls_ultimo=valor.substr(li_long-3,3);
		ls_penultimo=valor.substr(li_long-6,3);
		ls_antepenultimo=valor.substr(li_long-9,3);
		ls_tercero=valor.substr(li_long-12,3);
		ls_segundo=valor.substr(li_long-15,3);
		ls_new_str=valor.substr(0,li_long-15)+"."+ls_segundo+"."+ls_tercero+"."+ls_antepenultimo+"."+ls_penultimo+"."+ls_ultimo;
	}
	return ls_new_str;
}

function uf_convertir_monto(ldec_monto)
{
	var valor=new String(ldec_monto);
	while(valor.indexOf('.')>0)
	{//Elimino todos los puntos o separadores de miles
		valor=valor.replace(".","");
	}
	valor=valor.replace(",",".");
	
	return valor;
	
}

function uf_format(obj)
{
	ldec_monto=uf_convertir(obj.value);
	obj.value=ldec_monto;
}


function currencyFormat(fld, milSep, decSep, e) { 
    var sep = 0; 
    var key = ''; 
    var i = j = 0; 
    var len = len2 = 0; 
    var strCheck = '0123456789'; 
    var aux = aux2 = ''; 
    var whichCode = (window.Event) ? e.which : e.keyCode; 
    if (whichCode == 13) return true; // Enter 
	if (whichCode == 8) return true; // Enter 
	if (whichCode == 127) return true; // Enter 	
	if (whichCode == 9) return true; // Enter 	
    key = String.fromCharCode(whichCode); // Get key value from key code 
    if (strCheck.indexOf(key) == -1) return false; // Not a valid key 
    len = fld.value.length; 
    for(i = 0; i < len; i++) 
     if ((fld.value.charAt(i) != '0') && (fld.value.charAt(i) != decSep)) break; 
    aux = ''; 
    for(; i < len; i++) 
     if (strCheck.indexOf(fld.value.charAt(i))!=-1) aux += fld.value.charAt(i); 
    aux += key; 
    len = aux.length; 
    if (len == 0) fld.value = ''; 
    if (len == 1) fld.value = '0'+ decSep + '0' + aux; 
    if (len == 2) fld.value = '0'+ decSep + aux; 
    if (len > 2) { 
     aux2 = ''; 
     for (j = 0, i = len - 3; i >= 0; i--) { 
      if (j == 3) { 
       aux2 += milSep; 
       j = 0; 
      } 
      aux2 += aux.charAt(i); 
      j++; 
     } 
     fld.value = ''; 
     len2 = aux2.length; 
     for (i = len2 - 1; i >= 0; i--) 
      fld.value += aux2.charAt(i); 
     fld.value += decSep + aux.substr(len - 2, len); 
    } 
    return false; 
   }
  


function number_format (number, decimals, dec_point, thousands_sep) 
{
    // *     example 1: number_format(1234.56);
    // *     returns 1: '1,235'
    // *     example 2: number_format(1234.56, 2, ',', ' ');    // *     returns 2: '1 234,56'
    // *     example 3: number_format(1234.5678, 2, '.', '');
    // *     returns 3: '1234.57'
    // *     example 4: number_format(67, 2, ',', '.');
    // *     returns 4: '67,00'    // *     example 5: number_format(1000);
    // *     returns 5: '1,000'
    // *     example 6: number_format(67.311, 2);
    // *     returns 6: '67.31'
    // *     example 7: number_format(1000.55, 1);    // *     returns 7: '1,000.6'
    // *     example 8: number_format(67000, 5, ',', '.');
    // *     returns 8: '67.000,00000'
    // *     example 9: number_format(0.9, 0);
    // *     returns 9: '1'    // *     example 10: number_format('1.20', 2);
    // *     returns 10: '1.20'
    // *     example 11: number_format('1.20', 4);
    // *     returns 11: '1.2000'
    // *     example 12: number_format('1.2000', 3);    // *     returns 12: '1.200'
    var n = number, prec = decimals;
 
    var toFixedFix = function (n,prec) {
        var k = Math.pow(10,prec);        return (Math.round(n*k)/k).toString();
    };
 
    n = !isFinite(+n) ? 0 : +n;
    prec = !isFinite(+prec) ? 0 : Math.abs(prec);    var sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep;
    var dec = (typeof dec_point === 'undefined') ? '.' : dec_point;
 
    var s = (prec > 0) ? toFixedFix(n, prec) : toFixedFix(Math.round(n), prec); //fix for IE parseFloat(0.55).toFixed(0) = 0;
     var abs = toFixedFix(Math.abs(n), prec);
    var _, i;
 
    if (abs >= 1000) {
        _ = abs.split(/\D/);        i = _[0].length % 3 || 3;
 
        _[0] = s.slice(0,i + (n < 0)) +
              _[0].slice(i).replace(/(\d{3})/g, sep+'$1');
        s = _.join(dec);    } else {
        s = s.replace('.', dec);
    }
 
    var decPos = s.indexOf(dec);    if (prec >= 1 && decPos !== -1 && (s.length-decPos-1) < prec) {
        s += new Array(prec-(s.length-decPos-1)).join(0)+'0';
    }
    else if (prec >= 1 && decPos === -1) {
        s += dec+new Array(prec).join(0)+'0';    }
    return s;
}


function str_replace (search, replace, subject, count) 
{
	f = [].concat(search),
	r = [].concat(replace),
	s = subject,
	ra = r instanceof Array, sa = s instanceof Array;    s = [].concat(s);
	if (count) 
	{
		this.window[count] = 0;
	}
	for (i=0, sl=s.length; i < sl; i++) 
	{
		if (s[i] === '') 
		{
			continue;
		}
		for (j=0, fl=f.length; j < fl; j++) 
		{            
			temp = s[i]+'';
			repl = ra ? (r[j] !== undefined ? r[j] : '') : r[0];
			s[i] = (temp).split(f[j]).join(repl);
			if (count && s[i] !== temp) 
			{
				this.window[count] += (temp.length-s[i].length)/f[j].length;
			}
		}
	}
	return sa ? s : s[0];
}