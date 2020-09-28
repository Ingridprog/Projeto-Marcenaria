<?php

require_once(dirname(__FILE__)."/../config.php");
require_once($base."/DAO/OrcamentoDao.php");

$infomacaoBuscada = filter_input(INPUT_POST, 'info');
$tipoBusca = filter_input(INPUT_POST, 'tipo_busca');

if(isset($tipoBusca)){

    $orcamentoDao = new OrcamentoDao($pdo);

    if($tipoBusca == 1){
        // Busca por nome do cliente
        $dadosOrcamento = $orcamentoDao->findByClientName($infomacaoBuscada);
        print_r($dadosOrcamento);
    }else{
        // Busca por data de orçamento
    }
}

?>