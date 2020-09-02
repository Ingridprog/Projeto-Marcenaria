<?php

class Orcamento
{
     private $id;
     private $hora;
     private $data;
     private $observacoes;
     private $descricaoItem;
     private $quantidade;
     private $preco;
     private $valorMaterial;
     private $valorServico;
     private $valorDesconto;
     private $valorTotal;
     private $cnpj;
     private $dataEntrega;
     private $situacao;
     private $idPessoaFisica;
     private $idPessoaJuridica;

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

     public function getObservacoes()
     {
          return $this->observacoes;
     }

     public function setObservacoes($observacoes)
     {
          $this->observacoes = $observacoes;
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

     public function getValorMaterial()
     {
          return $this->valorMaterial;
     }

     public function setValorMaterial($valorMaterial)
     {
          $this->valorMaterial = $valorMaterial;
     }

     public function getValorServico()
     {
          return $this->valorServico;
     }

     public function setValorServico($valorServico)
     {
          $this->valorServico = $valorServico;
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

     public function getCnpj()
     {
          return $this->cnpj;
     }

     public function setCnpj($cnpj)
     {
          $this->cnpj = $cnpj;
     }
 
     public function getDataEntrega()
     {
          return $this->dataEntrega;
     }

     public function setDataEntrega($dataEntrega)
     {
          $this->dataEntrega = $dataEntrega;
     }
    
     public function getSituacao()
     {
          return $this->situacao;
     }

     public function setSituacao($situacao)
     {
          $this->situacao = $situacao;
     }

     public function getIdPessoaFisica()
     {
          return $this->idPessoaFisica;
     }

     public function setIdPessoaFisica($idPessoaFisica)
     {
          $this->idPessoaFisica = $idPessoaFisica;
     }

     public function getIdPessoaJuridica()
     {
          return $this->idPessoaJuridica;
     }

     public function setIdPessoaJuridica($idPessoaJuridica)
     {
          $this->idPessoaJuridica = $idPessoaJuridica;
     }

}

?>