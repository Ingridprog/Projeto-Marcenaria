<?php

class PessoaJuridica
{
     private $id;
     private $razaoSocial;
     private $nomeFantasia;
     private $email;
     private $telefone;
     private $celular;
     private $cnpj;

     public function getId()
     {
          return $this->id;
     }

     public function setId($id)
     {
          $this->id = $id;
     }

     public function getRazaoSocial()
     {
          return $this->razaoSocial;
     }

     public function setRazaoSocial($razaoSocial)
     {
          $this->razaoSocial = $razaoSocial;
     }

     public function getNomeFantasia()
     {
          return $this->nomeFantasia;
     }

     public function setNomeFantasia($nomeFantasia)
     {
          $this->nomeFantasia = $nomeFantasia;
     }

     public function getEmail()
     {
          return $this->email;
     }

     public function setEmail($email)
     {
          $this->email = $email;
     }

     public function getTelefone()
     {
          return $this->telefone;
     }

     public function setTelefone($telefone)
     {
          $this->telefone = $telefone;
     }

     public function getCelular()
     {
          return $this->celular;
     }

     public function setCelular($celular)
     {
          $this->celular = $celular;
     }

     public function getCnpj()
     {
          return $this->cnpj;
     }

     public function setCnpj($cnpj)
     {
          $this->cnpj = $cnpj;
     }

     public function getIdEndereco()
     {
          return $this->idEndereco;
     }

     public function setIdEndereco($idEndereco)
     {
          $this->idEndereco = $idEndereco;
     }
 
     public function getIdPedido()
     {
          return $this->idPedido;
     }

     public function setIdPedido($idPedido)
     {
          $this->idPedido = $idPedido;
     }
}

?>