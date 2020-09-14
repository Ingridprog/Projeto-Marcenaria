<?php

require_once(dirname(__FILE__).'/../config.php');
require_once($base."/DAO/PessoaFisicaDao.php");
require_once($base."/DAO/PessoaJuridicaDao.php");
require_once($base."/DAO/OrcamentoDao.php");
require_once($base."/DAO/EnderecoDao.php");

$orcamentoDao = new OrcamentoDao($pdo);
$pessoafisicaDao = new PessoafisicaDao($pdo);

$id = filter_input(INPUT_GET, 'id');

if($id){
     $orcamento = $orcamentoDao->delete($id);
}

header("Location: ../views/pages/home.php");

?>