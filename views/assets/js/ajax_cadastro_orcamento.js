function cadastroOrcamento() {

    var tipo = 0;

    //Radio de tipo de cadastro
    var tipoCadastro = $("input[name='tipo-busca']:checked").val();

    //Valores vindos dos campos do formulario
    var nomeCompleto = $("#nome_completo").val();
    var razaoSocial = $("#razao_social").val();
    var nomeFantasia = $("#nome_fantasia").val();
    var cep = $("#cep").val();
    var logradouro = $("#logradouro").val();
    var bairro = $("#bairro").val();
    var numero = $("#numero").val();
    var cidade = $("#cidade").val();
    var estado = $("#uf").val();
    var complemento = $("#complemento").val();
    var telefone = $("#telefono").val();
    var celular = $("#celular").val();
    var email = $("#email").val();

    if (tipoCadastro == 1)
        tipo = $("#pessoa_fisica").val();
    else
        tipo = $("#pessoa_juridica").val();

    let itens = arr;
    var botao = $("#btn-cadastrar").text();

    $.ajax({
        url: '../../validacoes/validaForm.php',
        type: 'POST',
        data: {
            itens: itens,
            tipo: tipo,
            nome_completo: nomeCompleto,
            razao_social: razaoSocial,
            nome_fantasia: nomeFantasia,
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