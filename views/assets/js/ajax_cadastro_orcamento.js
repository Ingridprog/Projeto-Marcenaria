function cadastroOrcamento() {

    var tipo = 0;

    //Radio de tipo de cadastro
    var tipoCadastro = $("input[name='tipo-cliente']:checked").val();

    //Valores vindos dos campos do formulario
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
    var observacoes = $("#observacoes").val();

    // if (tipoCadastro == 1)
    //     tipo = $("#pessoa_fisica").val();
    // else
    //     tipo = $("#pessoa_juridica").val();

    let itens = arr;
    var botao = $("#btn-cadastrar").text();

    $.ajax({
        url: '../../validacoes/validaForm.php',
        type: 'POST',
        data: {
            itens: itens,
            tipo_cliente: tipoCadastro,
            nome_completo: nomeCompleto,
            razao_social: razaoSocial,
            nome_fantasia: nomeFantasia,
            cpf:cpf,
            cnpj:cnpj,
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
            valor_desconto:valor_desconto,
            valor_total:valor_total,
            observacoes:observacoes,
            botao: botao
        },
        success: function (data) {
            console.log(data)
        },
        error: function () {
            console.log('error')
        }
    })
}