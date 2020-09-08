<?php

class Responsavel
{
     public $id;
     public $nome;
     public $email;
     public $cpf;
     public $cnpj;
     public $senha;
     public $token;
}

interface DaoResponsavel
{
     public function findByToken($token);
     public function findByEmail($email);
     public function update(Responsavel $responsavel);
}

?>