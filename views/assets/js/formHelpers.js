function mudarTipoBusca(){
    var tipoBusca = $("input[name='tipo-busca']:checked").val();
    
    if(tipoBusca == 1){
        $("#busca").attr("type", "text")
    }else{
        $("#busca").attr("type", "date")
    }   
}

function mudarTipoCliente(){
    var tipoCliente = $("input[name='tipo-cliente']:checked").val();
    
    if(tipoCliente == 1){
        $("#cpf-input").removeClass("d-none");
        $("#nome_completo").removeClass("d-none");

        $("#cnpj-input").addClass("d-none");
        $("#nome-fantasia").addClass("d-none");
        $("#razao_social").addClass("d-none");
    }else{
        $("#cpf-input").addClass("d-none");
        $("#nome_completo").addClass("d-none");

        $("#razao_social").removeClass("d-none");
        $("#nome-fantasia").removeClass("d-none");
        $("#cnpj-input").removeClass("d-none");
    } 
}