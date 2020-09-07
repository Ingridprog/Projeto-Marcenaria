<?php

class ItensOrcamento{
     private $descricaoItem;
     private $quantidade;
     private $preco;

     public function getDescricaoItem()
     {
          return $this->descricaoItem;
     }

     public function setDescricaoItem($descricaoItem)
     {
          $this->descricaoItem = $descricaoItem;
     }
     public function getQuantidade()
     {
          return $this->quantidade;
     }

     public function setQuantidade($quantidade)
     {
          $this->quantidade = $quantidade;
     }

     public function getPreco()
     {
          return $this->preco;
     }

     public function setPreco($preco)
     {
          $this->preco = $preco;
     }

}

?>