function cadastroOrcamento(modo) {

    var tipo = 0;

    console.log(modo)

    //Radio de tipo de cadastro
    var tipoCadastro = $("input[name='tipo-cliente']:checked").val();

    //Valores vindos dos campos do formulario
    var vendedor = $("#vendedor").val();
    var nomeCompleto = $("#nome_completo").val();
    var razaoSocial = $("#razao_social").val();
    var nomeFantasia = $("#nome_fantasia").val();
    var cpf = $("#cpf").val();
    var cnpj = $("#cnpj").val();
    var cep = $("#cep").val();
    var logradouro = $("#logradouro").val();
    var bairro = $("#bairro").val();
    var numero = $("#numero").val();
    var cidade = $("#cidade").val();
    var estado = $("#uf").val();
    var complemento = $("#complemento").val();
    var telefone = $("#telefone").val();
    var celular = $("#celular").val();
    var email = $("#email").val();
    var valor_total = $("#valor_total").val();
    var valor_desconto = $("#valor_desconto").val();
    var valor_desconto_format = valor_desconto.replace(",", ".")
    var condicao_pagamento = $("#condicao_pagamento").val();
    var observacoes = $("#observacoes").val();
    let itens = arr;
    var botao = $("#btn-cadastrar").text();

    var json = JSON.parse(localStorage.getItem('orcamento'))

    if(nomeCompleto != "" || razaoSocial != "" || nomeFantasia != "" || cep != "" || telefone != "" || celular != "" || email != ""){
        if (modo != "add") {
            $.ajax({
                url: '../../validacoes/validaForm.php',
                type: 'POST',
                data: {
                    vendedor: vendedor,
                    //Valores vindos do localStorage
                    id: json.id,
                    id_pessoa_fisica: json.pessoa_fisica.id ?? "",
                    id_pessoa_juridica: json.pessoa_juridica.id ?? "",
                    id_endereco: json.id_endereco,

                    //valores vindos dos inputs
                    itens: JSON.stringify(itens),
                    tipo_cliente: tipoCadastro,
                    nome_completo: nomeCompleto,
                    razao_social: razaoSocial,
                    nome_fantasia: nomeFantasia,
                    cpf: cpf,
                    cnpj: cnpj,
                    cep: cep,
                    logradouro: logradouro,
                    bairro: bairro,
                    numero: numero,
                    cidade: cidade,
                    estado: estado,
                    complemento: complemento,
                    telefone: telefone,
                    celular: celular,
                    email: email,
                    valor_desconto:valor_desconto_format,
                    valor_total:valor_total,
                    condicao_pagamento:condicao_pagamento,
                    observacoes:observacoes,
                    botao: botao,
                    tipo_cadastro: modo
                },
                success: function (data) {
                    localStorage.removeItem('orcamento')
                    alert("Alterações salvas com sucesso!")
                    window.location.href = `../pages/home.php`;
                },
                error: function () {
                    console.log('error')
                }
            })
        } else {
            $.ajax({
                url: '../../validacoes/validaForm.php',
                type: 'POST',
                data: {
                    //valores vindos dos inputs
                    vendedor: vendedor,
                    itens: JSON.stringify(itens),
                    tipo_cliente: tipoCadastro,
                    nome_completo: nomeCompleto,
                    razao_social: razaoSocial,
                    nome_fantasia: nomeFantasia,
                    cpf: cpf,
                    cnpj: cnpj,
                    cep: cep,
                    logradouro: logradouro,
                    bairro: bairro,
                    numero: numero,
                    cidade: cidade,
                    estado: estado,
                    complemento: complemento,
                    telefone: telefone,
                    celular: celular,
                    email: email,
                    valor_desconto:valor_desconto_format,
                    valor_total:valor_total,
                    condicao_pagamento:condicao_pagamento,
                    observacoes:observacoes,
                    botao: botao,
                    tipo_cadastro: modo
                },
                success: function (data) {
                    alert("Orçamento gerado com sucesso!");
                    window.location.href = `../pages/home.php`;
                },
                error: function () {
                    console.log('error')
                }
            })
        }
    }else{
        alert("Preencha todos os campos obrigatórios!")
    }
}