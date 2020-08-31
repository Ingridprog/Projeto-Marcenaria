<?php

require_once('interfaces/DaoMysql.php');
require_once('models/Responsavel.php');

class ResponsavelDao implements DaoMysql
{
     private $pdo;

     public function __construct(PDO $pdo)
     {
          $this->pdo = $pdo;
     }

     public function add($responsavel)
     {
          $sql = $pdo->prepare("INSERT INTO tbl_responsavel (nome, email, cpf, cnpj) 
               VALUES (:nome, :email, :cpf, 1");
          
          $sql->bindValue(":nome", $responsavel->getNome());
          $sql->bindValue(":email", $responsavel->getEmail());
          $sql->bindValue(":cpf", $responsavel->getCpf());
          $sql->execute();

          if($sql->rowCount() > 0){
               $responsavel->setId($this->pdo->lastInsertId());
               return $responsavel;
          }else{
               return FALSE;
          }
     }

     public function findById($id)
     {
          $sql = $this->pdo->prepare("SELECT * FROM tbl_responsavel WHERE id=:id");
          $sql->bindValue(":id", $id);
          $sql->execute();

          if($sql->rowCount() > 0)
          {
               $dados = $sql->fetch(PDO::FETCH_ASSOC);
               $responsavel = new Responsavel();
               $responsavel->setId($dados['id']);
               $responsavel->setNome($dados['nome']);
               $responsavel->setEmail($dados['email']);
               $responsavel->setCpf($dados['cpf']);
               $responsavel->setCnpj($dados['cnpj']);
               
               return $responsavel;

          }else{
               return FALSE;
          }
     }

     public function findAll()
     {
          $responsaveis = [];

          $sql = $this->pdo->query("SELECT * FROM tbl_responsavel");

          if($sql->rowCount() > 0)
          {    
               $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
               foreach($dados as $resp){
                    $responsavel = new Responsavel();
                    $responsavel->setId($resp['id']);
                    $responsavel->setNome($resp['nome']);
                    $responsavel->setEmail($resp['email']);
                    $responsavel->setCpf($resp['cpf']);
                    $responsavel->setCnpj($resp['cnpj']);

                    $responsaveis[] = $responsavel;
               }

               return $responsaveis;
          }
     }

     public function update($responsavel)
     {
          $sql = $this->pdo->prepare("UPDATE tbl_responsavel SET nome=:nome, 
          email=:email, cpf=:cpf, cnpj=:cnpj WHERE id=:id");

          $sql->bindValue(":id", $responsavel->getId());
          $sql->bindValue(":nome", $responsavel->getNome());
          $sql->bindValue(":email", $responsavel->getEmail());
          $sql->bindValue(":cpf", $responsavel->getCpf());
          $sql->bindValue(":cnpj", $responsavel->getCnpj());
          $sql->execute();

          if($sql->rowCount() > 0){
               return $responsavel;
          }else{
               return FALSE;
          }
     }

     public function delete($id)
     {
          $sql = $this->pdo->prepare("DELETE FROM tbl_responsavel WHERE id=:id");
          $sql->bindValue(":id", $id);
          $sql->execute();

          if($sql->rowCount() > 0){
               return TRUE;
          }else{
               return FALSE;
          }
     }
}

?>