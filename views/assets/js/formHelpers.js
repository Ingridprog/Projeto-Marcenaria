//Usando JQUERY
function mudarTipoBusca(){
    var tipoBusca = $("input[name='tipo-busca']:checked").val();
    
    if(tipoBusca == 1){
        $("#busca").attr("type", "text")
    }else{
        $("#busca").attr("type", "date")
    }   
}

//Muda campos do formulário de acordo com a seleção do tipo de cliente
function mudarTipoCliente(){
    var tipoCliente = $("input[name='tipo-cliente']:checked").val();
    
    if(tipoCliente == 1){
        $("#cpf-input").removeClass("d-none");
        $("#nome_completo").removeClass("d-none");

        $("#cnpj-input").addClass("d-none");
        $("#nome-fantasia").addClass("d-none");
        $("#razao_social").addClass("d-none");
    }else{
        $("#cpf-input").addClass("d-none");
        $("#nome_completo").addClass("d-none");

        $("#razao_social").removeClass("d-none");
        $("#nome-fantasia").removeClass("d-none");
        $("#cnpj-input").removeClass("d-none");
    } 
}



// Interações dos itens do orçamento
// JS Puro
const $lista = document.getElementById("tbody");
const $valor_total = document.getElementById("valor_total");
const $valor_desconto = document.getElementById("valor_desconto");
const $descricaoItem = document.getElementById("desc_item");
const $quantidadeItem = document.getElementById("quantidade_item");
const $precoItem = document.getElementById("preco_item");

var arr = [];
var totalArr = [];
var valorTotal = 0
const reducer = (acc, currentValue) => acc + currentValue;

const resetarCampos = () =>{
    $descricaoItem.value = ""
    $quantidadeItem.value = ""
    $precoItem.value = ""
}

//removendo itens da lista
const removerItem = (i) => {
    arr.splice(i, 1)
    totalArr.splice(i, 1)
    const $item = document.getElementById(`item${i}`)
    $item.style.display = "none";
    
    if(arr.length != 0)
        $valor_total.value = totalArr.reduce(reducer);
    else
        $valor_total.value = 0
}

//listando itens do orçamento
const listarItens = (array) =>{
    return array.map((elemento, i) =>
        `
            <tr id="item${i}" name="itens[]">
                <td>${elemento[0]}</td>
                <td>${elemento[1]}</td>
                <td>${elemento[2]}</td>
                <td>${elemento[2] * elemento[1]}</td>
                <td class="small-column">
                <button type="button" class="btn btn-sm btn-danger" onclick="removerItem(${i})">Excluir</button>
                </td>
            </tr>
        `
    )
}


function adicionarItens(){
    var descItem = $descricaoItem.value;
    var qtdItem = parseInt($quantidadeItem.value);
    var precoItem = parseFloat($precoItem.value);
    var item = [descItem, parseInt(qtdItem),precoItem];

    arr.push(item);
    totalArr.push(precoItem * qtdItem);

    console.log(totalArr)

    $valor_total.value = totalArr.reduce(reducer);
    $lista.innerHTML = listarItens(arr).reduce(reducer)
    resetarCampos()
}

function aplicarDesconto(){
    var valorAntigo = $valor_total.value;
    var valorDesconto = $valor_desconto.value;

    if(valorDesconto != ""){
        $valor_total.value = totalArr.reduce(reducer) - parseFloat(valorDesconto)
    }else{
        $valor_total.value = totalArr.reduce(reducer);
    }
    
    

}





