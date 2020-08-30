<?php

require_once('interfaces/DaoMysql.php');

class FormaPagamentoDao implements DaoMysql
{
     private $pdo;

     public function __construct(PDO $pdo)
     {
          $this->pdo = $pdo;
     }
     
     public function add($objeto)
     {

     }

     public function findById($id)
     {

     }

     public function findAll()
     {

     }

     public function update($objeto)
     {

     }

     public function delete($id)
     {
          
     }
}

?>