<?php

require_once(dirname(__FILE__).'/../config.php');
require_once($base."/DAO/PessoaFisicaDao.php");
require_once($base."/DAO/PessoaJuridicaDao.php");
require_once($base."/DAO/OrcamentoDao.php");
require_once($base."/DAO/EnderecoDao.php");
require_once($base."/DAO/ItensOrcamentoDao.php");

$orcamentoDao = new OrcamentoDao($pdo);
$pessoafisicaDao = new PessoafisicaDao($pdo);
$itensOrcamentoDao = new ItensOrcamentoDao($pdo);

$id = filter_input(INPUT_GET, 'id');

if($id){
     $itensOrcamento = $itensOrcamentoDao->deleteListItens($id);     
     $orcamento = $orcamentoDao->delete($id);
}

header("Location: ../views/pages/home.php");

?>