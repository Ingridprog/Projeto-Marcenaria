<?php

class Orcamento
{
     private $id;
     private $hora;
     private $data;
     private $valorServico;
     private $valorMaterial;
     private $valorDesconto;
     private $valorTotal;
     private $cnpjEmpresa;
     private $dataEntrega;
     private $observacoes;
     private $idFormaPagamento;
     private $descricaoItem;
     private $quantidade;
     private $situacao = 0;
     private $preco;

     public function getId()
     {
          return $this->id;
     }

     public function setId($id)
     {
          $this->id = $id;
     }

     public function getHora()
     {
          return $this->hora;
     }

     public function setHora($hora)
     {
          $this->hora = $hora;
     }

     public function getData()
     {
          return $this->data;
     }

     public function setData($data)
     {
          $this->data = $data;
     }

     public function getValorServico()
     {
          return $this->valorServico;
     }

     public function setValorServico($valorServico)
     {
          $this->valorServico = $valorServico;
     }

     public function getValorMaterial()
     {
          return $this->valorMaterial;
     }

     public function setValorMaterial($valorMaterial)
     {
          $this->valorMaterial = $valorMaterial;
     }

     public function getValorDesconto()
     {
          return $this->valorDesconto;
     }

     public function setValorDesconto($valorDesconto)
     {
          $this->valorDesconto = $valorDesconto;
     }

     public function getValorTotal()
     {
          return $this->valorTotal;
     }

     public function setValorTotal($valorTotal)
     {
          $this->valorTotal = $valorTotal;
     }

     public function getCnpjEmpresa()
     {
          return $this->cnpjEmpresa;
     }

     public function setCnpjEmpresa($cnpjEmpresa)
     {
          $this->cnpjEmpresa = $cnpjEmpresa;
     }
 
     public function getDataEntrega()
     {
          return $this->dataEntrega;
     }

     public function setDataEntrega($dataEntrega)
     {
          $this->dataEntrega = $dataEntrega;
     }
    
     public function getObservacoes()
     {
          return $this->observacoes;
     }

     public function setObservacoes($observacoes)
     {
          $this->observacoes = $observacoes;
     }

     public function getIdFormaPagamento()
     {
          return $this->idFormaPagamento;
     }

     public function setIdFormaPagamento($idFormaPagamento)
     {
          $this->idFormaPagamento = $idFormaPagamento;

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

     public function getSituacao()
     {
          return $this->situacao;
     }

     public function setSituacao($situacao)
     {
          $this->situacao = $situacao;
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