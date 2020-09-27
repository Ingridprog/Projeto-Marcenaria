<?php

interface OrcamentoInterface 
{
     public function add(Orcamento $orcamento, $tipo);
     public function findById($id);
     public function findAll();
     public function update(Orcamento $orcamento);
     public function delete($id);
}

?>