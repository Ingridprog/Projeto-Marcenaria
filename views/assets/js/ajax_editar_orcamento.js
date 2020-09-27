function editOrcamento(id){
    $.ajax({
        url:'../../helpers/editar_orcamento.php',
        type:'POST',
        data:{
            id:id
        },
        beforeSend: function(){
            console.log('carregando...')
        },
        success: function(data){
            // var json = JSON.parse(data)
            localStorage.setItem('orcamento', data)
            // var idOrcamento = json.id
            // var idPessoaFisica = json.pessoa_fisica.id ?? ""
            // var idPessoaJurica = json.pessoa_juridica.id ?? ""
            // var idEndereco = json.id_endereco

            // console.log(` orcamento: ${idOrcamento} id_p: ${idPessoaFisica} id_j: ${idPessoaJurica} id_e: ${idEndereco}`)
            // &id=${idOrcamento}&id_pessoa_fisica=${idPessoaFisica}&id_pessoa_juridica=${idPessoaJurica}&id_endereco=${idEndereco}
            window.location.href = `../pages/orcamento.php?modo=editar`;
            },
        error: function(){
            console.log('erro!')
        }
    })
}

function editarItensOrcamento(idItem, idOrcamento){
    var descricaoItem = $("#desc_item_edit").val()
    var quantidade = $("#quantidade_item_edit").val()
    var preco = $("#preco_item_edit").val()

    $.ajax({
        url:'../../helpers/editar_itens_orcamento.php',
        type:'POST',
        data:{
            id:idItem,
            descricao_item: descricaoItem,
            quantidade: quantidade,
            preco: preco,
        },
        success: function(data){
            if(data == "TRUE"){
                fecharModal();
                editOrcamento(idOrcamento);
            }else{
                alert('Erro ao editar');
            }
        }
    })
}

function excluirItensOrcamento(idItem, idOrcamento){
    $.ajax({
        url:'../../helpers/excluir_itens_orcamento.php',
        type:'POST',
        data:{
            id:idItem
        },
        success: function(data){
            editOrcamento(idOrcamento);
        },
        error: function(){
            console.log('erro')
        }
    })
}