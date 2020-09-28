function buscarOrcamento(){
    var tipoBusca = $("input[name='tipo-busca']:checked").val();

    if(tipoBusca == 1){
        var infoBusca = $('#nome').val();
    }else{
        var infoBusca = $('#data').val();
    }

    $.ajax({
        url:'../../helpers/buscar_orcamento.php',
        type:'POST',
        data:{
            tipo_busca:tipoBusca,
            info:infoBusca
        },
        success: function(data){
            console.log("oi")
        }
    })
}