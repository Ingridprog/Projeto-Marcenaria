<?php
require_once('../../../config.php');
require_once("$base/DAO/ItensOrcamentoDao.php");

$id = filter_input(INPUT_POST, 'id');
$descricaoItem = (String) "";
$quantidade = (int) 0;
$preco = (float) 0;
$dadosItensOrcamento = array();
$idOrcamento = (int) 0;

if(isset($id)){
    $itensOrcamentoDao = new ItensOrcamentoDao($pdo);
    $dadosItensOrcamento = $itensOrcamentoDao->findById($id);
    $descricaoItem = $dadosItensOrcamento->getDescricaoItem();
    $quantidade = $dadosItensOrcamento->getQuantidade();
    $preco = $dadosItensOrcamento->getPreco();
    $idOrcamento = $dadosItensOrcamento->getIdOrcamento();
}

?>

<div class="content-itens p-3">
    <div class="row mb-4">
        <!-- CADASTRAR ITENS NO PEDIDO -->
        <div class="col-8">
            <label for="">Descrição do item</label>
            <input type="text" class="form-control" name="descricao_item" id="desc_item_edit" value="<?=$descricaoItem?>">
        </div>
        <div class="col-2">
            <label for="">Quantidade</label>
            <input type="text" class="form-control" name="quantidade" id="quantidade_item_edit" value="<?=$quantidade?>">
        </div>
        <div class="col-2">
            <label for="">Preço</label>
            <input type="text" class="form-control" name="preco" id="preco_item_edit" value="<?=$preco?>">
        </div>
        
    </div>

    <div class="row">
        <div class="col d-flex justify-content-center">
            <button class="btn btn-success mr-5" onclick="editarItensOrcamento(<?=$id?>, <?=$idOrcamento?>)">
                Editar
                <img src="../assets/img/tick.png" class="button-icon" alt="editar">
            </button>
            <button class="btn btn-danger" onclick="fecharModal()">Fechar 
                <img src="../assets/img/x-mark.png" class="button-icon" alt="close">
            </button>

        </div>
    </div>
</div>