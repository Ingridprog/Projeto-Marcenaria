<?php

class Responsavel
{

     private $nome;
     private $email;
     private $cpf;
     private $cnpj;

     public function getNome()
     {
          return $this->nome;
     }

     public function setNome($nome)
     {
          $this->nome = $nome;
     }

     public function getEmail()
     {
          return $this->email;
     }

     public function setEmail($email)
     {
          $this->email = $email;
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