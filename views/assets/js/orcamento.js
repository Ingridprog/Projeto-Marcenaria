//Dados do cliente
const $pessoaFisica = document.getElementById('pessoa-fisica')
const $pessoaJuridica = document.getElementById('pessoa-juridica')
//inputs
const $nomeCompleto = document.getElementById('nome_completo')
const $razaoSocial = document.getElementById('razao_social')
const $nomeFantasia = document.getElementById('nome_fantasia')
const $cnpj = document.getElementById('cnpj')
const $cpf = document.getElementById('cpf')
const $celular = document.getElementById('celular')
const $email = document.getElementById('email')
const $telefone = document.getElementById('telefone')

//wrappers
const $wrapperNomeCompleto = document.getElementById('nome-completo')
const $wrapperRazaoSocial = document.getElementById('razao-social')
const $wrapperNomeFantasia = document.getElementById('nome-fantasia')
const $wrapperCpf = document.getElementById('cpf-input')
const $wrapperCnpj = document.getElementById('cnpj-input')


//dados de endereço
const $cepEdit = document.getElementById('cep')
const $logradouroEdit = document.getElementById('logradouro')
const $bairroEdit = document.getElementById('bairro')
const $numeroEdit = document.getElementById('numero')
const $cidadeEdit = document.getElementById('cidade')
const $ufEdit = document.getElementById('uf')
const $complementoEdit = document.getElementById('complemento')

//Dados do orçamento
const $valorDesconto = document.getElementById('valor_desconto')
const $valorTotal = document.getElementById('valor_total')
const $observacoes = document.getElementById('observacoes')

//tabela
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

if(localStorage.getItem('orcamento') != null){

    //Buscando dados do orçamento no localStorage
    var orcamento = JSON.parse(localStorage.getItem('orcamento'))

    if(orcamento != null){

        //Adicionando o radio de acordo com o tipo de cliente
        if(!orcamento.pessoa_fisica){
            $pessoaJuridica.setAttribute('checked', 'true')

            //renderizando campos de pessoa juridica
            $wrapperRazaoSocial.classList.remove('d-none')
            $wrapperNomeFantasia.classList.remove('d-none')
            $wrapperCnpj.classList.remove('d-none')

            //escondendo campos de pessoa física
            $wrapperNomeCompleto.classList.add('d-none')
            $wrapperCpf.classList.add('d-none')

            $razaoSocial.value = orcamento.pessoa_juridica.razao_social
            $nomeFantasia.value = orcamento.pessoa_juridica.nome_fantasia
            $cnpj.value = orcamento.pessoa_juridica.cnpj
            $celular.value = orcamento.pessoa_juridica.celular
            $email.value = orcamento.pessoa_juridica.email
            $telefone.value = orcamento.pessoa_juridica.telefone

        }else{
            $pessoaFisica.setAttribute('checked', 'true')
        
            $nomeCompleto.value = orcamento.pessoa_fisica.nome
            $cpf.value = orcamento.pessoa_fisica.cpf
            $celular.value = orcamento.pessoa_fisica.celular
            $email.value = orcamento.pessoa_fisica.email
            $telefone.value = orcamento.pessoa_fisica.telefone
        }

        $cepEdit.value = orcamento.cep
        $logradouroEdit.value = orcamento.logradouro
        $bairroEdit.value = orcamento.bairro
        $numeroEdit.value = orcamento.numero
        $cidadeEdit.value = orcamento.cidade
        $ufEdit.value = orcamento.uf
        $complementoEdit.value = orcamento.complemento
        
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

    localStorage.removeItem('orcamento')
}else
    console.log('erro')
