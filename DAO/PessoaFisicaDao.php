<?php

require_once('../../interfaces/DaoMysql.php');
require_once('../../models/PessoaFisica.php');

class PessoaFisicaDao implements DaoMysql
{
     private $pdo;

     public function __construct(PDO $pdo)
     {
          $this->pdo = $pdo;
     }
     
     public function add($pessoaFisica)
     {
          $sql = $this->pdo->prepare("INSERT INTO tbl_pessoa_fisica 
               (nome, telefone, celular, email, cpf) 
               VALUES (:nome, :telefone, :celular, :email, :cpf)");
          
          $sql->bindValue(":nome", $pessoaFisica->getNome());
          $sql->bindValue(":telefone", $pessoaFisica->getTelefone());
          $sql->bindValue(":celular", $pessoaFisica->getCelular());
          $sql->bindValue(":email", $pessoaFisica->getEmail());
          $sql->bindValue(":cpf", $pessoaFisica->getCpf());
          $sql->execute();

          if($sql->rowCount() > 0){
               $pessoaFisica->setId($this->pdo->lastInsertId());
               return $pessoaFisica;
          }else{
               return FALSE;
          }
     }

     public function findById($id)
     {
          $sql = $this->pdo->prepare("SELECT * FROM tbl_pessoa_fisica WHERE id=:id");
          $sql->bindValue(":id", $id);
          $sql->execute();

          if($sql->rowCount() > 0)
          {
               $dados = $sql->fetch(PDO::FETCH_ASSOC);
               $pessoaFisica = new PessoaFisica();
               $pessoaFisica->setId($dados['id']);
               $pessoaFisica->setNome($dados['nome']);
               $pessoaFisica->setTelefone($dados['telefone']);
               $pessoaFisica->setCelular($dados['celular']);
               $pessoaFisica->setCpf($dados['cpf']);
               $pessoaFisica->setEmail($dados['email']);

               return $pessoaFisica;

          }else{
               return FALSE;
          }
     }

     public function findAll()
     {
          $clientes = [];

          $sql = $this->pdo->query("SELECT * FROM tbl_pessoa_fisica");

          if($sql->rowCount() > 0)
          {    
               $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
               foreach($dados as $cliente){
                    $pessoaFisica = new PessoaFisica();
                    $pessoaFisica->setId($cliente['id']);
                    $pessoaFisica->setNome($cliente['nome']);
                    $pessoaFisica->setTelefone($cliente['telefone']);
                    $pessoaFisica->setCelular($cliente['celular']);
                    $pessoaFisica->setEmail($cliente['email']);
                    $pessoaFisica->setCpf($cliente['cpf']);

                    $clientes[] = $cliente;
               }

               return $clientes;
          }
     }

     public function update($pessoaFisica)
     {
          $sql = $this->pdo->prepare("UPDATE tbl_pessoa_fisica 
               SET nome=:nome, telefone=:telefone, celular=:celular, email=:email, cpf=:cpf WHERE id=:id");
          $sql->bindValue(":id", $pessoaFisica->getId());
          $sql->bindValue(":nome", $pessoaFisica->getNome());
          $sql->bindValue(":telefone", $pessoaFisica->getTelefone());
          $sql->bindValue(":celular", $pessoaFisica->getCelular());
          $sql->bindValue(":email", $pessoaFisica->getEmail());
          $sql->bindValue(":cpf", $pessoaFisica->getCpf());

          if($sql->rowCount() > 0){
               return $pessoaFisica;
          }else{
               return FALSE;
          }
     }

     public function delete($id)
     {
          $sql = $this->pdo->prepare("DELETE FROM tbl_pessoa_fisica WHERE id=:id");
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