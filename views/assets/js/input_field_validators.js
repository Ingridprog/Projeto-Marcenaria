function validarEntrada(caracter,typeBlock){
   
    var tipo = typeBlock;
    
    if(window.event){
        var asc = caracter.charCode;
    }else{
        var asc = caracter.which;
    }

    //valida apenas a digitação de letra
    if(tipo == "numeric"){
       if(asc >=48 && asc<=57){

            //cancela da tecla digitada
            return false;
        }
    
    }else if(tipo == "string"){
        if(asc < 48 || asc > 57){
            return false;
        }
    }
}

function validarEntradaComVirgula(caracter){
    
    if(window.event){
        var asc = caracter.charCode;
    }else{
        var asc = caracter.which;
    }

    if(asc < 44 || asc > 57 || asc == 45 || asc == 46 || asc == 47){
        return false;
    }

}

function mascaraFone(obj,caracter){
   
	var input = obj.value;
	var id = obj.id;
	var cel = obj.name;
	var resultado = input;
	
    if(validarEntrada(caracter, "string") == false){
        return false;
    }else if(cel == "txt-cliente-celular"){
		
		if(input.length == 0){
            resultado = "(";
        }else if(input.length == 3){
            resultado += ")";
        }else if(input.length == 13){
            return false;
        }

        document.getElementById(id).value = resultado;
		
	}else{
			 
        if(input.length == 0){
            resultado = "(";
        }else if(input.length == 3){
            resultado += ")";
        }else if(input.length == 13){
            return false;
        }

        document.getElementById(id).value = resultado;
        }
}

function mascaraUf(obj,caracter){
   
	var input = obj.value;
	var id = obj.id;
	var uf = obj.name;
	var resultado = input;
	
    if(validarEntrada(caracter, "numeric") == false){
        return false;
    }else if(uf == "txt-estado"){
		
		if(input.length == 2){
            return false;
        }

        document.getElementById(id).value = resultado;
	}
}

function mascaraCep(obj,caracter){
   
	var input = obj.value;
	var id = obj.id;
	var cep = obj.name;
	var resultado = input;
	
    if(validarEntrada(caracter, "string") == false){
        return false;
    }else if(cep == "txt-cliente-cep" || cep =="txt-transporte-cep" || cep == "txt-cep-ordem"){
		
		if(input.length == 5){
            resultado += "-";
        }else if(input.length == 9){
            return false;
        }

        document.getElementById(id).value = resultado;
	}
}

function mascaraCPF(obj,caracter){
   
	var input = obj.value;
	var id = obj.id;
	var cpf = obj.name;
	var resultado = input;
	
    if(validarEntrada(caracter, "string") == false){
        return false;
    }else if(cpf == "cpf"){
		
		if(input.length == 3){
            resultado += ".";
        }else if(input.length == 7){
            resultado += ".";
        }else if(input.length == 11){
            resultado += "-";
        }else if(input.length == 14){
            return false;
        }

        document.getElementById(id).value = resultado;
    }
}

function mascaraCNPJ(obj,caracter){
   
	var input = obj.value;
	var id = obj.id;
	var cnpj = obj.name;
	var resultado = input;
	
    if(validarEntrada(caracter, "string") == false){
        return false;
    }else if(cnpj == "cnpj"){
		
		if(input.length == 2){
            resultado += ".";
        }else if(input.length == 6){
            resultado += ".";
        }else if(input.length == 10){
            resultado += "/";
        }else if(input.length == 15){
            resultado += "-";
        }else if(input.length == 18){
            return false;
        }

        document.getElementById(id).value = resultado;
    }
}