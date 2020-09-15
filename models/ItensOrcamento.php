<?php

class ItensOrcamento{
     private $id;
     private $descricaoItem;
     private $quantidade;
     private $preco;

     public function getId()
     {
          return $this->id;
     }

     public function setId($id)
     {
          $this->id = $id;
     }

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