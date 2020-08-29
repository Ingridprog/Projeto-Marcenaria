<?php

class DadosExb
{

     private $nomeFantasia;
     private $razaoSocial;
     private $idEndereco;
     private $cnpj;

     public function getNomeFantasia()
     {
          return $this->nomeFantasia;
     }

     public function setNomeFantasia($nomeFantasia)
     {
          $this->nomeFantasia = $nomeFantasia;
     }

     public function getRazaoSocial()
     {
          return $this->razaoSocial;
     }

     public function setRazaoSocial($razaoSocial)
     {
          $this->razaoSocial = $razaoSocial;
     }

     public function getIdEndereco()
     {
          return $this->idEndereco;
     }

     public function setIdEndereco($idEndereco)
     {
          $this->idEndereco = $idEndereco;
     }

     public function getCnpj()
     {
          return $this->cnpj;
     }

     public function setCnpj($cnpj)
     {
          $this->cnpj = $cnpj;
     }
}

?>