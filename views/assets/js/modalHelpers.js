function abrirModalOramento(){
    $("#modal_orcamento").css({
        opacity:"1",
        visibility:"visible",
        zIndex:"99"
    })

    $.ajax({
        url:'modais/modal_orcamento.php',
        type:"POST",
        success: function(data){
            $("#modal_orcamento").html(data)
        }
    })
}

function fecharModal(){
    $("#modal_orcamento").css({
        opacity:"0",
        visibility:"hidden",
        zIndex:"0"
    })
}