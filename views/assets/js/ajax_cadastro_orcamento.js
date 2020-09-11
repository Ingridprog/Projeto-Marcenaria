function cadastroOrcamento(){
    let itens = arr
    
    $.ajax({
        url:'arquivoDoPhp',
        type:'POST',
        data:{
            itens:itens
        },
        success: function(data){
            console.log(data)
        },
        error: function(){
            console.log('error')
        }
    })
}