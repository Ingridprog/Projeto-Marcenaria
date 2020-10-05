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
        $("#nome-completo").removeClass("d-none");

        $("#cnpj-input").addClass("d-none");
        $("#nome-fantasia").addClass("d-none");
        $("#razao-social").addClass("d-none");
    }else{
        $("#cpf-input").addClass("d-none");
        $("#nome-completo").addClass("d-none");

        $("#razao-social").removeClass("d-none");
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
const $pessoa_fisica = document.getElementById("pessoa-fisica");
const $pessoa_juridica = document.getElementById("pessoa-juridica");

var arr = [];
var totalArr = [];
var valorTotal = 0

const reducer = (acc, currentValue) => acc + currentValue;

const resetarCampos = () =>{
    $descricaoItem.value = ""
    $quantidadeItem.value = ""
    $precoItem.value = ""
    $valor_desconto.value = 0
}

//removendo itens da lista
const removerItem = (i) => {
    arr.splice(i, 1)
    totalArr.splice(i, 1)
    // const $item = document.getElementById(`item${i}`)
    $valor_desconto.value = 0
    // $item.style.display = "none";
    
    // $valor_total.value = totalArr.reduce(reducer);
    // $lista.innerHTML = listarItens(arr).reduce(reducer);
    
    if(arr.length != 0){
        $valor_total.value = totalArr.reduce(reducer);
        $lista.innerHTML = listarItens(arr).reduce(reducer)
    }else{
        $valor_total.value = 0
        $lista.innerHTML = ""
    }
}

//listando itens do orçamento
const listarItens = (array) =>{
    return array.map((elemento, i) =>
        `
            <tr id="item${i}" name="itens[]">
                <td>${elemento[1]}</td>
                <td>${elemento[2]}</td>
                <td>R$ ${elemento[3]}</td>
                <td>R$ ${elemento[2] * elemento[3]}</td>
                <td class="small-column">
                    <button type="button" class="btn btn-sm btn-danger" onclick="removerItem(${i})">Excluir</button>
                </td>
            </tr>
        `
    )
}

if(localStorage.getItem('orcamento') != null){
    jsonLocal = JSON.parse(localStorage.getItem('orcamento'));
    $pessoa_fisica.setAttribute('disabled', 'true')
    $pessoa_juridica.setAttribute('disabled', 'true')

    for(let i = 0; i < jsonLocal.itens_orcamento.length; i++){
        
        arr.push(Object.values(jsonLocal.itens_orcamento[i]))

        let itemAux = [];
        
        for(let j = 0; j < arr[i].length; j++){
            
            switch(j){
                case 0:
                    itemAux.push(parseInt(arr[i][j]))
                    break
                case 2:
                    itemAux.push(parseInt(arr[i][j]))
                    break
                case 3:
                    itemAux.push(parseFloat(arr[i][j]))
                    totalArr.push(parseFloat(arr[i][j]) * itemAux[2])
                    break
                case 4:
                    itemAux.push(parseInt(arr[i][j]))
                    break
                default:
                    itemAux.push(arr[i][j])
                    break
            }

        }
        arr.splice(i, 1)
        arr.push(itemAux)
        console.log(totalArr)
    }
    valorTotal = parseFloat(jsonLocal.valor_total)
    $valor_total.value = totalArr.reduce(reducer) - parseFloat($valor_desconto.value)
}

function adicionarItens(){
    var descItem = $descricaoItem.value;
    var qtdItem = parseInt($quantidadeItem.value);
    var precoItem = $precoItem.value;
    var precoItemFormatado = precoItem.replace(",",".")
    var item = [0, descItem, parseInt(qtdItem),parseFloat(precoItemFormatado), 0];

    console.log(descItem)


    if((descItem != "") && (qtdItem != "" || qtdItem != 0) && (precoItem != "" || precoItem != 0)){
        arr.push(item);
        totalArr.push(precoItemFormatado * qtdItem);
        console.log(arr, totalArr)

        $valor_total.value = totalArr.reduce(reducer).toFixed(2);
        $lista.innerHTML = listarItens(arr).reduce(reducer)
        resetarCampos()
    }else
        alert("Preencha todas as informações do item!")
}

function aplicarDesconto(){
    var valorAntigo = $valor_total.value;
    var valorDesconto = $valor_desconto.value;

    var valorDescontoFormatado = valorDesconto.replace(",", ".")

    if(valorDesconto != ""){
        let calculoDesconto = totalArr.reduce(reducer) - parseFloat(valorDescontoFormatado)
        $valor_total.value = calculoDesconto.toFixed(2)

    }else{
        $valor_total.value = totalArr.reduce(reducer).toFixed(2);
    }
}






