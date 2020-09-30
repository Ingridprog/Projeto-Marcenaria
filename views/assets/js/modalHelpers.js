
const listarItensResumo = (array) =>{
    return array.map((elemento, i) =>
        `
            <tr id="item${i}" name="itens[]">
                <td>${elemento.descricao_item}</td>
                <td>${elemento.quantidade}</td>
                <td>R$ ${elemento.preco.replace(".", ",")}</td>
                <td>R$  ${parseFloat(elemento.quantidade * elemento.preco).toFixed(2).replace(".", ",")}</td>
            </tr>
        `
    )
}

function abrirModalOramento(idOrcamento){
    var jsonModal = {}
    $.ajax({
        url:'../../helpers/editar_orcamento.php',
        type:"POST",
        data:{
            id:idOrcamento,
        },
        success: function(data){
            jsonModal = JSON.parse(data)
            console.log(jsonModal)

            $("#modal_cpf").html("")
            $("#modal_celular").html("")
            $("#modal_telefone").html("")
            $("#modal_email").html("")
            
            $("#modal_orcamento").css({
                opacity:"1",
                visibility:"visible",
                zIndex:"99"
            })

            let dataFormatada = jsonModal.data.split("-")
            $("#modal_vendedor").html(jsonModal.vendedor)
            $("#modal_data_orcamento").html(dataFormatada[2]+"/"+dataFormatada[1]+"/"+dataFormatada[0])
            $("#modal_nome_cliente").html(jsonModal.pessoa_fisica.nome ?? jsonModal.pessoa_juridica.nome_fantasia)
            
            if(jsonModal.pessoa_fisica.cpf != null){
                $("#modal_cpf").html("CPF: "+jsonModal.pessoa_fisica.cpf)
            }else
                $("#modal_cpf").html("CNPJ: "+jsonModal.pessoa_juridica.cnpj)
            
            $("#modal_celular").html(jsonModal.pessoa_fisica.celular ?? jsonModal.pessoa_juridica.celular)
            $("#modal_telefone").html(jsonModal.pessoa_fisica.telefone ?? jsonModal.pessoa_juridica.telefone)
            $("#modal_email").html(jsonModal.pessoa_fisica.email ?? jsonModal.pessoa_juridica.email)

            $("#modal_valor_total").html("R$ "+jsonModal.valor_total.toFixed(2).replace(".", ","))
            $("#tbody-modal").html(listarItensResumo(jsonModal.itens_orcamento))
            console.log(jsonModal.itens_orcamento)
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