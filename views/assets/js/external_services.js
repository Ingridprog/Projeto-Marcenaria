const $cep = document.getElementById("cep");
const $logradouro = document.getElementById("logradouro");
const $bairro = document.getElementById("bairro");
const $cidade = document.getElementById("cidade");
const $uf = document.getElementById("uf");


const limpa_formulário_cep = () => {
    $logradouro.value=("");
    $bairro.value=("");
    $cidade.value=("");
    $uf.value=("");
}

const callback = (conteudo) => {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        $logradouro.value=(conteudo.logradouro);
        $bairro.value=(conteudo.bairro);
        $cidade.value=(conteudo.localidade);
        $uf.value=(conteudo.uf);

        $logradouro.setAttribute('readonly', true)
        $bairro.setAttribute('readonly', true)
        $cidade.setAttribute('readonly', true)
        $uf.setAttribute('readonly', true)
    }else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
        $logradouro.removeAttribute('readonly')
        $bairro.removeAttribute('readonly')
        $cidade.removeAttribute('readonly')
        $uf.removeAttribute('readonly')
    }
}

const pesquisarCep = (valor) => {
    var cep = valor.replace(/\D/g, '');

    if(cep != ''){
        var validarCep = /^[0-9]{8}$/;

        if(validarCep.test(cep)){
            $logradouro.value = "...";
            $bairro.value = "...";
            $cidade.value = "...";
            $uf.value = "..."

            var script = document.createElement('script');

            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=callback';

            document.body.appendChild(script)
        }else {
            limpa_formulário_cep();
            alert("cep não encontrado!")
        }
    }else{
        limpa_formulário_cep();
    }
}