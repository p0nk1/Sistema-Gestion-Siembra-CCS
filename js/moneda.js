function validar(donde,caracter) {


 var checkOK = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz!\"#$%&/()=?¡¿'|¬°´+*~{}[]`:;-_<>\\@ẃéŕýúíóṕáśǵḱĺźćǘńḿẂÉŔÝÚÍÓṔÁŚǴḰĹŹĆǗŃḾ";
 var valor = donde.value;


for (i = 0;  i < valor.length;  i++) {

    ch = valor.charAt(i);

for (j = 0;  j < checkOK.length;  j++) {
     
	if (ch == checkOK.charAt(j)) {
        
	valor = valor.replace(ch,"")
	donde.value = valor;
	donde.focus();
	return false;
			}

		}

	}


} 





function money(donde){

 var id = donde.id;

 $('#'+id).formatCurrency();

}












