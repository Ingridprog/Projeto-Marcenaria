var jsonModal = {}
function abrirModalOramento(idOrcamento){
    $.ajax({
        url:'../../helpers/editar_orcamento.php',
        type:"POST",
        data:{
            id:idOrcamento,
        },
        success: function(data){
            jsonModal = JSON.parse(data)
            $("#modal_orcamento").css({
                opacity:"1",
                visibility:"visible",
                zIndex:"99"
            })

            $("#modal_data_orcamento").html(jsonModal.data)
            $("#modal_nome_cliente").html(jsonModal.pessoa_fisica.nome)
            $("#")





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