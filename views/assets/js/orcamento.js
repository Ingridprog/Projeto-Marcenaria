//Campos do orçamento
const $pessoaFisica = document.getElementById('pessoa-fisica')
const $pessoaJuridica = document.getElementById('pessoa-juridica')
const $nomeCompleto = document.getElementById('nome_completo')
const $cpf = document.getElementById('cpf')
const $celular = document.getElementById('celular')
const $email = document.getElementById('email')
const $telefone = document.getElementById('telefone')
const $valorDesconto = document.getElementById('valor_desconto')
const $valorTotal = document.getElementById('valor_total')
const $observacoes = document.getElementById('observacoes')
const $tbodyItens = document.getElementById('tbody')

//listando itens do orçamento
const listarItensOrcamento = (array) =>{
    return array.map((elemento, i) =>
        `
            <tr id="item${i}" name="itens[]">
                <td>${elemento.descricao_item}</td>
                <td>${elemento.quantidade}</td>
                <td>${parseFloat(elemento.preco)}</td>
                <td>${parseFloat(elemento.preco) * parseInt(elemento.quantidade)}</td>
                <td class="small-column">
                <button type="button" class="btn btn-sm btn-danger" onclick="removerItem(${i})">Excluir</button>
                </td>
            </tr>
        `
    )
}


//Buscando dados do orçamento no localStorage
var orcamento = JSON.parse(localStorage.getItem('orcamento'))

//Adicionando o radio de acordo com o tipo de cliente
if(!orcamento.pessoa_fisica)
    $pessoaJuridica.setAttribute('checked', 'true')
else
    $pessoaFisica.setAttribute('checked', 'true')

if(orcamento != null){
   
    $nomeCompleto.value = orcamento.pessoa_fisica.nome
    $cpf.value = orcamento.pessoa_fisica.cpf
    $celular.value = orcamento.pessoa_fisica.celular
    $email.value = orcamento.pessoa_fisica.email
    $telefone.value = orcamento.pessoa_fisica.telefone
    $valorDesconto.value = orcamento.valor_desconto
    $valorTotal.value = orcamento.valor_total
    $observacoes.value = orcamento.observacoes

    if(!orcamento.itens_orcamento){
        //Caso não haja itens
        $tbodyItens.innerHTML = "<tr style='background-color:#ffbdbd;'><td>Sem itens</td><td></td><td></td><td></td><td></td></tr>"
    }else{
        // console.log(orcamento.itens_orcamento)
        console.log($tbodyItens.innerHTML = listarItensOrcamento(orcamento.itens_orcamento).reduce(reducer))
    }

}