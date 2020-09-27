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

function abrirModalEditarItem(idItem){
    $("#modal_itens").css({
        opacity:"1",
        visibility:"visible",
        zIndex:"99"
    })

    $.ajax({
        url:'modais/modal_item.php',
        type:'POST',
        data:{
            id:idItem,
        },
        success: function(data){
            $("#modal_itens").html(data)
        }
    })
}

function fecharModal(){
    $("#modal_orcamento").css({
        opacity:"0",
        visibility:"hidden",
        zIndex:"0"
    })

    $("#modal_itens").css({
        opacity:"0",
        visibility:"hidden",
        zIndex:"0"
    })
}