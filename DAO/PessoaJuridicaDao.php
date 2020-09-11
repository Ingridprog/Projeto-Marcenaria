<?php

require_once(dirname(__FILE__)."/../config.php");
require_once("$base/interfaces/DaoMysql.php");
require_once("$base/models/PessoaJuridica.php");

class PessoaJuridicaDao implements DaoMysql
{
     private $pdo;

     public function __construct(PDO $pdo)
     {
          $this->pdo = $pdo;
     }
     
     public function add($pessoaJuridica)
     {
          $sql = $this->pdo->prepare("INSERT INTO tbl_pessoa_juridica 
               (razao_social, nome_fantasia, cnpj, telefone, celular, email) 
               VALUES (:razao_social, :nome_fantasia, :cnpj, :telefone, :celular, :email)");
          
          $sql->bindValue(":razao_social", $pessoaJuridica->getRazaoSocial());
          $sql->bindValue(":nome_fantasia", $pessoaJuridica->getNomeFantasia());
          $sql->bindValue(":cnpj", $pessoaJuridica->getCnpj());
          $sql->bindValue(":telefone", $pessoaJuridica->getTelefone());
          $sql->bindValue(":celular", $pessoaJuridica->getCelular());
          $sql->bindValue(":email", $pessoaJuridica->getEmail());
          $sql->execute();

          if($sql->rowCount() > 0){
               $pessoaJuridica->setId($this->pdo->lastInsertId());
               return $pessoaJuridica;
          }else{
               return FALSE;
          }
     }

     public function findById($id)
     {
          $sql = $this->pdo->prepare("SELECT * FROM tbl_pessoa_juridica WHERE id=:id");
          $sql->bindValue(":id", $id);
          $sql->execute();

          if($sql->rowCount() > 0)
          {
               $dados = $sql->fetch(PDO::FETCH_ASSOC);
               $pessoaJuridica = new PessoaJuridica();
               $pessoaJuridica->setId($dados['id']);
               $pessoaJuridica->setRazaoSocial($dados['razao_social']);
               $pessoaJuridica->setNomeFantasia($dados['nome_fantasia']);
               $pessoaJuridica->setCnpj($dados['cnpj']);
               $pessoaJuridica->setTelefone($dados['telefone']);
               $pessoaJuridica->setCelular($dados['celular']);
               $pessoaJuridica->setEmail($dados['email']);

               return $pessoaJuridica;

          }else{
               return FALSE;
          }
     }

     public function findAll()
     {
          $clientes = [];

          $sql = $this->pdo->query("SELECT * FROM tbl_pessoa_juridica");

          if($sql->rowCount() > 0)
          {    
               $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
               foreach($dados as $cliente){
                    $pessoaJuridica = new PessoaJuridica();
                    $pessoaJuridica->setId($cliente['id']);
                    $pessoaJuridica->setRazaoSocial($cliente['razao_social']);
                    $pessoaJuridica->setNomeFantasia($cliente['nome_fantasia']);
                    $pessoaJuridica->setCnpj($cliente['cnpj']);
                    $pessoaJuridica->setTelefone($cliente['telefone']);
                    $pessoaJuridica->setCelular($cliente['celular']);
                    $pessoaJuridica->setEmail($cliente['email']);

                    $clientes[] = $cliente;
               }

               return $clientes;
          }
     }

     public function update($pessoaJuridica)
     {
          $sql = $this->pdo->prepare("UPDATE tbl_pessoa_juridica 
               SET razao_social=:razao_social, nome_fantasia=:nome_fantasia, cnpj:cnpj, 
               telefone=:telefone, celular=:celular, email=:email WHERE id=:id");

          $sql->bindValue(":id", $pessoaJuridica->getId());
          $sql->bindValue(":razao_social", $pessoaJuridica->getRazaoSocial());
          $sql->bindValue(":nome_fantasia", $pessoaJuridica->getNomeFantasia());
          $sql->bindValue(":cnpj", $pessoaJuridica->getCnpj());
          $sql->bindValue(":telefone", $pessoaJuridica->getTelefone());
          $sql->bindValue(":celular", $pessoaJuridica->getCelular());
          $sql->bindValue(":email", $pessoaJuridica->getEmail());
          $sql->execute();

          if($sql->rowCount() > 0){
               return $pessoaJuridica;
          }else{
               return FALSE;
          }
     }

     public function delete($id)
     {
          $sql = $this->pdo->prepare("DELETE FROM tbl_pessoa_juridica WHERE id=:id");
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