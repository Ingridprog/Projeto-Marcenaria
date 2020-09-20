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
            var teste = JSON.parse(data)
            localStorage.setItem('orcamento', data)
            console.log(teste)
            window.location.href = '../pages/orcamento.php';
            },
        error: function(){
            console.log('erro!')
        }
    })
}