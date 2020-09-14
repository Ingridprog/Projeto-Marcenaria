function cadastroOrcamento() {
    let itens = arr
    var botao = $("#btn-cadastrar").text()
    console.log(botao)
    $.ajax({
        url: '../../../validacoes/validaForm.php',
        type: 'POST',
        data: {
            itens: itens,
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