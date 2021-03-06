<?php

class Orcamento
{
     private $id;
     private $hora;
     private $data;
     private $observacoes;
     private $valorDesconto;
     private $valorTotal;
     private $condicaoPagamento;
     private $cnpj;
     private $vendedor;
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

     public function getCondicaoPagamento()
     {
          return $this->condicaoPagamento;
     }

     public function setCondicaoPagamento($condicaoPagamento)
     {
          $this->condicaoPagamento = $condicaoPagamento;
     }

     public function getCnpj()
     {
          return $this->cnpj;
     }

     public function setCnpj($cnpj)
     {
          $this->cnpj = $cnpj;
     }

     public function getVendedor()
     {
          return $this->vendedor;
     }

     public function setVendedor($vendedor)
     {
          $this->vendedor = $vendedor;
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