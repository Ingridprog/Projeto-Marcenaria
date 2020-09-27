<?php
require_once('../../config.php');

$id = filter_input(INPUT_POST, 'id');

if(isset($id)){
    
}

?>

<div class="content-itens p-3">
    <div class="row mb-4">
        <!-- CADASTRAR ITENS NO PEDIDO -->
        <div class="col-8">
            <label for="">Descrição do item</label>
            <input type="text" class="form-control" name="descricao_item" id="desc_item">
        </div>
        <div class="col-2">
            <label for="">Quantidade</label>
            <input type="text" class="form-control" name="quantidade" id="quantidade_item">
        </div>
        <div class="col-2">
            <label for="">Preço</label>
            <input type="text" class="form-control" name="preco" id="preco_item">
        </div>
        
    </div>

    <div class="row">
        <div class="col d-flex justify-content-center">
            <button class="btn btn-success mr-5">
                Editar
                <img src="../assets/img/tick.png" class="button-icon" alt="editar">
            </button>
            <button class="btn btn-danger" onclick="fecharModal()">Fechar 
                <img src="../assets/img/x-mark.png" class="button-icon" alt="close">
            </button>

        </div>
    </div>
</div>