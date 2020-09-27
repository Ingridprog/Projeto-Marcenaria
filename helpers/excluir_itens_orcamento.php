<?php
require_once(dirname(__FILE__)."/../config.php");
require_once($base."/DAO/ItensOrcamentoDao.php");

$id = filter_input(INPUT_POST, 'id');

if(isset($id)){
    $itensOrcamentoDao = new ItensOrcamentoDao($pdo);
    
    if(!$itensOrcamentoDao->delete($id))
        echo "ERROR";
    else
        echo "TRUE";
}

?>