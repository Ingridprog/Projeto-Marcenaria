var response = {}

    // const reducer = (acumuladora, valor) => acumuladora + valor

const listarResultados = (array) =>{
    if(array.length == 0){
        return `
        <tr>
            <td colspan="4">Nenhum resultado encontrado</td>
        </tr>
        `
    }
    return array.map((elemento, i) => {

        let dataFormatada = elemento.data.split("-");

        return `
            <tr id="item${i}" name="itens[]">
                <td>${dataFormatada[2]}/${dataFormatada[1]}/${dataFormatada[0]}</td>
                <td>${elemento.nome_pessoa_fisica ?? elemento.nome_fantasia}</td>
                <td>R$ ${elemento.valor_total.replace(".", ",")}</td>
                <td>
                    <button class="btn btn-info btn-sm" onclick="abrirModalOramento(${elemento.id})">Resumo</button>
                    <button onclick="editOrcamento(${elemento.id})" class="btn btn-warning btn-sm">Editar</button>
                    <a href="../../validacoes/delete.php?id=${elemento.id}" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir?')">Excluir</a> 
                </td>
            </tr>
        `
    })
}

function buscarOrcamento(){
    var tipoBusca = $("input[name='tipo-busca']:checked").val();
    var infoBusca = $('#busca').val();

    $.ajax({
        url:'../../helpers/buscar_orcamento.php',
        type:'POST',
        data:{
            tipo_busca:tipoBusca,
            info:infoBusca
        },
        success: function(data){
            response = JSON.parse(data)
            $("#lista_resultados").html(listarResultados(response))
        }
    })
}
