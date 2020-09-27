<?php
require_once(dirname(__FILE__)."/../config.php");
require_once($base."/DAO/ItensOrcamentoDao.php");
require_once($base."/models/ItensOrcamento.php");

$id = filter_input(INPUT_POST, 'id');

if(isset($id)){
    
    $descricaoItem = filter_input(INPUT_POST, 'descricao_item');
    $quantidade = filter_input(INPUT_POST, 'quantidade');
    $preco = filter_input(INPUT_POST, 'preco');

    $itensOrcamento = new ItensOrcamento();
    $itensOrcamento->setId($id);
    $itensOrcamento->setDescricaoItem($descricaoItem);
    $itensOrcamento->setQuantidade($quantidade);
    $itensOrcamento->setPreco($preco);

    $itensOrcamentoDao = new ItensOrcamentoDao($pdo);
    
    if(!$itensOrcamentoDao->update($itensOrcamento))
        echo "ERROR";
    else
        echo "TRUE";

}
?>