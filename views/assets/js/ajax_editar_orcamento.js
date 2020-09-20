var item = "itens"
function editOrcamento(id){
    $.ajax({
        url:'../../helpers/editar_orcamento.php',
        type:'POST',
        data:{
            id:id
        },
        beforeSend: function(){
            console.log('carregando...')
        },
        success: function(data){
            var orcamento = JSON.parse(data);
            window.location.href = '../pages/orcamento.php';
        },
        error: function(){
            console.log('erro!')
        }
    })
}