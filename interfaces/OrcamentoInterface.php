<?php

interface OrcamentoInterface 
{
     public function add(Orcamento $orcamento, $tipo);
     public function findById($id);
     public function findAll();
     public function findByClientName($nome);
     public function findByDate($data);
     public function update(Orcamento $orcamento);
     public function delete($id);
}

?>