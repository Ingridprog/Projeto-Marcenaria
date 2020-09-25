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