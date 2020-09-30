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
            console.log(jsonModal)
            
            $("#modal_orcamento").css({
                opacity:"1",
                visibility:"visible",
                zIndex:"99"
            })

            let dataFormatada = jsonModal.data.split("-")

            $("#modal_data_orcamento").html(dataFormatada[2]+"/"+dataFormatada[1]+"/"+dataFormatada[0])
            $("#modal_nome_cliente").html(jsonModal.pessoa_fisica.nome)
            $("#modal_cpf").html(jsonModal.pessoa_fisica.cpf)
            $("#modal_celular").html(jsonModal.pessoa_fisica.celular)
            $("#modal_telefone").html(jsonModal.pessoa_fisica.telefone)
            $("#modal_email").html(jsonModal.pessoa_fisica.email)
            $("#modal_valor_total").html(jsonModal.valor_total)

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