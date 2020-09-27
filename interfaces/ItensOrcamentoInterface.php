<?php

interface ItensOrcamentoInterface 
{
     public function add(ItensOrcamento $itensOrcamento);
     public function findById($id);
     public function findAll();
     public function findAllByOrcamento($idOrcamento);
     public function update(ItensOrcamento $itensOrcamento);
     public function delete($id);
     public function deleteListItens($idOrcamento);
}

?>